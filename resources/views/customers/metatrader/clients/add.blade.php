<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Client</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="newClient">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-9">
                                                <label class="form-label">Binded user</label>
                                                <select id="input_user" name="input_user"
                                                    class="default-select form-control wide">
                                                    <option selected disabled>Select User...</option>
                                                    @foreach($unbinded_users as $user)
                                                    <option id="{{ $user->id }}" email="{{ $user->email }}"
                                                        name="{{ $user->name }}" lastname="{{ $user->lastname }}"
                                                        middlename="{{ $user->middlename }}"  birthdate="{{ $user->birthdate }}"
                                                        title="{{ $user->title }}" gender="{{ $user->gender }}"
                                                        phone="{{ $user->phone }}" country="{{ $user->country }}"
                                                        city="{{ $user->city }}" address="{{ $user->address }}"
                                                        zip="{{ $user->postal_code }}" state="{{ $user->state }}"
                                                        email-verified="{{ $user->email_verified }}">
                                                        [{{ $user->id }}] ({{ $user->email }}) {{ $user->name }}
                                                        {{ $user->lastname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Auto Fill User Data</label>
                                                <button id="autoFillButton" type="button"
                                                    class="btn btn-primary form-control wide">Auto Fill</button>
                                            </div>
                                        </div>
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
                                        <button id="addClientButton" type="submit" class="btn btn-primary">Add</button>
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

        $("#newClient").validate({
            errorClass: 'is-invalid',
            rules: {
                input_user: {
                    required: true
                },
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

                let user_id = form.input_user.selectedOptions[0].id
                let title = form.input_title.selectedOptions[0].id
                let name = form.input_name.value
                let middlename = form.input_middlename.value
                let lastname = form.input_lastname.value
                let gender = form.input_gender.selectedOptions[0].id
                let birthdate = form.input_birthdate.value
                let email = form.input_email.value
                let phone = form.input_phone.value
                let country = form.input_country.value
                let city = form.input_city.value
                let address = form.input_address.value
                let zip = form.input_zip.value
                let state = form.input_state.value

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\MetatraderController@addClient") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: user_id,
                        title: title,
                        name: name,
                        middlename: middlename,
                        lastname: lastname,
                        gender: gender,
                        birthdate: birthdate,
                        email: email,
                        phone: phone,
                        country: country,
                        city: city,
                        address: address,
                        zip: zip,
                        state: state
                    },
                    success: function(response) {
                        console.log(response)
                        alert(response.message)
                        $("#addClientButton").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error)
                        alert(error.responseText);
                        $("#addClientButton").prop("disabled", false);
                    }
                });
            }
        });

        $('body').on('click', 'button[id=autoFillButton]', function(e) {
            var user_id = $('#input_user').find(":selected").attr('id');
            if (user_id == undefined) {
                alert("Please select a user.")
                return;
            }
            
            var email = $('#input_user').find(":selected").attr('email');
            var name = $('#input_user').find(":selected").attr('name');
            var middlename = $('#input_user').find(":selected").attr('middlename');
            var lastname = $('#input_user').find(":selected").attr('lastname');
            var birthdate = $('#input_user').find(":selected").attr('birthdate');
            birthdate = moment(birthdate).format('YYYY-MM-DD');
            var title = $('#input_user').find(":selected").attr('title');
            var gender = $('#input_user').find(":selected").attr('gender');
            var phone = $('#input_user').find(":selected").attr('phone');
            var country = $('#input_user').find(":selected").attr('country');
            var city = $('#input_user').find(":selected").attr('city');
            var address = $('#input_user').find(":selected").attr('address');
            var zip = $('#input_user').find(":selected").attr('zip');
            var state = $('#input_user').find(":selected").attr('state');
            var email_verified = $('#input_user').find(":selected").attr('email-verified');

            $('input[name=input_email]').val(email);
            $('input[name=input_name]').val(name);
            $('input[name=input_middlename]').val(middlename);
            $('input[name=input_lastname]').val(lastname);
            $('input[name=input_birthdate]').val(birthdate);
            $('select[name=input_title]').val(title).change();
            $('select[name=input_gender]').val(gender).change();

            $('input[name=input_phone]').val(phone);
            $('input[name=input_country]').val(country);
            $('input[name=input_city]').val(city);
            $('input[name=input_address]').val(address);
            $('input[name=input_zip]').val(zip);
            $('input[name=input_state]').val(state);

        })
        </script>
    </x-slot>
</x-app-layout>