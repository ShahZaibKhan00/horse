@extends('layouts.admin_app')
<style>

</style>
@section('content')
<div class="content">
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12">
            <div class="box_top">
                <h2 class="mb-2 main_heading_dashboard">Admin Dashboard</h2>
                <!-- <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5> -->
            </div>
        </div>


		<div class="row mb-4">
			<div class="col-4">
                <a href="{{ url('add_product/New-Ads') }}" class="cat_btn">Horse Listings</a>
            </div>
			<div class="col-4">
               	<a href="{{ url('manage_service') }}" class="cat_btn">Service Listings</a>
            </div>
			<div class="col-4">
                <a href="{{ url('manage_realstate') }}" class="cat_btn">Real Estate Listings</a>
            </div>
		</div>
        <div class="row">
            <div class="col-3">
                <div class="border_box">
                    <div class="icon_box">
                    <img src="assets/images/clipboard.png" class="img-fluid">
                    </div>
                    <div class="text_box">
                        <h3 class="fw-light">Total Listing</h3>
                        <h1>{{ $product_count }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border_box">
                    <div class="icon_box color_one">
                    <img src="assets/images/marketing.png" class="img-fluid">
                    </div>
                    <div class="text_box">
                        <h3 class="fw-light">Active Listing</h3>
                        <h1>{{ $active_listing }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border_box">
                    <div class="icon_box color_two">
                    <img src="assets/images/sold-out.png" class="img-fluid">
                    </div>
                    <div class="text_box">
                        <h3 class="fw-light">Sold Listing</h3>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border_box">
                    <div class="icon_box color_three">
                    <img src="assets/images/warning.png" class="img-fluid">
                    </div>
                    <div class="text_box">
                        <h3 class="fw-light">Expired Listing</h3>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
