@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

<style>
    h5 {
        font-weight: bold;
        padding: 12px;
        background-color: #d2e2ef;
        text-align: center;
    }

    th {
        background-color: #d2e2ef;
    }
</style>

@section('content')
    <div class="content-wrapper p-3">
        
        <div class="col-md-12">
            <a target="_blank" href="{{ url('/print-order/' . $order_by_id->first()->order_id) }}"
                class="btn btn-sm btn-outline-secondary float-right m-2">
                <i class="fas fa-print"></i> In đơn hàng
            </a>
        
            <a href="{{ url('/send-mail/' . $order_by_id->first()->order_id) }}" class="btn btn-sm btn-outline-danger float-right m-2">
                <i class="fas fa-regular fa-envelope"></i> Gửi mail thông báo
            </a>
        </div>
        

        <br>
        <br>
        <h5><b>THÔNG TIN KHÁCH HÀNG</b></h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @if ($order_by_id->count() > 0)
                    <tr>
                        <td>{{ $order_by_id->first()->customer_name }}</td>
                        <td>{{ $order_by_id->first()->customer_phone }}</td>
                        <td>{{ $order_by_id->first()->customer_email }}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <br>

        <h5><b>THÔNG TIN VẬN CHUYỂN</b></h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Tên người nhận hàng</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ghi chú đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                @if ($order_by_id->count() > 0)
                    <tr>
                        <td>{{ $order_by_id->first()->shipping_name }}</td>
                        <td>{{ $order_by_id->first()->shipping_address }}</td>
                        <td>{{ $order_by_id->first()->shipping_phone }}</td>
                        <td>{{ $order_by_id->first()->shipping_notes }}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <br>

        <h5><b>CHI TIẾT ĐƠN HÀNG</b></h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0; // Khởi tạo biến tổng
                @endphp
                @foreach ($order_by_id as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->product_sales_quantity }}</td>
                        <td>{{ number_format(floatval($order->product_price)) }} VNĐ</td>
                        <td>{{ number_format(floatval($order->product_price * $order->product_sales_quantity)) }} VNĐ</td>
                        <td>{{ $order->order_status }}</td>
                    </tr>
                    @php
                        $totalAmount += $order->product_price * $order->product_sales_quantity; // Cập nhật tổng
                    @endphp
                @endforeach
                @if ($order_by_id->count() > 0)
                    <tr>
                        <td colspan="3"></td>
                        <td style="color: red"><b>Tổng thanh toán: {{ number_format($totalAmount) }} VNĐ</b></td>
                        <td style="color: red">
                            <b>
                                Bằng chữ:
                                @if (isset($totalAmount) && $totalAmount > 0)
                                    {{ convertNumberToWords($totalAmount) }} VNĐ
                                @else
                                    0 VNĐ
                                @endif
                            </b>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
