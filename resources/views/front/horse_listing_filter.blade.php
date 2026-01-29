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
        }

        .filter_content_box {
            width: calc(100% - 350px);
            padding-left: 20px;
        }

        .filter_side_bar {
            padding: 20px;
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
            z-index: 999;
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
            bottom: 28px;
            right: 3px;
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
            font-size: 10px;
        }

        .horse_list_card .img_box {
            height: 250px;
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
            align-items: center;
            width: 100%;
            justify-content: flex-start;
            max-width: 100%;
            margin: 0 auto;
            flex-wrap: wrap;
            gap: 15px;
        }

        .gen_card_flex .horse_list_card {
            width: 24%;
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
            padding: 15px 0px;
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
            top: -23px;
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

        ..horse_list_card.horse_list_card_new .blue_stripe h3 {
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
            z-index: 9;
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
                transform: scale(0.7);
                bottom: 18px;
                right: -42px;
            }

            .choose-btn {
                font-size: 13px;
                padding: 10px 7px;
            }

            .icon_heart {
                font-size: 20px;
                right: 14px;
            }

            .gen_card_flex {
                max-width: 1270px;
                padding-top: 10px;
                gap: 10px;
                justify-content: flex-start;
            }

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

            .gen_card_flex .horse_list_card {
                width: 240px;
            }

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
                                    <input type="text" class="distance-input form-control thousand-separator" placeholder="MIN" />
                                    <input type="text" class="distance-input form-control thousand-separator" placeholder="MAX" />
                                </div>
                                <div class="unit-label mt-3">
                                    <div class="checkbox-item justify-content-start gap-3">
                                        <label><input type="radio" class="form-check-input" name="hr_miles" /> Hours</label>
                                        <label><input type="radio" class="form-check-input" name="hr_miles" /> Miles</label>
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
                                    <div class="checkbox-header">ONLY</div>
                                    <div class="checkbox-row">
                                        <div class="checkbox-label">Horses for Sale</div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="listed_horses" @checked(request('listed_horses') == 'For Sale') value="For Sale" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="listed_horses" @checked(request('listed_horses') == 'not-for-sale') value="not-for-sale" class="form-check-input" />
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" name="listed_horses" @checked(request('listed_horses') == 'For Sale') value="" class="form-check-input" />
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
                                            <input type="radio" name="auction_horses" @checked(request('auction_horses') == 'At Auction') value="" class="form-check-input" />
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
                                            <input type="radio" name="sold_horses" @checked(request('sold_horses') == 'Sold') value="" class="form-check-input" />
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
                                            <input type="radio" name="lease_horses" @checked(request('lease_horses') == 'For Lease') value="" class="form-check-input" />
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
                                            <input type="radio" name="at_stud" @checked(request('at_stud') == 'For Stud') value="" class="form-check-input" />
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
                                    <select class="select-field form-select breed_select" name="breed" id="breedSelect">
                                        <option disabled selected>Select Breed</option>
                                        <option value="Akhal-Teke" {{ request('breed') == 'Akhal-Teke' ? 'selected' : '' }}>
                                            Akhal-Teke</option>
                                        <option value="Aegidienberger" {{ request('breed') == 'Aegidienberger' ? 'selected' : '' }}>Aegidienberger</option>
                                        <option value="AlbertaWildHorse" {{ request('breed') == 'AlbertaWildHorse' ? 'selected' : '' }}>Alberta Wild Horse</option>
                                        <option value="AlterReal" {{ request('breed') == 'AlterReal' ? 'selected' : '' }}>
                                            Alter Real</option>
                                        <option value="Altmark Coldblood" {{ request('breed') == 'Altmark Coldblood' ? 'selected' : '' }}>Altmark Coldblood</option>
                                        <option value="Altor Real" {{ request('breed') == 'Altor Real' ? 'selected' : '' }}>
                                            Altor Real</option>
                                        <option value="American Bashkir Curly" {{ request('breed') == 'American Bashkir Curly' ? 'selected' : '' }}>American Bashkir
                                            Curly</option>
                                        <option value="American Belgian Draft" {{ request('breed') == 'American Belgian Draft' ? 'selected' : '' }}>American Belgian
                                            Draft</option>
                                        <option value="American Cream Draft Horse" {{ request('breed') == 'American Cream Draft Horse' ? 'selected' : '' }}>American
                                            Cream Draft Horse</option>
                                        <option value="American Indian Horse" {{ request('breed') == 'American Indian Horse' ? 'selected' : '' }}>American Indian
                                            Horse</option>
                                        <option value="American Miniature Horse" {{ request('breed') == 'American Miniature Horse' ? 'selected' : '' }}>American
                                            Miniature Horse</option>
                                        <option value="American Saddlebred" {{ request('breed') == 'American Saddlebred' ? 'selected' : '' }}>American Saddlebred
                                        </option>
                                        <option value="American Saddlebred" {{ request('breed') == 'American Saddlebred' ? 'selected' : '' }}>American Saddlebred
                                        </option>
                                        <option value="American Shetland Pony" {{ request('breed') == 'American Shetland Pony' ? 'selected' : '' }}>American
                                            Shetland Pony</option>
                                        <option value="American Spotted" {{ request('breed') == 'American Spotted' ? 'selected' : '' }}>American Spotted</option>
                                        <option value="American Standardbred" {{ request('breed') == 'American Standardbred' ? 'selected' : '' }}>American
                                            Standardbred</option>
                                        <option value="American Walking Pony" {{ request('breed') == 'American Walking Pony' ? 'selected' : '' }}>American Walking
                                            Pony</option>
                                        <option value="Andalusian Horse" {{ request('breed') == 'Andalusian Horse' ? 'selected' : '' }}>Andalusian Horse</option>
                                        <option value="Anglo Arabian" {{ request('breed') == 'Anglo Arabian' ? 'selected' : '' }}>Anglo-Arabian</option>
                                        <option value="Appaloosa" {{ request('breed') == 'Appaloosa' ? 'selected' : '' }}>
                                            Appaloosa</option>
                                        <option value="Arabian" {{ request('breed') == 'Arabian' ? 'selected' : '' }}>Arabian
                                        </option>
                                        <option value="Arabian Horses" {{ request('breed') == 'Arabian Horses' ? 'selected' : '' }}>Arabian Cross</option>
                                        <option value="Ardennes" {{ request('breed') == 'Ardennes' ? 'selected' : '' }}>
                                            Ardennes</option>
                                        <option value="Arabian-Berber" {{ request('breed') == 'Arabian-Berber' ? 'selected' : '' }}>Arabian-Berber</option>
                                        <option value="Arabian Halfbred" {{ request('breed') == 'Arabian Halfbred' ? 'selected' : '' }}>Arabian Halfbred</option>
                                        <option value="Arabian Partbred" {{ request('breed') == 'Arabian Partbred' ? 'selected' : '' }}>Arabian Partbred</option>
                                        <option value="Araloosa" {{ request('breed') == 'Araloosa' ? 'selected' : '' }}>
                                            Araloosa</option>
                                        <option value="Arcenberg-Nordkirchen" {{ request('breed') == 'Arcenberg-Nordkirchen' ? 'selected' : '' }}>
                                            Arcenberg-Nordkirchen</option>
                                        <option value="Australian Brumby" {{ in_array('Australian Brumby', (array) request('breed', [])) ? 'selected' : '' }}>
                                            Australian Brumby</option>
                                        <option value="Australian Draught Horse" {{ request('breed') == 'Australian Draught Horse' ? 'selected' : '' }}>Australian
                                            Draught Horse</option>
                                        <option value="Australian Stock Horse" {{ request('breed') == 'Australian Stock Horse' ? 'selected' : '' }}>Australian Stock
                                            Horse</option>
                                        <option value="Austrian Warmblood" {{ request('breed') == 'Austrian Warmblood' ? 'selected' : '' }}>Austrian Warmblood
                                        </option>
                                        <option value="Auxois" {{ request('breed') == 'Auxois' ? 'selected' : '' }}>Auxois
                                        </option>
                                        <option value="Baden-Wurttemberg" {{ request('breed') == 'Baden-Wurttemberg' ? 'selected' : '' }}>Baden-Wurttemberg</option>
                                        <option value="Balearic" {{ request('breed') == 'Balearic' ? 'selected' : '' }}>
                                            Balearic</option>
                                        <option value="Balikun Horse" {{ request('breed') == 'Balikun Horse' ? 'selected' : '' }}>Balikun Horse</option>
                                        <option value="Baltic Hanoverian" {{ request('breed') == 'Baltic Hanoverian' ? 'selected' : '' }}>Baltic Hanoverian</option>
                                        <option value="Bardigiano" {{ request('breed') == 'Bardigiano' ? 'selected' : '' }}>
                                            Bardigiano</option>
                                        <option value="Bashkir Horse" {{ request('breed') == 'Bashkir Horse' ? 'selected' : '' }}>Bashkir Horse</option>
                                        <option value="Bavarian Warmblood" {{ request('breed') == 'Bavarian Warmblood' ? 'selected' : '' }}>Bavarian Warmblood
                                        </option>
                                        <option value="Belgian Cold Blood" {{ request('breed') == 'Belgian Cold Blood' ? 'selected' : '' }}>Belgian Cold Blood
                                        </option>
                                        <option value="Belgian Draft" {{ request('breed') == 'Belgian Draft' ? 'selected' : '' }}>Belgian Draft</option>
                                        <option value="Belgian Warmblood" {{ request('breed') == 'Belgian Warmblood' ? 'selected' : '' }}>Belgian Warmblood</option>
                                        <option value="Black Forest Horse" {{ request('breed') == 'Black Forest Horse' ? 'selected' : '' }}>Black Forest Horse
                                        </option>
                                        <option value="Boerperd" {{ request('breed') == 'Boerperd' ? 'selected' : '' }}>
                                            Boerperd</option>
                                        <option value="Boulonnais" {{ request('breed') == 'Boulonnais' ? 'selected' : '' }}>
                                            Boulonnais</option>
                                        <option value="Brabant Horse" {{ request('breed') == 'Brabant Horse' ? 'selected' : '' }}>Brabant Horse</option>
                                        <option value="Brandenburger Warmblood" {{ request('breed') == 'Brandenburger Warmblood' ? 'selected' : '' }}>Brandenburger
                                            Warmblood</option>
                                        <option value="Breton" {{ request('breed') == 'Breton' ? 'selected' : '' }}>Breton
                                        </option>
                                        <option value="British Riding Pony" {{ request('breed') == 'British Riding Pony' ? 'selected' : '' }}>British Riding Pony
                                        </option>
                                        <option value="Budyonny" {{ request('breed') == 'Budyonny' ? 'selected' : '' }}>
                                            Budyonny</option>
                                        <option value="Burguete" {{ request('breed') == 'Burguete' ? 'selected' : '' }}>
                                            Burguete</option>
                                        <option value="Byelorussian Harness Horse" {{ request('breed') == 'Byelorussian Harness Horse' ? 'selected' : '' }}>Byelorussian
                                            Harness Horse</option>
                                        <option value="Calabrese" {{ request('breed') == 'Calabrese' ? 'selected' : '' }}>
                                            Calabrese</option>
                                        <option value="Camargue Horse" {{ request('breed') == 'Camargue Horse' ? 'selected' : '' }}>Camargue Horse</option>
                                        <option value="Canadian Horse" {{ request('breed') == 'Canadian Horse' ? 'selected' : '' }}>Canadian Horse</option>
                                        <option value="Canadian Pacer" {{ request('breed') == 'Canadian Pacer' ? 'selected' : '' }}>Canadian Pacer</option>
                                        <option value="Canadian Rustic Pony" {{ request('breed') == 'Canadian Rustic Pony' ? 'selected' : '' }}>Canadian Rustic Pony
                                        </option>
                                        <option value="Carolina Marsh Tacky" {{ request('breed') == 'Carolina Marsh Tacky' ? 'selected' : '' }}>Carolina Marsh Tacky
                                        </option>
                                        <option value="Cerbat Mustang" {{ request('breed') == 'Cerbat Mustang' ? 'selected' : '' }}>Cerbat Mustang</option>
                                        <option value="Chincoteague Pony" {{ request('breed') == 'Chincoteague Pony' ? 'selected' : '' }}>Chincoteague Pony</option>
                                        <option value="Chickasaw Horse" {{ request('breed') == 'Chickasaw Horse' ? 'selected' : '' }}>Chickasaw Horse</option>
                                        <option value="Choctaw Pony" {{ request('breed') == 'Choctaw Pony' ? 'selected' : '' }}>Choctaw Pony</option>
                                        <option value="Classic Pony" {{ request('breed') == 'Classic Pony' ? 'selected' : '' }}>Classic Pony</option>
                                        <option value="Cleveland-Bay" {{ request('breed') == 'Cleveland-Bay' ? 'selected' : '' }}>Cleveland-Bay</option>
                                        <option value="Clydesdale" {{ request('breed') == 'Clydesdale' ? 'selected' : '' }}>
                                            Clydesdale</option>
                                        <option value="Clydesdale Cross" {{ request('breed') == 'Clydesdale Cross' ? 'selected' : '' }}>Clydesdale Cross</option>
                                        <option value="Cumberland Island Horse" {{ request('breed') == 'Cumberland Island Horse' ? 'selected' : '' }}>Cumberland
                                            Island Horse</option>
                                        <option value="Cob Horse" {{ request('breed') == 'Cob Horse' ? 'selected' : '' }}>Cob
                                            Horse</option>
                                        <option value="Comtois" {{ request('breed') == 'Comtois' ? 'selected' : '' }}>Comtois
                                        </option>
                                        <option value="Connemara Pony" {{ request('breed') == 'Connemara Pony' ? 'selected' : '' }}>Connemara Pony</option>
                                        <option value="Criollo Horse" {{ request('breed') == 'Criollo Horse' ? 'selected' : '' }}>Criollo Horse</option>
                                        <option value="Curly Horses" {{ request('breed') == 'Curly Horses' ? 'selected' : '' }}>Curly Horses</option>
                                        <option value="Dales Pony" {{ request('breed') == 'Dales Pony' ? 'selected' : '' }}>
                                            Dales Pony</option>
                                        <option value="Dartmoor Pony" {{ request('breed') == 'Dartmoor Pony' ? 'selected' : '' }}>Dartmoor Pony</option>
                                        <option value="Draft Cross" {{ request('breed') == 'Draft Cross' ? 'selected' : '' }}>
                                            Draft Cross</option>
                                        <option value="Dutch Warmblood" {{ request('breed') == 'Dutch Warmblood' ? 'selected' : '' }}>Dutch Warmblood</option>
                                        <option value="Fell Pony" {{ request('breed') == 'Fell Pony' ? 'selected' : '' }}>Fell
                                            Pony</option>
                                        <option value="Finnhorse" {{ request('breed') == 'Finnhorse' ? 'selected' : '' }}>
                                            Finnhorse</option>
                                        <option value="Friesian" {{ request('breed') == 'Friesian' ? 'selected' : '' }}>
                                            Friesian</option>
                                        <option value="Friesian Cross" {{ request('breed') == 'Friesian Cross' ? 'selected' : '' }}>Friesian Cross</option>
                                        <option value="Fjord" {{ request('breed') == 'Fjord' ? 'selected' : '' }}>Fjord
                                        </option>
                                        <option value="Fjord Cross" {{ request('breed') == 'Fjord Cross' ? 'selected' : '' }}>
                                            Fjord Cross</option>
                                        <option value="Gelderland" {{ request('breed') == 'Gelderland' ? 'selected' : '' }}>
                                            Gelderland</option>
                                        <option value="Gypsy Vanner" {{ request('breed') == 'Gypsy Vanner' ? 'selected' : '' }}>Gypsy Vanner</option>
                                        <option value="Gypsy Cross" {{ request('breed') == 'Gypsy Cross' ? 'selected' : '' }}>
                                            Gypsy Cross</option>
                                        <option value="Hackney" {{ request('breed') == 'Hackney' ? 'selected' : '' }}>Hackney
                                        </option>
                                        <option value="Hanoverian" {{ request('breed') == 'Hanoverian' ? 'selected' : '' }}>
                                            Hanoverian</option>
                                        <option value="Haflinger" {{ request('breed') == 'Haflinger' ? 'selected' : '' }}>
                                            Haflinger</option>
                                        <option value="Holsteiner" {{ request('breed') == 'Holsteiner' ? 'selected' : '' }}>
                                            Holsteiner</option>
                                        <option value="Icelandic Horse" {{ request('breed') == 'Icelandic Horse' ? 'selected' : '' }}>Icelandic Horse</option>
                                        <option value="Irish Draft Cross" {{ request('breed') == 'Irish Draft Cross' ? 'selected' : '' }}>Irish Draft Cross</option>
                                        <option value="Irish Draught" {{ request('breed') == 'Irish Draught' ? 'selected' : '' }}>Irish Draught</option>
                                        <option value="Kinsky Horse" {{ request('breed') == 'Kinsky Horse' ? 'selected' : '' }}>Kinsky Horse</option>
                                        <option value="Knabstrupper" {{ request('breed') == 'Knabstrupper' ? 'selected' : '' }}>Knabstrupper</option>
                                        <option value="Lippizan" {{ request('breed') == 'Lippizan' ? 'selected' : '' }}>
                                            Lippizan</option>
                                        <option value="Lusitano" {{ request('breed') == 'Lusitano' ? 'selected' : '' }}>
                                            Lusitano</option>
                                        <option value="Marwari Horse" {{ request('breed') == 'Marwari Horse' ? 'selected' : '' }}>Marwari Horse</option>
                                        <option value="Morgan" {{ request('breed') == 'Morgan' ? 'selected' : '' }}>Morgan
                                        </option>
                                        <option value="Morgan Cross" {{ request('breed') == 'Morgan Cross' ? 'selected' : '' }}>Morgan Cross</option>
                                        <option value="Mustang" {{ request('breed') == 'Mustang' ? 'selected' : '' }}>Mustang
                                        </option>
                                        <option value="Paso Fino" {{ request('breed') == 'Paso Fino' ? 'selected' : '' }}>Paso
                                            Fino</option>
                                        <option value="Percheron" {{ request('breed') == 'Percheron' ? 'selected' : '' }}>
                                            Percheron</option>
                                        <option value="Percheron Cross" {{ request('breed') == 'Percheron Cross' ? 'selected' : '' }}>Percheron Cross</option>
                                        <option value="Pinto" {{ request('breed') == 'Pinto' ? 'selected' : '' }}>Pinto
                                        </option>
                                        <option value="Polish Warmblood" {{ request('breed') == 'Polish Warmblood' ? 'selected' : '' }}>Polish Warmblood</option>
                                        <option value="Quarter Horse" {{ request('breed') == 'Quarter Horse' ? 'selected' : '' }}>Quarter Horse</option>
                                        <option value="Quarter Horse Cross" {{ request('breed') == 'Quarter Horse Cross' ? 'selected' : '' }}>Quarter Horse Cross
                                        </option>
                                        <option value="Rocky Mountain Horse" {{ request('breed') == 'Rocky Mountain Horse' ? 'selected' : '' }}>Rocky Mountain
                                            Horse</option>
                                        <option value="Shire" {{ request('breed') == 'Shire' ? 'selected' : '' }}>Shire
                                        </option>
                                        <option value="Shire Cross" {{ request('breed') == 'Shire Cross' ? 'selected' : '' }}>
                                            Shire Cross</option>
                                        <option value="Spotted Draft" {{ request('breed') == 'Spotted Draft' ? 'selected' : '' }}>Spotted Draft</option>
                                        <option value="Spotted Draft Cross" {{ request('breed') == 'Spotted Draft Cross' ? 'selected' : '' }}>Spotted Draft Cross
                                        </option>
                                        <option value="Tennessee Walking Horse" {{ request('breed') == 'Tennessee Walking Horse' ? 'selected' : '' }}>Tennessee
                                            Walking Horse</option>
                                        <option value="Thoroughbred" {{ request('breed') == 'Thoroughbred' ? 'selected' : '' }}>Thoroughbred</option>
                                        <option value="Thoroughbred Cross" {{ request('breed') == 'Thoroughbred Cross' ? 'selected' : '' }}>Thoroughbred Cross
                                        </option>
                                        <option value="Trakehner" {{ request('breed') == 'Trakehner' ? 'selected' : '' }}>
                                            Trakehner</option>
                                        <option value="Welsh" {{ request('breed') == 'Welsh' ? 'selected' : '' }}>Welsh
                                        </option>
                                        <option value="Welsh Pony" {{ request('breed') == 'Welsh Pony' ? 'selected' : '' }}>
                                            Welsh Pony</option>
                                        <option value="Westphalian" {{ request('breed') == 'Westphalian' ? 'selected' : '' }}>
                                            Westphalian</option>
                                        <option value="Welsh Cross" {{ request('breed') == 'Welsh Cross' ? 'selected' : '' }}>
                                            Welsh Cross</option>
                                        <option value="Warmblood" {{ request('breed') == 'Warmblood' ? 'selected' : '' }}>
                                            Warmblood</option>
                                        <option value="Warmblood Cross" {{ request('breed') == 'Warmblood Cross' ? 'selected' : '' }}>Warmblood Cross</option>
                                        <option value="Zweibrücker Horse" {{ request('breed') == 'Zweibrücker Horse' ? 'selected' : '' }}>Zweibrücker Horse
                                        </option>
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
                                    <select class="select-field form-select color_select" name="selectedColor">
                                        <option value="" @selected(true) @disabled(true)>Select Color</option>
                                        <option value="Appaloosa" {{ request('selectedColor') == 'Appaloosa' ? 'selected' : '' }}>Appaloosa</option>
                                        <option value="Bay" {{ request('selectedColor') == 'Bay' ? 'selected' : '' }}>Bay
                                        </option>
                                        <option value="Bay Dun" {{ request('selectedColor') == 'Bay Dun' ? 'selected' : '' }}>
                                            Bay Dun</option>
                                        <option value="Bay Dun Roan" {{ request('selectedColor') == 'Bay Dun Roan' ? 'selected' : '' }}>Bay Dun Roan</option>
                                        <option value="Bay Roan" {{ request('selectedColor') == 'Bay Roan' ? 'selected' : '' }}>Bay Roan</option>
                                        <option value="Black" {{ request('selectedColor') == 'Black' ? 'selected' : '' }}>
                                            Black</option>
                                        <option value="Black Bay" {{ request('selectedColor') == 'Black Bay' ? 'selected' : '' }}>Black Bay</option>
                                        <option value="Blue Roan" {{ request('selectedColor') == 'Blue Roan' ? 'selected' : '' }}>Blue Roan</option>
                                        <option value="Brindle" {{ request('selectedColor') == 'Brindle' ? 'selected' : '' }}>
                                            Brindle</option>
                                        <option value="Brown" {{ request('selectedColor') == 'Brown' ? 'selected' : '' }}>
                                            Brown</option>
                                        <option value="Buckskin" {{ request('selectedColor') == 'Buckskin' ? 'selected' : '' }}>Buckskin</option>
                                        <option value="Buckskin Roan" {{ request('selectedColor') == 'Buckskin Roan' ? 'selected' : '' }}>Buckskin Roan</option>
                                        <option value="Champagne" {{ request('selectedColor') == 'Champagne' ? 'selected' : '' }}>Champagne</option>
                                        <option value="Chestnut" {{ request('selectedColor') == 'Chestnut' ? 'selected' : '' }}>Chestnut</option>
                                        <option value="Chocolate" {{ request('selectedColor') == 'Chocolate' ? 'selected' : '' }}>Chocolate</option>
                                        <option value="Chocolate Flaxen" {{ request('selectedColor') == 'Chocolate Flaxen' ? 'selected' : '' }}>Chocolate Flaxen
                                        </option>
                                        <option value="Cream" {{ request('selectedColor') == 'Cream' ? 'selected' : '' }}>
                                            Cream</option>
                                        <option value="Cremello" {{ request('selectedColor') == 'Cremello' ? 'selected' : '' }}>Cremello</option>
                                        <option value="Cremello Dun" {{ request('selectedColor') == 'Cremello Dun' ? 'selected' : '' }}>Cremello Dun</option>
                                        <option value="Dapple Grey" {{ request('selectedColor') == 'Dapple Grey' ? 'selected' : '' }}>Dapple Grey</option>
                                        <option value="Dun" {{ request('selectedColor') == 'Dun' ? 'selected' : '' }}>Dun
                                        </option>
                                        <option value="Dunalino" {{ request('selectedColor') == 'Dunalino' ? 'selected' : '' }}>Dunalino</option>
                                        <option value="Dunskin" {{ request('selectedColor') == 'Dunskin' ? 'selected' : '' }}>
                                            Dunskin</option>
                                        <option value="Flaxen" {{ request('selectedColor') == 'Flaxen' ? 'selected' : '' }}>
                                            Flaxen</option>
                                        <option value="Flea-bitten Gray" {{ request('selectedColor') == 'Flea-bitten Gray' ? 'selected' : '' }}>Flea-bitten Gray
                                        </option>
                                        <option value="Frame Overo" {{ request('selectedColor') == 'Frame Overo' ? 'selected' : '' }}>Frame Overo</option>
                                        <option value="Grey" {{ request('selectedColor') == 'Grey' ? 'selected' : '' }}>Grey
                                        </option>
                                        <option value="Grullo" {{ request('selectedColor') == 'Grullo' ? 'selected' : '' }}>
                                            Grullo</option>
                                        <option value="Isabella" {{ request('selectedColor') == 'Isabella' ? 'selected' : '' }}>Isabella</option>
                                        <option value="Lerino Dun" {{ request('selectedColor') == 'Lerino Dun' ? 'selected' : '' }}>Lerino Dun</option>
                                        <option value="Liver Chestnut" {{ request('selectedColor') == 'Liver Chestnut' ? 'selected' : '' }}>Liver Chestnut</option>
                                        <option value="Other" {{ request('selectedColor') == 'Other' ? 'selected' : '' }}>
                                            Other</option>
                                        <option value="Overo" {{ request('selectedColor') == 'Overo' ? 'selected' : '' }}>
                                            Overo</option>
                                        <option value="Paintaloosa" {{ request('selectedColor') == 'Paintaloosa' ? 'selected' : '' }}>Paintaloosa</option>
                                        <option value="Palomino" {{ request('selectedColor') == 'Palomino' ? 'selected' : '' }}>Palomino</option>
                                        <option value="Palomino Roan" {{ request('selectedColor') == 'Palomino Roan' ? 'selected' : '' }}>Palomino Roan</option>
                                        <option value="Pearl" {{ request('selectedColor') == 'Pearl' ? 'selected' : '' }}>
                                            Pearl</option>
                                        <option value="Perlino" {{ request('selectedColor') == 'Perlino' ? 'selected' : '' }}>
                                            Perlino</option>
                                        <option value="Piebald" {{ request('selectedColor') == 'Piebald' ? 'selected' : '' }}>
                                            Piebald</option>
                                        <option value="Pinto" {{ request('selectedColor') == 'Pinto' ? 'selected' : '' }}>
                                            Pinto</option>
                                        <option value="Red Chocolate" {{ request('selectedColor') == 'Red Chocolate' ? 'selected' : '' }}>Red Chocolate</option>
                                        <option value="Red Dun" {{ request('selectedColor') == 'Red Dun' ? 'selected' : '' }}>
                                            Red Dun</option>
                                        <option value="Red Dun Roan" {{ request('selectedColor') == 'Red Dun Roan' ? 'selected' : '' }}>Red Dun Roan</option>
                                        <option value="Red Roan" {{ request('selectedColor') == 'Red Roan' ? 'selected' : '' }}>Red Roan</option>
                                        <option value="Roan" {{ request('selectedColor') == 'Roan' ? 'selected' : '' }}>Roan
                                        </option>
                                        <option value="Sabino" {{ request('selectedColor') == 'Sabino' ? 'selected' : '' }}>
                                            Sabino</option>
                                        <option value="Seal Brown" {{ request('selectedColor') == 'Seal Brown' ? 'selected' : '' }}>Seal Brown</option>
                                        <option value="Silver" {{ request('selectedColor') == 'Silver' ? 'selected' : '' }}>
                                            Silver</option>
                                        <option value="Silver Bay" {{ request('selectedColor') == 'Silver Bay' ? 'selected' : '' }}>Silver Bay</option>
                                        <option value="Silver Black" {{ request('selectedColor') == 'Silver Black' ? 'selected' : '' }}>Silver Black</option>
                                        <option value="Silver Black Roan" {{ request('selectedColor') == 'Silver Black Roan' ? 'selected' : '' }}>Silver Black Roan
                                        </option>
                                        <option value="Silver Buckskin" {{ request('selectedColor') == 'Silver Buckskin' ? 'selected' : '' }}>Silver Buckskin
                                        </option>
                                        <option value="Silver Dapple" {{ request('selectedColor') == 'Silver Dapple' ? 'selected' : '' }}>Silver Dapple</option>
                                        <option value="Silver Perlino" {{ request('selectedColor') == 'Silver Perlino' ? 'selected' : '' }}>Silver Perlino</option>
                                        <option value="Silver Smokey Black" {{ request('selectedColor') == 'Silver Smokey Black' ? 'selected' : '' }}>Silver
                                            Smokey Black</option>
                                        <option value="Silver Smokey Cream" {{ request('selectedColor') == 'Silver Smokey Cream' ? 'selected' : '' }}>Silver
                                            Smokey Cream</option>
                                        <option value="Skewbald" {{ request('selectedColor') == 'Skewbald' ? 'selected' : '' }}>Skewbald</option>
                                        <option value="Smokey Black" {{ request('selectedColor') == 'Smokey Black' ? 'selected' : '' }}>Smokey Black</option>
                                        <option value="Smokey Cream" {{ request('selectedColor') == 'Smokey Cream' ? 'selected' : '' }}>Smokey Cream</option>
                                        <option value="Smokey Cream Dun" {{ request('selectedColor') == 'Smokey Cream Dun' ? 'selected' : '' }}>Smokey Cream Dun
                                        </option>
                                        <option value="Smokey Grullo" {{ request('selectedColor') == 'Smokey Grullo' ? 'selected' : '' }}>Smokey Grullo</option>
                                        <option value="Sooty Buckskin" {{ request('selectedColor') == 'Sooty Buckskin' ? 'selected' : '' }}>Sooty Buckskin</option>
                                        <option value="Sorrel" {{ request('selectedColor') == 'Sorrel' ? 'selected' : '' }}>
                                            Sorrel</option>
                                        <option value="Splash Overo" {{ request('selectedColor') == 'Splash Overo' ? 'selected' : '' }}>Splash Overo</option>
                                        <option value="Splash White" {{ request('selectedColor') == 'Splash White' ? 'selected' : '' }}>Splash White</option>
                                        <option value="Tobiano" {{ request('selectedColor') == 'Tobiano' ? 'selected' : '' }}>
                                            Tobiano</option>
                                        <option value="Tovero" {{ request('selectedColor') == 'Tovero' ? 'selected' : '' }}>
                                            Tovero</option>
                                        <option value="Unknown" {{ request('selectedColor') == 'Unknown' ? 'selected' : '' }}>
                                            Unknown</option>
                                        <option value="White" {{ request('selectedColor') == 'White' ? 'selected' : '' }}>
                                            White</option>
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
                                    <select class="select-field form-select gender_select" name="selectedGender">
                                        <option @disabled(true) selected>Select Genders</option>
                                        <option value="Colt" {{ request('selectedGender') == 'Colt' ? 'selected' : '' }}>Colt
                                        </option>
                                        <option value="Filly" {{ request('selectedGender') == 'Filly' ? 'selected' : '' }}>
                                            Filly</option>
                                        <option value="Gelding" {{ request('selectedGender') == 'Gelding' ? 'selected' : '' }}>Gelding</option>
                                        <option value="Mare" {{ request('selectedGender') == 'Mare' ? 'selected' : '' }}>Mare
                                        </option>
                                        <option value="Stallion" {{ request('selectedGender') == 'Stallion' ? 'selected' : '' }}>Stallion</option>
                                        <option value="Unborn Foal" {{ request('selectedGender') == 'Unborn Foal' ? 'selected' : '' }}>Unborn Foal</option>
                                        <option value="Jack" {{ request('selectedGender') == 'Jack' ? 'selected' : '' }}>Jack
                                        </option>
                                        <option value="Jenny" {{ request('selectedGender') == 'Jenny' ? 'selected' : '' }}>
                                            Jenny</option>
                                        <option value="John" {{ request('selectedGender') == 'John' ? 'selected' : '' }}>John
                                        </option>
                                        <option value="Molly" {{ request('selectedGender') == 'Molly' ? 'selected' : '' }}>
                                            Molly</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Skills/Disciplines Section -->
                            <div class="form-section">
                                <div class="section-title">Skills/Disciplines</div>
                                <div class="skills-tags d-none" id="skills-tags">
                                    <div class="skill-tag">
                                        Jumping 3'6"
                                        <button class="remove" onclick="removeTag(this)">×</button>
                                    </div>
                                    <div class="skill-tag">
                                        Trail Riding
                                        <button class="remove" onclick="removeTag(this)">×</button>
                                    </div>
                                    <div class="skill-tag">
                                        Hunter Horse
                                        <button class="remove" onclick="removeTag(this)">×</button>
                                    </div>
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select skill_select" name="rider">
                                        <option selected disabled>Select Skills/Disciplines</option>
                                        <option value="Agility" {{ request('rider') == 'Agility' ? 'selected' : '' }}>Agility
                                        </option>
                                        <option value="All Around" {{ request('rider') == 'All Around' ? 'selected' : '' }}>
                                            All Around</option>
                                        <option value="All-Around Show" {{ request('rider') == 'All-Around Show' ? 'selected' : '' }}>All-Around Show</option>
                                        <option value="Beginner" {{ request('rider') == 'Beginner' ? 'selected' : '' }}>
                                            Beginner</option>
                                        <option value="Barrel Racing" {{ request('rider') == 'Barrel Racing' ? 'selected' : '' }}>Barrel Racing</option>
                                        <option value="Barrels* Poles *Gymkhana" {{ request('rider') == 'Barrels* Poles *Gymkhana' ? 'selected' : '' }}>Barrels* Poles
                                            *Gymkhana</option>
                                        <option value="Breakaway Roping" {{ request('rider') == 'Breakaway Roping' ? 'selected' : '' }}>Breakaway Roping</option>
                                        <option value="Brood mare" {{ request('rider') == 'Brood mare' ? 'selected' : '' }}>
                                            Brood mare</option>
                                        <option value="Cutting Prospect" {{ request('rider') == 'Cutting Prospect' ? 'selected' : '' }}>Cutting Prospect</option>
                                        <option value="Cutting" {{ request('rider') == 'Cutting' ? 'selected' : '' }}>Cutting
                                        </option>
                                        <option value="Calf Roping" {{ request('rider') == 'Calf Roping' ? 'selected' : '' }}>
                                            Calf Roping</option>
                                        <option value="Clicker Training" {{ request('rider') == 'Clicker Training' ? 'selected' : '' }}>Clicker Training</option>
                                        <option value="Companion Only" {{ request('rider') == 'Companion Only' ? 'selected' : '' }}>Companion Only</option>
                                        <option value="Competitive Trail Riding" {{ request('rider') == 'Competitive Trail Riding' ? 'selected' : '' }}>Competitive
                                            Trail Riding</option>
                                        <option value="Country English Pleasure" {{ request('rider') == 'Country English Pleasure' ? 'selected' : '' }}>Country
                                            English Pleasure</option>
                                        <option value="Cowboy Dressage" {{ request('rider') == 'Cowboy Dressage' ? 'selected' : '' }}>Cowboy Dressage</option>
                                        <option value="Cowboy Mounted Shooting" {{ request('rider') == 'Cowboy Mounted Shooting' ? 'selected' : '' }}>Cowboy Mounted
                                            Shooting</option>
                                        <option value="Cowboy Racing" {{ request('rider') == 'Cowboy Racing' ? 'selected' : '' }}>Cowboy Racing</option>
                                        <option value="Cow horse" {{ request('rider') == 'Cow horse' ? 'selected' : '' }}>Cow
                                            horse</option>
                                        <option value="Cross-Country" {{ request('rider') == 'Cross-Country' ? 'selected' : '' }}>Cross-Country</option>
                                        <option value="Dressage" {{ request('rider') == 'Dressage' ? 'selected' : '' }}>
                                            Dressage</option>
                                        <option value="Drill Team" {{ request('rider') == 'Drill Team' ? 'selected' : '' }}>
                                            Drill Team</option>
                                        <option value="Driving" {{ request('rider') == 'Driving' ? 'selected' : '' }}>Driving
                                        </option>
                                        <option value="Endurance Riding" {{ request('rider') == 'Endurance Riding' ? 'selected' : '' }}>Endurance Riding</option>
                                        <option value="English" {{ request('rider') == 'English' ? 'selected' : '' }}>English
                                        </option>
                                        <option value="English Pleasure" {{ request('rider') == 'English Pleasure' ? 'selected' : '' }}>English Pleasure</option>
                                        <option value="Equitation" {{ request('rider') == 'Equitation' ? 'selected' : '' }}>
                                            Equitation</option>
                                        <option value="Eventing" {{ request('rider') == 'Eventing' ? 'selected' : '' }}>
                                            Eventing</option>
                                        <option value="Field Trial" {{ request('rider') == 'Field Trial' ? 'selected' : '' }}>
                                            Field Trial</option>
                                        <option value="Foxhunter" {{ request('rider') == 'Foxhunter' ? 'selected' : '' }}>
                                            Foxhunter</option>
                                        <option value="Gun - Safe Hunting" {{ request('rider') == 'Gun - Safe Hunting' ? 'selected' : '' }}>Gun - Safe Hunting
                                        </option>
                                        <option value="Halter" {{ request('rider') == 'Halter' ? 'selected' : '' }}>Halter
                                        </option>
                                        <option value="Harness" {{ request('rider') == 'Harness' ? 'selected' : '' }}>Harness
                                        </option>
                                        <option value="Harness Racing" {{ request('rider') == 'Harness Racing' ? 'selected' : '' }}>Harness Racing</option>
                                        <option value="Horsemanship" {{ request('rider') == 'Horsemanship' ? 'selected' : '' }}>Horsemanship</option>
                                        <option value="Hunt Seat Equitation" {{ request('rider') == 'Hunt Seat Equitation' ? 'selected' : '' }}>Hunt Seat
                                            Equitation</option>
                                        <option value="Hunter" {{ request('rider') == 'Hunter' ? 'selected' : '' }}>Hunter
                                        </option>
                                        <option value="Hunter Pleasure" {{ request('rider') == 'Hunter Pleasure' ? 'selected' : '' }}>Hunter Pleasure</option>
                                        <option value="Hunter Under Saddle" {{ request('rider') == 'Hunter Under Saddle' ? 'selected' : '' }}>Hunter Under Saddle
                                        </option>
                                        <option value="Jumping" {{ request('rider') == 'Jumping' ? 'selected' : '' }}>Jumping
                                        </option>
                                        <option value="Lesson Horse" {{ request('rider') == 'Lesson Horse' ? 'selected' : '' }}>Lesson Horse</option>
                                        <option value="Liberty Training" {{ request('rider') == 'Liberty Training' ? 'selected' : '' }}>Liberty Training</option>
                                        <option value="Light Riding" {{ request('rider') == 'Light Riding' ? 'selected' : '' }}>Light Riding</option>
                                        <option value="Longe Line" {{ request('rider') == 'Longe Line' ? 'selected' : '' }}>
                                            Longe Line</option>
                                        <option value="Mountain Trail" {{ request('rider') == 'Mountain Trail' ? 'selected' : '' }}>Mountain Trail</option>
                                        <option value="Mounted Games" {{ request('rider') == 'Mounted Games' ? 'selected' : '' }}>Mounted Games</option>
                                        <option value="Mounted Police" {{ request('rider') == 'Mounted Police' ? 'selected' : '' }}>Mounted Police</option>
                                        <option value="Native Costume" {{ request('rider') == 'Native Costume' ? 'selected' : '' }}>Native Costume</option>
                                        <option value="Natural Horsemanship Training" {{ request('rider') == 'Natural Horsemanship Training' ? 'selected' : '' }}>Natural
                                            Horsemanship Training</option>
                                        <option value="Nurse Mare" {{ request('rider') == 'Nurse Mare' ? 'selected' : '' }}>
                                            Nurse Mare</option>
                                        <option value="Pacing Gait" {{ request('rider') == 'Pacing Gait' ? 'selected' : '' }}>
                                            Pacing Gait</option>
                                        <option value="Pack" {{ request('rider') == 'Pack' ? 'selected' : '' }}>Pack</option>
                                        <option value="Parade" {{ request('rider') == 'Parade' ? 'selected' : '' }}>Parade
                                        </option>
                                        <option value="Performance" {{ request('rider') == 'Performance' ? 'selected' : '' }}>
                                            Performance</option>
                                        <option value="Play day" {{ request('rider') == 'Play day' ? 'selected' : '' }}>Play
                                            day</option>
                                        <option value="Pleasure Driving" {{ request('rider') == 'Pleasure Driving' ? 'selected' : '' }}>Pleasure Driving</option>
                                        <option value="Pole Bending" {{ request('rider') == 'Pole Bending' ? 'selected' : '' }}>Pole Bending</option>
                                        <option value="Polo" {{ request('rider') == 'Polo' ? 'selected' : '' }}>Polo</option>
                                        <option value="Pony Club" {{ request('rider') == 'Pony Club' ? 'selected' : '' }}>Pony
                                            Club</option>
                                        <option value="Project" {{ request('rider') == 'Project' ? 'selected' : '' }}>Project
                                        </option>
                                        <option value="Racing" {{ request('rider') == 'Racing' ? 'selected' : '' }}>Racing
                                        </option>
                                        <option value="Retired Race Horse" {{ request('rider') == 'Retired Race Horse' ? 'selected' : '' }}>Retired Race Horse
                                        </option>
                                        <option value="Racking Gait" {{ request('rider') == 'Racking Gait' ? 'selected' : '' }}>Racking Gait</option>
                                        <option value="Ranch Conformation Class" {{ request('rider') == 'Ranch Conformation Class' ? 'selected' : '' }}>Ranch
                                            Conformation Class</option>
                                        <option value="Ranch Rail Class" {{ request('rider') == 'Ranch Rail Class' ? 'selected' : '' }}>Ranch Rail Class</option>
                                        <option value="Ranch Riding - Ranch Pleasure" {{ request('rider') == 'Ranch Riding - Ranch Pleasure' ? 'selected' : '' }}>Ranch
                                            Riding - Ranch Pleasure</option>
                                        <option value="Ranch Sorting" {{ request('rider') == 'Ranch Sorting' ? 'selected' : '' }}>Ranch Sorting</option>
                                        <option value="Ranch Trail Class" {{ request('rider') == 'Ranch Trail Class' ? 'selected' : '' }}>Ranch Trail Class
                                        </option>
                                        <option value="Ranch Versatility" {{ request('rider') == 'Ranch Versatility' ? 'selected' : '' }}>Ranch Versatility
                                        </option>
                                        <option value="Ranch Work" {{ request('rider') == 'Ranch Work' ? 'selected' : '' }}>
                                            Ranch Work</option>
                                        <option value="Reining" {{ request('rider') == 'Reining' ? 'selected' : '' }}>Reining
                                        </option>
                                        <option value="Reining - Cowhorse - Cutting" {{ request('rider') == 'Reining - Cowhorse - Cutting' ? 'selected' : '' }}>Reining -
                                            Cowhorse - Cutting</option>
                                        <option value="Rodeo" {{ request('rider') == 'Rodeo' ? 'selected' : '' }}>Rodeo
                                        </option>
                                        <option value="Rodeo Bronc" {{ request('rider') == 'Rodeo Bronc' ? 'selected' : '' }}>
                                            Rodeo Bronc</option>
                                        <option value="Roping" {{ request('rider') == 'Roping' ? 'selected' : '' }}>Roping
                                        </option>
                                        <option value="Saddle Seat" {{ request('rider') == 'Saddle Seat' ? 'selected' : '' }}>
                                            Saddle Seat</option>
                                        <option value="School" {{ request('rider') == 'School' ? 'selected' : '' }}>School
                                        </option>
                                        <option value="Schoolmaster" {{ request('rider') == 'Schoolmaster' ? 'selected' : '' }}>Schoolmaster</option>
                                        <option value="Show Experience" {{ request('rider') == 'Show Experience' ? 'selected' : '' }}>Show Experience</option>
                                        <option value="Show Hack" {{ request('rider') == 'Show Hack' ? 'selected' : '' }}>Show
                                            Hack</option>
                                        <option value="Show Winner" {{ request('rider') == 'Show Winner' ? 'selected' : '' }}>
                                            Show Winner</option>
                                        <option value="Showmanship Halter" {{ request('rider') == 'Showmanship Halter' ? 'selected' : '' }}>Showmanship Halter
                                        </option>
                                        <option value="Sidesaddle" {{ request('rider') == 'Sidesaddle' ? 'selected' : '' }}>
                                            Sidesaddle</option>
                                        <option value="Stallion - Stud - Breeding" {{ request('rider') == 'Stallion - Stud - Breeding' ? 'selected' : '' }}>Stallion -
                                            Stud - Breeding</option>
                                        <option value="Started Under Saddle" {{ request('rider') == 'Started Under Saddle' ? 'selected' : '' }}>Started Under
                                            Saddle</option>
                                        <option value="Steer Roping" {{ request('rider') == 'Steer Roping' ? 'selected' : '' }}>Steer Roping</option>
                                        <option value="Steer Wrestling" {{ request('rider') == 'Steer Wrestling' ? 'selected' : '' }}>Steer Wrestling</option>
                                        <option value="Stock" {{ request('rider') == 'Stock' ? 'selected' : '' }}>Stock
                                        </option>
                                        <option value="Team Driving" {{ request('rider') == 'Team Driving' ? 'selected' : '' }}>Team Driving</option>
                                        <option value="Team Penning" {{ request('rider') == 'Team Penning' ? 'selected' : '' }}>Team Penning</option>
                                        <option value="Team Roping" {{ request('rider') == 'Team Roping' ? 'selected' : '' }}>
                                            Team Roping</option>
                                        <option value="Team Roping - Head" {{ request('rider') == 'Team Roping - Head' ? 'selected' : '' }}>Team Roping - Head
                                        </option>
                                        <option value="Team Roping - Heel" {{ request('rider') == 'Team Roping - Heel' ? 'selected' : '' }}>Team Roping - Heel
                                        </option>
                                        <option value="Team Sorting" {{ request('rider') == 'Team Sorting' ? 'selected' : '' }}>Team Sorting</option>
                                        <option value="Therapeutic Riding" {{ request('rider') == 'Therapeutic Riding' ? 'selected' : '' }}>Therapeutic Riding
                                        </option>
                                        <option value="Therapy" {{ request('rider') == 'Therapy' ? 'selected' : '' }}>Therapy
                                        </option>
                                        <option value="Trail Class Competition" {{ request('rider') == 'Trail Class Competition' ? 'selected' : '' }}>Trail Class
                                            Competition</option>
                                        <option value="Trail Master" {{ request('rider') == 'Trail Master' ? 'selected' : '' }}>Trail Master</option>
                                        <option value="Trail Riding" {{ request('rider') == 'Trail Riding' ? 'selected' : '' }}>Trail Riding</option>
                                        <option value="Trick" {{ request('rider') == 'Trick' ? 'selected' : '' }}>Trick
                                        </option>
                                        <option value="Unicorn" {{ request('rider') == 'Unicorn' ? 'selected' : '' }}>Unicorn
                                        </option>
                                        <option value="Vaulting" {{ request('rider') == 'Vaulting' ? 'selected' : '' }}>
                                            Vaulting</option>
                                        <option value="Western" {{ request('rider') == 'Western' ? 'selected' : '' }}>Western
                                        </option>
                                        <option value="Western Dressage" {{ request('rider') == 'Western Dressage' ? 'selected' : '' }}>Western Dressage</option>
                                        <option value="Western Pleasure" {{ request('rider') == 'Western Pleasure' ? 'selected' : '' }}>Western Pleasure</option>
                                        <option value="Western Riding" {{ request('rider') == 'Western Riding' ? 'selected' : '' }}>Western Riding</option>
                                        <option value="Working Cattle" {{ request('rider') == 'Working Cattle' ? 'selected' : '' }}>Working Cattle</option>
                                        <option value="Working Equitation" {{ request('rider') == 'Working Equitation' ? 'selected' : '' }}>Working Equitation
                                        </option>
                                        <option value="4H" {{ request('rider') == '4H' ? 'selected' : '' }}>4H</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Rider Level Section -->
                            <div class="form-section">
                                <div class="section-title">Rider Level</div>
                                <div class="skills-tags" id="rider-level-tags">
                                    <!-- Selected rider levels will appear here -->
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select rider_level_select" name="skill">
                                        <option selected disabled>Select Rider Levels</option>
                                        <option value="Beginner Riders - have minimal or no experience" @selected($skill == 'Beginner Riders - have minimal or no experience')>Beginner
                                            Riders - have minimal or no experience</option>
                                        <option value="Novice Riders - have a basic understanding of riding and can perform basic gaits." @selected($skill == 'Novice Riders - have a basic understanding of riding and can perform basic gaits.')>Novice Riders - have a basic
                                            understanding of riding and can perform basic gaits.</option>
                                        <option value="Intermediate Riders - are comfortable with all gaits and can handle more challenging situations" @selected($skill == 'Intermediate Riders - are comfortable with all gaits and can handle more challenging situations')>Intermediate Riders
                                            - are comfortable with all gaits and can handle more challenging situations
                                        </option>
                                        <option value="Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level." @selected($skill == 'Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level.')>
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
                                <button class="choose-btn" type="submit" onclick="saveSearch()">
                                    <span class="btn-icon">🔍</span>
                                    SEARCH
                                </button>
                            </div>
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <button class="choose-btn" type="submit" onclick="saveSearch()">
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
                                        @if ($product->pro_ad_type == 'At Auction')
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
                                                    <!-- <li><strong>Ad Type:</strong> {{ $product->pro_ad_type }}</li> -->
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
                                                    @endif
                                                    ${{ $product->pro_reg_price }}
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
                                                <form class="horse_card_btn" action="{{ route('horse.favorite', Crypt::encrypt($product['id'])) }}" method="POST">
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
            </div>
        </div>
    </section>
    <script>
        // Function to convert select elements to searchable dropdowns
        // function makeSelectSearchable(selectElement) {
        //     const wrapper = selectElement.closest('.select-wrapper');
        //     if (!wrapper) return;

        //     // Store original options
        //     const originalOptions = Array.from(selectElement.options).map(option => ({
        //         value: option.value,
        //         text: option.textContent,
        //         disabled: option.disabled,
        //         selected: option.selected
        //     }));

        //     // Create input element
        //     const input = document.createElement('input');
        //     input.type = 'text';
        //     input.className = selectElement.className.replace('form-select', 'form-input-select');
        //     input.placeholder = selectElement.options[selectElement.selectedIndex].textContent;
        //     input.setAttribute('autocomplete', 'off');

        //     // Create dropdown container
        //     const dropdown = document.createElement('div');
        //     dropdown.className = 'select-dropdown';
        //     dropdown.style.display = 'none';

        //     // Hide original select
        //     selectElement.style.display = 'none';

        //     // Insert input and dropdown
        //     wrapper.appendChild(input);
        //     wrapper.appendChild(dropdown);

        //     // Function to populate dropdown
        //     function populateDropdown(filter = '') {
        //         dropdown.innerHTML = '';
        //         const filteredOptions = originalOptions.filter(option =>
        //             !option.disabled &&
        //             option.text.toLowerCase().includes(filter.toLowerCase()) &&
        //             option.value !== ''
        //         );

        //         filteredOptions.forEach(option => {
        //             const item = document.createElement('div');
        //             item.className = 'dropdown-item';
        //             item.textContent = option.text;
        //             item.setAttribute('data-value', option.value);

        //             item.addEventListener('click', function() {
        //                 input.value = option.text;
        //                 selectElement.value = option.value;
        //                 dropdown.style.display = 'none';

        //                 // Trigger change event for existing functionality
        //                 const changeEvent = new Event('change');
        //                 selectElement.dispatchEvent(changeEvent);
        //             });

        //             dropdown.appendChild(item);
        //         });

        //         // Show "No results" if no matches
        //         if (filteredOptions.length === 0 && filter !== '') {
        //             const noResults = document.createElement('div');
        //             noResults.className = 'dropdown-item no-results';
        //             noResults.textContent = 'No results found';
        //             dropdown.appendChild(noResults);
        //         }
        //     }

        //     // Input event listeners
        //     input.addEventListener('input', function() {
        //         populateDropdown(this.value);
        //         dropdown.style.display = 'block';
        //     });

        //     input.addEventListener('focus', function() {
        //         populateDropdown(this.value);
        //         dropdown.style.display = 'block';
        //     });

        //     input.addEventListener('blur', function(e) {
        //         // Delay hiding to allow click on dropdown items
        //         setTimeout(() => {
        //             if (!wrapper.contains(document.activeElement)) {
        //                 dropdown.style.display = 'none';
        //             }
        //         }, 150);
        //     });

        //     // Keyboard navigation
        //     input.addEventListener('keydown', function(e) {
        //         const items = dropdown.querySelectorAll('.dropdown-item:not(.no-results)');
        //         let currentIndex = -1;

        //         // Find currently highlighted item
        //         items.forEach((item, index) => {
        //             if (item.classList.contains('highlighted')) {
        //                 currentIndex = index;
        //             }
        //         });

        //         switch (e.key) {
        //             case 'ArrowDown':
        //                 e.preventDefault();
        //                 if (dropdown.style.display === 'none') {
        //                     populateDropdown(this.value);
        //                     dropdown.style.display = 'block';
        //                 } else {
        //                     // Remove current highlight
        //                     items.forEach(item => item.classList.remove('highlighted'));
        //                     // Add highlight to next item
        //                     const nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
        //                     if (items[nextIndex]) {
        //                         items[nextIndex].classList.add('highlighted');
        //                     }
        //                 }
        //                 break;

        //             case 'ArrowUp':
        //                 e.preventDefault();
        //                 if (dropdown.style.display !== 'none') {
        //                     // Remove current highlight
        //                     items.forEach(item => item.classList.remove('highlighted'));
        //                     // Add highlight to previous item
        //                     const prevIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
        //                     if (items[prevIndex]) {
        //                         items[prevIndex].classList.add('highlighted');
        //                     }
        //                 }
        //                 break;

        //             case 'Enter':
        //                 e.preventDefault();
        //                 const highlighted = dropdown.querySelector('.dropdown-item.highlighted');
        //                 if (highlighted && !highlighted.classList.contains('no-results')) {
        //                     highlighted.click();
        //                 } else if (items.length === 1) {
        //                     items[0].click();
        //                 }
        //                 break;

        //             case 'Escape':
        //                 dropdown.style.display = 'none';
        //                 input.blur();
        //                 break;
        //         }
        //     });

        //     // Close dropdown when clicking outside
        //     document.addEventListener('click', function(e) {
        //         if (!wrapper.contains(e.target)) {
        //             dropdown.style.display = 'none';
        //         }
        //     });
        // }

        // Function to clear location (existing)
        function clearLocation() {
            document.querySelector(".location-input input").value = "";
        }

        // Function to remove tags (existing)
        function removeTag(button) {
            button.parentElement.remove();
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
                if (container.id !== "skills-tags") {
                    container.innerHTML = "";
                } else {
                    // Keep the initial skills tags
                    container.innerHTML = `
           <div class="skill-tag">
               Jumping 3'6"
               <button class="remove" onclick="removeTag(this)">×</button>
           </div>
           <div class="skill-tag">
               Trail Riding
               <button class="remove" onclick="removeTag(this)">×</button>
           </div>
           <div class="skill-tag">
               Hunter Horse
               <button class="remove" onclick="removeTag(this)">×</button>
           </div>
       `;
                }
            });

            alert("Search criteria reset!");
        }

        // Generic function to add tags for multi-select fields (existing)
        function addTag(selectElement, containerId) {
            if (selectElement.value && selectElement.selectedIndex > 0) {
                const container = document.getElementById(containerId);

                // Check if tag already exists
                const existingTags = Array.from(container.children);
                const tagExists = existingTags.some(tag =>
                    tag.textContent.trim().replace('×', '').trim() === selectElement.value
                );

                if (!tagExists) {
                    const newTag = document.createElement("div");
                    newTag.className = "skill-tag";
                    newTag.innerHTML = `
           ${selectElement.value}
           <button class="remove" onclick="removeTag(this)">×</button>
       `;
                    container.appendChild(newTag);
                }

                selectElement.selectedIndex = 0;

                // Clear the input field if it exists
                const wrapper = selectElement.closest('.select-wrapper');
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

            // Add event listeners for all multi-select dropdowns (existing functionality)
            const skillSelect = document.querySelector(".skill_select");
            if (skillSelect) {
                skillSelect.addEventListener("change", function(e) {
                    addTag(e.target, "skills-tags");
                });
            }

            const breedSelect = document.querySelector(".breed_select");
            if (breedSelect) {
                breedSelect.addEventListener("change", function(e) {
                    addTag(e.target, "breed-tags");
                });
            }

            const colorSelect = document.querySelector(".color_select");
            if (colorSelect) {
                colorSelect.addEventListener("change", function(e) {
                    addTag(e.target, "color-tags");
                });
            }

            const genderSelect = document.querySelector(".gender_select");
            if (genderSelect) {
                genderSelect.addEventListener("change", function(e) {
                    addTag(e.target, "gender-tags");
                });
            }

            const riderLevelSelect = document.querySelector(".rider_level_select");
            if (riderLevelSelect) {
                riderLevelSelect.addEventListener("change", function(e) {
                    addTag(e.target, "rider-level-tags");
                });
            }
        });
    </script>
    <script>
        const FULL_DASH_ARRAY = 2 * Math.PI * 30;

        function initializeCountdown(container, durationMs) {
            const countdownEnd = new Date().getTime() + durationMs;

            const totalDays = Math.floor(durationMs / (1000 * 60 * 60 * 24)) || 1;
            const totalHours = 24;
            const totalMinutes = 60;
            const totalSeconds = 60;

            function updateCountdown() {
                const now = new Date().getTime();
                let distance = countdownEnd - now;

                if (distance < 0) {
                    container.innerHTML = "Time's up!";
                    clearInterval(interval);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                updateCircle(container, "days", days, totalDays);
                updateCircle(container, "hours", hours, totalHours);
                updateCircle(container, "minutes", minutes, totalMinutes);
                updateCircle(container, "seconds", seconds, totalSeconds);
            }

            const interval = setInterval(updateCountdown, 1000);
            updateCountdown();
        }

        function updateCircle(container, type, value, max) {
            const circleContainer = container.querySelector(`.circle-container[data-type="${type}"]`);
            const valueElement = circleContainer.querySelector(".value");
            const circle = circleContainer.querySelector(".progress");

            valueElement.textContent = value;
            const offset = FULL_DASH_ARRAY * (1 - value / max);
            circle.style.strokeDasharray = FULL_DASH_ARRAY;
            circle.style.strokeDashoffset = offset;
        }

        // Initialize all countdowns
        document.querySelectorAll(".countdown").forEach((countdown) => {
            const durationMs = parseInt(countdown.getAttribute("data-duration"), 10);
            initializeCountdown(countdown, durationMs);
        });
    </script>
    {{-- <script>
   const tagsContainer = document.querySelector(".shortcuts_tags_flex");
   const form = document.getElementById("mainForm");
   const notification = document.getElementById("tagNotification");

   // 🟢 Show notification for 5 seconds
   function showNotification(message) {
     notification.textContent = message;
     notification.classList.add("active");
     setTimeout(() => notification.classList.remove("active"), 3000);
   }

   // 🟢 Create tag
   function createTag(label, value, key, showLabel = false) {
     if (!value || value.trim() === "" || value === "-") return;

     // Avoid duplicates (same key)
     if ([...tagsContainer.children].some(tag => tag.dataset.key === key)) {
       const existing = tagsContainer.querySelector(`[data-key='${key}']`);
       existing.querySelector("p").innerText = showLabel ? `${label}: ${value}` : value;
       showNotification(`Updated ${label} to ${value}`);
       return;
     }

     const tag = document.createElement("div");
     tag.classList.add("shortcuts_tags_item");
     tag.dataset.key = key;

     tag.innerHTML = `
       <p>${showLabel ? `<strong>${label}:</strong> ${value}` : value}</p>
       <a href="#!" class="remove-tag">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
       </a>
     `;

     tagsContainer.appendChild(tag);
     showNotification(`Your selection (${showLabel ? `${label}: ${value}` : value}) has been added to the top.`);


     // Remove tag
     // Inside createTag, replace the remove listener with:
     tag.querySelector(".remove-tag").addEventListener("click", () => {
     tag.remove();

     // Clear associated inputs based on key
     if (key === "distance") {
         form.querySelectorAll(".distance-input").forEach(i => i.value = "");
     } else if (key === "height") {
         form.querySelectorAll("input[name^='height_']").forEach(i => i.value = "");
     } else if (key === "age") {
         form.querySelectorAll("input[name^='age_']").forEach(i => i.value = "");
     } else if (key === "price") {
         form.querySelectorAll("input[name='from'], input[name='to']").forEach(i => i.value = "");
     } else if (key.startsWith("skill_") || key.startsWith("rider_")) {
         // Handle multi-select: remove specific value from select
         const parts = key.split('_');
         const selectName = parts[0];
         const value = parts.slice(1).join('_');
         const select = form.querySelector(`select[name="${selectName}"]`);
         if (select) {
         const option = select.querySelector(`option[value="${value}"]`);
         if (option) option.selected = false;
         }
     } else {
         // Single input field by name
         const input = form.querySelector(`[name="${key}"]`);
         if (input) input.value = "";
     }

     showNotification(`${label || key} removed`);
     });
   }

   // 🟡 Combine min-max values correctly
   function getRangeValue(inputs) {
     const min = inputs[0]?.value.trim() || "";
     const max = inputs[1]?.value.trim() || "";
     if (min && max) return `${min} - ${max}`;
     if (min) return `${min}+`;
     if (max) return `Up to ${max}`;
     return "";
   }

   // 🟢 Distance Range
   const distanceInputs = form.querySelectorAll(".distance-input");
   distanceInputs.forEach(input =>
     input.addEventListener("blur", () => {
       const val = getRangeValue(distanceInputs);
       if (val) createTag("Distance Range", val, "distance", true);
     })
   );

   // 🟢 Height Range
   const heightInputs = form.querySelectorAll("input[name^='height_']");
   heightInputs.forEach(input =>
     input.addEventListener("blur", () => {
       const val = getRangeValue(heightInputs);
       if (val) createTag("Height Range", val, "height", true);
     })
   );

   // 🟢 Age Range
   const ageInputs = form.querySelectorAll("input[name^='age_']");
   ageInputs.forEach(input =>
     input.addEventListener("blur", () => {
       const val = getRangeValue(ageInputs);
       if (val) createTag("Age Range (Years)", val, "age", true);
     })
   );

   // 🟢 Price Range
   const priceInputs = form.querySelectorAll("input[name='from'], input[name='to']");
   priceInputs.forEach(input =>
     input.addEventListener("blur", () => {
       const val = getRangeValue(priceInputs);
       if (val) createTag("Price Range ($)", val, "price", true);
     })
   );

   // 🟢 Normal inputs (non-range)
   const normalInputs = form.querySelectorAll("input[type='text'], input[type='number']");
   normalInputs.forEach(input => {
     if (
       input.classList.contains("distance-input") ||
       input.name.startsWith("height_") ||
       input.name.startsWith("age_") ||
       input.name === "from" ||
       input.name === "to"
     )
       return;

     // Tag create on blur (jab user doosri field me jaye)
     input.addEventListener("blur", () => {
       if (input.value.trim()) {
         createTag(input.placeholder || input.name, input.value.trim(), input.name, false);
       }
     });
   });

   // 🟢 Select fields — tag create jab doosra select start ho ya focus lose kare
   form.querySelectorAll("select").forEach(select => {
     select.addEventListener("change", () => {
       const selectedText = select.options[select.selectedIndex].text;
       if (selectedText && selectedText !== "Select") {
         createTag(selectedText, selectedText, `${select.name}_${selectedText}`, false);
       }
     });
   });


     function restoreTagsFromFormData() {
     const formData = new FormData(form);

     // Helper: safely get value(s)
     const getVal = (name) => formData.get(name)?.trim() || null;
     const getAll = (name) => formData.getAll(name).filter(v => v.trim() !== "");

     // --- Distance ---
     const distMin = getVal('distance_min');
     const distMax = getVal('distance_max');
     if (distMin || distMax) {
         const val = (() => {
         if (distMin && distMax) return `${distMin} - ${distMax}`;
         if (distMin) return `${distMin}+`;
         if (distMax) return `Up to ${distMax}`;
         return "";
         })();
         if (val) createTag("Distance Range", val, "distance", true);
     }

     // --- Height ---
     const hMin = getVal('height_min');
     const hMax = getVal('height_max');
     if (hMin || hMax) {
         const val = (() => {
         if (hMin && hMax) return `${hMin} - ${hMax}`;
         if (hMin) return `${hMin}+`;
         if (hMax) return `Up to ${hMax}`;
         return "";
         })();
         if (val) createTag("Height Range", val, "height", true);
     }

     // --- Age ---
     const ageMin = getVal('age_min');
     const ageMax = getVal('age_max');
     if (ageMin || ageMax) {
         const val = (() => {
         if (ageMin && ageMax) return `${ageMin} - ${ageMax}`;
         if (ageMin) return `${ageMin}+`;
         if (ageMax) return `Up to ${ageMax}`;
         return "";
         })();
         if (val) createTag("Age Range (Years)", val, "age", true);
     }

     // --- Price ---
     const from = getVal('from');
     const to = getVal('to');
     if (from || to) {
         const val = (() => {
         if (from && to) return `${from} - ${to}`;
         if (from) return `${from}+`;
         if (to) return `Up to ${to}`;
         return "";
         })();
         if (val) createTag("Price Range ($)", val, "price", true);
     }

     // --- Normal text/number inputs (non-range) ---
     const normalFields = ['name', 'breed', 'state', 'selectedColor', 'selectedGender', 'selectedDiscipline'];
     normalFields.forEach(name => {
         const val = getVal(name);
         if (val && val !== '-') {
         // Use placeholder or name as label
         const input = form.querySelector(`[name="${name}"]`);
         const label = input?.placeholder || name;
         createTag(label, val, name, false);
         }
     });

     // --- Select fields (multi-value possible) ---
     // Assuming your selects use names like "skill", "rider", etc.
     const selectFields = ['skill', 'rider'];
     selectFields.forEach(name => {
         const values = getAll(name);
         values.forEach(val => {
         if (val && val !== 'Select') {
             const select = form.querySelector(`select[name="${name}"]`);
             const option = select?.querySelector(`option[value="${val}"]`);
             const text = option?.textContent || val;
             createTag(text, text, `${name}_${val}`, false);
         }
         });
     });

     // --- Radio-based filters (e.g., ad types) ---
     const adTypes = ['listed_horses', 'auction_horses', 'sold_horses', 'lease_horses'];
     adTypes.forEach(name => {
         const val = getVal(name);
         if (val) {
         createTag(name.replace(/_/g, ' ').toUpperCase(), val, name, true);
         }
     });
     }

     // 🟢 Call it on page load
     document.addEventListener("DOMContentLoaded", () => {
     if (form) restoreTagsFromFormData();
     });

</script> --}}
    <script>
        const tagsContainer = document.querySelector(".shortcuts_tags_flex");
        const form = document.getElementById("mainForm");
        const notification = document.getElementById("tagNotification");

        // 🟢 Show notification for 3 seconds
        function showNotification(message) {
            notification.textContent = message;
            notification.classList.add("active");
            setTimeout(() => notification.classList.remove("active"), 3000);
        }

        // 🟢 Create or update tag
        function createTag(label, value, key, showLabel = false) {
            if (!value || value.trim() === "" || value === "-") return;

            // Avoid duplicates (same key)
            if ([...tagsContainer.children].some(tag => tag.dataset.key === key)) {
                const existing = tagsContainer.querySelector(`[data-key='${key}']`);
                existing.querySelector("p").innerText = showLabel ? `${label}: ${value}` : value;
                showNotification(`Updated ${label} to ${value}`);
                return;
            }

            const tag = document.createElement("div");
            tag.classList.add("shortcuts_tags_item");
            tag.dataset.key = key;

            tag.innerHTML = `
       <p>${showLabel ? `<strong>${label}:</strong> ${value}` : value}</p>
       <a href="#!" class="remove-tag">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
       </a>
     `;

            tagsContainer.appendChild(tag);
            showNotification(`Your selection (${showLabel ? `${label}: ${value}` : value}) has been added to the top.`);

            // Remove tag logic
            tag.querySelector(".remove-tag").addEventListener("click", () => {
                tag.remove();

                const baseKey = key.split('_')[0];

                if (key === "distance") {
                    form.querySelectorAll(".distance-input").forEach(i => (i.value = ""));
                } else if (key === "height") {
                    form.querySelectorAll("input[name^='height_']").forEach(i => (i.value = ""));
                } else if (key === "age") {
                    form.querySelectorAll("input[name^='age_']").forEach(i => (i.value = ""));
                } else if (key === "price") {
                    form.querySelectorAll("input[name='from'], input[name='to']").forEach(i => (i.value = ""));
                } else if (baseKey === "breed" || baseKey === "skill" || baseKey === "rider") {
                    const value = key.split('_').slice(1).join('_');
                    const selector = baseKey === "breed" ? 'select[name="breed[]"]' : `select[name="${baseKey}"]`;
                    const select = form.querySelector(selector);
                    if (select) {
                        const option = select.querySelector(`option[value="${value}"]`);
                        if (option) option.selected = false;
                    }
                } else {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) input.value = "";
                }

                const displayLabel = label || (baseKey.charAt(0).toUpperCase() + baseKey.slice(1));
                showNotification(`${displayLabel} removed`);
            });
        }

        // 🟡 Combine min-max values
        function getRangeValue(inputs) {
            const min = inputs[0]?.value.trim() || "";
            const max = inputs[1]?.value.trim() || "";
            if (min && max) return `${min} - ${max}`;
            if (min) return `${min}+`;
            if (max) return `Up to ${max}`;
            return "";
        }

        // 🟢 Distance Range
        const distanceInputs = form.querySelectorAll(".distance-input");
        distanceInputs.forEach(input =>
            input.addEventListener("blur", () => {
                const val = getRangeValue([...distanceInputs]);
                if (val) createTag("Distance Range", val, "distance", true);
            })
        );

        // 🟢 Height Range
        const heightInputs = form.querySelectorAll("input[name^='height_']");
        heightInputs.forEach(input =>
            input.addEventListener("blur", () => {
                const val = getRangeValue([...heightInputs]);
                if (val) createTag("Height Range", val, "height", true);
            })
        );

        // 🟢 Age Range
        const ageInputs = form.querySelectorAll("input[name^='age_']");
        ageInputs.forEach(input =>
            input.addEventListener("blur", () => {
                const val = getRangeValue([...ageInputs]);
                if (val) createTag("Age Range (Years)", val, "age", true);
            })
        );

        // 🟢 Price Range
        const priceInputs = form.querySelectorAll("input[name='from'], input[name='to']");
        priceInputs.forEach(input =>
            input.addEventListener("blur", () => {
                const val = getRangeValue([...priceInputs]);
                if (val) createTag("Price Range ($)", val, "price", true);
            })
        );

        // 🟢 Normal inputs (non-range)
        const normalInputs = form.querySelectorAll("input[type='text'], input[type='number']");
        normalInputs.forEach(input => {
            if (
                input.classList.contains("distance-input") ||
                input.name?.startsWith("height_") ||
                input.name?.startsWith("age_") ||
                input.name === "from" ||
                input.name === "to"
            ) return;

            input.addEventListener("blur", () => {
                if (input.value.trim()) {
                    const label = input.placeholder || input.name;
                    createTag(label, input.value.trim(), input.name, false);
                }
            });
        });

        // 🟢 Select fields — create tag on change
        form.querySelectorAll("select").forEach(select => {
            select.addEventListener("change", () => {
                const selectedOptions = Array.from(select.selectedOptions);
                selectedOptions.forEach(option => {
                    if (option.value && option.textContent.trim() !== "Select") {
                        const value = option.value;
                        const text = option.textContent.trim();
                        const key = `${select.name.replace('[]', '')}_${value}`;
                        createTag(text, text, key, false);
                    }
                });
            });
        });

        // 🟢 Restore tags from form data on page load
        function restoreTagsFromFormData() {
            if (!form) return;

            const formData = new FormData(form);

            const getVal = (name) => formData.get(name)?.trim() || null;
            const getAll = (name) => formData.getAll(name).filter(v => v.trim() !== "");

            // Distance
            const dMin = getVal('distance_min');
            const dMax = getVal('distance_max');
            if (dMin || dMax) {
                let val = "";
                if (dMin && dMax) val = `${dMin} - ${dMax}`;
                else if (dMin) val = `${dMin}+`;
                else if (dMax) val = `Up to ${dMax}`;
                if (val) createTag("Distance Range", val, "distance", true);
            }

            // Height
            const hMin = getVal('height_min');
            const hMax = getVal('height_max');
            if (hMin || hMax) {
                let val = "";
                if (hMin && hMax) val = `${hMin} - ${hMax}`;
                else if (hMin) val = `${hMin}+`;
                else if (hMax) val = `Up to ${hMax}`;
                if (val) createTag("Height Range", val, "height", true);
            }

            // Age
            const aMin = getVal('age_min');
            const aMax = getVal('age_max');
            if (aMin || aMax) {
                let val = "";
                if (aMin && aMax) val = `${aMin} - ${aMax}`;
                else if (aMin) val = `${aMin}+`;
                else if (aMax) val = `Up to ${aMax}`;
                if (val) createTag("Age Range (Years)", val, "age", true);
            }

            // Price
            const from = getVal('from');
            const to = getVal('to');
            if (from || to) {
                let val = "";
                if (from && to) val = `${from} - ${to}`;
                else if (from) val = `${from}+`;
                else if (to) val = `Up to ${to}`;
                if (val) createTag("Price Range ($)", val, "price", true);
            }

            // Single text/number inputs
            const singleFields = ['name', 'state', 'selectedColor', 'selectedGender', 'selectedDiscipline'];
            singleFields.forEach(name => {
                const val = getVal(name);
                if (val && val !== '-') {
                    const input = form.querySelector(`[name="${name}"]`);
                    const label = input?.placeholder || name;
                    createTag(label, val, name, false);
                }
            });

            // Multi-select: skill, rider, breed
            const multiFields = ['skill', 'rider', 'breed'];
            multiFields.forEach(fieldName => {
                const values = getAll(fieldName);
                values.forEach(val => {
                    if (val && val !== 'Select') {
                        const selector = fieldName === 'breed' ? 'select[name="breed[]"]' : `select[name="${fieldName}"]`;
                        const select = form.querySelector(selector);
                        const option = select?.querySelector(`option[value="${val}"]`);
                        const text = option?.textContent?.trim() || val;
                        createTag(text, text, `${fieldName}_${val}`, false);
                    }
                });
            });

            // Radio-based filters (listed_horses, etc.)
            const radioFields = ['listed_horses', 'auction_horses', 'sold_horses', 'lease_horses'];
            radioFields.forEach(name => {
                const val = getVal(name);
                if (val) {
                    createTag(name.replace(/_/g, ' ').toUpperCase(), val, name, true);
                }
            });
        }

        // 🟢 Run on page load
        document.addEventListener("DOMContentLoaded", () => {
            restoreTagsFromFormData();
        });
    </script>

    <script>
        function sortProducts(value) {
            const url = new URL(window.location.href); // current page URL
            if (value) {
                url.searchParams.set('sort', value); // update ya add sort param
            } else {
                url.searchParams.delete('sort'); // agar default selected hai to remove
            }
            window.location.href = url.toString(); // reload with updated params
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
