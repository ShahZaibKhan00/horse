@extends('layouts.user_app')
@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Service Listings</h2>
            <a href="#!" class="points_btn">
                <img src="{{ getenv('APP_URL') }}/assets/images/points_icon.png" alt="" class="img-fluid mb-2">
                Show Points
            </a>
        </div>
        <div class="inner_content_wrapper">
            <div class="user_search_bar">
                <div class="user_search_box">
                    <input type="search" placeholder="Search by name">
                    <img src="{{ getenv('APP_URL') }}/assets/images/search.png" alt="" class="search_icon">
                </div>
                <div class="custom_tabs">
                    <a href="#!" class="custom_tab_btn custom_tab_btn_one">Create A NEW Service AD</a>
                    <a href="#!" class="custom_tab_btn_min active" data-tab="all">All</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="active">Active</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="sold">Sold</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="withdrawn">Withdrawn</a>
                </div>
            </div>
            <div class="tab_content_wrapper">
                <div class="tab_content active" id="all">
                    <div class="row gy-4">
                        <div class="col-md-3">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
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
                                    <img src="{{ getenv('APP_URL') }}/assets/images/service_card_img.png" class="pro_img border-0 mb-0" width="" height="" alt="">
                                    <p>GYPSY VANNER CROSS</p>
                                </div>
                                <h5 class="heading22px">aBC HORSE TRANSPORT COMPANY</h5>
                                <p>(973) 555-555</p>
                                <a href="#!" target="_blank" class="webLink">www.abchorsetransport.com</a>
                                <div class="btn_set mt-4">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <a href="#!" class="fvrt_btn">Edit <span class="edit-symbol"><img src="{{ getenv('APP_URL') }}/assets/images/edit.png" alt=""></span></a>
                                    <a href="#!" class="dlt_btn"><img src="{{ getenv('APP_URL') }}/assets/images/dlt.png" alt=""></a>
                                </div>
                                <div class="views_bar mt-3">
                                    <h6>Views: 250</h6>
                                    <h6>Saves: 25</h6>
                                    <h5></h5>
                                </div>
                            </div>
                        </div>
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
