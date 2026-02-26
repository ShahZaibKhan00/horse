@php
    $layout = Auth::user()->usertype == 1 ? 'layouts.admin_app' : 'layouts.user_app';
@endphp
@extends($layout)
@section('content')
    <style>
        .asterisk {
            color: red;
        }

        .bid_box {
            background: #f5eeee;
            padding: 30px;
            border-radius: 20px;
            margin-top: 20px;
        }

        .hidden_box_four_flex {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hidden_box_four_flex input {
            width: 70px;
        }

        .textarea {
            font-size: 0.8rem;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #cbd0dd;
            outline: none;
        }

        .garage_box {
            max-width: 800px;
        }

        .garage_box .form-control gen_input {
            width: 300px;
        }

        .other_flooring_box {
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 260px;
        }

        .dz-image-preview {
            height: 140px !important;
            width: 140px !important;
        }

        .dropzone.dropzone-multiple .dz-image {
            height: 100%;
            width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 0;
        }

        .dropzone .dz-preview .dz-remove {
            color: red !important;
        }

        .input {
            width: 100%;
            font-size: 14px;
            padding: 15px 15px;
            margin-bottom: 0px;
            border: none;
            border-radius: 5px;
        }

        .upload__box {
            border-radius: 5px;
            background: white;
            position: relative;
        }

        .upload__inputfile {
            width: 100%;
            height: 100%;
            opacity: 0;
            position: absolute;
            z-index: 99;
            top: 0;
            left: 0;
        }

        .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #ccc;
            text-align: center;
            width: 100%;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
            font-size: 14px;
        }

        .upload__box p {
            color: #ccc;
        }

        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }

        .upload__btn-box {
            margin-bottom: 0px;
            border: 1px dashed #000;
            border-radius: 5px;
            padding: 30px 30px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            position: relative;
            z-index: 999;
            gap: 10px;
        }

        .upload__img-box {
            width: 100px;
            margin-bottom: 12px;
            border-radius: 5px;
            overflow: hidden;
        }

        .upload__img-close {
            width: 18px;
            height: 18px;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0px;
            right: 0px;
            text-align: center;
            line-height: 16px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: "✖";
            font-size: 10px;
            color: white;
            opacity: 0;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

        .upload__box p span {
            display: inline-block;
            width: 100%;
            color: var(--primeColor);
            font-weight: 600;
        }

        .upload__box p span.browse_option {
            color: #8d8d8d;
            font-weight: 400;
        }

        .upload__img-close {
            position: absolute;
            top: 3px;
            right: 3px;
            background: #000;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            color: #fff;
            font-size: 14px;
            text-align: center;
            line-height: 20px;
            cursor: pointer;
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 14px;
        }

        .pdf-icon,
        .docx-icon,
        .video-icon {
            width: 100px;
            height: 100px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #555;
            position: relative;
        }

        .file-icon-text {
            font-size: 30px;
            text-align: center;
            line-height: 100px;
        }
    </style>
    <style>
        img.f_img_preview {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
            border-radius: 7px;
            border: 1px solid #00000036;
        }

        .prodict_Color {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .removeBtn svg {
            color: red;
        }

        .checkbox_wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .category_check {
            display: block;
            position: relative;
            /* padding-left: 35px; */
            /* margin-bottom: 12px; */
            cursor: pointer;
            /* font-size: 22px; */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .category_check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .categoryMark {
            /* position: absolute; */
            top: 0;
            left: 0;
            /* height: 25px; */
            /* width: 25px; */
            background-color: #ccc;
            transition: .5s;
            color: #fff;
            font-size: 13px;
            text-transform: capitalize;
            padding: 10px 10px;
            display: inline-block;
            border-radius: 8px;
        }

        .category_check:hover input~.categoryMark {
            background-color: #ccc;
        }

        .category_check input:checked~.categoryMark {
            background-color: #b22033;
        }

        .formWrapper form {
            width: 50%;
            position: relative;
        }

        .formWrapper .fields__clm {
            width: 100%;
            background-color: #00000012;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .formWrapper .inputField {
            width: 100%;
            margin: 0 0 15px 0;
            border: 1px solid #0000001a;
            padding: 15px 15px;
            border-radius: 6px;
            box-sizing: border-box;
            outline: none !important;
        }

        .formWrapper .inputField:last-child {
            margin-bottom: 0;
        }

        .formWrapper textarea.inputField {
            height: 150px;
        }

        .addBtn {
            background-color: #00d600;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            font-weight: 700;
            border-radius: 50%;
            cursor: pointer;
            color: #fff;
        }

        .minusBtn {
            background-color: red;
            width: 30px;
            height: 30px;
            font-size: 32px;
            font-weight: 100;
            border-radius: 50%;
            cursor: pointer;
            color: #fff;
            line-height: 23px;
            text-align: center;
        }

        .btnWrapper {
            display: flex;
            column-gap: 7px;
            margin-top: 15px;
        }

        .choose_color {
            padding: 0;
            overflow: hidden;
            height: 37px;
        }
    </style>

    <style>
        .fsm-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            margin: 0;
        }

        .fsm-overlay.is-visible {
            display: flex;
        }

        .fsm-dialog {
            background: #fff;
            width: 100%;
            max-width: 1344px;
            padding: 30px;
            position: relative;
            border-radius: 8px;
            overflow-y: auto;
            height: 100%;
        }

        .fsm-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 30px;
            border: none;
            background: none;
            cursor: pointer;
        }


        .detail_left {
            width: 100%;
            background: #fff;
            z-index: 1;
            position: relative;
        }

        .sale_tag {
            font-size: 18px;
            font-weight: 700;
            padding: 8px 25px;
            background: #bf9855;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            position: absolute;
            top: 55px;
            left: 0;
            width: fit-content;
            text-transform: uppercase;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 0;
            z-index: 999;
            color: #1d2139;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        .top_blue_strip {
            background: #1d2139;
            padding: 15px 5px 10px 5px;
            position: relative;
        }

        .text_border {
            font-size: 30px;
            text-shadow: -1px 0 0 #ba9148, 1px 0 0 #ba9148, 0 -1px 0 #ba9148, 0 1px 0 #ba9148, -1px -1px 0 #ba9148, 1px -1px 0 #ba9148, -1px 1px 0 #ba9148, 1px 1px 0 #ba9148;
            line-height: 1;
        }

        .top_blue_strip .heading44px {
            color: white;
            text-align: center;
            text-transform: uppercase;
            margin: 0;
        }

        .relative_img_box {
            position: relative;
            padding: 0;
            border-bottom: 0;
        }

        .img_radius_one {
            border-radius: 0px;
            overflow: hidden;
            height: 270px;
            object-fit: cover;
        }

        .horser_information_box.mb-0 {
            background: #fff;
            border-bottom: 0;
            border: 0;
            padding: 10px 0px;
            border-radius: 0px;
        }

        .custome_listing_row {
            display: flex;
            width: 100%;
            gap: 5px;
        }

        .custome_listing_col {
            width: 50%;
        }

        .horser_information_box ul li {
            text-transform: uppercase;
            color: white;
            margin-bottom: 6px;
            font-size: 15px;
            list-style: none;
            border: 1px solid #1d2139;
            padding: 8px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .horser_information_box .info_list_one li {
            color: #1d2139;
            font-size: 14px;
        }

        .horser_information_box .info_list_one li span {
            margin-left: 6px;
            font-style: normal;
            text-transform: capitalize;
            font-weight: 600;
        }

        .horser_information_box {
            background: #1d2139;
            border-radius: 0px;
            border: 2px solid #1d2139;
        }

        .horser_information_box.type_one {
            padding: 5px;
        }

        .price_Text {
            /* font-family: "AvenirLTStd-Book"; */
            font-size: 32px;
            margin: 0;
            background: linear-gradient(to right, #e5dbc2 40%, #c19b59 75%, #c3ad72 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            text-align: center;
            padding: 0px;
        }

        .horser_information_box .heading44px,
        .horser_information_box .heading30px {
            color: white;
        }

        .horser_information_btn_flex {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .horser_action_info_btn,
        .horser_action_info_btn:focus {
            width: 48%;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #fff;
            font-size: 16px;
            color: #fff;
            transition: all 0.25s;
        }

        .real_icon_box img {
            max-width: 20px;
            margin-right: 10px;
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

        .horse_info_btn,
        .horse_info_btn:focus {
            width: 50%;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #fff;
            font-size: 16px;
            color: #fff;
            transition: all 0.25s;
        }

        .horser_action_info_btn.action_btn,
        .horse_info_btn.fvrt_btn.action_btn {
            width: 28%;
            font-size: 15.5px;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 5px;
        }

        .image-grid a {
            display: block;
            position: relative;
            overflow: hidden;
        }


        .image-grid img {
            width: 100%;
            height: 284px;
            object-fit: cover;
        }

        .cus_col {
            margin-bottom: 30px;
        }

        .videoplay_box {
            position: relative;
        }

        .video-play-button {
            position: absolute;
            z-index: 10;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            box-sizing: content-box;
            display: block;
            width: 32px;
            height: 44px;
            /* background: #eb2055; */
            border-radius: 50%;
            padding: 18px 20px 18px 28px;
        }

        .video-play-button:before {
            content: "";
            position: absolute;
            z-index: 0;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 95px;
            height: 95px;
            background: #ffffff;
            border-radius: 50%;
            animation: pulse-border 2s ease-out infinite;
        }

        .video-play-button:after {
            content: "";
            position: absolute;
            z-index: 1;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 95px;
            height: 95px;
            background: #1d2139;
            border-radius: 50%;
            transition: all 200ms;
        }

        .video-play-button span {
            display: block;
            position: relative;
            z-index: 3;
            width: 0;
            height: 0;
            border-left: 19px solid #fff;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            top: 10px;
            left: 5px;
        }


        .fw_700 {
            font-weight: 700;
        }

        .heading65px {
            color: #ab8d35;
            background: #1d2139;
            text-align: center;
            padding: 5px 20px;
            position: relative;
        }

        .view_detail_page .heading65px img {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            max-width: 60px;
        }

        .view_detail_page .heading65px h1 {
            font-size: 40px;
            margin: 0;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
        }

        .view_detail_page .border_box_one {
            border: 3px solid #1d2139;
            padding: 20px;
            border-radius: 0;
        }

        .barn-table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
            border: 2px solid #b18d61;
            table-layout: fixed;
        }

        .barn-table tr:nth-child(odd) {
            background-color: #fff;
            color: #1d2139;
        }

        .barn-table tr:nth-child(even) {
            background-color: #1d2139;
            color: #fff;
        }

        .barn-table td {
            padding: 14px 16px;
            font-size: 14px;
            font-weight: 700;
            vertical-align: top;
            border: 1px solid #b18d61;
            word-wrap: break-word;
        }

        .seller_img {
            width: 100%;
            height: 300px;
        }

        .seller_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .heading18px {
            font-size: 18px;
            color: var(--primeColor);
        }

        .social_icons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social_icons a {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #1d2139;
            border-radius: 15px;
        }

        .social_icons a.web_btn {
            width: 90px;
            color: var(--primeColor);
            font-weight: 700;
            border-radius: 12px;
        }

        .social_icons a img {
            max-width: 20px;
        }

        .fsm-close {
            position: absolute;
            top: -3px;
            right: 2px;
            font-size: 30px;
            line-height: 1;
            color: #000;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            transition: color 0.2s;
        }
        video.img-fluid {
            width: 100%;
            height: 400px;
            object-fit: contain;
        }
    </style>

    <div class="content user_main_content p-5">
        <div class="pb-5">
            <form method="POST" action="{{ url('/realstate_store') }}" enctype="multipart/form-data" novalidate class="row g-3 mb-6">
                <div class="box_top">
                    <h2 class="mb-2 main_heading_dashboard">Real Estate Ad <br /> Property Information</h2>
                    <!-- <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5> -->
                </div>
                @csrf
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="border_box_one">
                            <h4 class="mb-3">Type of Ad <span class="asterisk">*</span></h4>
                            <div class="row mb-2">
                                <div class="col-6 d-flex gap-5">
                                    <div class="form-check">
                                        <label><input class="form-check-input" name="ad_type" type="radio" value="Sale" required />
                                            Sale</label>
                                    </div>
                                    <div class="form-check d-none">
                                        <label><input class="form-check-input" name="ad_type" type="radio" value="Auction" />
                                            Auction</label>
                                    </div>
                                    <div class="form-check">
                                        <label><input class="form-check-input" name="ad_type" type="radio" value="Rent" />
                                            Rent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bid_box" style="display: none;">
                            <h4 class="mb-5 text-1000">Will be shown on first picture of ad</h4>
                            <div class="row gy-4">
                                <div class="col-6">
                                    <h5 class="mb-3">Starting Bid Amount</h5>
                                    <input class="form-control gen_input thousand-separator price-input" type="text" name="bid_amount" placeholder="Start bid" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Reserve Amount (Optional) </h5>
                                    <input class="form-control gen_input thousand-separator price-input" type="text" name="reserve_amount" placeholder="Reserve Amount" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Start Date</h5>
                                    <input class="form-control gen_input" type="date" name="start_date" placeholder="Start bid" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">End Date</h5>
                                    <input class="form-control gen_input" type="date" name="end_date" placeholder="Reserve Amount" required />
                                </div>
                                <div class="col-12">
                                    <h5 class="mb-3">Auction Link</h5>
                                    <input class="form-control gen_input" type="url" name="auc_link" placeholder="please past the link to your horses ad on the auction" />
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--
                <div class="col-6">
                    <div class="border_box_one">
                        <h4 class="mb-3">Property Type <span class="asterisk">*</span></h4>
                        <select class="form-control gen_input gen_input" name="property_type" required>
                            <option disabled selected>Select Property Type:</option>
                            <option value="Home with Acreage">Home with Acreage</option>
                            <option value="Equestrian Facility">Equestrian Facility</option>
                            <option value="Pasture land">Pasture land</option>
                            <option value="Raw Land">Raw Land</option>
                            <option value="Residential">Residential</option>
                            <option value="Comercial">Comercial</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border_box_one">
                        <h4 class="mb-3">Property Type <span class="asterisk">*</span></h4>
                        <select class="form-control gen_input gen_input" name="property_type" required>
                            <option disabled selected>Select Property Type:</option>
                            <option value="Home with Acreage">Home with Acreage</option>
                            <option value="Equestrian Facility">Equestrian Facility</option>
                            <option value="Pasture land">Pasture land</option>
                            <option value="Raw Land">Raw Land</option>
                            <option value="Residential">Residential</option>
                            <option value="Comercial">Comercial</option>
                        </select>
                    </div>
                </div>
                --}}
                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="mb-3">Location <span class="asterisk">*</span></h4>
                                    {{-- <input class="form-control gen_input" type="text" name="real_location"
                                    placeholder="Property address" required /> --}}
                                    <select class="form-control gen_input mb-3" name="real_location" required>
                                        <option selected disabled>Select your State</option>
                                        <option value="alabama (AL)">Alabama (AL)</option>
                                        <option value="alaska (AK)">Alaska (AK)</option>
                                        <option value="arizona (AZ)">Arizona (AZ)</option>
                                        <option value="arkansas (AR)">Arkansas (AR)</option>
                                        <option value="california (CA)">California (CA)</option>
                                        <option value="colorado (CO)">Colorado (CO)</option>
                                        <option value="connecticut (CT)">Connecticut (CT)</option>
                                        <option value="delaware (DE)">Delaware (DE)</option>
                                        <option value="florida (FL)">Florida (FL)</option>
                                        <option value="georgia (GA)">Georgia (GA)</option>
                                        <option value="hawaii (HI)">Hawaii (HI)</option>
                                        <option value="idaho (ID)">Idaho (ID)</option>
                                        <option value="illinois (IL)">Illinois (IL)</option>
                                        <option value="indiana (IN)">Indiana (IN)</option>
                                        <option value="iowa (IA)">Iowa (IA)</option>
                                        <option value="kansas (KS)">Kansas (KS)</option>
                                        <option value="kentucky (KY)">Kentucky (KY)</option>
                                        <option value="louisiana (LA)">Louisiana (LA)</option>
                                        <option value="maine (ME)">Maine (ME)</option>
                                        <option value="maryland (MD)">Maryland (MD)</option>
                                        <option value="massachusetts (MA)">Massachusetts (MA)</option>
                                        <option value="michigan (MI)">Michigan (MI)</option>
                                        <option value="minnesota (MN)">Minnesota (MN)</option>
                                        <option value="mississippi (MS)">Mississippi (MS)</option>
                                        <option value="missouri (MO)">Missouri (MO)</option>
                                        <option value="montana (MT)">Montana (MT)</option>
                                        <option value="nebraska (NE)">Nebraska (NE)</option>
                                        <option value="nevada (NV)">Nevada (NV)</option>
                                        <option value="new hampshire (NH)">New Hampshire (NH)</option>
                                        <option value="new jersey (NJ)">New Jersey (NJ)</option>
                                        <option value="new mexico (NM)">New Mexico (NM)</option>
                                        <option value="new york (NY)">New York (NY)</option>
                                        <option value="north carolina (NC)">North Carolina (NC)</option>
                                        <option value="north dakota (ND)">North Dakota (ND)</option>
                                        <option value="ohio (OH)">Ohio (OH)</option>
                                        <option value="oklahoma (OK)">Oklahoma (OK)</option>
                                        <option value="oregon (OR)">Oregon (OR)</option>
                                        <option value="pennsylvania (PA)">Pennsylvania (PA)</option>
                                        <option value="rhode island (RI)">Rhode Island (RI)</option>
                                        <option value="south carolina (SC)">South Carolina (SC)</option>
                                        <option value="south dakota (SD)">South Dakota (SD)</option>
                                        <option value="tennessee (TN)">Tennessee (TN)</option>
                                        <option value="texas (TX)">Texas (TX)</option>
                                        <option value="utah (UT)">Utah (UT)</option>
                                        <option value="vermont (VT)">Vermont (VT)</option>
                                        <option value="virginia (VA)">Virginia (VA)</option>
                                        <option value="washington (WA)">Washington (WA)</option>
                                        <option value="west virginia (WV)">West Virginia (WV)</option>
                                        <option value="wisconsin (WI)">Wisconsin (WI)</option>
                                        <option value="wyoming (WY)">Wyoming (WY)</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">
                                        Town <span class="asterisk">*</span>
                                        {{-- <small class="text-muted">(Attractive title to capture potential
                                        buyers)</small> --}}
                                    </h4>
                                    <input class="form-control gen_input mb-3" type="text" name="real_title" placeholder="Enter Town" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mb-3">Property Type <span class="asterisk">*</span></h5>
                                    <select class="form-control gen_input gen_input mb-3" name="property_type" required>
                                        <option disabled selected>Select Property Type:</option>
                                        <option value="Home with Acreage">Home with Acreage</option>
                                        <option value="Equestrian Facility">Equestrian Facility</option>
                                        <option value="Pasture land">Pasture land</option>
                                        <option value="Raw Land">Raw Land</option>
                                        <option value="Residential">Residential</option>
                                        <option value="Comercial">Comercial</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Price [$] <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input mb-3 thousand-separator price-input" type="text" name="real_price" placeholder="Enter Price" required />
                                </div>
                            </div>
                            <h4 class="mb-3">Basic Information:</h4>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mb-2">Acres <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input mb-3" type="text" name="real_acres" placeholder="Enter Acres" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2"># of Bedrooms</h5>
                                    <input class="form-control gen_input mb-3" type="text" name="real_bedroom" placeholder="Enter # of Bedrooms" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2"># of Bathrooms</h5>
                                    <input class="form-control gen_input mb-3" type="text" name="real_bathroom" placeholder="Enter # of Bathrooms" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">
                                        Farm Name <small class="text-muted">(Optional)</small>
                                    </h5>
                                    <input class="form-control gen_input mb-3" type="text" name="real_farm_name" placeholder="Enter Farm Name" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Garage</h5>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="garage_yes" name="real_garage" />
                                            <label class="form-check-label" for="garage_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="garage_no" name="real_garage" />
                                            <label class="form-check-label" for="garage_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="garage_box">
                                        <input class="form-control gen_input mb-3" type="text" name="num_spaces" placeholder="# of spaces" required />
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="d-flex gap-1 flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Detached" id="detached" name="garage_type[]">
                                                        <label class="form-check-label" for="detached">Detached</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Attached" id="attached" name="garage_type[]">
                                                        <label class="form-check-label" for="attached">Attached</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Tandem" id="tandem" name="garage_type[]">
                                                        <label class="form-check-label" for="tandem">Tandem</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="oversized" id="oversized" name="garage_type[]">
                                                        <label class="form-check-label" for="oversized">Oversized</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex gap-1 flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Breezeway" id="breezeway" name="garage_type[]">
                                                        <label class="form-check-label" for="breezeway">Breezeway</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Garage Workshop" id="garage_ws" name="garage_type[]">
                                                        <label class="form-check-label" for="garage_ws">Garage
                                                            Workshop</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Garage Apartment" id="garage_a" name="garage_type[]">
                                                        <label class="form-check-label" for="garage_a">Garage
                                                            Apartment</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="Carport" id="carport" name="garage_type[]">
                                                        <label class="form-check-label" for="carport">Carport</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="row gy-4">
                                <div class="col-6">
                                    <h5 class="mb-3">Barn flooring </h5>
                                    <div class="form-check other_flooring_box p-0 mb-4">
                                        <div class="form-check  ps-0">
                                            <input class="form-control gen_input_one" type="text" id="barn" name="num_barn">
                                            <label class="form-check-label" for="barn">Total Barn</label>
                                        </div>
                                        <div class="form-check ps-0">
                                            <input class="form-control gen_input_one" type="text" id="stalls" name="num_stalls">
                                            <label class="form-check-label" for="stalls">No. of Stalls</label>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="Rubber" id="rubber_flooring" name="barn_flooring" />
                                            <label class="form-check-label" for="rubber_flooring">Rubber</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="Concrete" id="concrete_flooring" name="barn_flooring" />
                                            <label class="form-check-label" for="concrete_flooring">Concrete</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="Dirt" id="dirt_flooring" name="barn_flooring" />
                                            <label class="form-check-label" for="dirt_flooring">Dirt</label>
                                        </div>
                                        <div class="form-check other_flooring_box">
                                            <input class="form-check-input" type="radio" name="">
                                            <input class="form-control gen_input_one" type="text" name="barn_flooring" value="" placeholder="Other Flooring">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Rubber Mats in stalls</h5>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="rubber_matt_yes" name="rubber_matts" checked />
                                            <label class="form-check-label" for="rubber_matt_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="rubber_matt_no" name="rubber_matts" />
                                            <label class="form-check-label" for="rubber_matt_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- <h4 class="mb-3">Stable Features </h4> -->
                                    <div class="row pb-2">
                                        <div class="col-3">
                                            <h5 class="mb-3">Tack Room </h5>
                                            <div class="col-12 pb-3">
                                                <div class="d-flex gap-1 flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="yes" id="indoor_two_yes" name="tack_room">
                                                        <label class="form-check-label" for="indoor_two_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="no" id="indoor_two_no" name="tack_room">
                                                        <label class="form-check-label" for="indoor_two_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="hidden_box_one">
                                                <h6 class="mb-3">Heated or not?</h6>
                                                <div class="d-flex gap-1 flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="yes" id="heated_yes" name="heated_not" checked="">
                                                        <label class="form-check-label" for="heated_yes">Heated</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="no" id="heated_no" name="heated_not">
                                                        <label class="form-check-label" for="heated_no">Not Heated</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="mb-3">Wash Stall </h5>
                                            <div class="d-flex gap-1 flex-column mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="yes" id="wash_stall_yes" name="wash_stall">
                                                    <label class="form-check-label" for="wash_stall_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="no" id="wash_stall_no" name="wash_stall">
                                                    <label class="form-check-label" for="wash_stall_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="hidden_box_two">
                                                <h6 class="mb-3">Hot Water</h6>
                                                <div class="d-flex gap-1 flex-column pb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="yes" id="hot_water_yes" name="hot_water" checked="">
                                                        <label class="form-check-label" for="hot_water_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="no" id="hot_water_no" name="hot_water">
                                                        <label class="form-check-label" for="hot_water_no">No</label>
                                                    </div>
                                                </div>
                                                <h6 class="mb-3">Cold Water </h6>
                                                <div class="d-flex gap-1 flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="yes" id="cold_water_yes" name="cold_water" checked="">
                                                        <label class="form-check-label" for="cold_water_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="no" id="cold_water_no" name="cold_water">
                                                        <label class="form-check-label" for="cold_water_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-3">Hay Storage </h5>
                                            <div class="d-flex gap-1 flex-column">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Hay loft" id="hay_loft" name="hay_storage[]">
                                                    <label class="form-check-label" for="hay_loft">Hay loft</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Hay room" id="hay_room" name="hay_storage[]">
                                                    <label class="form-check-label" for="hay_room">Hay room</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Hay stall" id="hay_stall" name="hay_storage[]">
                                                    <label class="form-check-label" for="hay_stall">Hay stall</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Additional hay barn" id="ahay_barn" name="hay_storage[]">
                                                    <label class="form-check-label" for="ahay_barn">Additional hay
                                                        barn</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Heated barn</h5>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="barn_yes" name="heated_barn" checked />
                                            <label class="form-check-label" for="barn_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="barn_no" name="heated_barn" />
                                            <label class="form-check-label" for="barn_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Air Conditions Barn</h5>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="air_con_yes" name="air_condition_barn" checked />
                                            <label class="form-check-label" for="air_con_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="air_con_no" name="air_condition_barn" />
                                            <label class="form-check-label" for="air_con_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Dry Lots <span class="asterisk">*</span></h5>
                                    <div class="d-flex gap-5">
                                        <div class="d-flex gap-1 flex-column">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="yes" id="dry_lots_yes" name="dry_lots" />
                                                <label class="form-check-label" for="dry_lots_yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="no" id="dry_lots_no" name="dry_lots" />
                                                <label class="form-check-label" for="dry_lots_no">No</label>
                                            </div>
                                        </div>
                                        <div class="hidden_box_seven w-25"><input class="form-control gen_input mb-3" type="text" name="num_lots" placeholder="# of dry lots" /></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Fenced Grass Pastures <span class="asterisk">*</span></h5>
                                    <div class="d-flex gap-5">
                                        <div class="d-flex gap-1 flex-column">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="yes" id="fgp_yes" name="fenced_grass" />
                                                <label class="form-check-label" for="fgp_yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="no" id="fgp_no" name="fenced_grass" />
                                                <label class="form-check-label" for="fgp_no">No</label>
                                            </div>
                                        </div>
                                        <div class="hidden_box_eight w-25"><input class="form-control gen_input mb-3" type="text" name="num_fenced_grass"
                                                placeholder="# of fenced grass pastures" /></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <h5 class="mb-3">Fencing:</h5>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="fencing[]" value="electric"> Electric
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="fencing[]" value="vinyl">
                                                        Vinyl
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="fencing[]" value="wood">
                                                        Wood
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="fencing[]" value="metal">
                                                        Metal
                                                    </label>
                                                </div>
                                                <div class="form-check other_flooring_box ms-1">
                                                    <input class="form-check-input" type="checkbox" name="">
                                                    <input class="form-control gen_input_one" type="text" name="fencing[]" value="" placeholder="Other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h5 class="mb-3">Outdoor Riding Ring <span class="asterisk">*</span></h5>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="outdoor_yes" name="out_ride_ring" />
                                            <label class="form-check-label" for="outdoor_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="outdoor_no" name="out_ride_ring" />
                                            <label class="form-check-label" for="outdoor_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="hidden_box_three mt-2">
                                        <h5 class="mb-2">Add Dimensions </h5>
                                        <div class="hidden_box_four_flex mb-3">
                                            <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="100">
                                            <p class="mb-0">x</p>
                                            <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="90">
                                        </div>
                                        <h5 class="mb-2">Watering System</h5>
                                        <div class="d-flex gap-1 flex-column">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="yes" id="w_sys_yes" name="out_water_system" />
                                                <label class="form-check-label" for="w_sys_yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="no" id="w_sys_no" name="out_water_system" />
                                                <label class="form-check-label" for="w_sys_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h5 class="mb-3">Indoor Riding Ring <span class="asterisk">*</span></h5>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="indoor_yes" name="in_ride_ring" />
                                            <label class="form-check-label" for="indoor_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="indoor_no" name="in_ride_ring" />
                                            <label class="form-check-label" for="indoor_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="hidden_box_five">
                                        <h5 class="mb-2">Add Dimensions </h5>
                                        <div class="hidden_box_four_flex mb-3">
                                            <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="100">
                                            <p class="mb-0">x</p>
                                            <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="90">
                                        </div>
                                        <h5 class="mb-2">Watering System</h5>
                                        <div class="d-flex gap-1 flex-column">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="yes" id="w_sys_two_yes" name="in_water_system" />
                                                <label class="form-check-label" for="w_sys_two_yes">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="no" id="w_sys_two_no" name="in_water_system" />
                                                <label class="form-check-label" for="w_sys_two_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="mb-3">Round Pen </h5>
                                    <div class="d-flex gap-1 flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="yes" id="rounnd_yes" name="round_pen" checked />
                                            <label class="form-check-label" for="rounnd_yes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="no" id="rounnd_no" name="round_pen" />
                                            <label class="form-check-label" for="rounnd_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one mb-0">
                            <h4 class="mb-2">Property Overview <span class="asterisk">*</span></h4>
                            <h4><small class="text-muted mb-3">( This area is for describing the property ONLY. Do not enter
                                    emails, website addresses, contact information, HTML, etc. All text not
                                    describing property will be removed.)</small>
                            </h4>
                            <textarea class="textarea" name="property_overview" style="width: 100%; height: 15rem;" placeholder="Write property overview..."></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one mb-0">
                            <h4 class="mb-2">Additional Write up</h4>
                            <h4><small class="text-muted mb-3">( Please include anything additional you want to add)</small>
                            </h4>
                            <textarea class="textarea" name="ad_write_up" style="width: 100%; height: 15rem;" placeholder="Additional Write up"></textarea>
                        </div>
                    </div>
                    <div class="col-12 pb-4">
                        <div class="border_box_one">
                            <fieldset class="form-group">
                                <h4 class="mb-3">Property Features & Amenities</h4>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="pool"> Pool
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="hot_tub"> Hot Tub
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="pond"> Pond
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="river"> River
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="trails"> Trails
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="trail_access"> Trail Access
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="hay_fields"> Hay Fields
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="property_features[]" value="extra_housing"> Extra Housing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one">
                            <h4 class="mb-2">Documents </h4>
                            <h4 class="mb-3"><small class="text-muted mb-3">Please upload any relevant documents you want to
                                    provide to prospective buyers. This includes surveys, disclosures, and
                                    any other important documents. </small>
                            </h4>
                            <div class="col-12">
                                <div class="upload__box">
                                    <div class="upload__img-wrap"></div>
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p>Drag your file here <span class="or">OR</span> <span class="browse_option">Browse from
                                                    device</span>
                                            </p>
                                            <input name="property_document[]" type="file" multiple class="upload__inputfile"
                                                accept="image/*,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,video/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3 class="text-white">Media Uploads</h3>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="border_box_one">
                            <h5 class="mb-2">Image Gallery</h5>
                            <div class="col-12">
                                <div class="upload__box">
                                    <div class="upload__img-wrap"></div>
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p>Drag your Image here<span class="or">OR</span> <span class="browse_option">Browse from
                                                    device</span>
                                            </p>
                                            <input name="gallery_imgs[]" type="file" multiple="multiple" class="upload__inputfile" data-max_length="20" required>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="">Video URL:</h5>
                                        <a href="#!" class="add_url_btn">Add another video</a>
                                    </div>
                                    <div id="video_inputs_wrapper">
                                        <div class="video_input d-flex align-items-center mb-2">
                                            <input class="form-control gen_input" type="url" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                                        </div>
                                    </div>
                                    <p id="error_message" style="color: red; display: none;">You can only add up to 3 video
                                        URLs.
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="upload__box">
                                        <div class="upload__img-wrap"></div>
                                        <div class="upload__btn-box">
                                            <label class="upload__btn">
                                                <p>
                                                    Drag your Video here
                                                    <span class="text-800 px-1">or</span>
                                                    <button class="btn btn-link p-0" type="button">Browse from
                                                        device</button>
                                                </p>
                                                <input name="pro_video_url[]" type="file" multiple class="upload__inputfile" accept="video/*">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pb-4">
                        <h2 class="text-white mb-3">Agent/Seller Information</h2>
                        <div class="border_box_one mb-4">
                            <div class="row gy-3">
                                <div class="col-6">
                                    <h5 class="mb-2">First Name <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one mb-3" type="text" name="first_name" placeholder="First Name" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">Last Name <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one mb-3" type="text" name="last_name" placeholder="Last Name" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">If Agent - Brokerage Name <small class="text-muted">(Optional)</small>
                                    </h5>
                                    <input class="form-control gen_input_one mb-3" type="text" name="agent_name" placeholder="If Agent - Brokerage Name" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Contact Email <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one mb-3" type="email" name="email" placeholder="Type Email" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Phone Number <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one mb-3 phone-input" type="tel" name="number" placeholder="Type Phone Number" required />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Website Link <small class="text-muted">(Optional)</small></h5>
                                    <input class="form-control gen_input_one mb-3" type="text" name="website_link" placeholder="example@abcd.com" />
                                </div>
                            </div>
                            <h5 class="mb-3">Upload Your Photo <small class="text-muted mb-3">(Optional) </small></h5>
                            <div class="upload__box">
                                <div class="upload__img-wrap"></div>
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                        <p>Drag your image here<span class="or">OR</span> <span class="browse_option">Browse
                                                from
                                                device</span>
                                        </p>
                                        <input name="per_pic[]" type="file" multiple="multiple" class="upload__inputfile">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-white mb-3">Social Media Links</h2>
                        <div class="border_box_one">
                            <div class="row gy-3">
                                <div class="col-6">
                                    <h5 class="mb-2">Facebook</h5>
                                    <input class="form-control gen_input_one mb-3" type="url" name="facebook" placeholder="Paste link here" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">Instagram</h5>
                                    <input class="form-control gen_input_one mb-3" type="url" name="insta" placeholder="Paste link here" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">TikTok</h5>
                                    <input class="form-control gen_input_one mb-3" type="url" name="tiktok" placeholder="Paste link here" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">LinkedIn</h5>
                                    <input class="form-control gen_input_one mb-3" type="url" name="linkedin" placeholder="Paste link here" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">YouTube</h5>
                                    <input class="form-control gen_input_one mb-3" type="url" name="youtube" placeholder="Paste link here" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-2">Zillow </h5>
                                    <input class="form-control gen_input_one mb-3" type="url" name="zillow" placeholder="Paste link here" />
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="tc_agree">
                                        <label class="form-check-label" for="tc_agree">
                                            I have read and agree to the website <a href="#!">terms</a> and <a href="#!">conditons</a>.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-auto d-flex justify-content-end gap-3">
                            @if (Auth::user()->usertype == 1)
                                <a href="{{ url('manage_realstate') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a>
                            @else
                                <a href="{{ url('realstate-listing') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a>
                            @endif
                            {{-- <a href="{{ url('products') }}/{{ last(request()->segments()) }}"
                            class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a> --}}
                            <button class="btn submit_btn_one" type="submit">Submit</button>
                            <button type="button" id="previewBtn" class="btn submit_btn_one">Preview</button>
                        </div>
                    </div>
            </form>

            
        </div>
        <div id="fsmOverlay" class="fsm-overlay">
                <div class="fsm-dialog">
                    <button class="fsm-close" aria-label="Close modal">×</button>
                    <div class="fsm-content">
                        <div class="cus_col view_detail_page">
                            <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="detail_left">
                                    <h3 class="sale_tag">Sale</h3>
                                    <div class="top_blue_strip">
                                        <h3 class="heading44px fw_700 text_border">new jersey (NJ) </h3>
                                    </div>
                                    <div class="relative_img_box">
                                        <div class="swiper horse_swiper_one">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="/assets/images/farm_3.jpg" alt="img" class="img-fluid w-100 img_radius_one"></div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="horser_information_box mb-0">
                                        <div class="custome_listing_row">
                                        <div class="custome_listing_col">
                                            <ul class="info_list_one">
                                                <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid"></span> <span>99 Acres</span></li>
                                                <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid"></span> <span>4 Bedrooms </span></li>
                                                <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid"></span> <span>3 Baths </span></li>
                                                <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid"></span> <span>2 Detached</span></li>
                                            </ul>
                                        </div>
                                        <div class="custome_listing_col">
                                            <ul class="info_list_one">
                                                <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_5.png" alt="img" class="img-fluid"></span> <span>0 Barn</span></li>
                                                <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_6.png" alt="img" class="img-fluid"></span> <span>0 Stalls </span></li>
                                                <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_7.png" alt="img" class="img-fluid"></span> <span>Indoor : yes </span></li>
                                                <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_8.png" alt="img" class="img-fluid"></span> <span>Pastures: 10</span></li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="horser_information_box type_one">
                                        <h3 class="heading30px price_Text">PRICE : $1,000,000</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="content_scroll detail_right ">
                                    <div class="image-grid">
                                        <a href="#!"><img src="https://horse-dev.testlinkdev.com/Gallery_imgs/1771474496_88.png" alt="img"></a>
                                        <a href="#!"><img src="https://horse-dev.testlinkdev.com/Gallery_imgs/1771474496_88.png" alt="img"></a>
                                        <a href="#!"><img src="https://horse-dev.testlinkdev.com/Gallery_imgs/1771474496_88.png" alt="img"></a>
                                        <a href="#!"><img src="https://horse-dev.testlinkdev.com/Gallery_imgs/1771474496_88.png" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="cus_col view_detail_page">
                            <div class="mb-4 border_box_one">
                            <h3 class="heading44px fw_700 about_horse_heading">About Farm:</h3>
                            <p>Tgreat propertyTHis is a great propertyTHis is a great property</p>
                            </div>
                            <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>ADDITIONAL INFORMATION</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="mb-4 border_box_one">
                            <p>Tgreat propertyTHis is a great propertyTHis is a great property</p>
                            </div>
                        </div>
                        <div class="cus_col view_detail_page">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>FACILITY AMENITIES</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one p-3">
                            <table class="barn-table">
                                <tbody>
                                    <tr>
                                        <td>BARN TYPE :</td>
                                        <td colspan="1">Center Aisle Barn</td>
                                    </tr>
                                    <tr>
                                        <td># OF BARNS:</td>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td># OF STALLS:</td>
                                        <td>20</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>RUBBER MATS IN STALLS:</td>
                                        <td>yes</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>BARN FLOORING:</td>
                                        <td>vinyl</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>TACK ROOM:</td>
                                        <td>yes</td>
                                        <td>Heated: no</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>WASH STALL:</td>
                                        <td>Hay loft</td>
                                        <td>Cold Water: yes</td>
                                        <td>Hot Water: no</td>
                                    </tr>
                                    <tr>
                                        <td>AIR CONDITIONED BARN:</td>
                                        <td>no</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>HEATED BARN:</td>
                                        <td>no</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td># OF RUN-IN SHEDS:</td>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td># OF DRY LOTS:</td>
                                        <td>yes</td>
                                        <td>5</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td># OF GRASS PASTURES:</td>
                                        <td>yes</td>
                                        <td>10</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>FENCING TYPE:</td>
                                        <td>Electric</td>
                                        <td>Vinyl</td>
                                        <td>Wood</td>
                                    </tr>
                                    <tr>
                                        <td>OUTDOOR RIDING RING:</td>
                                        <td>yes</td>
                                        <td>×</td>
                                        <td>Watering System: no</td>
                                    </tr>
                                    <tr>
                                        <td>INDOOR RIDING RING:</td>
                                        <td>yes</td>
                                        <td>×</td>
                                        <td>Watering System: no</td>
                                    </tr>
                                    <tr>
                                        <td>ROUND PEN:</td>
                                        <td>yes</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>TRAILS ON PROPERTY:</td>
                                        <td>No</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>TRAIL ACCESS:</td>
                                        <td>No</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>HAY FIELDS:</td>
                                        <td>No</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="cus_col view_detail_page">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>PROPERTY AMENITIES</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one p-3">
                            <table class="barn-table">
                                <tbody>
                                    <tr>
                                        <td class="label">HOUSE TYPE :</td>
                                        <td>Home with Acreage</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="label">ACREAGE:</td>
                                        <td>99 Acres</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="label"># OF BEDROOMS:</td>
                                        <td>4</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="label"># OF BATHROOMS:</td>
                                        <td>3</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="label">GARAGE:</td>
                                        <td>2</td>
                                        <td>Detached, Attached, Tandem, Oversized</td>
                                    </tr>
                                    <tr>
                                        <td class="label">HOT TUB:</td>
                                        <td>No</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="label">POOL:</td>
                                        <td>No</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="cus_col view_detail_page">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>DOCUMENTS</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one">
                            <div class="row mb-4 gy-4">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="col-4">
                                        <a href="#!" class="d-block w-100">
                                        <img src="/assets/images/pdf.png" alt="img" class="img-fluid w-100">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="cus_col view_detail_page">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="heading44px fw_700 m-0">ABOUT THE AGENT | SELLER:</h3>
                            <a href="#!" class="horse_info_btn">CHAT WIH SELLER</a>
                            </div>
                            <div class="row mb-4">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="seller_img">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" alt="img" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="heading18px mb-2">Social Links</h1>
                                <div class="social_icons mb-3">
                                    <a href="javascript:;" target="_blank" title="Website Link" class="web_btn">Website</a>
                                    <a href="#" target="_blank"><img src="/assets/images/facebook.png" alt="img" class="img-fluid"></a>
                                    <a href="#" target="_blank"><img src="/assets/images/youtube.png" alt="img" class="img-fluid"></a>
                                    <a href="#" target="_blank"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid"></a>
                                    <a href="#" target="_blank"><img src="/assets/images/instagram.png" alt="img" class="img-fluid"></a>
                                </div>
                                <h1 class="heading18px mb-2">Contact</h1>
                                <div class="social_icons">
                                    <a href="tel:(908) 892-7515"><img src="/assets/images/call.png" alt="img" class="img-fluid"></a>
                                    <a href="mailto:cait3221@gmail.com"><img src="/assets/images/email.png" alt="img" class="img-fluid"></a>
                                </div>
                            </div>
                            </div>
                        </div>

                         <div class="cus_col view_detail_page">
                         <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>VIDEO</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                             <video class="img-fluid" loop playsinline controls>
                                <source src="/assets/videos/your-video.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                         </div>
                    </div>
                </div>
            </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".variant_btn input[type='checkbox']").on("change", function() {
                let listItem = $(this).closest("li");
                let imgSrc = listItem.find("img").attr("src");

                if ($(this).is(":checked")) {
                    listItem.find("input[type='hidden']").val(imgSrc);
                } else {
                    listItem.find("input[type='hidden']").val("");
                }
            });
        });

        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    var imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length') || 10;
                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);

                    filesArr.forEach(function(f) {
                        if (
                            !f.type.match('image.*') &&
                            !f.type.match('application/pdf') &&
                            !f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document') &&
                            !f.type.match('video.*')
                        ) {
                            return;
                        }

                        if (imgArray.length >= maxLength) return;

                        imgArray.push(f);
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var iconClass = "";
                            var iconContent = "";
                            var style = "";

                            if (f.type.match('image.*')) {
                                iconClass = "img-bg";
                                style = `background-image: url(${e.target.result})`;
                            } else if (f.type.match('application/pdf')) {
                                iconClass = "pdf-icon";
                                iconContent = "📄";
                            } else if (f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document')) {
                                iconClass = "docx-icon";
                                iconContent = "📃";
                            } else if (f.type.match('video.*')) {
                                iconClass = "video-icon";
                                iconContent = "🎥";
                            }

                            var html = `
                    <div class='upload__img-box'>
                        <div class='${iconClass}' style='${style}' data-number='${$(".upload__img-close").length}' data-file='${f.name}'>
                        ${iconContent ? `<div class='file-icon-text'>${iconContent}</div>` : ""}
                        <div class='upload__img-close'>×</div>
                        </div>
                    </div>
                    `;
                            imgWrap.append(html);
                        };

                        if (f.type.match('image.*')) {
                            reader.readAsDataURL(f);
                        } else {
                            reader.onload(); // Manually trigger for non-image files
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).closest('.upload__img-box').remove();
            });
        }
    </script>

    <script>
        function toggleInput(checkboxId, inputDivId) {
            const checkbox = document.getElementById(checkboxId);
            const inputDiv = document.getElementById(inputDivId);
            if (checkbox.checked) {
                inputDiv.style.display = "block";
            } else {
                inputDiv.style.display = "none";
                const inputField = inputDiv.querySelector("input");
                if (inputField) {
                    inputField.value = ""; // Clear input if unchecked
                }
            }
        }
    </script>

    <script>
        const addBtn = document.querySelector('.add_url_btn');
        const wrapper = document.getElementById('video_inputs_wrapper');
        const errorMsg = document.getElementById('error_message');

        addBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const inputs = wrapper.querySelectorAll('.video_input');

            if (inputs.length >= 3) {
                errorMsg.style.display = 'block';
                return;
            } else {
                errorMsg.style.display = 'none';
            }

            const newInputDiv = document.createElement('div');
            newInputDiv.className = 'video_input d-flex align-items-center mb-2';

            newInputDiv.innerHTML = `
           <input class="form-control gen_input" type="text" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
           <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
       `;

            wrapper.appendChild(newInputDiv);

            newInputDiv.querySelector('.remove_btn').addEventListener('click', () => {
                newInputDiv.remove();
                errorMsg.style.display = 'none';
            });
        });
    </script>

    <script>
        document.querySelectorAll('.thousand-separator').forEach(function(input) {
            input.addEventListener('input', function(e) {
                let raw = e.target.value.replace(/[^0-9]/g, ''); // Strip non-numeric
                if (raw) {
                    e.target.value = '$' + Number(raw).toLocaleString();
                } else {
                    e.target.value = '';
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.price-input').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.value = this.value.replace(/[^0-9]/g, ''); // remove $ and commas
            });

            input.addEventListener('blur', function() {
                let raw = this.value.replace(/[^0-9]/g, '');
                if (raw) {
                    this.value = '$' + Number(raw).toLocaleString();
                } else {
                    this.value = '';
                }
            });
        });
    </script>

    <!-- <script>
        // Auction Bid Box Toggle
        const auctionRadioButtons = document.querySelectorAll('input[name="ad_type"]');
        const bidBox = document.querySelector('.bid_box');

        function toggleBidBox() {
            const selected = document.querySelector('input[name="ad_type"]:checked');
            if (selected && selected.value === "Auction") {
                bidBox.style.display = 'block';
            } else {
                bidBox.style.display = 'none';
            }
        }

        auctionRadioButtons.forEach(rb => {
            rb.addEventListener('change', toggleBidBox);
        });

        // Initial state
        document.addEventListener("DOMContentLoaded", toggleBidBox);
    </script> -->

    <script>
        $(document).ready(function() {
            function toggleHiddenBox() {
                if ($('#indoor_two_yes').is(':checked')) {
                    $('.hidden_box_one').show();
                } else {
                    $('.hidden_box_one').hide();
                }
            }

            function toggleHiddenBoxTwo() {
                if ($('#wash_stall_yes').is(':checked')) {
                    $('.hidden_box_two').show();
                } else {
                    $('.hidden_box_two').hide();
                }
            }

            function toggleHiddenBoxThree() {
                if ($('#outdoor_yes').is(':checked')) {
                    $('.hidden_box_three').show();
                } else {
                    $('.hidden_box_three').hide();
                }
            }

            function toggleHiddenBoxFour() {
                if ($('#w_sys_yes').is(':checked')) {
                    $('.hidden_box_four').show();
                } else {
                    $('.hidden_box_four').hide();
                }
            }

            function toggleHiddenBoxFive() {
                if ($('#indoor_yes').is(':checked')) {
                    $('.hidden_box_five').show();
                } else {
                    $('.hidden_box_five').hide();
                }
            }

            function toggleHiddenBoxSix() {
                if ($('#indoor_w_sys_yes').is(':checked')) {
                    $('.hidden_box_six').show();
                } else {
                    $('.hidden_box_six').hide();
                }
            }

            function toggleHiddenBoxSeven() {
                if ($('#dry_lots_yes').is(':checked')) {
                    $('.hidden_box_seven').show();
                } else {
                    $('.hidden_box_seven').hide();
                }
            }

            function toggleHiddenBoxEight() {
                if ($('#fgp_yes').is(':checked')) {
                    $('.hidden_box_eight').show();
                } else {
                    $('.hidden_box_eight').hide();
                }
            }


            function toggleHiddenBoxNine() {
                if ($('#garage_yes').is(':checked')) {
                    $('.garage_box').show();
                } else {
                    $('.garage_box').hide();
                }
            }

            // Initial checks on page load
            toggleHiddenBox();
            toggleHiddenBoxTwo();
            toggleHiddenBoxThree();
            toggleHiddenBoxFour();
            toggleHiddenBoxFive();
            toggleHiddenBoxSix();
            toggleHiddenBoxSeven();
            toggleHiddenBoxEight();
            toggleHiddenBoxNine();

            // Bind the change events correctly
            $('input[name="tack_room"]').on('change', toggleHiddenBox);
            $('input[name="wash_stall"]').on('change', toggleHiddenBoxTwo);
            $('input[name="out_ride_ring"]').on('change', toggleHiddenBoxThree);
            $('input[name="w_system"]').on('change', toggleHiddenBoxFour);
            $('input[name="in_ride_ring"]').on('change', toggleHiddenBoxFive);
            $('input[name="indoor_w_system"]').on('change', toggleHiddenBoxSix);
            $('input[name="dry_lots"]').on('change', toggleHiddenBoxSeven);
            $('input[name="fenced_grass"]').on('change', toggleHiddenBoxEight);
            $('input[name="real_garage"]').on('change', toggleHiddenBoxNine);
        });
    </script>

    <script>
        function formatPhoneNumber(input) {
            let value = input.value.replace(/\D/g, "");

            if (value.length > 10) {
                value = value.slice(0, 10);
            }

            let formatted = "";
            if (value.length > 0) {
                formatted += "(" + value.substring(0, 3);
            }
            if (value.length >= 4) {
                formatted += ") " + value.substring(3, 6);
            }
            if (value.length >= 7) {
                formatted += "-" + value.substring(6, 10);
            }

            input.value = formatted;
        }

        // Attach to all inputs with class 'phone-input'
        document.querySelectorAll('.phone-input').forEach(input => {
            input.addEventListener('input', function() {
                formatPhoneNumber(this);
            });
        });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const overlay = document.getElementById("fsmOverlay");
        const previewBtn = document.getElementById("previewBtn");
        const closeBtn = overlay.querySelector(".fsm-close");
        const placeholderImg = "/assets/images/placeholder.png";

        // Utility: Get Value from Input or Select
        const getVal = (name, isSelect = false) => {
            const el = document.querySelector(`${isSelect ? 'select' : 'input'}[name="${name}"]`);
            return el && el.value ? el.value : "N/A";
        };

        // Utility: Get Radio Value
        const getRadioVal = (name) => {
            const checked = document.querySelector(`input[name="${name}"]:checked`);
            return checked ? checked.value : "no";
        };

        // Utility: Get Checkbox Values (Comma Separated)
        const getCheckboxVals = (name) => {
            const checked = Array.from(document.querySelectorAll(`input[name="${name}"]:checked`)).map(el => el.value);
            return checked.length > 0 ? checked.join(', ') : "None";
        }

        previewBtn.addEventListener("click", function(e) {
            e.preventDefault();

            // 1. TOP SECTION (Ad Type & Header Location)
            overlay.querySelector('.sale_tag').textContent = getRadioVal('ad_type');
            const topLocation = overlay.querySelector('.text_border');
            if(topLocation) {
                topLocation.textContent = getVal('real_location', true);
            }
            overlay.querySelector('.price_Text').textContent = "PRICE : " + getVal('real_price');

            // 2. INFO LIST (Acres, Beds, Barns etc.)
            const infoList = overlay.querySelectorAll('.info_list_one');
            if (infoList.length >= 2) {
                const leftItems = infoList[0].querySelectorAll('li span:last-child');
                leftItems[0].textContent = getVal('real_acres') + " Acres";
                leftItems[1].textContent = getVal('real_bedroom') + " Bedrooms";
                leftItems[2].textContent = getVal('real_bathroom') + " Baths";
                leftItems[3].textContent = getVal('num_spaces') + " " + getCheckboxVals('garage_type[]');

                const rightItems = infoList[1].querySelectorAll('li span:last-child');
                rightItems[0].textContent = (getVal('num_barn') === "N/A" ? "0" : getVal('num_barn')) + " Barn";
                rightItems[1].textContent = (getVal('num_stalls') === "N/A" ? "0" : getVal('num_stalls')) + " Stalls";
                rightItems[2].textContent = "Indoor: " + getRadioVal('in_ride_ring');
                rightItems[3].textContent = "Pastures: " + (getVal('num_fenced_grass') === "N/A" ? "0" : getVal('num_fenced_grass'));
            }

            // 3. IMAGE GALLERY & SWIPER
            const mainSwiperWrapper = overlay.querySelector('.horse_swiper_one .swiper-wrapper');
            const gridWrapper = overlay.querySelector('.image-grid');
            const galleryFiles = document.querySelector('input[name="gallery_imgs[]"]').files;

            mainSwiperWrapper.innerHTML = '';
            gridWrapper.innerHTML = '';

            if (galleryFiles && galleryFiles.length > 0) {
                Array.from(galleryFiles).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        if(index === 0) {
                            mainSwiperWrapper.innerHTML = `<div class="swiper-slide"><img src="${e.target.result}" class="img-fluid w-100 img_radius_one"></div>`;
                        }
                        gridWrapper.insertAdjacentHTML('beforeend', `<a href="#!"><img src="${e.target.result}" alt="img"></a>`);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                mainSwiperWrapper.innerHTML = `<div class="swiper-slide"><img src="${placeholderImg}" class="img-fluid w-100 img_radius_one"></div>`;
                gridWrapper.innerHTML = `<a href="#!"><img src="${placeholderImg}"></a>`.repeat(4);
            }

            // 4. DOCUMENTS PREVIEW (Images/PDF/Docs) - UPDATED logic
            const docRow = overlay.querySelector('.cus_col.view_detail_page .border_box_one .row.mb-4.gy-4');
            const docFiles = document.querySelector('input[name="property_document[]"]').files;
            docRow.innerHTML = ''; 

            if (docFiles && docFiles.length > 0) {
                Array.from(docFiles).forEach(file => {
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            docRow.insertAdjacentHTML('beforeend', `
                                <div class="col-lg-3 col-md-4 col-6 text-center">
                                    <div style="height: 100px; background: #f8f8f8; border-radius: 8px; overflow: hidden; margin-bottom:5px;">
                                        <img src="${e.target.result}" class="img-fluid" style="height:100%; width:100%; object-fit:cover;">
                                    </div>
                                    <p style="font-size:12px; color:#000; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">${file.name}</p>
                                </div>`);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // PDF or Word detection
                        let iconPath = "/assets/images/pdf.png"; 
                        let label = "PDF";
                        if (file.type.includes('word') || file.name.endsWith('.docx') || file.name.endsWith('.doc')) {
                            iconPath = "/assets/images/docx.png";
                            label = "DOC";
                        }
                        docRow.insertAdjacentHTML('beforeend', `
                            <div class="col-lg-3 col-md-4 col-6 text-center">
                                <div style="height: 100px; background: #f8f8f8; border-radius: 8px; display:flex; align-items:center; justify-content:center; margin-bottom:5px;">
                                    <img src="${iconPath}" class="img-fluid" style="max-height:60px;">
                                </div>
                                <p style="font-size:12px; color:#000; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">${label}: ${file.name}</p>
                            </div>`);
                    }
                });
            } else {
                docRow.innerHTML = '<p class="text-muted w-100 text-center">No documents uploaded.</p>';
            }

            // 5. TEXT AREAS (Overview & Writeup)
            const textBoxes = overlay.querySelectorAll('.view_detail_page .border_box_one p');
            if(textBoxes.length >= 2) {
                textBoxes[0].textContent = document.querySelector('textarea[name="property_overview"]').value || "N/A";
                textBoxes[1].textContent = document.querySelector('textarea[name="ad_write_up"]').value || "N/A";
            }

            // 6. FACILITY TABLE MAPPING
            const table = overlay.querySelector('.barn-table');
            if (table) {
                const rows = table.rows;
                rows[0].cells[1].innerText = getVal('property_type', true);
                rows[1].cells[1].innerText = getVal('num_barn');
                rows[2].cells[1].innerText = getVal('num_stalls');
                rows[3].cells[1].innerText = getRadioVal('rubber_matts');
                rows[4].cells[1].innerText = getVal('barn_flooring');
                rows[5].cells[1].innerText = getRadioVal('tack_room');
                rows[5].cells[2].innerText = "Heated: " + getRadioVal('heated_not');
                rows[6].cells[1].innerText = getCheckboxVals('hay_storage[]'); 
                rows[6].cells[2].innerText = "Cold Water: " + getRadioVal('cold_water');
                rows[6].cells[3].innerText = "Hot Water: " + getRadioVal('hot_water');
            }

            // 7. AGENT SECTION
            const agentHeader = overlay.querySelector('.view_detail_page h3.heading44px:not(.about_horse_heading)');
            if(agentHeader) {
                agentHeader.textContent = "" + getVal('real_location', true);
            }
            
            const sellerImg = overlay.querySelector('.seller_img img');
            const perPicInput = document.querySelector('input[name="per_pic[]"]');
            
            if (perPicInput.files && perPicInput.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => sellerImg.src = e.target.result;
                reader.readAsDataURL(perPicInput.files[0]);
            } else {
                sellerImg.src = "https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg";
            }

            // 8. VIDEO PREVIEW (NEW LOGIC)
            const videoInput = document.querySelector('input[name="pro_video_url[]"]');
            const videoElement = overlay.querySelector("video");
            const videoSection = videoElement.closest('.cus_col'); // Video's parent container

            if (videoInput && videoInput.files && videoInput.files[0]) {
                const file = videoInput.files[0];
                const fileURL = URL.createObjectURL(file);
                
                videoElement.src = fileURL;
                videoSection.style.display = "block"; // Show section
                videoElement.load(); // Reload to play the new source
            } else {
                videoSection.style.display = "none"; // Hide if no video
            }

            // SOCIAL & CONTACT LINKS
            const socialLinks = overlay.querySelectorAll('.social_icons a');
            if(socialLinks.length > 0) {
                socialLinks[0].href = getVal('website_link') !== "N/A" ? getVal('website_link') : "#!";
                socialLinks[1].href = getVal('facebook') !== "N/A" ? getVal('facebook') : "#!";
                socialLinks[2].href = getVal('youtube') !== "N/A" ? getVal('youtube') : "#!";
                socialLinks[3].href = getVal('tiktok') !== "N/A" ? getVal('tiktok') : "#!";
                socialLinks[4].href = getVal('insta') !== "N/A" ? getVal('insta') : "#!";
            }

            const contactLinks = overlay.querySelectorAll('.social_icons:last-child a');
            if(contactLinks.length >= 2) {
                contactLinks[0].href = "tel:" + getVal('number');
                contactLinks[1].href = "mailto:" + getVal('email');
            }

            // Show Modal
            overlay.classList.add("is-visible");
            document.body.style.overflow = "hidden";
        });

        // Close Modal
        closeBtn.addEventListener("click", () => {
            overlay.classList.remove("is-visible");
            document.body.style.overflow = "";
            
            // Stop video on close
            const videoElement = overlay.querySelector("video");
            if(videoElement) videoElement.pause();
        });

        window.addEventListener("click", (e) => {
            if (e.target === overlay) {
                overlay.classList.remove("is-visible");
                document.body.style.overflow = "";
                const videoElement = overlay.querySelector("video");
                if(videoElement) videoElement.pause();
            }
        });
    });
</script>
@endsection
