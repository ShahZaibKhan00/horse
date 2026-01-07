@php
    $layout = $usertype == 1 ? 'layouts.admin_app' : 'layouts.user_app';
@endphp

@extends($layout)
@section('content')
    <style>
        .file-main-box {
            width: fit-content;
            margin-left: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .file-main-box h3 {
            font-size: 16px;
        }

        .file-wrapper {
            width: 130px;
            height: 130px;
            border: 2px dashed #1d2139;
            position: relative;
            margin: 0 auto;
            margin-top: 0;
            /* background: #1d2139; */
            border-radius: 18px;
        }

        .file-wrapper:after {
            content: '+';
            position: absolute;
            top: 0;
            bottom: 50px;
            left: 0;
            right: 0;
            margin: auto;
            width: max-content;
            height: max-content;
            display: block;
            max-height: 85px;
            font-size: 70px;
            font-weight: bolder;
            color: #1d2139;
        }

        .file-wrapper:before {
            content: 'Upload Image';
            display: block;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            bottom: 25px;
            width: max-content;
            height: max-content;
            font-size: 0.75em;
            color: #1d2139;
        }

        .file-wrapper:hover:after {
            font-size: 73px;
        }

        .file-wrapper .close-btn {
            display: none;
        }

        input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-main-box input[type="file"] {
            z-index: 99999;
        }

        .file-set {
            background-size: cover;
            background-repeat: no-repeat;
            color: transparent;
            padding: 10px;
            border-width: 0px;
        }

        .file-set:hover {
            transition: all 0.5s ease-out;
            filter: brightness(110%);
        }

        .file-set:before {
            color: transparent;
        }

        .file-set:after {
            color: transparent;
        }

        .file-set .close-btn {
            position: absolute;
            width: 35px;
            height: 35px;
            display: block;
            background: #000;
            color: #fff;
            top: 0;
            right: 0;
            font-size: 25px;
            text-align: center;
            line-height: 1.5;
            cursor: pointer;
            opacity: 0.8;
        }

        .file-set>input {
            pointer-events: none;
        }

        .upload_img_box {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 5px;
            background-color: #1d2139;
        }

        .upload_img_box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .upload_img_box.inactive {
            filter: blur(2px);
            pointer-events: none;
        }

        .remove-multi-img,
        .remove-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            font-size: 14px;
            line-height: 20px;
            cursor: pointer;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .multi_up_btn {
            width: 100%;
            height: 200px;
            border: 1px dashed #ccc;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            cursor: pointer;
        }

        .asterisk {
            color: red;
        }

        .textarea {
            font-size: 0.8rem;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #EBEBEB;
            outline: none;
            background: #EBEBEB;
        }

        .placeholder_new {
            color: #313755;
            font-size: 0.8rem;
            padding: 7px 10px;
        }

        .dropdown-container {
            position: relative;
            width: 100%;
            font-family: sans-serif;
        }

        .dropdown-header {
            border: 2px solid #1d2139;
            padding: 9px 7px;
            cursor: pointer;
            display: flex;
            width: 100%;
            height: 55px;
            flex-wrap: wrap;
            gap: 5px;
            border-radius: 10px;
            background: white;
        }

        .dropdown-header .tag {
            background-color: #e0e5e9;
            padding: 4px 12px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            font-size: 0.8rem;
        }

        .dropdown-header .tag button {
            background: none;
            border: none;
            margin-left: 5px;
            cursor: pointer;
        }

        .dropdown-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-top: none;
            background: white;
            z-index: 999;
            display: none;
        }

        .dropdown-list.active {
            display: block;
        }

        .dropdown-list div {
            padding: 10px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .dropdown-list div:hover {
            background-color: #f0f0f0;
        }

        .gen_flex_box {
            display: flex;
            align-items: center;
            gap: 15px
        }

        .gen_flex_box input {
            width: 100px;
        }

        .gen_flex_box h5 {
            font-size: 15px;
            height: 37px;
            display: flex;
            align-items: center;
            color: #31374a;
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
            overflow: visible;
        }

        .upload__img-close {
            width: 18px;
            height: 18px;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: -15px;
            right: -15px;
            text-align: center;
            line-height: 16px;
            z-index: 999;
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

        .custom-upload__inputfile {
            width: 100%;
            height: 100%;
            opacity: 0;
            position: absolute;
            z-index: 99;
            top: 0;
            left: 0;
        }

        .custom-upload__btn-box {
            width: 100%;
            height: 200px;
            border: 1px dashed #000;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .custom-upload__btn p {
            margin: 0 !important;
            color: #ccc;
        }

        .browse_option {
            color: #8d8d8d;
            font-weight: 400;
        }

        label.custom-upload__btn p {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-upload__box {
            margin-bottom: 40px;
        }

        .custom-upload-img-box {
            width: 100px;
            height: 100px;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: default;
            position: relative;
            border-radius: 8px;
            padding: 10px;
        }

        .custom-remove-btn {
            position: absolute;
            top: 2px;
            right: 4px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            cursor: pointer;
            display: none;
            font-size: 14px;
            line-height: 1;
        }

        .custom-upload-img-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* filter: brightness(0) invert(1); */
        }

        .custom-upload-images-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            max-width: 1100px;
        }

        .custom-relative-box {
            position: relative;
        }

        .custom-relative-box p {
            position: absolute;
            top: -26px;
            width: 100%;
            text-align: center;
            color: #000;
        }

        .custom-relative-box p a {
            text-decoration: underline;
            text-transform: capitalize;
            font-weight: 700;
        }

        .custom-upload-img-box.inactive {
            display: none;
        }

        .profile-upload-container {
            text-align: center;
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-pic-wrapper {
            position: relative;
            display: inline-block;
            width: 120px;
            height: 120px;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            border: 2px dashed #ccc;
        }

        .profile-pic-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .profile-remove-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            border-radius: 50%;
            font-size: 16px;
            padding: 2px 6px;
            cursor: pointer;
            line-height: 1;
        }

        .profile-error-msg {
            color: red;
            font-size: 14px;
        }

        .heading__lg {
            font-size: 35px;
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

        .service-category {
            margin-bottom: 25px;
        }

        .category-title {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            margin-bottom: 1rem;
        }

        .custom-multiselect{
            position: relative;
            width: 100%;
            }

           .selected-tags {
                display: flex;
                align-items: center;
                gap: 6px;
                flex-wrap: wrap;
                min-height: 44px;
                padding: 4px 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                background: #fff;
                cursor: text;
                height: 55px !important;
                border: 2px solid #1d2139;
                border-radius: 8px !important;
            }

           .selected-tags .tag {
                    background-color: #e0e5e9;
                    padding: 10px 12px;
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    font-size: 0.8rem;
                    gap: 8px;
                }

            .selected-tags .tag .remove {
            cursor: pointer;
            font-weight: 700;
            padding-left: 4px;
            }

            .multi-input{
            min-width: 140px;
            border: none;
            outline: none;
            font-size: 14px;
            padding: 6px 4px;
            flex: 1 0 140px;
            background: transparent;
            }

            .custom-multiselect .dropdown {
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            z-index: 999;
            border-radius: 4px;
            padding: 6px 0;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
            }

            .custom-multiselect .dropdown div {
            padding: 8px 12px;
            cursor: pointer;
            font-size: 13px;
            color: #000;
            }

            .custom-multiselect .dropdown div:hover {
            background-color: #f0f0f0;
            }

            .hidden { display: none; }

            /* small hint style when no results */
            .dropdown .no-results {
            padding: 8px 12px;
            color: #777;
            font-size: 13px;
            }


        .price-input-box {
            position: relative;
            margin-bottom: 10px;
        }
        .remove-btn {
            position: absolute;
            right: 10px;
            top: 8px;
            background: none;
            border: none;
            color: #dc3545;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
    <div class="content user_main_content p-5">
        <div class="pb-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ url('/service_store') }}" enctype="multipart/form-data" class="row g-3 mb-6">
                @csrf
                <div class="box_top">
                    <h2 class="mb-2 main_heading_dashboard">Service Ad Information</h2>
                    <!-- <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5> -->
                </div>
                <div class="">
                    <div class="col-12">
                        <div class="border_box_one mb-3">
                            <div class="row align-items-end">

                                <div class="col-6">
                                    <h3 class="mb-5 heading__lg">Basic Information</h3>
                                </div>
                                <div class="col-6">
                                    <div class="file-main-box">
                                        <h3 class="mb-3 ">Service Provider Image</h3>
                                        <div class="file-wrapper">
                                            <input type="file" name="ser_profile" accept="image/*" />
                                            <div class="close-btn">×</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mb-2">Full Name <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one   mb-3" type="text" name="full_name" placeholder="Full Name" required />
                                </div>

                                <div class="col-6">
                                    <h5 class="mb-2">Business Name (if applicable)</h5>
                                    <input class="form-control gen_input_one   mb-3" type="text" name="business_name" placeholder="Business Name (if applicable)" />
                                </div>

                                <div class="col-6">
                                    <h5 class="mb-2">Email Address <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one   mb-3" type="email" name="email" placeholder="Email Address" required />
                                </div>

                                <div class="col-6">
                                    <h5 class="mb-2">Phone Number <span class="asterisk">*</span></h5>
                                    <input class="form-control gen_input_one   mb-3 phone-input" type="tel" name="number" placeholder="Phone Number" required />
                                </div>

                                <div class="col-12">
                                    <h5 class="mb-2">Website URL (optional)</h5>
                                    <input class="form-control gen_input_one   mb-3" type="url" name="website_url" placeholder="Website URL (optional)" />
                                </div>
                            </div>
                        </div>

                        <div class="border_box_one mb-3">
                            <h3 class="mb-2">Location <span class="asterisk">*</span> <small class="text-muted">(town,state, US based only)</small></h3>
                            <h4 class="mb-3"><small class="text-muted">(Kindly provide your address to include your business in our map feature, which will assist potential clients in locating your
                                    services more easily.)</small></h4>
                            <div class="row">
                                <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="Address" placeholder="Enter Your Town" /></div>
                                <div class="col-6">
                                    <select class="form-control gen_input mb-3" name="state">
                                        <option value="">Select your State</option>
                                        <option value="alabama">Alabama</option>
                                        <option value="alaska">Alaska</option>
                                        <option value="arizona">Arizona</option>
                                        <option value="arkansas">Arkansas</option>
                                        <option value="california">California</option>
                                        <option value="colorado">Colorado</option>
                                        <option value="connecticut">Connecticut</option>
                                        <option value="delaware">Delaware</option>
                                        <option value="florida">Florida</option>
                                        <option value="georgia">Georgia</option>
                                        <option value="hawaii">Hawaii</option>
                                        <option value="idaho">Idaho</option>
                                        <option value="illinois">Illinois</option>
                                        <option value="indiana">Indiana</option>
                                        <option value="iowa">Iowa</option>
                                        <option value="kansas">Kansas</option>
                                        <option value="kentucky">Kentucky</option>
                                        <option value="louisiana">Louisiana</option>
                                        <option value="maine">Maine</option>
                                        <option value="maryland">Maryland</option>
                                        <option value="massachusetts">Massachusetts</option>
                                        <option value="michigan">Michigan</option>
                                        <option value="minnesota">Minnesota</option>
                                        <option value="mississippi">Mississippi</option>
                                        <option value="missouri">Missouri</option>
                                        <option value="montana">Montana</option>
                                        <option value="nebraska">Nebraska</option>
                                        <option value="nevada">Nevada</option>
                                        <option value="new_hampshire">New Hampshire</option>
                                        <option value="new_jersey">New Jersey</option>
                                        <option value="new_mexico">New Mexico</option>
                                        <option value="new_york">New York</option>
                                        <option value="north_carolina">North Carolina</option>
                                        <option value="north_dakota">North Dakota</option>
                                        <option value="ohio">Ohio</option>
                                        <option value="oklahoma">Oklahoma</option>
                                        <option value="oregon">Oregon</option>
                                        <option value="pennsylvania">Pennsylvania</option>
                                        <option value="rhode_island">Rhode Island</option>
                                        <option value="south_carolina">South Carolina</option>
                                        <option value="south_dakota">South Dakota</option>
                                        <option value="tennessee">Tennessee</option>
                                        <option value="texas">Texas</option>
                                        <option value="utah">Utah</option>
                                        <option value="vermont">Vermont</option>
                                        <option value="virginia">Virginia</option>
                                        <option value="washington">Washington</option>
                                        <option value="west_virginia">West Virginia</option>
                                        <option value="wisconsin">Wisconsin</option>
                                        <option value="wyoming">Wyoming</option>
                                    </select>
                                </div>
                                <h3 class="mb-2">Business Physical Name & Location Required <span class="asterisk">*</span></h3>
                                <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="business_name1" placeholder="Enter Business Name" /></div>
                                <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="business_location1" placeholder="Enter Business Location" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="border_box_one mb-3">
                            <h4 class="mb-3">Service Options</h4>
                            <div class="form-check">
                                <label><input class="form-check-input" type="checkbox" name="service_location[]" value="At Provider’s Facility" /> At Provider’s Facility</label>
                            </div>
                            <div class="form-check">
                                <label><input class="form-check-input" type="checkbox" name="service_location[]" value="Mobile (I travel to client)" /> Mobile (I travel to client)</label>
                            </div>
                            <div class="form-check">
                                <label><input class="form-check-input" type="checkbox" name="service_location[]" value="Virtual / Online Coaching" />Virtual / Online Coaching</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one mb-3">
                            <h3 class="mb-3">About</h3>
                            <div class="col-12">
                                <div class="mb-3">
                                    <h5 class="mb-3">Short Bio / Introduction </h5>
                                    <textarea class="textarea" name="per_bio"  style="width: 100%; height: 15rem;" placeholder="Tell your potential clients about you or your company"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-4">
                                <div class="col-3">
                                    <div class="border_box_one">
                                        <div class="">
                                            <h4 class="mb-3">Experience</h4>
                                            <div class="gen_flex_box">
                                                <input class="form-control gen_input text-center experience-input" type="tel" name="experience" placeholder="---" />
                                                <h5 class="experience-label">Years Experience</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="border_box_one">
                                        <!--<input type="hidden" name="Languages" id="selectedInput_languages">-->
                                        <h4 class="mb-3">Languages Spoken</h4>

                                        <!-- HTML -->
                                        <div class="custom-multiselect" id="languageSelect">
                                            <div class="selected-tags" id="selectedLangTags">
                                                <input type="text" id="langInput" class="multi-input"  placeholder="Select or type language..." />
                                            </div>

                                            <div class="dropdown hidden" id="langDropdown">
                                                <div data-value="English">English</div>
                                                <div data-value="Spanish">Spanish</div>
                                                <div data-value="Chinese">Chinese</div>
                                                <div data-value="French">French</div>
                                                <div data-value="German">German</div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="languages" id="languagesInput" value="">
                                        <!--<div class="dropdown-container" data-dropdown-name="languages">
                                            <div class="dropdown-header"></div>
                                            <div class="dropdown-list">
                                                <div onclick="selectOption(this)" data-value="English">English</div>
                                                <div onclick="selectOption(this)" data-value="Spanish">Spanish</div>
                                                <div onclick="selectOption(this)" data-value="Chinese (Mandarin)">Chinese (Mandarin)</div>
                                                <div onclick="selectOption(this)" data-value="Hindi">Hindi</div>
                                                <div onclick="selectOption(this)" data-value="Arabic">Arabic</div>
                                                <div onclick="selectOption(this)" data-value="Portuguese">Portuguese</div>
                                                <div onclick="selectOption(this)" data-value="Russian">Russian</div>
                                                <div onclick="selectOption(this)" data-value="Japanese">Japanese</div>
                                                <div onclick="selectOption(this)" data-value="French">French</div>
                                                <div onclick="selectOption(this)" data-value="German">German</div>
                                                <div onclick="selectOption(this)" data-value="Korean">Korean</div>
                                                <div onclick="selectOption(this)" data-value="Italian">Italian</div>
                                                <div onclick="selectOption(this)" data-value="Turkish">Turkish</div>
                                                <div onclick="selectOption(this)" data-value="Bengali">Bengali</div>
                                                <div onclick="selectOption(this)" data-value="Vietnamese">Vietnamese</div>
                                                <div onclick="selectOption(this)" data-value="Tagalog">Tagalog</div>
                                                <div onclick="selectOption(this)" data-value="Polish">Polish</div>
                                                <div onclick="selectOption(this)" data-value="Persian (Farsi)">Persian (Farsi)</div>
                                                <div onclick="selectOption(this)" data-value="Gujarati">Gujarati</div>
                                                <div onclick="selectOption(this)" data-value="Greek">Greek</div>
                                                <div onclick="selectOption(this)" data-value="Hebrew">Hebrew</div>
                                                <div onclick="selectOption(this)" data-value="Ukrainian">Ukrainian</div>
                                                <div onclick="selectOption(this)" data-value="Hmong">Hmong</div>
                                                <div onclick="selectOption(this)" data-value="Tamil">Tamil</div>
                                                <div onclick="selectOption(this)" data-value="Dutch">Dutch</div>
                                                <div onclick="selectOption(this)" data-value="Thai">Thai</div>
                                                <div onclick="selectOption(this)" data-value="Armenian">Armenian</div>
                                                <div onclick="selectOption(this)" data-value="Navajo">Navajo</div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="border_box_one">
                                <h4 class="mb-3">Certifications / Accreditations</h4>
                                <div class="upload__box">
                                    <div class="upload__img-wrap"></div>
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p>Drag your file here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                            <input name="certifications[]" type="file" multiple class="upload__inputfile"
                                                accept="image/*,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,video/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <h3 class="mb-3">Type of Services Offered <span class="asterisk">*</span></h3>
                            <div class="row custom_form_checks">
                                <!-- Veterinary & Health Services -->
                                <div class="col-md-4 ">
                                    <div class="service-category">
                                        <h5 class="category-title">Veterinary & Health</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="acupuncture" id="acupuncture">
                                            <label class="form-check-label" for="acupuncture">Acupuncture</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="anhydrosis_treatment" id="anhydrosis_treatment">
                                            <label class="form-check-label" for="anhydrosis_treatment">Anhydrosis diagnosis & treatment</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="blood_transfusion" id="blood_transfusion">
                                            <label class="form-check-label" for="blood_transfusion">Blood transfusion services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="cardiac_telemetry" id="cardiac_telemetry">
                                            <label class="form-check-label" for="cardiac_telemetry">Cardiac telemetry</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="chiropractic_care" id="chiropractic_care">
                                            <label class="form-check-label" for="chiropractic_care">Chiropractic care</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="clinical_trials" id="clinical_trials">
                                            <label class="form-check-label" for="clinical_trials">Clinical trials / research participation</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="dentistry" id="dentistry">
                                            <label class="form-check-label" for="dentistry">Dentistry</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="dermatology" id="dermatology">
                                            <label class="form-check-label" for="dermatology">Dermatology</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="deworming_programs" id="deworming_programs">
                                            <label class="form-check-label" for="deworming_programs">Deworming programs</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="diagnostic_imaging" id="diagnostic_imaging">
                                            <label class="form-check-label" for="diagnostic_imaging">Diagnostic imaging</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="dynamic_endoscopy" id="dynamic_endoscopy">
                                            <label class="form-check-label" for="dynamic_endoscopy">Dynamic endoscopy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="emergency_vet_care" id="emergency_vet_care">
                                            <label class="form-check-label" for="emergency_vet_care">Emergency vet care</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="endoscopy_gastroscopy" id="endoscopy_gastroscopy">
                                            <label class="form-check-label" for="endoscopy_gastroscopy">Endoscopy & gastroscopy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_hospice" id="equine_hospice">
                                            <label class="form-check-label" for="equine_hospice">Equine hospice / end-of-life care</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="shock_wave_therapy" id="shock_wave_therapy">
                                            <label class="form-check-label" for="shock_wave_therapy">Extra-corporeal shock wave therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="fracture_repair" id="fracture_repair">
                                            <label class="form-check-label" for="fracture_repair">Fracture repair surgery</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="gait_analysis" id="gait_analysis">
                                            <label class="form-check-label" for="gait_analysis">Gait analysis and biomechanics</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="general_veterinary" id="general_veterinary">
                                            <label class="form-check-label" for="general_veterinary">General veterinary care</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="genetic_testing" id="genetic_testing">
                                            <label class="form-check-label" for="genetic_testing">Genetic testing & disease screening</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="hyperbaric_oxygen" id="hyperbaric_oxygen">
                                            <label class="form-check-label" for="hyperbaric_oxygen">Hyperbaric oxygen therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="iv_fluid_therapy" id="iv_fluid_therapy">
                                            <label class="form-check-label" for="iv_fluid_therapy">IV fluid therapy for hydration/illness</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="interspinous_desmotomy" id="interspinous_desmotomy">
                                            <label class="form-check-label" for="interspinous_desmotomy">Inter-spinous ligament desmotomy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="internal_medicine" id="internal_medicine">
                                            <label class="form-check-label" for="internal_medicine">Internal medicine specialty consults</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="joint_fusion" id="joint_fusion">
                                            <label class="form-check-label" for="joint_fusion">Joint fusion</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="joint_lavage" id="joint_lavage">
                                            <label class="form-check-label" for="joint_lavage">Joint lavage</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="lameness_evaluation" id="lameness_evaluation">
                                            <label class="form-check-label" for="lameness_evaluation">Lameness evaluation and treatment</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="lung_function_testing" id="lung_function_testing">
                                            <label class="form-check-label" for="lung_function_testing">Lung function testing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mesotherapy" id="mesotherapy">
                                            <label class="form-check-label" for="mesotherapy">Mesotherapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="neurectomy" id="neurectomy">
                                            <label class="form-check-label" for="neurectomy">Neurectomy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="neurological_evaluation" id="neurological_evaluation">
                                            <label class="form-check-label" for="neurological_evaluation">Neurological evaluation</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="nuclear_medicine" id="nuclear_medicine">
                                            <label class="form-check-label" for="nuclear_medicine">Nuclear medicine</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="oncology" id="oncology">
                                            <label class="form-check-label" for="oncology">Oncology</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="prp_irap_stem_cell" id="prp_irap_stem_cell">
                                            <label class="form-check-label" for="prp_irap_stem_cell">PRP / IRAP / stem cell therapies</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="podiatry" id="podiatry">
                                            <label class="form-check-label" for="podiatry">Podiatry (advanced hoof care)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="post_surgical_rehab" id="post_surgical_rehab">
                                            <label class="form-check-label" for="post_surgical_rehab">Post-surgical rehab programs</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="radiology_mri" id="radiology_mri">
                                            <label class="form-check-label" for="radiology_mri">Radiology/CT/MRI/High-field MRI</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="reproductive_services" id="reproductive_services">
                                            <label class="form-check-label" for="reproductive_services">Reproductive services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="respiratory_evaluations" id="respiratory_evaluations">
                                            <label class="form-check-label" for="respiratory_evaluations">Respiratory evaluations and sinus surgery</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="telemetric_diagnostics" id="telemetric_diagnostics">
                                            <label class="form-check-label" for="telemetric_diagnostics">Telemetric diagnostics</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="vaccination_programs" id="vaccination_programs">
                                            <label class="form-check-label" for="vaccination_programs">Vaccination programs</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Alternative & Holistic</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="aromatherapy" id="aromatherapy">
                                            <label class="form-check-label" for="aromatherapy">Aromatherapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="bioresonance_therapy" id="bioresonance_therapy">
                                            <label class="form-check-label" for="bioresonance_therapy">Bioresonance therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="herbal_homeopathic" id="herbal_homeopathic">
                                            <label class="form-check-label" for="herbal_homeopathic">Herbal/homeopathic therapies</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="magnet_therapy" id="magnet_therapy">
                                            <label class="form-check-label" for="magnet_therapy">Magnet therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="pemf" id="pemf">
                                            <label class="form-check-label" for="pemf">PEMF</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="red_light_laser" id="red_light_laser">
                                            <label class="form-check-label" for="red_light_laser">Red light/laser therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="sound_vibration" id="sound_vibration">
                                            <label class="form-check-label" for="sound_vibration">Sound/vibration therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="thermography" id="thermography">
                                            <label class="form-check-label" for="thermography">Thermography</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Breeding & Foaling</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="artificial_insemination" id="artificial_insemination">
                                            <label class="form-check-label" for="artificial_insemination">Artificial insemination</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="breeding_soundness" id="breeding_soundness">
                                            <label class="form-check-label" for="breeding_soundness">Breeding soundness exams</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="foal_handling" id="foal_handling">
                                            <label class="form-check-label" for="foal_handling">Foal handling/imprinting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="foaling_assistance" id="foaling_assistance">
                                            <label class="form-check-label" for="foaling_assistance">Foaling assistance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mare_management" id="mare_management">
                                            <label class="form-check-label" for="mare_management">Mare management</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="stallion_services" id="stallion_services">
                                            <label class="form-check-label" for="stallion_services">Stallion services (stud)</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Sales, Leasing & Auction</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="auction_online" id="auction_online">
                                            <label class="form-check-label" for="auction_online">Auction - On-line</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="auction_live" id="auction_live">
                                            <label class="form-check-label" for="auction_live">Auction - Live</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="consignment_sales" id="consignment_sales">
                                            <label class="form-check-label" for="consignment_sales">Consignment sales</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_leasing_services" id="horse_leasing_services">
                                            <label class="form-check-label" for="horse_leasing_services">Horse leasing services</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Transport & Travel</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="emergency_evacuation" id="emergency_evacuation">
                                            <label class="form-check-label" for="emergency_evacuation">Emergency evacuation (natural disasters)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="gate_training" id="gate_training">
                                            <label class="form-check-label" for="gate_training">Gate training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="hauling_services" id="hauling_services">
                                            <label class="form-check-label" for="hauling_services">Hauling services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_international_shipping" id="horse_international_shipping">
                                            <label class="form-check-label" for="horse_international_shipping">Horse international shipping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_local_transport" id="horse_local_transport">
                                            <label class="form-check-label" for="horse_local_transport">Horse local transport</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="travel_management_show_horses" id="travel_management_show_horses">
                                            <label class="form-check-label" for="travel_management_show_horses">Travel management for show horses</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Grooming & Presentation</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="bathing" id="bathing">
                                            <label class="form-check-label" for="bathing">Bathing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="body_clipping" id="body_clipping">
                                            <label class="form-check-label" for="body_clipping">Body clipping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="braiding" id="braiding">
                                            <label class="form-check-label" for="braiding">Braiding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="grooming_services" id="grooming_services">
                                            <label class="form-check-label" for="grooming_services">Grooming services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mane_tail_care" id="mane_tail_care">
                                            <label class="form-check-label" for="mane_tail_care">Mane & tail care</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="show_prep" id="show_prep">
                                            <label class="form-check-label" for="show_prep">Show prep</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="tack_cleaning" id="tack_cleaning">
                                            <label class="form-check-label" for="tack_cleaning">Tack cleaning</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Recreational & Community</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="4h_ffa_support" id="4h_ffa_support">
                                            <label class="form-check-label" for="4h_ffa_support">4-H/FFA horse program support</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horsemanship_camps" id="horsemanship_camps">
                                            <label class="form-check-label" for="horsemanship_camps">Horsemanship camps</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="junior_mounted_patrol" id="junior_mounted_patrol">
                                            <label class="form-check-label" for="junior_mounted_patrol">Junior mounted patrol units</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="pony_parties" id="pony_parties">
                                            <label class="form-check-label" for="pony_parties">Pony parties</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="school_visits" id="school_visits">
                                            <label class="form-check-label" for="school_visits">School visits or public education</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="therapy_programs" id="therapy_programs">
                                            <label class="form-check-label" for="therapy_programs">Therapy programs</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="vocational_therapies" id="vocational_therapies">
                                            <label class="form-check-label" for="vocational_therapies">Vocational therapies</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Performance, Training & Riding -->
                                <div class="col-md-4">
                                    <div class="service-category">
                                        <h5 class="category-title">Performance, Training & Riding</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="behavior_correction" id="behavior_correction">
                                            <label class="form-check-label" for="behavior_correction">Behavior correction</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="colt_starting" id="colt_starting">
                                            <label class="form-check-label" for="colt_starting">Colt starting / breaking</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="desensitization_training" id="desensitization_training">
                                            <label class="form-check-label" for="desensitization_training">Desensitization training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="eventing_preparation" id="eventing_preparation">
                                            <label class="form-check-label" for="eventing_preparation">Eventing preparation</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="foal_training" id="foal_training">
                                            <label class="form-check-label" for="foal_training">Foal training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="groundwork_horsemanship" id="groundwork_horsemanship">
                                            <label class="form-check-label" for="groundwork_horsemanship">Groundwork and horsemanship</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_conditioning" id="horse_conditioning">
                                            <label class="form-check-label" for="horse_conditioning">Horse conditioning & fitness</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_training" id="horse_training">
                                            <label class="form-check-label" for="horse_training">Horse training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_sales" id="horse_sales">
                                            <label class="form-check-label" for="horse_sales">Horse Sales</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="jockey_services" id="jockey_services">
                                            <label class="form-check-label" for="jockey_services">Jockey services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="jumping_training" id="jumping_training">
                                            <label class="form-check-label" for="jumping_training">Jumping training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="liberty_training" id="liberty_training">
                                            <label class="form-check-label" for="liberty_training">Liberty training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mounted_archery" id="mounted_archery">
                                            <label class="form-check-label" for="mounted_archery">Mounted archery or games training</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="problem_horse_retraining" id="problem_horse_retraining">
                                            <label class="form-check-label" for="problem_horse_retraining">Problem horse retraining</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="racehorse_conditioning" id="racehorse_conditioning">
                                            <label class="form-check-label" for="racehorse_conditioning">Racehorse conditioning & prep</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="rider_coaching" id="rider_coaching">
                                            <label class="form-check-label" for="rider_coaching">Rider coaching</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="riding_lessons" id="riding_lessons">
                                            <label class="form-check-label" for="riding_lessons">Riding lessons</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="show_coaching" id="show_coaching">
                                            <label class="form-check-label" for="show_coaching">Show coaching</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="therapeutic_riding_instruction" id="therapeutic_riding_instruction">
                                            <label class="form-check-label" for="therapeutic_riding_instruction">Therapeutic riding instruction</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="virtual_training" id="virtual_training">
                                            <label class="form-check-label" for="virtual_training">Virtual training/coaching</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Barn, Facility & Property</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="arena_construction" id="arena_construction">
                                            <label class="form-check-label" for="arena_construction">Arena construction & maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="arena_footing" id="arena_footing">
                                            <label class="form-check-label" for="arena_footing">Arena footing consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="barn_cleaning" id="barn_cleaning">
                                            <label class="form-check-label" for="barn_cleaning">Barn cleaning & mucking</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="fence_installation" id="fence_installation">
                                            <label class="form-check-label" for="fence_installation">Fence installation & repair</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="pasture_management" id="pasture_management">
                                            <label class="form-check-label" for="pasture_management">Pasture management</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="portable_stall_setup" id="portable_stall_setup">
                                            <label class="form-check-label" for="portable_stall_setup">Portable stall setup for events</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="stall_rental" id="stall_rental">
                                            <label class="form-check-label" for="stall_rental">Stall rental</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Boarding & Stabling</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="coop_boarding" id="coop_boarding">
                                            <label class="form-check-label" for="coop_boarding">Co-op boarding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="full_care_boarding" id="full_care_boarding">
                                            <label class="form-check-label" for="full_care_boarding">Full-care boarding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="layup_rehab_boarding" id="layup_rehab_boarding">
                                            <label class="form-check-label" for="layup_rehab_boarding">Layup and rehab boarding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="pasture_boarding" id="pasture_boarding">
                                            <label class="form-check-label" for="pasture_boarding">Pasture boarding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="retirement_boarding" id="retirement_boarding">
                                            <label class="form-check-label" for="retirement_boarding">Retirement boarding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="self_care_boarding" id="self_care_boarding">
                                            <label class="form-check-label" for="self_care_boarding">Self-care boarding</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="temporary_event_stabling" id="temporary_event_stabling">
                                            <label class="form-check-label" for="temporary_event_stabling">Temporary event stabling</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Farrier & Hoof</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="applied_equine_podiatry" id="applied_equine_podiatry">
                                            <label class="form-check-label" for="applied_equine_podiatry">Applied equine podiatry</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="corrective_therapeutic_shoeing" id="corrective_therapeutic_shoeing">
                                            <label class="form-check-label" for="corrective_therapeutic_shoeing">Corrective/therapeutic shoeing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="glue_on_shoes" id="glue_on_shoes">
                                            <label class="form-check-label" for="glue_on_shoes">Glue-on shoe application</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="hoof_casting" id="hoof_casting">
                                            <label class="form-check-label" for="hoof_casting">Hoof casting for injuries</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="hoof_reconstruction" id="hoof_reconstruction">
                                            <label class="form-check-label" for="hoof_reconstruction">Hoof reconstruction/resin fill</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="hoof_resections" id="hoof_resections">
                                            <label class="form-check-label" for="hoof_resections">Hoof resections</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="integrated_podiatry" id="integrated_podiatry">
                                            <label class="form-check-label" for="integrated_podiatry">Integrated podiatry</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="natural_hoof_care" id="natural_hoof_care">
                                            <label class="form-check-label" for="natural_hoof_care">Natural hoof care</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="performance_shoeing" id="performance_shoeing">
                                            <label class="form-check-label" for="performance_shoeing">Performance shoeing</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Professional, Educational & Consulting</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="business_planning" id="business_planning">
                                            <label class="form-check-label" for="business_planning">Business planning (equine-specific)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="continuing_education" id="continuing_education">
                                            <label class="form-check-label" for="continuing_education">Continuing education for equine pros</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_appraisals" id="equine_appraisals">
                                            <label class="form-check-label" for="equine_appraisals">Equine appraisals</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_behavior_consulting" id="equine_behavior_consulting">
                                            <label class="form-check-label" for="equine_behavior_consulting">Equine behavior consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_branding_marketing" id="equine_branding_marketing">
                                            <label class="form-check-label" for="equine_branding_marketing">Equine branding & marketing services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_insurance_brokerage" id="equine_insurance_brokerage">
                                            <label class="form-check-label" for="equine_insurance_brokerage">Equine insurance brokerage</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_assisted_therapy" id="equine_assisted_therapy">
                                            <label class="form-check-label" for="equine_assisted_therapy">Equine-assisted therapy</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="farm_ranch_bookkeeping" id="farm_ranch_bookkeeping">
                                            <label class="form-check-label" for="farm_ranch_bookkeeping">Farm & ranch bookkeeping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="grant_writing" id="grant_writing">
                                            <label class="form-check-label" for="grant_writing">Grant writing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_ownership_consulting" id="horse_ownership_consulting">
                                            <label class="form-check-label" for="horse_ownership_consulting">Horse ownership consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="legal_consulting" id="legal_consulting">
                                            <label class="form-check-label" for="legal_consulting">Legal consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="nutritional_consulting" id="nutritional_consulting">
                                            <label class="form-check-label" for="nutritional_consulting">Nutritional consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="public_relations" id="public_relations">
                                            <label class="form-check-label" for="public_relations">Public relations for equestrian athletes/facilities</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="risk_management" id="risk_management">
                                            <label class="form-check-label" for="risk_management">Risk management assessment</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="tech_software_training" id="tech_software_training">
                                            <label class="form-check-label" for="tech_software_training">Tech & software training for equine businesses</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="trademark_copyright" id="trademark_copyright">
                                            <label class="form-check-label" for="trademark_copyright">Trademark and copyright help</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Retail, Feed & Mobile</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="bit_fitting" id="bit_fitting">
                                            <label class="form-check-label" for="bit_fitting">Bit fitting services</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="blanket_washing_repair" id="blanket_washing_repair">
                                            <label class="form-check-label" for="blanket_washing_repair">Blanket washing and repair</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="custom_leatherwork" id="custom_leatherwork">
                                            <label class="form-check-label" for="custom_leatherwork">Custom leatherwork or repairs</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="customized_feeding_plans" id="customized_feeding_plans">
                                            <label class="form-check-label" for="customized_feeding_plans">Customized feeding plans and consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equestrian_subscription_boxes" id="equestrian_subscription_boxes">
                                            <label class="form-check-label" for="equestrian_subscription_boxes">Equestrian subscription boxes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mobile_feed_delivery" id="mobile_feed_delivery">
                                            <label class="form-check-label" for="mobile_feed_delivery">Mobile feed delivery / subscription boxes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mobile_saddle_tack" id="mobile_saddle_tack">
                                            <label class="form-check-label" for="mobile_saddle_tack">Mobile saddle and tack shops</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="mobile_veterinary_pharmacy" id="mobile_veterinary_pharmacy">
                                            <label class="form-check-label" for="mobile_veterinary_pharmacy">Mobile veterinary pharmacy delivery</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="organic_feed_supplement" id="organic_feed_supplement">
                                            <label class="form-check-label" for="organic_feed_supplement">Organic feed/supplement production</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="saddle_fitting_consulting" id="saddle_fitting_consulting">
                                            <label class="form-check-label" for="saddle_fitting_consulting">Saddle fitting consulting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="specialized_horse_feed" id="specialized_horse_feed">
                                            <label class="form-check-label" for="specialized_horse_feed">Specialized horse feed manufacturing</label>
                                        </div>
                                    </div>
                                    <div class="service-category">
                                        <h5 class="category-title">Media, Events & Promotion</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_photography_videography" id="equine_photography_videography">
                                            <label class="form-check-label" for="equine_photography_videography">Equine photography & videography</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_show_announcing" id="horse_show_announcing">
                                            <label class="form-check-label" for="horse_show_announcing">Horse show announcing & judging</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_show_entry_management" id="horse_show_entry_management">
                                            <label class="form-check-label" for="horse_show_entry_management">Horse show entry management</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_show_management" id="horse_show_management">
                                            <label class="form-check-label" for="horse_show_management">Horse show management</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="live_streaming" id="live_streaming">
                                            <label class="form-check-label" for="live_streaming">Live streaming / online show coverage</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="marketing_horses_farms" id="marketing_horses_farms">
                                            <label class="form-check-label" for="marketing_horses_farms">Marketing for horses or farms</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="prize_procurement" id="prize_procurement">
                                            <label class="form-check-label" for="prize_procurement">Prize procurement and sponsor outreach</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="sales_video_editing" id="sales_video_editing">
                                            <label class="form-check-label" for="sales_video_editing">Sales video editing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="show_steward" id="show_steward">
                                            <label class="form-check-label" for="show_steward">Show steward or technical delegate</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="stabling_grounds_crew" id="stabling_grounds_crew">
                                            <label class="form-check-label" for="stabling_grounds_crew">Stabling and grounds crew</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="stallion_promotion" id="stallion_promotion">
                                            <label class="form-check-label" for="stallion_promotion">Stallion promotion and stud marketing</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-category">
                                        <h5 class="category-title">Other Services</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom1" id="other_custom1">
                                            <label class="form-check-label" for="other_custom1">
                                                <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..."
                                                    name="custom_service_1">
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom2" id="other_custom2">
                                            <label class="form-check-label" for="other_custom2">
                                                <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..."
                                                    name="custom_service_2">
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom3" id="other_custom3">
                                            <label class="form-check-label" for="other_custom3">
                                                <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..."
                                                    name="custom_service_3">
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom4" id="other_custom4">
                                            <label class="form-check-label" for="other_custom4">
                                                <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..."
                                                    name="custom_service_4">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <h3 class="mb-3">Service Details <small class="text-muted"> (What you offer, how it works, who's it for, etc.) </small></h3>
                            <div class="">
                                <textarea class="textarea" name="service_desc"  style="width: 100%; height: 15rem;" placeholder="Write description here...."></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <!-- <h5 class="mb-3">Price Per Hour / Session / Package</h5>-->
                        <div class="row mb-4 align-items-cennter">
                            <div class="col-6">
                                <div class="border_box_one">
                                    <h3 class="mb-3">Price [$] <span class="asterisk">*</span></h3>
                                    <div class="row align-items-cennter mb-3 pricing_checks">
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Hour" id="ph_p">
                                                    <label class="form-check-label" for="ph_p">Per Hour</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Session" id="ps_p">
                                                    <label class="form-check-label" for="ps_p">Per Session</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Package" id="pp_p">
                                                    <label class="form-check-label" for="pp_p">Per Package</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Month" id="pm_p">
                                                    <label class="form-check-label" for="pm_p">Per Month</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="pricing_type" type="checkbox" value="Varying Price per Service" id="vpps_p">
                                                    <label class="form-check-label" for="vpps_p">Varying Price per Service</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Inputs for each option -->
                                        {{-- <div class="col-12 mt-3">
                                            <div class="price-input-box" id="input_ph_p" style="display: none;">
                                            <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Hour" />
                                            <button type="button" class="remove-btn">&times;</button>
                                            </div>

                                            <div class="price-input-box" id="input_ps_p" style="display: none;">
                                            <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Session" />
                                            <button type="button" class="remove-btn">&times;</button>
                                            </div>

                                            <div class="price-input-box" id="input_pp_p" style="display: none;">
                                            <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Package" />
                                            <button type="button" class="remove-btn">&times;</button>
                                            </div>

                                            <div class="price-input-box" id="input_pm_p" style="display: none;">
                                            <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Month" />
                                            <button type="button" class="remove-btn">&times;</button>
                                            </div>

                                            <div class="price-input-box" id="input_vpps_p" style="display: none;">
                                            <input class="form-control gen_input thousand-separator" type="text" placeholder="Varying Price per Service" />
                                            <button type="button" class="remove-btn">&times;</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border_box_one">
                                    <input class="form-control gen_input thousand-separator numbers_limit price-input" name="pkg_price" type="text" placeholder="Enter price" required />
                                </div>
                            </div>
                        </div>
                        <div class="border_box_one">
                            <input type="hidden" name="payment_method" id="selectedInput_payments">
                            <div class="dropdown-container" data-dropdown-name="payments">
                                <h4 class="mb-3">Payment Methods Accepted</h4>
                                <div class="dropdown-header"></div>
                                <div class="dropdown-list">
                                    <div data-value="Cash">Cash</div>
                                    <div data-value="Card">Card</div>
                                    <div data-value="PayPal">PayPal</div>
                                    <div data-value="Venmo">Venmo</div>
                                    <div data-value="Zelle">Zelle</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- GALLERY IMAGE UPLOAD -->
                        <div class="border_box_one mb-4">
                            <h4 class="mb-3">Gallery</h4>
                            <div class="col-12 mb-3">
                                <div class="custom-upload__box">
                                    <div class="custom-upload__btn-box">
                                        <label class="custom-upload__btn">
                                            <p>Drag your Image here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                            <input id="customImageInput" name="ser_gallery[]" type="file" class="custom-upload__inputfile" accept="image/*" multiple>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div id="customErrorMsg" style="color: red; margin-top: 10px;"></div>
                                    <div class="custom-upload-images-flex" id="customUploadImagesContainer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="border_box_one">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h4 class="">YouTube / Vimeo video link introduction (Optional)</h4>
                                            <a href="#!" class="add_url_btn">Add another video</a>
                                        </div>
                                        <div id="video_inputs_wrapper">
                                            <div class="video_input d-flex align-items-center mb-2">
                                                <input class="form-control gen_input" type="url" name="demo_link[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                                            </div>
                                        </div>
                                        <p id="error_message" style="color: red; display: none;">You can only add up to 3 video URLs.</p>
                                    </div>

                                    <div class="col-6">
                                        <div class="upload__box">
                                            <div class="upload__img-wrap"></div>
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Drag your Video here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                    <input name="pro_video_url[]" type="file" multiple class="upload__inputfile" accept="image/video/*">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-auto  d-flex justify-content-center gap-3">
                            <a href="#!" class="btn submit_btn_one">Discard</a>
                            <button class="btn submit_btn_one" type="submit">Submit</button>
                            <a href="#!" class="btn submit_btn_one">Preview</a>
                        </div>
                    </div>
                </div>
            </form>


            <!-- <div class="row">
              <div class="col-xl-12">
                @if ($errors->any())
    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
                        </ul>
                    </div>
    @endif
                <form method="POST" action="{{ url('/service_store') }}" enctype="multipart/form-data" class="row g-3 mb-6">
                  @csrf
                  <div class="col-sm-6 col-md-6">
                    <div class="form-floating"><input class="form-control gen_input" name="com_name" id="floatingInputGrid" type="text" placeholder="Enter Service Name"><label for="floatingInputGrid">Enter Service Name</label></div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="form-floating"><input class="form-control gen_input" name="com_number" id="floatingInputGrid" type="text" placeholder="Enter Service Number"><label for="floatingInputGrid">Enter Service Number</label></div>
                  </div>
                  <div class="col-sm-6 col-md-12">
                    <div class="form-floating"><input class="form-control gen_input" name="com_website" id="floatingInputGrid" type="text" placeholder="Enter Service Website"><label for="floatingInputGrid">Enter Service Website</label></div>
                  </div>
                  <div class="col-sm-6 col-md-12">
                    <div class="form-floating"><input class="form-control gen_input" name="com_address" id="floatingInputGrid" type="text" placeholder="Enter Service Address"><label for="floatingInputGrid">Enter Service Address</label></div>
                  </div>
                  <div class="col-12 gy-6">
                    <div class="row g-3 justify-content-end">
                      <div class="col-auto"><a href="{{ url('/manage_service') }}" class="btn px-5" style="border: 1px solid #000;">Cancel</a></div>
                      <div class="col-auto"><button type="submit" class="btn btn-primary px-5 px-sm-15">Create Service</button></div>
                    </div>
                  </div>
                </form>
              </div>
              </div> -->
        </div>


        <script>
            $(document).ready(function() {
                $('input[name="ser_profile"]').on('change', function() {
                    readURL(this, $('.file-wrapper')); // Change the image
                });

                $('.close-btn').on('click', function() { // Unset the image
                    let file = $('input[name="ser_profile"]');
                    $('.file-wrapper').css('background-image', 'unset');
                    $('.file-wrapper').removeClass('file-set');
                    file.replaceWith(file.clone(true));
                });

                // FILE
                function readURL(input, obj) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            obj.css('background-image', 'url(' + e.target.result + ')');
                            obj.addClass('file-set');
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                };
            });
        </script>

        <script>
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

            // ===== PROFILE IMAGE UPLOAD =====
            const profileInput = document.getElementById('profileUploadInput');
            const profilePreview = document.getElementById('profilePreviewImg');
            const profileHiddenInput = document.getElementById('profile_image_url');
            const profileRemoveBtn = document.getElementById('removeProfileBtn');
            const profileDefaultImg = "https://img.icons8.com/m_rounded/512/plus.png";

            profileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePreview.src = e.target.result;
                        profileHiddenInput.value = e.target.result;
                        profileRemoveBtn.style.display = 'flex';
                    };
                    reader.readAsDataURL(file);
                }
            });

            profileRemoveBtn.addEventListener('click', function() {
                profilePreview.src = profileDefaultImg;
                profileHiddenInput.value = '';
                profileInput.value = '';
                profileRemoveBtn.style.display = 'none';
            });

            // ===== GALLERY IMAGE UPLOAD =====
            const galleryInput = document.getElementById('galleryUploadInput');
            const galleryContainer = document.getElementById('galleryUploadContainer');
            const galleryError = document.getElementById('galleryErrorMsg');
            const galleryHiddenInput = document.getElementById('gallery_image_data');
            const galleryDefaultImg = "https://img.icons8.com/m_rounded/512/plus.png";

            let galleryImages = [];

            galleryInput.addEventListener('change', function() {
                const files = Array.from(this.files);
                const total = galleryImages.length + files.length;

                if (total > 10) {
                    galleryError.textContent = "You can upload a maximum of 10 images.";
                    return;
                }

                galleryError.textContent = "";
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        galleryImages.push(e.target.result);
                        updateGalleryPreview();
                    };
                    reader.readAsDataURL(file);
                });

                this.value = '';
            });

            function updateGalleryPreview() {
                const boxes = galleryContainer.querySelectorAll('.upload_img_box:not(.inactive)');

                boxes.forEach((box, index) => {
                    box.innerHTML = '';
                    const img = document.createElement('img');
                    img.className = 'img-fluid';

                    if (galleryImages[index]) {
                        img.src = galleryImages[index];
                        const removeBtn = document.createElement('div');
                        removeBtn.textContent = 'x';
                        removeBtn.className = 'remove-multi-img';
                        removeBtn.addEventListener('click', () => {
                            galleryImages.splice(index, 1);
                            updateGalleryPreview();
                        });
                        box.appendChild(img);
                        box.appendChild(removeBtn);
                    } else {
                        img.src = galleryDefaultImg;
                        box.appendChild(img);
                    }
                });

                galleryHiddenInput.value = JSON.stringify(galleryImages);
            }
        </script>

        <script>
            const selectedValuesMap = {};

            document.querySelectorAll(".dropdown-container").forEach(container => {
                const dropdownName = container.getAttribute("data-dropdown-name");
                const dropdownHeader = container.querySelector(".dropdown-header");
                const dropdownList = container.querySelector(".dropdown-list");

                selectedValuesMap[dropdownName] = [];

                // Toggle dropdown
                dropdownHeader.addEventListener("click", () => {
                    dropdownList.classList.toggle("active");
                });

                // Select option
                dropdownList.querySelectorAll("div").forEach(option => {
                    option.addEventListener("click", () => {
                        const value = option.getAttribute("data-value");
                        if (selectedValuesMap[dropdownName].includes(value)) return;

                        if (selectedValuesMap[dropdownName].length < 5) {
                            selectedValuesMap[dropdownName].push(value);
                            renderTags(dropdownName, container);
                            updateOptionsState(dropdownName, container);
                        } else {
                            alert("Only 5 options can be selected.");
                        }
                    });
                });

                renderTags(dropdownName, container);
            });

            function removeTag(value, dropdownName, container) {
                selectedValuesMap[dropdownName] = selectedValuesMap[dropdownName].filter(v => v !== value);
                renderTags(dropdownName, container);
                updateOptionsState(dropdownName, container);
            }

            function renderTags(dropdownName, container) {
                const dropdownHeader = container.querySelector(".dropdown-header");
                dropdownHeader.innerHTML = "";

                if (selectedValuesMap[dropdownName].length === 0) {
                    const placeholder = document.createElement("span");
                    placeholder.className = "placeholder_new";
                    placeholder.textContent = "Select Options";
                    dropdownHeader.appendChild(placeholder);
                } else {
                    selectedValuesMap[dropdownName].forEach(value => {
                        const tag = document.createElement("div");
                        tag.className = "tag";
                        tag.innerHTML = `${value} <button onclick="removeTag('${value}', '${dropdownName}', this.closest('.dropdown-container'))">✕</button>`;
                        dropdownHeader.appendChild(tag);
                    });
                }

                const hiddenInput = document.getElementById(`selectedInput_${dropdownName}`);
                if (hiddenInput) {
                    hiddenInput.value = selectedValuesMap[dropdownName].join(',');
                }
            }

            function updateOptionsState(dropdownName, container) {
                const dropdownList = container.querySelector(".dropdown-list");
                const options = dropdownList.querySelectorAll("div");
                options.forEach(option => {
                    const value = option.getAttribute("data-value");
                    const isSelected = selectedValuesMap[dropdownName].includes(value);
                    const isLimitReached = selectedValuesMap[dropdownName].length >= 5;

                    option.style.pointerEvents = (!isSelected && isLimitReached) ? "none" : "auto";
                    option.style.opacity = (!isSelected && isLimitReached) ? "0.5" : "1";
                });
            }

            // Close dropdown when clicking outside
            document.addEventListener("click", (e) => {
                document.querySelectorAll(".dropdown-container").forEach(container => {
                    if (!container.contains(e.target)) {
                        container.querySelector(".dropdown-list").classList.remove("active");
                    }
                });
            });
        </script> -->

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
                <input class="form-control gen_input" type="url" name="pro_video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
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
            document.querySelectorAll('.numbers_limit').forEach(function(input) {
                input.addEventListener('input', function(e) {
                    // Get digits only, no commas or non-numeric
                    let value = e.target.value.replace(/\D/g, '');

                    // Limit to 6 digits
                    if (value.length > 6) {
                        value = value.substring(0, 6);
                    }

                    // Format with thousand separator
                    e.target.value = value ? Number(value).toLocaleString() : '';
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

        <script>
            document.querySelectorAll('.experience-input').forEach(input => {
                input.addEventListener('input', function() {
                    const value = parseInt(this.value.replace(/^0+/, '')) || 0; // Remove leading 0s and parse number
                    const label = this.parentElement.querySelector('.experience-label');

                    if (value === 1) {
                        label.textContent = "Year Experience";
                    } else {
                        label.textContent = "Years Experience";
                    }
                });
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

        {{-- <script>
            jQuery(document).ready(function() {
                initCustomImageUpload();
            });

            function initCustomImageUpload() {
                let customImgArray = [];

                $('#customImageInput').on('change', function(e) {
                    const files = e.target.files;
                    const filesArr = Array.prototype.slice.call(files);
                    const maxImages = 20;
                    const customErrorMsg = $('#customErrorMsg');

                    // Only use ACTIVE (non-inactive) boxes
                    const customImgBoxes = $('#customUploadImagesContainer .custom-upload-img-box:not(.inactive)');

                    // Clear previous error
                    customErrorMsg.text('');

                    const totalAllowed = maxImages - customImgArray.length;
                    if (filesArr.length > totalAllowed) {
                        customErrorMsg.text(`You can only upload ${totalAllowed} more image(s).`);
                        return;
                    }

                    const emptyBoxes = customImgBoxes.filter(function() {
                        return !$(this).find('img').hasClass('uploaded');
                    });

                    filesArr.forEach(function(file, index) {
                        if (!file.type.match('image.*')) return;

                        const box = $(emptyBoxes[index]);
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const imgTag = box.find('img');
                            imgTag.attr('src', e.target.result).addClass('uploaded');
                            imgTag.attr('data-file-name', file.name);
                            box.find('.custom-remove-btn').show();
                            customImgArray.push(file.name);
                        };
                        reader.readAsDataURL(file);
                    });

                    // Reset input field so user can re-select same files later
                    $(this).val('');
                });

                // Remove image
                $('#customUploadImagesContainer').on('click', '.custom-remove-btn', function(e) {
                    const box = $(this).closest('.custom-upload-img-box');
                    const imgTag = box.find('img');
                    const fileName = imgTag.attr('data-file-name');

                    // Remove from uploaded array
                    customImgArray = customImgArray.filter(f => f !== fileName);

                    // Reset the box
                    imgTag.attr('src', 'https://img.icons8.com/m_rounded/512/plus.png')
                        .removeClass('uploaded')
                        .removeAttr('data-file-name');
                    $(this).hide();
                });
            }
        </script> --}}

        <script>
            jQuery(document).ready(function() {
                generateImageBoxes(20, 4); // 20 active + 4 inactive
                initCustomImageUpload();
            });

            function generateImageBoxes(activeCount = 20, inactiveCount = 4) {
                const container = $('#customUploadImagesContainer');

                // Active boxes
                for (let i = 0; i < activeCount; i++) {
                    const box = $(`
                        <div class="custom-upload-img-box">
                            <img src="https://img.icons8.com/m_rounded/512/plus.png" />
                            <button class="custom-remove-btn" type="button" style="display: none;">x</button>
                        </div>
                    `);
                    container.append(box);
                }

                // Inactive (disabled) boxes
                for (let i = 0; i < inactiveCount; i++) {
                    const box = $(`
                        <div class="custom-upload-img-box inactive">
                            <img src="https://img.icons8.com/m_rounded/512/plus.png" />
                        </div>
                    `);
                    container.append(box);
                }
            }

            function initCustomImageUpload() {
                let customImgArray = [];

                $('#customImageInput').on('change', function(e) {
                    const files = e.target.files;
                    const filesArr = Array.prototype.slice.call(files);
                    const maxImages = 20;
                    const customErrorMsg = $('#customErrorMsg');
                    const customImgBoxes = $('#customUploadImagesContainer .custom-upload-img-box:not(.inactive)');

                    customErrorMsg.text(''); // Clear previous errors

                    if (customImgArray.length + filesArr.length > maxImages) {
                        customErrorMsg.text(`Maximum ${maxImages} images allowed.`);
                        return;
                    }

                    const emptyBoxes = customImgBoxes.filter(function() {
                        return !$(this).find('img').hasClass('uploaded');
                    });

                    filesArr.forEach(function(file, index) {
                        if (!file.type.match('image.*')) return;

                        const box = $(emptyBoxes[index]);
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const imgTag = box.find('img');
                            imgTag.attr('src', e.target.result).addClass('uploaded');
                            box.find('.custom-remove-btn').show();
                            imgTag.attr('data-file-name', file.name);

                            if (!customImgArray.includes(file.name)) {
                                customImgArray.push(file.name);
                            }
                        };
                        reader.readAsDataURL(file);
                    });
                });

                // Remove image
                $('#customUploadImagesContainer').on('click', '.custom-remove-btn', function(e) {
                    e.stopPropagation();
                    const box = $(this).closest('.custom-upload-img-box');
                    const imgTag = box.find('img');
                    const fileName = imgTag.attr('data-file-name');

                    customImgArray = customImgArray.filter(f => f !== fileName);
                    imgTag.attr('src', 'https://img.icons8.com/m_rounded/512/plus.png')
                        .removeClass('uploaded')
                        .removeAttr('data-file-name');
                    $(this).hide();
                });
            }
        </script>

        <script>
            // PROFILE UPLOAD
            jQuery(document).ready(function() {
                initProfilePicUploader();
            });

            function initProfilePicUploader() {
                let profilePicFile = null;

                const input = $('#profilePicInput');
                const preview = $('#profilePicPreview');
                const removeBtn = $('#profileRemoveBtn');
                const errorMsg = $('#profilePicError');

                // Open file dialog when image clicked
                $('.profile-pic-wrapper').on('click', function() {
                    input.click();
                });

                // On file selected
                input.on('change', function(e) {
                    const file = e.target.files[0];
                    errorMsg.text('');

                    if (!file) return;

                    if (!file.type.match('image.*')) {
                        errorMsg.text('Please select a valid image.');
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result);
                        profilePicFile = file.name;
                        removeBtn.show();
                    };
                    reader.readAsDataURL(file);

                    // Reset input so same file can be selected again if needed
                    input.val('');
                });

                // Remove image
                removeBtn.on('click', function(e) {
                    e.stopPropagation(); // prevent triggering file input
                    preview.attr('src', 'https://img.icons8.com/ios-glyphs/90/user--v1.png');
                    profilePicFile = null;
                    removeBtn.hide();
                    errorMsg.text('');
                });
            }
        </script>

        <script>
            (function(){
                const selectedTagsEl = document.getElementById("selectedLangTags");
                const dropdown = document.getElementById("langDropdown");
                const multiSelect = document.getElementById("languageSelect");
                const input = document.getElementById("langInput");
                const hiddenInput = document.getElementById("languagesInput");

                function getAllOptions(){
                    return Array.from(dropdown.querySelectorAll("div"))
                    .filter(d => !d.classList.contains('no-results'))
                    .map(d => ({ el: d, value: d.dataset.value, text: d.textContent.trim() }));
                }

                let selectedValues = [];

                function openDropdown(){ dropdown.classList.remove("hidden"); }
                function closeDropdown(){ dropdown.classList.add("hidden"); }
                function updateHiddenInput(){ hiddenInput.value = selectedValues.join(", "); }

                function renderTags(){
                    Array.from(selectedTagsEl.children).forEach(child => {
                    if (child !== input) child.remove();
                    });

                    input.placeholder = selectedValues.length === 0 ? "Select or type language..." : "";

                    selectedValues.forEach(value => {
                    const tag = document.createElement("span");
                    tag.className = "tag";
                    tag.innerHTML = `${value} <span class="remove">&times;</span>`;
                    tag.querySelector(".remove").addEventListener("click", (ev) => {
                        ev.stopPropagation();
                        removeTag(value);
                    });
                    selectedTagsEl.insertBefore(tag, input);
                    });
                    updateHiddenInput();
                }

                function addValue(value){
                    if (!value || selectedValues.includes(value)) return;
                    selectedValues.push(value);
                    renderTags();
                    input.value = "";
                    filterDropdown("");
                    openDropdown();
                }

                function removeTag(value){
                    selectedValues = selectedValues.filter(v => v !== value);
                    renderTags();
                }

                dropdown.addEventListener("click", (e) => {
                    const target = e.target.closest("div");
                    if (!target || target.classList.contains('no-results')) return;
                    addValue(target.dataset.value);
                    input.focus();
                });

                input.addEventListener("focus", () => {
                    openDropdown();
                    filterDropdown(input.value);
                });

                input.addEventListener("input", (e) => {
                    filterDropdown(e.target.value);
                });

                input.addEventListener("keydown", (e) => {
                    if (e.key === "Enter") {
                    e.preventDefault();
                    const val = input.value.trim();
                    if (!val) return;

                    const opts = getAllOptions();
                    const match = opts.find(o => o.text.toLowerCase() === val.toLowerCase());
                    if (match) addValue(match.value);
                    else addValue(val); // custom language
                    } else if (e.key === "Backspace" && input.value === "") {
                    if (selectedValues.length) removeTag(selectedValues[selectedValues.length - 1]);
                    }
                });

                function filterDropdown(query){
                    const q = String(query || "").trim().toLowerCase();
                    const opts = getAllOptions();
                    let anyVisible = false;

                    opts.forEach(o => {
                    const matches = q === "" || o.text.toLowerCase().includes(q);
                    const alreadySelected = selectedValues.includes(o.value);
                    o.el.style.display = (matches && !alreadySelected) ? "" : "none";
                    if (matches && !alreadySelected) anyVisible = true;
                    });

                    let nr = dropdown.querySelector(".no-results");
                    if (!anyVisible) {
                    if (!nr) {
                        nr = document.createElement("div");
                        nr.className = "no-results";
                        nr.textContent = "No results. Press Enter to add custom.";
                        dropdown.appendChild(nr);
                    }
                    } else if (nr) nr.remove();
                }

                selectedTagsEl.addEventListener("click", () => {
                    input.focus();
                    openDropdown();
                });

                document.addEventListener("click", (e) => {
                    if (!multiSelect.contains(e.target)) closeDropdown();
                });

                renderTags();
                filterDropdown("");
                })();
            </script>


<script>

const checkboxes = document.querySelectorAll('.form-check-input');

// IDs of checkboxes to disable when Varying Price per Service is checked
const priceCheckboxes = ['ph_p', 'ps_p', 'pp_p', 'pm_p'];
const vppsCheckbox = document.getElementById('vpps_p');

// Your additional price input
const pkgPriceInput = document.querySelector('input[name="pkg_price"]');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    const relatedInputBox = document.getElementById('input_' + checkbox.id);

    // Handle regular input visibility (except Varying Price per Service)
    if (checkbox.id !== 'vpps_p') {
      if (checkbox.checked) {
        relatedInputBox && (relatedInputBox.style.display = 'block');

        // If any price checkbox is checked, uncheck Varying Price
        if (vppsCheckbox.checked) {
          vppsCheckbox.checked = false;
          enablePkgPriceInput();
        }
      } else {
        relatedInputBox && (relatedInputBox.style.display = 'none');
      }
    }

    // Handle "Varying Price per Service"
    if (checkbox.id === 'vpps_p') {
      priceCheckboxes.forEach(id => {
        const cb = document.getElementById(id);
        const input = document.getElementById('input_' + id);
        if (cb) {
          if (checkbox.checked) {
            cb.checked = false;
            cb.disabled = true;
            if (input) input.style.display = 'none';
          } else {
            cb.disabled = false;
          }
        }
      });

      // Disable or enable pkg_price input
      if (checkbox.checked) {
        disablePkgPriceInput();
      } else {
        enablePkgPriceInput();
      }
    }
  });
});

// Disable / Enable functions
function disablePkgPriceInput() {
  pkgPriceInput.value = "";
  pkgPriceInput.disabled = true;
  pkgPriceInput.classList.add("disabled");
}

function enablePkgPriceInput() {
  pkgPriceInput.disabled = false;
  pkgPriceInput.classList.remove("disabled");
}

// Handle cross buttons (close input + uncheck)
const removeBtns = document.querySelectorAll('.price-input-box .remove-btn');
removeBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const inputBox = btn.parentElement;
    inputBox.style.display = 'none';
    const id = inputBox.id.replace('input_', '');
    document.getElementById(id).checked = false;
  });
});

</script>

    @endsection
