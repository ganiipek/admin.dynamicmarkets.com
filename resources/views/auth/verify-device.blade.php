<head>
    <!-- FAVICONS ICON -->

    <link rel="shortcut icon" type="image/icon" href="{{ asset('favicon.ico')}}" />
    <title>GDM Admin</title>
    <!-- FAVICONS ICON -->
    <link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                
                                    <h4 class="text-center mb-4">Verify your device</h4>
                                    <form onsubmit=" return submitForm(event)">
                                        <div class="mb-3">
                                            <label><strong>Please check your email address and enter the pincode!</strong></label>
                                            <input id="code" type="text" class="form-control" placeholder="Code">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Verify</button>
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js')}}"></script>
    <script src="{{ asset('js/dlabnav-init.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script>
        function submitForm(event) {
            event.preventDefault();
            const form = event.target;

            $.ajax({
                type: "post",
                url: '{{ action("App\\Http\\Controllers\\AuthController@verifyDevice") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    pincode: form.code.value
                },
                success: function(response) {
                    window.location.href = "{{ route('index')}}";
                },
                error: function(error) {
                    alert(error.responseJSON.message);
                    // window.location.href = "{{ route('auth.login')}}";
                }
            });
        }
    </script>
</body>