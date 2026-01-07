@extends('layouts.user_app')

@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Horse Listings</h2>
            <a href="#!" class="points_btn">
                <img src="assets/images/points_icon.png" alt="" class="img-fluid mb-2">
                Show Points
            </a>
        </div>
        <div class="inner_content_wrapper">
            <div class="user_search_bar">
                <div class="user_search_box">
                    <input type="search" placeholder="Search by name">
                    <img src="assets/images/search.png" alt="" class="search_icon">
                </div>
                <div class="custom_tabs">
                    <a href="{{ route('add_product', 'New Ads') }}" class="custom_tab_btn custom_tab_btn_one">Create A NEW HORSE AD</a>
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
                                <div class="user_gen_card_one">
                                    <div class="top__bar">
                                        <h2>{{ $data->pro_name }}</h2>
                                        <p class="user_tag">{{ $data->pro_ad_type }}</p>
                                        <label class="heart-label">
                                            <input type="checkbox" class="heart-input">
                                            <svg class="heart-icon" viewBox="0 0 24 24">
                                                <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="user_img_box">
                                        <div class="swiper user_card_slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="assets/images/card_img_1.png" alt="" class="img-fluid"></div>
                                                <div class="swiper-slide"><img src="assets/images/card_img_1.png" alt="" class="img-fluid"></div>
                                                <div class="swiper-slide"><img src="assets/images/card_img_1.png" alt="" class="img-fluid"></div>
                                                <div class="swiper-slide"><img src="assets/images/card_img_1.png" alt="" class="img-fluid"></div>
                                                <div class="swiper-slide"><img src="assets/images/card_img_1.png" alt="" class="img-fluid"></div>
                                            </div>
                                        </div>
                                        <div class="user_card_slider_arrows">
                                            <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png" alt=""></button>
                                            <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png" alt=""></button>
                                        </div>
                                        <p>GYPSY VANNER CROSS</p>
                                        <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                            <h5>
                                                <span class="days">1</span> Days |
                                                <span class="hours">0</span> Hrs |
                                                <span class="minutes">0</span> Mins |
                                                <span class="seconds">0</span> Secs
                                            </h5>
                                            <h6>TILL END OF AUCTIONS</h6>
                                        </div>
                                    </div>
                                    <div class="user_card_info_box">
                                        <div class="cell_container">
                                            <div class="cell">{{ $data->pro_age_year }} YEARS OLD</div>
                                            <div class="cell">{{ $data->pro_color }}</div>
                                            <div class="cell">{{ $data->pro_height }} HH</div>
                                            <div class="cell">REGISTERED: {{ Str::upper($data->registerd_horse ?? 'no') }}</div>
                                            <div class="cell">{{ $data->pro_gender }}</div>
                                            <div class="cell">GAITED: {{ Str::upper($data->gaited) }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-panel">
                                        <div class="bid-header">
                                            <div class="bid-amount">STARTING BID: ${{ $data->pro_reg_price }}</div>
                                        </div>
                                        {{-- <button class="button button-full">VIEW ALL DETAILS</button> --}}
                                        <div class="button-row">
                                            {{-- <button class="button">SELLER PROFILE</button>
                                            <button class="button">CHAT WITH SELLER</button> --}}
                                        </div>
                                        <div class="button-row">
                                            <button class="button button-full">VIEW ALL DETAILS</button>

                                            <button class="button mb-0">SHARE</button>
                                            {{-- <button class="button mb-0">FAVORITE <span
                                                    style="color: #B69455">❤</span></button> --}}
                                        </div>
                                    </div>
                                    <div class="management-panel">
                                        <div class="control-row">
                                            <button class="clickable-box solid-style">VIEW DETAILS</button>
                                            <a href="{{ url('edit_list') }}/{{ $data->id }}/{{ str_replace(' ', '-', $data->category_name) }}" class="clickable-box hollow-style">EDIT <span
                                                    class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></a>
                                        </div>
                                        <div class="control-row">
                                            <button class="clickable-box hollow-style">Mark Pending</button>
                                            <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                        </div>
                                        <div class="analytics-bar">
                                            <div class="data-point">Views: 250</div>
                                            <div class="data-point">Saves: 25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="sold_badge"><img src="assets/images/SOLD.png" alt=""></div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="tab_content" id="active">
                    <div class="row gy-4">
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_content" id="sold">
                    <div class="row gy-4">
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="sold_badge"><img src="assets/images/SOLD.png" alt=""></div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="sold_badge"><img src="assets/images/SOLD.png" alt=""></div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>

                                    <div class="sold_badge"><img src="assets/images/SOLD.png" alt=""></div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>

                                    <div class="sold_badge"><img src="assets/images/SOLD.png" alt=""></div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_content" id="withdrawn">
                    <div class="row gy-4">
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user_gen_card_one">
                                <div class="top__bar">
                                    <h2>The River Of Grace</h2>
                                    <p class="user_tag">At Auction</p>

                                    <label class="heart-label">
                                        <input type="checkbox" class="heart-input">
                                        <svg class="heart-icon" viewBox="0 0 24 24">
                                            <path d="M12 21s-7-4.35-9.5-8.28C.4 9.36 2.28 5 6.5 5c2.54 0 3.57 1.93 5.5 3.5C13.93 6.93 14.96 5 17.5 5c4.22 0 6.1 4.36 4 7.72C19 16.65 12 21 12 21z"/>
                                        </svg>
                                    </label>
                                </div>
                                <div class="user_img_box">
                                    <div class="swiper user_card_slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                            <div class="swiper-slide"><img src="assets/images/card_img_1.png"
                                                    alt="" class="img-fluid"></div>
                                        </div>
                                    </div>
                                    <div class="user_card_slider_arrows">
                                        <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png"
                                                alt=""></button>
                                        <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png"
                                                alt=""></button>
                                    </div>
                                    <p>GYPSY VANNER CROSS</p>
                                    <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                        <h5>
                                            <span class="days">1</span> Days |
                                            <span class="hours">0</span> Hrs |
                                            <span class="minutes">0</span> Mins |
                                            <span class="seconds">0</span> Secs
                                        </h5>
                                        <h6>TILL END OF AUCTIONS</h6>
                                    </div>
                                </div>
                                <div class="user_card_info_box">
                                    <div class="cell_container">
                                        <div class="cell">2 YEARS OLD</div>
                                        <div class="cell">SILVER DAPPLE</div>
                                        <div class="cell">15 HH</div>
                                        <div class="cell">REGISTERED: NO</div>
                                        <div class="cell">GELDING</div>
                                        <div class="cell">GAITED: NO</div>
                                    </div>
                                </div>
                                <div class="bid-panel">
                                    <div class="bid-header">
                                        <div class="bid-amount">STARTING BID: $30,500.00</div>
                                    </div>
                                    <button class="button button-full">VIEW ALL DETAILS</button>
                                    <div class="button-row">
                                        <button class="button">SELLER PROFILE</button>
                                        <button class="button">CHAT WITH SELLER</button>
                                    </div>
                                    <div class="button-row">
                                        <button class="button mb-0">SHARE</button>
                                        <button class="button mb-0">FAVORITE <span
                                                style="color: #B69455">❤</span></button>
                                    </div>
                                </div>
                                <div class="management-panel">
                                    <div class="control-row">
                                        <button class="clickable-box solid-style">VIEW DETAILS</button>
                                        <button class="clickable-box hollow-style">EDIT <span
                                                 class="edit-symbol"><img src="assets/images/edit.png" alt=""></span></button>
                                    </div>
                                    <div class="control-row">
                                        <button class="clickable-box hollow-style">Mark Pending</button>
                                        <button class="clickable-box hollow-style withdraw_btn">Mark Sold/ withdrawn</button>
                                    </div>
                                    <div class="analytics-bar">
                                        <div class="data-point">Views: 250</div>
                                        <div class="data-point">Saves: 25</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
