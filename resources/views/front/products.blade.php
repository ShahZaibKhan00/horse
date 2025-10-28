@extends('layouts.app')
@section('content')
<section class="inner_page_banner productsbanner">
	<div class="container text-center">
		<h1 class="heading80px monte_carlo fw_400"> Horse Listing</h1>
		<p class="banner_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
	</div>
</section>
<section class="best_selling">
	<div class="container-fluid">
        <div class="heading65px monte_carlo fw_400 mb-5">
            <h1>FEATURED LIST</h1>
            <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
        </div>    

		<!--- <p class="text-center subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> --->
		<div class="row gy-4">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="horse_list_card">
                    <div class="blue_stripe">
                        <h2>ZION</h2>
                    </div>
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg"
                                        alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg"
                                        alt="" />
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
                    <div class="blue_stripe">
                        <h3>Price: $10,000.00</h3>
                    </div>
                    <div class="text_box">


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                            <li><strong>Sex:</strong> Gelding</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="info_list">
                                            <li><strong>Height:</strong> 15 HH</li>
                                            <li><strong>Ad Type:</strong> Auction</li>
                                            <li><strong>Location:</strong> New Jersey</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blue_stripe">
                            <ul class="top_list">
                                <li>Trail</li>
                                <li>Dressage</li>
                                <li>Beginner Safe</li>
                            </ul>
                        </div>

                        <div class="horse_list_card_btn_flex">
                            <a href="#!" class="horse_card_btn">Pictures</a>
                            <a href="#!" class="horse_card_btn">Videos</a>
                            <label class="fvrt_btn">
                                <input type="checkbox" hidden />
                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                            </label>
                            <a href="#!" class="horse_card_btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
@endsection