@extends('layouts.admin_app')
<style>
.equestrian_real_estate_card {
    display: flex;
    gap: 5px;
    position: relative;
    padding: 10px;
    border-radius: 10px;
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    background: #fff;
}
 .equestrian_real_estate_card .img_box {
     width: 380px;
     height: 270px;
     position: relative;
     overflow: hidden;
}
 .equestrian_real_estate_card .img_box img {
     width: 100%;
     height: 100%;
     object-fit: cover;
     object-position: center;
     border-radius: 6px;
}
 .equestrian_real_estate_card .text_box {
     width: calc(100% - 380px);
}
 .equestrian_real_estate_card .text_box h2 {
     font-size: 22px;
     font-weight: 700;
     text-align: center;
     margin: 0;
     background: linear-gradient(to right, #ae8e3b 40%, #ffffff 90%, #ae8e3b 100%);
     -webkit-background-clip: text;
     -webkit-text-fill-color: transparent;
}
 .equestrian_real_estate_card .text_box .blue_stripe {
     background: #1d2139;
     width: 100%;
     padding: 10px;
}
 .equestrian_real_estate_card .text_box h5 {
     font-size: 20px;
     font-weight: 700;
     color: var(--primeColor);
     margin-bottom: 2.5px;
     text-transform: capitalize;
}
 .equestrian_real_estate_card .text_box .desc {
     font-size: 13px;
     color: #000;
}
 .inner_text_box li {
     font-size: 13px;
     color: #000;
     list-style: none;
     margin: 0px 0px 15px 0px;
     display: flex;
     align-items: baseline;
}
 .inner_text_box li span {
     margin-right: 10px;
}
 .inner_text_box li span img {
     max-width: 20px;
}
 .equestrian_real_estate_card .text_box .price {
     font-size: 19px;
     font-weight: 700;
     color: #000;
     margin: 0;
}
 .equestrian_real_estate_card .horse_list_card_btn_flex {
     gap: 10px;
     margin-top: 0px;
     position: absolute;
     bottom: 12px;
     right: 15px;
}
 .equestrian_real_estate_card .horse_card_btn {
     width: 100px;
     height: 40px;
     font-size: 13px;
}
 .equestrian_real_estate_card .fvrt_btn {
     width: 105px;
     padding: 0px 12px;
     height: 45px;
     gap: 5px;
     font-size: 13px;
}
 .horse_list_card .swiper-pagination-bullet, .equestrian_real_estate_card .swiper-pagination-bullet {
     width: 11px;
     height: 11px;
     display: inline-block;
     border-radius: var(--swiper-pagination-bullet-border-radius,50%);
     background: #fff;
     opacity: 1;
}
 .horse_list_card .swiper-pagination-bullet-active, .equestrian_real_estate_card .swiper-pagination-bullet-active {
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
 .equestrian_real_estate_card .arrow_flex button {
     background: linear-gradient(to right, #1d2139 30%, #1d2139 70%, #1d2139 100%);
     -webkit-background-clip: text;
     -webkit-text-fill-color: #1d2139;
}
 .equestrian_real_estate_card:hover .horse_arrow_right {
     transform: translateX(0px);
}
 .equestrian_real_estate_card:hover .horse_arrow_left {
     transform: translateX(0px);
}
 .horse_card_btn {
     width: 120px!important;
     height: 45px!important;
     display: flex!important;
     justify-content: center!important;
     align-items: center!important;
     font-size: 15px!important;
     color: #fff!important;
     background: #1d2139!important;
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
     justify-content: center;
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
     text-align: center;
}
 .dlt_btn {
     width: 45px!important;
     height: 45px!important;
     display: flex!important;
     justify-content: center!important;
     align-items: center!important;
     font-size: 15px!important;
     color: #fff!important;
     background: #1d2139!important;
     border: 0;
}
.real_estate_btn {
    width: 230px!important;
}
</style>
@section('content')

<div class="content">
    <div class="pb-6">
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
                <h2 class="mb-2 text-white main_heading_dashboard">{{count($data)}} EQUESTRIAN REAL ESTATE</h2>
            </div>
            <div class="col-auto">
                <div class="d-flex">
                    <div class="search-box me-2">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('add_realstate') }}" class="btn submit_btn_one p-0 real_estate_btn">Place Real Estate Ad</a>
                   </div>
                </div>
            </div>
        </div>

        <div class="row  gy-4">
            @foreach ($data as $data)
            <div class="col-12">
                <div class="equestrian_real_estate_card">
                    <div class="img_box">
                        <div class="swiper horse_list_card_slider h-100 w-100">
                            @php
                                $images = !empty($data->gallery_imgs) ?  json_decode($data->gallery_imgs, true) : [];
                            @endphp
                            <div class="swiper-wrapper">
                                @foreach ($images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('Gallery_imgs/'. $image) }}" alt="img">
                                    </div>
                                @endforeach
                                {{-- <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/farm_1.jpg" alt="img">
                                </div> --}}
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
                                                    class="img-fluid" /></span>{{ $data->real_acres }} Acres</li>
                                        <li><span><img src="assets/images/eq_icon_2.png" alt=""
                                                    class="img-fluid" /></span>{{ $data->real_bedroom }} Bedrooms</li>
                                        <li><span><img src="assets/images/eq_icon_3.png" alt=""
                                                    class="img-fluid" /></span>{{ $data->real_bathroom }} Bathroom</li>
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
                                    <p class="price">{{ $data->real_price }}</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="inner_text_box">
                                    <div class="horse_list_card_btn_flex" bis_skin_checked="1">
                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                        <a href="{{ url('/edit_realstate') }}/{{$data->id}}" class="fvrt_btn">Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form id="delete_form" method="post" class="m-0" action="{{ url('/delete_realstate') }}/{{$data->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dlt_btn deleteButton"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        </div>
    </div>

<script>
document.querySelectorAll('.deleteButton').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = button.closest('form');

        var id = form.getAttribute('action').split('/').pop();

        var confirmDelete = confirm("Are you sure you want to delete this EQUESTRIAN REAL ESTATE?");

        if (confirmDelete) {
            form.submit();
        } else {
            alert("EQUESTRIAN REAL ESTATE not deleted.");
        }
    });
});
</script>
@endsection
