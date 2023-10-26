<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New Customer</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="addCustomer">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Title</label>
                                                <select id="input_title" name="input_title" class="default-select form-control wide">
                                                    <option id="Mr.">Mr.</option>
                                                    <option id="Mrs.">Mrs.</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Gender</label>
                                                <select id="input_gender" name="input_gender" class="default-select form-control wide">
                                                    <option id="Male">Male</option>
                                                    <option id="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Birthdate</label>
                                                <input type="text" class="form-control" placeholder="2017-06-04"
                                                    id="input_birthdate" name="input_birthdate">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">First Name</label>
                                                <input name="input_name" type="text" class="form-control"
                                                    placeholder="First Name">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Middle Name</label>
                                                <input name="input_middlename" type="text" class="form-control"
                                                    placeholder="Middle Name">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Last Name</label>
                                                <input name="input_lastname" type="text" class="form-control"
                                                    placeholder="Last Name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">E-Mail</label>
                                                <input name="input_email" type="email" class="form-control"
                                                    placeholder="E-Mail">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input name="input_phone" type="text" class="form-control"
                                                    placeholder="Phone">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password</label>
                                                <input name="input_password" type="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password Again</label>
                                                <input name="input_password_confirmation" type="password" class="form-control"
                                                    placeholder="Password Again">
                                            </div>
                                            <div class="mb-3 col-md-9">
                                                <label class="form-label">Address</label>
                                                <input name="input_address" type="text" class="form-control"
                                                    placeholder="Address">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Zip</label>
                                                <input name="input_zip" type="text" class="form-control"
                                                    placeholder="Zip Code">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Country</label>
                                                <input name="input_country" type="text" class="form-control"
                                                    placeholder="Country">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">City</label>
                                                <input name="input_city" type="text" class="form-control"
                                                    placeholder="City">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">State</label>
                                                <input name="input_state" type="text" class="form-control"
                                                    placeholder="State">
                                            </div>
                                        </div>
                                        <button id="createCustomerButton" type="submit" class="btn btn-primary">Create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $('#input_birthdate').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });

        $("#addCustomer").validate({
            errorClass: 'is-invalid',
            rules: {
                input_title: {
                    required: true
                },
                input_name: {
                    required: true
                },
                input_middlename: {
                    required: false
                },
                input_lastname: {
                    required: true
                },
                input_gender: {
                    required: true
                },
                input_birthdate: {
                    required: true,
                },
                input_email: {
                    required: true,
                },
                input_phone: {
                    required: true,
                },
                input_password: {
                    required: true,
                },
                input_password_confirmation: {
                    required: true,
                },
                input_country: {
                    required: true,
                },
                input_city: {
                    required: true,
                },
                input_address: {
                    required: true,
                },
                input_zip: {
                    required: true,
                },
                input_state: {
                    required: true,
                },
            },
            messages: {
                // input_first_name: {
                //     required: "Turnuva adı boş bırakılamaz."
                // }
            },
            submitHandler: function(form) {
                $("#addClientButton").prop("disabled", true);

                let email = form.input_email.value
                let password = form.input_password.value
                let password_confirmation = form.input_password_confirmation.value
                let title = form.input_title.selectedOptions[0].id
                let name = form.input_name.value
                let middlename = form.input_middlename.value
                let lastname = form.input_lastname.value
                let gender = form.input_gender.selectedOptions[0].id
                let birthdate = form.input_birthdate.value
                let phone = form.input_phone.value
                let country = form.input_country.value
                let city = form.input_city.value
                let address = form.input_address.value
                let zip = form.input_zip.value
                let state = form.input_state.value

                if (password != password_confirmation) {
                    toastr.error("Passwords do not match");
                    $("#addClientButton").prop("disabled", false);
                    return
                }

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\UsersController@add") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation,
                        title: title,
                        name: name,
                        middlename: middlename,
                        lastname: lastname,
                        gender: gender,
                        birthdate: birthdate,
                        phone: phone,
                        country: country,
                        city: city,
                        address: address,
                        zip: zip,
                        state: state
                    },
                    success: function(response) {
                        toastr.success("Customer created successfully");
                        $("#addClientButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.message);
                        $("#addClientButton").prop("disabled", false);
                    }
                });
            }
        });
        </script>
    </x-slot>
</x-app-layout>