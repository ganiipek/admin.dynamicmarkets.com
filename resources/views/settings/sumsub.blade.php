<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sumsub Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <label>Sumsub Website Level</label>
                                        <div class="col-9">
                                            <input id="sumsubWebsiteLevelInput" type="text"
                                                class="form-control input-default " placeholder="input-default"
                                                value="{!! $settings->SUMSUB_WEBSITE_LEVEL->value !!}">
                                        </div>
                                        <div class="col-3">
                                            <button id="sumsubWebsiteLevelButton" type="button"
                                                class="btn btn-success"
                                                {{ $show_buttons["save"] ? "":"disabled"}}
                                                >Save</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <label>Sumsub Manuel Level (For users added from admin)</label>
                                        <div class="col-9">
                                            <input id="sumsubManuelLevelInput" type="text"
                                                class="form-control input-default " placeholder="input-default"
                                                value="{!! $settings->SUMSUB_MANUEL_LEVEL->value !!}">
                                        </div>
                                        <div class="col-3">
                                            <button id="sumsubManuelLevelButton" type="button"
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
            $('body').on('click', 'button[id=sumsubWebsiteLevelButton]', function(e) {
                $("#sumsubWebsiteLevelButton").prop("disabled", true);

                var value = $("#sumsubWebsiteLevelInput").val();

                if (value == null || value == "") {
                    toastr.error("Value should be not empty!", 'Error')
                    $("#sumsubWebsiteLevelButton").prop("disabled", false);
                    return;
                }

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\SettingsController@setSumsubWebsiteLevel") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        value: value
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success')
                        $("#sumsubWebsiteLevelButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#sumsubWebsiteLevelButton").prop("disabled", false);
                    }
                });
            })

            $('body').on('click', 'button[id=sumsubManuelLevelButton]', function(e) {
                $("#sumsubManuelLevelButton").prop("disabled", true);

                var value = $("#sumsubManuelLevelInput").val();

                if (value == null || value == "") {
                    toastr.error("Value should be not empty!", 'Error')
                    $("#sumsubManuelLevelButton").prop("disabled", false);
                    return;
                }

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\SettingsController@setSumsubManuelLevel") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        value: value
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success')
                        $("#sumsubManuelLevelButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.error, 'Error')
                        $("#sumsubManuelLevelButton").prop("disabled", false);
                    }
                });
            })
        });
        </script>
    </x-slot>
</x-app-layout>