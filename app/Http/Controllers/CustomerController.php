<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Order;

class CustomerController extends Controller
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->paginate(10);
        return view('admin.customer.index', compact('customers'));
    }

    public function view($id)
    {
        // Lấy thông tin khách hàng
        $customer = Customer::findOrFail($id);

        // Lấy thông tin vận chuyển của khách hàng từ bảng shipping
        $shipping = DB::table('shipping')->where('customer_id', $id)->first();

        // Gọi phương thức getOrderCount để lấy số lượng đơn hàng đã đặt cho khách hàng
        $orderCount = $this->getOrderCount($customer->customer_id);

        // Lấy ra tất cả địa chỉ vận chuyển của khách hàng
        $shippings = DB::table('shipping')
            ->where('customer_id', $customer->customer_id)
            ->get();

        // Truyền dữ liệu khách hàng và vận chuyển vào view
        return view('admin.customer.view_customer', compact('customer', 'shipping', 'orderCount', 'shippings'));
    }
    public function getOrderCount($customerId)
    {
        // Sử dụng Eloquent để lấy số lượng đơn hàng đã đặt cho khách hàng có customer_id là $customerId
        $orderCount = Order::where('customer_id', $customerId)->count();

        return $orderCount;
    }
}
