(function () {
    //  Traffic chart start
    var admissionRatioOption = {
        series: [
            {
                name: "",
                data: [
                    30, 29.31, 29.7, 29.7, 31.32, 31.65, 31.13, 29.8, 31.79,
                    31.67, 32.39, 30.63, 32.89, 31.99, 31.23, 31.57, 30.84,
                    31.07, 31.41, 31.17, 34, 34.5, 34.5, 32.53, 31.37, 32.43,
                    32.44, 30.2, 30.14, 30.65, 30.4, 30.65, 31.43, 31.89, 31.38,
                    30.64, 31.02, 30.33, 32.95, 31.89, 30.01, 30.88, 30.69,
                    30.58, 32.02, 32.14, 30.37, 30.51, 32.65, 32.64, 32.27,
                    32.1, 32.91, 30.65, 30.8, 31.92,
                ],
            },
        ],
        chart: {
            type: "area",
            height: 90,
            offsetY: -10,
            offsetX: 0,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: 2,
            curve: "smooth",
        },
        grid: {
            show: false,
            borderColor: "var(--light)",
            padding: {
                top: 5,
                right: 0,
                bottom: -30,
                left: 0,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.5,
                opacityTo: 0.1,
                stops: [0, 90, 100],
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: [MofiAdminConfig.primary],
        xaxis: {
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            opposite: false,
            min: 29,
            max: 35,
            logBase: 100,
            tickAmount: 4,
            forceNiceScale: false,
            floating: false,
            decimalsInFloat: undefined,
            labels: {
                show: false,
                offsetX: -12,
                offsetY: -15,
                rotate: 0,
            },
        },
        legend: {
            horizontalAlign: "left",
        },
    };

    var admissionRatio = new ApexCharts(
        document.querySelector("#admissionRatio"),
        admissionRatioOption
    );
    admissionRatio.render();
    // ==============================
    var admissionRatioOption = {
        series: [
            {
                name: "",
                data: [
                    30, 32.31, 31.47, 30.69, 29.32, 31.65, 31.13, 31.77, 31.79,
                    31.67, 32.39, 32.63, 32.89, 31.99, 31.23, 31.57, 30.84,
                    31.07, 31.41, 31.17, 32.37, 32.19, 32.51, 32.53, 31.37,
                    30.43, 30.44, 30.2, 30.14, 30.65, 30.4, 30.65, 31.43, 31.89,
                    31.38, 30.64, 30.02, 30.33, 30.95, 31.89, 31.01, 30.88,
                    30.69, 30.58, 32.02, 32.14, 32.37, 32.51, 32.65, 32.64,
                    32.27, 32.1, 32.91, 33.65, 33.8, 33.92,
                ],
            },
        ],
        chart: {
            type: "area",
            height: 90,
            offsetY: -10,
            offsetX: 0,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: 2,
            curve: "smooth",
        },
        grid: {
            show: false,
            borderColor: "var(--light)",
            padding: {
                top: 5,
                right: 0,
                bottom: -30,
                left: 0,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.5,
                opacityTo: 0.1,
                stops: [0, 80, 100],
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: [MofiAdminConfig.secondary],
        xaxis: {
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            opposite: false,
            min: 29,
            max: 35,
            logBase: 100,
            tickAmount: 4,
            forceNiceScale: false,
            floating: false,
            decimalsInFloat: undefined,
            labels: {
                show: false,
                offsetX: -12,
                offsetY: -15,
                rotate: 0,
            },
        },
        legend: {
            horizontalAlign: "left",
        },
        responsive: [],
    };

    var admissionRatio = new ApexCharts(
        document.querySelector("#order-value"),
        admissionRatioOption
    );
    admissionRatio.render();
    // ======================================
    var admissionRatioOption = {
        series: [
            {
                name: "",
                data: [
                    30, 29.31, 29.7, 29.7, 31.32, 31.65, 31.13, 29.8, 31.79,
                    31.67, 32.39, 30.63, 32.89, 31.99, 31.23, 31.57, 30.84,
                    31.07, 31.41, 31.17, 34, 34.5, 34.5, 32.53, 31.37, 32.43,
                    32.44, 30.2, 30.14, 30.65, 30.4, 30.65, 31.43, 31.89, 31.38,
                    30.64, 31.02, 30.33, 32.95, 31.89, 30.01, 30.88, 30.69,
                    30.58, 32.02, 32.14, 30.37, 30.51, 32.65, 32.64, 32.27,
                    32.1, 32.91, 30.65, 30.8, 31.92,
                ],
            },
        ],
        chart: {
            type: "area",
            height: 90,
            offsetY: -10,
            offsetX: 0,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: 2,
            curve: "smooth",
        },
        grid: {
            show: false,
            borderColor: "var(--light)",
            padding: {
                top: 5,
                right: 0,
                bottom: -30,
                left: 0,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.5,
                opacityTo: 0.1,
                stops: [0, 90, 100],
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#D77748"],
        xaxis: {
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            opposite: false,
            min: 29,
            max: 35,
            logBase: 100,
            tickAmount: 4,
            forceNiceScale: false,
            floating: false,
            decimalsInFloat: undefined,
            labels: {
                show: false,
                offsetX: -12,
                offsetY: -15,
                rotate: 0,
            },
        },
        legend: {
            horizontalAlign: "left",
        },
        responsive: [],
    };

    var admissionRatio = new ApexCharts(
        document.querySelector("#daily-value"),
        admissionRatioOption
    );
    admissionRatio.render();
    // ======================================
    var admissionRatioOption = {
        series: [
            {
                name: "",
                data: [
                    29, 30.31, 30.7, 31.69, 31.32, 31.65, 31.13, 31.77, 31.79,
                    31.67, 32.39, 32.63, 32.89, 31.99, 31.23, 31.57, 30.84,
                    31.07, 31.41, 31.17, 32.37, 32.19, 32.51, 32.53, 31.37,
                    30.43, 30.44, 30.2, 30.14, 30.65, 30.4, 30.65, 31.43, 31.89,
                    31.38, 30.64, 30.02, 30.33, 30.95, 31.89, 31.01, 30.88,
                    30.69, 30.58, 32.02, 32.14, 32.37, 32.51, 32.65, 32.64,
                    32.27, 32.1, 32.91, 33.65, 33.8, 33.92,
                ],
            },
        ],
        chart: {
            type: "area",
            height: 90,
            offsetY: -10,
            offsetX: 0,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: 2,
            curve: "smooth",
        },
        grid: {
            show: false,
            borderColor: "var(--light)",
            padding: {
                top: 5,
                right: 0,
                bottom: -30,
                left: 0,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.5,
                opacityTo: 0.1,
                stops: [0, 90, 100],
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#C95E9E"],
        xaxis: {
            labels: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            opposite: false,
            min: 29,
            max: 35,
            logBase: 100,
            tickAmount: 4,
            forceNiceScale: false,
            floating: false,
            decimalsInFloat: undefined,
            labels: {
                show: false,
                offsetX: -12,
                offsetY: -15,
                rotate: 0,
            },
        },
        legend: {
            horizontalAlign: "left",
        },
        responsive: [],
    };

    var admissionRatio = new ApexCharts(
        document.querySelector("#daily-revenue"),
        admissionRatioOption
    );
    admissionRatio.render();

    //  ========  Morris chart  ========
    // $(document).ready(function () {
    //     var color_array = [
    //         MofiAdminConfig.primary,
    //         MofiAdminConfig.secondary,
    //         "#C95E9E",
    //         "#D77748",
    //         "#7E6F6A",
    //         "#36AFB2",
    //         "#9c6db2",
    //         "#d24a67",
    //         "#89a958",
    //         "#00739a",
    //         "#BDBDBD",
    //     ];

    //     var data = @json($productsSoldPerCategory);

    //     var formattedData = data.map(function(item) {
    //         return { label: item.category, value: item.total_sold };
    //     });

    //     var browsersChart = Morris.Donut({
    //         element: "pie-chart",
    //         data: formattedData,
    //         colors: color_array,
    //     });

    //     browsersChart.options.data.forEach(function (label, i) {
    //         var legendItem = $("<span></span>")
    //             .text(label["label"])
    //             .prepend("<i>&nbsp;</i>");
    //         legendItem
    //             .find("i")
    //             .css("backgroundColor", browsersChart.options.colors[i]);
    //         $("#legend").append(legendItem);
    //     });
    // });
    // ===================

    const Option = {
        series: [
            {
                data: [
                    {
                        x: "Tháng 1",
                        y: [140, 360],
                    },
                    {
                        x: "Tháng 2",
                        y: [180, 400],
                    },
                    {
                        x: "Tháng 3",
                        y: [160, 400],
                    },
                    {
                        x: "Tháng 4",
                        y: [180, 420],
                    },
                    {
                        x: "Tháng 5",
                        y: [160, 480],
                    },
                    {
                        x: "Tháng 6",
                        y: [160, 300],
                    },
                    {
                        x: "Tháng 7",
                        y: [190, 400],
                    },
                    {
                        x: "Tháng 8",
                        y: [140, 300],
                    },
                    {
                        x: "Tháng 9",
                        y: [200, 420],
                    },
                    {
                        x: "Tháng 10",
                        y: [180, 280],
                    },
                    {
                        x: "Tháng 11",
                        y: [170, 410],
                    },
                    {
                        x: "Tháng 12",
                        y: [160, 380],
                    },
                ],
            },
        ],
        chart: {
            type: "rangeBar",
            height: 350,
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        grid: {
            show: true,
            borderColor: "rgba(106, 113, 133, 0.30)",
            strokeDashArray: 3,
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: [MofiAdminConfig.primary],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [65, 35],
            },
        },
        tooltip: {
            enabled: false,
        },
        colors: ["#48A3D7"],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "40%",
                borderRadius: 4,
            },
        },
        dataLabels: {
            enabled: false,
        },

        yaxis: {
            logBase: 100,
            tickAmount: 4,
            min: 100,
            max: 500,
            labels: {
                show: true,
                align: "right",
                minWidth: 0,
                maxWidth: 34,

                formatter: (value) => {
                    return `${value}k`;
                },

                style: {
                    fontFamily: "Outfit, sans-serif",
                    fontWeight: 500,
                    colors: "#3D434A",
                },
            },
        },
        xaxis: {
            categories: [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12",
            ],
            labels: {
                minHeight: undefined,
                maxHeight: 24,
                offsetX: 0,
                offsetY: 0,

                style: {
                    fontFamily: "Outfit, sans-serif",
                    fontWeight: 500,
                    colors: "#8D8D8D",
                },
            },
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
        },
        responsive: [
            {
                breakpoint: 1401,
                options: {
                    series: [
                        {
                            data: [
                                {
                                    x: "Tháng 1",
                                    y: [140, 360],
                                },
                                {
                                    x: "Tháng 2",
                                    y: [180, 400],
                                },
                                {
                                    x: "Tháng 3",
                                    y: [160, 400],
                                },
                                {
                                    x: "Tháng 4",
                                    y: [180, 420],
                                },
                                {
                                    x: "Tháng 5",
                                    y: [160, 480],
                                },
                                {
                                    x: "Tháng 6",
                                    y: [160, 300],
                                },
                                {
                                    x: "Tháng 7",
                                    y: [190, 400],
                                },
                                {
                                    x: "Tháng 8",
                                    y: [140, 300],
                                },
                                {
                                    x: "Tháng 9",
                                    y: [200, 420],
                                },
                                {
                                    x: "Tháng 10",
                                    y: [180, 280],
                                },
                                {
                                    x: "Tháng 11",
                                    y: [170, 410],
                                },
                                {
                                    x: "Tháng 12",
                                    y: [160, 380],
                                },
                            ],
                        },
                    ],
                },
            },
            {
                breakpoint: 1199,
                options: {
                    series: [
                        {
                            data: [
                                {
                                    x: "Tháng 1",
                                    y: [140, 360],
                                },
                                {
                                    x: "Tháng 2",
                                    y: [180, 400],
                                },
                                {
                                    x: "Tháng 3",
                                    y: [160, 400],
                                },
                                {
                                    x: "Tháng 4",
                                    y: [180, 420],
                                },
                                {
                                    x: "Tháng 5",
                                    y: [160, 480],
                                },
                                {
                                    x: "Tháng 6",
                                    y: [160, 300],
                                },
                                {
                                    x: "Tháng 7",
                                    y: [190, 400],
                                },
                                {
                                    x: "Tháng 8",
                                    y: [140, 300],
                                },
                                {
                                    x: "Tháng 9",
                                    y: [200, 420],
                                },
                                {
                                    x: "Tháng 10",
                                    y: [180, 280],
                                },
                                {
                                    x: "Tháng 11",
                                    y: [170, 410],
                                },
                                {
                                    x: "Tháng 12",
                                    y: [160, 380],
                                },
                            ],
                        },
                    ],
                },
            },
            {
                breakpoint: 1199,
                options: {
                    chart: {
                        height: 275,
                    },
                },
            },
            {
                breakpoint: 500,
                options: {
                    series: [
                        {
                            data: [
                                {
                                    x: "Tháng 1",
                                    y: [140, 360],
                                },
                                {
                                    x: "Tháng 2",
                                    y: [180, 400],
                                },
                                {
                                    x: "Tháng 3",
                                    y: [160, 400],
                                },
                                {
                                    x: "Tháng 4",
                                    y: [180, 420],
                                },
                                {
                                    x: "Tháng 5",
                                    y: [160, 480],
                                },
                                {
                                    x: "Tháng 6",
                                    y: [160, 300],
                                },
                                {
                                    x: "Tháng 7",
                                    y: [190, 400],
                                },
                                {
                                    x: "Tháng 8",
                                    y: [140, 300],
                                },
                                {
                                    x: "Tháng 9",
                                    y: [200, 420],
                                },
                                {
                                    x: "Tháng 10",
                                    y: [180, 280],
                                },
                                {
                                    x: "Tháng 11",
                                    y: [170, 410],
                                },
                                {
                                    x: "Tháng 12",
                                    y: [160, 380],
                                },
                            ],
                        },
                    ],
                },
            },
        ],
    };

    const ChartEl = new ApexCharts(
        document.querySelector("#salse-overview"),
        Option
    );
    ChartEl.render();

    // var options = {
    //     series: [
    //         {
    //             name: "Doanh Thu (triệu)",
    //             type: "area",
    //             data: [
    //                 20, 50, 60, 180, 90, 340, 120, 250, 190, 100, 180, 380, 190,
    //                 220, 100, 90, 140, 70, 130, 90, 100, 50, 0,
    //             ],
    //         },
    //         {
    //             name: "Sản Phẩm (chiếc)",
    //             type: "line",
    //             data: [
    //                 20, 70, 30, 100, 120, 220, 250, 100, 200, 300, 330, 270,
    //                 300, 200, 180, 220, 130, 300, 220, 180, 40, 70, 0,
    //             ],
    //         },
    //     ],
    //     chart: {
    //         height: 270,
    //         type: "line",
    //         toolbar: {
    //             show: false,
    //         },
    //         dropShadow: {
    //             enabled: true,
    //             top: 4,
    //             left: 1,
    //             blur: 8,
    //             color: [MofiAdminConfig.primary, "#8D8D8D"],
    //             opacity: 0.6,
    //         },
    //     },
    //     stroke: {
    //         curve: "smooth",
    //         width: [3, 3],
    //         dashArray: [0, 4],
    //     },
    //     grid: {
    //         show: true,
    //         borderColor: "rgba(106, 113, 133, 0.30)",
    //         strokeDashArray: 3,
    //     },
    //     fill: {
    //         type: "solid",
    //         opacity: [0, 1],
    //     },

    //     labels: [
    //         "Tháng 1",
    //         "",
    //         "Tháng 2",
    //         "",
    //         "Tháng 3",
    //         "",
    //         "Tháng 4",
    //         "",
    //         "Tháng 5",
    //         "",
    //         "Tháng 6",
    //         "",
    //         "Tháng 7",
    //         "",
    //         "Tháng 8",
    //         "",
    //         "Tháng 9",
    //         "",
    //         "Tháng 10",
    //         "",
    //         "Tháng 11",
    //         "",
    //         "Tháng 12",
    //     ],
    //     markers: {
    //         size: [3, 0],
    //         colors: ["#3D434A"],
    //         strokeWidth: [0, 0],
    //     },
    //     responsive: [
    //         {
    //             breakpoint: 991,
    //             options: {
    //                 chart: {
    //                     height: 300,
    //                 },
    //             },
    //         },
    //         {
    //             breakpoint: 1500,
    //             options: {
    //                 chart: {
    //                     height: 325,
    //                 },
    //             },
    //         },
    //     ],
    //     tooltip: {
    //         shared: true,
    //         intersect: false,
    //         y: {
    //             formatter: function (
    //                 value,
    //                 { series, seriesIndex, dataPointIndex, w }
    //             ) {
    //                 if (seriesIndex === 0) {
    //                     // Kiểm tra nếu đang xử lý series "Doanh Thu"
    //                     return value.toFixed(0) + " VNĐ";
    //                 } else {
    //                     // Đối với series "Sản Phẩm"
    //                     return value + " sản phẩm";
    //                 }
    //             },
    //         },
    //     },
    //     colors: [MofiAdminConfig.primary, "#8D8D8D"],
    //     xaxis: {
    //         labels: {
    //             style: {
    //                 fontFamily: "Outfit, sans-serif",
    //                 fontWeight: 500,
    //                 colors: "#8D8D8D",
    //             },
    //         },
    //         axisBorder: {
    //             show: false,
    //         },
    //     },
    // };
    var chart = new ApexCharts(
        document.querySelector("#chart-dash-2-line"),
        options
    );
    chart.render();
})();
