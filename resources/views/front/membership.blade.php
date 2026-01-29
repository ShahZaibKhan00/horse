@extends('layouts.app')
@section('content')
    <style>
        .membershipBanner {
            padding: 0px 20px;
        }

        .membershipBanner .heading_main {
            font-family: "AvenirNextLTPro-Bold";
            font-size: 80px;
            margin: 0;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
        }

        .membership_new_sec {
            padding: 100px 0px;
        }

        .colored_text_box {
            padding: 40px;
            background: #1D2139;
            border: 3px solid #B09240;
            text-align: center;
            max-width: 620px;
            margin: 0 auto;
            margin-bottom: 35px;
        }

        .colored_text_box h2 {
            font-family: "AvenirNextLTPro-Bold";
            font-size: 40px;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .colored_text_box p {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            margin: 0 auto;
        }

        .mem_card_new {
            width: 100%;
            text-align: center;
        }

        .mem_card_top {
            padding: 22px 10px;
            background: #1D2139;
            text-align: center;
        }

        .mem_card_new h2 {
            font-family: "AvenirNextLTPro-Bold";
            font-size: 26px;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
            margin: 0px;
        }

        .mem_card_main {
            border: 2px solid #1C2039;
            padding: 35px 20px 25px 20px;
        }

        .mem_card_main p {
            font-size: 16px;
            color: #1C2039;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .mem_card_main h3 {
            font-size: 35px;
            color: #1C2039;
            font-weight: 800;
            color: #1C2039;
            margin-bottom: 30px;
        }

        .mem_card_main h3 span {
            font-size: 22px;
            font-weight: 400;
        }

        .choose-btn {
            font-size: 18px;
            padding: 10px 55px;
            font-weight: 700;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            width: fit-content;
            text-transform: uppercase;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 0;
            z-index: 999;
            border: none;
            color: #1d2139;
            letter-spacing: 0.5px;
            cursor: pointer;
            border: 1px solid #1D2139;
            text-transform: capitalize;
            transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease, color 0.3s ease;
            display: block;
            margin: 34px auto 0 auto;
        }

        .inner-container-one {
            max-width: 1240px;
            margin: 0 auto;
        }

        .mem_blue_stripe {
            background: #1d2139;
            padding: 40px 24px;
            text-align: center;
            border-bottom: 5px solid #b09240;
            border-top: 5px solid #b09240;
            margin-top: 100px;
        }

        .mem_blue_stripe h2 {
            font-family: "AvenirNextLTPro-Bold";
            font-size: 40px;
            margin: 0;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .point_card {
            padding: 45px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 20px;
            border: 2px solid #1C2039;
            height: 255px;
        }

        .point_card p {
            font-size: 18px;
            color: #1C2039;
            font-weight: 500;
            margin: 0;
        }
    </style>
    <section class="inner_page_banner membershipBanner">
        <div class="container text-center">
            <h1 class="heading_main">ADVERTISING PLANS</h1>
        </div>
    </section>
    <section class="membership_new_sec">
        <div class="container">
            <div class="colored_text_box">
                <h2>All Plans we offer</h2>
                <p>Start creating your ad today!</p>
            </div>
            <div class="inner-container-one">
                <div class="row">
                    @foreach ($plans as $item)
                        <!-- Single Stall Pass -->
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <div class="mem_card_new active">
                                <div class="mem_card_top">
                                    <h2>{{ $item->name }}</h2>
                                </div>
                                <div class="mem_card_main">
                                    <p>{{ $item->quantity }} show Point</p>
                                    <h3>${{ $item->price }} <span>/month</span></h3>
                                    <p>{{ $item->description }}</p>
                                    <a href="{{ route('payment.link', Crypt::encrypt($item->id)) }}" class="choose-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mem_blue_stripe mb-5">
            <h2>How Show Points Work</h2>
        </div>
        <div class="inner-container-one">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="point_card">
                        <img src="assets/images/show_points_icon_1.png" alt="img" class="img-fluid" />
                        <p>1 show Point = 1 Ad <br> for 30 Days</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="point_card">
                        <img src="assets/images/show_points_icon_2.png" alt="img" class="img-fluid" />
                        <p>Use for Horses, <br> Services, or Propoerties</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="point_card">
                        <img src="assets/images/show_points_icon_3.png" alt="img" class="img-fluid" />
                        <p>Points Roll Over for <br> 6 Months</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="point_card">
                        <img src="assets/images/show_points_icon_4.png" alt="img" class="img-fluid" />
                        <p>Auto-Renew Monthly</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
