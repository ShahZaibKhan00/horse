@extends('layouts.app') @section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
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
            margin-bottom: 25px;
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
            gap: 10px;
            align-items: center;
            justify-content: center;
        }

        .circle-container {
            position: relative;
            width: 68px;
            height: 68px;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring circle {
            fill: none;
            stroke-width: 4;
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
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        .circle-text span {
            font-size: 14px;
            font-weight: bold;
        }

        .circle-text small {
            font-size: 9px;
            display: block;
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

        /* .scroller {
                        max-height: 1366px;
                        overflow-y: auto;
                        overflow-x: hidden;
                    } */
        @media only screen and (max-width: 1799px) {
            .filter_sec {
                padding: 10px 0px;
            }

            .gen_card_flex .horse_list_card {
                width: 305px;
            }

            .filter_content_box {
                width: calc(100% - 350px);
            }

            .shortcuts_tags_item {
                height: 35px;
                padding: 10px;
                font-size: 11px;
            }

            .filter_side_bar {
                padding: 10px;
            }

            .form-section {
                padding: 12px 10px;
            }

            .checkbox-label {
                font-size: 9px;
            }

            .countdown {
                transform: scale(0.8);
            }

            .choose-btn {
                font-size: 13px;
                padding: 10px 7px;
            }

            .icon_heart {
                font-size: 20px;
                right: 14px;
            }

            .fs_tag {
                font-size: 16px;
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

        .horse_list_card_new .custome_listing_col .info_list li {
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
            padding: 5px 0px;
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
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
        }

        .horse_list_card_new .custome_listing_col .info_list li {
            font-size: 17.5px;
            margin: 5px 0px;
            padding: 0px;
            text-transform: uppercase;
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
            padding: 4px 0px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
            text-transform: uppercase;
        }

        .select2-selection__choice {
            display: none !important;
        }

        @media (max-width: 1799px) {
            .gen_card_flex {
                max-width: 1270px;
                padding-top: 10px;
                gap: 16px;
                justify-content: flex-start;
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
            .filter_side_bar {
                width: 240px;
            }

            .filter_content_box {
                width: calc(100% - 240px);
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
        }
    </style>

    <section class="inner_page_banner membershipBanner">
        <div class="container text-center">
            <h1 class="heading_main">ALL HORSE LISTINGS</h1>
        </div>
    </section>
    <section class="filter_sec">
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
                                    <input type="number" class="distance-input form-control" placeholder="MIN" />
                                    <input type="number" class="distance-input form-control" placeholder="MAX" />
                                </div>
                                <div class="unit-label mt-3">
                                    <div class="checkbox-item justify-content-start gap-3">
                                        <label><input type="radio" class="form-check-input" name="hr_miles" /> Hours</label>
                                        <label><input type="radio" class="form-check-input" name="hr_miles" /> Miles</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <p class="section-title">FIRST NAME, LAST NAME OR COMPANY NAME</p>
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
                                        <div class="checkbox-label">JUST LISTED ADS</div>
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
                                        <div class="checkbox-label">AUCTION ADS</div>
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
                                        <div class="checkbox-label">SOLD HORSES</div>
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
                                        <div class="checkbox-label">LEASE HORSES</div>
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
                                    <select class="select-field form-select breed_select" name="breed[]" id="breedSelect">
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
                                        <option value="Australian Stock Horse"{{ request('breed') == 'Australian Stock Horse' ? 'selected' : '' }}>Australian Stock
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
                                <div class="skills-tags" id="skills-tags">
                                    <div class="skill-tag">

                                    </div>
                                    {{-- Jumping 3'6"
                                    <button class="remove" onclick="removeTag(this)">×</button> --}}
                                    {{-- <div class="skill-tag">
                                        Trail Riding
                                        <button class="remove" onclick="removeTag(this)">×</button>
                                    </div>
                                    <div class="skill-tag">
                                        Hunter Horse
                                        <button class="remove" onclick="removeTag(this)">×</button>
                                    </div> --}}
                                </div>
                                <div class="select-wrapper">
                                    <select class="select-field form-select skill_select" name="rider[]" multiple="multiple" id="riderSelect">
                                        <option></option>
                                        <option value="Agility" {{ in_array('Agility', $rider) ? 'selected' : '' }}>Agility</option>
                                        <option value="All Around" {{ in_array('All Around', $rider) ? 'selected' : '' }}>
                                            All Around</option>
                                        <option value="All-Around Show" {{ in_array('All-Around Show', $rider) ? 'selected' : '' }}>All-Around Show</option>
                                        <option value="Beginner" {{ in_array('Beginner', $rider) ? 'selected' : '' }}>
                                            Beginner</option>
                                        <option value="Barrel Racing" {{ in_array('Barrel Racing', $rider) ? 'selected' : '' }}>Barrel Racing</option>
                                        <option value="Barrels* Poles *Gymkhana" {{ in_array('Barrels* Poles *Gymkhana', $rider) ? 'selected' : '' }}>Barrels* Poles
                                            *Gymkhana</option>
                                        <option value="Breakaway Roping" {{ in_array('Breakaway Roping', $rider) ? 'selected' : '' }}>Breakaway Roping</option>
                                        <option value="Brood mare" {{ in_array('Brood mare', $rider) ? 'selected' : '' }}>
                                            Brood mare</option>
                                        <option value="Cutting Prospect" {{ in_array('Cutting Prospect', $rider) ? 'selected' : '' }}>Cutting Prospect</option>
                                        <option value="Cutting" {{ in_array('Cutting', $rider) ? 'selected' : '' }}>Cutting
                                        </option>
                                        <option value="Calf Roping" {{ in_array('Calf Roping', $rider) ? 'selected' : '' }}>
                                            Calf Roping</option>
                                        <option value="Clicker Training" {{ in_array('Clicker Training', $rider) ? 'selected' : '' }}>Clicker Training</option>
                                        <option value="Companion Only" {{ in_array('Companion Only', $rider) ? 'selected' : '' }}>Companion Only</option>
                                        <option value="Competitive Trail Riding" {{ in_array('Competitive Trail Riding', $rider) ? 'selected' : '' }}>Competitive
                                            Trail Riding</option>
                                        <option value="Country English Pleasure" {{ in_array('Country English Pleasure', $rider) ? 'selected' : '' }}>Country
                                            English Pleasure</option>
                                        <option value="Cowboy Dressage" {{ in_array('Cowboy Dressage', $rider) ? 'selected' : '' }}>Cowboy Dressage</option>
                                        <option value="Cowboy Mounted Shooting" {{ in_array('Cowboy Mounted Shooting', $rider) ? 'selected' : '' }}>Cowboy Mounted
                                            Shooting</option>
                                        <option value="Cowboy Racing" {{ in_array('Cowboy Racing', $rider) ? 'selected' : '' }}>Cowboy Racing</option>
                                        <option value="Cow horse" {{ in_array('Cow horse', $rider) ? 'selected' : '' }}>Cow
                                            horse</option>

                                        <option value="Cross-Country" {{ in_array('Cross-Country', $rider) ? 'selected' : '' }}>Cross-Country</option>
                                        <option value="Dressage" {{ in_array('Dressage', $rider) ? 'selected' : '' }}>
                                            Dressage</option>
                                        <option value="Drill Team" {{ in_array('Drill Team', $rider) ? 'selected' : '' }}>
                                            Drill Team</option>
                                        <option value="Driving" {{ in_array('Driving', $rider) ? 'selected' : '' }}>Driving
                                        </option>
                                        <option value="Endurance Riding" {{ in_array('Endurance Riding', $rider) ? 'selected' : '' }}>Endurance Riding</option>
                                        <option value="English" {{ in_array('English', $rider) ? 'selected' : '' }}>English
                                        </option>
                                        <option value="English Pleasure" {{ in_array('English Pleasure', $rider) ? 'selected' : '' }}>English Pleasure</option>
                                        <option value="Equitation" {{ in_array('Equitation', $rider) ? 'selected' : '' }}>
                                            Equitation</option>
                                        <option value="Eventing" {{ in_array('Eventing', $rider) ? 'selected' : '' }}>
                                            Eventing</option>
                                        <option value="Field Trial" {{ in_array('Field Trial', $rider) ? 'selected' : '' }}>
                                            Field Trial</option>
                                        <option value="Foxhunter" {{ in_array('Foxhunter', $rider) ? 'selected' : '' }}>
                                            Foxhunter</option>
                                        <option value="Gun - Safe Hunting" {{ in_array('Gun - Safe Hunting', $rider) ? 'selected' : '' }}>Gun - Safe Hunting
                                        </option>
                                        <option value="Halter" {{ in_array('Halter', $rider) ? 'selected' : '' }}>Halter
                                        </option>
                                        <option value="Harness" {{ in_array('Harness', $rider) ? 'selected' : '' }}>Harness
                                        </option>
                                        <option value="Harness Racing" {{ in_array('Harness Racing', $rider) ? 'selected' : '' }}>Harness Racing</option>
                                        <option value="Horsemanship" {{ in_array('Horsemanship', $rider) ? 'selected' : '' }}>Horsemanship</option>
                                        <option value="Hunt Seat Equitation" {{ in_array('Hunt Seat Equitation', $rider) ? 'selected' : '' }}>Hunt Seat
                                            Equitation</option>
                                        <option value="Hunter" {{ in_array('Hunter', $rider) ? 'selected' : '' }}>Hunter
                                        </option>
                                        <option value="Hunter Pleasure" {{ in_array('Hunter Pleasure', $rider) ? 'selected' : '' }}>Hunter Pleasure</option>
                                        <option value="Hunter Under Saddle" {{ in_array('Hunter Under Saddle', $rider) ? 'selected' : '' }}>Hunter Under Saddle
                                        </option>
                                        <option value="Jumping" {{ in_array('Jumping', $rider) ? 'selected' : '' }}>Jumping
                                        </option>
                                        <option value="Lesson Horse" {{ in_array('Lesson Horse', $rider) ? 'selected' : '' }}>Lesson Horse</option>
                                        <option value="Liberty Training" {{ in_array('Liberty Training', $rider) ? 'selected' : '' }}>Liberty Training</option>
                                        <option value="Light Riding" {{ in_array('Light Riding', $rider) ? 'selected' : '' }}>Light Riding</option>
                                        <option value="Longe Line" {{ in_array('Longe Line', $rider) ? 'selected' : '' }}>
                                            Longe Line</option>
                                        <option value="Mountain Trail" {{ in_array('Mountain Trail', $rider) ? 'selected' : '' }}>Mountain Trail</option>
                                        <option value="Mounted Games" {{ in_array('Mounted Games', $rider) ? 'selected' : '' }}>Mounted Games</option>
                                        <option value="Mounted Police" {{ in_array('Mounted Police', $rider) ? 'selected' : '' }}>Mounted Police</option>
                                        <option value="Native Costume" {{ in_array('Native Costume', $rider) ? 'selected' : '' }}>Native Costume</option>
                                        <option value="Natural Horsemanship Training" {{ in_array('Natural Horsemanship Training', $rider) ? 'selected' : '' }}>Natural
                                            Horsemanship Training</option>
                                        <option value="Nurse Mare" {{ in_array('Nurse Mare', $rider) ? 'selected' : '' }}>
                                            Nurse Mare</option>
                                        <option value="Pacing Gait" {{ in_array('Pacing Gait', $rider) ? 'selected' : '' }}>
                                            Pacing Gait</option>
                                        <option value="Pack" {{ in_array('Pack', $rider) ? 'selected' : '' }}>Pack</option>
                                        <option value="Parade" {{ in_array('Parade', $rider) ? 'selected' : '' }}>Parade
                                        </option>
                                        <option value="Performance" {{ in_array('Performance', $rider) ? 'selected' : '' }}>
                                            Performance</option>
                                        <option value="Play day" {{ in_array('Play day', $rider) ? 'selected' : '' }}>Play
                                            day</option>
                                        <option value="Pleasure Driving" {{ in_array('Pleasure Driving', $rider) ? 'selected' : '' }}>Pleasure Driving</option>
                                        <option value="Pole Bending" {{ in_array('Pole Bending', $rider) ? 'selected' : '' }}>Pole Bending</option>
                                        <option value="Polo" {{ in_array('Polo', $rider) ? 'selected' : '' }}>Polo</option>
                                        <option value="Pony Club" {{ in_array('Pony Club', $rider) ? 'selected' : '' }}>Pony
                                            Club</option>
                                        <option value="Project" {{ in_array('Project', $rider) ? 'selected' : '' }}>Project
                                        </option>
                                        <option value="Racing" {{ in_array('Racing', $rider) ? 'selected' : '' }}>Racing
                                        </option>
                                        <option value="Retired Race Horse" {{ in_array('Retired Race Horse', $rider) ? 'selected' : '' }}>Retired Race Horse
                                        </option>
                                        <option value="Racking Gait" {{ in_array('Racking Gait', $rider) ? 'selected' : '' }}>Racking Gait</option>
                                        <option value="Ranch Conformation Class" {{ in_array('Ranch Conformation Class', $rider) ? 'selected' : '' }}>Ranch
                                            Conformation Class</option>
                                        <option value="Ranch Rail Class" {{ in_array('Ranch Rail Class', $rider) ? 'selected' : '' }}>Ranch Rail Class</option>
                                        <option value="Ranch Riding - Ranch Pleasure" {{ in_array('Ranch Riding - Ranch Pleasure', $rider) ? 'selected' : '' }}>Ranch
                                            Riding - Ranch Pleasure</option>
                                        <option value="Ranch Sorting" {{ in_array('Ranch Sorting', $rider) ? 'selected' : '' }}>Ranch Sorting</option>
                                        <option value="Ranch Trail Class" {{ in_array('Ranch Trail Class', $rider) ? 'selected' : '' }}>Ranch Trail Class
                                        </option>
                                        <option value="Ranch Versatility" {{ in_array('Ranch Versatility', $rider) ? 'selected' : '' }}>Ranch Versatility
                                        </option>
                                        <option value="Ranch Work" {{ in_array('Ranch Work', $rider) ? 'selected' : '' }}>
                                            Ranch Work</option>
                                        <option value="Reining" {{ in_array('Reining', $rider) ? 'selected' : '' }}>Reining
                                        </option>
                                        <option value="Reining - Cowhorse - Cutting" {{ in_array('Reining - Cowhorse - Cutting', $rider) ? 'selected' : '' }}>Reining -
                                            Cowhorse - Cutting</option>
                                        <option value="Rodeo" {{ in_array('Rodeo', $rider) ? 'selected' : '' }}>Rodeo
                                        </option>
                                        <option value="Rodeo Bronc" {{ in_array('Rodeo Bronc', $rider) ? 'selected' : '' }}>
                                            Rodeo Bronc</option>
                                        <option value="Roping" {{ in_array('Roping', $rider) ? 'selected' : '' }}>Roping
                                        </option>
                                        <option value="Saddle Seat" {{ in_array('Saddle Seat', $rider) ? 'selected' : '' }}>
                                            Saddle Seat</option>
                                        <option value="School" {{ in_array('School', $rider) ? 'selected' : '' }}>School
                                        </option>
                                        <option value="Schoolmaster" {{ in_array('Schoolmaster', $rider) ? 'selected' : '' }}>Schoolmaster</option>
                                        <option value="Show Experience" {{ in_array('Show Experience', $rider) ? 'selected' : '' }}>Show Experience</option>
                                        <option value="Show Hack" {{ in_array('Show Hack', $rider) ? 'selected' : '' }}>Show
                                            Hack</option>
                                        <option value="Show Winner" {{ in_array('Show Winner', $rider) ? 'selected' : '' }}>
                                            Show Winner</option>
                                        <option value="Showmanship Halter" {{ in_array('Showmanship Halter', $rider) ? 'selected' : '' }}>Showmanship Halter
                                        </option>
                                        <option value="Sidesaddle" {{ in_array('Sidesaddle', $rider) ? 'selected' : '' }}>
                                            Sidesaddle</option>
                                        <option value="Stallion - Stud - Breeding" {{ in_array('Stallion - Stud - Breeding', $rider) ? 'selected' : '' }}>Stallion -
                                            Stud - Breeding</option>
                                        <option value="Started Under Saddle" {{ in_array('Started Under Saddle', $rider) ? 'selected' : '' }}>Started Under
                                            Saddle</option>
                                        <option value="Steer Roping" {{ in_array('Steer Roping', $rider) ? 'selected' : '' }}>Steer Roping</option>
                                        <option value="Steer Wrestling" {{ in_array('Steer Wrestling', $rider) ? 'selected' : '' }}>Steer Wrestling</option>
                                        <option value="Stock" {{ in_array('Stock', $rider) ? 'selected' : '' }}>Stock
                                        </option>
                                        <option value="Team Driving" {{ in_array('Team Driving', $rider) ? 'selected' : '' }}>Team Driving</option>
                                        <option value="Team Penning" {{ in_array('Team Penning', $rider) ? 'selected' : '' }}>Team Penning</option>
                                        <option value="Team Roping" {{ in_array('Team Roping', $rider) ? 'selected' : '' }}>
                                            Team Roping</option>
                                        <option value="Team Roping - Head" {{ in_array('Team Roping - Head', $rider) ? 'selected' : '' }}>Team Roping - Head
                                        </option>
                                        <option value="Team Roping - Heel" {{ in_array('Team Roping - Heel', $rider) ? 'selected' : '' }}>Team Roping - Heel
                                        </option>
                                        <option value="Team Sorting" {{ in_array('Team Sorting', $rider) ? 'selected' : '' }}>Team Sorting</option>
                                        <option value="Therapeutic Riding" {{ in_array('Therapeutic Riding', $rider) ? 'selected' : '' }}>Therapeutic Riding
                                        </option>
                                        <option value="Therapy" {{ in_array('Therapy', $rider) ? 'selected' : '' }}>Therapy
                                        </option>
                                        <option value="Trail Class Competition" {{ in_array('Trail Class Competition', $rider) ? 'selected' : '' }}>Trail Class
                                            Competition</option>
                                        <option value="Trail Master" {{ in_array('Trail Master', $rider) ? 'selected' : '' }}>Trail Master</option>
                                        <option value="Trail Riding" {{ in_array('Trail Riding', $rider) ? 'selected' : '' }}>Trail Riding</option>
                                        <option value="Trick" {{ in_array('Trick', $rider) ? 'selected' : '' }}>Trick
                                        </option>
                                        <option value="Unicorn" {{ in_array('Unicorn', $rider) ? 'selected' : '' }}>Unicorn
                                        </option>
                                        <option value="Vaulting" {{ in_array('Vaulting', $rider) ? 'selected' : '' }}>
                                            Vaulting</option>
                                        <option value="Western" {{ in_array('Western', $rider) ? 'selected' : '' }}>Western
                                        </option>
                                        <option value="Western Dressage" {{ in_array('Western Dressage', $rider) ? 'selected' : '' }}>Western Dressage</option>
                                        <option value="Western Pleasure" {{ in_array('Western Pleasure', $rider) ? 'selected' : '' }}>Western Pleasure</option>
                                        <option value="Western Riding" {{ in_array('Western Riding', $rider) ? 'selected' : '' }}>Western Riding</option>
                                        <option value="Working Cattle" {{ in_array('Working Cattle', $rider) ? 'selected' : '' }}>Working Cattle</option>
                                        <option value="Working Equitation" {{ in_array('Working Equitation', $rider) ? 'selected' : '' }}>Working Equitation
                                        </option>
                                        <option value="4H" {{ in_array('4H', $rider) ? 'selected' : '' }}>4H</option>
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
                                    <input type="text" class="range-input form-control w-100" name="height_min" value="{{ $height_min ?? '' }}" placeholder="10.2" />
                                    <span class="range-separator">TO</span>
                                    <input type="text" class="range-input form-control w-100" name="height_max" value="{{ $height_max ?? '' }}" placeholder="21.0" />
                                    <span class="unit-label">HH</span>
                                </div>
                            </div>

                            <!-- Age Range Section -->
                            <div class="form-section">
                                <div class="section-title">Age Range(Years)</div>
                                <div class="range-inputs">
                                    <input type="number" class="range-input form-control w-100" name="age_min" value="{{ request('age_min') ?? '' }}" placeholder="5" />
                                    <span class="range-separator">TO</span>
                                    <input type="number" class="range-input form-control w-100" name="age_max" value="{{ request('age_max') ?? '' }}" placeholder="15" />
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
                                    <input type="number" name="from" value="{{ request('from') }}" class="range-input form-control w-100" placeholder="MIN" />
                                    <span class="range-separator">TO</span>
                                    <input type="number" name="to" value="{{ request('to') }}" class="range-input form-control w-100" placeholder="MAX" />
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
                                <button class="choose-btn" type="reset" onclick="resetSearch()">
                                    <span class="btn-icon">🔄</span>
                                    RESET
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="filter_content_box">
                    <div class="shortcuts_tags_flex" id="shortcutsContainer">

                    </div>

                    <div class="scroller">
                        <div class="gen_card_flex gy-4">
                            @forelse ($products as $product)
                                <div class="horse_list_card horse_list_card_new ">
                                    <div class="blue_stripe">
                                        <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                        <ul class="top_list">
                                            <li>Trail</li>
                                            <li>Dressage</li>
                                            <li>Beginner Safe</li>
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
                                    </div>
                                    <div class="text_box">
                                        <div class="custome_listing_row">
                                            <div class="custome_listing_col">
                                                <ul class="info_list">
                                                    <!-- <li>{{ $product->pro_breed }}</li> -->
                                                    <li>{{ $product->pro_age_year }} Years {{ $product->pro_age_month }} Months Old</li>
                                                    <li>{{ $product->pro_height }}</li>
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
                                                <li class="m-0 mb-2">{{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }},
                                                    NJ</li>
                                            </ul>
                                        </div>
                                        <div class="blue_wrapper">
                                            <div class="blue_stripe">
                                                <h3>Price: ${{ $product->pro_reg_price }}</h3>
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
                                                    <button class="fvrt_btn" type="submit">
                                                        Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                {{-- <label class="fvrt_btn">
                                                <input type="checkbox" hidden />
                                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                            </label> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                            {{-- @forelse ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="horse_list_card">
                                <div class="blue_stripe">
                                    <h2>{{ $product->pro_name }}</h2>
                                    <label class="heart_checkbox_wrapper d-block">
                                        <input type="checkbox" class="heartCheckbox" hidden />
                                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="img_box">
                                    <div class="swiper horse_list_card_slider h-100 w-100">
                                        <div class="swiper-wrapper">
                                            @php
                                            $productImages = !empty($product->pro_imgs) ?
                                            json_decode($product->pro_imgs) : [];
                                            @endphp
                                            @foreach ($productImages as $item)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="" />
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="arrow_flex">
                                        <button class="horse_arrow_left"><i class="fa fa-chevron-left"
                                                aria-hidden="true"></i></button>
                                        <button class="horse_arrow_right"><i class="fa fa-chevron-right"
                                                aria-hidden="true"></i></button>
                                    </div>
                                    <p class="fs_tag">{{$product->pro_ad_type}}</p>
                                </div>
                                <div class="text_box">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-12 pe-0">
                                                    <ul class="info_list">
                                                        <li><strong>Breed:</strong> {{ $product->pro_breed ?? ' ' }}
                                                        </li>
                                                        <li><strong>Born at:</strong> {{ ($product->pro_age_month ?? '')
                                                            . ', ' . ($product->pro_age_year ?? '') }}</li>
                                                        <li><strong>Height:</strong> {{ $product->pro_height ?? ' ' }}
                                                        </li>
                                                        <li><strong>Sex:</strong> {{ $product->pro_gender ?? ' ' }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="info_list">
                                                        <li><strong>Color:</strong> {{ $product->pro_color ?? ' ' }}
                                                        </li>
                                                        <li><strong>Registered:</strong> {{
                                                            Str::ucfirst($product->registerd_horse ?? ' ') }}</li>
                                                        <li><strong>Gaited:</strong> {{ $product->gaited }}</li>
                                                        <li><strong>Location:</strong> {{ Str::title($product->pro_state
                                                            . ', ' . $product->pro_city) }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blue_wrapper">
                                        <div class="blue_stripe mb-2">
                                            <h3>Price: ${{ $product->pro_reg_price }}</h3>
                                        </div>
                                        @if ($product->pro_ad_type == 'Auction')
                                        <div class="countdown" data-duration="9971000">
                                            <!-- duration in ms (2h 46m 11s) -->
                                            <div class="circle-container" data-type="days">
                                                <svg class="progress-ring" width="68" height="68">
                                                    <circle class="bg" r="30" cx="34" cy="34" />
                                                    <circle class="progress" r="30" cx="34" cy="34" />
                                                </svg>
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Days</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="hours">
                                                <svg class="progress-ring" width="68" height="68">
                                                    <circle class="bg" r="30" cx="34" cy="34" />
                                                    <circle class="progress" r="30" cx="34" cy="34" />
                                                </svg>
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Hours</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="minutes">
                                                <svg class="progress-ring" width="68" height="68">
                                                    <circle class="bg" r="30" cx="34" cy="34" />
                                                    <circle class="progress" r="30" cx="34" cy="34" />
                                                </svg>
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Minutes</small>
                                                </div>
                                            </div>
                                            <div class="circle-container" data-type="seconds">
                                                <svg class="progress-ring" width="68" height="68">
                                                    <circle class="bg" r="30" cx="34" cy="34" />
                                                    <circle class="progress" r="30" cx="34" cy="34" />
                                                </svg>
                                                <div class="circle-text">
                                                    <span class="value">0</span>
                                                    <small>Seconds</small>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="horse_list_card_btn_flex mt-3">
                                            <a href="#!" class="horse_card_btn">Seller Profile</a>
                                            <a href="#!" class="horse_card_btn">Chat with Seller</a>
                                            <a href="{{ route('products_detail', $product->pro_sku) }}"
                                                class="horse_card_btn">View Details</a>
                                            <label class="fvrt_btn">
                                                <input type="checkbox" hidden />
                                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse --}}
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

    <script>
        const tagsContainer = document.querySelector(".shortcuts_tags_flex");
        const form = document.getElementById("mainForm");

        // Function to create a tag (only value)
        function createTag(value, sourceElement) {
            value = value.trim();
            if (!value) return;

            // Avoid duplicate tags
            if ([...tagsContainer.children].some(tag => tag.dataset.value === value)) return;

            const tag = document.createElement("div");
            tag.classList.add("shortcuts_tags_item");
            tag.dataset.value = value;
            tag.innerHTML = `
                <p>${value}</p>
                <a href="#!" class="remove-tag">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
                `;
            tagsContainer.appendChild(tag);

            // Remove tag on click
            tag.querySelector(".remove-tag").addEventListener("click", () => {
                tag.remove();

                // Reset matching input/select when tag removed
                if (sourceElement.tagName === "SELECT") {
                    if (sourceElement.options[sourceElement.selectedIndex]?.text === value) {
                        sourceElement.selectedIndex = 0;
                    }
                } else {
                    // ✅ Now only clear input value when tag is removed
                    if (sourceElement.value.trim() === value) {
                        sourceElement.value = "";
                    }
                }
            });
        }

        // 🟢 For text inputs → create tag on Enter or blur (but don't clear input)
        form.querySelectorAll("input[type='text'], input[type='number']").forEach(input => {
            input.addEventListener("keydown", e => {
                if (e.key === "Enter") {
                    e.preventDefault();
                    if (input.value.trim()) {
                        createTag(input.value.trim(), input);
                        // ❌ Don't clear input here — leave it as is
                    }
                }
            });

            input.addEventListener("blur", () => {
                // optional: you can remove this if you only want Enter to trigger tags
                if (input.value.trim()) {
                    createTag(input.value.trim(), input);
                    // ❌ Don't clear input here either
                }
            });
        });

        // 🟢 For selects → create tag on change
        form.querySelectorAll("select").forEach(select => {
            select.addEventListener("change", () => {
                const selectedText = select.options[select.selectedIndex].text;
                if (selectedText && selectedText !== "Select") {
                    createTag(selectedText, select);
                    // ✅ Keep the selected option visible
                }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- <script>
        $("#riderSelect").select2({
            tags: true,
            placeholder: "Select Skill"
        });
        // $('#riderSelect').select2({
        //     placeholder: 'Select rider skills',
        //     width: '100%'
        // });
        $(document).ready(function() {
            // Initialize Select2

            // Function to refresh visible tags
            function updateSkillTags() {
                const selectedValues = $('#riderSelect').val() || [];
                const tagsContainer = $('#skills-tags');
                tagsContainer.empty(); // clear old tags

                selectedValues.forEach(value => {
                    const tagHtml = `
                        <div class="skill-tag" data-value="${value}">
                            ${value}
                            <button type="button" class="remove" data-value="${value}">×</button>
                        </div>`;
                    tagsContainer.append(tagHtml);
                });
            }

            // On Select2 selection change
            $('#riderSelect').on('change', function() {
                updateSkillTags();
            });

            // Handle tag removal
            $('#skills-tags').on('click', '.remove', function() {
                const valueToRemove = $(this).data('value');

                // Remove it from Select2 selection
                let selected = $('#riderSelect').val() || [];
                selected = selected.filter(v => v !== valueToRemove);
                $('#riderSelect').val(selected).trigger('change'); // trigger update
            });

            // Initial load (populate tags for preselected values)
            updateSkillTags();
        });
    </script> --}}

    {{-- <script>
        $('#riderSelect').select2({
            placeholder: 'Select rider skills',
            width: '100%',
            templateSelection: function (selectedItems) {
                if (!selectedItems || selectedItems.length === 0) {
                    return 'Select rider skills';
                }
                if (selectedItems.length === 1) {
                    return selectedItems[0].text;
                }
                return selectedItems.length + ' skills selected';
            }
        });
        $(document).ready(function() {

            function updateSkillTags() {
                const selectedValues = $('#riderSelect').val() || [];
                const tagsContainer = $('#skills-tags');
                tagsContainer.empty();

                selectedValues.forEach(value => {
                    const tagHtml = `
                        <div class="skill-tag" data-value="${value}">
                            ${value}
                            <button type="button" class="remove" data-value="${value}">×</button>
                        </div>`;
                    tagsContainer.append(tagHtml);
                });
            }

            $('#riderSelect').on('change', updateSkillTags);

            $('#skills-tags').on('click', '.remove', function() {
                const valueToRemove = $(this).data('value');
                let selected = $('#riderSelect').val() || [];
                selected = selected.filter(v => v !== valueToRemove);
                $('#riderSelect').val(selected).trigger('change');
            });

            // On page load
            updateSkillTags();
        });

    </script> --}}
    <!-- Your script -->
    <script>
        // Initialize Select2
        $('#riderSelect').select2({
            placeholder: 'Select rider skills',
            width: '100%',
            templateSelection: function(selectedItems) {
                if (!selectedItems || selectedItems.length === 0) return 'Select rider skills';
                if (selectedItems.length === 1) return selectedItems[0].text;
                return selectedItems.length + ' skills selected';
            }
        });

        // Function to update tags
        function updateSkillTags() {
            const selectedValues = $('#riderSelect').val() || [];
            const tagsContainer = $('#skills-tags');
            tagsContainer.empty(); // Clear previous tags

            selectedValues.forEach(value => {
                const tagHtml = `
            <div class="skill-tag" data-value="${value}">
                ${value}
                <button type="button" class="remove" data-value="${value}">×</button>
            </div>`;
                tagsContainer.append(tagHtml); // Add new tag
            });
        }

        // Bind change event
        $('#riderSelect').on('change', updateSkillTags);

        // Bind remove button click
        $('#skills-tags').on('click', '.remove', function() {
            const valueToRemove = $(this).data('value');
            let selected = $('#riderSelect').val() || [];
            selected = selected.filter(v => v !== valueToRemove);
            $('#riderSelect').val(selected).trigger('change');
        });

        // Initial tag render
        updateSkillTags();
    </script>
@endsection
