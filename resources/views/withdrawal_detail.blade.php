<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-6">
                        <div class="card exchange">
                            <div class="card-header d-block border-0">

                                <h2 class="heading">Withdrawal#{{ $withdrawal->id }} Details</h2>
                                <div class="balance">
                                    <div class="header-content">
                                        <h6> Amount to Withdrawal</h6>
                                        <span>{{ $withdrawal->created_at }}</span>
                                    </div>
                                    <h4 class="count">$ {{ $withdrawal->amount }}</h4>
                                </div>

                            </div>
                            <div class="card-body pt-0">
                                <div class="selling">
                                    <div class="form_exchange">
                                        <div class="input_exchange">
                                            <h4>User ID</h4>
                                            <input type="text" class="input-select" disabled
                                                value="{{$withdrawal->user_id}}" placeholder="{{$withdrawal->user_id}}">
                                        </div>
                                        <div class="crypto-select">
                                            <div class="input_exchange">
                                                <h4>User Email</h4>
                                                <input type="text" class="input-select" disabled
                                                    value={{ $withdrawal->user->email }}"
                                                    placeholder="{{ $withdrawal->user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <br>
                                <div class="selling">
                                    <div class="form_exchange">
                                        <div class="input_exchange">
                                            <h4>Account Holder</h4>
                                            <input type="text" class="input-select" disabled
                                                value="{{ $withdrawal->holder }}"
                                                placeholder="{{ $withdrawal->holder }}">
                                        </div>
                                        <div class="crypto-select">
                                            <div class="input_exchange">
                                                <h4>From Account ID</h4>
                                                <input type="text" class="input-select" disabled
                                                    value="MT5 -> {{ $withdrawal->from_account }}"
                                                    placeholder="{{ $withdrawal->from_account }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="selling">
                                    <div class="form_exchange">
                                        <div class="input_exchange">
                                            <h4>IBAN</h4>
                                            <input type="text" class="input-select" disabled
                                                value="{{ $withdrawal->iban }}" placeholder="{{ $withdrawal->iban }}">
                                        </div>
                                        <div class="crypto-select">
                                            <div class="input_exchange">
                                                <h4>BIC</h4>
                                                <input type="text" class="input-select" disabled
                                                    value="{{ $withdrawal->bic }}" placeholder="{{ $withdrawal->bic }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if($withdrawal->withdraw_status->name == "Completed")
                                <button disabled class="btn btn-success w-100 mt-3">Completed</button>
                                @endif
                                @if($withdrawal->withdraw_status->name == "Rejected")
                                <button disabled class="btn btn-danger w-100 mt-3">Rejected</button>
                                @endif
                                @if($withdrawal->withdraw_status->name == "Pending")
                                <button id="rejectWithdrawalButton" type="button" withdraw_id="{{ $withdrawal->id }}"
                                    withdraw_status="{{ $withdrawal->withdraw_status->name }}"
                                    class="btn btn-danger w-100 mt-3">Reject</button>
                                <button id="acceptWithdrawalButton" type="button" withdraw_id="{{ $withdrawal->id }}"
                                    withdraw_status="{{ $withdrawal->withdraw_status->name }}"
                                    class="btn btn-success w-100 mt-3">Accept</button>
                                @endif
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
        <!-- -----datatables-- -->
        <script src="{{ asset('./vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('./js/plugins-init/datatables.init.js')}}"></script>

        <!-- Apex Chart -->
        <script src="{{ asset('vendor/apexchart/apexchart.js')}}"></script>
        <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

        <!-- Chart piety plugin files -->
        <script src="{{ asset('vendor/peity/jquery.peity.min.js')}}"></script>

        <script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

        <!-- ----swiper-slider---- -->
        <script src="{{ asset('./vendor/swiper/js/swiper-bundle.min.js')}}"></script>
        <!-- Dashboard 1 -->

        <script src="{{ asset('vendor/wow-master/dist/wow.min.js')}}"></script>

        <script src="{{ asset('js/dlabnav-init.js')}}"></script>
        <script src="{{ asset('js/custom.min.js')}}"></script>
        <script src="{{ asset('js/demo.js')}}"></script>
        <script src="{{ asset('js/styleSwitcher.js')}}"></script>
        <script>
        $('body').on('click', 'button[id=acceptWithdrawalButton]', function(e) {
            $("#acceptWithdrawalButton").prop("disabled", true);
            $("#rejectWithdrawalButton").prop("disabled", true);

            var id = $(this).attr('withdraw_id');
            var last_status = $(this).attr('withdraw_status');

            $.ajax({
                type: "post",
                url: '{{ action("App\\Http\\Controllers\\WithdrawalsController@setWithdrawalById") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    status_id: 3,
                    id: id,
                    last_status: last_status
                },
                success: function(response) {
                    console.log(response)
                    toastr.success(response, 'Success')
                },
                error: function(error) {
                    console.log(error)
                    toastr.error(response, 'Error')
                    $("#acceptWithdrawalButton").prop("disabled", false);
                    $("#rejectWithdrawalButton").prop("disabled", false);
                }
            });
        });
        
        $('body').on('click', 'button[id=rejectWithdrawalButton]', function(e) {
            $("#acceptWithdrawalButton").prop("disabled", true);
            $("#rejectWithdrawalButton").prop("disabled", true);

            var id = $(this).attr('withdraw_id');
            var last_status = $(this).attr('withdraw_status');

            $.ajax({
                type: "post",
                url: '{{ action("App\\Http\\Controllers\\WithdrawalsController@setWithdrawalById") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    status_id: 4,
                    id: id,
                    last_status: last_status
                },
                success: function(response) {
                    console.log(response)
                    toastr.success(response, 'Success')
                },
                error: function(error) {
                    console.log(error)
                    toastr.error(response, 'Error')
                    $("#acceptWithdrawalButton").prop("disabled", false);
                    $("#rejectWithdrawalButton").prop("disabled", false);
                }
            });
        });
        </script>

    </x-slot>
</x-app-layout>