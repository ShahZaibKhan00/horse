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
      <title>Horse Action Network | Register</title>

</head>
<body class="register">

<section class="login_register stiky_bg">
	<div class="container light">
		<div class="col-lg-6 mx-auto">
			<div class="loginReg">
				<a href="{{url('')}}">
					<img src="{{ getenv('APP_URL') }}/assets/images/logo.png" class="loginLogo" width="" height="" alt="SDL GOLDEN GROUP">
				</a>
				<!-- <p class="enterDetail">Register</p> -->
				<form method="POST" action="{{ route('register') }}" class="my-4">
				@csrf
					<div class="filed_wrap">
						<!-- <span class="lable">Full Name</span> -->
						<input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						<!-- <input type="text" name="" required="" class="input" placeholder="Enter Full Name"> -->
					</div>
					<div class="filed_wrap">
						<!-- <span class="lable">Email Address</span> -->
						<input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email">
						<!-- <input type="email" name="" required="" class="input" placeholder="Enter Email Address"> -->
					</div>
					<div class="filed_wrap">
						<!-- <span class="lable">Password</span> -->
						<div class="pass_field_wrap">
							<i class="fa fa-eye showHide"></i>
							<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror input" name="password" required autocomplete="new-password" pattern=".{8,}">
							<!-- <input type="password" name="password" required="" class="input passwordInput" placeholder="Enter Password"> -->
						</div>
					</div>
					<div class="filed_wrap">
						<!-- <span class="lable">Password</span> -->
						<div class="pass_field_wrap">
							<i class="fa fa-eye showHide"></i>
							<input id="password-confirm" placeholder="Confirm Password" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
							<!-- <input type="password" name="password" required="" class="input passwordInput" placeholder="Enter Confirm Password"> -->
						</div>
					</div>

					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

					<input type="submit" name="" class="border_btn w-100" value="SIGN UP">
				</form>
				<div class="back_or_reg">
					<a href="{{ url('') }}" class="simpleBtn">Back to Home</a>
					<span>OR</span>
					<a href="{{ route('login') }}" class="simpleBtn">Back to Login</a>
				</div>
			</div>
		</div>
	</div>
</section>



<script src="{{ getenv('APP_URL') }}/assets/js/jquery.js"></script>
<!-- <script src="{{ getenv('APP_URL') }}/assets/js/bootstrap.min.js"></script> -->
<!-- <script src="{{ getenv('APP_URL') }}/assets/js/jquery.fancybox.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script> -->
<!-- <script src="{{ getenv('APP_URL') }}/assets/js/slick.min.js"></script> -->
<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
<!-- <script src="{{ getenv('APP_URL') }}/assets/js/custom.js"></script> -->


<script>
jQuery('.showHide').click(function(){
    var a = jQuery(this).next().attr('type');
    if(a == 'password'){
        jQuery(this,'i.myEyeIcon').addClass('fa-eye-slash');
        jQuery(this).next().attr('type','text');
    }
    else{
        jQuery(this,'i.myEyeIcon').removeClass('fa-eye-slash');
       	jQuery(this).next().attr('type','password'); 
    }
}); 
</script>

</body>
</html>