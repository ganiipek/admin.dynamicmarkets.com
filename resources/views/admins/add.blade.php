<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="newAdmin">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input name="input_first_name" type="text" class="form-control"
                                                    placeholder="First Name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input name="input_last_name" type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">E-Mail</label>
                                                <input name="input_email"type="email" class="form-control" placeholder="E-Mail">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Role</label>
                                                <select id="inputState" class="default-select form-control wide">
                                                    @foreach($admin_role_types as $admin_role_type)
                                                    <option id="{{ $admin_role_type->id }}">
                                                        {{ $admin_role_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password</label>
                                                <input id="input_password" name="input_password"type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password Confirmation</label>
                                                <input name="input_password_confirmation"type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $("#newAdmin").validate({
            errorClass: 'is-invalid',
            rules: {
                input_first_name: {
                    required: true
                },
                input_last_name: {
                    required: true
                },
                input_email: {
                    required: true
                },
                input_password: {
                    required: true,
                    minlength: 7,
                },
                input_password_confirmation: {
                    required: true,
                    minlength: 7,
                    equalTo: "#input_password"
                }
            },
            messages: {
                // input_first_name: {
                //     required: "Turnuva adı boş bırakılamaz."
                // }
            },
            submitHandler: function(form) {
                let first_name = form.input_first_name.value
                let last_name = form.input_last_name.value
                let email = form.input_email.value
                let password = form.input_password.value
                let password_confirmation = form.input_password_confirmation.value
                let role_type_id = form.inputState.selectedOptions[0].id

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\AdminController@addAdmin") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: first_name,
                        lastname: last_name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation,
                        role_type_id: role_type_id
                    },
                    success: function(response) {
                        console.log(response)
                        alert(response.message)
                        window.location.href = "{{ action('App\\Http\\Controllers\\AdminController@initAdminListPage') }}";
                    },
                    error: function(error) {
                        console.log(error)
                        alert(error.responseJSON.message);
                    }
                });
            }
        });
        </script>
    </x-slot>
</x-app-layout>