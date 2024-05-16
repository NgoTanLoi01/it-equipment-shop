<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;

class CustomerAccountController extends Controller
{
    public function customer_account()
    {
        $customer = Auth::guard('customer')->user(); // Lấy thông tin khách hàng đã đăng nhập

        // $customer_id = $customer->id;
        $customer_id = session('customer_id');
        session(['customer_id' => $customer_id]);

        // dd($customer);
        // Tiếp tục xử lý khi đã có người dùng đăng nhập
        $orders = Order::select('order.*', 'shipping.shipping_name')
            ->where('order.customer_id', $customer_id)
            ->leftJoin('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->get();

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

        return view('home.customer_account', compact('customer', 'allOrders', 'pendingOrders', 'shippingOrders', 'deliveredOrders', 'cancelledOrders', 'orders'));
    }

    
}
