<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeAdminController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(10)->get();
        $productsSelling = Product::latest('views_count', 'desc')->take(12)->get();
        $productsFeatures = Product::oldest('views_count')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();

        return view("home.home", compact("sliders", "categorys", "products", "productsSelling", "categorysLimit", "productsFeatures"));
    }

    public function detail($slug)
    {
        $product = Product::where("slug", $slug)->first();

        // Tăng lượt xem lên 1
        $product->increment('views_count');

        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        return view('home.detail', compact('product', 'related'));
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
        $query = Product::query();

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

        $products = $query->latest()->paginate(9);
        $tags = Tag::all();

        return view('home.product_all', compact('products', 'tags'));
    }


    public function yeu_thich()
    {
        return view('home.yeu_thich');
    }

    public function lien_he()
    {
        return view('home.lien_he');
    }
}
