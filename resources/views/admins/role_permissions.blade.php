<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    @if($show_cards['update_role_permission'])
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Role</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="newAdminRole">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Role Name</label>
                                                <input name="input_role_name" type="text" class="form-control"
                                                    placeholder="Role Name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Role Description</label>
                                                <input name="input_role_description" type="text" class="form-control"
                                                    placeholder="Role Description">
                                            </div>
                                            <div class="mb-3 col-12">
                                                <div class="table-responsive patient">
                                                    <table class="table table-bordered table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                                @foreach($permissions as $permission)
                                                                <th>{{ $permission->name }}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @foreach($permissions as $permission)
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div
                                                                                class="form-check custom-checkbox mb-3">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="add_permission_{{ $permission->id }}_read"
                                                                                    data-permission_id="{{ $permission->id }}"
                                                                                    data-permission_type="read">
                                                                                <label class="form-check-label"
                                                                                    for="add_permission_{{ $permission->id }}_read">Read</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div
                                                                                class="form-check custom-checkbox mb-3">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="add_permission_{{ $permission->id }}_write"
                                                                                    data-permission_id="{{ $permission->id }}"
                                                                                    data-permission_type="write">
                                                                                <label class="form-check-label"
                                                                                    for="add_permission_{{ $permission->id }}_write">Write</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="add_role_button" type="submit"
                                            class="btn btn-primary btn-block mb-3">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Role Permissions</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive patient">
                                    <table class="table table-striped table-bordered table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>Role</th>
                                                @foreach($permissions as $permission)
                                                <th>{{ $permission->name }}</th>
                                                @endforeach
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                @foreach($role->role_permissions as $role_permission)
                                                <td>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-check custom-checkbox mb-3">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="update_permission_{{ $role->id }}_{{ $role_permission->permission_id }}_read"
                                                                    data-role_id="{{ $role->id }}"
                                                                    data-permission_id="{{ $role_permission->permission_id }}"
                                                                    data-permission_type="read"
                                                                    {{ $role_permission->read ? "checked":"" }}
                                                                    {{ $role->name == "Admin" ? "disabled":"" }}
                                                                    {{ $show_buttons["update_role"] ? "":"disabled" }}
                                                                    >
                                                                <label class="form-check-label"
                                                                    for="update_permission_{{ $role->id }}_{{ $role_permission->permission_id }}_read">Read</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check custom-checkbox mb-3">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="update_permission_{{ $role->id }}_{{ $role_permission->permission_id }}_write"
                                                                    data-role_id="{{ $role->id }}"
                                                                    data-permission_id="{{ $role_permission->permission_id }}"
                                                                    data-permission_type="write"
                                                                    {{ $role_permission->write ? "checked":"" }}
                                                                    {{ $role->name == "Admin" ? "disabled":"" }}
                                                                    {{ $show_buttons["update_role"] ? "":"disabled" }}
                                                                    >
                                                                <label class="form-check-label"
                                                                    for="update_permission_{{ $role->id }}_{{ $role_permission->permission_id }}_write">Write</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endforeach
                                                <td>
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <button id="update_role_button_{{ $role->id }}"
                                                                type="button" class="btn btn-success"
                                                                data-role_id="{{ $role->id }}"
                                                                {{ $role->name == "Admin" ? "disabled":"" }}
                                                                {{ $show_buttons["update_role"] ? "":"disabled" }}
                                                                >
                                                                <i class="fa fa-pencil"></i> Update</button>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            @if($role->name == "Admin" || !$show_buttons["delete_role"])
                                                            <button type="button" class="btn btn-danger" disabled>
                                                                <i class="fa fa-trash"></i> Delete</button>
                                                            @else
                                                            <a class="btn btn-danger" data-toggle="modal"
                                                                href="#deleteRoleModal_{{ $role->id }}"><i
                                                                    class="fa fa-trash"></i> Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="deleteRoleModal_{{ $role->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteRoleModalTitle_{{ $role->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteRoleModalTitle_{{ $role->id }}">
                                                                        Role Delete</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>{{ $role->name }} </strong> adlı
                                                                        rolü kaldırmak istediğinizden emin misiniz?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">İptal Et</button>
                                                                    <a type="button" class="btn btn-danger"
                                                                        data-role_id="{{ $role->id }}"
                                                                        name="deleteRoleButton">Kaldır</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        $("#newAdminRole").validate({
            errorClass: 'is-invalid',
            rules: {
                input_role_name: {
                    required: true
                },
                input_role_description: {
                    required: true
                }
            },
            messages: {
                // input_first_name: {
                //     required: "Turnuva adı boş bırakılamaz."
                // }
            },
            submitHandler: function(form) {
                $("#add_role_button").prop("disabled", true);
                let role_name = form.input_role_name.value
                let role_description = form.input_role_description.value
                const permissions = @json($permissions)

                let role_permissions = []
                permissions.forEach(permission => {
                    let read = $(`#add_permission_${permission.id}_read`).is(":checked")
                    let write = $(`#add_permission_${permission.id}_write`).is(":checked")
                    role_permissions.push({
                        permission_id: permission.id,
                        read: read,
                        write: write
                    })
                });

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\AdminController@addRole") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: role_name,
                        description: role_description,
                        permissions: role_permissions
                    },
                    success: function(response) {
                        $("#add_role_button").prop("disabled", false);

                        alert(response.message)
                        window.location.href =
                            "{{ action('App\\Http\\Controllers\\AdminController@initRolePermissionPage') }}";
                    },
                    error: function(error) {
                        $("#add_role_button").prop("disabled", false);

                        console.log(error)
                        alert(error.responseJSON.message);
                    }
                });
            }
        });

        $('body').on('click', 'input[type=checkbox][id^=add_permission]', function(e) {
            const permission_id = $(this).data("permission_id")
            const permission_type = $(this).data("permission_type")

            if (this.checked) {
                if (permission_type == "write") {
                    $(`#add_permission_${permission_id}_read`).prop("checked", true)
                }
            } else {
                if (permission_type == "read") {
                    if ($(`#add_permission_${permission_id}_write`).is(":checked")) {
                        $(`#add_permission_${permission_id}_write`).prop("checked", false)
                    }
                }
            }
        });

        $('body').on('click', 'input[type=checkbox][id^=update_permission]', function(e) {
            const role_id = $(this).data("role_id")
            const permission_id = $(this).data("permission_id")
            const permission_type = $(this).data("permission_type")

            if (this.checked) {
                if (permission_type == "write") {
                    $(`#update_permission_${role_id}_${permission_id}_read`).prop("checked", true)
                }
            } else {
                if (permission_type == "read") {
                    if ($(`#update_permission_${role_id}_${permission_id}_write`).is(":checked")) {
                        $(`#update_permission_${role_id}_${permission_id}_write`).prop("checked", false)
                    }
                }
            }
        });

        $('body').on('click', 'button[id^=update_role_button]', function(e) {
            const this_button = $(this)
            $(this_button).prop("disabled", true);

            const role_id = $(this).data("role_id")
            const permissions = @json($permissions)

            let role_permissions = []
            permissions.forEach(permission => {
                let read = $(`#update_permission_${role_id}_${permission.id}_read`).is(":checked")
                let write = $(`#update_permission_${role_id}_${permission.id}_write`).is(":checked")
                role_permissions.push({
                    permission_id: permission.id,
                    read: read,
                    write: write
                })
            });

            $.ajax({
                type: "post",
                url: '{{ action("App\\Http\\Controllers\\AdminController@updateRolePermissions") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    role_id: role_id,
                    permissions: role_permissions
                },
                success: function(response) {
                    $(this_button).prop("disabled", false);

                    alert(response.message)
                    window.location.href =
                        "{{ action('App\\Http\\Controllers\\AdminController@initRolePermissionPage') }}";
                },
                error: function(error) {
                    $(this_button).prop("disabled", false);

                    console.log(error)
                    alert(error.responseJSON.message);
                }
            });
        });

        $('body').on('click', 'a[name=deleteRoleButton]', function(e) {
            const this_button = $(this)
            $(this_button).prop("disabled", true);

            const role_id = $(this).data("role_id")

            $.ajax({
                type: "delete",
                url: '{{ action("App\\Http\\Controllers\\AdminController@deleteRole") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    role_id: role_id
                },
                success: function(response) {
                    $(this_button).prop("disabled", false);

                    alert(response.message)
                    window.location.href =
                        "{{ action('App\\Http\\Controllers\\AdminController@initRolePermissionPage') }}";
                },
                error: function(error) {
                    $(this_button).prop("disabled", false);

                    console.log(error)
                    alert(error.responseJSON.message);
                }
            });
        });
        </script>
    </x-slot>
</x-app-layout>