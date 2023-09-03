<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Manashvi Garments | Register</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="{{ asset('user-assets/xhtml/image/png') }}" href="images/favicon.png">

    <link href="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('user-assets/xhtml/css/style.css') }}" rel="stylesheet">


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
                                    <div class="text-center mb-3">
                                        <a href="/"><img class="logo-light" src="images/logo-full.png"
                                                alt=""></a>
                                        <a href="/"><img class="logo-dark" src="images/logo-white-full.png"
                                                alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="username" required autofocus autocomplete="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control "
                                                placeholder="hello@example.com" required autocomplete="username">
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" id="dz-password" name="password"
                                                class="form-control " required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            <span class="show-pass eye">

                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>

                                            </span>
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input type="password" id="dz-password" name="password_confirmation"
                                                class="form-control " required>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Sign me up
                                            </button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary"
                                                href="{{ route('login') }}">Sign
                                                in</a></p>
                                    </div>
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
    <script src="{{ asset('user-assets/xhtml/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/custom.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/demo.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/styleSwitcher.js') }}"></script>
</body>

</html>
