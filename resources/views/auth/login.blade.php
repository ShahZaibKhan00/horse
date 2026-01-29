<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ getenv('APP_URL') }}/assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/bootstrap.min.css" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery-ui css -->
    <!-- light box css -->
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/jquery.fancybox.min.css">
    <!-- swiper slider css -->
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/slick-theme.css">
    <!-- google fonts -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/reponsive.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/fonts/fonts.css">

    <title>Horse Action Network| Login</title>
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="login">

    <section class="login_register stiky_bg">
        <div class="container light">
            <div class="col-lg-6 mx-auto">
                <div class="loginReg">
                    <a href="{{ url('') }}">
                        <img src="{{ getenv('APP_URL') }}/assets/images/logo.png" class="loginLogo" width="" height="" alt="/">
                    </a>
                    <!-- <p class="enterDetail">Enter your details below</p> -->
                    <form method="POST" action="{{ route('login') }}" class="my-4">
                        @csrf
                        <div class="filed_wrap">
                            <!-- <span class="lable">Email Address</span> -->
                            <!-- <input type="email" name="" required="" class="input" placeholder="Enter Email Address"> -->
                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}"
                                required autocomplete="email" autofocus>
                        </div>
                        <div class="filed_wrap">
                            <!-- <span class="lable">Password</span> -->
                            <div class="pass_field_wrap">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror passwordInput input" name="password" required
                                    autocomplete="current-password" pattern=".{8,}">
                                <!-- <input type="password" name="password" required="" class="input passwordInput" placeholder="Enter Password"> -->
                                <i class="fa fa-eye showHide"></i>
                            </div>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror

                        <input type="submit" name="" class="border_btn w-100" value="LOGIN">
                    </form>

                    <div class="back_or_reg">
                        <a href="{{ url('') }}" class="simpleBtn">Back to Home</a>
                        <a href="{{ route('password.request') }}" class="login-link">Forgot password?</a>
                        <a href="{{ route('register') }}" class="simpleBtn">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ getenv('APP_URL') }}/assets/js/jquery.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        console.log(typeof toastr);

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
            console.log("running error");
        @endif
    </script>
    <script>
        let showHide = document.querySelector('.showHide');
        let passwordInput = document.querySelector('.passwordInput');

        showHide.addEventListener('click', () => {
            let type = passwordInput.getAttribute('type');
            if (type === "password") {
                showHide.classList.add('fa-eye-slash');
                passwordInput.setAttribute('type', 'text');
            } else {
                showHide.classList.remove('fa-eye-slash');
                passwordInput.setAttribute('type', 'password');
            }
        });
    </script>

    <!-- <script src="{{ getenv('APP_URL') }}/assets/js/jquery.js"></script>
<script src="{{ getenv('APP_URL') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ getenv('APP_URL') }}/assets/js/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="{{ getenv('APP_URL') }}/assets/js/slick.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ getenv('APP_URL') }}/assets/js/custom.js"></script> -->

</body>

</html>
