@php
    $sitename = 'Horse Action Network';
    $sitenumber = '817 7336 611';
    $tel = '8177336611';
    $siteemail = 'info@tbcigars.com';
    $siteaddress = 'Lorem Ipsum is simply dummy text of the printing';
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>Horse Action Network</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ getenv('APP_URL') }}/assets/images/favicon.png">
    <link rel="stylesheet" href="{{ getenv('APP_URL') }}/assets/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/slick-theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/css/reponsive.css">
    <link rel="stylesheet" type="text/css" href="{{ getenv('APP_URL') }}/assets/fonts/fonts.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<style>
    #preloader {
        position: fixed;
        width: 100%;
        height: 100%;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.8s ease-out;
    }

    .loader {
        width: 200px;
        height: 200px;
    }

    .preloader-hide {
        opacity: 0;
        pointer-events: none;
        display: none;
    }

    .mega_menu_bar {
        position: absolute;
        top: 55px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        padding: 0px;
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .mega_menu_bar {
        height: 0;
        overflow: hidden;
        opacity: 0;
        z-index: -999;
    }

    .inner_small_box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #1d2139;
        padding: 15px 10px;
        height: 230px;
        transition: all 0.25s;
        position: relative;
    }

    .inner_small_box:hover {
        background: #BF9855;
        background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
    }

    .inner_small_box:hover {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transform: scale(1.05);
    }

    .inner_small_box.inner_blue_box {
        background: #1d2139 !important;
    }

    .inner_small_box .heading44px {
        margin-bottom: 10px;
        transform: translateY(0px);
        transition: all 0.25s;
    }

    .inner_small_box.inner_blue_box .heading44px {
        background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .inner_small_box p {
        font-size: 16px;
        text-align: center;
        display: none;
        transition: all 0.25s;
    }

    .inner_small_box:hover .heading44px {
        transform: translateY(0);
    }

    .inner_small_box:hover p {
        display: block;
    }

    .inner_small_box.inner_blue_box p {
        color: #fff;
        font-size: 13px;
        text-align: center;
    }

    .mega_logo_box {
        max-width: 35px;
        margin: 0 auto;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .inner_small_box .heading44px {
        font-size: 30px;
        background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        font-weight: 400;
    }

    .inner_small_box:hover .heading44px {
        background: var(--Linear, linear-gradient(0deg, #1d2139 35.48%, #1d2139 68.55%));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .inner_small_box img {
        transition: all 0.25s;
    }

    .inner_small_box:hover img {
        opacity: 0;
    }

    .mega_menu_blue_strip {
        background: #1d2139;
        padding: 20px 90px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mega_menu_blue_strip .heading44px {
        font-size: 30px;
        background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        width: 250px;
        text-align: center;
        margin: 0;
        font-weight: 600;
    }

    .mega_menu_blue_strip p {
        margin: 0;
        font-size: 20px;
        color: #fff;
        text-align: center;
        max-width: 500px;
        width: 100%;
    }

    .mega_gold_btn,
    .mega_gold_btn:hover {
        font-size: 16px;
        /* font-family: "AvenirNextLTPro-Regular"; */
        font-weight: 500;
        padding: 10px 30px;
        background: #bf9855;
        background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
        text-transform: uppercase;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 0;
        color: #1d2139 !important;
        width: fit-content;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .nav_itm {
        font-weight: 500;
        background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .nav_itm:hover,
    .nav_itm.active {
        background: var(--Linear, linear-gradient(0deg, #fff 35.48%, #fff 68.55%));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    @media only screen and (max-width: 1399px) {
        .mega_menu_blue_strip {
            padding: 20px 30px;
        }
    }

    .heart_header_btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 44px;
        height: 44px;
        font-size: 38px;
        border: 0;
        background: transparent;
        position: relative;
    }

    .heart_header_btn span {
        font-size: 13px;
        color: #1d2139;
        font-weight: 700;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    button.heart_header_btn i {
        background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgb(223 200 166) 73%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }

    .f_clm.f_clm1 {
        background: #fff;
        padding: 30px;
    }

    .f_clm.f_clm2,
    .f_clm.f_clm3 {
        padding-top: 40px;
    }

    .footer img.footer_logo {
        width: 100%;
        height: 250px;
        object-fit: cover;
        object-position: center;
    }

    .social_links {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .social_links a {
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .social_links img {
        transition: all 0.25s;
        color: #1b1f35 !important;
    }

    .social_links img:hover {
        transform: scale(1.1)
    }

    .tiktok {
        filter: brightness(1) invert(1);
    }
    real_estate_card_new .blue_stripe h2 {
    font-size: 18px !important;
}
</style>
<style>
    .toast-success {
        background-color: #28a745 !important;
        color: #ffffff !important;
    }

    .toast-success .toast-close-button {
        color: #ffffff !important;
    }

    .toast-error {
        background-color: #fe0032 !important;
    }
</style>

<body>
    {{-- <div id="preloader">
        <div class="loader"><img src="https://i.gifer.com/origin/7d/7de91b68e60e68eadb293da700056870_w200.gif" alt="loader" class="img-fluid"></div>
    </div> --}}
    <header>
        <div class="top_bar">
            <div class="container">
                <div class="top_bar_flex">
                    <div class="top_bar_flex_right">
                        <ul>
                            <li><a href="#!"><img src="{{ getenv('APP_URL') }}/assets/images/social_icon_1.png" alt="" class="img-fluid"></a></li>
                            <li><a href="#!"><img src="{{ getenv('APP_URL') }}/assets/images/social_icon_2.png" alt="" class="img-fluid"></a></li>
                            <li><a href="#!"><img src="{{ getenv('APP_URL') }}/assets/images/social_icon_3.png" alt="" class="img-fluid"></a></li>
                        </ul>
                    </div>
                    <a href="{{ getenv('APP_URL') }}">
                        <img src="{{ getenv('APP_URL') }}/assets/images/test-logo-1.gif" alt="Logo" class="logo img-fluid">
                    </a>
                    <div class="top_bar_flex_left login_btn_flex">
                        <ul>
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                            <li><button class="heart_header_btn"><i class="fa fa-heart" aria-hidden="true"></i> <span>10</span></button></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <nav>
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-12 d-lg-block">
                        <div class="top_nav nav_bar">
                            <ul class="navigation d-none d-lg-flex">
                                <li><a href="{{ getenv('APP_URL') }}" class="nav_itm">Home</a></li>
                                <li><a href="{{ route('horse_listing_filter') }}" class="menu-link nav_itm" data-target=".horser_menu_tab">Horses</a>
                                    <div class="mega_menu_bar horser_menu_tab">
                                        <div class="row gy-4 p-4">
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">NEWLY LISTED HORSES</h3>
                                                    <p>Hot off the pasture —Meet the newest horses on the market</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter', array_merge(request()->query(), ['type' => 'For Sale'])) }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">ALL HORSES FOR SALE</h3>
                                                    <p>A whole pasture of options. Browse every horse available right now. From ponies to performance horses — they’re all here</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">VIEW SOLD HORSES</h3>
                                                    <p> Get a feel for market trends. Only sold listings for price insight.!</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">FARM DIRECTORY</h3>
                                                    <p> Looking for a specific farm or person to buy a horse from? Take a look here!</p>
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <div class="mega_menu_blue_strip">
                                                    <h3 class="heading44px">JOIN the HERD</h3>

                                                    <p class="">Join our mailing list to stay in the loop! Get exclusive updates on newly listed horses, straight to your inbox — be the first to
                                                        discover your perfect match.</p>

                                                    <a href="#!" class="mega_gold_btn">Join Now!</a>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter', array_merge(request()->query(), ['type' => 'For Sale'])) }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">THE SALE BARN</h3>
                                                    <p> Purely horses for sale without distractions</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter', array_merge(request()->query(), ['type' => 'At Auction'])) }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">THE AUCTION BARN</h3>
                                                    <p>Explore current online & live auctions only</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter', array_merge(request()->query(), ['type' => 'For Lease'])) }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">THE LEASING BARN</h3>
                                                    <p> Find horses available for lease here, without the clutter</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('horse_listing_filter', array_merge(request()->query(), ['type' => 'At Stud'])) }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">THE STUD BARN</h3>
                                                    <p>Stud services at your fingertips. Future foals start here</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ url('services') }}" class="menu-link nav_itm" data-target=".service_menu_tab">Services</a>
                                    <div class="mega_menu_bar service_menu_tab">
                                        <div class="row p-4">
                                            <div class="col-4">
                                                <a href="{{ url('services') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">SEARCH </br>FOR SERVICE</h3>
                                                    <p> Find trusted equine help near you</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ url('services') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">BROWSE </br> ALL SERVICES</h3>
                                                    <p>Explore our full directory of pros</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ url('services') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">LIST YOUR SERVICE</h3>
                                                    <p>Turn local horse owners into clients</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="navigation d-none d-lg-flex">
                                <li><a href="{{ url('realestate_listing_filter') }}" class="menu-link nav_itm" data-target=".estate_menu_tab">Real Estate</a>
                                    <div class="mega_menu_bar estate_menu_tab">
                                        <div class="row p-4">
                                            <div class="col-4">
                                                <a href="{{ url('realestate_listing_filter') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">SEARCH PROPERTIES</h3>
                                                    <p>See listings tailored for equestrians</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ url('realestate_listing_filter') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">BROWSE ALL PROPERTIES</h3>
                                                    <p>Browse barns, farms, and acreage. See what’s on the market today</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ url('realestate_listing_filter') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">LIST YOUR PROPERTY</h3>
                                                    <p>List once, reach the Equestrian community across the US</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ url('membership') }}" class="menu-link nav_itm" data-target=".ads_menu_tab">Advertise</a>
                                    <div class="mega_menu_bar ads_menu_tab">
                                        <div class="row p-4">
                                            <div class="col-4">
                                                <a href="{{ route('membership') }}" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">ADVERTISE YOUR HORSE</h3>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#!" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">ADVERTISE YOUR SERVICE</h3>
                                                    <p>Turn horse lovers into loyal clients</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#!" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">ADVERTISE YOUR REAL ESTATE</h3>
                                                    <p>Advertise to a horse-focused audience</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ url('about_us') }}" class="menu-link nav_itm" data-target=".about_menu_tab">About</a>
                                    <div class="mega_menu_bar about_menu_tab">
                                        <div class="row gy-4 p-4">
                                            <div class="col-3">
                                                <a href="#!" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">WHY CHOOSE US</h3>
                                                    <p> Built by horse people, for horse people…because your passion is our passion</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#!" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">FAQ'S</h3>
                                                    <p>Quick answers to common questions</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#!" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">BLOG</h3>
                                                    <p>Tips, trends & stories from the equine world. Fresh insights from the horse world</p>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <a href="#!" class="inner_small_box">
                                                    <div class="mega_logo_box">
                                                        <img src="{{ getenv('APP_URL') }}/assets/images/heading_logo.png" alt="img" class="img-fluid">
                                                    </div>
                                                    <h3 class="heading44px">CONTACT US</h3>
                                                    <p> We’re here whenever you need us. Let’s talk horses (and business)</p>
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <div class="mega_menu_blue_strip">
                                                    <h3 class="heading44px">JOIN THE HERD</h3>

                                                    <p class="text-white">Join our mailing list to stay in the loop! Get exclusive updates on newly listed horses, straight to your inbox — be the
                                                        first to
                                                        discover your perfect match.</p>

                                                    <a href="#!" class="mega_gold_btn">Join Now!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>

                <div class="row align-items-center d-none">
                    <div class="col-3">
                        <a href="{{ getenv('APP_URL') }}">
                            <img src="{{ getenv('APP_URL') }}/assets/images/logo.png" alt="Logo" class="logo img-fluid">
                        </a>
                    </div>
                    <div class="col-6 d-none d-lg-block">
                        <div class="info_card_flex">
                            <div class="info_card">
                                <div class="info_card_top_flex d-flex gap-2 mb-3">
                                    <i class="fa fa-envelope text-theme-colored font-18"></i>
                                    <p>Mail Us Today</p>
                                </div>
                                <a href="#!">info@yourdomain.com</a>
                            </div>
                            <div class="info_card">
                                <div class="info_card_top_flex d-flex gap-2 mb-3">
                                    <i class="fa fa-map-marker text-theme-colored font-18"></i>
                                    <p>Company Location</p>
                                </div>
                                <a href="#!">info@yourdomain.com</a>
                            </div>
                            <div class="info_card">
                                <div class="info_card_top_flex d-flex gap-2 mb-3">
                                    <i class="fa fa-phone-square text-theme-colored font-18"></i>
                                    <p>817 7336 611</p>
                                </div>
                                <a href="#!">info@yourdomain.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-9 d-flex align-items-center justify-content-end">

                        <ul class="get_stated_ul  d-lg-flex">
                            <li>
                                <a href="tel:{{ $tel }}" class="call_btn">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span> {{ $sitenumber }} </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="cart_btn shopingBtn">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                    <span class="desktop_cart d-none d-md-block">Cart ( 0 )</span>
                                    <span class="mobile_cart d-block d-md-none">0</span>
                                </a>
                            </li>
                        </ul>
                        <div class="hamBurger d-block d-lg-none">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="responsive_menu">
        <div class="clm_wrap"></div>
    </div>
    <div class="cartWrap">
        <button class="cartClose clsBtn">+</button>
        <div class="cartHeader">
            <div class="cartCounterWrap">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                <span>1</span>
            </div>
            <h4 class="heading22px fw_400">Your Cart</h4>
        </div>
        <div class="cartBody">
            <div class="productWrap">
                <img src="{{ getenv('APP_URL') }}/assets/images/about-side-img.png" alt="" class="cartImage">
                <div class="productContent">
                    <p class="proname">Product Name</p>
                    <p class="size"><strong>Size</strong> Medium</p>
                    <p class="price">$40.00</p>
                </div>
                <a href="javascript:;"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
            <div class="emptyCart">
                <p>Your Cart Is Empty</p>
                <a href="#" class="cartBtn">Return to Shop</a>
            </div>
            <div class="emptyCart">
                <p>Your are not login</p>
                <a href="#" class="cartBtn">Login</a>
            </div>
        </div>
        <div class="cartFooter">
            <h6>Subtotal: $40.00</h6>
            <p>To find out your shipping cost , Please proceed to checkout.</p>
            <a href="#" class="cartBtn">View Cart</a>
            <a href="javascript:;" class="cartBtn clsBtn">Continue Shoping</a>
            <a href="#" class="cartBtn">Checkout</a>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footer light">
            <div class="">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="f_clm f_clm1">

                            <a href="{{ getenv('APP_URL') }}" class="d-block">
                                <img src="{{ getenv('APP_URL') }}/assets/images/test-logo.gif" class="footer_logo" />
                            </a>
                            <!--- <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p> --->
                            <form class="newsletter">
                                <input type="email" name="email" placeholder="Enter your email here ..." />
                                <button class="submit" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 ms-5 mb-4 mb-md-0">
                        <div class="f_clm f_clm2">
                            <h3 class="heading22px fw_500 mb-4 primeColor">Quick Links</h3>
                            <ul>
                                <li><a href="{{ getenv('APP_URL') }}">Home</a></li>
                                <li><a href="{{ url('products') }}">Search Horses</a></li>
                                <li><a href="{{ url('services') }}">Equestrian Services</a></li>
                                <li><a href="{{ url('farm_listing') }}">Equestrian Real Estate</a></li>
                                <li><a href="{{ url('membership') }}">Advertise</a></li>
                                <li><a href="{{ url('about_us') }}">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="f_clm f_clm3">
                            <h3 class="heading22px fw_500 mb-4 primeColor">Contact us</h3>
                            <ul class="contact_info">
                                <li><a href="mailto:{{ $siteemail }}">Email: info@horseaction.com</a></li>
                                <li><a href="tel:{{ $sitenumber }}">Phone: 000-000-0001</a></li>
                                <li><a href="javascript:;">Address: {{ $siteaddress }}</a></li>
                            </ul>
                            <div class="social_links">
                                <a href="#!"><img src="{{ getenv('APP_URL') }}/assets/images/social_icon_1.png" alt="" class="img-fluid"></a>
                                <a href="#!"><img src="{{ getenv('APP_URL') }}/assets/images/social_icon_2.png" alt="" class="img-fluid"></a>
                                <a href="#!"><img src="{{ getenv('APP_URL') }}/assets/images/social_icon_3.png" alt="" class="img-fluid tiktok"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container light">
                <div class="row">
                    <div class="col-12 text-center">
                        <p>Copyright © 2025. <span class="primeColor">{{ $sitename }}</span> All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade verification__modal" id="verification_modal" tabindex="-1" aria-labelledby="verification_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h2 class="heading22px text-center">Age Verification</h2>
                <p class="heading18px text-center">You must be 18+ to continue. Are you eligible?</p>
                <button type="button" class="border_btn" data-bs-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>

    <script src="{{ getenv('APP_URL') }}/assets/js/jquery.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="{{ getenv('APP_URL') }}/assets/js/custom.js"></script>
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
            console.log("running");
        @endif
    </script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        const detailPage = document.querySelector(".view_detail_page");
        const rightPanel = document.querySelector(".detail_right");

        let isPinned = false;
        let isSyncingScroll = false;

        // Init GSAP ScrollTrigger
        ScrollTrigger.create({
            trigger: detailPage,
            start: "top top",
            end: () => "+=" + (rightPanel.scrollHeight - rightPanel.clientHeight),
            pin: detailPage,
            pinSpacing: true,
            anticipatePin: 1,
            onEnter: () => {
                isPinned = true;
                document.body.style.overflow = "hidden";
            },
            onLeave: () => {
                isPinned = false;
                document.body.style.overflow = "auto";
            },
            onLeaveBack: () => {
                isPinned = false;
                document.body.style.overflow = "auto";
            }
        });

        // Custom scroll handler
        window.addEventListener("wheel", (e) => {
            if (!isPinned || isSyncingScroll) return;

            const delta = e.deltaY;
            const atTop = rightPanel.scrollTop <= 0;
            const atBottom = Math.ceil(rightPanel.scrollTop + rightPanel.clientHeight) >= rightPanel.scrollHeight;

            if ((delta > 0 && atBottom) || (delta < 0 && atTop)) {
                // Scroll outer page after internal scroll finishes
                isPinned = false;
                document.body.style.overflow = "auto";
                isSyncingScroll = true;

                // Scroll the body manually in same direction
                requestAnimationFrame(() => {
                    window.scrollBy({
                        top: delta,
                        behavior: "smooth"
                    });
                    isSyncingScroll = false;
                });

                return;
            }

            // ✅ Use GSAP for smooth scrolling inside rightPanel
            e.preventDefault();
            gsap.to(rightPanel, {
                scrollTop: rightPanel.scrollTop + delta,
                duration: 0.4,
                ease: "power2.out"
            });
        }, {
            passive: false
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var verificationModal = new bootstrap.Modal(document.getElementById('verification_modal'), {
                backdrop: 'static', // Prevent closing when clicking outside
                keyboard: false // Prevent closing with the ESC key
            });

            var currentPath = window.location.pathname;
            var membershipPath = "{{ url('membership_form') }}";
            var membershipPathname = new URL(membershipPath, window.location.origin).pathname;

            if (currentPath === membershipPathname) {
                verificationModal.show();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.menu-link').each(function() {
                const $link = $(this);
                const targetSelector = $link.data('target');
                const $menu = $link.siblings(targetSelector);

                $link.add($menu).on('mouseenter', function() {
                    const fullHeight = $menu.get(0).scrollHeight + "px";
                    $menu.stop(true, true).css({
                        zIndex: 999
                    }).animate({
                        height: fullHeight,
                        opacity: 1
                    }, 200);
                });

                $link.add($menu).on('mouseleave', function() {
                    setTimeout(function() {
                        if (!$link.is(':hover') && !$menu.is(':hover')) {
                            $menu.stop(true, true).animate({
                                height: 0,
                                opacity: 0,
                            }, 200, function() {
                                $menu.css('z-index', -999);
                            });
                        }
                    }, 100);
                });
            });
        });
    </script>

    <script>
        const heartCheckboxes = document.querySelectorAll(".heartCheckbox");
        const fvrtCheckboxes = document.querySelectorAll(".fvrt_btn input[type='checkbox']");

        heartCheckboxes.forEach((heartCheckbox, index) => {
            const heartIcon = heartCheckbox.nextElementSibling;
            const fvrtCheckbox = fvrtCheckboxes[index];

            // Heart icon click → sync Favorite button
            heartCheckbox.addEventListener("change", function() {
                fvrtCheckbox.checked = this.checked;
                updateHeartIcon();
            });

            // Favorite button click → sync Heart icon
            fvrtCheckbox.addEventListener("change", function() {
                heartCheckbox.checked = this.checked;
                updateHeartIcon();
            });

            function updateHeartIcon() {
                if (heartCheckbox.checked) {
                    heartIcon.classList.remove("fa-heart-o");
                    heartIcon.classList.add("fa-heart", "filled");
                } else {
                    heartIcon.classList.remove("fa-heart", "filled");
                    heartIcon.classList.add("fa-heart-o");
                }
            }
        });
    </script>

    <script>
        $(window).on('load', function() {
            // basic sanity checks
            if (!$.fn.slick) {
                console.error('Slick not loaded');
                return;
            }
            var $slider = $('.hero_slider');
            if (!$slider.length) {
                console.error('.hero_slider not found');
                return;
            }

            $slider.slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 5000, // 5 seconds
                pauseOnHover: false,
                pauseOnFocus: false,
                pauseOnDotsHover: false,
                adaptiveHeight: false,
                slidesToShow: 1
            });

            // ensure autoplay is running (useful if something paused it)
            $slider.slick('slickPlay');

            // if slider was initialized while hidden (tabs/modals), force recalculation
            setTimeout(function() {
                $slider.slick('setPosition');
            }, 100);
        });
    </script>

</body>

</html>
