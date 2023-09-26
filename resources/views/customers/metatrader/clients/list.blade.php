<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.75s">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Client from Metatrader</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-sm-3">Group</label>
                                            <div class="col-sm-6">
                                                <select id="searchClientFromMetatraderSelect">
                                                    <option value="*" selected>All Group</option>
                                                    @foreach($metatrader_groups as $group)
                                                    <option value="{!! $group !!}">{!! $group !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <button id="searchClientFromMetatraderButton"
                                                    class="btn btn-info">Search</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="table-responsive  patient">
                                                <table
                                                    class="table-responsive-lg table display mb-4 dataTablesCard text-black dataTable no-footer"
                                                    id="table_metatrader">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Citizenship</th>
                                                            <th>Name</th>
                                                            <th>Mail</th>
                                                            <th>Phone</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <tr>
                                                            <td>1001</td>
                                                            <td>USA</td>
                                                            <td>Mr. John Doe</td>
                                                            <td>Mail</td>
                                                            <td>Phone</td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.75s">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Client From Database</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-5">
                                                <label class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="Start Time"
                                                    id="input_start_time" name="input_start_time">
                                            </div>
                                            <div class="mb-3 col-md-5">
                                                <label class="form-label">End Time</label>
                                                <input type="text" class="form-control" placeholder="End Time"
                                                    id="input_end_time" name="input_end_time">
                                            </div>
                                            <div class="mb-3 col-sm-2">
                                                <label class="form-label">Search</label>
                                                <button id="searchClientFromWebsiteButton" type="button"
                                                    class="btn btn-primary form-control wide">Search</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table
                                                    class="table-responsive-lg table display mb-4 dataTablesCard text-black dataTable no-footer"
                                                    id="table_website">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>DB ID</th>
                                                            <th>Client ID</th>
                                                            <th>Name</th>
                                                            <th>Mail</th>
                                                            <th>Phone</th>
                                                            <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <tr>
                                                        <td>1001</td>
                                                        <td>USA</td>
                                                        <td>Mr. John Doe</td>
                                                        <td>Mail</td>
                                                        <td>Phone</td>
                                                    </tr> -->
                                                    </tbody>
                                                </table>

                                                <div id="bindUnbindModal" class="modal fade" id="exampleModalCenter">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p id="bindUnbindModalBody"></p>

                                                                <div id="bindedClientIdDiv" class="row">
                                                                    <div class="mb-3 col-md-12">
                                                                        <input type="text" class="form-control" placeholder="Client ID"
                                                                            id="input_client_id" name="input_client_id">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button id="bindUnbindModalButton" type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        $('#input_start_time').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });

        $('#input_end_time').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });

        $(function() {
            var table_metatrader = $('#table_metatrader').DataTable({
                searching: true,
                paging: true,
                select: false,
                lengthChange: true
            });

            var table_website = $('#table_website').DataTable({
                searching: true,
                paging: true,
                select: false,
                lengthChange: true,
                columns: [{
                        "title": "ID"
                    },
                    {
                        "title": "Client ID"
                    },
                    {
                        "title": "Name"
                    },
                    {
                        "title": "Mail"
                    },
                    {
                        "title": "Phone"
                    },
                    {
                        "data": null,
                        "title": "Action",
                        "defaultContent": "<button class='btn btn-primary'>Bind/Unbind</button>"
                    }
                ]
            });

            function addNewRowToTableMetatrader(id, citizenship, name, mail, phone) {
                table_metatrader.row
                    .add([
                        id, citizenship, name, mail, phone
                    ])
                    .draw(false);
            }

            function addNewRowToTableWebsite(id, client_id, name, mail, phone) {
                table_website.row
                    .add([
                        id, client_id, name, mail, phone
                    ])
                    .draw(false);
            }

            $('body').on('click', 'button[id=searchClientFromMetatraderButton]', function(e) {
                $("#searchClientFromMetatraderButton").prop("disabled", true);
                var group_name = $("select[id=searchClientFromMetatraderSelect").val();

                $.ajax({
                    type: "get",
                    url: '{{ action("App\\Http\\Controllers\\MetatraderController@getClients") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        group: group_name
                    },
                    success: function(response) {
                        table_metatrader.clear().draw();

                        for (var i = 0; i < response.clients.length; i++) {
                            addNewRowToTableMetatrader(response.clients[i].id, response
                                .clients[i].citizenship, response.clients[i].name,
                                response.clients[i].mail, response.clients[i].phone)
                        }
                        $("#searchClientFromMetatraderButton").prop("disabled", false);
                    },
                    error: function($error) {
                        console.log($error.responseText)
                        alert($error.responseText)
                        $("#searchClientFromMetatraderButton").prop("disabled", false);
                    }
                });
            })

            $('body').on('click', 'button[id=searchClientFromWebsiteButton]', function(e) {
                $("#searchClientFromWebsiteButton").prop("disabled", true);
                var start_time = $("input[id=input_start_time").val();
                var end_time = $("input[id=input_end_time").val();

                $.ajax({
                    type: "get",
                    url: '{{ action("App\\Http\\Controllers\\UsersController@getAllByDate") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        start_time: start_time,
                        end_time: end_time
                    },
                    success: function(response) {
                        table_website.clear().draw();

                        for (var i = 0; i < response.users.length; i++) {
                            addNewRowToTableWebsite(response.users[i].id, response
                                .users[i].client_id, response.users[i].name,
                                response.users[i].email, response.users[i].phone)
                        }
                        $("#searchClientFromWebsiteButton").prop("disabled", false);
                    },
                    error: function($error) {
                        console.log($error.responseText)
                        alert($error.responseText)
                        $("#searchClientFromWebsiteButton").prop("disabled", false);
                    }
                });
            })

            $('#table_website tbody').on('click', 'button', function() {
                var data = table_website.row($(this).parents('tr')).data();
                let user_id = data[0];
                let client_id = data[1];
                let name = data[2];
                let mail = data[3];
                let phone = data[4];
                
                if(client_id == null) { // Hesap yok
                    $('#bindUnbindModalBody').text("Which client do you want to connect the ID #"+user_id+"("+mail+") "+name+" account with?");
                    $('#bindUnbindModalButton').text("Bind Client");
                    $("#bindUnbindModalButton").attr('bind_type', "bind")
                    $('#bindedClientIdDiv').show();
                } else { // hesap var
                    $('#bindUnbindModalBody').text("Are you sure you want to disconnect the account with ID #"+user_id+"("+mail+") "+name+" from client #"+client_id+" ?");
                    $('#bindUnbindModalButton').text("Unbind Client");
                    $("#bindUnbindModalButton").attr('bind_type', "unbind")
                    $('#bindedClientIdDiv').hide();
                }
                
                $("#bindUnbindModalButton").attr('user_id', user_id)
                $("#bindUnbindModalButton").attr('client_id', client_id)

                $('#bindUnbindModal').modal("show"); 
            });

            $('body').on('click', 'button[id=bindUnbindModalButton]', function(e) {
                $("#bindUnbindModalButton").prop("disabled", true);
                let bind_type = $("button[id=bindUnbindModalButton]").attr("bind_type");
                let user_id = $("button[id=bindUnbindModalButton]").attr("user_id");
                let client_id = $("button[id=bindUnbindModalButton]").attr("client_id");
                let url = "";

                if (bind_type == "bind") {
                    url = '{{ action("App\\Http\\Controllers\\UsersController@bindClient") }}';
                    client_id = $("input[id=input_client_id]").val();
                } else {
                    url = '{{ action("App\\Http\\Controllers\\UsersController@unbindClient") }}';
                }

                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        client_id: client_id,
                        user_id: user_id
                    },
                    success: function(response) {
                        console.log(response)

                        $("#bindUnbindModalButton").prop("disabled", false);
                        $('#bindUnbindModal').modal("hide"); 
                    },
                    error: function($error) {
                        console.log($error.responseText)
                        alert($error.responseText)
                        $("#bindUnbindModalButton").prop("disabled", false);
                    }
                });
            })
        });
        </script>
    </x-slot>
</x-app-layout>