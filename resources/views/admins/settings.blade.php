<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
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
                                                            @if ($group == $trading_account_default_group)
                                                            <option value="{!! $group !!}" selected>{!! $group !!}</option>
                                                            @else
                                                            <option value="{!! $group !!}">{!! $group !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 mt-2 mt-sm-0">
                                                    <button id="tradingAccountDefaultGroupButton" type="button" class="btn btn-success">Save</button>
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
            </div>
        </div>

        <script>
        $(function() {
            var table = $('#list').DataTable({
                searching: true,
                paging: true,
                select: false,
                lengthChange: true,
            });

            $('body').on('click', 'button[id=tradingAccountDefaultGroupButton]', function(e) {
                $("#tradingAccountDefaultGroupButton").prop("disabled", true);

                var group = $("select[id=tradingAccountDefaultGroupSelect").val();
                if(group == null || group == "*") {
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
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#tradingAccountDefaultGroupButton").prop("disabled", false);
                    }
                });
            })
        });
        </script>
    </x-slot>
</x-app-layout>