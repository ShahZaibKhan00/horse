@extends('layouts.app') @section('content')
    <style>
        section.hero_banner {
            position: relative;
        }

        .countdown {
            display: flex;
            gap: 0px;
            align-items: center;
            justify-content: center;
            position: absolute;
            z-index: 999;
            bottom: 47px;
            right: 4px;
            background: #1d2139db;
            padding: 5px 10px 25px 10px;
            border: 1px solid #ffffff54;
            width: 295px;
        }

        .countdown p {
            color: #fff;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            margin: 0;
            font-weight: bold;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .circle-container {
            position: relative;
            padding: 0px 10px;
            border-right: 1px solid #c09956;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring circle {
            fill: none;
            stroke-width: 3;
            /* Reduced from 4 to maintain proportions */
        }

        .bg {
            stroke: #31302e;
        }

        .progress {
            stroke: #fff;
            stroke-linecap: round;
            transition: stroke-dashoffset 0.35s;
        }

        .circle-text {
            text-align: center;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .circle-text span {
            font-size: 14px;
            font-weight: bold;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .circle-text small {
            font-size: 14px;
            /* Reduced from 9px */
            display: block;
            font-weight: bold;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .info_list li {
            border: 1px solid #1d2139;
            padding: 5px;
            text-align: center;
            font-size: 20px;
        }

        .mem_blue_stripe {
            background: #1d2139;
            padding: 40px 24px;
            text-align: center;
            border-bottom: 5px solid #ab8d35;
            border-top: 5px solid #ab8d35;
            margin-top: 100px;
        }

        .mem_blue_stripe h2 {
            font-family: "AvenirNextLTPro-Bold";
            font-size: 50px;
            margin: 0;
            margin-bottom: 0px;
        }

        .real_icon_box img {
            max-width: 20px;
            margin-right: 10px;
        }

        .card_about_heading {
            font-size: 18px;
            margin-bottom: 00px;
            font-weight: 800;
        }

        .about_sm_desc {
            font-size: 14px;
            max-height: 150px;
            overflow-y: auto;
        }

        .blue_stripe {
            position: relative;
        }

        .icon_heart {
            position: absolute;
            font-size: 30px;
            top: 50%;
            transform: translateY(-50%);
            right: 24px;
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon_heart.filled {
            color: #c09957;
        }

        .herd_box {
            background: #000000a1;
            padding: 40px 30px;
            width: 100%;
            max-width: 405px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 100px;
            backdrop-filter: blur(5px);
        }

        .herd_box h2 {
            font-size: 30px;
            font-weight: 700;
            width: 100%;
            background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
        }

        .milestome.cta_section .herd_box h2 {
            font-size: 30px;
            margin-bottom: 15px !important;
        }

        .herd_box.herd_box_type_one {
            padding: 50px 30px !important;
            max-width: 615px;
            height: 100%;
            right: 0;
        }

        .herd_box ul {
            padding-left: 30px;
            margin-bottom: 15px;
        }

        .herd_box ul li span {
            font-weight: 700;
            margin: 0px 0px 5px 0px;
        }

        .herd_box p {
            font-size: 16px;
            color: #fff;
            margin: 0;
        }

        .herd_box p a {
            color: #fff;
            text-decoration: underline;
        }

        .herd_box .submit_bnt {
            font-size: 16px;
            /* font-family: "AvenirNextLTPro-Regular"; */
            font-weight: 500;
            padding: 4px 20px;
            background: #bf9855;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            text-transform: uppercase;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 0;
            color: #1d2139 !important;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .herd_box input {
            border: 1px solid var(--primeColor);
            background-color: #fff;
            padding: 10px 20px;
            color: #1d2139;
            width: 100%;
            height: 45px;
        }

        .horse_list_card.real_estate_card .img_box {
            height: 280px;
        }

        .horse_list_card.real_estate_card .blue_wrapper {
            padding: 20px;
        }

        .real_estate_card .blue_stripe.top_strip {
            background: #1d2139;
            padding-top: 52px;
        }

        .real_estate_card .blue_stripe.top_strip .icon_heart {
            top: 8px;
            transform: none;
            right: 10px;
        }

        .hero_banner .item video {
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: top;
        }

        .hero_banner .item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #1d213969;
            /* z-index: -1; */
        }

        .auction_ended_text {
            position: absolute;
            bottom: 0;
            right: 0;
            font-size: 32px;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            z-index: 1;
            /* Keep above ::before background */
            padding: 5px 10px;
            border: 1px solid #ffffff54;
        }

        .auction_ended_text::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 5px;
            z-index: -1;
            background: #1d213926;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeIn 0.3s ease-in;
        }

        .overlay.show {
            display: flex;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .popup {
            background: #1d2139;
            border-radius: 0;
            padding: 30px;
            max-width: 590px;
            width: 90%;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.4s ease-out;
            color: white;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            color: #ccc;
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: white;
        }

        .star-icon {
            color: #d4af37;
            font-size: 20px;
            margin-right: 8px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .description {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 25px;
            color: #e0e0e0;
        }

        .features {
            list-style: none;
            margin-bottom: 30px;
        }

        .features li {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .check-icon {
            color: #4caf50;
            margin-right: 10px;
            font-weight: bold;
        }

        .cta-button {
            background: linear-gradient(180deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            color: #2d3a5c;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .cta-button:hover {
            background: linear-gradient(180deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .disclaimer {
            font-size: 10px;
            color: #888;
            text-align: center;
            margin-top: 15px;
            line-height: 1.2;
        }

        .demo-content {
            text-align: center;
            color: #666;
        }

        .demo-content h1 {
            margin-bottom: 20px;
            color: #333;
        }

        @media (max-width: 1799px) {
            .horse_list_card .top_list li {
                font-size: 13px;
            }

            .tabs_sec .info_list li {
                font-size: 16px;
            }

            .real_estate_card .info_list li {
                font-size: 15px;
            }

            .blue_stripe h3 {
                font-size: 29px;
            }

            .countdown {
                bottom: 28px;
                right: 4px;
                width: 240px;
            }

            .circle-text span,
            .circle-text small {
                font-size: 11.5px;
            }

            .circle-container {
                padding: 0px 7px;
            }
        }
    </style>
    <style>
        .blue_stripe h2 {
            text-transform: uppercase;
        }

        .gen_card_flex {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: center;
            max-width: 100%;
            margin: 0 auto;
            flex-wrap: wrap;
            gap: 30px;
        }

        .gen_card_flex .horse_list_card {
            width: 436px;
            margin-bottom: 25px;
        }

        .horse_list_card_new .custome_listing_row {
            display: flex;
            width: 100%;
            gap: 5px;
        }

        .horse_list_card_new .custome_listing_col {
            width: 50%;
        }

        horse_list_card_new .custome_listing_col .info_list li {
            margin-bottom: 5px;
            font-size: 16px;
            padding: 8px;
            line-height: 1;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
            width: 100%;
            font-size: 20px;
            height: 35px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.top_row,
        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
            display: flex;
            gap: 5px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.top_row .fvrt_btn {
            width: 33.33%;
        }

        .horse_list_card_new .info_list {
            list-style: none;
            margin: 0px 0px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
            margin-bottom: 5px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.top_row .horse_card_btn {
            width: 33.33%;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row .fvrt_btn {
            width: 100%;
        }

        .horse_list_card_new .top_list {
            padding: 20px 0px;
        }

        .horse_list_card_new .top_list li {
            font-size: 14px;
        }

        .horse_list_card_new .blue_stripe.blue_stripe_new {
            padding: 2px 5px 6px 0px;
        }

        .horse_list_card_new .icon_heart {
            position: absolute;
            font-size: 24px;
            top: -21px;
            right: 6px;
        }

        .horse_list_card_new .custome_listing_col .info_list li {
            font-size: 18px;
            margin: 5px 0px;
            padding: 0px 10px;
            text-transform: uppercase;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .fs_tag {
            font-size: 18px;
            padding: 3px 32px;
            top: -8px;
            font-weight: 600;
            left: -5px;
        }

        .horse_list_card_new .blue_stripe {
            padding: 0 5px 0px 5px;
        }

        .horse_list_card_new .blue_wrapper {
            padding: 5px;
        }

        .horse_list_card.horse_list_card_new .blue_stripe h3 {
            font-size: 35px;
            text-transform: uppercase;
        }

        .breed_text {
            background: #1d2139;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 45px;
            z-index: 999;
            text-align: center;
            font-size: 25px;
            font-weight: 500;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
        }

        .real_estate_card_new.horse_list_card_new .blue_stripe.blue_tripe_new {
            padding: 30px 5px 0px 5px;
        }

        .real_estate_card_new.horse_list_card_new .icon_heart {
            font-size: 24px;
            top: 10px;
            transform: none;
            right: 10px;
        }

        .real_estate_card_new.horse_list_card_new .custome_listing_col .info_list li {
            font-size: 16px;
            margin: 5px 0px;
            padding: 4px 13px;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
            text-transform: uppercase;
        }


        button.fvrt_btn.add_to_fvrt {
            background: #c09957;
            border-color: #c09957;
        }

        @media (max-width: 1799px) {
            .gen_card_flex {
                max-width: 1200px;
                gap: 20px;
            }

            .gen_card_flex .horse_list_card {
                width: 285px;
            }

            .fs_tag {
                font-size: 15px;
                padding: 1px 17px;
            }

            #pills-feature-3 .fs_tag {
                padding: 1px 7px;
            }

            .horse_list_card_new .top_list li {
                font-size: 11px;
                padding: 0px 3px;
            }

            .horse_list_card_new .blue_stripe h2 {
                font-size: 23px;
                margin-top: 3px;
                width: 100%;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            .horse_list_card_new .custome_listing_col .info_list li {
                font-size: 14px;
            }

            .horse_list_card.horse_list_card_new .img_box {
                width: 100%;
                height: 200px;
            }

            .horse_list_card.horse_list_card_new .blue_stripe h3 {
                font-size: 20px;
                margin-bottom: 5px;
            }

            .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
            .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
                font-size: 13px;
            }

            .breed_text {
                font-size: 17px;
                height: 25px;
            }

            .real_estate_card_new.horse_list_card_new .custome_listing_col .info_list li {
                font-size: 10px;
            }

            section.best_selling.best_selling_two.best_selling_three .horse_list_card .img_box {
                height: 180px;
            }

            .product_clm .pro_img {
                height: 200px;
            }

            .custom_wrapper {
                max-width: 1200px;
                width: 100%;
                margin: 0 auto;
            }
        }
    </style>
    <section class="hero_banner">
        <div class="hero_slider position-relative">
            <div class="item">
                <video class="w-100" autoplay muted loop playsinline>
                    <source src="assets/images/horser_video_5.mp4" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <div class="caption">
                    <div class="container">
                        <div class="col-lg-12">
                            <h1 class="heading65px monte_carlo fw_400 light">YOUR HORSE WORLD. <span>CONNECTED</span></h1>
                            <h1 class="heading44px inter fw_500 primeColor"> Buy. Sell. Connect. Discover. Your all in one
                                powerful equestrian network.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <video class="w-100" autoplay muted loop playsinline>
                    <source src="assets/images/horser_video_2.mp4" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <div class="caption">
                    <div class="container">
                        <div class="col-lg-12">
                            <h1 class="heading65px monte_carlo fw_400 light">YOUR HORSE WORLD. <span>CONNECTED</span></h1>
                            <h1 class="heading44px inter fw_500 primeColor"> Buy. Sell. Connect. Discover. Your all in one
                                powerful equestrian network.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <video class="w-100" autoplay muted loop playsinline>
                    <source src="assets/images/horser_video_3.mp4" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <div class="caption">
                    <div class="container">
                        <div class="col-lg-12">
                            <h1 class="heading65px monte_carlo fw_400 light">YOUR HORSE WORLD. <span>CONNECTED</span></h1>
                            <h1 class="heading44px inter fw_500 primeColor"> Buy. Sell. Connect. Discover. Your all in one
                                powerful equestrian network.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <video class="w-100" autoplay muted loop playsinline>
                    <source src="assets/images/horser_video_4.mp4" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <div class="caption">
                    <div class="container">
                        <div class="col-lg-12">
                            <h1 class="heading65px monte_carlo fw_400 light">YOUR HORSE WORLD. <span>CONNECTED</span></h1>
                            <h1 class="heading44px inter fw_500 primeColor"> Buy. Sell. Connect. Discover. Your all in one
                                powerful equestrian network.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('horse_listing_filter') }}" class="search_bar">
            <div class="row">
                <div class="col-6">
                    <div class="select_group">
                        <input type="text" placeholder="Location" />
                        <div class="select_group absolute_group location_group">
                            <select class="minimal">
                                <option value="">All</option>
                                <option value="">+10 Miles</option>
                                <option value="">+25 Miles</option>
                                <option value="">+50 Miles</option>
                                <option value="">+100 Miles</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-4">
                                            <div class="select_group">
                                                <div class="price_filter">
                                                    <h3>Distance:</h3>
                                                    <div class="price_filter_flex">
                                                        <input type="number" name="" placeholder="Min" />
                                                        <input type="number" name="" placeholder="Max" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                <div class="col-6">
                    <div class="select_group">
                        <div class="price_filter">
                            <h3>Price ($)</h3>
                            <div class="price_filter_flex">
                                <input type="number" name="from" placeholder="From" />
                                <input type="number" name="to" placeholder="To" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="select_group">
                        <select class="minimal" name="breed">
                            <option value="" disabled selected>Breed</option>
                            <option value="Akhal-Teke">Akhal-Teke</option>
                            <option value="Aegidienberger">Aegidienberger</option>
                            <option value="Alberta Wild Horse">Alberta Wild Horse</option>
                            <option value="Alter Real">Alter Real</option>
                            <option value="Altmark Coldblood">Altmark Coldblood</option>
                            <option value="Altor Real">Altor Real</option>
                            <option value="American Bashkir Curly">American Bashkir Curly</option>
                            <option value="American Belgian Draft">American Belgian Draft</option>
                            <option value="American Cream Draft Horse">American Cream Draft Horse</option>
                            <option value="American Indian Horse">American Indian Horse</option>
                            <option value="American Miniature Horse">American Miniature Horse</option>
                            <option value="American Saddlebred">American Saddlebred</option>
                            <option value="American Shetland Pony">American Shetland Pony</option>
                            <option value="American Spotted">American Spotted</option>
                            <option value="American Standardbred">American Standardbred</option>
                            <option value="American Walking Pony">American Walking Pony</option>
                            <option value="Andalusian Horse">Andalusian Horse</option>
                            <option value="Anglo Arabian">Anglo-Arabian</option>
                            <option value="Appaloosa">Appaloosa</option>
                            <option value="Arabian">Arabian</option>
                            <option value="Arabian Horses">Arabian Cross</option>
                            <option value="Ardennes">Ardennes</option>
                            <option value="Arabian-Berber">Arabian-Berber</option>
                            <option value="Arabian Halfbred">Arabian Halfbred</option>
                            <option value="Arabian Partbred">Arabian Partbred</option>
                            <option value="Araloosa">Araloosa</option>
                            <option value="Arcenberg-Nordkirchen">Arcenberg-Nordkirchen</option>
                            <option value="Australian Brumby">Australian Brumby</option>
                            <option value="Australian Draught Horse">Australian Draught Horse</option>
                            <option value="Australian Stock Horse">Australian Stock Horse</option>
                            <option value="Austrian Warmblood">Austrian Warmblood</option>
                            <option value="Auxois">Auxois</option>
                            <option value="Baden-Wurttemberg">Baden-Wurttemberg</option>
                            <option value="Balearic">Balearic</option>
                            <option value="Balikun Horse">Balikun Horse</option>
                            <option value="Baltic Hanoverian">Baltic Hanoverian</option>
                            <option value="Bardigiano">Bardigiano</option>
                            <option value="Bashkir Horse">Bashkir Horse</option>
                            <option value="Bavarian Warmblood">Bavarian Warmblood</option>
                            <option value="Belgian Cold Blood">Belgian Cold Blood</option>
                            <option value="Belgian Draft">Belgian Draft</option>
                            <option value="Belgian Warmblood">Belgian Warmblood</option>
                            <option value="Black Forest Horse">Black Forest Horse</option>
                            <option value="Boerperd">Boerperd</option>
                            <option value="Boulonnais">Boulonnais</option>
                            <option value="Brabant Horse">Brabant Horse</option>
                            <option value="Brandenburger Warmblood">Brandenburger Warmblood</option>
                            <option value="Breton">Breton</option>
                            <option value="British Riding Pony">British Riding Pony</option>
                            <option value="Budyonny">Budyonny</option>
                            <option value="Burguete">Burguete</option>
                            <option value="Byelorussian Harness Horse">Byelorussian Harness Horse</option>
                            <option value="Calabrese">Calabrese</option>
                            <option value="Camargue Horse">Camargue Horse</option>
                            <option value="Canadian Horse">Canadian Horse</option>
                            <option value="Canadian Pacer">Canadian Pacer</option>
                            <option value="Canadian Rustic Pony">Canadian Rustic Pony</option>
                            <option value="Carolina Marsh Tacky">Carolina Marsh Tacky</option>
                            <option value="Cerbat Mustang">Cerbat Mustang</option>
                            <option value="Chincoteague Pony">Chincoteague Pony</option>
                            <option value="Chickasaw Horse">Chickasaw Horse</option>
                            <option value="Choctaw Pony">Choctaw Pony</option>
                            <option value="Classic Pony">Classic Pony</option>
                            <option value="Cleveland-Bay">Cleveland-Bay</option>
                            <option value="Clydesdale">Clydesdale</option>
                            <option value="Clydesdale Cross">Clydesdale Cross</option>
                            <option value="Cumberland Island Horse">Cumberland Island Horse</option>
                            <option value="Cob Horse">Cob Horse</option>
                            <option value="Comtois">Comtois</option>
                            <option value="Connemara Pony">Connemara Pony</option>
                            <option value="Criollo Horse">Criollo Horse</option>
                            <option value="Curly Horses">Curly Horses</option>
                            <option value="Dales Pony">Dales Pony</option>
                            <option value="Dartmoor Pony">Dartmoor Pony</option>
                            <option value="Draft Cross">Draft Cross</option>
                            <option value="Dutch Warmblood">Dutch Warmblood</option>
                            <option value="Fell Pony">Fell Pony</option>
                            <option value="Finnhorse">Finnhorse</option>
                            <option value="Friesian">Friesian</option>
                            <option value="Friesian Cross">Friesian Cross</option>
                            <option value="Fjord">Fjord</option>
                            <option value="Fjord Cross">Fjord Cross</option>
                            <option value="Gelderland">Gelderland</option>
                            <option value="Gypsy Vanner">Gypsy Vanner</option>
                            <option value="Gypsy Cross">Gypsy Cross</option>
                            <option value="Hackney">Hackney</option>
                            <option value="Hanoverian">Hanoverian</option>
                            <option value="Haflinger">Haflinger</option>
                            <option value="Holsteiner">Holsteiner</option>
                            <option value="Icelandic Horse">Icelandic Horse</option>
                            <option value="Irish Draught">Irish Draught</option>
                            <option value="Irish Draft Cross">Irish Draft Cross</option>
                            <option value="Kinsky Horse">Kinsky Horse</option>
                            <option value="Knabstrupper">Knabstrupper</option>
                            <option value="Lippizan">Lippizan</option>
                            <option value="Lusitano">Lusitano</option>
                            <option value="Marwari Horse">Marwari Horse</option>
                            <option value="Morgan">Morgan</option>
                            <option value="Morgan Cross">Morgan Cross</option>
                            <option value="Mustang">Mustang</option>
                            <option value="Paso Fino">Paso Fino</option>
                            <option value="Percheron">Percheron</option>
                            <option value="Percheron Cross">Percheron Cross</option>
                            <option value="Pinto">Pinto</option>
                            <option value="Polish Warmblood">Polish Warmblood</option>
                            <option value="Quarter Horse">Quarter Horse</option>
                            <option value="Quarter Horse Cross">Quarter Horse Cross</option>
                            <option value="Rocky Mountain Horse">Rocky Mountain Horse</option>
                            <option value="Shire">Shire</option>
                            <option value="Shire Cross">Shire Cross</option>
                            <option value="Spotted Draft">Spotted Draft</option>
                            <option value="Spotted Draft Cross">Spotted Draft Cross</option>
                            <option value="Tennessee Walking Horse">Tennessee Walking Horse</option>
                            <option value="Thoroughbred">Thoroughbred</option>
                            <option value="Thoroughbred Cross">Thoroughbred Cross</option>
                            <option value="Trakehner">Trakehner</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Welsh Pony">Welsh Pony</option>
                            <option value="Westphalian">Westphalian</option>
                            <option value="Welsh Cross">Welsh Cross</option>
                            <option value="Warmblood">Warmblood</option>
                            <option value="Warmblood Cross">Warmblood Cross</option>
                            <option value="Zweibrücker Horse">Zweibrücker Horse</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="select_group">
                        <select class="minimal" name="skill">
                            <option value="" disabled selected>Skills/Discipline</option>
                            <option value="Agility">Agility</option>
                            <option value="All Around">All Around</option>
                            <option value="All-Around Show">All-Around Show</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Barrel Racing">Barrel Racing</option>
                            <option value="Barrels* Poles *Gymkhana">Barrels* Poles *Gymkhana</option>
                            <option value="Breakaway Roping">Breakaway Roping</option>
                            <option value="Brood mare">Brood mare</option>
                            <option value="Cutting Prospect">Cutting Prospect</option>
                            <option value="Cutting">Cutting</option>
                            <option value="Calf Roping">Calf Roping</option>
                            <option value="Clicker Training">Clicker Training</option>
                            <option value="Companion Only">Companion Only</option>
                            <option value="Competitive Trail Riding">Competitive Trail Riding</option>
                            <option value="Country English Pleasure">Country English Pleasure</option>
                            <option value="Cowboy Dressage">Cowboy Dressage</option>
                            <option value="Cowboy Mounted Shooting">Cowboy Mounted Shooting</option>
                            <option value="Cowboy Racing">Cowboy Racing</option>
                            <option value="Cow horse">Cow horse</option>
                            <option value="Cross-Country">Cross-Country</option>
                            <option value="Dressage">Dressage</option>
                            <option value="Drill Team">Drill Team</option>
                            <option value="Driving">Driving</option>
                            <option value="Endurance Riding">Endurance Riding</option>
                            <option value="English">English</option>
                            <option value="English Pleasure">English Pleasure</option>
                            <option value="Equitation">Equitation</option>
                            <option value="Eventing">Eventing</option>
                            <option value="Field Trial">Field Trial</option>
                            <option value="Foxhunter">Foxhunter</option>
                            <option value="Gun - Safe Hunting">Gun - Safe Hunting</option>
                            <option value="Halter">Halter</option>
                            <option value="Harness">Harness</option>
                            <option value="Harness Racing">Harness Racing</option>
                            <option value="Horsemanship">Horsemanship</option>
                            <option value="Hunt Seat Equitation">Hunt Seat Equitation</option>
                            <option value="Hunter">Hunter</option>
                            <option value="Hunter Pleasure">Hunter Pleasure</option>
                            <option value="Hunter Under Saddle">Hunter Under Saddle</option>
                            <option value="Jumping">Jumping</option>
                            <option value="Lesson Horse">Lesson Horse</option>
                            <option value="Liberty Training">Liberty Training</option>
                            <option value="Light Riding">Light Riding</option>
                            <option value="Longe Line">Longe Line</option>
                            <option value="Mountain Trail">Mountain Trail</option>
                            <option value="Mounted Games">Mounted Games</option>
                            <option value="Mounted Police">Mounted Police</option>
                            <option value="Native Costume">Native Costume</option>
                            <option value="Natural Horsemanship Training">Natural Horsemanship Training</option>
                            <option value="Nurse Mare">Nurse Mare</option>
                            <option value="Pacing Gait">Pacing Gait</option>
                            <option value="Pack">Pack</option>
                            <option value="Parade">Parade</option>
                            <option value="Performance">Performance</option>
                            <option value="Play day">Play day</option>
                            <option value="Pleasure Driving">Pleasure Driving</option>
                            <option value="Pole Bending">Pole Bending</option>
                            <option value="Polo">Polo</option>
                            <option value="Pony Club">Pony Club</option>
                            <option value="Project">Project</option>
                            <option value="Racing">Racing</option>
                            <option value="Retired Race Horse">Retired Race Horse</option>
                            <option value="Racking Gait">Racking Gait</option>
                            <option value="Ranch Conformation Class">Ranch Conformation Class</option>
                            <option value="Ranch Rail Class">Ranch Rail Class</option>
                            <option value="Ranch Riding - Ranch Pleasure">Ranch Riding - Ranch Pleasure</option>
                            <option value="Ranch Sorting">Ranch Sorting</option>
                            <option value="Ranch Trail Class">Ranch Trail Class</option>
                            <option value="Ranch Versatility">Ranch Versatility</option>
                            <option value="Ranch Work">Ranch Work</option>
                            <option value="Reining">Reining</option>
                            <option value="Reining - Cowhorse - Cutting">Reining - Cowhorse - Cutting</option>
                            <option value="Rodeo">Rodeo</option>
                            <option value="Rodeo Bronc">Rodeo Bronc</option>
                            <option value="Roping">Roping</option>
                            <option value="Saddle Seat">Saddle Seat</option>
                            <option value="School">School</option>
                            <option value="Schoolmaster">Schoolmaster</option>
                            <option value="Show Experience">Show Experience</option>
                            <option value="Show Hack">Show Hack</option>
                            <option value="Show Winner">Show Winner</option>
                            <option value="Showmanship Halter">Showmanship Halter</option>
                            <option value="Sidesaddle">Sidesaddle</option>
                            <option value="Stallion - Stud - Breeding">Stallion - Stud - Breeding</option>
                            <option value="Started Under Saddle">Started Under Saddle</option>
                            <option value="Steer Roping">Steer Roping</option>
                            <option value="Steer Wrestling">Steer Wrestling</option>
                            <option value="Stock">Stock</option>
                            <option value="Team Driving">Team Driving</option>
                            <option value="Team Penning">Team Penning</option>
                            <option value="Team Roping">Team Roping</option>
                            <option value="Team Roping - Head">Team Roping - Head</option>
                            <option value="Team Roping - Heel">Team Roping - Heel</option>
                            <option value="Team Sorting">Team Sorting</option>
                            <option value="Therapeutic Riding">Therapeutic Riding</option>
                            <option value="Therapy">Therapy</option>
                            <option value="Trail Class Competition">Trail Class Competition</option>
                            <option value="Trail Master">Trail Master</option>
                            <option value="Trail Riding">Trail Riding</option>
                            <option value="Trick">Trick</option>
                            <option value="Unicorn">Unicorn</option>
                            <option value="Vaulting">Vaulting</option>
                            <option value="Western">Western</option>
                            <option value="Western Dressage">Western Dressage</option>
                            <option value="Western Pleasure">Western Pleasure</option>
                            <option value="Western Riding">Western Riding</option>
                            <option value="Working Cattle">Working Cattle</option>
                            <option value="Working Equitation">Working Equitation</option>
                            <option value="4H">4H</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="select_group">
                        <select class="minimal" name="rider">
                            <option value="" disabled selected>Rider Level</option>
                            <option value="Beginner Riders - have minimal or no experience">Beginner Riders - have minimal or no experience</option>
                            <option value="Novice Riders - have a basic understanding of riding and can perform basic gaits.">Novice Riders - have a basic understanding of riding and can perform basic
                                gaits.</option>
                            <option value="Intermediate Riders - are comfortable with all gaits and can handle more challenging situations">Intermediate Riders - are comfortable with all gaits and can
                                handle more challenging situations</option>
                            <option value="Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level.">Advanced Riders - have a high level of skill
                                and experience, often competing or riding at a professional level.</option>
                        </select>
                    </div>
                </div>
                <!--<div class="col-12">
                                            <div class="select_group">
                                                <input type="text" placeholder="I'm Looking for...." />
                                                <div class="select_group absolute_group">
                                                    <select class="minimal">
                                                        <option value="" disabled selected>Search All in Horses for Sale</option>
                                                        <option value="">Horses 01</option>
                                                        <option value="">Horses 02</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                <div class="col-12 mt-1">
                    <div class="btn_group">
                        <button type="submit" class="search_icon">
                            Search
                            <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="service_new_section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="#!" class="service_card_new service_card_new_lg">
                                <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="img" class="img-fluid" />
                                <p>FIND YOUR DREAM HORSE</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="row gy-4">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#!" class="service_card_new">
                                <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="img" class="img-fluid" />
                                <p>Sell a horse</p>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#!" class="service_card_new">
                                <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg" alt="img" class="img-fluid" />
                                <p>Advertise here</p>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#!" class="service_card_new">
                                <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/4.jpg" alt="img" class="img-fluid" />
                                <p>Services</p>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#!" class="service_card_new">
                                <img src="https://horse-dev.testlinkdev.com/Gallery_imgs/1758669774_21.jpg" alt="img" class="img-fluid" />
                                <p>Real estate</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="best_selling tabs_sec">
        <div class="container-fluid">
            <div class="heading65px monte_carlo fw_400 mb-5">
                <h1>FEATURED HORSES</h1>
                <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
            </div>
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-feature-1-tab" data-bs-toggle="pill" data-bs-target="#pills-feature-1" type="button" role="tab" aria-controls="pills-feature-1"
                        aria-selected="true">New Listed Horses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-feature-2-tab" data-bs-toggle="pill" data-bs-target="#pills-feature-2" type="button" role="tab" aria-controls="pills-feature-2"
                        aria-selected="false">Featured Sale Horses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-feature-3-tab" data-bs-toggle="pill" data-bs-target="#pills-feature-3" type="button" role="tab" aria-controls="pills-feature-3"
                        aria-selected="false">Featured Auction Horses</button>
                </li>
            </ul>
            <div class="tab-content tab-content-style" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-feature-1" role="tabpanel" aria-labelledby="pills-feature-1-tab">

                    <div class="gen_card_flex">
                        @forelse ($pro_data as $product)
                            <div class="horse_list_card horse_list_card_new">
                                <div class="blue_stripe">
                                    <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                    <ul class="top_list">
                                        {{-- <li>Trail</li>
                                        <li>Dressage</li>
                                        <li>Beginner Safe</li> --}}
                                    </ul>
                                </div>
                                <div class="blue_stripe blue_stripe_new">
                                    <h2>{{ $product->pro_name }}</h2>
                                    <label class="heart_checkbox_wrapper d-block">
                                        <input type="checkbox" class="heartCheckbox" hidden />
                                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="img_box">
                                    <div class="swiper horse_list_card_slider h-100 w-100">
                                        <div class="swiper-wrapper">
                                            @php $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : []; @endphp @forelse ($productImages as $item)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="" />
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="arrow_flex">
                                        <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                        <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                    </div>
                                    <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                    @if ($product->pro_ad_type === 'At Auction')
                                        <div class="countdown" data-duration="259200000">
                                            <div class="circle-container" data-type="days">
                                                <div class="circle-text">
                                                    <span class="value">3</span>
                                                    <small>Days</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="hours">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Hrs</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="minutes">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Mins</small>
                                                </div>
                                            </div>
                                            <div class="circle-container border-0" data-type="seconds">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Secs</small>
                                                </div>
                                            </div>
                                            <p>TILL END OF AUCTION</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="text_box">
                                    <div class="custome_listing_row">
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <li>
                                                    @if ($product->pro_age_year > 0)
                                                        {{ $product->pro_age_year }} Years
                                                    @endif
                                                    @if ($product->pro_age_month > 0)
                                                        {{ $product->pro_age_month }} MO
                                                    @endif
                                                    Old
                                                </li>
                                                <li>{{ $product->pro_height }} HH</li>
                                                <li>{{ $product->pro_gender }}</li>
                                            </ul>
                                        </div>
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <li>{{ $product->pro_color ?? ' ' }}</li>
                                                <li>Registered: {{ Str::ucfirst($product->registerd_horse ?? ' ') }}</li>
                                                <li>Gaited: {{ $product->gaited }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="custome_listing_col w-100">
                                        <ul class="info_list">
                                            @php
                                                $state = $product->per_state ?? 'alabama (AL)';
                                                preg_match('/\((.*?)\)/', $state, $matches);
                                                $stateCode = $matches[1] ?? '';
                                            @endphp

                                            <li class="m-0 mb-2">
                                                {{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }},
                                                {{ $stateCode }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="blue_wrapper">
                                        <div class="blue_stripe">
                                            <h3>
                                                @if ($product->pro_ad_type == 'At Auction')
                                                    Starting Bid:
                                                @else
                                                    Price:
                                                @endif: ${{ $product->pro_reg_price }}
                                            </h3>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn w-100">View Details</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horse_card_btn">Seller Profile</a>
                                            <a href="#!" class="horse_card_btn">Chat with seller</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horse_card_btn">Share</a>
                                            <form action="{{ route('horse.favorite', Crypt::encrypt($product['id'])) }}" class="horse_card_btn" method="POST">
                                                @csrf
                                                <button class="fvrt_btn" type="submit" title="Add to favorite">
                                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-feature-2" role="tabpanel" aria-labelledby="pills-feature-2-tab">
                    <div class="gen_card_flex">
                        @forelse ($pro_data_sale as $product)
                            <div class="horse_list_card horse_list_card_new">
                                <div class="blue_stripe">
                                    <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                    <ul class="top_list">
                                    </ul>
                                </div>
                                <div class="blue_stripe blue_stripe_new">
                                    <h2>{{ $product->pro_name }}</h2>
                                    <label class="heart_checkbox_wrapper d-block">
                                        <input type="checkbox" class="heartCheckbox" hidden />
                                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="img_box">
                                    <div class="swiper horse_list_card_slider h-100 w-100">
                                        <div class="swiper-wrapper">
                                            @php $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : []; @endphp @forelse ($productImages as $item)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="" />
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="arrow_flex">
                                        <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                        <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                    </div>
                                    <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                    @if ($product->pro_ad_type === 'At Auction')
                                        <div class="countdown" data-duration="259200000">
                                            <div class="circle-container" data-type="days">
                                                <div class="circle-text">
                                                    <span class="value">3</span>
                                                    <small>Days</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="hours">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Hrs</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="minutes">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Mins</small>
                                                </div>
                                            </div>
                                            <div class="circle-container border-0" data-type="seconds">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Secs</small>
                                                </div>
                                            </div>
                                            <p>TILL END OF AUCTION</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="text_box">
                                    <div class="custome_listing_row">
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <!-- <li>{{ $product->pro_breed }}</li> -->
                                                <li>
                                                    {{ $product->pro_age_year }} Years
                                                    @if ($product->pro_age_month > 0)
                                                        {{ $product->pro_age_month }} MO
                                                    @endif
                                                    Old
                                                </li>
                                                <li>{{ $product->pro_height }} HH</li>
                                                <li>{{ $product->pro_gender }}</li>
                                            </ul>
                                        </div>
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <li>{{ $product->pro_color ?? ' ' }}</li>
                                                <li>Registered: {{ Str::ucfirst($product->registerd_horse ?? ' ') }}</li>
                                                <li>Gaited: {{ $product->gaited }}</li>
                                                <!-- <li><strong>Ad Type:</strong> {{ $product->pro_ad_type }}</li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="custome_listing_col w-100">
                                        {{-- <ul class="info_list">
                                            <li class="m-0 mb-2">{{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }}</li>
                                        </ul> --}}
                                        <ul class="info_list">
                                            {{-- @php
                                                $state = $product->per_state ?? 'alabama (AL)';
                                                preg_match('/\((.*?)\)/', $state, $matches);
                                                // echo $matches[1]; // AL
                                            @endphp
                                            <li class="m-0 mb-2">{{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }}, @php
                                                echo $matches[1];
                                            @endphp</li> --}}
                                            @php
                                                $state = $product->per_state ?? 'alabama (AL)';
                                                preg_match('/\((.*?)\)/', $state, $matches);
                                                $stateCode = $matches[1] ?? '';
                                            @endphp

                                            <li class="m-0 mb-2">
                                                {{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }},
                                                {{ $stateCode }}
                                            </li>
                                            {{-- <li class="m-0 mb-2">{{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }}</li> --}}
                                        </ul>
                                    </div>
                                    <div class="blue_wrapper">
                                        <div class="blue_stripe">
                                            <h3>
                                                @if ($product->pro_ad_type == 'At Auction')
                                                    Starting Bid:
                                                @else
                                                    Price:
                                                @endif: ${{ $product->pro_reg_price }}
                                            </h3>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn w-100">View Details</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horse_card_btn">Seller Profile</a>
                                            <a href="#!" class="horse_card_btn">Chat with seller</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horse_card_btn">Share</a>
                                            <form action="{{ route('horse.favorite', Crypt::encrypt($product['id'])) }}" class="horse_card_btn" method="POST">
                                                @csrf
                                                <button class="fvrt_btn" type="submit" title="Add to favorite">
                                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-feature-3" role="tabpanel" aria-labelledby="pills-feature-3-tab">
                    <div class="gen_card_flex">
                        @forelse ($pro_data_auction as $product)
                            <div class="horse_list_card horse_list_card_new">
                                <div class="blue_stripe">
                                    <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                    <ul class="top_list">
                                        {{-- <li>Trail</li>
                                        <li>Dressage</li>
                                        <li>Beginner Safe</li> --}}
                                    </ul>
                                </div>
                                <div class="blue_stripe blue_stripe_new">
                                    <h2>{{ $product->pro_name }}</h2>
                                    <label class="heart_checkbox_wrapper d-block">
                                        <input type="checkbox" class="heartCheckbox" hidden />
                                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="img_box">
                                    <div class="swiper horse_list_card_slider h-100 w-100">
                                        <div class="swiper-wrapper">
                                            @php $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : []; @endphp @forelse ($productImages as $item)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="" />
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="arrow_flex">
                                        <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                        <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                    </div>
                                    <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                    @if ($product->pro_ad_type === 'At Auction')
                                        <div class="countdown" data-duration="259200000">
                                            <div class="circle-container" data-type="days">
                                                <div class="circle-text">
                                                    <span class="value">3</span>
                                                    <small>Days</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="hours">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Hrs</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="minutes">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Mins</small>
                                                </div>
                                            </div>
                                            <div class="circle-container border-0" data-type="seconds">
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Secs</small>
                                                </div>
                                            </div>
                                            <p>TILL END OF AUCTION</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="text_box">
                                    <div class="custome_listing_row">
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <!-- <li>{{ $product->pro_breed }}</li> -->
                                                <li>
                                                    {{ $product->pro_age_year }} Years
                                                    @if ($product->pro_age_month > 0)
                                                        {{ $product->pro_age_month }} MO
                                                    @endif
                                                    Old
                                                </li>
                                                <li>{{ $product->pro_height }} HH</li>
                                                <li>{{ $product->pro_gender }}</li>
                                            </ul>
                                        </div>
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <li>{{ $product->pro_color ?? ' ' }}</li>
                                                <li>Registered: {{ Str::ucfirst($product->registerd_horse ?? ' ') }}</li>
                                                <li>Gaited: {{ $product->gaited }}</li>
                                                <!-- <li><strong>Ad Type:</strong> {{ $product->pro_ad_type }}</li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="custome_listing_col w-100">
                                        <ul class="info_list">
                                            {{-- @php
                                                $state = $product->per_state ?? 'alabama (AL)';
                                                preg_match('/\((.*?)\)/', $state, $matches);
                                            @endphp
                                            <li class="m-0 mb-2">{{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }}, @php
                                                echo $matches[1];
                                            @endphp</li> --}}
                                            @php
                                                $state = $product->per_state ?? 'alabama (AL)';
                                                preg_match('/\((.*?)\)/', $state, $matches);
                                                $stateCode = $matches[1] ?? '';
                                            @endphp

                                            <li class="m-0 mb-2">
                                                {{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }},
                                                {{ $stateCode }}
                                            </li>
                                        </ul>
                                        {{-- <ul class="info_list">
                                            <li class="m-0 mb-2">{{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }}</li>
                                        </ul> --}}
                                    </div>
                                    <div class="blue_wrapper">
                                        <div class="blue_stripe">
                                            <h3>
                                                @if ($product->pro_ad_type == 'At Auction')
                                                    Starting Bid:
                                                @else
                                                    Price:
                                                @endif: ${{ $product->pro_reg_price }}
                                            </h3>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn w-100">View Details</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horse_card_btn">Seller Profile</a>
                                            <a href="#!" class="horse_card_btn">Chat with seller</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horse_card_btn">Share</a>
                                            <form action="{{ route('horse.favorite', Crypt::encrypt($product['id'])) }}" class="horse_card_btn" method="POST">
                                                @csrf
                                                <button class="fvrt_btn" type="submit" title="Add to favorite">
                                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <a href="{{ route('horse_listing_filter') }}" class="search_all_btn"><span>Explore More</span></a>
        </div>
    </section>

    <section class="milestome cta_section">
        <div class="container-fluid">
            <h2 class="cta_sec_heading">Find Your Perfect Match Faster than Anyone else</h2>
            <div class="herd_box herd_box_type_one">
                <p class="mb-3">Stop waiting for the right horse, service, or property to find you.</p>
                <p class="mb-3">
                    With your free Horse Action Network account, you can create custom searches that work for you around the
                    clock. Set your criteria once, and we’ll send you instant alerts the moment a matching listing hits the
                    market.
                </p>
                <h2 class="mb-3">✨ Why Create a Search?</h2>
                <ul>
                    <li><span>First to Know</span> – Beat the competition with instant notifications.</li>
                    <li><span>Stay Organized</span> – Save and manage all your searches and favorites in one place.</li>
                    <li><span>Made for You</span> – Filter by breed, price, location, discipline, services, or property
                        features.</li>
                </ul>
                <p class="mb-3"><span>📌 Pro Tip:</span> Most listings get inquiries within hours. A saved search ensures
                    you’ll never miss your dream horse, a top-rated service provider, or the perfect equestrian property.
                </p>
                <a href="#!" class="horse_card_btn submit_bnt">Start Your Search here! </a>
            </div>
        </div>
    </section>

    <section class="best_selling best_selling_two equestrian_service_sec pb-0">
        <div class="container-fluid">
            <div class="heading65px monte_carlo fw_400 mb-5">
                <h1>EQUESTRIAN SERVICES</h1>
                <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
            </div>
            <div class="custom_wrapper">
                <div class="row mt-4 mt-lg-5 gy-4 mb-4">
                    @forelse ($services as $service)
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            <div class="product_clm">
                                <div class="product_clm_img_box">
                                    <img src="{{ asset('service-profile/' . $service->ser_profile) }}" class="pro_img" width="" height="" alt="" />
                                    <div class="product_clm_img_hover_box">
                                        <a href="javascript:;" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:;" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:;" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                    </div>
                                </div>
                                <h5 class="heading22px primeColor">{{ $service->business_name }}</h5>
                                <p>{{ $service->number }}</p>
                                <a href="{{ $service->website_url }}" target="_blank" class="webLink">{{ $service->website_url }}</a>
                                <div class="btn_set mt-3">
                                    <a href="#!" class="horse_card_btn">View Detail</a>
                                    <label class="fvrt_btn">
                                        <input type="checkbox" hidden />
                                        Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <a href="{{ route('services') }}" class="search_all_btn"><span>Explore More</span></a>
        </div>
    </section>

    <section class="best_selling best_selling_two best_selling_three">
        <div class="container-fluid">
            <div class="heading65px monte_carlo fw_400 mb-5">
                <h1>EQUESTRIAN REAL ESTATE</h1>
                <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
            </div>
            <div class="gen_card_flex">
                @forelse ($states as $state)
                    <div class="horse_list_card horse_list_card_new real_estate_card_new">
                        <p class="fs_tag">{{ $state['ad_type'] }}</p>
                        <div class="blue_stripe blue_tripe_new">
                            @php
                                // Original value
                                $location = $state['real_location'];

                                // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                    $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                } else {
                                    $displayLocation = ''; // agar nahi ha to empty
                                }
                            @endphp

                            <h2>{{ $state['real_title'] }}, {{ $displayLocation }}</h2>
                            <label class="heart_checkbox_wrapper d-block">
                                <input type="checkbox" class="heartCheckbox" hidden />
                                <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                            </label>
                        </div>
                        <div class="img_box">
                            <div class="swiper horse_list_card_slider h-100 w-100">
                                <div class="swiper-wrapper">
                                    @php
                                        $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                    @endphp
                                    @foreach ($images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('Gallery_imgs/' . $image) }}" alt="img">
                                        </div>
                                    @endforeach
                                    {{-- <div class="swiper-slide">
                                        <img src="/assets/images/farm_1.jpg" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="/assets/images/farm_2.jpg" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="/assets/images/farm_3.jpg" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="/assets/images/farm_4.jpg" alt="" />
                                    </div> --}}
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="arrow_flex">
                                <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="text_box">
                            <div class="custome_listing_row">
                                <div class="custome_listing_col">
                                    <ul class="info_list">
                                        <li class="mb-1">
                                            <span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid" /></span> {{ $state['real_acres'] }} Acres
                                        </li>
                                        <li class="mb-1">
                                            <span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid" /></span> {{ $state['real_bedroom'] }}
                                            Bedrooms
                                        </li>
                                    </ul>
                                </div>
                                <div class="custome_listing_col">
                                    <ul class="info_list">
                                        <li class="mb-1">
                                            <span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid" /></span> {{ $state['real_bathroom'] }}
                                            Bathrooms
                                        </li>
                                        <li class="mb-1">
                                            <span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid" /></span> {{ $state['real_garage'] }}
                                            Garage
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blue_wrapper">
                                <div class="blue_stripe mb-2">
                                    <h3>Price: {{ $state['real_price'] }}</h3>
                                </div>
                                <div class="horse_list_card_btn_flex_new bottom_row">
                                    <a href="#!" class="horse_card_btn w-100">View All Details</a>
                                </div>
                                <div class="horse_list_card_btn_flex_new bottom_row">
                                    <a href="#!" class="horse_card_btn">Seller Profile</a>
                                    <a href="#!" class="horse_card_btn">Chat with Seller</a>
                                </div>
                                <div class="horse_list_card_btn_flex_new bottom_row">
                                    <a href="#!" class="horse_card_btn">Share</a>
                                    <form action="{{ route('farm.favorite', Crypt::encrypt($state['id'])) }}" class="horse_card_btn" method="POST">
                                        @csrf
                                        <button class="fvrt_btn" type="submit" title="Add favorite">
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <a href="{{ route('realestate') }}" class="search_all_btn"><span>Explore More</span></a>
        </div>
    </section>

    <section class="milestome">
        <div class="container-fluid">
            <div class="herd_box">
                <h2 class="mb-3">JOIN the HERD</h2>
                <p class="mb-3">Join our mailing list to stay informed about newly listed horses. Receive exclusive updates
                    directly in your inbox, giving you the first chance to find your perfect match. ❤️</p>
                <input type="email" placeholder="Email" class="mb-3" />
                <p class="mb-3">For details on how we use your data, please see our <a href="#!">privacy policy</a></p>
                <a href="#!" class="horse_card_btn submit_bnt">View Detail</a>
            </div>
        </div>
    </section>

    <section class="faqs_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <h3 class="heading44px fw_700">
                        Why Choose Us?
                    </h3>
                    <div class="accordion dark mt-4" id="accordionExample">
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Why
                                    this
                                    Company is Best?</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        We offer a range of services, including social media strategy development, content
                                        creation, campaign management, audience analysis, paid advertising, influencer
                                        collaborations, and performance tracking
                                        across platforms.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">Why this
                                    Company is Best?</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        We start by understanding your business goals, target audience, industry trends, and
                                        competitors. Based on this, we create a customized strategy to align your brand's
                                        voice, content, and campaigns with
                                        your objectives.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">Why
                                    this Company is Best?</button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Our agency works with a diverse range of industries, including e-commerce,
                                        healthcare, hospitality, technology, and more. We tailor our approach to suit the
                                        unique needs of each client, regardless of
                                        their niche.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">Why
                                    this Company is Best?</button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>No. We only charge you for our service fee of the tenure you’d like to work with us.
                                        However, managing and optimizing the ads is included in all packages.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="700">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">Why
                                    this Company is Best?</button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        We prioritize a personalized approach, data-driven decisions, and transparent
                                        communication. Our team stays updated on industry trends and focuses on creating
                                        innovative content that resonates with your
                                        audience, delivering measurable ROI.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3 class="heading44px fw_700">
                        See Our Gallery
                    </h3>
                    <div class="imglist mt-4">
                        <ul>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm5.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm5.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm6.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm6.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm7.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm7.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm8.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm8.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm9.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm9.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm10.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm10.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm11.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm11.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm12.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm12.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events">
        <div class="container-fluid">
            <div class="heading65px monte_carlo fw_400 mb-5">
                <h1>BLOGS</h1>
                <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
            </div>
            <div class="custom_wrapper">
                <div class="row mt-4 mt-lg-5">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="position-relative img_wrap">
                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" class="event_img w-100" width="" height="" alt="" />
                            <span class="eve_date">10 March 2024</span>
                        </div>
                        <div class="entry-meta mt-2">
                            <ul class="list-inline font-11 mb-10">
                                <li>
                                    <em><i class="fa fa-user text-gray mr-5"></i>By: Author / </em>
                                </li>
                                <li>
                                    <em><i class="fa fa-calendar mr-5"></i> June 26, 2016 / </em>
                                </li>
                                <li>
                                    <em><i class="fa fa-comment-o mr-5"></i>Comments: 45 </em>
                                </li>
                            </ul>
                        </div>
                        <h1 class="heading30px my-2 text-center">Lorem Ipsum</h1>
                        <p class="heading18px text-center">Lorem Ipsum is text of the printing</p>
                        <a href="#" class="border_btn mt-2">Learn More</a>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="position-relative img_wrap">
                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" class="event_img w-100" width="" height="" alt="" />
                            <span class="eve_date">10 March 2024</span>
                        </div>
                        <div class="entry-meta mt-2">
                            <ul class="list-inline font-11 mb-10">
                                <li>
                                    <em><i class="fa fa-user text-gray mr-5"></i>By: Author / </em>
                                </li>
                                <li>
                                    <em><i class="fa fa-calendar mr-5"></i> June 26, 2016 / </em>
                                </li>
                                <li>
                                    <em><i class="fa fa-comment-o mr-5"></i>Comments: 45 </em>
                                </li>
                            </ul>
                        </div>
                        <h1 class="heading30px my-2 text-center">Lorem Ipsum</h1>
                        <p class="heading18px text-center">Lorem Ipsum is text of the printing</p>
                        <a href="#" class="border_btn mt-2">Learn More</a>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative img_wrap">
                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg" class="event_img w-100" width="" height="" alt="" />
                            <span class="eve_date">10 March 2024</span>
                        </div>
                        <div class="entry-meta mt-2">
                            <ul class="list-inline font-11 mb-10">
                                <li>
                                    <em><i class="fa fa-user text-gray mr-5"></i>By: Author / </em>
                                </li>
                                <li>
                                    <em><i class="fa fa-calendar mr-5"></i> June 26, 2016 / </em>
                                </li>
                                <li>
                                    <em><i class="fa fa-comment-o mr-5"></i>Comments: 45 </em>
                                </li>
                            </ul>
                        </div>
                        <h1 class="heading30px my-2 text-center">Lorem Ipsum</h1>
                        <p class="heading18px text-center">Lorem Ipsum is text of the printing</p>
                        <a href="#" class="border_btn mt-2">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="overlay" id="popup-overlay">
        <div class="popup">
            <button class="close-btn" onclick="closePopup()">&times;</button>
            <div class="title">
                <span class="star-icon">★</span>
                Don't Miss Your Dream Horse or Property!
            </div>
            <div class="description">
                Create your FREE account today and set up custom searches. We'll send you instant alerts the moment a match
                is listed — so you can be first in line.
            </div>
            <ul class="features">
                <li>
                    <span class="check-icon">✓</span>
                    Be first to know
                </li>
                <li>
                    <span class="check-icon">✓</span>
                    Save time with tailored results
                </li>
                <li>
                    <span class="check-icon">✓</span>
                    Keep all your favorites in one place
                </li>
            </ul>
            <button class="cta-button" onclick="createAccount()">
                Create My Account
                <span>→</span>
            </button>
            <div class="disclaimer">
                DisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDiscl
                aimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimerDisclaimer.
            </div>
        </div>
    </div>

    <script>
        function initializeCountdown(container, durationMs) {
            const countdownEnd = Date.now() + durationMs;

            function updateCountdown() {
                let distance = countdownEnd - Date.now();

                if (distance <= 0) {
                    container.innerHTML = "<p>Auction has Ended</p>";
                    clearInterval(interval);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                updateValue(container, "days", days);
                updateValue(container, "hours", hours);
                updateValue(container, "minutes", minutes);
                updateValue(container, "seconds", seconds);
            }

            const interval = setInterval(updateCountdown, 1000);
            updateCountdown();
        }

        function updateValue(container, type, value) {
            const circleContainer = container.querySelector(`.circle-container[data-type="${type}"]`);
            if (!circleContainer) return;
            const valueElement = circleContainer.querySelector(".value");
            if (valueElement) valueElement.textContent = value;
        }

        // Start the countdown
        document.querySelectorAll(".countdown").forEach((countdown) => {
            const durationMs = parseInt(countdown.getAttribute("data-duration"), 10);
            initializeCountdown(countdown, durationMs);
        });
    </script>
    <script>
        // Show popup after 5 seconds
        setTimeout(() => {
            document.getElementById("popup-overlay").classList.add("show");
        }, 3000);

        // Close popup function
        function closePopup() {
            document.getElementById("popup-overlay").classList.remove("show");
        }

        // Close popup when clicking outside
        document.getElementById("popup-overlay").addEventListener("click", (e) => {
            if (e.target === document.getElementById("popup-overlay")) {
                closePopup();
            }
        });

        // Create account function (placeholder)
        function createAccount() {
            alert("Redirecting to account creation page...");
            closePopup();
        }

        // Close popup with Escape key
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                closePopup();
            }
        });
    </script>
@endsection
