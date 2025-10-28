<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial--scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ getenv('APP_URL') }}/assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/bootstrap.min.css" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- light box css -->
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/reponsive.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/fonts/fonts.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TB Cigars | Reset</title>

    <script src="{{ getenv('APP_URL') }}/assets/js/jquery.js"></script>
</head>

<body class="login">



<section class="login_register stiky_bg">
	<div class="container light">
		<div class="col-lg-6 mx-auto">
			<div class="loginReg">
				<a href="{{url('')}}">
					<img src="{{ getenv('APP_URL') }}/assets/images/logo.png" class="loginLogo" width="" height="" alt="/">
				</a>
				<!-- <p class="enterDetail">Enter your details below</p> -->
				<form method="POST" action="{{ route('password.email') }}" class="my-4">
                    

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf

                    <div class="row mb-3">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                        <div class="col-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12">
                            <button type="submit" class="border_btn w-100">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
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

</body>
</html>
