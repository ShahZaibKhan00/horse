@extends('layouts.app') @section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .top_head {
            text-align: center;
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
            width: 500px;
            background-color: #1d2139;
        }

        .filter_content_box {
            width: calc(100% - 500px);
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
            border: 2px solid #1c2038;
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
            border: 2px solid #1d2139;
            padding: 5px;
            text-align: center;
            font-size: 11px;
        }

        .horse_list_card .img_box {
            height: 250px;
        }

        .blue_stripe h2 {
            font-size: 30px;
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

        .real_icon_box img {
            max-width: 15px;
            margin-right: 10px;
        }

        .card_about_heading {
            font-size: 18px;
            margin-bottom: 00px;
        }

        .about_sm_desc {
            font-size: 12px;
            max-height: 130px;
            overflow-y: auto;
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

        .real_estate_card .blue_stripe.top_strip {
            background: #1d2139;
            border: 3px solid #ae8e3b;
            position: relative;
        }

        @media only screen and (max-width: 1799px) {
            .filter_sec {
                padding: 10px 0px;
            }

            .filter_side_bar {
                width: 300px;
            }

            .filter_content_box {
                width: calc(100% - 300px);
                padding: 0px 10px;
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
                font-size: 10px;
            }

            .choose-btn {
                font-size: 13px;
                padding: 10px 7px;
            }

            .blue_stripe h2 {
                font-size: 20px;
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
    <section class="inner_page_banner membershipBanner">
        <div class="container text-center">
            <h1 class="heading_main">REAL ESTATE LISTINGS</h1>
        </div>
    </section>

    <section class="filter_sec">
        <div class="container-fluid">
            <div class="filter_row">
                <div class="filter_side_bar">
                    <div class="top_head">
                        <img src="assets/images/heading_logo.png" alt="img" class="img-fluid">
                        <h3 class="heading44px mb-4 text-center">SEARCH & FILTER ADS</h3>
                    </div>
                    <form action="{{ route('realestate_listing_filter') }}" method="GET" class="search-form">
                        <!-- Location Section -->
                        <div class="form-section">
                            <div class="section-title">Location</div>
                            <div class="location-input">
                                <input type="text" class="form-control" name="location" value="{{ request('location', '') }}" placeholder="City, State, or Zip" />
                                <button class="location-clear" onclick="clearLocation()">×</button>
                            </div>
                        </div>

                        <!-- Distance Range Section -->
                        <div class="form-section">
                            <div class="section-title">Distance Range</div>
                            <div class="distance-controls">
                                <input type="number" class="distance-input form-control" name="distance_min" placeholder="MIN" />
                                <input type="number" class="distance-input form-control" name="distance_max" placeholder="MAX" />
                            </div>
                            <div class="unit-label mt-3">
                                <div class="checkbox-item justify-content-start gap-3">
                                    <label><input type="radio" class="form-check-input" name="hr_miles" /> Hours</label>
                                    <label><input type="radio" class="form-check-input" name="hr_miles" /> Miles</label>
                                </div>
                            </div>
                        </div>

                        <!-- Price Range Section -->
                        <div class="form-section">
                            <div class="section-title">Price Range</div>
                            <div class="price-inputs">
                                <span class="price-symbol">$</span>
                                <input type="number" class="range-input form-control w-100" name="price_min" value="{{ request('price_min', '') }}" placeholder="MIN" />
                                <span class="range-separator">TO</span>
                                <input type="number" class="range-input form-control w-100" name="price_max" value="{{ request('price_max', '') }}" placeholder="MAX" />
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="section-title">Acerage</div>
                            <div class="price-inputs">
                                <input type="number" class="range-input form-control w-100" name="acre_min" value="{{ request('acre_min', '') }}" placeholder="MIN" />
                                <span class="range-separator">TO</span>
                                <input type="number" class="range-input form-control w-100" name="acre_max" value="{{ request('acre_max', '') }}" placeholder="MAX" />
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="section-title">Bedrooms</div>
                            <div class="price-inputs">
                                <input type="number" class="range-input form-control w-100" name="bedrooms_min" value="{{ request('bedrooms_min', '') }}" placeholder="MIN" />
                                <span class="range-separator">TO</span>
                                <input type="number" class="range-input form-control w-100" name="bedrooms_max" value="{{ request('bedrooms_max', '') }}" placeholder="MAX" />
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="section-title">Bathrooms</div>
                            <div class="price-inputs">
                                <input type="number" class="range-input form-control w-100" name="bathrooms_min" value="{{ request('bathrooms_min', '') }}" placeholder="MIN" />
                                <span class="range-separator">TO</span>
                                <input type="number" class="range-input form-control w-100" name="bathrooms_max" value="{{ request('bathrooms_max', '') }}" placeholder="MAX" />
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-title">Has Barns</div>
                                    <div class="unit-label mt-3">
                                        <div class="checkbox-item justify-content-start gap-3">
                                            <label><input type="radio" class="form-check-input" @checked(request('heated_barn') == 'yes') value="yes" name="heated_barn" /> Yes</label>
                                            <label><input type="radio" class="form-check-input" @checked(request('heated_barn') == 'no') value="no" name="heated_barn" /> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="section-title"># of Stalls</div>
                                    <div class="price-inputs">
                                        <input type="number" class="range-input form-control w-100" name="stall_min" value="{{ request('stall_min', '') }}" placeholder="MIN" />
                                        <span class="range-separator">TO</span>
                                        <input type="number" class="range-input form-control w-100" name="stall_max" value="{{ request('stall_max', '') }}" placeholder="MAX" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-title">Has Indoor Ring</div>
                                    <div class="unit-label mt-3">
                                        <div class="checkbox-item justify-content-start gap-3">
                                            <label><input type="radio" class="form-check-input" @checked(request('has_indoor_ring') == 'yes') value="yes" name="has_indoor_ring" /> Yes</label>
                                            <label><input type="radio" class="form-check-input" @checked(request('has_indoor_ring') == 'no') value="no" name="has_indoor_ring" /> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="section-title">Has Outdoor Ring</div>
                                    <div class="unit-label mt-3">
                                        <div class="checkbox-item justify-content-start gap-3">
                                            <label><input type="radio" class="form-check-input" value="yes" @checked(request('has_outdoor_ring') == 'yes') name="has_outdoor_ring" /> Yes</label>
                                            <label><input type="radio" class="form-check-input" value="no" @checked(request('has_outdoor_ring') == 'no') name="has_outdoor_ring" /> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title">Fencing</div>
                                    <div class="unit-label mt-3">
                                        <div class="checkbox-item justify-content-start gap-3">
                                            <label><input type="radio" class="form-check-input" value="yes" @checked(request('fenced_grass') == 'yes') name="fenced_grass" /> Yes</label>
                                            <label><input type="radio" class="form-check-input" value="no" @checked(request('fenced_grass') == 'no') name="fenced_grass" /> No</label>
                                        </div>
                                    </div>
                                    <div class="unit-label mt-3">
                                        <div class="checkbox-item justify-content-start gap-3">
                                            <label>
                                                <input type="checkbox" class="form-check-input" value="vinyl" name="fencing[]" @checked(is_array(request('fencing')) && in_array('vinyl', request('fencing'))) />
                                                Vinyl
                                            </label>

                                            <label>
                                                <input type="checkbox" class="form-check-input" value="wood" name="fencing[]" @checked(is_array(request('fencing')) && in_array('wood', request('fencing'))) />
                                                Wood
                                            </label>

                                            <label>
                                                <input type="checkbox" class="form-check-input" value="electric" name="fencing[]" @checked(is_array(request('fencing')) && in_array('electric', request('fencing'))) />
                                                Electric
                                            </label>

                                            <label>
                                                <input type="checkbox" class="form-check-input" value="metal" name="fencing[]" @checked(is_array(request('fencing')) && in_array('metal', request('fencing'))) />
                                                Metal
                                            </label>

                                            <label>
                                                <input type="checkbox" class="form-check-input" value="other" name="fencing[]" @checked(is_array(request('fencing')) && in_array('other', request('fencing'))) />
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Amenities Section -->
                        <div class="form-section">
                            <div class="section-title">Amenities</div>
                            <div class="skills-tags" id="amenities-tags">   
                                <div class="skill-tag" id="skill-tag">
                                </div>
                            </div>
                            <div class="select-wrapper">
                                <select class="select-field form-select amenities_select" name="amenitie[]" multiple="multiple" id="amenities">
                                    <option>Select Amenities</option>
                                    @forelse ($amenities as $amenitie)
                                        <option value="{{ $amenitie->amenities }}">{{ Str::title($amenitie->amenities) }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <button class="choose-btn">
                                <span class="btn-icon">💾</span>
                                SEARCH
                            </button>
                            <button class="choose-btn" onclick="resetSearch()">
                                <span class="btn-icon">🔄</span>
                                RESET SEARCH Filter
                            </button>
                        </div>
                    </form>
                </div>

                <div class="filter_content_box">
                    <div class="shortcuts_tags_flex">
                        <div class="shortcuts_tags_item">
                            <p>3 HOURS 07848</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>EXCLUDE AUCTION</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>INCLUDE SOLD</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>GELDING</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>FRIESIAN CROSS</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>WARMBLOOD</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>DRESSAGE</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>TRAIL RIDING</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>LESSON HORSE</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>BEGINNER</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>INTERMEDIATE</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>15 - 17 HH</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="shortcuts_tags_item">
                            <p>0 - $15,000</p>
                            <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="filter_min_bars">
                        <button class="reset_btn choose-btn"><i class="fa fa-refresh" aria-hidden="true"></i> RESET SEARCH CRITERIA</button>

                        <div class="filter_right_flex">
                            <p>1-24 of 494 Listing</p>
                            <select>
                                <option value="">1-34</option>
                                <option value="">1-44</option>
                                <option value="">1-54</option>
                            </select>

                            <select>
                                <option value="">Price (High to Low)</option>
                                <option value="">Price (Low to High)</option>
                                <option value="">Price (High)</option>
                                <option value="">Price (Low)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row  gy-4">
                        @forelse ($states as $state)
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="horse_list_card real_estate_card">
                                    <div class="blue_stripe top_strip">
                                        <h2>{{ $state['real_title'] }}</h2>
                                        <label class="heart_checkbox_wrapper d-block">
                                            <input type="checkbox" class="heartCheckbox" hidden />
                                            <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                        </label>
                                        @php
                                            $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                        @endphp
                                    </div>
                                    <div class="img_box">
                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                            <div class="swiper-wrapper">
                                                {{-- <div class="swiper-slide">
                                                    <img src="/assets/images/farm_1.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="/assets/images/farm_2.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="/assets/images/farm_3.jpg" alt="" />
                                                </div> --}}
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
                                        <p class="fs_tag">{{ $state['ad_type'] }}</p>
                                    </div>
                                    <div class="text_box">
                                        <div class="row py-2">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="info_list m-0">
                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid"></span>
                                                                {{ $state['real_acres'] }}
                                                                Acres</li>
                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid"></span>
                                                                {{ $state['real_bedroom'] }}
                                                                Bedrooms </li>
                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid"></span>
                                                                {{ $state['real_bathroom'] }}
                                                                Baths</li>
                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid"></span>
                                                                {{ str_replace(',', ' | ', $state['garage_type']) }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="heading44px card_about_heading">About</h5>
                                                        <p class="about_sm_desc">{{ $state['property_overview'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="blue_wrapper">
                                            <div class="blue_stripe">
                                                <h3>Price: {{ $state['real_price'] }}</h3>
                                            </div>
                                            <div class="horse_list_card_btn_flex">
                                                <a href="#!" class="horse_card_btn">Pictures</a>
                                                <a href="#!" class="horse_card_btn">Videos</a>
                                                <a href="#!" class="horse_card_btn">View Details</a>
                                            </div>
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
    </section>

    <script>
        function clearLocation() {
            document.querySelector(".location-input input").value = "";
        }

        function removeSkill(button) {
            button.parentElement.remove();
        }

        function saveSearch() {
            alert("Search criteria saved!");
        }

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

            alert("Search criteria reset!");
        }

        // Add some interactivity for the skills dropdown
        document.querySelector(".skill_select").addEventListener("change", function(e) {
            if (e.target.value && e.target.selectedIndex > 0) {
                const skillsContainer = document.querySelector(".skills-tags");
                const newSkill = document.createElement("div");
                newSkill.className = "skill-tag";
                newSkill.innerHTML = `
                    ${e.target.value}
                    <button class="remove" onclick="removeSkill(this)">×</button>
                `;
                skillsContainer.appendChild(newSkill);
                e.target.selectedIndex = 0;
            }
        });
    </script>

    <script>
        function removeTag(button) {
            button.parentElement.remove();
        }

        function saveSearch() {
            alert("Search criteria saved!");
        }

        function resetSearch() {
            // Reset amenities tags to initial state
            document.getElementById("amenities-tags").innerHTML = `
                <div class="skill-tag">
                    Indoor Arena
                    <button class="remove" onclick="removeTag(this)">×</button>
                </div>
                <div class="skill-tag">
                    Outdoor Arena
                    <button class="remove" onclick="removeTag(this)">×</button>
                </div>
                <div class="skill-tag">
                    Trail Access
                    <button class="remove" onclick="removeTag(this)">×</button>
                </div>
            `;

            // Reset select dropdown
            document.querySelector(".amenities_select").selectedIndex = 0;

            alert("Search criteria reset!");
        }

        // Amenities Select Functionality
        function addAmenitiesTag(selectElement) {
            if (selectElement.value && selectElement.selectedIndex > 0) {
                const container = document.getElementById("amenities-tags");

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
            }
        }

        // Event listener for amenities select
        document.querySelector(".amenities_select").addEventListener("change", function(e) {
            addAmenitiesTag(e.target);
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script>
        // Initialize Select2
        $('#amenities').select2({
            placeholder: 'Select rider skills',
            width: '100%',
            templateSelection: function(selectedItems) {
                if (!selectedItems || selectedItems.length === 0) return 'Select rider skills';
                if (selectedItems.length === 1) return selectedItems[0].text;
                return selectedItems.length + ' skills selected';
            }
        });
    </script> --}}
    <script>
        // === Initialize Select2 ===
        $('#amenities').select2({
            placeholder: 'Select options',
            width: '100%',
            templateSelection: function(selectedItems) {
                if (!selectedItems || selectedItems.length === 0) return 'Select options';
                if (selectedItems.length === 1) return selectedItems[0].text;
                return selectedItems.length + ' selected';
            }
        });

        // === Function to update tag display dynamically ===
        function updateTags(selectId, tagsContainerId) {
            const selectedValues = $(selectId).val() || [];
            const tagsContainer = $(tagsContainerId);
            tagsContainer.empty(); // Clear existing tags

            selectedValues.forEach(value => {
                const tagHtml = `
              <div class="skill-tag" data-value="${value}">
                  ${value}
                  <button type="button" class="remove" data-value="${value}">×</button>
              </div>`;
                tagsContainer.append(tagHtml);
            });
        }

        // === Amenity Select handling ===
        $('#amenities').on('change', function() {
            updateTags('#amenities', '#amenities-tags');
        });

        // === Handle tag removal (for both) ===
        $(document).on('click', '.skill-tag .remove', function() {
            const valueToRemove = $(this).data('value');
            const parentContainer = $(this).closest('.skills-tags, .amenities-tags');

            if (parentContainer.attr('id') === 'skills-tags') {
                let selected = $('#riderSelect').val() || [];
                selected = selected.filter(v => v !== valueToRemove);
                $('#riderSelect').val(selected).trigger('change');
            } else if (parentContainer.attr('id') === 'amenities-tags') {
                let selected = $('#amenities').val() || [];
                selected = selected.filter(v => v !== valueToRemove);
                $('#amenities').val(selected).trigger('change');
            }
        });

        // === On page load: show preselected tags (after search) ===
        updateTags('#riderSelect', '#skills-tags');
        updateTags('#amenities', '#amenities-tags');
    </script>

@endsection
