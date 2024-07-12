<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác Nhận Đơn Hàng</title>
    <style type="text/css">
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: black;
            margin: 0;
            padding: 0;
            background-color: #e3e3e3;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            border-radius: 10px;
            text-align: left;
        }

        .logo {
            display: block;
            margin: 0 auto;
            max-width: 80px;
            margin-bottom: 10px;
            border-radius: 50%;
            vertical-align: middle;
        }

        h1 {
            color: black;
        }

        h4 {
            color: #555;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .product-image {
            max-width: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div style="background-color:#e3e3e3;padding:20px 0px 10px 0px;/* color:#484a4c; */">
        <div class="container">
            <img class="logo" src="https://drive.google.com/uc?export=view&id=1SQUwsN_0rlWdCs3hTQ9tTBVvjqh9ks1R"
                alt="Logo cửa hàng">
            <h2 style="text-align: center">XÁC NHẬN ĐƠN HÀNG <br> -------oOo------- </h2>

            <h2><i>{{ !empty($order) ? $order->first()->customer_name : 'Khách hàng' }} thân mến,</i></h2>
            <p>Đơn hàng <span style="color: #ff8401">#{{ $order_id }}</span> của bạn hiện ở trạng thái <strong
                    style="color: #ff8401">{{ isset($delivery_status) ? $delivery_status : 'đang được xử lý' }}</strong>
            </p>
            <div style="box-sizing:border-box;width:100%;max-width:600px;border-top:1px solid #e0e0e0"></div>
            <h3>THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA</h3>
            @if (!empty($order))
                <ul>
                    @php
                        $totalAmount = 0;
                        $orderStatus = $order->first()->order_status;
                    @endphp
                    @foreach ($order as $index => $item)
                        <li>
                            <strong>Sản phẩm {{ $index + 1 }}:</strong>
                            <ul>
                                <li><strong>Tên sản phẩm: </strong>{{ $item->product_name }}</li><br>
                                <img src="{{ $message->embed(public_path($item->feature_image_path)) }}"
                                    alt="Ảnh sản phẩm" class="product-image"><br>
                                <li><strong>Số lượng:</strong> {{ $item->product_sales_quantity }}</li>
                                <li><strong>Giá:</strong> {{ number_format($item->product_price) }} VNĐ</li>
                                <li><strong>Tổng tiền sản phẩm:</strong>
                                    {{ number_format($item->product_price * $item->product_sales_quantity) }} VNĐ</li>
                            </ul>
                            @php
                                $totalAmount += $item->product_price * $item->product_sales_quantity;
                            @endphp
                        </li><br>
                    @endforeach
                    <li>
                        <strong>Tổng tiền phải thanh toán: {{ number_format($totalAmount) }} VNĐ</strong>
                    </li>
                    <li>
                        <strong> Bằng chữ:
                            @if ($totalAmount > 0)
                                {{ convertNumberToWords($totalAmount) }} VNĐ
                            @else
                                0 VNĐ
                            @endif
                        </strong>
                    </li>
                    <li>
                        <strong>Phương thức thanh toán:
                            {{ isset($orderStatus) ? $orderStatus : 'Không xác định' }}</strong>
                    </li>
                </ul>
                <p style="clear:both;padding-top:20px;text-align:center">
                    Để theo dõi đơn hàng, thông tin vận chuyển và thời gian giao hàng bạn hãy <br>
                    <a href="{{ URL::to('/customer-account') }}"><span
                            style="padding:10px 20px;background:#ff8401;line-height:50px;color:white;border-radius:5px; font-weight: bold;">THEO
                            DÕI NGAY</span></a>
                </p>
                <div style="box-sizing:border-box;width:100%;max-width:600px;border-top:1px solid #e0e0e0"></div>
            @else
                <p>Không có thông tin đơn hàng.</p>
            @endif

            <h3>Cảm ơn bạn đã mua hàng từ cửa hàng chúng tôi.</h3>
            <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ <a href="mailto:ngotanloisupport@gmail.com"><strong>hỗ
                        trợ
                        của chúng tôi</strong></a>.</p>
            <h3>NGO TAN LOI Digital Technologies</h3>
            <p>Địa chỉ: Nguyễn Thiện Thành, Phường 5, Trà Vinh</p>
            <p>SĐT: 033 712 0073</p>
        </div>
    </div>
</body>


</html>
