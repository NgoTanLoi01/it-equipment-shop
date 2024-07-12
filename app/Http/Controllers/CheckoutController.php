<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;


session_start();

class CheckoutController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function ordered_info($order_id)
    {
        // Lấy thông tin đơn hàng và chi tiết đơn hàng
        $order = Order::with('orderDetails.product')->where('order_id', $order_id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }

        // Lấy thông tin giao hàng từ bảng shipping
        $shipping_info = DB::table('shipping')->where('shipping_id', $order->shipping_id)->first();

        return view('home.ordered_info', compact('order', 'shipping_info'));
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";

        // Lấy tổng tiền từ giỏ hàng
        $totalAmount = 0;
        $content = Cart::content();
        foreach ($content as $v_content) {
            $totalAmount += $v_content->price * $v_content->qty;
        }

        // Chuyển đổi tổng tiền thành đơn vị tiền tệ của Momo (VND)
        $vnp_Amount = $totalAmount;
        $vnp_Amount = "$vnp_Amount";
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/checkout";
        $ipnUrl = "http://127.0.0.1:8000/checkout";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";

        // Tạo chữ ký (signature) cho request
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $vnp_Amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // Tạo data để gửi đi
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $vnp_Amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        // Gửi request đến Momo API
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        // Kiểm tra xem response có 'payUrl' không
        if (isset($jsonResult['orderId'])) {
            $vnp_TxnRef = $jsonResult['orderId'];
        } else {
            // Xử lý khi 'orderId' không tồn tại
            return response()->json(['error' => 'Không tìm thấy orderId trong response từ Momo.']);
        }

        // Lưu thông tin thanh toán vào bảng payment
        $payment_data = array(
            'vnp_txn_ref' => $vnp_TxnRef,
            'vnp_amount' => $vnp_Amount,
            'payment_method' => 'Momo',
            'vnp_response_code' => '',
            'created_at' => now(),
        );

        $payment_id = DB::table('payment')->insertGetId($payment_data);



        DB::table('payment')->where('payment_id', $payment_id)->update(['created_at' => now()]);


        // Lưu thông tin đơn hàng vào bảng order
        $order_data = array(
            'customer_id' => Session::get('customer_id'),
            'shipping_id' => Session::get('shipping_id'),
            'payment_id' => $payment_id,
            'order_total' => $totalAmount,
            'order_status' => 'Đơn hàng đã được thanh toán bằng Momo',
            'delivery_status' => 'Đang giao',
            'created_at' => now(),
        );

        $order_id = DB::table('order')->insertGetId($order_data);

        // Lưu chi tiết đơn hàng vào bảng order_details
        foreach ($content as $v_content) {
            $order_d_data = array(
                'order_id' => $order_id,
                'product_id' => $v_content->id,
                'product_name' => $v_content->name,
                'product_price' => $v_content->price,
                'product_sales_quantity' => $v_content->qty,
                'tax' => 0,
            );

            DB::table('order_details')->insert($order_d_data);

            // Giảm số lượng sản phẩm trong CSDL
            $product = DB::table('products')->where('id', $v_content->id)->first();

            if ($product && $product->quantity >= $v_content->qty) {
                DB::table('products')->where('id', $v_content->id)->decrement('quantity', $v_content->qty);
            } else {
                return response()->json(['error' => 'Sản phẩm không đủ số lượng.']);
            }
        }
        Cart::destroy();
        // Chuyển hướng đến trang thanh toán
        return redirect()->to($jsonResult['payUrl']);
    }

    public function vnpay_payment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/vnpay_return"; // URL callback chính xác
        $vnp_TmnCode = "YOU17NPC"; // Mã website tại VNPAY
        $vnp_HashSecret = "NMYCLNXMEPBVEJUNUGMDAZXZGHALDDHL"; // Chuỗi bí mật

        // Tạo mã đơn hàng
        $vnp_TxnRef = time() . '_' . rand(1000, 9999);

        // Thông tin đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';

        // Lấy tổng tiền từ giỏ hàng
        $totalAmount = 0;
        $content = Cart::content();
        foreach ($content as $v_content) {
            $totalAmount += $v_content->price * $v_content->qty;
        }

        // Chuyển đổi tổng tiền thành đơn vị tiền tệ của VNPAY (VND)
        $vnp_Amount = $totalAmount * 100;

        // Thông tin thanh toán
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        // Các tham số thanh toán
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);

        // Tạo chuỗi hash
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // Lưu thông tin thanh toán vào bảng payment
        $payment_data = array(
            'vnp_txn_ref' => $vnp_TxnRef,
            'vnp_amount' => $vnp_Amount,
            'payment_method' => $vnp_OrderType,
            'vnp_response_code' => '',
            'created_at' => now(),
        );

        $payment_id = DB::table('payment')->insertGetId($payment_data);

        // Lưu thông tin đơn hàng vào bảng order
        $order_data = array(
            'customer_id' => Session::get('customer_id'),
            'shipping_id' => Session::get('shipping_id'),
            'payment_id' => $payment_id,
            'order_total' => round(Cart::total(0, '.', '') / (1 + 0.21), 2),
            'order_status' => 'Đơn hàng đã được thanh toán bằng VNPAY',
            'delivery_status' => 'Đang giao',
            'created_at' => now(),
        );

        $order_id = DB::table('order')->insertGetId($order_data);

        // Lưu chi tiết đơn hàng vào bảng order_details
        foreach ($content as $v_content) {
            $order_d_data = array(
                'order_id' => $order_id,
                'product_id' => $v_content->id,
                'product_name' => $v_content->name,
                'product_price' => $v_content->price,
                'product_sales_quantity' => $v_content->qty,
                'tax' => 0,
            );

            DB::table('order_details')->insert($order_d_data);

            // Giảm số lượng sản phẩm trong CSDL
            $product = DB::table('products')->where('id', $v_content->id)->first();

            if ($product && $product->quantity >= $v_content->qty) {
                DB::table('products')->where('id', $v_content->id)->decrement('quantity', $v_content->qty);
            } else {
                return response()->json(['error' => 'Sản phẩm không đủ số lượng.']);
            }
        }

        // Chuyển hướng người dùng đến trang thanh toán VNPAY
        return redirect()->to($vnp_Url);
    }

    // Thêm phương thức callback để xử lý khi thanh toán xong
    public function vnpay_return(Request $request)
    {
        $vnp_TxnRef = $request->vnp_TxnRef;
        $vnp_ResponseCode = $request->vnp_ResponseCode;

        if ($vnp_ResponseCode == "00") {
            // Xóa giỏ hàng sau khi thanh toán thành công
            Cart::destroy();

            // Cập nhật trạng thái đơn hàng
            $payment_id = DB::table('payment')->where('vnp_txn_ref', $vnp_TxnRef)->value('payment_id');
            DB::table('order')
                ->where('payment_id', $payment_id)
                ->update(['order_status' => 'Đơn hàng đã được thanh toán bằng VNPAY', 'delivery_status' => 'Đang giao']);

            return view('home.handcash');
        } else {
            return response()->json(['error' => 'Giao dịch không thành công.']);
        }
    }

    public function login_checkout()
    {
        return view('home.login_checkout');
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;

        $data['customer_password'] = Hash::make($request->customer_password);

        $customer_id = DB::table('customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect::to('/checkout');
    }

    public function checkout()
    {
        $customer_id = Session::get('customer_id');
        $shipping_info = DB::table('shipping')->where('customer_id', $customer_id)->first();
        // Kiểm tra session customer_id để đảm bảo tồn tại trước khi truy vấn dữ liệu
        $customer_info = $customer_id ? Customer::where('customer_id', $customer_id)->first() : null;

        return view('home.checkout', compact('shipping_info', 'customer_info'));
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['customer_id'] = Session::get('customer_id');
        $data['shipping_name'] = $request->input('shipping_name');
        $data['shipping_phone'] = $request->input('shipping_phone');
        $data['shipping_email'] = $request->input('shipping_email');
        $data['shipping_notes'] = $request->input('shipping_notes');
        $data['shipping_address'] = $request->input('shipping_address');

        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return redirect('/payment');
    }

    public function payment()
    {
        return view('home.payment');
    }

    public function order_place(Request $request)
    {
        // Thêm phương thức thanh toán vào bảng payment
        $paymentData = [
            'payment_method' => $request->payment_option,
            'payment_status' => 'Đang chờ xử lý',
        ];

        // Kiểm tra nếu là thanh toán bằng tiền mặt, thêm giá trị mặc định cho các trường liên quan
        if ($paymentData['payment_method'] == 2) {
            $paymentData['vnp_response_code'] = '';
            $paymentData['vnp_amount'] = '';
            $paymentData['vnp_txn_ref'] = '';
        }

        $paymentId = DB::table('payment')->insertGetId($paymentData);

        // Thêm đơn hàng và lấy ID
        $orderData = [
            'customer_id' => Session::get('customer_id'),
            'shipping_id' => Session::get('shipping_id'),
            'payment_id' => $paymentId,
            'order_total' => round(Cart::total(0, '.', '') / (1 + 0.21), 2),
            'order_status' => 'Thanh toán khi nhận hàng',
            'delivery_status' => 'Chờ xác nhận',
        ];

        $orderId = DB::table('order')->insertGetId($orderData);

        // Lấy thời gian hiện tại và cập nhật created_at của đơn hàng
        $currentDateTime = now();
        DB::table('order')->where('order_id', $orderId)->update(['created_at' => $currentDateTime]);

        // Trừ số lượng sản phẩm trong CSDL và thêm vào bảng order_details
        $content = Cart::content();
        foreach ($content as $product) {
            // Truy xuất thông tin sản phẩm từ CSDL
            $productInfo = DB::table('products')->where('id', $product->id)->first();

            // Kiểm tra nếu sản phẩm tồn tại và có đủ số lượng để giảm
            if ($productInfo && $productInfo->quantity >= $product->qty) {
                // Giảm số lượng sản phẩm trong CSDL
                DB::table('products')->where('id', $product->id)->decrement('quantity', $product->qty);

                // Thêm vào bảng order_details
                $orderDetailsData = [
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'product_sales_quantity' => $product->qty,
                    'tax' => 0,
                ];

                DB::table('order_details')->insert($orderDetailsData);
            } else {
                // Xử lý khi không đủ số lượng sản phẩm
                return response()->json(['error' => 'Sản phẩm không đủ số lượng.']);
            }
        }

        // Xử lý dựa vào phương thức thanh toán
        if ($paymentData['payment_method'] == 1) {
            return 'Thanh toán thẻ ATM';
        } elseif ($paymentData['payment_method'] == 2) {
            Cart::destroy();
            return view('home.handcash');
        } else {
            return 'Thanh toán thẻ ghi nợ';
        }
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = Hash::make($request->password_account);
        $result = DB::table('customers')->where('customer_email', $email)->first();

        if ($result && Hash::check($request->password_account, $result->customer_password)) {
            // Đúng mật khẩu
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            // Sai mật khẩu
            return Redirect::to('/login-checkout');
        }
    }
    public function updateOrderStatus(Request $request, $id)
    {
        $deliveryStatus = $request->input('delivery_status');
        $order = Order::find($id);

        if ($order) {
            $order->delivery_status = $deliveryStatus;
            $order->save();
            return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật trạng thái đơn hàng.');
    }
    public function manage_order()
    {
        $all_order = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->select('order.*', 'customers.customer_name')
            ->orderBy('order.order_id', 'desc')
            ->paginate(10);

        return view('admin.order.manage_order', compact('all_order'));
    }

    public function view_order($orderId)
    {
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*')
            ->where('order.order_id', $orderId)
            ->get();
        $manager_order_by_id = view('admin.order.view_order')->with('order_by_id', $order_by_id);
        return view('admin.order.view_order', compact('order_by_id', 'manager_order_by_id'));
    }

    public function print_order($checkoutcode)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkoutcode));
        return $pdf->stream();
    }

    public function print_order_convert($checkoutcode)
    {
        // Thực hiện truy vấn SQL để lấy dữ liệu đơn hàng
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*')
            ->where('order.order_id', $checkoutcode)
            ->get();

        $orderStatus = $order_by_id->first()->order_status; // Lấy trạng thái đơn hàng từ bản ghi đầu tiên

        $output = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <style>
                            /* Thêm phần CSS vào đây */
                            @font-face {
                                font-family: "DejaVu Sans";
                                src: url("path/to/your/font.woff2") format("woff2");
                            }
    
                            table {
                                font-family: "DejaVu Sans", sans-serif;
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 20px;
                            }
    
                            table, th, td {
                                border: 1px solid #ddd;
                            }
    
                            th, td {
                                padding: 8px;
                                text-align: left;
                            }
    
                            h5 {
                                font-weight: bold;
                                padding: 8px;
                                background-color: #d2e2ef;
                                text-align: center;
                                font-family: "DejaVu Sans", sans-serif;
                            }
    
                            .logo {
                                max-width: 100px;
                                margin-bottom: 10px;
                                border-radius: 50%;
                                vertical-align: middle;
                            }
    
                            .logo + p {
                                text-align: center;
                                display: inline-block;
                                vertical-align: middle;
                                margin-left: -12px;
                            }
    
                            h2 {
                                text-align: center;
                                font-family: "DejaVu Sans", sans-serif;
                            }
    
                            .thongtin1,
                            .thongtin2 {
    
                                display: inline-block;
                                vertical-align: top;
                                font-family: "DejaVu Sans", sans-serif;
                            }
    
                            .thongtin2 {
                                font-size: 15px;
                                margin-left: 60px;
                            }
    
                            h3{
                                text-align: center;
                                font-family: "DejaVu Sans", sans-serif;
                            }
    
                            span{
                                color: #fcb941;
                            }
    
                            .thongtin1{
                                color: #fcb941;
                            }
                            p{
                                font-family: "DejaVu Sans", sans-serif;
                            }
                        </style>
                        <title>In Đơn Hàng</title>
                    </head>
                    <body>
                        <div class="thongtin1" >
                            <img class="logo" src="UserLTE/assets/images/demos/demo-3/Logo.jpg" alt="Logo">
                            <p class="shop"><b>NGO TAN LOI <br> DIGITAL <br> TECHNOLOGIES</b></p>
                        </div>
                        <div class="thongtin2">
                            <p><b>SĐT:</b> 033 712 0073</p>
                            <p><b>Địa chỉ:</b> Nguyễn Thiện Thành, Phường 5, Trà Vinh</p>
                            <p><b>Mã số thuế: </b>02GTT0/01</p>
                        </div>
                        <h2>HÓA ĐƠN BÁN HÀNG <br> -------oOo-------</h2>
    
                        <h5><b>THÔNG TIN VẬN CHUYỂN</b></h5>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Địa chỉ giao hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Ghi chú đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>' . $order_by_id->first()->shipping_name . '</td>
                                    <td>' . $order_by_id->first()->shipping_address . '</td>
                                    <td>' . $order_by_id->first()->shipping_phone . '</td>
                                    <td>' . $order_by_id->first()->shipping_notes . '</td>
                                </tr>
                            </tbody>
                        </table>
    
                        <h5><b>CHI TIẾT ĐƠN HÀNG</b></h5>
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 40%;" scope="col">Tên sản phẩm</th>
                                    <th style="width: 5%;" scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tổng tiền</th>                                    
                                </tr>
                            </thead>
                            <tbody>';
        $totalAmount = 0;
        foreach ($order_by_id as $order) {
            $output .= '<tr>
                                                <td style="width: 40%;">' . $order->product_name . '</td>
                                                <td style="width: 5%; text-align: center;">' . $order->product_sales_quantity . '</td>
                                                <td style="text-align: center;">' . number_format(floatval($order->product_price)) . ' VNĐ</td>
                                                <td style="text-align: center;">' . number_format(floatval($order->product_price * $order->product_sales_quantity)) . ' VNĐ</td>
                                                
                                            </tr>';
            $totalAmount += $order->product_price * $order->product_sales_quantity;
        }
        $output .= '                                            
                            </tbody>
                        </table>
                        <p><b>Tổng tiền phải thanh toán:</b> ' . number_format($totalAmount) . ' VNĐ.</p>
                        <p><b>Bằng chữ: </b>' . convertNumberToWords($totalAmount) . ' VNĐ.</p>
                        <p><b>Phương thức thanh toán:</b> ' . $orderStatus . '.</p>
                        <p style="font-size: 15px; color: red;"><b>*Lưu ý:</b> Quý khách vui lòng quay video khi mở hàng. NGO TAN LOI Digital Technologies chỉ giải quyết khi có video. Xin cảm ơn! </p>
                        <br>
                        <h3><span>NGO TAN LOI DIGITAL TECHNOLOGIES </span> <br> CẢM ƠN QUÝ KHÁCH ĐÃ MUA SẮM TẠI CỬA HÀNG. </h3>
                    </body>
                </html>';

        return $output;
    }
    public function send_mail($orderId)
    {
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*', 'products.feature_image_path')
            ->where('order.order_id', $orderId)
            ->get();

        if ($order_by_id->isNotEmpty()) {
            $to_name = "NGO TAN LOI Digital Technologies";
            $to_email = $order_by_id[0]->customer_email;

            $data = array(
                "name" => $to_name,
                "body" => 'Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đang được xử lý.',
                "order" => $order_by_id,
                "delivery_status" => $order_by_id[0]->delivery_status,
                "order_id" => $orderId
            );

            Mail::send("home.send_mail", $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('Thông tin đơn hàng');
                $message->from('ngotanloi2424@gmail.com', $to_name);
            });

            return redirect('/manage-order')->with('message', 'Email đã được gửi.');
        } else {
            return redirect('/manage-order')->with('message', 'Đơn hàng không tồn tại.');
        }
    }

    public function send_sms($orderId)
    {
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*', 'products.feature_image_path')
            ->where('order.order_id', $orderId)
            ->get();

        if ($order_by_id->isNotEmpty()) {
            $customer_phone = $order_by_id[0]->customer_phone;

            // Chuyển đổi số điện thoại sang định dạng quốc tế (+84) nếu cần thiết
            if (strpos($customer_phone, '0') === 0) {
                $customer_phone = '+84' . substr($customer_phone, 1);
            }

            $order_details = "Mã đơn hàng: $orderId\n";
            foreach ($order_by_id as $item) {
                $order_details .= "Sản phẩm: {$item->product_name}, Số lượng: {$item->product_sales_quantity}\n";
            }
            $sms_body = "Đơn hàng của bạn đang được xử lý.\n$order_details\nCảm ơn bạn đã đặt hàng.";

            $sid    = env('TWILIO_SID');
            $token  = env('TWILIO_AUTH_TOKEN');
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    $customer_phone,
                    array(
                        "from" => env('TWILIO_PHONE_NUMBER'),
                        "body" => $sms_body
                    )
                );

            return redirect('/manage-order')->with('message', 'SMS đã được gửi.');
        } else {
            return redirect('/manage-order')->with('message', 'Đơn hàng không tồn tại.');
        }
    }
}
