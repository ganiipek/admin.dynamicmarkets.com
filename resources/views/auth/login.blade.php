<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('favicon.ico')}}" />
    <title>GDM Admin</title>
    <!-- FAVICONS ICON -->
    <link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="body  h-100" style="background-image: url('images/login-bg-1.jpg'); background-size:cover;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-contain-center">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row m-0 align-items-center">
                            <div class="col-xl-6 col-md-6 sign text-center">
                                <div>
                                    <div class="text-center my-5">
                                        <img src="images/logo.png" class="img-fluid"></img>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="sign-in-your py-4 px-2">
                                    <h4 class="fs-20">Sign in your account</h4>
                                    <form onsubmit=" return submitForm(event)">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="hello@example.com" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <!-- <div class="g-recaptcha"
                                                data-sitekey="6Ld1tGUkAAAAAJG-5n1QOgORuL2JXJtcTdFEiPNp"></div> -->
                                            <div class="g-recaptcha"
                                                data-sitekey="{{ $recaptcha_site_key }}"></div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me
                                                In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/global/global.min.js')}}"></script>
    <script src="{{ asset('js/dlabnav-init.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script>
    function submitForm(event) {
        event.preventDefault();
        const form = event.target;
        const token = grecaptcha.getResponse();

        $.ajax({
            type: "post",
            url: '{{ action("App\Http\Controllers\AuthController@login") }}',
            data: {
                _token: '{{ csrf_token() }}',
                email: form.email.value,
                password: form.password.value,
                recaptcha_response: token
            },
            success: function(response) {
                window.location.href = "{{ route('index')}}";
            },
            error: function(error) {
                console.log(error);
                if (error.status == 403) {
                    window.location.href = "{{ route('auth.verify-device')}}";
                } else {
                    alert(error.responseText);
                }
            }
        });
    }
    </script>
</body>

</html>