@extends('layouts.app')
@section('content')
<section class="inner_page_banner contactbanner">
	<div class="container text-center">
		<h1 class="heading80px monte_carlo fw_400">Contact Us</h1>
	</div>
</section>
<div class="about_long_bg">
	<section class="products_sec">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 mb-4">
					<div class="product_clm">
						<form action="" method="">
							<input type="text" name="name" placeholder="Enter your name" class="input" required="">
							<input type="email" name="email" placeholder="Enter your email" class="input" required="">
							<input type="number" name="number" placeholder="Enter your number" class="input" required="">
							<textarea name="msg" placeholder="Enter your message" class="input"></textarea>
							<button class="border_btn" type="submit">Submit</button>
						</form>
					</div>
				</div>
				<div class="col-lg-6 mb-4">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52816169.558200695!2d-161.49265223136007!3d36.102185713814805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1734540724141!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</section>
</div>
@include("inc.gallery")
@endsection