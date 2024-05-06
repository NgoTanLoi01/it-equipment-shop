<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.home.index');
    }

    public function getKhachHangThanThiet()
    {
        return DB::table('order')
            ->select('order.customer_id', 'customers.customer_name', 'customers.customer_email', DB::raw('COUNT(order.order_id) as totalOrders'))
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->whereNull('order.deleted_at')
            ->groupBy('order.customer_id', 'customers.customer_name', 'customers.customer_email')
            ->having('totalOrders', '>', 1)
            ->orderBy('totalOrders', 'desc')
            ->limit(5)
            ->get();
    }

    public function index(Request $request)
    {
        $selectedDate = $request->input('selectedDate');
        $selectedDate = date('Y-m-d', strtotime($selectedDate));

        $thongKeData = Order::whereDate('created_at', $selectedDate)
            ->selectRaw('SUM(order_total) as totalRevenue, COUNT(order_id) as orderCount')
            ->first();

        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('order_total');
        $customerCount = Customer::count();

        $khachHangThanThiet = $this->getKhachHangThanThiet();

        // Thống kê theo tháng
        $thongKeTheoThang = Order::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->selectRaw('SUM(order_total) as totalRevenue, COUNT(order_id) as orderCount')
            ->first();

        // Thống kê các dữ liệu khác theo tháng
        $productCountMonth = Product::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();

        $orderCountMonth = Order::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();

        $totalRevenueMonth = Order::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->sum('order_total');

        $customerCountMonth = Customer::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();

        // Lấy danh sách sản phẩm bán chạy
        $bestSellingProducts = $this->getBestSellingProducts();

        // Lấy thông tin về sản phẩm bán chạy nhất
        $bestSellingProduct = $this->getBestSellingProducts()->first();

        $donHangGanDay = $this->getDonHangGanDay();
        return view('admin.home.index', compact(
            'productCount',
            'orderCount',
            'totalRevenue',
            'customerCount',
            'thongKeData',
            'selectedDate',
            'khachHangThanThiet',
            'thongKeTheoThang',
            'productCountMonth',
            'orderCountMonth',
            'totalRevenueMonth',
            'customerCountMonth',
            'donHangGanDay',
            'bestSellingProducts',
            'bestSellingProduct'
        ));
    }

    public function getDonHangGanDay()
    {
        return Order::select('order_id', 'customer_id', 'order_total', 'created_at', 'order_status')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function getBestSellingProducts()
    {
        // Truy vấn và tính toán số lượng sản phẩm đã bán cho mỗi product_id
        $productsSold = DB::table('order_details')
            ->select('product_id', DB::raw('SUM(product_sales_quantity) as total_sold'))
            ->groupBy('product_id');

        // Lấy danh sách 12 sản phẩm được bán chạy nhất
        $bestSellingProducts = Product::leftJoinSub($productsSold, 'productsSold', function ($join) {
            $join->on('products.id', '=', 'productsSold.product_id');
        })
            ->orderByDesc('productsSold.total_sold') // Sắp xếp theo số lượng sản phẩm đã bán từ cao đến thấp
            ->take(5)
            ->get();

        return $bestSellingProducts;
    }

    public function postloginAdmin(Request $request)
    {
    }

    public function showDashboard()
    {
    }
}
