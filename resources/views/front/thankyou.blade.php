@extends('layouts.app')
@section('content')
<style>
	footer{display: none;}
</style>
<div class="about_long_bg">
	<section class="thankyou">
		<div class="container">
			<div class="col-lg-6 col-md-7 mx-auto text-center">
				<div class="thankyou_clm">
					<h2 class="heading80px monte_carlo fw_400 text-center">Thank You!</h2>
					<p>Your order has been placed and is being processed. You will receive an email with the order details.</p>
					<a href="{{ getenv('APP_URL') }}" class="border_btn">Back to home</a>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection