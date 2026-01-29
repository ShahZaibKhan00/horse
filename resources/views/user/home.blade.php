@extends('layouts.user_app')
@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Horse Listings</h2>
            <a href="#!" class="points_btn">
                <img src="{{ asset('assets/images/points_icon.png') }}" alt="" class="img-fluid mb-2">
                Show Points
            </a>
        </div>
        <div class="inner_content_wrapper">
            <div class="welcome-container">
                <div class="welcome-content">
                    <img src="{{ asset('assets/images/welcome_img.png')}}" alt="Horse" class="horse-image">
                    <div class="text-content">
                        <div class="welcome-title">Welcome back, {{ $username }}!</div>
                        <div class="welcome-message">
                            We're so happy to see you again! You've arrived at your stable of tools and insights —
                            everything you need is <br> right at your fingertips! Have a blessed day!
                        </div>
                    </div>
                </div>

                <div class="blue_logo_bar">
                    <img src="{{ asset('assets/images/user_logo_crop.png') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="data_box_top_bar mb-3" bis_skin_checked="1">
                <h2>Your Saves</h2>
            </div>
            <div class="dashboard-container mb-5">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="count_boxs">
                            <p class="mb-3">Horse Your Watching</p>
                            <div class="icon_box_flex">
                                <div class="icon_box">
                                    <img src="{{ asset('assets/images/count_icon_4.png') }}" alt="" class="img-fluid">
                                </div>
                                <p>12</p>
                            </div>
                            <a href="#!">View Favorite Properties</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="count_boxs">
                            <p class="mb-3">Horse Your Watching</p>
                            <div class="icon_box_flex">
                                <div class="icon_box">
                                    <img src="{{ asset('assets/images/count_icon_2.png') }}" alt="" class="img-fluid">
                                </div>
                                <p>5</p>
                            </div>
                            <a href="#!">View Favorite Properties</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="count_boxs">
                            <p class="mb-3">Properties on your Radar</p>
                            <div class="icon_box_flex">
                                <div class="icon_box">
                                    <img src="{{ asset('assets/images/count_icon_3.png') }}" alt="" class="img-fluid">
                                </div>
                                <p>3</p>
                            </div>
                            <a href="#!">View Favorite Properties</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="count_boxs">
                            <p class="mb-3">Horse Searches</p>
                            <div class="icon_box_flex">
                                <div class="icon_box">
                                    <img src="{{ asset('assets/images/count_icon_4.png') }}" alt="" class="img-fluid">
                                </div>
                                <p>3</p>
                            </div>
                            <a href="#!">View Favorite Properties</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="count_boxs">
                            <p class="mb-3">Service Searches</p>
                            <div class="icon_box_flex">
                                <div class="icon_box">
                                    <img src="{{ asset('assets/images/count_icon_2.png') }}" alt="" class="img-fluid">
                                </div>
                                <p>5</p>
                            </div>
                            <a href="#!">View Favorite Properties</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="count_boxs">
                            <p class="mb-3">Properties Searches</p>
                            <div class="icon_box_flex">
                                <div class="icon_box">
                                    <img src="{{ asset('assets/images/count_icon_3.png') }}" alt="" class="img-fluid">
                                </div>
                                <p>3</p>
                            </div>
                            <a href="#!">View Favorite Properties</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="data_box_top_bar mb-3" bis_skin_checked="1">
                <h2>Your Plan at a Glance</h2>
            </div>
            <div class="dashboard-container mb-5">
                <div class="row gy-4">
                    <div class="col-md-3">
                        <div class="count_boxs_one_wrap">
                            <h2>Show Points Available</h2>
                            <div class="count_boxs_one">
                                <div class="count_boxs_one_icon_flex mb-4">
                                    <img src="{{ asset('assets/images/info_icon_1_1.png') }}" alt="" class="img-fluid">
                                    <p>0</p>
                                </div>
                                <a href="#!" class="gold_btn">Buy More Show Points</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="count_boxs_one_wrap">
                            <h2>Active Listings</h2>
                            <div class="count_boxs_one">
                                <div class="count_boxs_one_icon_flex mb-4">
                                    <img src="{{ asset('assets/images/info_icon_4.png') }}" alt="" class="img-fluid">
                                    <p>8</p>
                                </div>
                                <a href="#!" class="gold_btn">See Your Listings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="count_boxs_one_wrap">
                            <h2>E-Credits Valid For</h2>
                            <div class="count_boxs_one">
                                <div class="count_boxs_one_icon_flex mb-4">
                                    <img src="{{ asset('assets/images/info_icon_2.png') }}" alt="" class="img-fluid">
                                    <p>6 Months</p>
                                </div>
                                <a href="#!" class="gold_btn">Create a New Listings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="count_boxs_one_wrap">
                            <h2>Current Package</h2>
                            <div class="count_boxs_one">
                                <div class="count_boxs_one_icon_flex mb-4">
                                    <img src="{{ asset('assets/images/info_icon_3.png') }}" alt="" class="img-fluid">
                                    <p>0</p>
                                </div>
                                <a href="#!" class="gold_btn">Change Package</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="data_box_top_bar mb-3" bis_skin_checked="1">
                <h2>Account Overview</h2>
            </div>
            <div class="dashboard-container mb-5">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="acc_review_card">
                            <div class="name_bar mb-3">
                                <img src="{{ asset('assets/images/table_icon_1.png') }}" alt="" class="img-fluid">
                                <h2>Horse Listings</h2>
                            </div>
                            <a href="#!" class="gold_btn mb-3">+ Add Horse Listings</a>

                            <div class="details_row">
                                <div class="detail_col">
                                    <h3>5</h3>
                                    <p>Active</p>
                                </div>
                                <div class="detail_col">
                                    <h3>10</h3>
                                    <p>Sold</p>
                                </div>
                                <div class="detail_col border-0">
                                    <h3>5</h3>
                                    <p>Withdrawn</p>
                                </div>
                            </div>
                            <div class="total_count_box">
                                <h4>20</h4>
                                <p>Total</p>
                            </div>
                            <a href="#!" class="view_btn">View Horse Listing <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="acc_review_card">
                            <div class="name_bar mb-3">
                                <img src="{{ asset('assets/images/table_icon_2.png') }}" alt="" class="img-fluid">
                                <h2>Services Listings</h2>
                            </div>
                            <a href="#!" class="gold_btn mb-3">+ Add Horse Listings</a>

                            <div class="details_row">
                                <div class="detail_col w-50">
                                    <h3>1</h3>
                                    <p>Active</p>
                                </div>
                                <div class="detail_col w-50 border-0">
                                    <h3>1</h3>
                                    <p>Removed</p>
                                </div>
                            </div>
                            <div class="total_count_box">
                                <h4>1</h4>
                                <p>Total</p>
                            </div>
                            <a href="#!" class="view_btn">View Horse Listing <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="acc_review_card">
                            <div class="name_bar mb-3">
                                <img src="{{ asset('assets/images/table_icon_3.png') }}" alt="" class="img-fluid">
                                <h2>Real Estate Listings</h2>
                            </div>
                            <a href="#!" class="gold_btn mb-3">+ Add Horse Listings</a>

                            <div class="details_row">
                                <div class="detail_col">
                                    <h3>5</h3>
                                    <p>Active</p>
                                </div>
                                <div class="detail_col">
                                    <h3>10</h3>
                                    <p>Sold</p>
                                </div>
                                <div class="detail_col border-0">
                                    <h3>5</h3>
                                    <p>Withdrawn</p>
                                </div>
                            </div>
                            <div class="total_count_box">
                                <h4>11</h4>
                                <p>Total</p>
                            </div>
                            <a href="#!" class="view_btn">View Horse Listing <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="data_box_top_bar mb-3" bis_skin_checked="1">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('assets/images/info_icon_5.png') }}" alt="" class="img-fluid">
                    <h2>Next Billing Date</h2>
                </div>
            </div>
            <div class="">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="billing_wrap">
                            <div class="count_boxs billing_box text-center">
                                <p class="">Auto Renew On</p>
                                <p class="">01-Mar-2026</p>
                                <h2>Paddock Pass</h2>
                                <a href="#!" class="gold_btn">Manage Package</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
