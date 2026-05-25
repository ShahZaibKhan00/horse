@extends('layouts.app') @section('content')
    <style>
        /* 🌟 Enhanced Notification Styling */
        .tag-notification {
            position: fixed;
            top: 25px;
            right: 25px;
            background: #1d2139;
            color: #1d2139;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
            transition: all 0.4s ease;
            z-index: 99999;
            background: #bf9855;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            max-width: 400px;
        }

        .tag-notification.active {
            opacity: 1;
            transform: translateY(0);
        }

        .top_head {
            text-align: center;
        }

        .border_btm {
            border-bottom: 1px solid #e0e0e0;
        }

        .top_head img {
            max-width: 70px;
            margin-bottom: 10px;
        }

        .membershipBanner {
            padding: 0px 20px;
        }

        .membershipBanner .heading_main {
            font-family: "AvenirNextLTPro-Bold";
            font-size: 80px;
            margin: 0;
            background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
        }

        .filter_sec {
            padding: 20px 10px;
        }

        .filter_row {
            display: flex;
        }

        .filter_side_bar {
            width: 350px;
            background-color: #1d2139;
            padding: 20px;
        }

        .filter_content_box {
            width: calc(100% - 350px);
            padding-left: 20px;
        }



        .filter_side_bar .heading44px {
            font-family: "AvenirLTStd-Book";
            font-size: 30px;
            margin: 0;
            background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .search-form {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .form-section {
            border-bottom: 1px solid #e0e0e0;
            padding: 15px 20px;
        }

        .select-dropdown {
            background: #ccc;
            z-index: 999;
            position: relative;
            height: 350px;
            overflow-y: auto;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 15px;
            font-weight: 600;
            color: #1d2139;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .location-input {
            position: relative;
        }

        .location-input input {
            width: 100%;
            padding: 8px 30px 8px 10px;
            border: 1px solid #1d2139;
            border-radius: 0;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        .location-input span {
            position: absolute;
            background: #ced4da;
            width: 39px;
            height: 37px;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 50%;
            transform: translateY(-50%);
            left: 1px;
            font-size: 18px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px inset;
        }

        .location-input input:focus {
            border-color: #1d2139;
        }

        .location-clear {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 16px;
            color: #999;
            cursor: pointer;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .distance-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .distance-input {
            padding: 6px 8px;
            border: 1px solid #1d2139;
            border-radius: 0;
            font-size: 14px;
            text-align: center;
            width: 100%;
        }

        .unit-label {
            font-size: 12px;
            color: #666;
            font-weight: 500;
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: auto auto auto auto;
            gap: 8px 15px;
            align-items: center;
            margin-top: 8px;
        }

        .checkbox-header {
            font-size: 11px;
            color: #666;
            font-weight: 600;
            text-align: center;
        }

        .checkbox-row {
            display: contents;
        }

        .checkbox-label {
            font-size: 12px;
            color: #333;
            white-space: nowrap;
        }

        .checkbox-item {
            display: flex;
            justify-content: center;
        }

        .checkbox-item input[type="checkbox"] {
            width: 14px;
            height: 14px;
            accent-color: #007bff;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(250 233 207);
        }

        .select-field {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #1d2139;
            border-radius: 0;
            font-size: 14px;
            background: #fff;
            outline: none;
            transition: border-color 0.3s;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 23px inset;
        }

        .select-field:focus {
            border-color: #007bff;
        }

        .skills-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 8px;
        }

        .skill-tag {
            background: #c0995754;
            color: #000000;
            padding: 4px 11px;
            border-radius: 12px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 4px;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
        }

        .skill-tag .remove {
            background: none;
            border: none;
            color: #1d2139;
            cursor: pointer;
            font-size: 12px;
            padding: 0;
            width: 14px;
            height: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .range-inputs {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .range-input {
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
        }

        .range-separator {
            font-size: 12px;
            color: #666;
        }

        .age-options {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 8px;
        }

        .age-option {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .age-option input[type="checkbox"] {
            width: 14px;
            height: 14px;
            accent-color: #007bff;
        }

        .age-option label {
            font-size: 12px;
            color: #333;
        }

        .price-inputs {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .price-symbol {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .action-buttons {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #6c757d;
            border: 1px solid #dee2e6;
        }

        .btn-secondary:hover {
            background: #e9ecef;
        }

        .btn-icon {
            font-size: 12px;
        }

        .form-check-input:checked {
            background-color: #b39648;
            border-color: #b39648;
        }

        .form-check-input[type="radio"] {
            border-radius: 5px;
        }

        .form-check-input {
            width: 15px;
            height: 15px;
            margin-top: 1px;
        }

        .shortcuts_tags_flex {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .shortcuts_tags_item {
            width: fit-content;
            height: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #1c2038;
            cursor: pointer;
        }

        .shortcuts_tags_item p {
            margin: 0;
        }

        .shortcuts_tags_item i {
            font-size: 18px;
        }

        .choose-btn {
            font-size: 15px;
            font-family: "AvenirNextLTPro-Bold";
            padding: 10px 35px;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            width: 100%;
            text-transform: uppercase;
            border-radius: 0;
            z-index: 1;
            border: none;
            color: #1d2139;
            letter-spacing: 0.5px;
            cursor: pointer;
            border: 1px solid #1d2139;
            text-transform: capitalize;
            transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease, color 0.3s ease;
        }

        .countdown {
            display: flex;
            gap: 0px;
            align-items: center;
            justify-content: center;
            position: absolute;
            z-index: 999;
            bottom: 0;
            right: -100%;
            background: #1d2139;
            padding: 5px 10px 25px 10px;
            border: 1px solid #7f83ac;
            width: 295px;
            opacity: 0;
            transition: all 0.5s;
        }
        .gen_card_flex .horse_list_card:hover .countdown {
            opacity: 1;
            right: 0;
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
            display: block;
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



        .info_list li {
            border: 1px solid #1d2139;
            padding: 5px;
            text-align: center;
            font-size: 10px;
        }

        .horse_list_card .img_box {
            height: 260px;
        }

        .blue_stripe h2 {
            font-size: 25px;
        }

        .reset_btn {
            max-width: 200px;
            font-size: 11px;
            padding: 10px;
        }

        .filter_right_flex {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter_right_flex select {
            padding: 10px;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            outline: 0;
            font-size: 11px;
            font-family: "AvenirNextLTPro-Bold";
        }

        .filter_right_flex p {
            margin: 0;
            font-size: 11px;
            font-family: "AvenirNextLTPro-Bold";
        }

        .filter_min_bars {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .select-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .select-wrapper::after {
            content: "▼";
            /* you can replace with an icon/font if needed */
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            /* disables click so select remains clickable */
            font-size: 12px;
            color: #1d2139;
        }

        .blue_stripe {
            position: relative;
        }

        .icon_heart {
            position: absolute;
            font-size: 30px;
            top: 15px;
            right: 24px;
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon_heart.filled {
            color: #c09957;
        }

        .blue_stripe h2 {
            text-transform: uppercase;
        }

        .gen_card_flex {
            display: flex;
            flex-wrap: wrap; /* Isse 4 ke baad agla card niche chala jayega */
            width: 100%;
            justify-content: flex-start; 
            max-width: 100%;
            margin: 0 auto;
            gap: 15px; /* Cards ke darmiyan gap */
        }

        /*.gen_card_flex .horse_list_card {*/
        /*    width: 24%;*/
        /*    margin-bottom: 25px;*/
        /*}*/
        
        .gen_card_flex .horse_list_card {
            /* Formula: (100% - total gaps) / 4 */
            /* 3 gaps hain 15px ke, isliye (15px * 3) = 45px minus hoga */
            width: calc((100% - 45px) / 4); 
            
            margin-bottom: 25px;
            box-sizing: border-box; /* Padding/border ko width ke andar rakhne ke liye */
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
            font-size: 14px;
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
            padding: 10px 0px;
        }

        .horse_list_card_new .top_list li {
            font-size: 11px;
        }

        .horse_list_card_new .blue_stripe.blue_stripe_new {
            padding: 2px 5px 6px 0px;
        }

        .horse_list_card_new .icon_heart {
            position: absolute;
            font-size: 24px;
            top: -12px;
            right: 7px;
        }

        .horse_list_card_new .custome_listing_col .info_list li {
            font-size: 17.5px;
            margin: 5px 0px;
            padding: 0px 3px;
            text-transform: uppercase;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 100%;
        }

        .fs_tag {
            font-size: 14px;
            padding: 5px 19px;
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
            font-size: 30px;
            text-transform: uppercase;
        }

       .breed_text {
            background: #1d2139;
            /*position: absolute;*/
            /*bottom: 0;*/
            /*left: 0;*/
            width: 100%;
            z-index: 9;
            text-align: center;
            font-size: 22px;
            font-weight: 500;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            padding: 7px 0;
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

        .sold_badge {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            width: 62% !important;
            object-fit: contain !important;
        }

        .real_estate_card_new.horse_list_card_new .custome_listing_col .info_list li {
            font-size: 16px;
            margin: 5px 0px;
            padding: 4px 0px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
            text-transform: uppercase;
        }

        @media (max-width: 1799px) {
            .filter_sec {
                padding: 10px 0px;
            }

            .shortcuts_tags_item {
                height: 35px;
                padding: 10px;
                font-size: 11px;
            }

            .form-section {
                padding: 12px 10px;
            }

            .checkbox-label {
                font-size: 9px;
            }

             .countdown {
                width: 230px;
            }
        .circle-text span, .circle-text small {
            font-size: 12px;
        }
                    .circle-container {
                padding: 0px 7px;
            }

            .choose-btn {
                font-size: 13px;
                padding: 10px 7px;
            }

            .icon_heart {
                font-size: 20px;
                right: 14px;
            }

            /*.gen_card_flex {*/
            /*    max-width: 1270px;*/
            /*    padding-top: 10px;*/
            /*    gap: 10px;*/
            /*    justify-content: flex-start;*/
            /*}*/

            .filter_side_bar {
                width: 300px;
                padding: 10px;
            }

            .filter_content_box {
                width: calc(100% - 300px);
                padding-left: 12px;
            }

            .fs_tag {
                font-size: 15px;
                padding: 1px 17px;
            }

            #pills-feature-3 .fs_tag {
                padding: 1px 7px;
            }

            .horse_list_card_new .top_list li {
                font-size: 8.5px;
                padding: 0px 3px;
            }

            .horse_list_card_new .blue_stripe h2 {
                font-size: 18px;
                margin-top: 3px;
            }

            .horse_list_card_new .custome_listing_col .info_list li {
                font-size: 12.5px;
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
                font-size: 11px;
                height: 32px;
            }

            .horse_list_card_new .icon_heart {
                font-size: 18px;
            }

            .breed_text {
                font-size: 17px;
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
                max-width: 1270px;
                width: 100%;
                margin: 0 auto;
            }
        }

        @media (max-width: 1400px) {
            .breed_text {
                font-size: 15px;
            }

            .fs_tag {
                font-size: 12px;
                padding: 1px 6px;
            }

            .filter_side_bar {
                width: 270px;
            }

            .filter_content_box {
                width: calc(100% - 270px);
                padding-left: 12px;
            }

            /*.gen_card_flex .horse_list_card {*/
            /*    width: 235px;*/
            /*}*/

            .section-title {
                font-size: 13px;
            }

            .action-buttons {
                padding: 10px;
            }

            .checkbox-grid {
                gap: 7px 10px;
            }

            .horse_list_card.horse_list_card_new .img_box {
                width: 100%;
                height: 160px;
            }

            .horse_list_card_new .custome_listing_col .info_list li {
                font-size: 11.5px;
            }

            .horse_list_card_new .blue_stripe h2 {
                width: 185px;
                margin: 0 auto;
                margin-top: 3px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        }

        /* .scroller {
                                                   max-height: 1366px;
                                                   overflow-y: auto;
                                                   overflow-x: hidden;
                                                   }
                                                   */
    </style>

    <section class="inner_page_banner membershipBanner">
        <div class="container text-center">
            <h1 class="heading_main">ALL HORSE LISTINGS</h1>
        </div>
    </section>
    {{-- @dd($from) --}}
    <section class="filter_sec">
        <div class="tag-notification" id="tagNotification"></div>
        <div class="container-fluid">
            <div class="filter_row">
                <form method="GET" id="mainForm" action="{{ route('horse_listing_filter') }}">
                    <div class="filter_side_bar">
                        <div class="top_head">
                            <img src="assets/images/heading_logo.png" alt="img" class="img-fluid">
                            <h3 class="heading44px mb-4 text-center">SEARCH & FILTER ADS</h3>
                        </div>
                        <div class="search-form">
                            <!-- Location Section -->
                            <div class="form-section">
                                <div class="section-title text-uppercase">Location</div>
                                <div class="location-input">
                                    <input type="text" class="form-control ps-5" name="location" value="{{ request('location', '') }}" placeholder="City, State, or Zip" />
                                    <button class="location-clear" onclick="clearLocation()">×</button>
                                    <span><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <!-- Distance Range Section -->
                            <div class="form-section">
                                <div class="section-title">Distance Range</div>
                                <div class="distance-controls">
                                    <input type="text" class="distance-input form-control thousand-separator" name="distance_min" value="{{ request('distance_min') }}" placeholder="MIN" />
                                    <input type="text" class="distance-input form-control thousand-separator" name="distance_max" value="{{ request('distance_max') }}" placeholder="MAX" />
                                </div>
                                <div class="unit-label mt-3">
                                    <div class="checkbox-item justify-content-start gap-3">
                                        <label><input type="radio" class="form-check-input" name="hr_miles" value="hours" {{ request('hr_miles') == 'hours' ? 'checked' : '' }} /> Hours</label>
                                        <label><input type="radio" class="form-check-input" name="hr_miles" value="miles" {{ request('hr_miles') == 'miles' ? 'checked' : '' }} /> Miles</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-section">
                                <p class="section-title">HORSE NAME</p>
                                <div class="location-input">
                                    <input type="text" class="form-control" id="nameInput" name="name" value="{{ request('name', '') }}" placeholder="TYPE NAME HERE" />
                                </div>
                            </div>
                            {{-- @if (!request('type')) --}}
                            <!-- Listing Types Section -->
                            <div class="form-section">
                                <div class="checkbox-grid">
                                    <div></div>
                                    <div class="checkbox-header">INCLUDE</div>
                                    <div class="checkbox-header">EXCLUDE</div>
                                    <div class="checkbox-header"></div>
                                    <div class="checkbox-row">
                                        <div class="checkbox-label">Horses for Sale</div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="listed_horses" @checked(request('listed_horses') == 'For Sale') value="For Sale" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="listed_horses" @checked(request('listed_horses') == 'not-for-sale') value="not-for-sale" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            {{-- <input type="radio" name="listed_horses" @checked(request('listed_horses') == 'For Sale') value="" class="form-check-input" /> --}}
                                        </div>
                                    </div>
                                    <div class="checkbox-row">
                                        <div class="checkbox-label">Horses at Auction</div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="auction_horses" @checked(request('auction_horses') == 'At Auction') value="At Auction" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="auction_horses" @checked(request('auction_horses') == 'not-at-auction') value="not-at-auction" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            {{-- <input type="radio" name="auction_horses" @checked(request('auction_horses') == 'At Auction') value="" class="form-check-input" /> --}}
                                        </div>
                                    </div>
                                    <div class="checkbox-row">
                                        <div class="checkbox-label">Sold Horses</div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="sold_horses" @checked(request('sold_horses') == 'Sold') value="Sold" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="sold_horses" @checked(request('sold_horses') == 'not-sold') value="not-sold" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            {{-- <input type="radio" name="sold_horses" @checked(request('sold_horses') == 'Sold') value="" class="form-check-input" /> --}}
                                        </div>
                                    </div>
                                    <div class="checkbox-row">
                                        <div class="checkbox-label">Horses for Lease</div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="lease_horses" @checked(request('lease_horses') == 'For Lease') value="For Lease" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="lease_horses" @checked(request('lease_horses') == 'not-for-lease') value="not-for-lease" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            {{-- <input type="radio" name="lease_horses" @checked(request('lease_horses') == 'For Lease') value="" class="form-check-input" /> --}}
                                        </div>
                                    </div>
                                    <div class="checkbox-row">
                                        <div class="checkbox-label">Horses At Stud</div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="at_stud" @checked(request('at_stud') == 'At Stud') value="At Stud" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="at_stud" @checked(request('at_stud') == 'not-for-stud') value="not-for-stud" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            {{-- <input type="radio" name="at_stud" @checked(request('at_stud') == 'For Stud') value="" class="form-check-input" /> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                            <!-- Breed Section -->
                            <div class="form-section">
                                <div class="section-title">Breed</div>
                                <div class="skills-tags" id="breed-tags">
                                    <!-- Selected breeds will appear here -->
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select breed_select" name="breed[]" id="breedSelect" multiple>
                                        <option value="" disabled selected>Select Breed</option>
                                        <option value="Aegidienberger" @selected(in_array('Aegidienberger', (array)request('breed')))>Aegidienberger</option>
                                        <option value="Akhal-Teke" @selected(in_array('Akhal-Teke', (array)request('breed')))>Akhal-Teke</option>
                                        <option value="AlbertaWildHorse" @selected(in_array('AlbertaWildHorse', (array)request('breed')))>Alberta Wild Horse</option>
                                        <option value="AlterReal" @selected(in_array('AlterReal', (array)request('breed')))>Alter Real</option>
                                        <option value="Altmark Coldblood" @selected(in_array('Altmark Coldblood', (array)request('breed')))>Altmark Coldblood</option>
                                        <option value="Altor Real" @selected(in_array('Altor Real', (array)request('breed')))>Altor Real</option>
                                        <option value="American Bashkir Curly" @selected(in_array('American Bashkir Curly', (array)request('breed')))>American Bashkir Curly</option>
                                        <option value="American Belgian Draft" @selected(in_array('American Belgian Draft', (array)request('breed')))>American Belgian Draft</option>
                                        <option value="American Cream Draft Horse" @selected(in_array('American Cream Draft Horse', (array)request('breed')))>American Cream Draft Horse</option>
                                        <option value="American Indian Horse" @selected(in_array('American Indian Horse', (array)request('breed')))>American Indian Horse</option>
                                        <option value="American Miniature Horse" @selected(in_array('American Miniature Horse', (array)request('breed')))>American Miniature Horse</option>
                                        <option value="American Quarter Pony" @selected(in_array('American Quarter Pony', (array)request('breed')))>American Quarter Pony</option>
                                        <option value="American Saddlebred" @selected(in_array('American Saddlebred', (array)request('breed')))>American Saddlebred</option>
                                        <option value="American Shetland Pony" @selected(in_array('American Shetland Pony', (array)request('breed')))>American Shetland Pony</option>
                                        <option value="American Spotted" @selected(in_array('American Spotted', (array)request('breed')))>American Spotted</option>
                                        <option value="American Standardbred" @selected(in_array('American Standardbred', (array)request('breed')))>American Standardbred</option>
                                        <option value="American Walking Pony" @selected(in_array('American Walking Pony', (array)request('breed')))>American Walking Pony</option>
                                        <option value="American Warmblood" @selected(in_array('American Warmblood', (array)request('breed')))>American Warmblood</option>
                                        <option value="Andalusian Horse" @selected(in_array('Andalusian Horse', (array)request('breed')))>Andalusian Horse</option>
                                        <option value="Anglo Arabian" @selected(in_array('Anglo Arabian', (array)request('breed')))>Anglo-Arabian</option>
                                        <option value="Appaloosa" @selected(in_array('Appaloosa', (array)request('breed')))>Appaloosa</option>
                                        <option value="Appendix" @selected(in_array('Appendix', (array)request('breed')))>Appendix</option>
                                        <option value="Appendix Quarter Horse" @selected(in_array('Appendix Quarter Horse', (array)request('breed')))>Appendix Quarter Horse</option>
                                        <option value="Arabian" @selected(in_array('Arabian', (array)request('breed')))>Arabian</option>
                                        <option value="Arabian Horses" @selected(in_array('Arabian Horses', (array)request('breed')))>Arabian Cross</option>
                                        <option value="Arabian Halfbred" @selected(in_array('Arabian Halfbred', (array)request('breed')))>Arabian Halfbred</option>
                                        <option value="Arabian Partbred" @selected(in_array('Arabian Partbred', (array)request('breed')))>Arabian Partbred</option>
                                        <option value="Arabian-Berber" @selected(in_array('Arabian-Berber', (array)request('breed')))>Arabian-Berber</option>
                                        <option value="Araloosa" @selected(in_array('Araloosa', (array)request('breed')))>Araloosa</option>
                                        <option value="Arcenberg-Nordkirchen" @selected(in_array('Arcenberg-Nordkirchen', (array)request('breed')))>Arcenberg-Nordkirchen</option>
                                        <option value="Ardennes" @selected(in_array('Ardennes', (array)request('breed')))>Ardennes</option>
                                        <option value="Australian Brumby" @selected(in_array('Australian Brumby', (array)request('breed')))>Australian Brumby</option>
                                        <option value="Australian Draught Horse" @selected(in_array('Australian Draught Horse', (array)request('breed')))>Australian Draught Horse</option>
                                        <option value="Australian Stock Horse" @selected(in_array('Australian Stock Horse', (array)request('breed')))>Australian Stock Horse</option>
                                        <option value="Austrian Warmblood" @selected(in_array('Austrian Warmblood', (array)request('breed')))>Austrian Warmblood</option>
                                        <option value="Auxois" @selected(in_array('Auxois', (array)request('breed')))>Auxois</option>
                                        <option value="Azteca" @selected(in_array('Azteca', (array)request('breed')))>Azteca</option>
                                        <option value="Baden-Wurttemberg" @selected(in_array('Baden-Wurttemberg', (array)request('breed')))>Baden-Wurttemberg</option>
                                        <option value="Balearic" @selected(in_array('Balearic', (array)request('breed')))>Balearic</option>
                                        <option value="Balikun Horse" @selected(in_array('Balikun Horse', (array)request('breed')))>Balikun Horse</option>
                                        <option value="Baltic Hanoverian" @selected(in_array('Baltic Hanoverian', (array)request('breed')))>Baltic Hanoverian</option>
                                        <option value="Banker" @selected(in_array('Banker', (array)request('breed')))>Banker</option>
                                        <option value="Bardigiano" @selected(in_array('Bardigiano', (array)request('breed')))>Bardigiano</option>
                                        <option value="Baroque" @selected(in_array('Baroque', (array)request('breed')))>Baroque</option>
                                        <option value="Bashkir Horse" @selected(in_array('Bashkir Horse', (array)request('breed')))>Bashkir Horse</option>
                                        <option value="Bavarian Warmblood" @selected(in_array('Bavarian Warmblood', (array)request('breed')))>Bavarian Warmblood</option>
                                        <option value="Belgian Cold Blood" @selected(in_array('Belgian Cold Blood', (array)request('breed')))>Belgian Cold Blood</option>
                                        <option value="Belgian Draft" @selected(in_array('Belgian Draft', (array)request('breed')))>Belgian Draft</option>
                                        <option value="Belgian Warmblood" @selected(in_array('Belgian Warmblood', (array)request('breed')))>Belgian Warmblood</option>
                                        <option value="Black Forest Horse" @selected(in_array('Black Forest Horse', (array)request('breed')))>Black Forest Horse</option>
                                        <option value="Boerperd" @selected(in_array('Boerperd', (array)request('breed')))>Boerperd</option>
                                        <option value="Boulonnais" @selected(in_array('Boulonnais', (array)request('breed')))>Boulonnais</option>
                                        <option value="Brabant Horse" @selected(in_array('Brabant Horse', (array)request('breed')))>Brabant Horse</option>
                                        <option value="Brandenburger Warmblood" @selected(in_array('Brandenburger Warmblood', (array)request('breed')))>Brandenburger Warmblood</option>
                                        <option value="Breton" @selected(in_array('Breton', (array)request('breed')))>Breton</option>
                                        <option value="British Riding Pony" @selected(in_array('British Riding Pony', (array)request('breed')))>British Riding Pony</option>
                                        <option value="Budyonny" @selected(in_array('Budyonny', (array)request('breed')))>Budyonny</option>
                                        <option value="Burguete" @selected(in_array('Burguete', (array)request('breed')))>Burguete</option>
                                        <option value="Byelorussian Harness Horse" @selected(in_array('Byelorussian Harness Horse', (array)request('breed')))>Byelorussian Harness Horse</option>
                                        <option value="Calabrese" @selected(in_array('Calabrese', (array)request('breed')))>Calabrese</option>
                                        <option value="Camargue Horse" @selected(in_array('Camargue Horse', (array)request('breed')))>Camargue Horse</option>
                                        <option value="Canadian Horse" @selected(in_array('Canadian Horse', (array)request('breed')))>Canadian Horse</option>
                                        <option value="Canadian Pacer" @selected(in_array('Canadian Pacer', (array)request('breed')))>Canadian Pacer</option>
                                        <option value="Canadian Rustic Pony" @selected(in_array('Canadian Rustic Pony', (array)request('breed')))>Canadian Rustic Pony</option>
                                        <option value="Carolina Marsh Tacky" @selected(in_array('Carolina Marsh Tacky', (array)request('breed')))>Carolina Marsh Tacky</option>
                                        <option value="Cerbat Mustang" @selected(in_array('Cerbat Mustang', (array)request('breed')))>Cerbat Mustang</option>
                                        <option value="Chickasaw Horse" @selected(in_array('Chickasaw Horse', (array)request('breed')))>Chickasaw Horse</option>
                                        <option value="Chincoteague Pony" @selected(in_array('Chincoteague Pony', (array)request('breed')))>Chincoteague Pony</option>
                                        <option value="Choctaw Pony" @selected(in_array('Choctaw Pony', (array)request('breed')))>Choctaw Pony</option>
                                        <option value="Classic Pony" @selected(in_array('Classic Pony', (array)request('breed')))>Classic Pony</option>
                                        <option value="Cleveland-Bay" @selected(in_array('Cleveland-Bay', (array)request('breed')))>Cleveland-Bay</option>
                                        <option value="Clydesdale" @selected(in_array('Clydesdale', (array)request('breed')))>Clydesdale</option>
                                        <option value="Clydesdale Cross" @selected(in_array('Clydesdale Cross', (array)request('breed')))>Clydesdale Cross</option>
                                        <option value="Cob Horse" @selected(in_array('Cob Horse', (array)request('breed')))>Cob Horse</option>
                                        <option value="Comtois" @selected(in_array('Comtois', (array)request('breed')))>Comtois</option>
                                        <option value="Connemara Pony" @selected(in_array('Connemara Pony', (array)request('breed')))>Connemara Pony</option>
                                        <option value="Criollo Horse" @selected(in_array('Criollo Horse', (array)request('breed')))>Criollo Horse</option>
                                        <option value="Crossbred" @selected(in_array('Crossbred', (array)request('breed')))>Crossbred</option>
                                        <option value="Curly" @selected(in_array('Curly', (array)request('breed')))>Curly</option>
                                        <option value="Curly Horses" @selected(in_array('Curly Horses', (array)request('breed')))>Curly Horses</option>
                                        <option value="Dales Pony" @selected(in_array('Dales Pony', (array)request('breed')))>Dales Pony</option>
                                        <option value="Danish Warmblood" @selected(in_array('Danish Warmblood', (array)request('breed')))>Danish Warmblood</option>
                                        <option value="Dartmoor Pony" @selected(in_array('Dartmoor Pony', (array)request('breed')))>Dartmoor Pony</option>
                                        <option value="Draft" @selected(in_array('Draft', (array)request('breed')))>Draft</option>
                                        <option value="Draft Cross" @selected(in_array('Draft Cross', (array)request('breed')))>Draft Cross</option>
                                        <option value="Driving" @selected(in_array('Driving', (array)request('breed')))>Driving</option>
                                        <option value="Drum Horse" @selected(in_array('Drum Horse', (array)request('breed')))>Drum Horse</option>
                                        <option value="Dutch Harness Horse" @selected(in_array('Dutch Harness Horse', (array)request('breed')))>Dutch Harness Horse</option>
                                        <option value="Dutch Warmblood" @selected(in_array('Dutch Warmblood', (array)request('breed')))>Dutch Warmblood</option>
                                        <option value="Falabella" @selected(in_array('Falabella', (array)request('breed')))>Falabella</option>
                                        <option value="Fell Pony" @selected(in_array('Fell Pony', (array)request('breed')))>Fell Pony</option>
                                        <option value="Finnhorse" @selected(in_array('Finnhorse', (array)request('breed')))>Finnhorse</option>
                                        <option value="Fjord" @selected(in_array('Fjord', (array)request('breed')))>Fjord</option>
                                        <option value="Fjord Cross" @selected(in_array('Fjord Cross', (array)request('breed')))>Fjord Cross</option>
                                        <option value="Florida Cracker Horse" @selected(in_array('Florida Cracker Horse', (array)request('breed')))>Florida Cracker Horse</option>
                                        <option value="Friesian" @selected(in_array('Friesian', (array)request('breed')))>Friesian</option>
                                        <option value="Friesian Cross" @selected(in_array('Friesian Cross', (array)request('breed')))>Friesian Cross</option>
                                        <option value="Friesian Sporthorse" @selected(in_array('Friesian Sporthorse', (array)request('breed')))>Friesian Sporthorse</option>
                                        <option value="Friesian Warmblood Cross" @selected(in_array('Friesian Warmblood Cross', (array)request('breed')))>Friesian Warmblood Cross</option>
                                        <option value="Gaited" @selected(in_array('Gaited', (array)request('breed')))>Gaited</option>
                                        <option value="Galiceno" @selected(in_array('Galiceno', (array)request('breed')))>Galiceno</option>
                                        <option value="Gelderland" @selected(in_array('Gelderland', (array)request('breed')))>Gelderland</option>
                                        <option value="Gypsy Cross" @selected(in_array('Gypsy Cross', (array)request('breed')))>Gypsy Cross</option>
                                        <option value="Gypsy Drum Horse" @selected(in_array('Gypsy Drum Horse', (array)request('breed')))>Gypsy Drum Horse</option>
                                        <option value="Gypsy Friesian Cross" @selected(in_array('Gypsy Friesian Cross', (array)request('breed')))>Gypsy Friesian Cross</option>
                                        <option value="Gypsy Vanner" @selected(in_array('Gypsy Vanner', (array)request('breed')))>Gypsy Vanner</option>
                                        <option value="Gypsy Warmblood Cross" @selected(in_array('Gypsy Warmblood Cross', (array)request('breed')))>Gypsy Warmblood Cross</option>
                                        <option value="Hackney" @selected(in_array('Hackney', (array)request('breed')))>Hackney</option>
                                        <option value="Hackney Pony" @selected(in_array('Hackney Pony', (array)request('breed')))>Hackney Pony</option>
                                        <option value="Haflinger" @selected(in_array('Haflinger', (array)request('breed')))>Haflinger</option>
                                        <option value="Hanoverian" @selected(in_array('Hanoverian', (array)request('breed')))>Hanoverian</option>
                                        <option value="Holsteiner" @selected(in_array('Holsteiner', (array)request('breed')))>Holsteiner</option>
                                        <option value="Iberian" @selected(in_array('Iberian', (array)request('breed')))>Iberian</option>
                                        <option value="Icelandic Horse" @selected(in_array('Icelandic Horse', (array)request('breed')))>Icelandic Horse</option>
                                        <option value="Irish Draught" @selected(in_array('Irish Draught', (array)request('breed')))>Irish Draught</option>
                                        <option value="Irish Draft Cross" @selected(in_array('Irish Draft Cross', (array)request('breed')))>Irish Draft Cross</option>
                                        <option value="Irish Sport Horse" @selected(in_array('Irish Sport Horse', (array)request('breed')))>Irish Sport Horse</option>
                                        <option value="Kathiawari" @selected(in_array('Kathiawari', (array)request('breed')))>Kathiawari</option>
                                        <option value="Kentucky Mountain Saddle Horse" @selected(in_array('Kentucky Mountain Saddle Horse', (array)request('breed')))>Kentucky Mountain Saddle Horse</option>
                                        <option value="Kinsky Horse" @selected(in_array('Kinsky Horse', (array)request('breed')))>Kinsky Horse</option>
                                        <option value="Knabstrupper" @selected(in_array('Knabstrupper', (array)request('breed')))>Knabstrupper</option>
                                        <option value="Lippizan" @selected(in_array('Lippizan', (array)request('breed')))>Lippizan</option>
                                        <option value="Lusitano" @selected(in_array('Lusitano', (array)request('breed')))>Lusitano</option>
                                        <option value="Mangalarga Marchador" @selected(in_array('Mangalarga Marchador', (array)request('breed')))>Mangalarga Marchador</option>
                                        <option value="Mangalarga Paulista" @selected(in_array('Mangalarga Paulista', (array)request('breed')))>Mangalarga Paulista</option>
                                        <option value="Marwari Horse" @selected(in_array('Marwari Horse', (array)request('breed')))>Marwari Horse</option>
                                        <option value="Mecklenburg" @selected(in_array('Mecklenburg', (array)request('breed')))>Mecklenburg</option>
                                        <option value="Miniature" @selected(in_array('Miniature', (array)request('breed')))>Miniature</option>
                                        <option value="Missouri Fox Trotter" @selected(in_array('Missouri Fox Trotter', (array)request('breed')))>Missouri Fox Trotter</option>
                                        <option value="Morgan" @selected(in_array('Morgan', (array)request('breed')))>Morgan</option>
                                        <option value="Morgan Cross" @selected(in_array('Morgan Cross', (array)request('breed')))>Morgan Cross</option>
                                        <option value="Mountain Pleasure Horse" @selected(in_array('Mountain Pleasure Horse', (array)request('breed')))>Mountain Pleasure Horse</option>
                                        <option value="Mustang" @selected(in_array('Mustang', (array)request('breed')))>Mustang</option>
                                        <option value="National Show Horse" @selected(in_array('National Show Horse', (array)request('breed')))>National Show Horse</option>
                                        <option value="New Forest Pony" @selected(in_array('New Forest Pony', (array)request('breed')))>New Forest Pony</option>
                                        <option value="Newfoundland Pony" @selected(in_array('Newfoundland Pony', (array)request('breed')))>Newfoundland Pony</option>
                                        <option value="Nokota" @selected(in_array('Nokota', (array)request('breed')))>Nokota</option>
                                        <option value="Oldenburg" @selected(in_array('Oldenburg', (array)request('breed')))>Oldenburg</option>
                                        <option value="Paint" @selected(in_array('Paint', (array)request('breed')))>Paint</option>
                                        <option value="Paso Fino" @selected(in_array('Paso Fino', (array)request('breed')))>Paso Fino</option>
                                        <option value="Percheron" @selected(in_array('Percheron', (array)request('breed')))>Percheron</option>
                                        <option value="Percheron Cross" @selected(in_array('Percheron Cross', (array)request('breed')))>Percheron Cross</option>
                                        <option value="Pinto" @selected(in_array('Pinto', (array)request('breed')))>Pinto</option>
                                        <option value="POA" @selected(in_array('POA', (array)request('breed')))>POA</option>
                                        <option value="Polish Warmblood" @selected(in_array('Polish Warmblood', (array)request('breed')))>Polish Warmblood</option>
                                        <option value="Pony" @selected(in_array('Pony', (array)request('breed')))>Pony</option>
                                        <option value="Quarter Draft" @selected(in_array('Quarter Draft', (array)request('breed')))>Quarter Draft</option>
                                        <option value="Quarter Horse" @selected(in_array('Quarter Horse', (array)request('breed')))>Quarter Horse</option>
                                        <option value="Quarter Horse Cross" @selected(in_array('Quarter Horse Cross', (array)request('breed')))>Quarter Horse Cross</option>
                                        <option value="Racking Horse" @selected(in_array('Racking Horse', (array)request('breed')))>Racking Horse</option>
                                        <option value="Rhinelander" @selected(in_array('Rhinelander', (array)request('breed')))>Rhinelander</option>
                                        <option value="Rocky Mountain Horse" @selected(in_array('Rocky Mountain Horse', (array)request('breed')))>Rocky Mountain Horse</option>
                                        <option value="Selle Français" @selected(in_array('Selle Français', (array)request('breed')))>Selle Français</option>
                                        <option value="Shire" @selected(in_array('Shire', (array)request('breed')))>Shire</option>
                                        <option value="Shire Cross" @selected(in_array('Shire Cross', (array)request('breed')))>Shire Cross</option>
                                        <option value="Single-Footing Horse" @selected(in_array('Single-Footing Horse', (array)request('breed')))>Single-Footing Horse</option>
                                        <option value="Sport Horse" @selected(in_array('Sport Horse', (array)request('breed')))>Sport Horse</option>
                                        <option value="Spotted Draft" @selected(in_array('Spotted Draft', (array)request('breed')))>Spotted Draft</option>
                                        <option value="Spotted Draft Cross" @selected(in_array('Spotted Draft Cross', (array)request('breed')))>Spotted Draft Cross</option>
                                        <option value="Spotted Saddle Horse" @selected(in_array('Spotted Saddle Horse', (array)request('breed')))>Spotted Saddle Horse</option>
                                        <option value="Stock Horse" @selected(in_array('Stock Horse', (array)request('breed')))>Stock Horse</option>
                                        <option value="Suffolk Punch" @selected(in_array('Suffolk Punch', (array)request('breed')))>Suffolk Punch</option>
                                        <option value="Swedish Warmblood" @selected(in_array('Swedish Warmblood', (array)request('breed')))>Swedish Warmblood</option>
                                        <option value="Swiss Warmblood" @selected(in_array('Swiss Warmblood', (array)request('breed')))>Swiss Warmblood</option>
                                        <option value="Tennessee Walking Horse" @selected(in_array('Tennessee Walking Horse', (array)request('breed')))>Tennessee Walking Horse</option>
                                        <option value="Thoroughbred" @selected(in_array('Thoroughbred', (array)request('breed')))>Thoroughbred</option>
                                        <option value="Thoroughbred Cross" @selected(in_array('Thoroughbred Cross', (array)request('breed')))>Thoroughbred Cross</option>
                                        <option value="Tinker" @selected(in_array('Tinker', (array)request('breed')))>Tinker</option>
                                        <option value="Trakehner" @selected(in_array('Trakehner', (array)request('breed')))>Trakehner</option>
                                        <option value="Cumberland Island Horse" @selected(in_array('Cumberland Island Horse', (array)request('breed')))>Cumberland Island Horse</option>
                                        <option value="Virginia Highlander" @selected(in_array('Virginia Highlander', (array)request('breed')))>Virginia Highlander</option>
                                        <option value="Warmblood" @selected(in_array('Warmblood', (array)request('breed')))>Warmblood</option>
                                        <option value="Warmblood Cross" @selected(in_array('Warmblood Cross', (array)request('breed')))>Warmblood Cross</option>
                                        <option value="Warmblood Draft Cross" @selected(in_array('Warmblood Draft Cross', (array)request('breed')))>Warmblood Draft Cross</option>
                                        <option value="Warmblood TB Cross" @selected(in_array('Warmblood TB Cross', (array)request('breed')))>Warmblood TB Cross</option>
                                        <option value="Welsh" @selected(in_array('Welsh', (array)request('breed')))>Welsh</option>
                                        <option value="Welsh Cross" @selected(in_array('Welsh Cross', (array)request('breed')))>Welsh Cross</option>
                                        <option value="Welsh Pony" @selected(in_array('Welsh Pony', (array)request('breed')))>Welsh Pony</option>
                                        <option value="Westphalian" @selected(in_array('Westphalian', (array)request('breed')))>Westphalian</option>
                                        <option value="Zangersheide" @selected(in_array('Zangersheide', (array)request('breed')))>Zangersheide</option>
                                        <option value="Zweibrücker Horse" @selected(in_array('Zweibrücker Horse', (array)request('breed')))>Zweibrücker Horse</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Color Section -->
                            <div class="form-section">
                                <div class="section-title">Color</div>
                                <div class="skills-tags" id="color-tags">
                                    <!-- Selected colors will appear here -->
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select color_select" name="selectedColor[]" multiple>
                                        <option value="" @selected(true) @disabled(true)>Select Color</option>
                                        <option value="Appaloosa" @selected(in_array('Appaloosa', (array)request('selectedColor')))>Appaloosa</option>
                                        <option value="Bay" @selected(in_array('Bay', (array)request('selectedColor')))>Bay</option>
                                        <option value="Bay Dun" @selected(in_array('Bay Dun', (array)request('selectedColor')))>Bay Dun</option>
                                        <option value="Bay Dun Roan" @selected(in_array('Bay Dun Roan', (array)request('selectedColor')))>Bay Dun Roan</option>
                                        <option value="Bay Roan" @selected(in_array('Bay Roan', (array)request('selectedColor')))>Bay Roan</option>
                                        <option value="Black" @selected(in_array('Black', (array)request('selectedColor')))>Black</option>
                                        <option value="Black Bay" @selected(in_array('Black Bay', (array)request('selectedColor')))>Black Bay</option>
                                        <option value="Blanket Appaloosa" @selected(in_array('Blanket Appaloosa', (array)request('selectedColor')))>Blanket Appaloosa</option>
                                        <option value="Blue Roan" @selected(in_array('Blue Roan', (array)request('selectedColor')))>Blue Roan</option>
                                        <option value="Brindle" @selected(in_array('Brindle', (array)request('selectedColor')))>Brindle</option>
                                        <option value="Brown" @selected(in_array('Brown', (array)request('selectedColor')))>Brown</option>
                                        <option value="Buckskin" @selected(in_array('Buckskin', (array)request('selectedColor')))>Buckskin</option>
                                        <option value="Buckskin Roan" @selected(in_array('Buckskin Roan', (array)request('selectedColor')))>Buckskin Roan</option>
                                        <option value="Champagne" @selected(in_array('Champagne', (array)request('selectedColor')))>Champagne</option>
                                        <option value="Chestnut" @selected(in_array('Chestnut', (array)request('selectedColor')))>Chestnut</option>
                                        <option value="Chocolate" @selected(in_array('Chocolate', (array)request('selectedColor')))>Chocolate</option>
                                        <option value="Chocolate Flaxen" @selected(in_array('Chocolate Flaxen', (array)request('selectedColor')))>Chocolate Flaxen</option>
                                        <option value="Cream" @selected(in_array('Cream', (array)request('selectedColor')))>Cream</option>
                                        <option value="Cremello" @selected(in_array('Cremello', (array)request('selectedColor')))>Cremello</option>
                                        <option value="Cremello Dun" @selected(in_array('Cremello Dun', (array)request('selectedColor')))>Cremello Dun</option>
                                        <option value="Dapple Grey" @selected(in_array('Dapple Grey', (array)request('selectedColor')))>Dapple Grey</option>
                                        <option value="Dun" @selected(in_array('Dun', (array)request('selectedColor')))>Dun</option>
                                        <option value="Dunalino" @selected(in_array('Dunalino', (array)request('selectedColor')))>Dunalino</option>
                                        <option value="Dunskin" @selected(in_array('Dunskin', (array)request('selectedColor')))>Dunskin</option>
                                        <option value="Flaxen" @selected(in_array('Flaxen', (array)request('selectedColor')))>Flaxen</option>
                                        <option value="Flea-bitten Gray" @selected(in_array('Flea-bitten Gray', (array)request('selectedColor')))>Flea-bitten Gray</option>
                                        <option value="Frame Overo" @selected(in_array('Frame Overo', (array)request('selectedColor')))>Frame Overo</option>
                                        <option value="Grey" @selected(in_array('Grey', (array)request('selectedColor')))>Grey</option>
                                        <option value="Grullo" @selected(in_array('Grullo', (array)request('selectedColor')))>Grullo</option>
                                        <option value="Isabella" @selected(in_array('Isabella', (array)request('selectedColor')))>Isabella</option>
                                        <option value="Leopard Appaloosa" @selected(in_array('Leopard Appaloosa', (array)request('selectedColor')))>Leopard Appaloosa</option>
                                        <option value="Lerino Dun" @selected(in_array('Lerino Dun', (array)request('selectedColor')))>Lerino Dun</option>
                                        <option value="Liver Chestnut" @selected(in_array('Liver Chestnut', (array)request('selectedColor')))>Liver Chestnut</option>
                                        <option value="Medicine Hat" @selected(in_array('Medicine Hat', (array)request('selectedColor')))>Medicine Hat</option>
                                        <option value="Other" @selected(in_array('Other', (array)request('selectedColor')))>Other</option>
                                        <option value="Overo" @selected(in_array('Overo', (array)request('selectedColor')))>Overo</option>
                                        <option value="Paintaloosa" @selected(in_array('Paintaloosa', (array)request('selectedColor')))>Paintaloosa</option>
                                        <option value="Palomino" @selected(in_array('Palomino', (array)request('selectedColor')))>Palomino</option>
                                        <option value="Palomino Roan" @selected(in_array('Palomino Roan', (array)request('selectedColor')))>Palomino Roan</option>
                                        <option value="Pearl" @selected(in_array('Pearl', (array)request('selectedColor')))>Pearl</option>
                                        <option value="Perlino" @selected(in_array('Perlino', (array)request('selectedColor')))>Perlino</option>
                                        <option value="Piebald" @selected(in_array('Piebald', (array)request('selectedColor')))>Piebald</option>
                                        <option value="Pinto" @selected(in_array('Pinto', (array)request('selectedColor')))>Pinto</option>
                                        <option value="Rabicano" @selected(in_array('Rabicano', (array)request('selectedColor')))>Rabicano</option>
                                        <option value="Red Chocolate" @selected(in_array('Red Chocolate', (array)request('selectedColor')))>Red Chocolate</option>
                                        <option value="Red Dun" @selected(in_array('Red Dun', (array)request('selectedColor')))>Red Dun</option>
                                        <option value="Red Dun Roan" @selected(in_array('Red Dun Roan', (array)request('selectedColor')))>Red Dun Roan</option>
                                        <option value="Red Roan" @selected(in_array('Red Roan', (array)request('selectedColor')))>Red Roan</option>
                                        <option value="Roan" @selected(in_array('Roan', (array)request('selectedColor')))>Roan</option>
                                        <option value="Rose Grey" @selected(in_array('Rose Grey', (array)request('selectedColor')))>Rose Grey</option>
                                        <option value="Sabino" @selected(in_array('Sabino', (array)request('selectedColor')))>Sabino</option>
                                        <option value="Seal Brown" @selected(in_array('Seal Brown', (array)request('selectedColor')))>Seal Brown</option>
                                        <option value="Silver" @selected(in_array('Silver', (array)request('selectedColor')))>Silver</option>
                                        <option value="Silver Bay" @selected(in_array('Silver Bay', (array)request('selectedColor')))>Silver Bay</option>
                                        <option value="Silver Black" @selected(in_array('Silver Black', (array)request('selectedColor')))>Silver Black</option>
                                        <option value="Silver Black Roan" @selected(in_array('Silver Black Roan', (array)request('selectedColor')))>Silver Black Roan</option>
                                        <option value="Silver Buckskin" @selected(in_array('Silver Buckskin', (array)request('selectedColor')))>Silver Buckskin</option>
                                        <option value="Silver Dapple" @selected(in_array('Silver Dapple', (array)request('selectedColor')))>Silver Dapple</option>
                                        <option value="Silver Perlino" @selected(in_array('Silver Perlino', (array)request('selectedColor')))>Silver Perlino</option>
                                        <option value="Silver Smokey Black" @selected(in_array('Silver Smokey Black', (array)request('selectedColor')))>Silver Smokey Black</option>
                                        <option value="Silver Smokey Cream" @selected(in_array('Silver Smokey Cream', (array)request('selectedColor')))>Silver Smokey Cream</option>
                                        <option value="Skewbald" @selected(in_array('Skewbald', (array)request('selectedColor')))>Skewbald</option>
                                        <option value="Smokey Black" @selected(in_array('Smokey Black', (array)request('selectedColor')))>Smokey Black</option>
                                        <option value="Smokey Cream" @selected(in_array('Smokey Cream', (array)request('selectedColor')))>Smokey Cream</option>
                                        <option value="Smokey Cream Dun" @selected(in_array('Smokey Cream Dun', (array)request('selectedColor')))>Smokey Cream Dun</option>
                                        <option value="Smokey Grullo" @selected(in_array('Smokey Grullo', (array)request('selectedColor')))>Smokey Grullo</option>
                                        <option value="Sooty Buckskin" @selected(in_array('Sooty Buckskin', (array)request('selectedColor')))>Sooty Buckskin</option>
                                        <option value="Sooty Palomino" @selected(in_array('Sooty Palomino', (array)request('selectedColor')))>Sooty Palomino</option>
                                        <option value="Sorrel" @selected(in_array('Sorrel', (array)request('selectedColor')))>Sorrel</option>
                                        <option value="Splash Overo" @selected(in_array('Splash Overo', (array)request('selectedColor')))>Splash Overo</option>
                                        <option value="Splash White" @selected(in_array('Splash White', (array)request('selectedColor')))>Splash White</option>
                                        <option value="Strawberry Roan" @selected(in_array('Strawberry Roan', (array)request('selectedColor')))>Strawberry Roan</option>
                                        <option value="Tobiano" @selected(in_array('Tobiano', (array)request('selectedColor')))>Tobiano</option>
                                        <option value="Tovero" @selected(in_array('Tovero', (array)request('selectedColor')))>Tovero</option>
                                        <option value="Unknown" @selected(in_array('Unknown', (array)request('selectedColor')))>Unknown</option>
                                        <option value="White" @selected(in_array('White', (array)request('selectedColor')))>White</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Gender Section -->
                            <div class="form-section">
                                <div class="section-title">Gender</div>
                                <div class="skills-tags" id="gender-tags">
                                    <!-- Selected genders will appear here -->
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select gender_select" name="selectedGender[]" multiple>
                                        <option value="" @disabled(true) selected>Select Genders</option>
                                        <option value="Colt" @selected(in_array('Colt', (array)request('selectedGender')))>Colt
                                        </option>
                                        <option value="Filly" @selected(in_array('Filly', (array)request('selectedGender')))>
                                            Filly</option>
                                        <option value="Gelding" @selected(in_array('Gelding', (array)request('selectedGender')))>Gelding</option>
                                        <option value="Mare" @selected(in_array('Mare', (array)request('selectedGender')))>Mare
                                        </option>
                                        <option value="Stallion" @selected(in_array('Stallion', (array)request('selectedGender')))>Stallion</option>
                                        <option value="Unborn Foal" @selected(in_array('Unborn Foal', (array)request('selectedGender')))>Unborn Foal</option>
                                        <option value="Jack" @selected(in_array('Jack', (array)request('selectedGender')))>Jack
                                        </option>
                                        <option value="Jenny" @selected(in_array('Jenny', (array)request('selectedGender')))>
                                            Jenny</option>
                                        <option value="John" @selected(in_array('John', (array)request('selectedGender')))>John
                                        </option>
                                        <option value="Molly" @selected(in_array('Molly', (array)request('selectedGender')))>
                                            Molly</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Skills/Disciplines Section -->
                            <div class="form-section">
                                <div class="section-title">Skills/Disciplines</div>
                                <div class="skills-tags" id="rider-tags">
                                    <!-- Selected skills will appear here -->
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select skill_select" name="rider[]" multiple>
                                        <option value="" selected disabled>Select Skills/Disciplines</option>
                                        <option value="Agility" @selected(in_array('Agility', (array)request('rider')))>Agility
                                        </option>
                                        <option value="All Around" @selected(in_array('All Around', (array)request('rider')))>
                                            All Around</option>
                                        <option value="All-Around Show" @selected(in_array('All-Around Show', (array)request('rider')))>All-Around Show</option>
                                        <option value="Beginner" @selected(in_array('Beginner', (array)request('rider')))>
                                            Beginner</option>
                                        <option value="Barrel Racing" @selected(in_array('Barrel Racing', (array)request('rider')))>Barrel Racing</option>
                                        <option value="Pole Bending" @selected(in_array('Pole Bending', (array)request('rider')))>Pole Bending</option>
                                        <option value="Gymkhana" @selected(in_array('Gymkhana', (array)request('rider')))>Gymkhana</option>
                                        <option value="Breakaway Roping" @selected(in_array('Breakaway Roping', (array)request('rider')))>Breakaway Roping</option>
                                        <option value="Broodmare" @selected(in_array('Broodmare', (array)request('rider')))>
                                            Broodmare</option>
                                        <option value="Cutting Prospect" @selected(in_array('Cutting Prospect', (array)request('rider')))>Cutting Prospect</option>
                                        <option value="Cutting" @selected(in_array('Cutting', (array)request('rider')))>Cutting
                                        </option>
                                        <option value="Calf Roping" @selected(in_array('Calf Roping', (array)request('rider')))>
                                            Calf Roping</option>
                                        <option value="Clicker Training" @selected(in_array('Clicker Training', (array)request('rider')))>Clicker Training</option>
                                        <option value="Companion Only" @selected(in_array('Companion Only', (array)request('rider')))>Companion Only</option>
                                        <option value="Competitive Trail Riding" @selected(in_array('Competitive Trail Riding', (array)request('rider')))>Competitive
                                            Trail Riding</option>
                                        <option value="Country English Pleasure" @selected(in_array('Country English Pleasure', (array)request('rider')))>Country
                                            English Pleasure</option>
                                        <option value="Cowboy Dressage" @selected(in_array('Cowboy Dressage', (array)request('rider')))>Cowboy Dressage</option>
                                        <option value="Cowboy Mounted Shooting" @selected(in_array('Cowboy Mounted Shooting', (array)request('rider')))>Cowboy Mounted
                                            Shooting</option>
                                        <option value="Cowboy Racing" @selected(in_array('Cowboy Racing', (array)request('rider')))>Cowboy Racing</option>
                                        <option value="Cowhorse" @selected(in_array('Cowhorse', (array)request('rider')))>Cow
                                            horse</option>
                                        <option value="Cross-Country" @selected(in_array('Cross-Country', (array)request('rider')))>Cross-Country</option>
                                        <option value="Dressage" @selected(in_array('Dressage', (array)request('rider')))>
                                            Dressage</option>
                                        <option value="Drill Team" @selected(in_array('Drill Team', (array)request('rider')))>
                                            Drill Team</option>
                                        <option value="Driving" @selected(in_array('Driving', (array)request('rider')))>Driving
                                        </option>
                                        <option value="Endurance Riding" @selected(in_array('Endurance Riding', (array)request('rider')))>Endurance Riding</option>
                                        <option value="English" @selected(in_array('English', (array)request('rider')))>English
                                        </option>
                                        <option value="English Pleasure" @selected(in_array('English Pleasure', (array)request('rider')))>English Pleasure</option>
                                        <option value="Equitation" @selected(in_array('Equitation', (array)request('rider')))>
                                            Equitation</option>
                                        <option value="Eventing" @selected(in_array('Eventing', (array)request('rider')))>
                                            Eventing</option>
                                        <option value="Field Trial" @selected(in_array('Field Trial', (array)request('rider')))>
                                            Field Trial</option>
                                        <option value="Foxhunter" @selected(in_array('Foxhunter', (array)request('rider')))>
                                            Foxhunter</option>
                                        <option value="Gun - Safe Hunting" @selected(in_array('Gun - Safe Hunting', (array)request('rider')))>Gun - Safe Hunting
                                        </option>
                                        <option value="Halter" @selected(in_array('Halter', (array)request('rider')))>Halter
                                        </option>
                                        <option value="Harness" @selected(in_array('Harness', (array)request('rider')))>Harness
                                        </option>
                                        <option value="Harness Racing" @selected(in_array('Harness Racing', (array)request('rider')))>Harness Racing</option>
                                        <option value="Horsemanship" @selected(in_array('Horsemanship', (array)request('rider')))>Horsemanship</option>
                                        <option value="Hunt Seat Equitation" @selected(in_array('Hunt Seat Equitation', (array)request('rider')))>Hunt Seat
                                            Equitation</option>
                                        <option value="Hunter" @selected(in_array('Hunter', (array)request('rider')))>Hunter
                                        </option>
                                        <option value="Hunter Pleasure" @selected(in_array('Hunter Pleasure', (array)request('rider')))>Hunter Pleasure</option>
                                        <option value="Hunter Under Saddle" @selected(in_array('Hunter Under Saddle', (array)request('rider')))>Hunter Under Saddle
                                        </option>
                                        <option value="Jumping" @selected(in_array('Jumping', (array)request('rider')))>Jumping
                                        </option>
                                        <option value="Lesson Horse" @selected(in_array('Lesson Horse', (array)request('rider')))>Lesson Horse</option>
                                        <option value="Liberty Training" @selected(in_array('Liberty Training', (array)request('rider')))>Liberty Training</option>
                                        <option value="Light Riding" @selected(in_array('Light Riding', (array)request('rider')))>Light Riding</option>
                                        <option value="Longe Line" @selected(in_array('Longe Line', (array)request('rider')))>
                                            Longe Line</option>
                                        <option value="Mountain Trail" @selected(in_array('Mountain Trail', (array)request('rider')))>Mountain Trail</option>
                                        <option value="Mounted Games" @selected(in_array('Mounted Games', (array)request('rider')))>Mounted Games</option>
                                        <option value="Mounted Police" @selected(in_array('Mounted Police', (array)request('rider')))>Mounted Police</option>
                                        <option value="Native Costume" @selected(in_array('Native Costume', (array)request('rider')))>Native Costume</option>
                                        <option value="Natural Horsemanship Training" @selected(in_array('Natural Horsemanship Training', (array)request('rider')))>Natural
                                            Horsemanship Training</option>
                                        <option value="Nurse Mare" @selected(in_array('Nurse Mare', (array)request('rider')))>
                                            Nurse Mare</option>
                                        <option value="Pacing Gait" @selected(in_array('Pacing Gait', (array)request('rider')))>
                                            Pacing Gait</option>
                                        <option value="Pack" @selected(in_array('Pack', (array)request('rider')))>Pack</option>
                                        <option value="Parade" @selected(in_array('Parade', (array)request('rider')))>Parade
                                        </option>
                                        <option value="Performance" @selected(in_array('Performance', (array)request('rider')))>
                                            Performance</option>
                                        <option value="Play day" @selected(in_array('Play day', (array)request('rider')))>Play
                                            day</option>
                                        <option value="Pleasure Driving" @selected(in_array('Pleasure Driving', (array)request('rider')))>Pleasure Driving</option>
                                        <option value="Pole Bending" @selected(in_array('Pole Bending', (array)request('rider')))>Pole Bending</option>
                                        <option value="Polo" @selected(in_array('Polo', (array)request('rider')))>Polo</option>
                                        <option value="Pony Club" @selected(in_array('Pony Club', (array)request('rider')))>Pony
                                            Club</option>
                                        <option value="Project" @selected(in_array('Project', (array)request('rider')))>Project
                                        </option>
                                        <option value="Racing" @selected(in_array('Racing', (array)request('rider')))>Racing
                                        </option>
                                        <option value="Retired Race Horse" @selected(in_array('Retired Race Horse', (array)request('rider')))>Retired Race Horse
                                        </option>
                                        <option value="Racking Gait" @selected(in_array('Racking Gait', (array)request('rider')))>Racking Gait</option>
                                        <option value="Ranch Conformation Class" @selected(in_array('Ranch Conformation Class', (array)request('rider')))>Ranch
                                            Conformation Class</option>
                                        <option value="Ranch Rail Class" @selected(in_array('Ranch Rail Class', (array)request('rider')))>Ranch Rail Class</option>
                                        <option value="Ranch Riding" @selected(in_array('Ranch Riding', (array)request('rider')))>Ranch Riding</option>
                                        <option value="Ranch Pleasure" @selected(in_array('Ranch Pleasure', (array)request('rider')))>Ranch Pleasure</option>
                                        <option value="Ranch Sorting" @selected(in_array('Ranch Sorting', (array)request('rider')))>Ranch Sorting</option>
                                        <option value="Ranch Trail Class" @selected(in_array('Ranch Trail Class', (array)request('rider')))>Ranch Trail Class
                                        </option>
                                        <option value="Ranch Versatility" @selected(in_array('Ranch Versatility', (array)request('rider')))>Ranch Versatility
                                        </option>
                                        <option value="Ranch Work" @selected(in_array('Ranch Work', (array)request('rider')))>
                                            Ranch Work</option>
                                        <option value="Reining" @selected(in_array('Reining', (array)request('rider')))>Reining
                                        </option>
                                        <option value="Reined Cowhorse" @selected(in_array('Reined Cowhorse', (array)request('rider')))>Reined Cowhorse</option>
                                        <option value="Rodeo" @selected(in_array('Rodeo', (array)request('rider')))>Rodeo
                                        </option>
                                        <option value="Rodeo Bronc" @selected(in_array('Rodeo Bronc', (array)request('rider')))>
                                            Rodeo Bronc</option>
                                        <option value="Roping" @selected(in_array('Roping', (array)request('rider')))>Roping
                                        </option>
                                        <option value="Saddle Seat" @selected(in_array('Saddle Seat', (array)request('rider')))>
                                            Saddle Seat</option>
                                        <option value="School" @selected(in_array('School', (array)request('rider')))>School
                                        </option>
                                        <option value="Schoolmaster" @selected(in_array('Schoolmaster', (array)request('rider')))>Schoolmaster</option>
                                        <option value="Show Experience" @selected(in_array('Show Experience', (array)request('rider')))>Show Experience</option>
                                        <option value="Show Hack" @selected(in_array('Show Hack', (array)request('rider')))>Show
                                            Hack</option>
                                        <option value="Show Winner" @selected(in_array('Show Winner', (array)request('rider')))>
                                            Show Winner</option>
                                        <option value="Showmanship Halter" @selected(in_array('Showmanship Halter', (array)request('rider')))>Showmanship Halter
                                        </option>
                                        <option value="Sidesaddle" @selected(in_array('Sidesaddle', (array)request('rider')))>
                                            Sidesaddle</option>
                                        <option value="Stallion - Stud - Breeding" @selected(in_array('Stallion - Stud - Breeding', (array)request('rider')))>Stallion -
                                            Stud - Breeding</option>
                                        <option value="Started Under Saddle" @selected(in_array('Started Under Saddle', (array)request('rider')))>Started Under
                                            Saddle</option>
                                        <option value="Steer Roping" @selected(in_array('Steer Roping', (array)request('rider')))>Steer Roping</option>
                                        <option value="Steer Wrestling" @selected(in_array('Steer Wrestling', (array)request('rider')))>Steer Wrestling</option>
                                        <option value="Stock" @selected(in_array('Stock', (array)request('rider')))>Stock
                                        </option>
                                        <option value="Team Driving" @selected(in_array('Team Driving', (array)request('rider')))>Team Driving</option>
                                        <option value="Team Penning" @selected(in_array('Team Penning', (array)request('rider')))>Team Penning</option>
                                        <option value="Team Roping" @selected(in_array('Team Roping', (array)request('rider')))>
                                            Team Roping</option>
                                        <option value="Team Roping - Head" @selected(in_array('Team Roping - Head', (array)request('rider')))>Team Roping - Head
                                        </option>
                                        <option value="Team Roping - Heel" @selected(in_array('Team Roping - Heel', (array)request('rider')))>Team Roping - Heel
                                        </option>
                                        <option value="Team Sorting" @selected(in_array('Team Sorting', (array)request('rider')))>Team Sorting</option>
                                        <option value="Therapeutic Riding" @selected(in_array('Therapeutic Riding', (array)request('rider')))>Therapeutic Riding
                                        </option>
                                        <option value="Therapy" @selected(in_array('Therapy', (array)request('rider')))>Therapy
                                        </option>
                                        <option value="Trail Class Competition" @selected(in_array('Trail Class Competition', (array)request('rider')))>Trail Class
                                            Competition</option>
                                        <option value="Trail Master" @selected(in_array('Trail Master', (array)request('rider')))>Trail Master</option>
                                        <option value="Trail Riding" @selected(in_array('Trail Riding', (array)request('rider')))>Trail Riding</option>
                                        <option value="Trick" @selected(in_array('Trick', (array)request('rider')))>Trick
                                        </option>
                                        <option value="Unicorn" @selected(in_array('Unicorn', (array)request('rider')))>Unicorn
                                        </option>
                                        <option value="Vaulting" @selected(in_array('Vaulting', (array)request('rider')))>
                                            Vaulting</option>
                                        <option value="Western" @selected(in_array('Western', (array)request('rider')))>Western
                                        </option>
                                        <option value="Western Dressage" @selected(in_array('Western Dressage', (array)request('rider')))>Western Dressage</option>
                                        <option value="Western Pleasure" @selected(in_array('Western Pleasure', (array)request('rider')))>Western Pleasure</option>
                                        <option value="Western Riding" @selected(in_array('Western Riding', (array)request('rider')))>Western Riding</option>
                                        <option value="Working Cattle" @selected(in_array('Working Cattle', (array)request('rider')))>Working Cattle</option>
                                        <option value="Working Equitation" @selected(in_array('Working Equitation', (array)request('rider')))>Working Equitation
                                        </option>
                                        <option value="4H" @selected(in_array('4H', (array)request('rider')))>4H</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Rider Level Section -->
                            <div class="form-section">
                                <div class="section-title">Rider Level</div>
                                <div class="skills-tags" id="skill-tags">
                                    <!-- Selected rider levels will appear here -->
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select rider_level_select" name="skill[]" multiple>
                                        <option value="" selected disabled>Select Rider Levels</option>
                                        <option value="Beginner Riders - have minimal or no experience" @selected(in_array('Beginner Riders - have minimal or no experience', (array)request('skill')))>Beginner
                                            Riders - have minimal or no experience</option>
                                        <option value="Novice Riders - have a basic understanding of riding and can perform basic gaits." @selected(in_array('Novice Riders - have a basic understanding of riding and can perform basic gaits.', (array)request('skill')))>Novice Riders - have a basic
                                            understanding of riding and can perform basic gaits.</option>
                                        <option value="Intermediate Riders - are comfortable with all gaits and can handle more challenging situations" @selected(in_array('Intermediate Riders - are comfortable with all gaits and can handle more challenging situations', (array)request('skill')))>Intermediate Riders
                                            - are comfortable with all gaits and can handle more challenging situations
                                        </option>
                                        <option value="Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level." @selected(in_array('Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level.', (array)request('skill')))>
                                            Advanced Riders - have a high level of skill and experience, often competing or
                                            riding at a professional level.</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Height Range Section -->
                            <div class="form-section">
                                <div class="section-title">Height Range</div>
                                <div class="range-inputs">
                                    <input type="text" class="range-input form-control w-100" name="height_min" value="{{ $height_min ?? '' }}" placeholder="MIN" />
                                    <span class="range-separator">TO</span>
                                    <input type="text" class="range-input form-control w-100" name="height_max" value="{{ $height_max ?? '' }}" placeholder="MAX" />
                                    <span class="unit-label">HH</span>
                                </div>
                            </div>
                            <!-- Age Range Section -->
                            <div class="form-section">
                                <div class="section-title">Age Range(Years)</div>
                                <div class="range-inputs">
                                    <input type="number" class="range-input form-control w-100" name="age_min" value="{{ request('age_min') ?? '' }}" placeholder="MIN" />
                                    <span class="range-separator">TO</span>
                                    <input type="number" class="range-input form-control w-100" name="age_max" value="{{ request('age_max') ?? '' }}" placeholder="MAX" />
                                </div>
                                <div class="age-options">
                                    <div class="age-option">
                                        <input type="radio" class="form-check-input" name="age_unit" id="years" value="years" {{ request('age_unit') == 'years' ? 'checked' : '' }}>
                                        <label for="years">YEARS</label>
                                    </div>
                                    <div class="age-option">
                                        <input type="radio" class="form-check-input" name="age_unit" id="months" value="months" {{ request('age_unit') == 'months' ? 'checked' : '' }}>
                                        <label for="months">MONTHS</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Price Range Section -->
                            <div class="form-section">
                                <div class="section-title">Price Range</div>
                                <div class="price-inputs">
                                    <span class="price-symbol">$</span>
                                    <input type="text" name="from" value="{{ request('from') }}" class="range-input thousand-separator form-control w-100" placeholder="MIN" />
                                    <span class="range-separator">TO</span>
                                    <input type="text" name="to" value="{{ request('to') }}" class="range-input thousand-separator form-control w-100" placeholder="MAX" />
                                </div>
                            </div>
                            <div class="action-buttons border_btm">
                                <button class="choose-btn" type="submit">
                                    <span class="btn-icon">🔍</span>
                                    SEARCH
                                </button>
                            </div>
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <button class="choose-btn" type="button" onclick="saveSearch(this)">
                                    <span class="btn-icon">💾</span>
                                    SAVE THIS SEARCH
                                </button>
                                <a class="choose-btn text-center" href="{{ route('horse_listing_filter') }}">
                                    <span class="btn-icon">🔄</span>
                                    RESET
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="filter_content_box">
                    <div class="shortcuts_tags_flex" id="shortcutsContainer">
                    </div>
                    <div class="filter_min_bars">
                        <a class="reset_btn choose-btn" href="{{ route('horse_listing_filter') }}" style="font-size: 12px;"><i class="fa fa-refresh" aria-hidden="true"></i> RESET SEARCH
                            CRITERIA</a>
                        <div class="filter_right_flex">
                            <p>1-24 of 494 Listing</p>
                            <select>
                                <option value="">1-34</option>
                                <option value="">1-44</option>
                                <option value="">1-54</option>
                            </select>
                            <select id="sort" name="sort" onchange="sortProducts(this.value)">
                                <option value="" {{ $sort == '' ? 'selected' : '' }}>Default (Newest)</option>
                                <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Price (Low to High)</option>
                                <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Price (High to Low)</option>
                                <option value="price_high" {{ $sort == 'price_high' ? 'selected' : '' }}>Price (High)</option>
                                <option value="price_low" {{ $sort == 'price_low' ? 'selected' : '' }}>Price (Low)</option>
                            </select>
                        </div>
                    </div>
                    <div class="scroller">
                        <div class="gen_card_flex gy-4">
                            @forelse ($products as $product)
                                <div class="horse_list_card horse_list_card_new ">
                                    <div class="blue_stripe">
                                        <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                        <ul class="top_list">
                                        </ul>
                                    </div>
                                    <div class="blue_stripe blue_stripe_new">
                                        <h2>{{ $product->pro_name }}</h2>
                                        <label class="heart_checkbox_wrapper d-block">
                                            <input type="checkbox" class="heartCheckbox" hidden {{ $product->horsrFavs->isNotEmpty() ? 'checked' : '' }} />
                                            <i class="fa fa-heart{{ $product->horsrFavs->isNotEmpty() ? '' : '-o' }} icon_heart" aria-hidden="true" style="{{ $product->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                        </label>
                                    </div>
                                    <div class="img_box">

                                        @if ($product->horse_status)
                                            <img src="{{ asset('assets/images/SOLD.png') }}" class="sold_badge" alt="" srcset="">
                                        @endif
                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                            <div class="swiper-wrapper">
                                                @php 
                                                    $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : []; 
                                                @endphp

                                                @if(!empty($product->pro_Fimg))
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('Featured_image/' . $product->pro_Fimg) }}" alt="Featured Image" class="img-fluid w-100 img_radius_one" />
                                                    </div>
                                                @endif

                                                @forelse ($productImages as $item)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="Product Image" class="img-fluid w-100 img_radius_one" />
                                                    </div>
                                                @empty
                                                    {{-- Agar featured image bhi na ho aur gallery bhi khali ho tab placeholder dikhayein --}}
                                                    @if(empty($data->pro_Fimg))
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder" class="img-fluid w-100 img_radius_one" />
                                                        </div>
                                                    @endif
                                                @endforelse
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                        <div class="arrow_flex">
                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                        </div>
                                       
                                        @if (is_null($product->horse_status))
                                            @if ($product->pro_ad_type == 'At Auction')
                                                <div class="countdown" data-enddate="{{ \Carbon\Carbon::parse($product->auc_end_date)->endOfDay()->format('Y-m-d\TH:i:s') }}">
                                                    <div class="circle-container" data-type="days">
                                                        <div class="circle-text">
                                                            <span class="value">0</span>
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
                                        @endif
                                    </div>
                                     <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                    <div class="text_box">
                                        <div class="custome_listing_row">
                                            <div class="custome_listing_col">
                                                <ul class="info_list">
                                                    <!-- <li>{{ $product->pro_breed }}</li> -->
                                                    <li>
                                                        @if ($product->pro_age_year > 0)
                                                            {{ $product->pro_age_year }} {{ $product->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                        @endif
                                                        @if ($product->pro_age_month > 0)
                                                            {{ $product->pro_age_month }} {{ $product->pro_age_month == 1 ? 'Mo' : 'Mos' }}
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
                                                    {{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }},
                                                    {{ $stateCode }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="blue_wrapper">
                                            <div class="blue_stripe">
                                                <h3>
                                                    @if ($product->pro_ad_type == 'At Auction')
                                                        Starting Bid: ${{ $product->bid_amount ?? '0' }}
                                                    @else
                                                        Price: ${{ $product->pro_reg_price ?? '0' }}
                                                    @endif
                                                </h3>
                                            </div>
                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn view-detail-btn w-100">View Details</a>
                                            </div>
                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                <a href="{{ url('seller_profile_one/'. $product->id) }}" class="horse_card_btn">Seller Profile</a>
                                                <a href="{{ route('start.conversation', ['receiver_id' => $product->user_id, 'product_id' => $product->id, 'product_type' => 'horse']) }}"
                                                    class="horse_card_btn">Chat with seller</a>
                                            </div>
                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                <a href="#!" class="horse_card_btn">Share</a>
                                                <form class="horse_card_btn favorite-form" action="{{ route('horse.favorite', Crypt::encrypt($product->id)) }}" method="POST">
                                                    @csrf
                                                    <button class="fvrt_btn" type="button" title="Add to favorite">
                                                        {{ $product->horsrFavs->isNotEmpty() ? 'Favorited ' : 'Favorite ' }}<i class="fa fa-heart{{ $product->horsrFavs->isNotEmpty() ? '' : '-o' }}" aria-hidden="true" style="{{ $product->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {

                                    const countdowns = document.querySelectorAll(".countdown");

                                    countdowns.forEach(function(countdown) {

                                        const endDateStr = countdown.getAttribute("data-enddate");
                                        const endDate = new Date(endDateStr).getTime();

                                        if (isNaN(endDate)) {
                                            console.error("Invalid date format:", endDateStr);
                                            return;
                                        }

                                        function updateCountdown() {
                                            const now = new Date().getTime();
                                            let distance = endDate - now;

                                            if (distance <= 0) {
                                                distance = 0;
                                            }

                                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                            countdown.querySelector('[data-type="days"] .value').textContent = days;
                                            countdown.querySelector('[data-type="hours"] .value').textContent = hours;
                                            countdown.querySelector('[data-type="minutes"] .value').textContent = minutes;
                                            countdown.querySelector('[data-type="seconds"] .value').textContent = seconds;
                                        }

                                        updateCountdown();
                                        setInterval(updateCountdown, 1000);
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Function to convert select elements to searchable dropdowns
        function makeSelectSearchable(selectElement) {
            const wrapper = selectElement.closest('.select-wrapper');
            if (!wrapper) return;

            // Store original options
            const originalOptions = Array.from(selectElement.options).map(option => ({
                value: option.value,
                text: option.textContent,
                disabled: option.disabled,
                selected: option.selected
            }));

            // Create input element
            const input = document.createElement('input');
            input.type = 'text';
            input.className = selectElement.className.replace('form-select', 'form-input-select');
            input.placeholder = selectElement.options[0].textContent;
            input.setAttribute('autocomplete', 'off');

            // Create dropdown container
            const dropdown = document.createElement('div');
            dropdown.className = 'select-dropdown';
            dropdown.style.display = 'none';

            // Hide original select
            selectElement.style.display = 'none';

            // Insert input and dropdown
            wrapper.appendChild(input);
            wrapper.appendChild(dropdown);

            // Function to populate dropdown
            function populateDropdown(filter = '') {
                dropdown.innerHTML = '';
                const filteredOptions = originalOptions.filter(option =>
                    !option.disabled &&
                    option.text.toLowerCase().includes(filter.toLowerCase()) &&
                    option.value !== ''
                );

                filteredOptions.forEach(option => {
                    const item = document.createElement('div');
                    item.className = 'dropdown-item';
                    item.textContent = option.text;
                    item.setAttribute('data-value', option.value);

                    item.addEventListener('click', function() {
                        input.value = ''; // Clear for next selection in multi-select
                        
                        if (selectElement.multiple) {
                            // Find and select the option in multi-select
                            const optToSelect = Array.from(selectElement.options).find(o => o.value === option.value);
                            if (optToSelect) optToSelect.selected = true;
                        } else {
                            selectElement.value = option.value;
                        }
                        
                        dropdown.style.display = 'none';

                        // Trigger change event for existing functionality (adding tags)
                        const changeEvent = new Event('change');
                        selectElement.dispatchEvent(changeEvent);
                    });

                    dropdown.appendChild(item);
                });

                // Show "No results" if no matches
                if (filteredOptions.length === 0 && filter !== '') {
                    const noResults = document.createElement('div');
                    noResults.className = 'dropdown-item no-results';
                    noResults.textContent = 'No results found';
                    dropdown.appendChild(noResults);
                }
            }

            // Input event listeners
            input.addEventListener('input', function() {
                populateDropdown(this.value);
                dropdown.style.display = 'block';
            });

            input.addEventListener('focus', function() {
                populateDropdown(this.value);
                dropdown.style.display = 'block';
            });

            input.addEventListener('blur', function(e) {
                // Delay hiding to allow click on dropdown items
                setTimeout(() => {
                    if (!wrapper.contains(document.activeElement)) {
                        dropdown.style.display = 'none';
                    }
                }, 150);
            });

            // Keyboard navigation
            input.addEventListener('keydown', function(e) {
                const items = dropdown.querySelectorAll('.dropdown-item:not(.no-results)');
                let currentIndex = -1;

                // Find currently highlighted item
                items.forEach((item, index) => {
                    if (item.classList.contains('highlighted')) {
                        currentIndex = index;
                    }
                });

                switch (e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        if (dropdown.style.display === 'none') {
                            populateDropdown(this.value);
                            dropdown.style.display = 'block';
                        } else {
                            // Remove current highlight
                            items.forEach(item => item.classList.remove('highlighted'));
                            // Add highlight to next item
                            const nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
                            if (items[nextIndex]) {
                                items[nextIndex].classList.add('highlighted');
                            }
                        }
                        break;

                    case 'ArrowUp':
                        e.preventDefault();
                        if (dropdown.style.display !== 'none') {
                            // Remove current highlight
                            items.forEach(item => item.classList.remove('highlighted'));
                            // Add highlight to previous item
                            const prevIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
                            if (items[prevIndex]) {
                                items[prevIndex].classList.add('highlighted');
                            }
                        }
                        break;

                    case 'Enter':
                        e.preventDefault();
                        const highlighted = dropdown.querySelector('.dropdown-item.highlighted');
                        if (highlighted && !highlighted.classList.contains('no-results')) {
                            highlighted.click();
                        } else if (items.length === 1) {
                            items[0].click();
                        }
                        break;

                    case 'Escape':
                        dropdown.style.display = 'none';
                        input.blur();
                        break;
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!wrapper.contains(e.target)) {
                    dropdown.style.display = 'none';
                }
            });
        }

        // Function to clear location (existing)
        function clearLocation() {
            document.querySelector(".location-input input").value = "";
        }

        // Function to remove tags (existing)
        function removeTag(button) {
            const tag = button.parentElement;
            const fieldName = tag.getAttribute('data-field');
            const fieldValue = tag.getAttribute('data-value');
            const container = tag.parentElement;

            if (fieldName && fieldValue) {
                const select = document.querySelector(`select[name="${fieldName}"]`);
                if (select) {
                    Array.from(select.options).forEach(opt => {
                        if (opt.value === fieldValue) {
                            opt.selected = false;
                        }
                    });
                    // Re-sync tags for this select
                    syncSidebarTags(select, container.id);
                    
                    // Trigger change to update other UI parts (like top shortcuts)
                    select.dispatchEvent(new Event('change'));
                }
            } else {
                tag.remove();
            }
        }

        // Function to save search (existing)
        // function saveSearch() {
        //     alert("Search criteria saved!");
        // }

        // Function to reset search (existing)
        function resetSearch() {
            // Reset all form fields
            document.querySelectorAll("input").forEach((input) => {
                if (input.type === "checkbox") {
                    input.checked = false;
                } else {
                    input.value = "";
                }
            });

            document.querySelectorAll("select").forEach((select) => {
                select.selectedIndex = 0;
            });

            // Reset searchable inputs
            document.querySelectorAll(".form-input-select").forEach((input) => {
                const selectElement = input.closest('.select-wrapper').querySelector('select');
                if (selectElement && selectElement.options.length > 0) {
                    input.placeholder = selectElement.options[0].textContent;
                }
                input.value = "";
            });

            // Clear all tag containers
            document.querySelectorAll(".skills-tags").forEach((container) => {
                container.innerHTML = "";
            });

            alert("Search criteria reset!");
        }

        // Synchronize sidebar tags with the select state
        function syncSidebarTags(selectElement, containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;

            // Clear existing tags in this specific container
            container.innerHTML = "";

            // Add tags for all selected options (except the placeholder at index 0)
            Array.from(selectElement.options).forEach((option, index) => {
                if (option.selected && option.value !== "" && index > 0) {
                    let tagText = option.text;
                    // Truncate long descriptions (e.g. "Beginner - description") to just "Beginner"
                    if (selectElement.classList.contains('rider_level_select') && tagText.includes(' - ')) {
                        tagText = tagText.split(' - ')[0];
                    }

                    const newTag = document.createElement("div");
                    newTag.className = "skill-tag";
                    newTag.setAttribute('data-field', selectElement.name);
                    newTag.setAttribute('data-value', option.value);
                    newTag.innerHTML = `
                        ${tagText}
                        <button class="remove" onclick="removeTag(this)">×</button>
                    `;
                    container.appendChild(newTag);
                }
            });

            // Clear the searchable input field if it exists
            const wrapper = selectElement.closest('.select-wrapper');
            if (wrapper) {
                const input = wrapper.querySelector('.form-input-select');
                if (input) {
                    input.value = '';
                    input.placeholder = selectElement.options[0].textContent;
                }
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Convert all form-select elements to searchable
            document.querySelectorAll('.form-select').forEach(makeSelectSearchable);

            const skillSelect = document.querySelector(".skill_select");
            if (skillSelect) {
                skillSelect.addEventListener('change', function() {
                    syncSidebarTags(this, 'rider-tags');
                });
            }

            const breedSelect = document.querySelector(".breed_select");
            if (breedSelect) {
                breedSelect.addEventListener("change", function(e) {
                    syncSidebarTags(e.target, "breed-tags");
                });
            }

            const colorSelect = document.querySelector(".color_select");
            if (colorSelect) {
                colorSelect.addEventListener("change", function(e) {
                    syncSidebarTags(e.target, "color-tags");
                });
            }

            const genderSelect = document.querySelector(".gender_select");
            if (genderSelect) {
                genderSelect.addEventListener("change", function(e) {
                    syncSidebarTags(e.target, "gender-tags");
                });
            }

            const riderLevelSelect = document.querySelector(".rider_level_select");
            if (riderLevelSelect) {
                riderLevelSelect.addEventListener('change', function() {
                    syncSidebarTags(this, 'skill-tags');
                });
            }
        });
    </script>



    <script>
        const tagsContainer = document.querySelector(".shortcuts_tags_flex");
        const form = document.getElementById("mainForm");
        const notification = document.getElementById("tagNotification");

        function showNotification(message) {
            if (!notification) return;
            notification.textContent = message;
            notification.classList.add("active");
            setTimeout(() => notification.classList.remove("active"), 3000);
        }

        // 🟢 Create summary tags at the top
        function createTag(label, value, key, showLabel = false) {
            if (!value || value.toString().trim() === "" || value === "-") return;
            if (!tagsContainer) return;

            // Update if existing
            const existing = tagsContainer.querySelector(`[data-key="${CSS.escape(key)}"]`);
            if (existing) {
                existing.querySelector("p").innerHTML = showLabel ? `<strong>${label}:</strong> ${value}` : value;
                return;
            }

            const tag = document.createElement("div");
            tag.classList.add("shortcuts_tags_item");
            tag.dataset.key = key;
            tag.innerHTML = `
                <p>${showLabel ? `<strong>${label}:</strong> ${value}` : value}</p>
                <a href="#!" class="remove-tag"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
            `;
            tagsContainer.appendChild(tag);

            // Remove logic
            tag.querySelector(".remove-tag").addEventListener("click", () => {
                const baseKey = key.split('_')[0];
                const valToRemove = key.split('_').slice(1).join('_');
                tag.remove();

                if (key === "price") {
                    form.querySelectorAll("input[name='from'], input[name='to']").forEach(i => (i.value = ""));
                } else if (["breed", "selectedColor", "selectedGender", "skill", "rider"].includes(baseKey)) {
                    const select = form.querySelector(`select[name="${baseKey}[]"]`);
                    if (select) {
                        const option = Array.from(select.options).find(o => o.value === valToRemove);
                        if (option) {
                            option.selected = false;
                            select.dispatchEvent(new Event('change'));
                        }
                    }
                } else {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) input.value = "";
                }
                showNotification(`${label} removed`);
            });
        }

        // 🟢 Master listeners for range and text inputs
        if (form) {
            form.querySelectorAll("input[name='from'], input[name='to']").forEach(i => 
                i.addEventListener("blur", () => {
                    const val = (min, max) => (min && max) ? `$${min} - $${max}` : (min ? `$${min}+` : (max ? `Up to $${max}` : ""));
                    const text = val(form.querySelector("[name='from']").value, form.querySelector("[name='to']").value);
                    if (text) createTag("PRICE", text, "price", true);
                })
            );

            ['location', 'name'].forEach(name => {
                const input = form.querySelector(`[name="${name}"]`);
                if (input) input.addEventListener("blur", () => {
                    if (input.value.trim()) createTag(name.toUpperCase(), input.value.trim(), name, false);
                });
            });

            // Sync sidebar and top tags on select change
            form.querySelectorAll("select").forEach(select => {
                select.addEventListener("change", () => {
                    const baseKey = select.name.replace('[]', '');
                    const label = baseKey.replace('selected', '').toUpperCase();
                    
                    // 1. Sidebar Sync
                    const mapping = { breed: 'breed-tags', selectedColor: 'color-tags', selectedGender: 'gender-tags', rider: 'rider-tags', skill: 'skill-tags' };
                    const containerId = mapping[baseKey];
                    if (containerId && typeof syncSidebarTags === 'function') {
                        syncSidebarTags(select, containerId);
                    }

                    // 2. Top Tags Sync
                    Array.from(select.options).forEach(opt => {
                        const tagKey = `${baseKey}_${opt.value}`;
                        if (opt.selected && opt.value !== "" && !opt.disabled) {
                            let text = opt.text;
                            if (select.name === 'skill[]' && text.includes(' - ')) text = text.split(' - ')[0];
                            createTag(label, text, tagKey, false);
                        } else if (!opt.selected && opt.value !== "") {
                            const existing = tagsContainer.querySelector(`[data-key="${tagKey}"]`);
                            if (existing) existing.remove();
                        }
                    });
                });
            });
        }

        // 🟢 RESTORE tags on page load (Master Restoration)
        function restoreTagsFromFormData() {
            if (!form) return;
            const formData = new FormData(form);

            const getVal = (name) => formData.get(name)?.trim() || "";

            // 1. Basic Text Fields (Name, Location)
            ['name', 'location'].forEach(name => {
                const val = getVal(name);
                if (val && val !== "-") createTag(name.toUpperCase(), val, name, false);
            });

            // 2. Ranges (Price, Height, Age, Distance)
            // Price
            const f = getVal('from'), t = getVal('to');
            if (f || t) {
                let pVal = (f && t) ? `$${f} - $${t}` : (f ? `$${f}+` : `Up to $${t}`);
                createTag("PRICE", pVal, "price", true);
            }
            // Height
            const hMin = getVal('height_min'), hMax = getVal('height_max');
            if (hMin || hMax) {
                let hVal = (hMin && hMax) ? `${hMin} - ${hMax} HH` : (hMin ? `${hMin}+ HH` : `Up to ${hMax} HH`);
                createTag("HEIGHT", hVal, "height", true);
            }
            // Age
            const aMin = getVal('age_min'), aMax = getVal('age_max');
            if (aMin || aMax) {
                const unit = getVal('age_unit') || "Years";
                let aVal = (aMin && aMax) ? `${aMin} - ${aMax} ${unit}` : (aMin ? `${aMin}+ ${unit}` : `Up to ${aMax} ${unit}`);
                createTag("AGE", aVal, "age", true);
            }
            // Distance
            const dMin = getVal('distance_min'), dMax = getVal('distance_max');
            if (dMin || dMax) {
                const unit = getVal('hr_miles') || "Miles";
                let dVal = (dMin && dMax) ? `${dMin} - ${dMax} ${unit}` : (dMin ? `${dMin}+ ${unit}` : `Up to ${dMax} ${unit}`);
                createTag("DISTANCE", dVal, "distance", true);
            }

            // 3. Status Radios (For Sale, Auction, etc.)
            const statusFields = ['listed_horses', 'auction_horses', 'sold_horses', 'lease_horses', 'at_stud'];
            statusFields.forEach(field => {
                const val = formData.get(field);
                if (val && !val.startsWith('not-') && val !== "") {
                    createTag("STATUS", val, field, false);
                }
            });

            // 4. Multi-selects (Breed, Color, Gender, Skill, Rider)
            const multiFields = ['breed[]', 'selectedColor[]', 'selectedGender[]', 'skill[]', 'rider[]'];
            multiFields.forEach(fieldName => {
                const values = formData.getAll(fieldName).filter(v => v.trim() !== "");
                const baseName = fieldName.replace('[]', '');
                values.forEach(val => {
                    const select = form.querySelector(`select[name="${fieldName}"]`);
                    const option = Array.from(select?.options || []).find(o => o.value === val);
                    if (option) {
                        let text = option.textContent.trim();
                        if (fieldName === 'skill[]' && text.includes(' - ')) text = text.split(' - ')[0];
                        
                        const mapping = { breed: 'breed-tags', selectedColor: 'color-tags', selectedGender: 'gender-tags', rider: 'rider-tags', skill: 'skill-tags' };
                        const containerId = mapping[baseName];
                        if (containerId && typeof syncSidebarTags === 'function') {
                            syncSidebarTags(select, containerId);
                        }

                        createTag(baseName.replace('selected','').toUpperCase(), text, `${baseName}_${val}`, false);
                    }
                });
            });
        }

        // Additional Listeners for Immediate Tagging
        if (form) {
            // General function for Range updating
            const updateRangeTag = (type) => {
                const min = form.querySelector(`[name="${type}_min"]`)?.value || "";
                const max = form.querySelector(`[name="${type}_max"]`)?.value || "";
                if (min || max) {
                    let unit = "";
                    if (type === 'height') unit = "HH";
                    else if (type === 'age') unit = form.querySelector('[name="age_unit"]:checked')?.value || "Years";
                    else if (type === 'distance') unit = form.querySelector('[name="hr_miles"]:checked')?.value || "Miles";
                    
                    const text = (min && max) ? `${min} - ${max} ${unit}` : (min ? `${min}+ ${unit}` : `Up to ${max} ${unit}`);
                    createTag(type.toUpperCase(), text, type, true);
                } else {
                    const tag = tagsContainer.querySelector(`[data-key="${type}"]`);
                    if (tag) tag.remove();
                }
            };

            ['height', 'age', 'distance'].forEach(type => {
                form.querySelectorAll(`input[name^="${type}_"]`).forEach(i => i.addEventListener("blur", () => updateRangeTag(type)));
            });

            // Radios (Include/Exclude/Only)
            ['listed_horses', 'auction_horses', 'sold_horses', 'lease_horses', 'at_stud'].forEach(name => {
                form.querySelectorAll(`input[name="${name}"]`).forEach(radio => {
                    radio.addEventListener("change", () => {
                        if (radio.checked && !radio.value.startsWith('not-') && radio.value !== "") {
                            createTag("STATUS", radio.value, name, false);
                        } else {
                            const tag = tagsContainer.querySelector(`[data-key="${name}"]`);
                            if (tag) tag.remove();
                        }
                    });
                });
            });
        }

        window.clearLocation = function() {
            const locInput = document.querySelector('input[name="location"]');
            if (locInput) {
                locInput.value = "";
                const tag = tagsContainer.querySelector('[data-key="location"]');
                if (tag) tag.remove();
            }
        };

        document.addEventListener("DOMContentLoaded", () => {
            setTimeout(restoreTagsFromFormData, 400);
        });
    </script>

    <script>
        function saveSearch(btn) {
            const form = document.getElementById("mainForm");
            if (!form) return;
            const formData = new FormData(form);
            formData.append('type', 'horse');

            const originalContent = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> SAVING...';

            fetch("{{ route('save.search') }}", {
                method: "POST",
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Accept": "application/json" },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                showNotification(data.message || (data.success ? 'Search saved!' : 'Error occurred.'));
            })
            .catch(error => showNotification("An error occurred. Please try again."))
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = originalContent;
            });
        }
        
        function sortProducts(value) {
            const url = new URL(window.location.href);
            if (value) url.searchParams.set('sort', value);
            else url.searchParams.delete('sort');
            window.location.href = url.toString();
        }

        document.querySelectorAll('.thousand-separator').forEach(input => {
            input.addEventListener('input', function(e) {
                const rawValue = e.target.value.replace(/,/g, '').replace(/[^\d]/g, '');
                if (!rawValue) { e.target.value = ''; return; }
                const formattedValue = rawValue.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                e.target.value = formattedValue;
                e.target.setSelectionRange(formattedValue.length, formattedValue.length);
            });
        });
    </script>

    <script>
        function saveSearch(btn) {
            const form = document.getElementById("mainForm");
            if (!form) {
                console.error("Search form not found!");
                return;
            }

            const formData = new FormData(form);
            formData.append('type', 'horse'); // Ensure type is included

            const originalContent = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> SAVING...';

            fetch("{{ route('save.search') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message || 'Search saved successfully!');
                } else {
                    showNotification(data.message || "Something went wrong.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                showNotification("An error occurred. Please try again.");
            })
            .finally(() => {
                btn.disabled = false;
                btn.innerHTML = originalContent;
            });
        }
        
        function sortProducts(value) {
            const url = new URL(window.location.href);
            if (value) {
                url.searchParams.set('sort', value);
            } else {
                url.searchParams.delete('sort');
            }
            window.location.href = url.toString();
        }
    </script>
    <script>
        document.querySelectorAll('.thousand-separator').forEach(input => {
            input.addEventListener('input', function(e) {
                // cursor position store karna zaroori hai
                const cursorPosition = e.target.selectionStart;
                const rawValue = e.target.value.replace(/,/g, '').replace(/[^\d]/g, '');

                // agar empty hai to kuch na dikhaye
                if (!rawValue) {
                    e.target.value = '';
                    return;
                }

                // regex se thousand separator lagana
                const formattedValue = rawValue.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                e.target.value = formattedValue;

                // cursor ko end par le jao (simple fix)
                e.target.setSelectionRange(formattedValue.length, formattedValue.length);
            });
        });
    </script>
@endsection


