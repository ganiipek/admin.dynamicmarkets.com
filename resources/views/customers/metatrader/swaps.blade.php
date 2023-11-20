<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update swaps from csv</h4>
                            </div>
                            <div class="card-body">
                                <label>You can find file example <strong><a style="color:blue" href="{{ asset('files/example_swap.csv') }}">here</a></strong></label>
                                <div class="row">
                                    <div class="col-8">
                                        <input class="form-control" type="file" id="csvFile" accept=".csv">
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary btn-block" id="btnUpload">Upload</button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success btn-block" id="btnSave">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Swap Lists</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>Symbol</th>
                                                <th>Path</th>
                                                <th>Long</th>
                                                <th>Short</th>
                                                <th>New Long</th>
                                                <th>New Short</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($swaps as $swap)
                                            <tr>
                                                <td><strong>{{ $swap->symbol }}</strong></td>
                                                <td>{{ $swap->path }}</td>
                                                <td>{{ $swap->swap_long }}</td>
                                                <td>{{ $swap->swap_short }}</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        id="new_long_{{ $swap->symbol }}"
                                                        value="{{ $swap->swap_long }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        id="new_short_{{ $swap->symbol }}"
                                                        value="{{ $swap->swap_short }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $('body').on('click', 'button[id=btnUpload]', function(e) {
            $("#btnUpload").prop("disabled", true);
            if (document.querySelector("#csvFile").files.length == 0) {
                toastr.error('No file selected');
                $("#btnUpload").prop("disabled", false);
                return;
            }

            var file = document.querySelector("#csvFile").files[0];

            var reader = new FileReader();
            reader.readAsText(file);

            reader.onload = function(e) {
                var text = e.target.result;
                var row = text.split('\n');

                row.forEach(function(e) {
                    var col = e.split(',');
                    var symbol = col[0];
                    var swap_long = col[1];
                    var swap_short = col[2];

                    var new_long = document.querySelector("#new_long_" + symbol);
                    var new_short = document.querySelector("#new_short_" + symbol);

                    if (new_long == null || new_short == null) {
                        return;
                    }

                    new_long.value = swap_long;
                    new_short.value = swap_short;
                    console.log(symbol, swap_long, swap_short);
                });

                $("#btnUpload").prop("disabled", false);
            };
        });

        $('body').on('click', 'button[id=btnSave]', function(e) {
                $("#btnSave").prop("disabled", true);

                var data = Array();
    
                $("table tr").each(function(i, v){
                    data[i] = Array();
                    $(this).children('td').each(function(ii, vv){
                        if ($(this).children('input').length > 0) {
                            data[i][ii] = $(this).children('input').val();
                            return;
                        }
                        data[i][ii] = $(this).text()
                    }); 
                })

                var changed_data = {};
                for (var i = 0; i < data.length; i++) {
                    if (data[i][2] != data[i][4] || data[i][3] != data[i][5]) {
                        changed_data[data[i][0]] = {
                            symbol: data[i][0],
                            swap_long: data[i][4],
                            swap_short: data[i][5]
                        }
                    }
                }

                if(Object.keys(changed_data).length == 0) {
                    toastr.error('No data changed');
                    $("#btnSave").prop("disabled", false);
                    return;
                }
                console.log(changed_data);

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\MetatraderController@setSwaps") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: changed_data
                    },
                    success: function(response) {
                        toastr.success('Updated successfully');
                        $("#btnSave").prop("disabled", false);
                    },
                    error: function($error) {
                        console.log($error.responseText)
                        alert($error.responseText)
                        $("#btnSave").prop("disabled", false);
                    }
                });

                // var start_time = $("input[id=input_start_time").val();
                // var end_time = $("input[id=input_end_time").val();

                // $.ajax({
                //     type: "get",
                //     url: '{{ action("App\\Http\\Controllers\\UsersController@getAllByDate") }}',
                //     data: {
                //         _token: '{{ csrf_token() }}',
                //         start_time: start_time,
                //         end_time: end_time
                //     },
                //     success: function(response) {
                //         table_website.clear().draw();

                //         for (var i = 0; i < response.users.length; i++) {
                //             addNewRowToTableWebsite(response.users[i].id, response
                //                 .users[i].client_id, response.users[i].name,
                //                 response.users[i].email, response.users[i].phone)
                //         }
                //         $("#searchClientFromWebsiteButton").prop("disabled", false);
                //     },
                //     error: function($error) {
                //         console.log($error.responseText)
                //         alert($error.responseText)
                //         $("#searchClientFromWebsiteButton").prop("disabled", false);
                //     }
                // });
                
                $("#btnSave").prop("disabled", false);
            })
        </script>
    </x-slot>
</x-app-layout>