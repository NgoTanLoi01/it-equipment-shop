<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use App\Models\Tag;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    public function compare(Request $request)
    {
        $productIds = explode(',', $request->input('products'));
        $products = Product::whereIn('id', $productIds)->get();
        return view('home.compare', compact('products'));
    }

    public function getProductsSameCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->get();
        return response()->json($products);
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->with('reviews')->firstOrFail();

        // Tăng lượt xem lên 1
        $product->increment('views_count');

        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();
        $customer_id = Session::get('customer_id');
        $shipping_info = DB::table('shipping')->where('customer_id', $customer_id)->first();
        // Kiểm tra session customer_id để đảm bảo tồn tại trước khi truy vấn dữ liệu
        $customer_info = $customer_id ? Customer::where('customer_id', $customer_id)->first() : null;

        //Lấy sản phẩm thường được mua cùng
        $productsFeatures = Product::orderBy('views_count', 'desc')->take(5)->get();

        return view('home.detail', compact('product', 'related', 'shipping_info', 'customer_info', 'productsFeatures'));
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'reviewer_name' => 'required|string|max:255',
            'reviewer_phone' => 'required|string|max:20',
            'rating' => 'required|integer|min:1|max:5',
            'review_title' => 'required|string|max:255',
            'review_text' => 'required|string|max:1500',
        ]);

        ProductReview::create($request->all());

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi thành công!');
    }

    public function index()
    {
        // Lấy danh sách slider
        $sliders = Slider::latest()->get();

        // Lấy danh sách các danh mục cấp 1
        $categorys = Category::where('parent_id', 0)->get();

        // Lấy danh sách 10 sản phẩm mới nhất
        $products = Product::latest()->take(10)->get();

        // Lấy danh sách 12 sản phẩm được xem nhiều nhất
        $productsFeatures = Product::orderBy('views_count', 'desc')->take(12)->get();

        // Lấy danh sách 6 danh mục cấp 1 đầu tiên
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();

        // Truy vấn và tính toán số lượng sản phẩm đã bán cho mỗi product_id
        $productsSold = DB::table('order_details')
            ->select('product_id', DB::raw('SUM(product_sales_quantity) as total_sold'))
            ->groupBy('product_id');

        // Lấy danh sách 12 sản phẩm được bán chạy nhất
        $productsSelling = Product::leftJoinSub($productsSold, 'productsSold', function ($join) {
            $join->on('products.id', '=', 'productsSold.product_id');
        })
            ->orderByDesc('productsSold.total_sold') // Sắp xếp theo số lượng sản phẩm đã bán từ cao đến thấp
            ->take(12)
            ->get();

        // Lấy số lượng sản phẩm đã bán cho mỗi sản phẩm cụ thể và lưu vào một mảng kết hợp
        $productSalesQuantity = [];
        foreach ($productsSelling as $product) {
            $productSalesQuantity[$product->id] = $product->total_sold;
        }

        // Lấy danh sách các sản phẩm đang giảm giá
        $productsOnSale = Product::whereColumn('sale_price', '<', 'price')->get();

        // Trả về view home và truyền các biến dữ liệu cần thiết
        return view("home.home", compact(
            "sliders",
            "categorys",
            "products",
            "productsSelling",
            "categorysLimit",
            "productsFeatures",
            "productSalesQuantity",
            "productsOnSale"
        ));
    }
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $productsSelling = Product::latest('views_count', 'desc')->take(12)->get();
        $search_product = DB::table('products')->where('name', 'like', '%' . $keywords . '%')->get();
        return view("home.search", compact("productsSelling"))->with('search_product', $search_product);
    }


    public function product_all(Request $request)
    {
        // Truy vấn danh sách các danh mục sản phẩm
        $categories = Category::where('parent_id', 0)->get();

        // Truy vấn dữ liệu sản phẩm
        $query = Product::query();

        // Lọc theo danh mục sản phẩm được chọn (nếu có)
        if ($request->has('selected_categories')) {
            $selectedCategories = $request->input('selected_categories');
            $query->whereIn('category_id', $selectedCategories);
        }

        // Xử lý lọc theo giá 
        if ($request->has('price_range') && !in_array('0-100000000', $request->price_range)) {
            $priceRange = $request->price_range;
            $query->where(function ($query) use ($priceRange) {
                foreach ($priceRange as $range) {
                    [$minPrice, $maxPrice] = explode('-', $range);
                    $query->orWhereRaw('CAST(sale_price AS DECIMAL(10,2)) BETWEEN ? AND ?', [$minPrice, $maxPrice]);
                }
            });
        }

        // Xử lý lọc theo tag sản phẩm 
        if ($request->has('product_tags')) {
            $tagIds = $request->product_tags;
            $query->whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds);
            });
        }

        // Lọc theo đánh giá số sao
        if ($request->has('ratings')) {
            $ratings = $request->input('ratings');
            $query->whereHas('reviews', function ($query) use ($ratings) {
                $query->whereIn('rating', $ratings);
            });
        }

        // Truy vấn sản phẩm theo các điều kiện lọc và phân trang
        $products = $query->latest()->paginate(15);
        $tags = Tag::all();

        // Trả về view với biến $products, $tags và $categories
        return view('home.product_all', compact('products', 'tags', 'categories', 'request'));
    }


    public function yeu_thich()
    {
        return view('home.yeu_thich');
    }

    public function lien_he()
    {
        return view('home.lien_he');
    }

    public function blog()
    {
        return view('home.blog');
    }
    public function about()
    {
        return view('home.about');
    }
}
