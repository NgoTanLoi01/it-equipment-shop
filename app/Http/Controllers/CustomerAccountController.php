<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CustomerAccountController extends Controller
{
    public function customer_account()
    {
        $customer_id = Session::get('customer_id');
        if (!$customer_id) {
            return Redirect::route('customer.login')->with('error', 'Bạn cần đăng nhập để truy cập vào trang này.');
        }
        $customer = Auth::guard('customer')->user(); // Lấy thông tin khách hàng đã đăng nhập

        $customer_id = session('customer_id');
        session(['customer_id' => $customer_id]);

        $customer_id = Session::get('customer_id');
        $customer_info = $customer_id ? Customer::where('customer_id', $customer_id)->first() : null;

        $orders = Order::select('order.*', 'shipping.shipping_name')
            ->where('order.customer_id', $customer_id)
            ->leftJoin('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->paginate(10);

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

            // Gọi phương thức để cập nhật lại số lượng sản phẩm
            $this->restoreProductQuantities($order_id);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    //Cập nhật lại số lượng sản phẩm khi khách hàng hủy đơn hàng
    public function restoreProductQuantities($order_id)
    {
        $orderDetails = DB::table('order_details')->where('order_id', $order_id)->get();

        foreach ($orderDetails as $detail) {
            DB::table('products')->where('id', $detail->product_id)->increment('quantity', $detail->product_sales_quantity);
        }
    }
}
