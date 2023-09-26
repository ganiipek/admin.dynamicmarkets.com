(function ($) {
    /* "use strict" */

    var dlabChartlist = function () {

        var screenWidth = $(window).width();
        //let draw = Chart.controllers.line.__super__.draw; //draw shadow
        var activity = async function () {
            var root = window.location.protocol + '//' + window.location.host;
            console.log(root)

            $.ajax({
                type: "GET",
                url: '/action/statistics/registered_users',
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content')
                },
                success: function (response) {
                    console.log(response)
                    var this_week_series = [];
                    var last_week_series = [];
                    for (k in response.registered_user.datas.this_week.data) {
                        this_week_series.push(response.registered_user.datas.this_week.data[k]);
                    }
                    for (k in response.registered_user.datas.last_week.data) {
                        last_week_series.push(response.registered_user.datas.last_week.data[k]);
                    }

                    var optionsArea = {
                        series: [{
                            name: "This Week",
                            data: this_week_series
                        },
                        {
                            name: "Last Week",
                            data: last_week_series
                        }
                        ],
                        chart: {
                            height: 300,
                            type: 'area',
                            group: 'social',
                            toolbar: {
                                show: false
                            },
                            zoom: {
                                enabled: false
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: [3, 3, 3],
                            colors: ['var(--secondary)', 'var(--primary)'],
                            curve: 'straight'
                        },
                        legend: {
                            show: false,
                            tooltipHoverFormatter: function (val, opts) {
                                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                            },
                            markers: {
                                fillColors: ['var(--secondary)', 'var(--primary)'],
                                width: 10,
                                height: 10,
                                strokeWidth: 0,
                                radius: 16
                            }
                        },
                        markers: {
                            size: [8, 8],
                            strokeWidth: [4, 4],
                            strokeColors: ['var(--secondary)', 'var(--primary)'],
                            border: 2,
                            radius: 2,
                            colors: ['#fff', '#fff', '#fff'],
                            hover: {
                                size: 10,
                            }
                        },
                        xaxis: {
                            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            labels: {
                                style: {
                                    colors: '#3E4954',
                                    fontSize: '14px',
                                    fontFamily: 'Poppins',
                                    fontWeight: 100,

                                },
                            },
                            axisBorder: {
                                show: false,
                            }
                        },
                        yaxis: {
                            labels: {
                                minWidth: 20,
                                offsetX: -16,
                                style: {
                                    colors: '#3E4954',
                                    fontSize: '14px',
                                    fontFamily: 'Poppins',
                                    fontWeight: 100,

                                },
                            },
                        },
                        fill: {
                            colors: ['#fff', '#fff'],
                            type: 'gradient',
                            opacity: 1,
                            gradient: {
                                shade: 'light',
                                shadeIntensity: 1,
                                colorStops: [
                                    [{
                                        offset: 0,
                                        color: '#fff',
                                        opacity: 0
                                    },
                                    {
                                        offset: 0.6,
                                        color: '#fff',
                                        opacity: 0
                                    },
                                    {
                                        offset: 100,
                                        color: '#fff',
                                        opacity: 0
                                    }
                                    ],
                                    [{
                                        offset: 0,
                                        color: '#fff',
                                        opacity: .4
                                    },
                                    {
                                        offset: 50,
                                        color: '#fff',
                                        opacity: 0.25
                                    },
                                    {
                                        offset: 100,
                                        color: '#fff',
                                        opacity: 0
                                    }
                                    ]
                                ]

                            },
                        },
                        colors: ['#1EA7C5', '#FF9432'],
                        grid: {
                            borderColor: '#f1f1f1',
                            xaxis: {
                                lines: {
                                    show: true
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: false
                                }
                            },
                        },

                        responsive: [{
                            breakpoint: 1602,
                            options: {
                                markers: {
                                    size: [6, 6, 4],
                                    hover: {
                                        size: 7,
                                    }
                                },
                                chart: {
                                    height: 230,
                                },
                            },

                        }]


                    };
                    if (jQuery("#activity").length > 0) {

                        var dzchart = new ApexCharts(document.querySelector("#activity"), optionsArea);
                        dzchart.render();

                        jQuery('#dzNewSeries').on('change', function () {
                            jQuery(this).toggleClass('disabled');
                            dzchart.toggleSeries('Persent');
                        });

                        jQuery('#dzOldSeries').on('change', function () {
                            jQuery(this).toggleClass('disabled');
                            dzchart.toggleSeries('Visitors');
                        });

                    }
                },
                error: function (error) {
                    console.log(error)
                    alert(error.responseJSON.message);
                }
            });
        }

        var chartBarRunning = async function () {
            $.ajax({
                type: "GET",
                url: '/action/statistics/statistics',
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content')
                },
                success: function (response) {
                    console.log(response)
                    var lp = [];
                    var tf_capital = [];
                    for (k in response.statistics.datas.monthly.data.tf_capital) {
                        tf_capital.push(response.statistics.datas.monthly.data.tf_capital[k]);
                    }
                    for (k in response.statistics.datas.monthly.data.lp) {
                        lp.push(response.statistics.datas.monthly.data.lp[k]);
                    }

                    var options = {
                        series: [{
                            name: 'Dynamic Markets',
                            data: tf_capital
                        },
                        {
                            name: 'LP',
                            data: lp
                        },

                        ],
                        chart: {
                            type: 'bar',
                            height: 350,


                            toolbar: {
                                show: false,
                            },

                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                endingShape: 'rounded',
                                columnWidth: '45%',
                                borderRadius: 5,

                            },
                        },
                        colors: ['#', '#77248B'],
                        dataLabels: {
                            enabled: false,
                        },
                        markers: {
                            shape: "circle",
                        },
                        legend: {
                            show: false,
                            fontSize: '12px',
                            labels: {
                                colors: '#000000',

                            },
                            markers: {
                                width: 30,
                                height: 30,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 35,
                            }
                        },
                        stroke: {
                            show: true,
                            width: 6,
                            colors: ['transparent']
                        },
                        grid: {
                            borderColor: 'rgba(252, 252, 252,0.2)',
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nev', 'Dec'],
                            labels: {
                                style: {
                                    colors: '#ffffff',
                                    fontSize: '13px',
                                    fontFamily: 'poppins',
                                    fontWeight: 100,
                                    cssClass: 'apexcharts-xaxis-label',
                                },
                            },
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                                borderType: 'solid',
                                color: '#78909C',
                                height: 6,
                                offsetX: 0,
                                offsetY: 0
                            },
                            crosshairs: {
                                show: false,
                            }
                        },
                        yaxis: {
                            labels: {
                                offsetX: -16,
                                style: {
                                    colors: '#ffffff',
                                    fontSize: '13px',
                                    fontFamily: 'poppins',
                                    fontWeight: 100,
                                    cssClass: 'apexcharts-xaxis-label',
                                },
                            },
                        },
                        fill: {
                            opacity: 1,
                            colors: ['#ffffff', '#FFD125'],
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return "$ " + val + " thousands"
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                plotOptions: {
                                    bar: {
                                        columnWidth: '1%',
                                        borderRadius: -1,
                                    },
                                },
                                chart: {
                                    height: 250,
                                },
                                series: [{
                                    name: 'Projects',
                                    data: [31, 40, 28, 31, 40, 28, 31, 40]
                                },
                                {
                                    name: 'Projects',
                                    data: [11, 32, 45, 31, 40, 28, 31, 40]
                                },

                                ],
                            }
                        }]
                    };

                    if (jQuery("#chartBarRunning").length > 0) {

                        var chart = new ApexCharts(document.querySelector("#chartBarRunning"), options);
                        chart.render();

                        jQuery('#dzIncomeSeries').on('change', function () {
                            jQuery(this).toggleClass('disabled');
                            chart.toggleSeries('Income');
                        });

                        jQuery('#dzExpenseSeries').on('change', function () {
                            jQuery(this).toggleClass('disabled');
                            chart.toggleSeries('Expense');
                        });

                    }
                },
                error: function (error) {
                    console.log(error)
                    alert(error.responseJSON.message);
                }
            });

        }

        async function httpGet(theUrl) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", theUrl, false); // false for synchronous request
            xmlHttp.send(null);
            return JSON.parse(xmlHttp.responseText);
        }

        var pieChart = async function () {
            $.ajax({
                type: "GET",
                url: '/action/statistics/clients',
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content')
                },
                success: function (response) {
                    var series = [];
                    var labels = [];
                    var colors = [];
                    for (k in response.clients.groups.data) {
                        series.push(response.clients.groups.data[k]);
                        labels.push(k);
                        colors.push(response.clients.groups.colors[k]);
                    }

                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            type: 'donut',
                            height: 200,
                            innerRadius: 50,
                        },
                        dataLabels: {
                            enabled: true
                        },
                        stroke: {
                            width: 0,
                        },
                        plotOptions: {
                            pie: {
                                startAngle: 0,
                                endAngle: 360,
                                donut: {
                                    size: '80%',
                                },
                            },
                        },
                        colors: colors,
                        legend: {
                            position: 'bottom',
                            show: false
                        },
                        responsive: [{
                            breakpoint: 768,
                            options: {
                                chart: {
                                    width: 200
                                },
                            }
                        }]
                    };

                    var chart = new ApexCharts(document.querySelector("#pieChart"), options);
                    chart.render();
                },
                error: function (error) {
                    console.log(error)
                    alert(error.responseJSON.message);
                }
            });
        }

        var redial = async function () {
            $.ajax({
                type: "GET",
                url: '/action/statistics/registered_users',
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content')
                },
                success: function (response) {
                    var total = response.registered_user.datas.user_status.count;
                    var verified = [response.registered_user.datas.user_status.data.verified_user / total * 100];

                    var options = {
                        series: verified,
                        chart: {
                            width: 180,
                            height: 180,
                            type: 'radialBar',
                        },
                        colors: ["#1EBA62"],
                        plotOptions: {
                            radialBar: {
                                startAngle: -180,
                                endAngle: 120,
                                hollow: {
                                    size: '60%',
                                    background: 'var(--rgba-primary-1)',
                                    margin: 15
                                },
                                dataLabels: {
                                    show: true,
                                    name: {
                                        offsetY: 20,
                                        show: true,
                                        color: '#888',
                                        fontSize: '12px'
                                    },
                                    value: {
                                        formatter: function (val) {
                                            return val + "%"
                                        },
                                        offsetY: -10,
                                        color: '#000000',
                                        fontWeight: 700,
                                        fontSize: '18px',
                                        show: true,
                                    }
                                },
                                track: {
                                    background: '#FFF',
                                }
                            }
                        },
                        stroke: {
                            lineCap: 'round'
                        },
                        labels: [''],
                        responsive: [{
                            breakpoint: 575,
                            options: {
                                chart: {
                                    height: 200,
                                },
                            }
                        }],
                    };
                    var chart = new ApexCharts(document.querySelector("#redial"), options);
                    chart.render();
                },
                error: function (error) {
                    console.log(error)
                    alert(error.responseJSON.message);
                }
            });
        }

        var swipercard = function () {
            var swiper = new Swiper('.mySwiper-counter', {
                speed: 1500,
                slidesPerView: 4,
                spaceBetween: 40,
                parallax: true,
                loop: false,
                breakpoints: {

                    300: {
                        slidesPerView: 1,
                        spaceBetween: 30,
                    },
                    576: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    991: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
            });
        }
        var swiperreview = function () {
            var swiper = new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 40,
                loop: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {

                    300: {
                        slidesPerView: 1,
                        spaceBetween: 30,
                    },
                    991: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        }



        /* Function ============ */
        return {
            init: function () { },


            load: function () {
                activity();
                chartBarRunning();
                pieChart();
                redial();
                swipercard();
                swiperreview();

            },

            resize: function () {
                chartBarRunning();
            }
        }

    }();



    jQuery(window).on('load', function () {
        setTimeout(function () {
            dlabChartlist.load();
        }, 1000);

    });



})(jQuery);
