@extends('layouts.admin_app')

<style>
    .horse_card_btn {
        width: 120px !important;
        height: 45px !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        font-size: 15px !important;
        color: #fff !important;
        background: #1d2139 !important;
        border: 0;
    }

    .horse_list_card_btn_flex {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        margin-top: 10px;
        text-align: center;
    }

    .fvrt_btn {
        width: 130px;
        padding: 0px 20px;
        height: 45px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        font-weight: 500;
        color: #1d2139;
        border: 1px solid #1d2139;
        background: transparent;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s, color 0.3s;
    }

    .fvrt_btn:has(input:checked) {
        background: #ab8d35;
        color: white;
        border: 1px solid #ab8d35;
    }

    .horse_list_card {
        width: 100%;
        display: flex;
        /* align-items: center; */
        gap: 5px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        flex-direction: column;
        background: #fff;
    }

    .horse_list_card .img_box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .horse_list_card .img_box {
        width: 100%;
        height: 195px;
        position: relative;
        border-radius: 2px;
        overflow: hidden;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    .horse_list_card .text_box .top_list {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        gap: 0;
        padding: 0 !important;
    }

    .blue_stripe h2 {
        font-size: 30px;
        font-weight: 700;
        text-align: center;
        margin: 0;
        background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-transform: uppercase;
    }

    .blue_stripe {
        background: #1d2139;
        width: 100%;
        padding: 7px 5px;
    }

    .blue_stripe h3 {
        font-size: 20px;
        font-weight: 700;
        text-align: center;
        width: 100%;
        background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
    }

    .horse_list_card .text_box {
        width: 100%;
    }

    .horse_list_card .text_box .top_list li {
        font-size: 12px;
        color: #ffffff;
        text-align: center;
        padding: 0px 6px;
        border-right: 1px solid #ffffff;
        font-weight: 500;
        text-transform: uppercase;
    }

    .horse_list_card .text_box .top_list li:last-child {
        border-right: 0;
    }

    .info_list {
        list-style: none;
        margin: 15px 0px;
        padding: 0 !important;
    }

    .info_list li {
        font-size: 15px;
        color: #000000;
        margin: 3px 0px;
        font-weight: 500;
    }

    .horse_list_card_btn_flex {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        margin-top: 10px;
        text-align: center;
        flex-wrap: wrap;
    }

    .fvrt_btn {
        width: 130px;
        padding: 0px 20px;
        height: 45px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        font-weight: 500;
        color: #1d2139;
        border: 1px solid #1d2139;
        background: transparent;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s, color 0.3s;
    }

    .fvrt_btn:has(input:checked) {
        background: #ab8d35;
        color: white;
        border: 1px solid #ab8d35;
    }

    .horse_card_btn {
        width: 120px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        color: #fff !important;
        background: #1d2139;
    }

    .horse_list_card .horse_card_btn {
        width: 105px;
        height: 45px;
        font-size: 14px;
    }

    .horse_list_card .fvrt_btn {
        width: 120px;
        padding: 0px 15px;
        height: 45px;
        gap: 8px;
        font-size: 13px;
    }

    .horse_list_card .swiper-pagination-bullet,
    .equestrian_real_estate_card .swiper-pagination-bullet {
        width: 11px;
        height: 11px;
        display: inline-block;
        border-radius: var(--swiper-pagination-bullet-border-radius, 50%);
        background: #fff;
        opacity: 1;
    }

    .horse_list_card .swiper-pagination-bullet-active,
    .equestrian_real_estate_card .swiper-pagination-bullet-active {
        opacity: 1;
        background: #1d2139;
        transform: scale(1.3);
        border: 1px solid #fff;
    }

    .arrow_flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 999;
        width: 100%;
    }

    .border_box {
        padding: 5px 10px;
        background: #fcefef;
    }

    .arrow_flex button {
        width: 30px;
        height: 30px;
        border: 0;
        font-size: 20px;
        border-radius: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .horse_arrow_right {
        transform: translateX(30px);
        transition: all .25s;
    }

    .horse_arrow_left {
        transform: translateX(-30px);
        transition: all .25s;
    }

    .horse_list_card:hover .horse_arrow_right {
        transform: translateX(0px);
    }

    .horse_list_card:hover .horse_arrow_left {
        transform: translateX(0px);
    }
</style>

@section('content')
    <div class="content">
        <div class="pb-6">
            <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
                <div class="row g-3 justify-content-between mb-4">
                    <div class="col-auto">
                        <h2 class="mb-2 text-white main_heading_dashboard">{{ count($data) }} Products</h2>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="row g-2 gy-3">
                            <div class="col-auto flex-1">
                                <div class="search-box">
                                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search form-control-sm" type="search"
                                            placeholder="Search" aria-label="Search" />
                                        <span class="fas fa-search search-box-icon"></span>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url('add_product') }}/{{ str_replace(' ', '-', $cate_name) }}" class="btn submit_btn_one">Add Product</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-4">
                    @foreach ($data as $list)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="horse_list_card">
                                <div class="blue_stripe">
                                    <h2>{{ $list->pro_name }}</h2>
                                </div>
                                <div class="img_box">
                                    <div class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                        @php
                                            $productImages = !empty($list->pro_imgs) ? json_decode($list->pro_imgs) : [];
                                        @endphp
                                        <div class="swiper-wrapper" id="swiper-wrapper-0d2fdcca6456cc58" aria-live="polite"
                                            style="transition-duration: 0ms; transform: translate3d(-583px, 0px, 0px); transition-delay: 0ms;">
                                            @forelse ($productImages as $item)
                                                <div class="swiper-slide swiper-slide-prev" role="group" aria-label="1 / 4" data-swiper-slide-index="0" style="width: 583px;">
                                                    <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="img" class="" />
                                                    {{-- <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="" /> --}}
                                                </div>
                                                {{-- </div> --}}
                                            @empty
                                                {{-- <div class="swiper-wrapper" id="swiper-wrapper-0d2fdcca6456cc58" aria-live="polite"
                                                style="transition-duration: 0ms; transform: translate3d(-583px, 0px, 0px); transition-delay: 0ms;"> --}}
                                                <div class="swiper-slide swiper-slide-prev" role="group" aria-label="1 / 4" data-swiper-slide-index="0" style="width: 583px;">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide swiper-slide-active" role="group" aria-label="2 / 4" data-swiper-slide-index="1" style="width: 583px;">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide swiper-slide-next" role="group" aria-label="3 / 4" data-swiper-slide-index="2" style="width: 583px;">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide" role="group" aria-label="4 / 4" data-swiper-slide-index="3" style="width: 583px;">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2" aria-current="true"></span>
                                            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0"
                                                role="button" aria-label="Go to slide 4"></span>
                                        </div>
                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                    </div>
                                    <div class="arrow_flex">
                                        <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-0d2fdcca6456cc58"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i></button>
                                        <button class="horse_arrow_right" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-0d2fdcca6456cc58"><i class="fa fa-chevron-right"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="blue_stripe">
                                    <h3>Price: ${{ $list->pro_reg_price }}</h3>
                                </div>
                                <div class="text_box">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="info_list">
                                                        <li><strong>Breed:</strong> {{ $list->pro_breed }}</li>
                                                        <li><strong>Age:</strong> {{ $list->pro_age }} Old</li>
                                                        <li><strong>Sex:</strong> {{ $list->pro_gender }}</li>
                                                        <li><strong>Height:</strong> {{ $list->pro_height }}</li>
                                                        <li><strong>Ad Type:</strong> {{ $list->pro_ad_type }}</li>
                                                        <li><strong>Location:</strong> {{ $list->pro_state }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blue_stripe">
                                        <ul class="top_list mb-0">
                                            <li>{{ $list->pro_skill }}</li>
                                        </ul>
                                    </div>

                                    <div class="horse_list_card_btn_flex">
                                        <a href="{{ url('edit_list') }}/{{ $list->id }}/{{ str_replace(' ', '-', $cate_name) }}" class="horse_card_btn">Edit</a>
                                        <form id="delete_form" class="m-0" method="post" action="{{ url('/delete_product') }}/{{ $list->id }}/{{ str_replace(' ', '-', $cate_name) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="deleteButton horse_card_btn">Delete</button>
                                        </form>
                                        <label class="fvrt_btn">
                                            <input type="checkbox" hidden="" />
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>
                                        <a href="javascript:;" class="horse_card_btn">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row align-items-center justify-content-end py-4 pe-0 fs--1">
                    <div class="col-auto d-flex">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span
                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                    <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.querySelectorAll('.deleteButton').forEach(function(button) {
                button.addEventListener('click', function() {
                    var form = button.closest('form');

                    var id = form.getAttribute('action').split('/').pop();

                    var confirmDelete = confirm("Are you sure you want to delete this Product?");

                    if (confirmDelete) {
                        form.submit();
                    } else {
                        alert("Listed Product not deleted.");
                    }
                });
            });
        </script>
    @endsection
