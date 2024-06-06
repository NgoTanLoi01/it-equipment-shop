@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection
<style>
    /* Hiển thị phần email */
    .customer-email {
        max-width: 150px;
        /* Điều chỉnh chiều rộng tối đa của phần email */
        overflow: hidden;
        text-overflow: ellipsis;
        /* Hiển thị dấu ba chấm khi email quá dài */
        white-space: nowrap;
    }
</style>

@section('content')
    {{-- <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <br>
                <h2>TỔNG THỐNG KÊ</h2>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $orderCount }}</h3>
                                <p>Tổng số đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ number_format($totalRevenue) }} VNĐ</h3>
                                <p>Tổng số doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $customerCount }}</h3>
                                <p>Tổng số khách hàng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $productCount }}</h3>
                                <p>Tổng số mặt hàng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Box thống kê theo tháng -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $thongKeTheoThang->orderCount }}</h3>
                                <p>Tổng số đơn hàng tháng này</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ number_format($thongKeTheoThang->totalRevenue) }} VNĐ</h3>
                                <p>Tổng doanh thu tháng này</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $customerCountMonth }}</h3>
                                <p>Tổng số khách hàng tháng này</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $productCountMonth }}</h3>
                                <p>Tổng số mặt hàng mới tháng này</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2>THỐNG KÊ KHÁCH HÀNG THÂN THIẾT</h2>
        <div>
            @if ($khachHangThanThiet->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số lượng đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khachHangThanThiet as $khachHang)
                            <tr>
                                <td>{{ $khachHang->customer_name }}</td>
                                <td>{{ $khachHang->customer_email }}</td>
                                <td>{{ $khachHang->totalOrders }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Không có khách hàng thân thiết.</p>
            @endif
        </div>


        <h2>THỐNG KÊ DOANH THU</h2>
        <div>

            <label for="datepicker">Chọn ngày:</label>
            <form action="{{ route('home.index') }}" method="GET">
                @csrf
                <div class="input-group date" id="datepicker" data-target-input="nearest">
                    <input type="date" name="selectedDate" class="form-control datetimepicker-input"
                        data-target="#datepicker" value="{{ isset($selectedDate) }}">&nbsp&nbsp
                    <button type="submit" class="btn btn-primary" id="btnFilter">Thống kê</button>
                </div>
            </form>

            <div class="chart-container">
                @if (isset($thongKeData))
                    <h4>Ngày {{ $selectedDate }}:</h4>
                    <p class="thong-ke-info">Tổng số đơn hàng: {{ $thongKeData->orderCount }}</p>
                    <p class="thong-ke-info">Tổng doanh thu: {{ number_format($thongKeData->totalRevenue) }} VNĐ</p>

                    <div style="max-width: 600px; margin: auto;">
                        <canvas id="dailyRevenueChart" style="width: 100%;"></canvas>
                    </div>
                @endif
            </div>
        </div>
    </div> --}}

    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-3">
            <div class="row">
                {{-- Thong ke so don hang --}}
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Đơn Hàng</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt="">
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img
                                        src="{{ asset('adminmofi/assets/images/dashboard-3/icon/coin1.png') }}"
                                        alt="icon"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>{{ $orderCount }}</h2>
                                        <div class="d-flex total-icon">
                                            <p class="mb-0 up-arrow bg-light-success"><i
                                                    class="fa fa-arrow-up text-success"></i></p><span
                                                class="f-w-500 font-success">+ 20.08% </span>
                                        </div>
                                    </div>
                                    <p class="text-truncate">Trong năm 2024</p>
                                </div>
                            </div>
                            <div id="admissionRatio"></div>
                        </div>
                    </div>
                </div>
                {{-- Thong ke doanh thu --}}
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Doanh Thu</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown2" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown2"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img
                                        src="{{ asset('adminmofi/assets/images/dashboard-3/icon/shopping1.png') }}"
                                        alt="icon">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>{{ number_format($totalRevenue) }}</h2>
                                        <div class="d-flex total-icon">
                                            <p class="mb-0 up-arrow bg-light-danger"><i
                                                    class="fa fa-arrow-up text-danger"></i></p><span
                                                class="f-w-500 font-danger">- 10.02%</span>
                                        </div>
                                    </div>
                                    <p class="text-truncate">Trong năm 2024</p>
                                </div>
                            </div>
                            <div id="order-value"></div>
                        </div>
                    </div>
                </div>
                {{-- Thong ke so khach hang --}}
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Khách Hàng</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown3" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown3"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img
                                        src="{{ asset('adminmofi/assets/images/dashboard-3/icon/sent1.png') }}"
                                        alt="icon"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>{{ $customerCount }}</h2>
                                        <div class="d-flex total-icon">
                                            <p class="mb-0 up-arrow bg-light-success"><i
                                                    class="fa fa-arrow-up text-success"></i></p><span
                                                class="f-w-500 font-success">+ 13.23%</span>
                                        </div>
                                    </div>
                                    <p class="text-truncate">Trong năm 2024</p>
                                </div>
                            </div>
                            <div id="daily-value"></div>
                        </div>
                    </div>
                </div>
                {{-- Thong ke tong san pham --}}
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Sản Phẩm</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown4" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown4"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img
                                        src="{{ asset('adminmofi/assets/images/dashboard-3/icon/revenue1.png') }}"
                                        alt="icon">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>{{ $productCount }}</h2>
                                        <div class="d-flex total-icon">
                                            <p class="mb-0 up-arrow bg-light-danger"><i
                                                    class="fa fa-arrow-up text-danger"></i></p><span
                                                class="f-w-500 font-danger">- 17.06%</span>
                                        </div>
                                    </div>
                                    <p class="text-truncate">Trong năm 2024</p>
                                </div>
                            </div>
                            <div id="daily-revenue"></div>
                        </div>
                    </div>
                </div>
                {{-- Thong ke doanh so ban hang theo bieu do --}}
                <div class="col-xxl-12 col-xl-12 box-col-12 proorder-xl-8 proorder-md-9">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Doanh số bán hàng <br>
                                    <p class="text-truncate">Trong năm 2024</p>
                                </h4>

                                <div class="dropdown icon-dropdown">
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown14"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body sale-statistic">
                            <div id="chart-dash-2-line"></div>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var options = {
                            series: [{
                                    name: "Doanh Thu (triệu)",
                                    type: "area",
                                    data: @json($revenueData),
                                },
                                {
                                    name: "Sản Phẩm (chiếc)",
                                    type: "line",
                                    data: @json($productData),
                                },
                            ],
                            chart: {
                                height: 270,
                                type: "line",
                                toolbar: {
                                    show: false,
                                },
                                dropShadow: {
                                    enabled: true,
                                    top: 4,
                                    left: 1,
                                    blur: 8,
                                    color: [MofiAdminConfig.primary, "#8D8D8D"],
                                    opacity: 0.6,
                                },
                            },
                            stroke: {
                                curve: "smooth",
                                width: [3, 3],
                                dashArray: [0, 4],
                            },
                            grid: {
                                show: true,
                                borderColor: "rgba(106, 113, 133, 0.30)",
                                strokeDashArray: 3,
                            },
                            fill: {
                                type: "solid",
                                opacity: [0, 1],
                            },
                            labels: [
                                "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5",
                                "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10",
                                "Tháng 11", "Tháng 12"
                            ],
                            markers: {
                                size: [3, 0],
                                colors: ["#3D434A"],
                                strokeWidth: [0, 0],
                            },
                            responsive: [{
                                    breakpoint: 991,
                                    options: {
                                        chart: {
                                            height: 300,
                                        },
                                    },
                                },
                                {
                                    breakpoint: 1500,
                                    options: {
                                        chart: {
                                            height: 325,
                                        },
                                    },
                                },
                            ],
                            tooltip: {
                                shared: true,
                                intersect: false,
                                y: {
                                    formatter: function(value, {
                                        seriesIndex
                                    }) {
                                        if (seriesIndex === 0) {
                                            return value.toFixed(0) + " triệu đồng";
                                        } else {
                                            return value + " sản phẩm";
                                        }
                                    },
                                },
                            },
                            colors: [MofiAdminConfig.primary, "#8D8D8D"],
                            xaxis: {
                                labels: {
                                    style: {
                                        fontFamily: "Outfit, sans-serif",
                                        fontWeight: 500,
                                        colors: "#8D8D8D",
                                    },
                                },
                                axisBorder: {
                                    show: false,
                                },
                            },
                        };
                        var chart = new ApexCharts(document.querySelector("#chart-dash-2-line"), options);
                        chart.render();
                    });
                </script>
                {{-- Thong ke don hang gan day --}}
                <div class="col-xxl-12 col-xl-8 col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Đơn Hàng Gần Đây</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown5" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown5"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 recent-orders px-0">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table display" id="recent-orders" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </th>
                                            <th>Tên khách hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>QTY</th>
                                            <th>Customer</th>
                                            <th style="text-align: center">Giá</th>
                                            <th>Thông tin thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donHangGanDay as $donHang)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $donHang->customer->customer_name }}</td>
                                                <td>{{ $donHang->created_at }}</td>
                                                <td>QTY: 1</td> <!-- Đổi thành số lượng thực tế của đơn hàng -->
                                                <td class="customer-img">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0"><img
                                                                src="{{ asset('adminmofi/assets/images/dashboard-3/user/6.png') }}"
                                                                alt=""></div>
                                                        <div class="flex-grow-1">
                                                            <h6>{{ $donHang->customer->customer_name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>{{ number_format($donHang->order_total) }}VNĐ</p>
                                                </td>
                                                <td>
                                                    <div class="status-box">
                                                        <div class="btn background-light-success font-success f-w-500">
                                                            <a
                                                                href="{{ URL::to('/view-order/' . $donHang->order_id) }}">{{ $donHang->order_status }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- Thong ke so san pham theo danh muc --}}
                <div class="col-xl-6 col-lg-5 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Sản Phẩm Bán Được Theo Doanh Mục</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown8" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body revenue-category">
                            <div id="pie-chart" style="height: 250px;"></div>
                            <div class="donut-legend" id="legend"></div>
                        </div>
                    </div>
                </div>
                <script>
                    //  ========  Morris chart  ========
                    $(document).ready(function() {
                        var color_array = [
                            MofiAdminConfig.primary,
                            MofiAdminConfig.secondary,
                            "#C95E9E",
                            "#D77748",
                            "#7E6F6A",
                            "#36AFB2",
                            "#9c6db2",
                            "#d24a67",
                            "#89a958",
                            "#00739a",
                            "#BDBDBD",
                        ];

                        var data = @json($productsSoldPerCategory);
                        console.log(data); // Kiểm tra dữ liệu

                        var formattedData = data.map(function(item) {
                            return {
                                label: item.category,
                                value: item.total_sold
                            };
                        });
                        console.log(formattedData); // Kiểm tra dữ liệu đã định dạng

                        var browsersChart = Morris.Donut({
                            element: "pie-chart",
                            data: formattedData,
                            colors: color_array,
                        });

                        browsersChart.options.data.forEach(function(label, i) {
                            var legendItem = $("<span></span>")
                                .text(label["label"])
                                .prepend("<i>&nbsp;</i>");
                            legendItem
                                .find("i")
                                .css("backgroundColor", browsersChart.options.colors[i]);
                            $("#legend").append(legendItem);
                        });
                    });
                    // ===================
                </script>

                {{-- Thong ke khach hang than thiet --}}
                <div class="col-xl-6 col-lg-5 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top top-sellers">
                                <h4 class="text-truncate">Khách hàng thân thiết <br><span style="font-size: 14px">(Số đơn
                                        hàng >=2)</span></h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown10" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown10">
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 seller-month px-0">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table display" id="seller-month" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </th>
                                            <th style="text-align: center">Email</th>
                                            <th style="text-align: center">Tên khách hàng</th>
                                            <th style="text-align: center">Số đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($khachHangThanThiet as $khachHang)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0">
                                                            <!-- Thay đổi ảnh của khách hàng -->
                                                            <img src="{{ asset('adminmofi/assets/images/dashboard-3/user/2.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <!-- Thay đổi tên khách hàng -->
                                                            <h5 style="color: black">{{ $khachHang->customer_email }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="text-align: center">
                                                    <!-- Thay đổi email của khách hàng -->
                                                    {{ $khachHang->customer_name }}
                                                </td>
                                                <td style="text-align: center">
                                                    <!-- Thay đổi số lượng đơn hàng của khách hàng -->
                                                    {{ $khachHang->totalOrders }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Thong ke san pham ban chay nhat --}}
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-body product-slider">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="text-truncate">Sản Phẩm Bán Chạy Nhất</h4><br>
                                    <div class="product-page-main p-0">
                                        <div class="row">
                                            <div class="col-3 product-thumbnail">
                                                <div class="pro-slide-right">
                                                    @foreach ($bestSellingProduct->images as $image)
                                                        <div class="mt-4">
                                                            <div class="slide-box"><img class="img-fluid"
                                                                    src="{{ asset($image->image_path) }}" alt="">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-9 px-0 product-main">
                                                <div class="pro-slide-single">
                                                    @foreach ($bestSellingProduct->images as $image)
                                                        <div> <img class="img-fluid"
                                                                src="{{ asset($image->image_path) }}" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="product-details my-4"><a href="#">
                                            <h4 class="">{{ $bestSellingProduct->name }}</h4>
                                        </a><br>
                                        <h4 class="font-primary">Giá bán:
                                            {{ number_format($bestSellingProduct->sale_price) }} VNĐ</h4>
                                        <h5>Giá gốc: <del>{{ number_format($bestSellingProduct->price) }} VNĐ</del></h5>
                                        <br>
                                        <h5>Số lượng bán: {{ $bestSellingProduct->total_sold }}</h5><br>
                                        <div class="discount-box">
                                            <h6>Đồng hồ thông minh</h6>
                                        </div>
                                        <div class="countdown" id="clock-arrival" data-hours="1" data-minutes="2"
                                            data-seconds="3">
                                            <ul>
                                                <li><span class="days time"></span><span class="title">Ngày</span></li>
                                                <li><span class="hours time"></span><span class="title">Giờ</span></li>
                                                <li class="px-3"><span class="minutes time"></span><span
                                                        class="title">Phút</span></li>
                                                <li class="px-3"><span class="seconds time"></span><span
                                                        class="title">Giây</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Thong ke san pham ban chay --}}
                <div class="col-xl-6 col-lg-12 ">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top top-sellers">
                                <h4 class="text-truncate">Sản Phẩm Bán Chạy</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown10" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px"
                                            alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown10"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 seller-month px-0">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table display" id="seller-month" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </th>
                                            <th>Sản phẩm</th>
                                            {{-- <th>Brand Name</th> --}}
                                            <th style="text-align: center">Số lượng tồn kho hehe</th>
                                            <th style="text-align: center">Giá bán</th>
                                            <th style="text-align: center">Số lượng bán</th>
                                            {{-- <th>Earnings</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bestSellingProducts as $product)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="flex-shrink-0"><img style="width: 50px;"
                                                                src="{{ config('app.base_url') . $product->feature_image_path }}"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-grow-1"><a href="#">
                                                                <span
                                                                    style="color: black; text-align: center">{{ $product->name }}</span>
                                                            </a></div>
                                                    </div>
                                                </td>
                                                <td>Adidas</td>
                                                {{-- <td>Clothes</td> --}}
                                                <td style="text-align: center">{{ number_format($product->sale_price) }}
                                                    VND </td>
                                                <td style="text-align: center">{{ $product->total_sold }}</td>
                                                {{-- <td>$24375</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Morris.js and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
