@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</script>

<style>
    /* Style cho các small-box */
    .small-box {
        background-color: #f8f9fa;
        color: #495057;
        margin-bottom: 20px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .small-box .inner {
        padding: 10px;
        border-bottom: 3px solid #dee2e6;
    }

    /* Hover effect */
    .small-box:hover {
        transform: translateY(-5px);
    }

    /* Style cho nút và input */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .form-control {
        border-color: #ced4da;
    }

    /* Style cho thông tin thống kê */
    .thong-ke-info {
        color: #28a745;
        font-size: 18px;
        margin-bottom: 5px;
    }

    h2 {
        font-weight: bold;
        padding: 8px;
        background-color: #d2e2ef;
        text-align: center;
        font-family: "DejaVu Sans", sans-serif;
    }

    footer {
        margin-top: 220px;
        /* Thử giảm giá trị lề trên của footer */
    }
</style>

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <br>
                <h2>TỔNG THỐNG KÊ</h2>
                {{-- Thống kê --}}
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

                    <!-- Box thống kê theo tháng - Tổng doanh thu -->
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

                    <!-- Box thống kê theo tháng - Tổng số khách hàng -->
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

                    <!-- Box thống kê theo tháng - Tổng số mặt hàng -->
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

        
        <!-- Thống kê doanh thu theo ngày -->
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
    </div>
@endsection
