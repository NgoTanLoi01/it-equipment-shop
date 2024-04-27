@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    window.onload = function() {
        // Nếu có dữ liệu doanh thu, thì mới vẽ biểu đồ
        @if (isset($thongKeData))
            var ctx = document.getElementById('dailyRevenueChart').getContext('2d');
            var dailyRevenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['{{ $selectedDate }}'],
                    datasets: [{
                            label: 'Doanh thu (VNĐ)',
                            data: [{{ $thongKeData->totalRevenue }}],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Số lượng đơn hàng',
                            data: [{{ $thongKeData->orderCount }}],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                displayFormats: {
                                    day: 'DD/MM/YYYY'
                                }
                            }
                        },
                        y: [{
                                id: 'revenue-axis',
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value, index, values) {
                                        // Sử dụng hàm toLocaleString để định dạng số
                                        return value.toLocaleString('vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        });
                                    }
                                }
                            },
                            {
                                id: 'order-axis',
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        ]
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.dataset.label || '';

                                    if (label) {
                                        label += ': ';
                                    }

                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('vi-VN').format(context.parsed
                                            .y);
                                    }

                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        @endif
    }
</script> --}}

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
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Đơn Hàng</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt="">
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
                                <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/icon/coin1.png') }}"
                                        alt="icon"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>12</h2>
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
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Doanh Thu</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown2" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown2"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/icon/shopping1.png') }}"
                                        alt="icon">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>234,000,000</h2>
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
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Khách Hàng</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown3" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown3"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/icon/sent1.png') }}"
                                        alt="icon"></div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>7</h2>
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
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top daily-revenue-card">
                                <h4>Tổng Số Sản Phẩm</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown4" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown4"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 total-sells-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/icon/revenue1.png') }}"
                                        alt="icon">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h2>36</h2>
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
                <div class="col-xxl-7 col-xl-8 col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Đơn Hàng Gần Đây</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown5" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
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
                                            <th>Recent Orders</th>
                                            <th>Order Date</th>
                                            <th>QTY</th>
                                            <th>Customer</th>
                                            <th>Price </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/1.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Decorative Plants</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>20 Sep - 03.00AM</td>
                                            <td>QTY:12</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/6.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Leonie Green </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-success font-success f-w-500">Succeed
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/2.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Sticky Calender</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>12 Mar - 08.12AM</td>
                                            <td>QTY:14</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/8.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Peter White</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-warning font-warning f-w-500">Waiting
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/3.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Crystal Mug</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Feb 15 - 10.00AM</td>
                                            <td>QTY:19</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/7.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Ruby Yang </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-success font-success f-w-500">Succeed
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/4.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Motion Table Lamp</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Jun 10 - 12.30AM</td>
                                            <td>QTY:17</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/8.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Visha Long</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-danger font-danger f-w-500">Canceled
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/2.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Sticky Calender</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>12 Mar - 08.12AM</td>
                                            <td>QTY:14</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/8.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Peter White</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-warning font-warning f-w-500">Waiting
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/3.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Crystal Mug</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Feb 15 - 10.00AM</td>
                                            <td>QTY:19</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/7.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Ruby Yang </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-success font-success f-w-500">Succeed
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/4.png') }}" alt=""></div>
                                                    <div class="flex-grow-1"><a href="checkout.html">
                                                            <h6 style="color: black">Motion Table Lamp</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Jun 10 - 12.30AM</td>
                                            <td>QTY:17</td>
                                            <td class="customer-img">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/8.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6>Visha Long</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>$637.30</p>
                                            </td>
                                            <td>
                                                <div class="status-box">
                                                    <div class="btn background-light-danger font-danger f-w-500">Canceled
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-4 col-lg-7 col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Doanh Số Bán Hàng</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown6" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown6"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div id="salse-overview"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Khách Hàng Thân Thiết</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown7" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown7"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="recent-customers">
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/user/1.png') }}"
                                            alt=""></div>
                                    <div class="flex-grow-1"><a href="cart.html">
                                            <h5>Junsung Park</h5>
                                        </a>
                                        <p class="text-truncate">ID #32449<span class="text-success">Paid</span></p>
                                    </div>
                                    <div class="active-status active-online"></div>
                                    <div class="recent-text">
                                        <h5>$8282.13</h5>
                                        <p>50 min ago</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/user/2.png') }}"
                                            alt=""></div>
                                    <div class="flex-grow-1"><a href="cart.html">
                                            <h5>Yongjae Choi</h5>
                                        </a>
                                        <p class="text-truncate">ID #95460<span class="text-danger">Pending</span></p>
                                    </div>
                                    <div class="active-status active-online"></div>
                                    <div class="recent-text">
                                        <h5>$9546.84 </h5>
                                        <p>34 min ago</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/user/3.png') }}"
                                            alt=""></div>
                                    <div class="flex-grow-1"><a href="cart.html">
                                            <h5>Seonil Jang</h5>
                                        </a>
                                        <p class="text-truncate">ID #95468<span class="text-success">Paid</span></p>
                                    </div>
                                    <div class="active-status active-online"></div>
                                    <div class="recent-text">
                                        <h5>$2354.16</h5>
                                        <p>30 min ago</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/user/4.png') }}"
                                            alt=""></div>
                                    <div class="flex-grow-1"><a href="cart.html">
                                            <h5>Joohee Min</h5>
                                        </a>
                                        <p class="text-truncate">ID #95462<span class="text-danger"> Pending</span></p>
                                    </div>
                                    <div class="active-status active-online"></div>
                                    <div class="recent-text">
                                        <h5>$3254.35</h5>
                                        <p>25 min ago</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <div class="flex-shrink-0"><img src="{{ asset('adminmofi/assets/images/dashboard-3/user/5.png') }}"
                                            alt=""></div>
                                    <div class="flex-grow-1"><a href="cart.html">
                                            <h5>Soojung Kin</h5>
                                        </a>
                                        <p class="text-truncate">ID #34586<span class="text-success">Paid</span></p>
                                    </div>
                                    <div class="active-status active-online"></div>
                                    <div class="recent-text">
                                        <h5>$3654.32</h5>
                                        <p>23 min ago</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-sm-6">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Doanh Thu Theo Danh Mục</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown8" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown8"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body revenue-category">
                            <div id="pie-chart"></div>
                            <div class="donut-legend" id="legend"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-6 col-lg-7 col-sm-12">
                    <div class="card overflow-hidden">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top">
                                <h4>Người Mua Theo Quốc Gia</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown9" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown9"><a
                                            class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                            href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body user-continent pb-0">
                            <div class="user-map-menu d-flex align-items-center gap-5">
                                <div class="user-items">
                                    <h5>1,506<span>items</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-tertiary" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="map-items">
                                    <ul class="d-flex align-items-center gap-3">
                                        <li>
                                            <h5><span class="bg-primary"></span>Keyboard</h5>
                                            <p class="mb-0">651</p>
                                        </li>
                                        <li>
                                            <h5><span class="bg-secondary"></span>Laptops</h5>
                                            <p class="mb-0">345</p>
                                        </li>
                                        <li>
                                            <h5><span class="bg-warning"></span>Desktop</h5>
                                            <p class="mb-0">654</p>
                                        </li>
                                        <li>
                                            <h5><span class="bg-tertiary"></span>Mouse</h5>
                                            <p class="mb-0">954</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="contries-sale d-flex gap-4">
                                <div class="map-value">
                                    <h5>All Over Contries's Sale</h5>
                                    <ul>
                                        <li>
                                            <div class="d-flex gap-2">
                                                <div class="flex-shrink-0">
                                                    <svg>
                                                        <use class="fill-primary"
                                                            href="{{ asset('adminmofi/assets/svg/icon-sprite.svg#map-loaction') }}">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>United States</h6>
                                                </div><span>53.23%</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex gap-2">
                                                <div class="flex-shrink-0">
                                                    <svg>
                                                        <use class="fill-secondary"
                                                            href="{{ asset('adminmofi/assets/svg/icon-sprite.svg#map-loaction') }}">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>Romania</h6>
                                                </div><span>31.85%</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex gap-2">
                                                <div class="flex-shrink-0">
                                                    <svg>
                                                        <use class="fill-warning"
                                                            href="{{ asset('adminmofi/assets/svg/icon-sprite.svg#map-loaction') }}">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>Austalia</h6>
                                                </div><span>12.98%</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex gap-2">
                                                <div class="flex-shrink-0">
                                                    <svg>
                                                        <use class="fill-tertiary"
                                                            href="{{ asset('adminmofi/assets/svg/icon-sprite.svg#map-loaction') }}">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>Germany</h6>
                                                </div><span>45.23%</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex gap-2">
                                                <div class="flex-shrink-0">
                                                    <svg>
                                                        <use class="fill-success"
                                                            href="{{ asset('adminmofi/assets/svg/icon-sprite.svg#map-loaction') }}">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>Africa</h6>
                                                </div><span>23.15%</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex gap-2">
                                                <div class="flex-shrink-0">
                                                    <svg>
                                                        <use class="fill-danger"
                                                            href="{{ asset('adminmofi/assets/svg/icon-sprite.svg#map-loaction') }}">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>Europe</h6>
                                                </div><span>95.75%</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="map">
                                    <div class="jvector-map-height" id="world-map2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                                                    <div class="mt-4">
                                                        <div class="slide-box"><img class="img-fluid"
                                                                src="{{ asset('adminmofi/assets/images/dashboard-3/slider/1.png') }}"
                                                                alt=""></div>
                                                    </div>
                                                    <div>
                                                        <div class="slide-box"><img class="img-fluid"
                                                                src="{{ asset('adminmofi/assets/images/dashboard-3/slider/2.png') }}"
                                                                alt=""></div>
                                                    </div>
                                                    <div>
                                                        <div class="slide-box"><img class="img-fluid"
                                                                src="{{ asset('adminmofi/assets/images/dashboard-3/slider/3.png') }}"
                                                                alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9 px-0 product-main">
                                                <div class="pro-slide-single">
                                                    <div> <img class="img-fluid"
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/slider/4.png') }}"
                                                            alt=""></div>
                                                    <div><img class="img-fluid"
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/slider/5.png') }}"
                                                            alt=""></div>
                                                    <div><img class="img-fluid"
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/slider/6.png') }}"
                                                            alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="product-details my-4"><a href="product-page.html">
                                            <h4 class="text-truncate">Women’s Fit and Flare Knee length one Piece Dress
                                            </h4>
                                        </a>
                                        <h3 class="font-primary">$126</h3>
                                        <h5>Select size:</h5>
                                        <ul class="product-size">
                                            <li>S </li>
                                            <li>M </li>
                                            <li>L </li>
                                            <li>XL</li>
                                        </ul>
                                        <h5>Colour:</h5>
                                        <ul class="product-color">
                                            <li class="border-primary"><span class="bg-primary"> <i
                                                        class="icon-check"></i></span></li>
                                            <li class="border-secondary"><span class="bg-secondary"> </span></li>
                                            <li class="border-warning"><span class="bg-warning"> </span></li>
                                            <li class="border-tertiary"><span class="bg-tertiary"></span></li>
                                        </ul>
                                        <div class="discount-box">
                                            <h6>Special Discount </h6>
                                        </div>
                                        <h3 class="text-truncate">Deal of the Day From <span class="font-secondary">$48
                                            </span></h3>
                                        <div class="countdown" id="clock-arrival" data-hours="1" data-minutes="2"
                                            data-seconds="3">
                                            <ul>
                                                <li><span class="days time"></span><span class="title">Days</span></li>
                                                <li><span class="hours time"></span><span class="title">Hours</span></li>
                                                <li class="px-3"><span class="minutes time"></span><span
                                                        class="title">Min</span></li>
                                                <li class="px-3"><span class="seconds time"></span><span
                                                        class="title">Sec</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <div class="header-top top-sellers">
                                <h4 class="text-truncate">Sản Phẩm Bán Chạy</h4>
                                <div class="dropdown icon-dropdown">
                                    <button class="btn dropdown-toggle" id="userdropdown10" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{ asset('adminmofi/assets/images/icon/more.png') }}" width="16px" alt=""></button>
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
                                            <th>Seller Name</th>
                                            <th>Brand Name</th>
                                            <th>Product</th>
                                            <th>Sold</th>
                                            <th>Price</th>
                                            <th>Earnings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/9.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1"><a href="product-page.html">
                                                            <h6>Gary Waters</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Adidas</td>
                                            <td>Clothes</td>
                                            <td>650 </td>
                                            <td>
                                                <p>$37.50</p>
                                            </td>
                                            <td>$24375</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/10.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1"><a href="product-page.html">
                                                            <h6>Edwin Hogan</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Nike</td>
                                            <td>Shoes</td>
                                            <td>956</td>
                                            <td>
                                                <p>$24.75</p>
                                            </td>
                                            <td>$23661</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/11.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1"><a href="product-page.html">
                                                            <h6>Aaron Hogan</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>Sony</td>
                                            <td>Electronics</td>
                                            <td>348</td>
                                            <td>
                                                <p>$184.50</p>
                                            </td>
                                            <td>$64206</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="flex-shrink-0"><img
                                                            src="{{ asset('adminmofi/assets/images/dashboard-3/user/12.png') }}" alt="">
                                                    </div>
                                                    <div class="flex-grow-1"><a href="product-page.html">
                                                            <h6>Ralph Waters</h6>
                                                        </a></div>
                                                </div>
                                            </td>
                                            <td>i Phone</td>
                                            <td>Mobile</td>
                                            <td>100</td>
                                            <td>
                                                <p>$150.25</p>
                                            </td>
                                            <td>$15025</td>
                                        </tr>
                                        
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
