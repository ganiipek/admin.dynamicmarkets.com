<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-6">
                        <div class="card exchange">
                            <div class="card-header d-block border-0">

                                <h2 class="heading">Withdrawal Details</h2>
                                <div class="balance">
                                    <div class="header-content">
                                        <h6> Amount to Withdrawal</h6>
                                        <span>{{$withdrawal_details[0]->Request_Date}}</span>
                                    </div>
                                    <h4 class="count">$ {{$withdrawal_details[0]->Requested_Amount}}</h4>
                                </div>

                            </div>
                            <div class="card-body pt-0">
                                <div class="selling">
                                    <div class="form_exchange">
                                        <div class="input_exchange">
                                            <h4>User ID</h4>
                                            <input type="text" class="input-select" disabled
                                                value="{{$withdrawal_details[0]->Client_ID}}"
                                                placeholder="{{$withdrawal_details[0]->Client_ID}}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <br>
                                <div class="selling">
                                    <div class="form_exchange">
                                        <div class="input_exchange">
                                            <h4>Bank Name</h4>
                                            <input type="text" class="input-select" disabled
                                                value="{{$withdrawal_details[0]->Bank_Name}}"
                                                placeholder="{{$withdrawal_details[0]->Bank_Name}}">
                                        </div>
                                        <div class="crypto-select">
                                            <div class="input_exchange">
                                                <h4>Account Holder</h4>
                                                <input type="text" class="input-select" disabled
                                                    value="{{$withdrawal_details[0]->Account_Holder}}"
                                                    placeholder="{{$withdrawal_details[0]->Account_Holder}}">
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
                                                value="{{$withdrawal_details[0]->IBAN}}"
                                                placeholder="{{$withdrawal_details[0]->IBAN}}">
                                        </div>
                                        <div class="crypto-select">
                                            <div class="input_exchange">
                                                <h4>BIC</h4>
                                                <input type="text" class="input-select" disabled
                                                    value="{{$withdrawal_details[0]->BIC}}"
                                                    placeholder="{{$withdrawal_details[0]->BIC}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if($withdrawal_details[0]->Withdrawal_Status == "Completed")
                                <button disabled class="btn btn-success w-100 mt-3">Completed</button>
                                @endif
                                @if($withdrawal_details[0]->Withdrawal_Status == "Rejected")
                                <button disabled class="btn btn-danger w-100 mt-3">Rejected</button>
                                @endif
                                @if($withdrawal_details[0]->Withdrawal_Status == "Pending")
                                <button
                                    onclick="rejectWithdrawal('{{ $withdrawal_details[0]->Withdrawal_ID }}', '{{ $withdrawal_details[0]->Withdrawal_Status }}')"
                                    class="btn btn-danger w-100 mt-3">Reject</button>
                                <button id="acceptWithdrawalButton"
                                    onclick="acceptWithdrawal('{{ $withdrawal_details[0]->Withdrawal_ID }}', '{{ $withdrawal_details[0]->Withdrawal_Status }}')"
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

        });
        $(function() {
            
            function acceptWithdrawal(id, last_status) {
                updateStatus(3, id, last_status);
            }

            function rejectWithdrawal(id, last_status) {
                updateStatus(4, id, last_status);
            }

            function updateStatus(status_id, id, last_status) {
                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\WithdrawalsController@setWithdrawalById") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status_id: status_id,
                        id: id,
                        last_status: last_status
                    },
                    success: function(response) {
                        console.log(response)
                    },
                    error: function(error) {
                        console.log(error)
                        alert(error.responseJSON.message);
                    }
                });
            });
        </script>

    </x-slot>
</x-app-layout>