<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-titles style1">
                                    <div class="d-flex align-items-center">
                                        <h2 class="heading">Admin List</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table-responsive table display dataTablesCard text-black dataTable"
                                                id="list">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>E-Mail</th>
                                                        <th>Role</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($admins as $admin)
                                                    <tr>
                                                        <td><span>{{$admin->name}} {{$admin->lastname}}</span></td>
                                                        <td><span>{{$admin->email}}</span></td>
                                                        <td><span>{{$admin->admin_role->admin_role_type->name}}</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-between">
                                                                <!-- <a href="{{route('admins.edit', ['id' => $admin->id])}}"
                                                                    type="button" class="btn btn-primary"><i
                                                                        class="fa fa-pencil"></i></a> -->
                                                                <a class="btn btn-danger" data-toggle="modal" href="#deleteAdminModal_{{ $admin->id }}"><i
                                                                        class="fa fa-trash"></i></a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="deleteAdminModal_{{ $admin->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteAdminModalTitle_{{ $admin->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteAdminModalTitle_{{ $admin->id }}">
                                                                        Admin Delete</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>{{ $admin->name }} {{ $admin->lastname }}</strong> adlı
                                                                        hesabı kaldırmak istediğinizden emin misiniz?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">İptal Et</button>
                                                                    <a type="button" class="btn btn-danger" id="{{ $admin->id }}" name="deleteAdminButton"
                                                                        >Hesabı kaldır</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

            $('body').on('click', 'button[name=deleteAdminButton], a[name=deleteAdminButton]', function(e) {
                    var admin_id = this.id;

                    $.ajax({
                        type: "delete",
                        url: '{{ action("App\\Http\\Controllers\\AdminController@deleteAdmin") }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: admin_id
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                alert(response.message)
                                window.location = window.location.pathname;
                                // window.location.href = "{{ action('App\\Http\\Controllers\\AdminController@initAdminListPage') }}";
                            } else {
                                alert(response.message)
                            }
                        },
                        error: function($error) {
                            console.log($error.responseText)
                            alert($error)
                        }
                    });
                })
        });
        </script>
    </x-slot>
</x-app-layout>