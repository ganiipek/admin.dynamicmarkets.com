<div class="card">
    <div class="card-header">
        <h4 class="card-title">Trading Account</h4>
    </div>
    <div class="card-body">
        @if ($error)
        <div class="alert alert-danger solid alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>
            <strong>Error!</strong> {{ $error_message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
        @endif
        <div class="table-responsive  patient">
            <table class="table-responsive-lg table display mb-4 dataTablesCard  text-black dataTable no-footer"
                id="example6">
                <thead>
                    <tr>
                        <th>Trading Account</th>
                        <th>Client ID</th>
                        <th>Created Date</th>
                        <th>Balance</th>
                        <th>Leverage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trading_accounts as $trading_account)
                    <tr>
                        <td>{{ $trading_account["login"] }}</td>
                        <td class="whitesp-no fs-14 font-w400">{{ $trading_account["client_id"] }}
                        </td>
                        <td class="whitesp-no fs-14 font-w400">{{ $trading_account["created_at"] }}
                        </td>
                        <td class="doller">$ {{ $trading_account["balance"] }} </td>
                        <td class="whitesp-no">1:{{ $trading_account["leverage"] }}</td>
                        <td class="">
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" id="editTradingAccountModalShowButton"
                                    data-login='{{ $trading_account["login"] }}'>Edit</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Trading Account Modal -->
<div class="modal fade" id="editTradingAccountModal" tabindex="-1" aria-labelledby="editTradingAccountModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Trading Account (#<span id="editTradingAccountModal-id"></span>)
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-account-enabled">
                                <label class="form-check-label" for="editTradingAccountModal-account-enabled">User
                                    allowed to
                                    connect</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-change-password">
                                <label class="form-check-label" for="editTradingAccountModal-change-password">User
                                    allowed to change
                                    password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-reset-pass-after-login">
                                <label class="form-check-label"
                                    for="editTradingAccountModal-reset-pass-after-login">User must change
                                    password at next login</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-one-time-password">
                                <label class="form-check-label" for="editTradingAccountModal-one-time-password">User
                                    allowed to use one-time
                                    password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-trade-disabled">
                                <label class="form-check-label" for="editTradingAccountModal-trade-disabled">User
                                    trading disabled</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-trade-trailing">
                                <label class="form-check-label" for="editTradingAccountModal-trade-trailing">User
                                    trailing stops are
                                    allowed</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-trade-expert">
                                <label class="form-check-label" for="editTradingAccountModal-trade-expert">User
                                    expert advisors are allowed</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-trade-reports">
                                <label class="form-check-label" for="editTradingAccountModal-trade-reports">User
                                    trade reports are allowed</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check custom-checkbox mb-3">
                                <input type="checkbox" class="form-check-input"
                                    id="editTradingAccountModal-virtual-hosting">
                                <label class="form-check-label" for="editTradingAccountModal-virtual-hosting">User
                                    allowed to use sponsored
                                    by broker MetaTrader Virtual Hosting</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button id="editTradingAccountModalSaveButton" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
$('body').on('click', 'button[id=editTradingAccountModalShowButton]', function(e) {
    $("#editTradingAccountButton").prop("disabled", true);

    const login = $(this).data('login');
    $("span[id=editTradingAccountModal-id]").text(login);

    $.ajax({
        type: "get",
        url: '{{ action("App\\Http\\Controllers\\MetatraderController@getTradingAccountRights") }}',
        data: {
            _token: '{{ csrf_token() }}',
            login: login
        },
        success: function(response) {
            console.log(response.data)
            $('#editTradingAccountModal-account-enabled').prop('checked', response.data
                .ACCOUNT_ENABLED);
            $('#editTradingAccountModal-change-password').prop('checked', response.data
                .CHANGE_PASSWORD);
            $('#editTradingAccountModal-reset-pass-after-login').prop('checked', response
                .data.RESET_PASS_AFTER_LOGIN);
            $('#editTradingAccountModal-one-time-password').prop('checked', response.data
                .ONE_TIME_PASSWORD);
            $('#editTradingAccountModal-trade-disabled').prop('checked', response.data
                .TRADE_DISABLED);
            $('#editTradingAccountModal-trade-trailing').prop('checked', response.data
                .TRADE_TRAILING);
            $('#editTradingAccountModal-trade-expert').prop('checked', response.data
                .TRADE_EXPERT);
            $('#editTradingAccountModal-trade-reports').prop('checked', response.data
                .TRADE_REPORTS);
            $('#editTradingAccountModal-virtual-hosting').prop('checked', response.data
                .VIRTUAL_HOSTING);

            $("#editTradingAccountModal").modal('show');
            $("#editTradingAccountButton").prop("disabled", false);
        },
        error: function($error) {
            // toastr.error($error.responseText)
            console.log($error)
            $("#editTradingAccountButton").prop("disabled", false);
        }
    });
})

$('body').on('click', 'button[id=editTradingAccountModalSaveButton]', function(e) {
    $("#editTradingAccountModalSaveButton").prop("disabled", true);

    const login = $("span[id=editTradingAccountModal-id]").text();
    const checkBoxAccountEnabled = $('#editTradingAccountModal-account-enabled').is(":checked");
    const checkBoxChangePassword = $('#editTradingAccountModal-change-password').is(":checked");
    const checkBoxResetPassAfterLogin = $('#editTradingAccountModal-reset-pass-after-login').is(
        ":checked");
    const checkBoxOneTimePassword = $('#editTradingAccountModal-one-time-password').is(":checked");
    const checkBoxTradeDisabled = $('#editTradingAccountModal-trade-disabled').is(":checked");
    const checkBoxTradeTrailing = $('#editTradingAccountModal-trade-trailing').is(":checked");
    const checkBoxTradeExpert = $('#editTradingAccountModal-trade-expert').is(":checked");
    const checkBoxTradeReports = $('#editTradingAccountModal-trade-reports').is(":checked");
    const checkBoxVirtualHosting = $('#editTradingAccountModal-virtual-hosting').is(":checked");

    const rights = {
        ACCOUNT_ENABLED: checkBoxAccountEnabled,
        CHANGE_PASSWORD: checkBoxChangePassword,
        RESET_PASS_AFTER_LOGIN: checkBoxResetPassAfterLogin,
        ONE_TIME_PASSWORD: checkBoxOneTimePassword,
        TRADE_DISABLED: checkBoxTradeDisabled,
        TRADE_TRAILING: checkBoxTradeTrailing,
        TRADE_EXPERT: checkBoxTradeExpert,
        TRADE_REPORTS: checkBoxTradeReports,
        VIRTUAL_HOSTING: checkBoxVirtualHosting
    }

    $.ajax({
        type: "post",
        url: '{{ action("App\\Http\\Controllers\\MetatraderController@setTradingAccountRights") }}',
        data: {
            _token: '{{ csrf_token() }}',
            login: login,
            rights: rights
        },
        success: function(response) {
            toastr.success(response.message);
            $("#editTradingAccountModal").modal('hide');
            $("#editTradingAccountModalSaveButton").prop("disabled", false);
        },
        error: function($error) {
            toastr.error($error.responseText)
            console.log($error)
            $("#editTradingAccountModalSaveButton").prop("disabled", false);
        }
    });
})
</script>