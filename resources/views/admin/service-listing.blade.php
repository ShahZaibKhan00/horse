@extends('layouts.user_app')
<style>
    .product_clm .heading22px {
        white-space: unset;
        width: auto;
        overflow: visible;
        text-overflow: unset;
        text-transform: uppercase;
        height: 50px;
        overflow: hidden;
        text-decoration: underline;
    }
    @media only screen and (max-width: 1500px) {
        .product_clm .heading22px {
            height: 46px;
        }
    }
</style>
@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Service Listings</h2>
            <a href="#!" class="points_btn" data-bs-toggle="modal" data-bs-target="#pointsModal">
                <img src="assets/images/points_icon.png" alt="" class="img-fluid mb-2">
                E-Wallet
            </a>
        </div>
                <x-credit-modal />
        <div class="inner_content_wrapper">
            <div class="user_search_bar">
                <div class="user_search_box">
                    <input type="search" placeholder="Search by name">
                    <img src="assets/images/search.png" alt="" class="search_icon">
                </div>
                <div class="custom_tabs">
                    @if (!empty($data) && $data->created_at < \Carbon\Carbon::parse($data->created_at)->addMonth())
                        <a href="{{ route('add_service') }}" class="custom_tab_btn custom_tab_btn_one">Create A NEW Service AD</a>
                    @else
                        <a href="javascript:;" class="custom_tab_btn custom_tab_btn_one" data-bs-toggle="modal" data-bs-target="#packageWarningModal">Create A NEW Service AD</a>
                    @endif
                    <a href="#!" class="custom_tab_btn_min active" data-tab="all">All</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="active">Active</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="sold">Sold</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="withdrawn">Withdrawn</a>
                </div>


            </div>
            <div class="tab_content_wrapper">
                <div class="tab_content active" id="all">
                    <div class="row gy-4">
                        @foreach ($plans as $data)
                            <div class="col-md-3">
                                <div class="product_clm">
                                    <div class="product_clm_img_box">
                                        <img src="{{ asset('service-profile/' . $data->ser_profile) }}" class="pro_img border-0 mb-0" width="" height="" alt="">
                                 
                                    </div>
                                    <h5 class="heading22px">{{ $data->full_name }}</h5>
                                    <p>{{ $data->number }}</p>
                                    <a href="{{ Str::startsWith($data->website_url, 'http') ? $data->website_url : 'https://' . $data->website_url }}" target="_blank" class="webLink">{{ \Illuminate\Support\Str::words(str_replace(['https://', 'http://'], '', $data->website_url), 20) }}</a>
                                    <div class="btn_set mt-4">
                                        <a href="{{ url('service_details/' . Crypt::encrypt($data->id)) }}" class="horse_card_btn">View Detail</a>
                                        <a href="{{ url('edit_service') }}/{{ $data->id }}" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                        <a href="#!" class="dlt_btn" data-id="{{ $ad->id ?? $data->id ?? $listing->id }}" 
   data-toggle="modal"><img src="assets/images/dlt.png" alt=""></a>
                                    </div>
                                    <div class="views_bar mt-3">
                                        <h6>Views: 250</h6>
                                        <h6>Saves: 25</h6>
                                        <h5></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custome_popup" id="deleteModal">
        <div class="modal_content">
            <div class="horse-form text-center">
                <div class="horse-container">
                    <h1 class="title">ARE YOU SURE YOU WANT TO <br> DELETE YOUR AD?</h1>

                    <p class="description-text"> We're sad to see you go! Deleting your ad will end your subscription
                        and delete your ad—no further monthly charges will apply.
                        The ad won’t be saved, and re-listing means starting fresh.
                        Thank you for choosing Horse Auction Network!</p>

                    <div class="button-container">
                        <button class="btn-cancel btn-cancel-delete">Cancel</button>
                        <form id="deleteAdForm" action="{{ route('ads.destroy', $ad->id ?? $data->id) }}" 
                            method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn-submit">
                                Yes! Delete my Ad
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        @endforeach
                        {{-- <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="tab_content" id="active">

                </div>
                <div class="tab_content" id="sold">

                </div>
                <div class="tab_content" id="withdrawn">

                </div>
            </div>
        </div>
    </div>
@endsection
