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
                            <h4>THÔNG TIN CHI TIẾT KHÁCH HÀNG</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product-header">
                                <div>
                                    {{-- <a target="_blank" href="{{ url('/print-order/' . $order_by_id->first()->order_id) }}"
                                        class="btn btn-sm btn-outline-secondary float-right m-2">
                                        <img src="{{ asset('AdminMofi/assets/images/icon/print.png') }}" width="16px"
                                            alt=""><strong>&nbsp;In đơn hàng</strong>
                                    </a>

                                    <a href="{{ url('/send-mail/' . $order_by_id->first()->order_id) }}"
                                        class="btn btn-sm btn-outline-danger float-right m-2">
                                        <img src="{{ asset('AdminMofi/assets/images/icon/email.png') }}" width="16px"
                                            alt=""><strong>&nbsp;Gửi Email thông báo</strong>
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
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
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
                                                    <th scope="col"><strong> Số đơn hàng đã đặt</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
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
