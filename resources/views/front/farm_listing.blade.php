@extends('layouts.app') @section('content')
    <section class="inner_page_banner farmBanner">
        <div class="container text-center">
            <h1 class="heading80px monte_carlo fw_400">Farms</h1>
            <p class="banner_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
        </div>
    </section>
    <section class="service_section_one">
        <div class="container-fluid">
            <div class="heading65px monte_carlo fw_400 mb-5">
                <h1>EQUESTRIAN REAL ESTATE</h1>
                <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
            </div>
            <div class="row gy-4">
                @forelse ($states as $state)
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 equestrian_col">
                        <div class="equestrian_real_estate_card">
                            <div class="img_box">
                                <div class="swiper horse_list_card_slider h-100 w-100">
                                    @php
                                        $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                    @endphp
                                    <div class="swiper-wrapper">
                                        @foreach ($images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('Gallery_imgs/' . $image) }}" alt="img">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="arrow_flex">
                                    <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                    <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="text_box">
                                <div class="blue_stripe mb-3">
                                    <h2>Stunning 5 acre Horse farm with indoor</h2>
                                </div>
                                <div class="row ps-3">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="inner_text_box">
                                            <ul>
                                                <li><span><img src="assets/images/eq_icon_1.png" alt="" class="img-fluid" /></span>{{ $state['real_acres'] }} Acres</li>
                                                <li><span><img src="assets/images/eq_icon_2.png" alt="" class="img-fluid" /></span>{{ $state['real_bedroom'] }} Bedrooms</li>
                                                <li><span><img src="assets/images/eq_icon_3.png" alt="" class="img-fluid" /></span>{{ $state['real_bathroom'] }} Bathroom</li>
                                                <li><span><img src="assets/images/eq_icon_4.png" alt="" class="img-fluid" /></span>{{ $state['real_garage'] }} Car Garage oversized</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                        <div class="inner_text_box">
                                            <h5>Title</h5>
                                            {{ $state['real_title'] }}
                                            <h5>Price:</h5>
                                            <p class="price">{{ $state['real_price'] }}</p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="inner_text_box">
                                            <div class="horse_list_card_btn_flex" bis_skin_checked="1">
                                                <a href="#!" class="horse_card_btn">View Detail</a>
                                                <form action="{{ route('farm.favorite', Crypt::encrypt($state['id'])) }}" method="POST">
                                                    @csrf
                                                    <button class="fvrt_btn" type="submit">
                                                        Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                {{-- <div class="col-lg-6 col-md-12 col-sm-12 col-12 equestrian_col">
                <div class="equestrian_real_estate_card">
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_2.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="arrow_flex">
                            <button class="horse_arrow_left"><i class="fa fa-chevron-left"
                                    aria-hidden="true"></i></button>
                            <button class="horse_arrow_right"><i class="fa fa-chevron-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="text_box">
                        <div class="blue_stripe mb-3">
                            <h2>Stunning 5 acre Horse farm with indoor</h2>
                        </div>
                        <div class="row ps-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="inner_text_box">
                                    <ul>
                                        <li><span><img src="assets/images/eq_icon_1.png" alt=""
                                                    class="img-fluid" /></span>50.4 Acres</li>
                                        <li><span><img src="assets/images/eq_icon_2.png" alt=""
                                                    class="img-fluid" /></span>2 Bedrooms</li>
                                        <li><span><img src="assets/images/eq_icon_3.png" alt=""
                                                    class="img-fluid" /></span>1 Bathroom</li>
                                        <li><span><img src="assets/images/eq_icon_4.png" alt=""
                                                    class="img-fluid" /></span>1 Car Garage oversized</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="inner_text_box">
                                    <h5>About</h5>
                                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                        sapiente fuga dicta nobis autem commodi cumque adipisci rerum</p>
                                    <h5>Price:</h5>
                                    <p class="price">$999,500.00</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="inner_text_box">
                                    <div class="horse_list_card_btn_flex" bis_skin_checked="1">
                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                        <label class="fvrt_btn">
                                            <input type="checkbox" hidden="">
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 equestrian_col">
                <div class="equestrian_real_estate_card">
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_3.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="arrow_flex">
                            <button class="horse_arrow_left"><i class="fa fa-chevron-left"
                                    aria-hidden="true"></i></button>
                            <button class="horse_arrow_right"><i class="fa fa-chevron-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="text_box">
                        <div class="blue_stripe mb-3">
                            <h2>Stunning 5 acre Horse farm with indoor</h2>
                        </div>
                        <div class="row ps-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="inner_text_box">
                                    <ul>
                                        <li><span><img src="assets/images/eq_icon_1.png" alt=""
                                                    class="img-fluid" /></span>50.4 Acres</li>
                                        <li><span><img src="assets/images/eq_icon_2.png" alt=""
                                                    class="img-fluid" /></span>2 Bedrooms</li>
                                        <li><span><img src="assets/images/eq_icon_3.png" alt=""
                                                    class="img-fluid" /></span>1 Bathroom</li>
                                        <li><span><img src="assets/images/eq_icon_4.png" alt=""
                                                    class="img-fluid" /></span>1 Car Garage oversized</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="inner_text_box">
                                    <h5>About</h5>
                                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                        sapiente fuga dicta nobis autem commodi cumque adipisci rerum</p>
                                    <h5>Price:</h5>
                                    <p class="price">$999,500.00</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="inner_text_box">
                                    <div class="horse_list_card_btn_flex" bis_skin_checked="1">
                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                        <label class="fvrt_btn">
                                            <input type="checkbox" hidden="">
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 equestrian_col">
                <div class="equestrian_real_estate_card">
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_4.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="arrow_flex">
                            <button class="horse_arrow_left"><i class="fa fa-chevron-left"
                                    aria-hidden="true"></i></button>
                            <button class="horse_arrow_right"><i class="fa fa-chevron-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="text_box">
                        <div class="blue_stripe mb-3">
                            <h2>Stunning 5 acre Horse farm with indoor</h2>
                        </div>
                        <div class="row ps-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="inner_text_box">
                                    <ul>
                                        <li><span><img src="assets/images/eq_icon_1.png" alt=""
                                                    class="img-fluid" /></span>50.4 Acres</li>
                                        <li><span><img src="assets/images/eq_icon_2.png" alt=""
                                                    class="img-fluid" /></span>2 Bedrooms</li>
                                        <li><span><img src="assets/images/eq_icon_3.png" alt=""
                                                    class="img-fluid" /></span>1 Bathroom</li>
                                        <li><span><img src="assets/images/eq_icon_4.png" alt=""
                                                    class="img-fluid" /></span>1 Car Garage oversized</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="inner_text_box">
                                    <h5>About</h5>
                                    <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                        sapiente fuga dicta nobis autem commodi cumque adipisci rerum</p>
                                    <h5>Price:</h5>
                                    <p class="price">$999,500.00</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="inner_text_box">
                                    <div class="horse_list_card_btn_flex" bis_skin_checked="1">
                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                        <label class="fvrt_btn">
                                            <input type="checkbox" hidden="">
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>

        </div>
    </section>
@endsection
