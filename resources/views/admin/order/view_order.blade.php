@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

<style>
    h5 {
        font-weight: bold;
        padding: 12px;
        background-color: #e6e4f3;
        text-align: center;
    }

    th {
        background-color: #e6e4f3;
    }
</style>

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h4>THÔNG TIN CHI TIẾT ĐƠN HÀNG</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product-header">
                                <div>
                                    <a target="_blank" href="{{ url('/print-order/' . $order_by_id->first()->order_id) }}"
                                        class="btn btn-sm btn-outline-secondary float-right m-2">
                                        <img src="{{ asset('AdminMofi/assets/images/icon/print.png') }}" width="16px"
                                            alt=""><strong>&nbsp;In đơn hàng</strong>
                                    </a>

                                    <a href="{{ url('/send-mail/' . $order_by_id->first()->order_id) }}"
                                        class="btn btn-sm btn-outline-danger float-right m-2">
                                        <img src="{{ asset('AdminMofi/assets/images/icon/email.png') }}" width="16px"
                                            alt=""><strong>&nbsp;Gửi Email thông báo</strong>
                                    </a>
                                    {{-- <a href="{{ url('/send-sms/' . $order_by_id->first()->order_id) }}"
                                        class="btn btn-sm btn-outline-success float-right m-2">
                                        <img src="{{ asset('AdminMofi/assets/images/icon/sms.png') }}" width="16px"
                                            alt=""><strong>&nbsp;Gửi SMS thông báo</strong>
                                    </a> --}}
                                </div>
                                <div class="collapse" id="collapseProduct">
                                </div>
                            </div>
                            <div class="list-product">
                                <div
                                    class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-container">
                                        <h5><b>THÔNG TIN KHÁCH HÀNG</b></h5>
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong> Tên khách hàng</strong></th>
                                                    <th scope="col"><strong> Số điện thoại</strong></th>
                                                    <th scope="col"><strong> Email</strong></th>
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
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong> Tên người nhận hàng</strong></th>
                                                    <th scope="col"><strong> Địa chỉ</strong></th>
                                                    <th scope="col"><strong> Số điện thoại</strong></th>
                                                    <th scope="col"><strong> Ghi chú đơn hàng</strong></th>
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
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong> Tên sản phẩm</strong></th>
                                                    <th scope="col"><strong> Số lượng</strong></th>
                                                    <th scope="col"><strong> Giá</strong></th>
                                                    <th scope="col"><strong> Tổng tiền</strong></th>
                                                    <th scope="col"><strong> Tình trạng</strong></th>
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
                                                        <td>{{ number_format(floatval($order->product_price * $order->product_sales_quantity)) }}
                                                            VNĐ</td>
                                                        <td>{{ $order->order_status }}</td>
                                                    </tr>
                                                    @php
                                                        $totalAmount +=
                                                            $order->product_price * $order->product_sales_quantity; // Cập nhật tổng
                                                    @endphp
                                                @endforeach
                                                @if ($order_by_id->count() > 0)
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td style="color: red"><b>Tổng thanh toán:
                                                                {{ number_format($totalAmount) }} VNĐ</b></td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
