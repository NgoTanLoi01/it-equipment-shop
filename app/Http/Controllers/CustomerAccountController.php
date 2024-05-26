<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CustomerAccountController extends Controller
{
    public function customer_account()
    {
        $customer = Auth::guard('customer')->user(); // Lấy thông tin khách hàng đã đăng nhập

        // $customer_id = $customer->id;
        $customer_id = session('customer_id');
        session(['customer_id' => $customer_id]);

        $customer_id = Session::get('customer_id');
        // Kiểm tra session customer_id để đảm bảo tồn tại trước khi truy vấn dữ liệu
        $customer_info = $customer_id ? Customer::where('customer_id', $customer_id)->first() : null;
        // dd($customer);
        // Tiếp tục xử lý khi đã có người dùng đăng nhập
        $orders = Order::select('order.*', 'shipping.shipping_name')
            ->where('order.customer_id', $customer_id)
            ->leftJoin('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->paginate(10);

        // Phân loại các đơn hàng theo delivery_status
        $allOrders = [];
        $pendingOrders = [];
        $shippingOrders = [];
        $deliveredOrders = [];
        $cancelledOrders = [];

        foreach ($orders as $order) {
            switch ($order->delivery_status) {
                case 'Chờ xác nhận':
                    $pendingOrders[] = $order;
                    break;
                case 'Đang giao':
                    $shippingOrders[] = $order;
                    break;
                case 'Đã giao':
                    $deliveredOrders[] = $order;
                    break;
                case 'Đã hủy':
                    $cancelledOrders[] = $order;
                    break;
                default:
                    $allOrders[] = $order;
                    break;
            }
        }

        return view('home.customer_account', compact('customer', 'allOrders', 'pendingOrders', 'shippingOrders', 'deliveredOrders', 'cancelledOrders', 'orders', 'customer_info'));
    }

    public function cancelOrder($order_id)
    {
        $order = Order::find($order_id);
    
        if ($order) {
            $order->delivery_status = 'Đã hủy';
            $order->save();
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }
    
}
