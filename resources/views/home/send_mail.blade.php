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
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            text-align: left;
        }

        .logo {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            margin-bottom: 10px;
            border-radius: 50%;
            vertical-align: middle;
        }

        h1 {
            color: #333;
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
    </style>
</head>

<body>
    <div class="container">
        <img class="logo" src="{{ $message->embed(public_path('UserLTE/assets/images/demos/demo-3/Logo.jpg')) }}"
            alt="Logo cửa hàng">
        <h2 style="text-align: center">XÁC NHẬN ĐƠN HÀNG <br> -------oOo-------</h2>

        <h3>Xin chào {{ !empty($order) ? $order->first()->customer_name : 'Khách hàng' }},</h3>
        <p>Đơn hàng của bạn đang được xử lý</p>
        -----------------------------------------------------------------------------------------------------------------------------
        <h3>THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA</h3>
        @if (!empty($order))
            <ul>
                @php
                    $totalAmount = 0;
                    $orderStatus = $order->first()->order_status; // Lấy trạng thái đơn hàng từ bản ghi đầu tiên
                @endphp
                @foreach ($order as $index => $item)
                    <li>
                        <strong>Sản phẩm {{ $index + 1 }}:</strong>
                        <ul>
                            <li>Tên sản phẩm: {{ $item->product_name }}</li>
                            <li>Số lượng: {{ $item->product_sales_quantity }}</li>
                            <li>Giá: {{ number_format($item->product_price) }} VNĐ</li>
                            <li>Tổng tiền sản phẩm:
                                {{ number_format($item->product_price * $item->product_sales_quantity) }} VNĐ</li>
                        </ul>
                        @php
                            $totalAmount += $item->product_price * $item->product_sales_quantity;
                        @endphp
                    </li>
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
                    <strong>Phương thức thanh toán: {{ isset($orderStatus) ? $orderStatus : 'Không xác định' }}</strong>
                </li>
            </ul>
            -----------------------------------------------------------------------------------------------------------------------------
        @else
            <p>Không có thông tin đơn hàng.</p>
        @endif

        <h3>Cảm ơn bạn đã mua hàng từ cửa hàng chúng tôi.</h3>
        <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ <a href="mailto:ngotanloisupport@gmail.com"><strong>hỗ trợ
                    của chúng tôi</strong></a>.</p>
        <h3>Trân trọng cảm ơn,</h3>
        <h3>NGO TAN LOI Digital Technologies</h3>
        <p>Địa chỉ: Nguyễn Thiện Thành, Phường 5, Trà Vinh</p>
        <p>SĐT: 033 712 0073</p>
    </div>
</body>

</html>
