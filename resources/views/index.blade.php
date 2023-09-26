<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-titles style1">
                                    <div class="d-flex align-items-center">
                                        <h2 class="heading">Dashboard</h2>
                                        <!-- <p class="text-warning ms-2">Welcome Back Yatin Sharma !</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 wow fadeInUp" data-wow-delay="1.5s">
                                <div class="card crypto-chart ">
                                    <div class="card-header pb-0 border-0 flex-wrap">
                                        <div class="mb-2 mb-sm-0">
                                            <div class="chart-title mb-3">
                                                <h2 class="heading">Registered Users Last 2 Weeks</h2>
                                            </div>
                                            <div class="d-flex align-items-center mb-3 mb-sm-0">
                                                <div class="round weekly" id="dzOldSeries">
                                                    <div>
                                                        <input type="checkbox" id="checkbox1" name="radio"
                                                            value="weekly" />
                                                        <label for="checkbox1" class="checkmark"></label>
                                                    </div>
                                                    <div>
                                                        <span class="fs-14">This Week</span>
                                                        <h4 class="fs-5 font-w600 mb-0">
                                                            {{$registered_user->registered_user->datas->this_week->count}}
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="round " id="dzNewSeries">
                                                    <div>
                                                        <input type="checkbox" id="checkbox" name="radio"
                                                            value="monthly" />
                                                        <label for="checkbox" class="checkmark"></label>
                                                    </div>
                                                    <div>
                                                        <span class="fs-14">Last Week</span>
                                                        <h4 class="fs-5 font-w600 mb-0">
                                                            {{$registered_user->registered_user->datas->last_week->count}}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 custome-tooltip pb-0">
                                        <div id="activity"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ----column-- -->
                            <div class="col-xl-4 wow fadeInUp" data-wow-delay="1s">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h2 class="heading">Withdrawals Status </h2>
                                    </div>
                                    <div class="card-body text-center pt-0 pb-2">
                                        <div id="pieChart" class="d-inline-block"></div>
                                        <div class="chart-items">
                                            <!-- --row-- -->
                                            <div class="row">
                                                <!-- ----column-- -->
                                                <div class=" col-xl-12 col-sm-12">
                                                    <div class="text-start mt-2">
                                                        <span
                                                            class="font-w600 mb-3 d-block text-black fs-14">Legend</span>
                                                        @foreach ($user_stat->withdrawal as $key => $client)
                                                        <div class="color-picker">
                                                            <span class="mb-0 col-6 fs-14">
                                                                <svg class="me-2" width="14" height="14"
                                                                    viewBox="0 0 14 14" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="14" height="14" rx="4"
                                                                        fill="{{$user_stat->withdrawal_colors->$key}}" />
                                                                </svg>
                                                                {{$key}}
                                                            </span>
                                                            <h5>{{$client}}</h5>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <!-- ----/column-- -->
                                            </div>
                                            <!-- --/row-- -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ----/column-- -->
                        </div>
                        <div class=" row">
                            <!-- --column-- -->
                            <div class="col-lg-12 wow fadeInUp" data-wow-delay="1.0s">
                                <!-- ----card--- -->
                                <div class="card statistic">
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="card-header border-0 flex-wrap pb-2">
                                                <div class="chart-title mb-2 ">
                                                    <h2 class="heading text-white">Revenue</h2>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 custome-tooltip pe-0">
                                                <div id="chartBarRunning"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="statistic-content">
                                                <div class="d-flex justify-content-between">
                                                    <select
                                                        class="image-select default-select dashboard-select primary-light"
                                                        aria-label="Default">
                                                        <option selected>This Month</option>
                                                        <option value="1">This Weeks</option>
                                                        <option value="2">This Day</option>
                                                    </select>

                                                </div>
                                                <div class="statistic-toggle my-3">
                                                    <div class="toggle-btn" id="dzExpenseSeries">
                                                        <div>
                                                            <input type="checkbox" id="checkbox3" name="toggle-btn"
                                                                value="Income" />
                                                            <label for="checkbox3" class="check"></label>
                                                        </div>
                                                        <div>
                                                            <span class="fs-14">Dinamik Equity</span>
                                                            <h4 class="fs-15 font-w600 mb-0">
                                                                {{$statistics->statistics->datas->information->tf_equity}}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="toggle-btn expense" id="dzIncomeSeries">
                                                        <div>
                                                            <input type="checkbox" id="checkbox2" name="toggle-btn"
                                                                value="Expense" />
                                                            <label for="checkbox2" class="check"></label>
                                                        </div>
                                                        <div>
                                                            <span class="fs-14">LP Equity</span>
                                                            <h4 class="fs-15 font-w600 mb-0">
                                                                {{$statistics->statistics->datas->information->lp_equity}}
                                                            </h4>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -----card---- -->
                                                <div class="card expense mb-3">
                                                    <div class="card-body p-3">
                                                        <div
                                                            class="students1 d-flex align-items-center justify-content-between ">
                                                            <div class="content">
                                                                <span>Equity Income</span>
                                                                <h2>$
                                                                    {{$statistics->statistics->datas->information->equity_difference}}
                                                                </h2>
                                                                <h5 class="up">
                                                                    @if($statistics->statistics->datas->information->equity_percent
                                                                    > 0)
                                                                    <svg width="24" height="23" viewBox="0 0 24 23"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M23.25 11.5C23.25 5.275 18.225 0.25 12 0.25C5.775 0.249999 0.75 5.275 0.75 11.5C0.749999 17.725 5.775 22.75 12 22.75C18.225 22.75 23.25 17.725 23.25 11.5ZM11.25 16.075L11.25 9.175L9.3 10.9C8.85 11.275 8.25 11.2 7.875 10.825C7.725 10.6 7.65 10.375 7.65 10.15C7.65 9.85 7.8 9.55 8.025 9.4L11.625 6.25C11.7 6.175 11.775 6.175 11.85 6.1C11.925 6.1 11.925 6.1 12 6.025C12.075 6.025 12.075 6.025 12.15 6.025L12.225 6.025C12.3 6.025 12.3 6.025 12.375 6.025L12.45 6.025C12.525 6.025 12.525 6.025 12.6 6.1C12.6 6.1 12.675 6.1 12.675 6.175L12.75 6.25C12.75 6.25 12.75 6.25 12.825 6.325L15.975 9.55C16.35 9.925 16.35 10.6 15.975 10.975C15.6 11.35 14.925 11.35 14.55 10.975L13.125 9.475L13.125 16.15C13.125 16.675 12.675 17.2 12.075 17.2C11.7 17.05 11.25 16.6 11.25 16.075Z"
                                                                            fill="#FFD125" />
                                                                    </svg>
                                                                    @endif
                                                                    @if($statistics->statistics->datas->information->equity_percent
                                                                    < 0) <svg width="24" height="23" viewBox="0 0 24 23"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M0.75 11.5C0.75 17.725 5.775 22.75 12 22.75C18.225 22.75 23.25 17.725 23.25 11.5C23.25 5.275 18.225 0.25 12 0.25C5.775 0.25 0.75 5.275 0.75 11.5ZM12.75 6.925L12.75 13.825L14.7 12.1C15.15 11.725 15.75 11.8 16.125 12.175C16.275 12.4 16.35 12.625 16.35 12.85C16.35 13.15 16.2 13.45 15.975 13.6L12.375 16.75C12.3 16.825 12.225 16.825 12.15 16.9C12.075 16.9 12.075 16.9 12 16.975C11.925 16.975 11.925 16.975 11.85 16.975L11.775 16.975C11.7 16.975 11.7 16.975 11.625 16.975L11.55 16.975C11.475 16.975 11.475 16.975 11.4 16.9C11.4 16.9 11.325 16.9 11.325 16.825L11.25 16.75C11.25 16.75 11.25 16.75 11.175 16.675L8.025 13.45C7.65 13.075 7.65 12.4 8.025 12.025C8.4 11.65 9.075 11.65 9.45 12.025L10.875 13.525L10.875 6.85C10.875 6.325 11.325 5.8 11.925 5.8C12.3 5.95 12.75 6.4 12.75 6.925Z"
                                                                            fill="#FCFCFC" />
                                                                        </svg>
                                                                        @endif
                                                                        {{$statistics->statistics->datas->information->equity_percent}}%
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -----/card---- -->
                                                <!-- -----card---- -->
                                                <div class="card expense mb-3 ">
                                                    <div class="card-body p-3 ">
                                                        <div
                                                            class="students1 d-flex align-items-center justify-content-between ">
                                                            <div class="content">
                                                                <span>Balance Difference</span>
                                                                <h2>$
                                                                    {{$statistics->statistics->datas->information->balance_difference}}
                                                                </h2>
                                                                <h5>
                                                                    @if($statistics->statistics->datas->information->balance_percent
                                                                    > 0)
                                                                    <svg width="24" height="23" viewBox="0 0 24 23"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M23.25 11.5C23.25 5.275 18.225 0.25 12 0.25C5.775 0.249999 0.75 5.275 0.75 11.5C0.749999 17.725 5.775 22.75 12 22.75C18.225 22.75 23.25 17.725 23.25 11.5ZM11.25 16.075L11.25 9.175L9.3 10.9C8.85 11.275 8.25 11.2 7.875 10.825C7.725 10.6 7.65 10.375 7.65 10.15C7.65 9.85 7.8 9.55 8.025 9.4L11.625 6.25C11.7 6.175 11.775 6.175 11.85 6.1C11.925 6.1 11.925 6.1 12 6.025C12.075 6.025 12.075 6.025 12.15 6.025L12.225 6.025C12.3 6.025 12.3 6.025 12.375 6.025L12.45 6.025C12.525 6.025 12.525 6.025 12.6 6.1C12.6 6.1 12.675 6.1 12.675 6.175L12.75 6.25C12.75 6.25 12.75 6.25 12.825 6.325L15.975 9.55C16.35 9.925 16.35 10.6 15.975 10.975C15.6 11.35 14.925 11.35 14.55 10.975L13.125 9.475L13.125 16.15C13.125 16.675 12.675 17.2 12.075 17.2C11.7 17.05 11.25 16.6 11.25 16.075Z"
                                                                            fill="#FFD125" />
                                                                    </svg>
                                                                    @endif
                                                                    @if($statistics->statistics->datas->information->balance_percent
                                                                    < 0) <svg width="24" height="23" viewBox="0 0 24 23"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M0.75 11.5C0.75 17.725 5.775 22.75 12 22.75C18.225 22.75 23.25 17.725 23.25 11.5C23.25 5.275 18.225 0.25 12 0.25C5.775 0.25 0.75 5.275 0.75 11.5ZM12.75 6.925L12.75 13.825L14.7 12.1C15.15 11.725 15.75 11.8 16.125 12.175C16.275 12.4 16.35 12.625 16.35 12.85C16.35 13.15 16.2 13.45 15.975 13.6L12.375 16.75C12.3 16.825 12.225 16.825 12.15 16.9C12.075 16.9 12.075 16.9 12 16.975C11.925 16.975 11.925 16.975 11.85 16.975L11.775 16.975C11.7 16.975 11.7 16.975 11.625 16.975L11.55 16.975C11.475 16.975 11.475 16.975 11.4 16.9C11.4 16.9 11.325 16.9 11.325 16.825L11.25 16.75C11.25 16.75 11.25 16.75 11.175 16.675L8.025 13.45C7.65 13.075 7.65 12.4 8.025 12.025C8.4 11.65 9.075 11.65 9.45 12.025L10.875 13.525L10.875 6.85C10.875 6.325 11.325 5.8 11.925 5.8C12.3 5.95 12.75 6.4 12.75 6.925Z"
                                                                            fill="#FCFCFC" />
                                                                        </svg>
                                                                        @endif
                                                                        {{$statistics->statistics->datas->information->balance_percent}}%
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -----/card---- -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ----/card--- -->
                            </div>
                            <div class="col-xl-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <div>
                                                <h4 class="fs-28 mb-0">Sumsub</h4>
                                                <span class="fs-18 text-primary font-w600 mb-3 d-block">Verify Users on
                                                    SumSub</spam>
                                            </div>
                                            <div class="compose-btn">
                                                <a href="https://cockpit.sumsub.com/checkus#/login"
                                                    target="_blank"><button class="btn btn-primary">Verify</button></a>
                                            </div>
                                        </div>
                                        <p class="mb-0">Verified {{$user_stat->datas->total_sumsub_user_verified_count}}
                                            users in
                                            {{$user_stat->datas->total_sumsub_user_count}} users!</p>
                                        <div class="mail-img">
                                            <!-- <svg width="156" height="84" viewBox="0 0 156 84" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.1"
                                                    d="M164.961 6.14744C165.013 5.67345 165.013 5.1969 164.961 4.72291L164.136 3.36961C164.136 3.36961 164.136 2.87103 163.678 2.65735L163.22 2.30122L161.754 1.37527C161.353 1.05833 160.888 0.79377 160.379 0.591786L158.821 0.164429H156.988H8.52299H6.69009L5.13212 0.663011C4.62116 0.832312 4.15505 1.07382 3.75745 1.37527L2.29113 2.30122C2.29113 2.30122 2.29113 2.30122 2.29113 2.65735C2.29113 3.01348 2.29113 3.15593 1.8329 3.36961L1.00809 4.72291C0.956224 5.1969 0.956224 5.67345 1.00809 6.14744L0 6.93093V92.4025C0 94.2916 0.965543 96.1032 2.68422 97.439C4.4029 98.7747 6.73393 99.5252 9.16451 99.5252H91.6451C94.0756 99.5252 96.4067 98.7747 98.1253 97.439C99.844 96.1032 100.81 94.2916 100.81 92.4025C100.81 90.5135 99.844 88.7018 98.1253 87.3661C96.4067 86.0303 94.0756 85.2799 91.6451 85.2799H18.329V21.1762L76.9818 55.3648C78.5682 56.2895 80.4976 56.7894 82.4805 56.7894C84.4635 56.7894 86.3929 56.2895 87.9792 55.3648L146.632 21.1762V85.2799H128.303C125.872 85.2799 123.541 86.0303 121.823 87.3661C120.104 88.7018 119.139 90.5135 119.139 92.4025C119.139 94.2916 120.104 96.1032 121.823 97.439C123.541 98.7747 125.872 99.5252 128.303 99.5252H155.797C158.227 99.5252 160.558 98.7747 162.277 97.439C163.996 96.1032 164.961 94.2916 164.961 92.4025V6.93093C164.961 6.93093 164.961 6.43234 164.961 6.14744ZM82.4805 40.7634L36.658 14.0536H128.303L82.4805 40.7634Z"
                                                    fill="#9568FF" />
                                            </svg> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <div>
                                                <h4 class="fs-28 mb-0">Send Email</h4>
                                                <span class="fs-18 text-secondary font-w600 mb-3 d-block">Send Marketing
                                                    Email to Customers.</spam>
                                            </div>
                                            <div class="compose-btn">
                                                <button class="btn btn-secondary ">+ Send Email</button>
                                            </div>
                                        </div>
                                        <p class="mb-0">You can send Email to all Customers to inform them.</p>
                                        <div class="mail-img">
                                            <svg width="156" height="84" viewBox="0 0 156 84" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.1"
                                                    d="M164.961 6.14744C165.013 5.67345 165.013 5.1969 164.961 4.72291L164.136 3.36961C164.136 3.36961 164.136 2.87103 163.678 2.65735L163.22 2.30122L161.754 1.37527C161.353 1.05833 160.888 0.79377 160.379 0.591786L158.821 0.164429H156.988H8.52299H6.69009L5.13212 0.663011C4.62116 0.832312 4.15505 1.07382 3.75745 1.37527L2.29113 2.30122C2.29113 2.30122 2.29113 2.30122 2.29113 2.65735C2.29113 3.01348 2.29113 3.15593 1.8329 3.36961L1.00809 4.72291C0.956224 5.1969 0.956224 5.67345 1.00809 6.14744L0 6.93093V92.4025C0 94.2916 0.965543 96.1032 2.68422 97.439C4.4029 98.7747 6.73393 99.5252 9.16451 99.5252H91.6451C94.0756 99.5252 96.4067 98.7747 98.1253 97.439C99.844 96.1032 100.81 94.2916 100.81 92.4025C100.81 90.5135 99.844 88.7018 98.1253 87.3661C96.4067 86.0303 94.0756 85.2799 91.6451 85.2799H18.329V21.1762L76.9818 55.3648C78.5682 56.2895 80.4976 56.7894 82.4805 56.7894C84.4635 56.7894 86.3929 56.2895 87.9792 55.3648L146.632 21.1762V85.2799H128.303C125.872 85.2799 123.541 86.0303 121.823 87.3661C120.104 88.7018 119.139 90.5135 119.139 92.4025C119.139 94.2916 120.104 96.1032 121.823 97.439C123.541 98.7747 125.872 99.5252 128.303 99.5252H155.797C158.227 99.5252 160.558 98.7747 162.277 97.439C163.996 96.1032 164.961 94.2916 164.961 92.4025V6.93093C164.961 6.93093 164.961 6.43234 164.961 6.14744ZM82.4805 40.7634L36.658 14.0536H128.303L82.4805 40.7634Z"
                                                    fill="#9568FF" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Required vendors -->
        <script src="{{ asset('vendor/global/global.min.js')}}"></script>
        <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>


        <!-- Apex Chart -->
        <script src="{{ asset('vendor/apexchart/apexchart.js')}}"></script>
        <!-- Chart piety plugin files -->
        <script src="{{ asset('vendor/peity/jquery.peity.min.js')}}"></script>
        <script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

        <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

        <!-- Chart piety plugin files -->
        <script src="{{ asset('vendor/peity/jquery.peity.min.js')}}"></script>

        <script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

        <!-- ----swiper-slider---- -->
        <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js')}}"></script>
        <!-- Dashboard 1 -->
        <script src="{{ asset('js/dashboard/dashboard-1.js')}}"></script>
        <script src="{{ asset('vendor/wow-master/dist/wow.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
        <script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap-select-country/js/bootstrap-select-country.min.js')}}"></script>

        <script src="{{ asset('js/dlabnav-init.js')}}"></script>
        <script src="{{ asset('js/custom.min.js')}}"></script>
        <script src="{{ asset('js/demo.js')}}"></script>
        <script src="{{ asset('js/styleSwitcher.js')}}"></script>
        <script>
        var swiper = new Swiper("#card-swiper", {
            speed: 1500,
            parallax: true,
            slidesPerView: 4,
            spaceBetween: 20,
            loop: false,
            breakpoints: {
                1600: {
                    slidesPerView: 4,
                },

                1200: {
                    slidesPerView: 3,
                },
                575: {
                    slidesPerView: 2,
                },
                360: {
                    slidesPerView: 1,
                },
            },
        });
        </script>
    </x-slot>
</x-app-layout>