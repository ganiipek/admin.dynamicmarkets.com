<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GDM Admin" />
    <meta property="og:title" content="GDM Admin" />
    <meta property="og:description" content="GDM Admin" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->

    <title>GDM Admin</title>

    <link rel="shortcut icon" type="image/icon" href="{{ asset('favicon.ico')}}" />
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css')}}">
    <link href="{{ asset('vendor/wow-master/css/libs/animate.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-nice-select/css/nice-select.css')}}">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <!-- ----swiper-slider---- -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Style css -->
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Material+Icons')}}" rel="stylesheet">
    <!-- Style css -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">


    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('index') }}" class="brand-logo">
                <img src="{{ asset('images/logo.png')}}" alt="TF Capital Logo" width="200px" height="70px">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect x="11" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect x="22" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect width="4" height="4" rx="2" fill="#2A353A" />
                        <rect y="11" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A" />
                        <rect y="22" width="4" height="4" rx="2" fill="#2A353A" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item">
                                <div class="dropdown header-profile2">
                                    <a class="nav-link" href="javascript:void(0);" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="header-info2 d-flex align-items-center">
                                            <div class="d-flex align-items-center sidebar-info">
                                                <div>
                                                    <h4 id="email_header" class="mb-0"> </h4>
                                                    <span class="d-block text-end">Admin</span>
                                                </div>
                                            </div>
                                            <img src="{{ asset('images/user.jpg')}}" alt="">
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="app-profile.html" class="dropdown-item ai-icon ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="var(--primary)" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <span class="ms-2">Profile </span>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item ai-icon ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <span class="ms-2">Settings </span>
                                        </a>
                                        <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ms-2">Logout </span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    @foreach($sidebar_items as $key => $sidebar_item)
                    @if(array_key_exists('route', $sidebar_item))
                    <li>
                        <a href="{{ route($sidebar_item['route']) }}" aria-expanded="false">
                            <i class="material-icons-outlined">{{ $sidebar_item["icon"] }}</i>
                            <span class="nav-text">{{ $sidebar_item["name"] }}</span>
                        </a>
                    </li>
                    @elseif(array_key_exists('items', $sidebar_item))
                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="material-symbols-outlined">{{ $sidebar_item["icon"] }}</i>
                            <span class="nav-text">{{ $sidebar_item["name"] }}</span>
                        </a>
                        <ul aria-expanded="false">
                        @foreach($sidebar_item['items'] as $key => $sidebar_sub_item)
                        @if(array_key_exists('route', $sidebar_sub_item))
                            <li><a href="{{ route($sidebar_sub_item['route']) }}">{{ $sidebar_sub_item["name"] }}</a></li>
                        @elseif(array_key_exists('items', $sidebar_sub_item))
                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Metatrader5
                                    Clients</a>
                                <ul aria-expanded="false">
                                @foreach($sidebar_sub_item['items'] as $key => $sidebar_sub2_item)
                                <li><a href="{{ route($sidebar_sub2_item['route']) }}">{{ $sidebar_sub2_item["name"] }}</a></li>
                                @endforeach
                                </ul>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                    <li>
                        <a href="{{ route('logout') }}" aria-expanded="true"
                            style="background-color: #f44336;color:white">
                            <span class="nav-text">LOGOUT</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100">
        <main>
            {{ $slot }}
        </main>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://tfcapital.me/" target="_blank">TF
                        Capital</a> 2023</p>
            </div>
        </div>
    </div>
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <!-- -----datatables-- -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <!-- ----swiper-slider---- -->
    <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script>
    <!-- Dashboard 1 -->

    <script src="{{ asset('vendor/wow-master/dist/wow.min.js') }}"></script>

    <script src="{{ asset('js/dlabnav-init.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script src="{{ asset('js/demo.js')}}"></script>
    <script src="{{ asset('js/styleSwitcher.js')}}"></script>

</body>

</html>