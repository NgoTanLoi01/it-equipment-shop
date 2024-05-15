<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerAccountController extends Controller
{
    public function customer_account()
    {
        $customer = Auth::user(); // Lấy thông tin của khách hàng đăng nhập hiện tại
        
        return view('home.customer_account', compact('customer'));
    }
}
