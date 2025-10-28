@extends('layouts.app')
@section('content')
<section class="inner_page_banner productsbanner">
	<div class="container text-center">
		@foreach($cate as $cate)
		<h1 class="heading80px monte_carlo fw_400">{{ $cate->cate_name }}</h1>
		<p>{{ $cate->cate_desc }}</p>
		@endforeach
	</div>
</section>
<div class="about_long_bg">
	<section class="products_sec">
		<div class="container">
			<div class="row">
				@foreach($data as $pro_data)
				<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
					<div class="product_clm">
						<img src="{{ getenv('APP_URL') }}/Featured_image/{{ $pro_data->pro_Fimg }}" class="pro_img" width="" height="" alt=""/>
						<h5 class="heading22px primeColor">{{ $pro_data->pro_name }}</h5>
						<p><?= implode(' ', array_slice(explode(' ', $pro_data->pro_desc), 0, 10)) . '...'; ?></p>
						<div class="btn_set">
							<a href="{{ url('products_detail') }}/{{$pro_data->pro_sku}}" class="border_btn">View Detail</a>
							<a href="{{ url('products_detail') }}/{{$pro_data->pro_sku}}" class="border_btn2">Buy Now</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
</div>
@include("inc.gallery")
@endsection