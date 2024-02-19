<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Metatrader Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <label>Default Group for Newly Opened Account</label>
                                        <div class="col-sm-9">
                                            <select id="tradingAccountDefaultGroupSelect" class="form-control">
                                                <option value="*" selected>All Group</option>
                                                @foreach($metatrader_groups as $group)
                                                @if ($group == $settings->MT5_DEFAULT_GROUP->value)
                                                <option value="{!! $group !!}" selected>{!! $group !!}</option>
                                                @else
                                                <option value="{!! $group !!}">{!! $group !!}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <button id="tradingAccountDefaultGroupButton" type="button"
                                                class="btn btn-success"
                                                {{ $show_buttons["save"] ? "":"disabled"}}
                                                >Save</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <label>Custom Trading Account ID</label>
                                        <div class="col-6">
                                            <input id="mt5CustomTradingAccountIdInput" type="text"
                                                class="form-control input-default " placeholder="input-default"
                                                value="{!! $settings->MT5_CUSTOM_TRADING_ACCOUNT_ID->value !!}">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-check-label">
                                                <input id="mt5CustomTradingAccountIdCheckbox" type="checkbox"
                                                    class="form-check-input" value=""
                                                    {{ $settings->MT5_CUSTOM_TRADING_ACCOUNT_ID_ACTIVE->value ? "checked":"" }}>Active
                                            </label>
                                        </div>
                                        <div class="col-3">
                                            <button id="mt5CustomTradingAccountIdButton" type="button"
                                                class="btn btn-success"
                                                {{ $show_buttons["save"] ? "":"disabled"}}
                                                >Save</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <label>User Trading Account Limit</label>
                                        <div class="col-9">
                                            <input id="userTradingAccountsLimitInput" type="text"
                                                class="form-control input-default " placeholder="input-default"
                                                value="{!! $settings->USER_TRADING_ACCOUNTS_LIMIT->value !!}">
                                        </div>
                                        <div class="col-3">
                                            <button id="userTradingAccountsLimitButton" type="button"
                                                class="btn btn-success"
                                                {{ $show_buttons["save"] ? "":"disabled"}}
                                                >Save</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(function() {
            $('body').on('click', 'button[id=tradingAccountDefaultGroupButton]', function(e) {
                $("#tradingAccountDefaultGroupButton").prop("disabled", true);

                var group = $("select[id=tradingAccountDefaultGroupSelect").val();
                if (group == null || group == "*") {
                    toastr.error("Please select a group", 'Error')
                    $("#tradingAccountDefaultGroupButton").prop("disabled", false);
                    return;
                }

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\MetatraderController@setTradingAccountsDefaultGroup") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        group: group
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success')
                        $("#tradingAccountDefaultGroupButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#tradingAccountDefaultGroupButton").prop("disabled", false);
                    }
                });
            })

            $('body').on('click', 'button[id=mt5CustomTradingAccountIdButton]', function(e) {
                $("#mt5CustomTradingAccountIdButton").prop("disabled", true);

                var active = $("#mt5CustomTradingAccountIdCheckbox").is(":checked");
                var value = $("#mt5CustomTradingAccountIdInput").val();

                if (value == null || value == "") {
                    toastr.error("Value should be not empty!", 'Error')
                    $("#mt5CustomTradingAccountIdButton").prop("disabled", false);
                    return;
                }

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\SettingsController@setMT5CustomTradingAccountId") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        active: active ? 1 : 0,
                        value: value
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success')
                        $("#mt5CustomTradingAccountIdButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#mt5CustomTradingAccountIdButton").prop("disabled", false);
                    }
                });
            })

            $('body').on('click', 'button[id=userTradingAccountsLimitButton]', function(e) {
                $("#userTradingAccountsLimitButton").prop("disabled", true);

                var value = $("#userTradingAccountsLimitInput").val();

                if (value == null || value == "") {
                    toastr.error("Value should be not empty!", 'Error')
                    $("#userTradingAccountsLimitButton").prop("disabled", false);
                    return;
                }

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\SettingsController@setUserTradingAccountsLimit") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        value: value
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success')
                        $("#userTradingAccountsLimitButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#userTradingAccountsLimitButton").prop("disabled", false);
                    }
                });
            })
        });
        </script>
    </x-slot>
</x-app-layout>