<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


// session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('products')->where('id', $productId)->first();

        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->sale_price;
        $data['weight'] = $product_info->sale_price;
        $data['options']['feature_image_path'] = $product_info->feature_image_path;
        $data['options']['quantity'] = $product_info->quantity; // Thêm số lượng vào tùy chọn

        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
    }


    public function show_cart()
    {
        $customer_id = Session::get('customer_id');
        if (!$customer_id) {
            return Redirect::route('customer.login')->with('error', 'Bạn cần đăng nhập để truy cập vào trang này.');
        }
        return view('home.showcart');
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        // Lấy thông tin sản phẩm từ giỏ hàng
        $item = Cart::get($rowId);

        // Kiểm tra nếu số lượng yêu cầu vượt quá số lượng có sẵn
        if ($qty > $item->options->quantity) {
            return Redirect::to('/show-cart')->with('error', 'Số lượng sản phẩm vượt quá số lượng có sẵn');
        }

        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
}
