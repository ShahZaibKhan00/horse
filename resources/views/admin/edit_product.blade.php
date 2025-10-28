@extends('layouts.admin_app')

@section('content')

    <style>
        .asterisk {
            color: red;
        }

        .bid_box {
            background: #f5eeee;
            padding: 30px;
            border-radius: 20px;
        }

        .age_input_group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .age_input_group input {
            width: 60%;
            height: 55px;
            text-align: center;
        }

        .age_input_group span {
            height: 38px;
            display: flex;
            align-items: center;
        }

        .age_input_group span {
            display: none;
            /* hide label initially */
            margin-left: 8px;
        }

        .age_input_group.show-label span {
            display: flex;
        }

        .relative_box {
            position: relative;
        }

        .relative_box p {
            position: absolute;
            top: -26px;
            width: 100%;
            text-align: center;
            color: #fff;
        }

        .relative_box a {
            color: #b79b4f !important;
            font-weight: 700;
            text-decoration: underline;
            text-transform: capitalize;
            background: linear-gradient(to right, #ae8e3b 45%, #FFFFFF 70%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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
            padding: 6px 7px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
            border-radius: 8px;
            position: relative;
            cursor: text;
            background-color: #fff;
            height: 55px;
        }

        .dropdown-header input {
            flex: 1;
            border: none;
            min-width: 150px;
            padding: 4px;
            outline: none;
            font-size: 14px;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tag {
            background-color: #e4e7ee;
            padding: 3px 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            font-size: 13px;
        }

        .tag button {
            background: none;
            border: none;
            margin-left: 5px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }

        #searchInput {
            border: none;
            outline: none;
            flex: 1;
            padding: 5px;
            min-width: 120px;
        }

        .dropdown-arrow {
            position: absolute;
            right: 10px;
            cursor: pointer;
            font-size: 14px;
            width: 100px;
            text-align: end;
        }

        .dropdown-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #ccc;
            background: #e4e7ee;
            display: none;
            z-index: 10;
            border-radius: 0 0 10px 10px;
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
            background-color: #fff;
        }

        .textarea {
            font-size: 0.8rem;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #EBEBEB;
            outline: none;
            background: #EBEBEB;
        }

        .upload_main_box label {
            background: #f5f7fa;
            height: 200px;
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

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            height: 55px !important;
            color: #000000;
            padding: 8px 15px;
        }

        .select2-container--default .select2-selection--single {
            height: 55px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #000;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #ffffff transparent transparent transparent;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 9px;
            width: 20px;
        }

        .select2-container--default .select2-results>.select2-results__options {
            max-height: 310px;
            overflow-y: auto;
        }

        .select2-results__option--selectable {
            font-size: 14px;
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

        .custom-multiselect {
            max-width: 100%;
            position: relative;
        }

        .selected-tags {
            border: 2px solid #1d2139;
            padding: 6px 7px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
            border-radius: 8px;
            position: relative;
            cursor: text;
            background-color: #fff;
            height: 55px;
        }

        .selected-tags .tag {
            background-color: #e4e7ee;
            padding: 3px 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .selected-tags .tag .remove {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .placeholderOne {
            color: #888;
            font-size: 14px;
        }

        .custom-multiselect .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            z-index: 10;
            border-radius: 4px;
            margin-top: 5px;
            padding: 10px 0px;
        }

        .custom-multiselect .dropdown div {
            padding: 8px 10px;
            cursor: pointer;
            font-size: 13px;
            color: #000;
        }

        .custom-multiselect .dropdown div:hover {
            background-color: #f0f0f0;
        }

        .hidden {
            display: none;
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
            width: 120px;
            height: 120px;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: default;
            position: relative;
            border-radius: 8px;
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
            filter: blur(2px);
            opacity: 0.5;
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
    <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach ($data as $data)
            <form class="mb-9" action="{{ route('update_product') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="cate_id_name" value="{{ $name }}">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="pro_sku" value="{{ $data->pro_sku }}">

                <div class="box_top">
                    <h2 class="mb-2 main_heading_dashboard">Edit Horse Ad Information</h2>
                    <!-- <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5> -->
                </div>

                <div class="row gy-4">

                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h4 class="mb-3">Breed Type <span class="asterisk">*</span></h4>
                                </div>
                                <div class="col-12">
                                    @php
                                        $breeds = [
                                            'Akhal-Teke',
                                            'Aegidienberger',
                                            'Alberta Wild Horse',
                                            'Alter Real',
                                            'Altmark Coldblood',
                                            'Altor Real',
                                            'American Bashkir Curly',
                                            'American Belgian Draft',
                                            'American Cream Draft Horse',
                                            'American Indian Horse',
                                            'American Miniature Horse',
                                            'American Saddlebred',
                                            'American Shetland Pony',
                                            'American Spotted',
                                            'American Standardbred',
                                            'American Walking Pony',
                                            'Andalusian Horse',
                                            'Anglo Arabian',
                                            'Appaloosa',
                                            'Arabian',
                                            'Arabian Horses',
                                            'Ardennes',
                                            'Arabian-Berber',
                                            'Arabian Halfbred',
                                            'Arabian Partbred',
                                            'Araloosa',
                                            'Arcenberg-Nordkirchen',
                                            'Australian Brumby',
                                            'Australian Draught Horse',
                                            'Australian Stock Horse',
                                            'Austrian Warmblood',
                                            'Auxois',
                                            'Baden-Wurttemberg',
                                            'Balearic',
                                            'Balikun Horse',
                                            'Baltic Hanoverian',
                                            'Bardigiano',
                                            'Bashkir Horse',
                                            'Bavarian Warmblood',
                                            'Belgian Cold Blood',
                                            'Belgian Draft',
                                            'Belgian Warmblood',
                                            'Black Forest Horse',
                                            'Boerperd',
                                            'Boulonnais',
                                            'Brabant Horse',
                                            'Brandenburger Warmblood',
                                            'Breton',
                                            'British Riding Pony',
                                            'Budyonny',
                                            'Burguete',
                                            'Byelorussian Harness Horse',
                                            'Calabrese',
                                            'Camargue Horse',
                                            'Canadian Horse',
                                            'Canadian Pacer',
                                            'Canadian Rustic Pony',
                                            'Carolina Marsh Tacky',
                                            'Cerbat Mustang',
                                            'Chincoteague Pony',
                                            'Chickasaw Horse',
                                            'Choctaw Pony',
                                            'Classic Pony',
                                            'Cleveland-Bay',
                                            'Clydesdale',
                                            'Clydesdale Cross',
                                            'Cumberland Island Horse',
                                            'Cob Horse',
                                            'Comtois',
                                            'Connemara Pony',
                                            'Criollo Horse',
                                            'Curly Horses',
                                            'Dales Pony',
                                            'Dartmoor Pony',
                                            'Draft Cross',
                                            'Dutch Warmblood',
                                            'Fell Pony',
                                            'Finnhorse',
                                            'Friesian',
                                            'Friesian Cross',
                                            'Fjord',
                                            'Fjord Cross',
                                            'Gelderland',
                                            'Gypsy Vanner',
                                            'Gypsy Cross',
                                            'Hackney',
                                            'Hanoverian',
                                            'Haflinger',
                                            'Holsteiner',
                                            'Icelandic Horse',
                                            'Irish Draught',
                                            'Irish Draft Cross',
                                            'Kinsky Horse',
                                            'Knabstrupper',
                                            'Lippizan',
                                            'Lusitano',
                                            'Marwari Horse',
                                            'Morgan',
                                            'Morgan Cross',
                                            'Mustang',
                                            'Paso Fino',
                                            'Percheron',
                                            'Percheron Cross',
                                            'Pinto',
                                            'Polish Warmblood',
                                            'Quarter Horse',
                                            'Quarter Horse Cross',
                                            'Rocky Mountain Horse',
                                            'Shire',
                                            'Shire Cross',
                                            'Spotted Draft',
                                            'Spotted Draft Cross',
                                            'Tennessee Walking Horse',
                                            'Thoroughbred',
                                            'Thoroughbred Cross',
                                            'Trakehner',
                                            'Welsh',
                                            'Welsh Pony',
                                            'Westphalian',
                                            'Welsh Cross',
                                            'Warmblood',
                                            'Warmblood Cross',
                                            'Zweibrücker Horse',
                                        ];
                                    @endphp

                                    <select class="form-control gen_input breed-select" name="pro_breed" required>
                                        <option disabled {{ empty($data->pro_breed) ? 'selected' : '' }}>Select a Breed</option>
                                        @foreach ($breeds as $breed)
                                            <option value="{{ $breed }}" {{ $data->pro_breed == $breed ? 'selected' : '' }}>{{ $breed }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <h4 class="mb-3">Horse Name: <span class="asterisk">*</span> <small class="text-muted">( to be displayed at the top of the ad)</small></h4>
                            <input class="form-control gen_input gen_input" type="text" name="pro_name" value="{{ $data->pro_name }}" placeholder="Write title here..." required />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <h4 class="mb-2">Horse Location <span class="asterisk">*</span> <small class="text-muted">(town,state, US based only)</small></h4>
                            <div class="row">
                                <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="pro_address" value="{{ $data->pro_address }}" placeholder="Enter Yout Town" /></div>
                                <div class="col-6 d-none">
                                    @php
                                        $cities = [
                                            'new_york' => 'New York',
                                            'los_angeles' => 'Los Angeles',
                                            'chicago' => 'Chicago',
                                            'houston' => 'Houston',
                                            'phoenix' => 'Phoenix',
                                            'philadelphia' => 'Philadelphia',
                                            'san_antonio' => 'San Antonio',
                                            'san_diego' => 'San Diego',
                                            'dallas' => 'Dallas',
                                            'san_jose' => 'San Jose',
                                            'austin' => 'Austin',
                                            'jacksonville' => 'Jacksonville',
                                            'san_francisco' => 'San Francisco',
                                            'columbus' => 'Columbus',
                                            'charlotte' => 'Charlotte',
                                            'indianapolis' => 'Indianapolis',
                                            'seattle' => 'Seattle',
                                            'denver' => 'Denver',
                                            'washington_dc' => 'Washington D.C.',
                                            'boston' => 'Boston',
                                            'las_vegas' => 'Las Vegas',
                                            'miami' => 'Miami',
                                            'atlanta' => 'Atlanta',
                                            'orlando' => 'Orlando',
                                            'new_orleans' => 'New Orleans',
                                        ];
                                    @endphp

                                    <select class="form-control gen_input mb-3" name="pro_city" required>
                                        <option value="" disabled {{ empty($data->pro_city) ? 'selected' : '' }}>Select your City</option>
                                        @foreach ($cities as $key => $city)
                                            <option value="{{ $key }}" {{ $data->pro_city == $key ? 'selected' : '' }}>{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    @php
                                        $states = [
                                            'alabama' => 'Alabama',
                                            'alaska' => 'Alaska',
                                            'arizona' => 'Arizona',
                                            'arkansas' => 'Arkansas',
                                            'california' => 'California',
                                            'colorado' => 'Colorado',
                                            'connecticut' => 'Connecticut',
                                            'delaware' => 'Delaware',
                                            'florida' => 'Florida',
                                            'georgia' => 'Georgia',
                                            'hawaii' => 'Hawaii',
                                            'idaho' => 'Idaho',
                                            'illinois' => 'Illinois',
                                            'indiana' => 'Indiana',
                                            'iowa' => 'Iowa',
                                            'kansas' => 'Kansas',
                                            'kentucky' => 'Kentucky',
                                            'louisiana' => 'Louisiana',
                                            'maine' => 'Maine',
                                            'maryland' => 'Maryland',
                                            'massachusetts' => 'Massachusetts',
                                            'michigan' => 'Michigan',
                                            'minnesota' => 'Minnesota',
                                            'mississippi' => 'Mississippi',
                                            'missouri' => 'Missouri',
                                            'montana' => 'Montana',
                                            'nebraska' => 'Nebraska',
                                            'nevada' => 'Nevada',
                                            'new_hampshire' => 'New Hampshire',
                                            'new_jersey' => 'New Jersey',
                                            'new_mexico' => 'New Mexico',
                                            'new_york' => 'New York',
                                            'north_carolina' => 'North Carolina',
                                            'north_dakota' => 'North Dakota',
                                            'ohio' => 'Ohio',
                                            'oklahoma' => 'Oklahoma',
                                            'oregon' => 'Oregon',
                                            'pennsylvania' => 'Pennsylvania',
                                            'rhode_island' => 'Rhode Island',
                                            'south_carolina' => 'South Carolina',
                                            'south_dakota' => 'South Dakota',
                                            'tennessee' => 'Tennessee',
                                            'texas' => 'Texas',
                                            'utah' => 'Utah',
                                            'vermont' => 'Vermont',
                                            'virginia' => 'Virginia',
                                            'washington' => 'Washington',
                                            'west_virginia' => 'West Virginia',
                                            'wisconsin' => 'Wisconsin',
                                            'wyoming' => 'Wyoming',
                                        ];
                                    @endphp

                                    <select class="form-control gen_input mb-3" name="pro_state" required>
                                        <option value="" disabled {{ empty($data->pro_state) ? 'selected' : '' }}>Select your State</option>
                                        @foreach ($states as $key => $state)
                                            <option value="{{ $key }}" {{ $data->pro_state == $key ? 'selected' : '' }}>{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="mb-3">
                                <h4 class="mb-3 text-1000">Price [$] <span class="asterisk" id="astrik">*</span> <small class="text-muted"></small></h4>
                                <input class="form-control gen_input gen_input thousand-separator numbers_limit price-input" name="pro_reg_price" value="${{ $data->pro_reg_price }}" type="text"
                                    placeholder="Enter price" required />
                            </div>
                            <div class="row align-items-cennter">
                                <div class="col-12">
                                    <div class="d-flex flex-column gap-2">
                                        @php
                                            $aboutPrices = explode(',', $data->about_price);
                                        @endphp

                                        <div class="form-check">
                                            <input class="form-check-input" name="about_price[]" type="checkbox" value="Firm" {{ in_array('Firm', $aboutPrices) ? 'checked' : '' }}>
                                            <label class="form-check-label">Firm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="about_price[]" type="checkbox" value="Negotiable" {{ in_array('Negotiable', $aboutPrices) ? 'checked' : '' }}>
                                            <label class="form-check-label">Negotiable</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="about_price[]" type="checkbox" value="May Trade" {{ in_array('May Trade', $aboutPrices) ? 'checked' : '' }}>
                                            <label class="form-check-label">May Trade</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="about_price[]" type="checkbox" value="Payment Options Available"
                                                {{ in_array('Payment Options Available', $aboutPrices) ? 'checked' : '' }}>
                                            <label class="form-check-label">Payment Options Available</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="border_box_one pb_75">
                            <h4 class="mb-3">Type of Ad <span class="asterisk">*</span></h4>
                            <div class="row">
                                <div class="col-3 d-flex flex-column gap-2">
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input" name="pro_ad_type" type="radio" value="For Sale" {{ $data->pro_ad_type == 'For Sale' ? 'checked' : '' }} /> For Sale
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input" name="pro_ad_type" type="radio" value="At Auction" {{ $data->pro_ad_type == 'At Auction' ? 'checked' : '' }} />At Auction
                                        </label>
                                    </div>
                                    {{-- <div class="form-check">
                                        <label>
                                            <input class="form-check-input" name="pro_ad_type" type="radio" value="Private Treaty" {{ $data->pro_ad_type == 'Private Treaty' ? 'checked' : '' }} />
                                            Private Treaty
                                        </label>
                                    </div> --}}
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input" name="pro_ad_type" type="radio" value="For Lease" {{ $data->pro_ad_type == 'For Lease' ? 'checked' : '' }} /> For Lease
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input" name="pro_ad_type" type="radio" value="At Stud" {{ $data->pro_ad_type == 'At Stud' ? 'checked' : '' }} /> At Stud
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="border_box_one mb-4">
                            <h4 class="mb-3">Trial Period</h4>
                            <div class="form-check">
                                <input class="form-check-input" name="trial_period" type="radio" value="yes_trial" id="yes_trial" {{ $data->trial_period == 'yes_trial' ? 'checked' : '' }}>
                                <label class="form-check-label" for="yes_trial">
                                    Yes
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="trial_period" type="radio" value="no_trial" id="no_trial" {{ $data->trial_period == 'no_trial' ? 'checked' : '' }}>
                                <label class="form-check-label" for="no_trial">
                                    No
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="trial_period" type="radio" value="My Consider" id="may_trial" {{ $data->trial_period == 'My Consider' ? 'checked' : '' }}>
                                <label class="form-check-label" for="may_trial">
                                    May Consider
                                </label>
                            </div>
                        </div>

                        <div class="border_box_one">
                            <h4 class="mb-3">Registered</h4>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes" id="yes" name="registerd_horse" {{ $data->registerd_horse == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="no" id="no" name="registerd_horse" {{ $data->registerd_horse == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bid_box" style="display: none;">
                            <h4 class="mb-5 text-1000">Will be shown on first picture of ad</h4>
                            <div class="row gy-4">
                                <div class="col-6">
                                    <h5 class="mb-3">Starting Bid Amount</h5>
                                    <input class="form-control gen_input thousand-separator" type="text" name="bid_amount" value="{{ $data->bid_amount }}" placeholder="Start bid" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Reserve Amount (Optional) </h5>
                                    <input class="form-control gen_input thousand-separator" type="text" name="reserve_amount" value="{{ $data->reserve_amount }}" placeholder="Reserve Amount" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">Start Date</h5>
                                    <input class="form-control gen_input" type="date" name="auc_start_date" value="{{ $data->auc_start_date }}" placeholder="Start bid" />
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-3">End Date</h5>
                                    <input class="form-control gen_input" type="date" name="auc_end_date" value="{{ $data->auc_end_date }}" placeholder="Reserve Amount" />
                                </div>
                                <div class="col-12">
                                    <h5 class="mb-3">Auction Link</h5>
                                    <input class="form-control gen_input" type="url" name="auc_link" value="{{ $data->auc_link }}"
                                        placeholder="Please past the link to your horses ad on the auction" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="registration_box border_box_one" style="display: none;">
                            <div class="col-12 mb-4">
                                <h4 class="mb-3">Horse Registered Name:</h4>
                                <input class="form-control gen_input gen_input" type="text" name="pro_reg_name" value="{{ $data->pro_reg_name }}" placeholder="Type Horse Registered Name" />
                            </div>
                            <div class="col-12">
                                <h5 class="mb-4 text-center">Upload Papers</h5>
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <h4 class="mb-3">Registration Association:</h4>
                                            <input class="form-control gen_input gen_input" type="text" name="pro_reg_association" value="{{ $data->pro_reg_association }}"
                                                placeholder="Type Registration Association" />
                                        </div>
                                        <div class="mb-0">
                                            <h4 class="mb-3">Registration Number:</h4>
                                            <input class="form-control gen_input gen_input" type="text" name="pro_reg_number" value="{{ $data->pro_reg_number }}"
                                                placeholder="Type Registration Association" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="upload__box">
                                            <div class="upload__img-wrap"></div>
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Drag your file here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                    <input name="pro_reg_file[]" type="file" multiple="multiple" class="upload__inputfile">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $grandSires = explode(',', $data->pro_grand_sire ?? '');

                        // $grandSires = json_decode(', ', $data->pro_grand_sire);
                        $grandDams = explode(',', $data->pro_grand_dam ?? '');
                        $greatGrandSires = explode(',', $data->pro_great_grand_sire ?? '');
                        $greatGrandDams = explode(',', $data->pro_great_grand_dam ?? '');
                        $twoGreatGrandSires = explode(',', $data->pro_twogreat_grand_sire ?? '');
                        $twoGreatGrandDams = explode(',', $data->pro_twogreat_grand_dam ?? '');
                    @endphp

                    <div class="col-12">
                        <div class="border_box_one pedigree_form">
                            <h4 class="mb-3"> Pedigree</h4>
                            <!-- SIRE FORM -->
                            <div class="sire-form mb-4">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="box_dark">
                                            <h4 class="mb-2">Sire:</h4>
                                            <input class="form-control gen_input" name="pro_sire" value="{{ $data->pro_sire }}" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box_dark one">
                                            <h4 class="mb-2">Grand Sire</h4>
                                            <input class="form-control gen_input" name="pro_grand_sire[]" value="{{ $grandSires[0] ?? '' }}" placeholder="Type Here" />
                                            <h4 class="mb-2 mt-3">Grand Dam</h4>
                                            <input class="form-control gen_input" name="pro_grand_dam[]" value="{{ $grandDams[0] ?? '' }}" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box_dark two mb-4">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_sire[]" value="{{ $greatGrandSires[0] ?? '' }}" placeholder="Type Here" />
                                            <h4 class="mb-2 mt-3">Great Grand Dam</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_dam[]" value="{{ $greatGrandDams[0] ?? '' }}" placeholder="Type Here" />
                                        </div>
                                        <div class="box_dark three">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_sire[]" value="{{ $greatGrandSires[1] ?? '' }}" placeholder="Type Here" />
                                            <h4 class="mb-2 mt-3">Great Grand Dam</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_dam[]" value="{{ $greatGrandDams[1] ?? '' }}" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        @for ($i = 0; $i < 4; $i++)
                                            <div class="box_dark mb-3">
                                                <h4 class="mb-2">Great Great Grand Sire</h4>
                                                <input class="form-control gen_input" name="pro_twogreat_grand_sire[]" value="{{ $twoGreatGrandSires[$i] ?? '' }}" placeholder="Type Here" />
                                                <h4 class="mb-2 mt-3">Great Great Grand Dam</h4>
                                                <input class="form-control gen_input" name="pro_twogreat_grand_dam[]" value="{{ $twoGreatGrandDams[$i] ?? '' }}" placeholder="Type Here" />
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <!-- DAM FORM -->
                            <div class="dam-form">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="box_dark">
                                            <h4 class="mb-2">Dam:</h4>
                                            <input class="form-control gen_input" name="pro_dam" value="{{ $data->pro_dam }}" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box_dark one_dam">
                                            <h4 class="mb-2">Grand Sire</h4>
                                            <input class="form-control gen_input" name="pro_grand_sire[]" value="{{ $grandSires[1] ?? '' }}" placeholder="Type Here" />
                                            <h4 class="mb-2 mt-3">Grand Dam</h4>
                                            <input class="form-control gen_input" name="pro_grand_dam[]" value="{{ $grandDams[1] ?? '' }}" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box_dark two_dam mb-4">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_sire[]" value="{{ $greatGrandSires[2] ?? '' }}" placeholder="Type Here" />
                                            <h4 class="mb-2 mt-3">Great Grand Dam</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_dam[]" value="{{ $greatGrandDams[2] ?? '' }}" placeholder="Type Here" />
                                        </div>
                                        <div class="box_dark three_dam">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_sire[]" value="{{ $greatGrandSires[3] ?? '' }}" placeholder="Type Here" />
                                            <h4 class="mb-2 mt-3">Great Grand Dam</h4>
                                            <input class="form-control gen_input" name="pro_great_grand_dam[]" value="{{ $greatGrandDams[3] ?? '' }}" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        @for ($i = 4; $i < 8; $i++)
                                            <div class="box_dark mb-3">
                                                <h4 class="mb-2">Great Great Grand Sire</h4>
                                                <input class="form-control gen_input" name="pro_twogreat_grand_sire[]" value="{{ $twoGreatGrandSires[$i] ?? '' }}" placeholder="Type Here" />
                                                <h4 class="mb-2 mt-3">Great Great Grand Dam</h4>
                                                <input class="form-control gen_input" name="pro_twogreat_grand_dam[]" value="{{ $twoGreatGrandDams[$i] ?? '' }}" placeholder="Type Here" />
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        @php
                            $colors = [
                                'Appaloosa',
                                'Bay',
                                'Bay Dun',
                                'Bay Dun Roan',
                                'Bay Roan',
                                'Black',
                                'Black Bay',
                                'Blue Roan',
                                'Brindle',
                                'Brown',
                                'Buckskin',
                                'Buckskin Roan',
                                'Champagne',
                                'Chestnut',
                                'Chocolate',
                                'Chocolate Flaxen',
                                'Cream',
                                'Cremello',
                                'Cremello Dun',
                                'Dapple Grey',
                                'Dun',
                                'Dunalino',
                                'Dunskin',
                                'Flaxen',
                                'Flea-bitten Gray',
                                'Frame Overo',
                                'Grey',
                                'Grullo',
                                'Isabella',
                                'Lerino Dun',
                                'Liver Chestnut',
                                'Other',
                                'Overo',
                                'Paintaloosa',
                                'Palomino',
                                'Palomino Roan',
                                'Pearl',
                                'Perlino',
                                'Piebald',
                                'Pinto',
                                'Red Chocolate',
                                'Red Dun',
                                'Red Dun Roan',
                                'Red Roan',
                                'Roan',
                                'Sabino',
                                'Seal Brown',
                                'Silver',
                                'Silver Bay',
                                'Silver Black',
                                'Silver Black Roan',
                                'Silver Buckskin',
                                'Silver Dapple',
                                'Silver Perlino',
                                'Silver Smokey Black',
                                'Silver Smokey Cream',
                                'Skewbald',
                                'Smokey Black',
                                'Smokey Cream',
                                'Smokey Cream Dun',
                                'Smokey Grullo',
                                'Sooty Buckskin',
                                'Sorrel',
                                'Splash Overo',
                                'Splash White',
                                'Tobiano',
                                'Tovero',
                                'Unknown',
                                'White',
                            ];
                            $selectedColor = $data->pro_color ?? '';
                        @endphp

                        <div class="border_box_one">
                            <h4 class="mb-3"> Color <span class="asterisk">*</span></h4>
                            <select class="form-control gen_input breed-select" name="pro_color" required>
                                <option value="">Select an option</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color }}" {{ $selectedColor === $color ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        @php
                            $genders = ['Colt', 'Filly', 'Gelding', 'Mare', 'Stallion', 'Unborn Foal', 'Jack', 'Jenny', 'John', 'Molly'];
                            $selectedGender = $data->pro_gender ?? '';
                        @endphp

                        <div class="border_box_one">
                            <h4 class="mb-3">Gender <span class="asterisk">*</span></h4>
                            <select class="form-control gen_input breed-select" name="pro_gender" required>
                                <option value="">Select an Option</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}" {{ $selectedGender === $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="border_box_one">
                            <h4 class="mb-3">Height <span class="asterisk">*</span></h4>
                            <select class="form-control gen_input" name="pro_height" required>
                                @php
                                    $heights = [
                                        '5.0 hh (20in)',
                                        '6.0 hh (24in)',
                                        '7.0 hh (28in)',
                                        '8.0 hh (32in)',
                                        '8.2 hh (34in)',
                                        '9.0 hh (36in)',
                                        '9.2 hh (38in)',
                                        '10.0 hh (40in)',
                                        '10.2 hh',
                                        '11.0 hh (44in)',
                                        '11.2 hh',
                                        '12.0 hh (48in)',
                                        '12.1 hh',
                                        '12.2 hh',
                                        '12.3 hh',
                                        '13.0 hh (52in)',
                                        '13.1 hh',
                                        '13.2 hh',
                                        '13.3 hh',
                                        '14.0 hh (56in)',
                                        '14.1 hh',
                                        '14.2 hh',
                                        '14.3 hh',
                                        '15.0 hh (60in)',
                                        '15.1 hh',
                                        '15.2 hh',
                                        '15.3 hh',
                                        '16.0 hh (64in)',
                                        '16.1 hh',
                                        '16.2 hh',
                                        '16.3 hh',
                                        '17.0 hh (68in)',
                                        '17.1 hh',
                                        '17.2 hh',
                                        '17.3 hh',
                                        '18.0 hh (72in)',
                                        '18.1 hh',
                                        '18.2 hh',
                                        '18.3 hh',
                                        '19.0 hh (76in)',
                                        '20.0 hh (80in)',
                                        '21.0 hh (84in)',
                                    ];
                                @endphp

                                @foreach ($heights as $height)
                                    <option value="{{ $height }}" {{ $data->pro_height == $height ? 'selected' : '' }}>
                                        {{ $height }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border_box_one">
                            <h4 class="mb-3">Age <span class="asterisk">*</span></h4>
                            <div class="row">
                                <div class="col-6">
                                    <!-- <h5 class="mb-3">Year</h5> -->
                                    <div class="age_input_group" id="yearGroup">
                                        <input class="form-control gen_input" type="text" name="pro_age_year" value="{{ $data->pro_age_year }}" id="yearInput" maxlength="2"
                                            placeholder="Year" />
                                        <span id="yearLabel">Years Old</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- <h5 class="mb-3">Month</h5> -->
                                    <div class="age_input_group" id="monthGroup">
                                        <input class="form-control gen_input" type="text" name="pro_age_month" value="{{ $data->pro_age_month }}" id="monthInput" maxlength="2"
                                            placeholder="Month" />
                                        <span id="monthLabel">Months Old</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="dropdown-container">
                                <h4 class="mb-3">
                                    Skill/Discipline <span class="asterisk" id="astrik">*</span>
                                    <small class="text-muted">
                                        Your first 3 selected skills/disciplines will display on your ad card. All selected skills/disciplines will display on your full ad page. Max 5 Skill/Discipline
                                    </small>
                                </h4>
                                <input type="hidden" name="pro_skill" id="selectedActivitiesInput" />
                                <div class="dropdown-header" id="dropdownHeader">
                                    @php
                                        $selectedSkills = explode(',', $data->pro_skill ?? '');
                                    @endphp
                                    <div class="tags" id="tagsContainer">
                                    </div>

                                    <input type="text" id="searchInput" value="{{ implode(', ', $selectedSkills) }}" placeholder="Start typing or Select an Option from the drop down list."
                                        oninput="handleInput()" onkeydown="handleKeyDown(event)" name="" />
                                    <span class="dropdown-arrow" onclick="toggleDropdown()">▼</span>
                                </div>
                                <div class="dropdown-list" id="dropdownList">
                                    <div onclick="selectOption(this)" data-value="Agility">Agility</div>
                                    <div onclick="selectOption(this)" data-value="All Around">All Around</div>
                                    <div onclick="selectOption(this)" data-value="All-Around Show">All-Around Show</div>
                                    <div onclick="selectOption(this)" data-value="Beginner">Beginner</div>
                                    <div onclick="selectOption(this)" data-value="Barrel Racing">Barrel Racing</div>
                                    <div onclick="selectOption(this)" data-value="Barrels* Poles *Gymkhana">Barrels* Poles *Gymkhana</div>
                                    <div onclick="selectOption(this)" data-value="Breakaway Roping">Breakaway Roping</div>
                                    <div onclick="selectOption(this)" data-value="Brood mare">Brood mare</div>
                                    <div onclick="selectOption(this)" data-value="Cutting Prospect">Cutting Prospect</div>
                                    <div onclick="selectOption(this)" data-value="Cutting">Cutting</div>
                                    <div onclick="selectOption(this)" data-value="Calf Roping">Calf Roping</div>
                                    <div onclick="selectOption(this)" data-value="Clicker Training">Clicker Training</div>
                                    <div onclick="selectOption(this)" data-value="Companion Only">Companion Only</div>
                                    <div onclick="selectOption(this)" data-value="Competitive Trail Riding">Competitive Trail Riding</div>
                                    <div onclick="selectOption(this)" data-value="Country English Pleasure">Country English Pleasure</div>
                                    <div onclick="selectOption(this)" data-value="Cowboy Dressage">Cowboy Dressage</div>
                                    <div onclick="selectOption(this)" data-value="Cowboy Mounted Shooting">Cowboy Mounted Shooting</div>
                                    <div onclick="selectOption(this)" data-value="Cowboy Racing">Cowboy Racing</div>
                                    <div onclick="selectOption(this)" data-value="Cow horse">Cow horse</div>
                                    <div onclick="selectOption(this)" data-value="Cross-Country">Cross-Country</div>
                                    <div onclick="selectOption(this)" data-value="Dressage">Dressage</div>
                                    <div onclick="selectOption(this)" data-value="Drill Team">Drill Team</div>
                                    <div onclick="selectOption(this)" data-value="Driving">Driving</div>
                                    <div onclick="selectOption(this)" data-value="Endurance Riding">Endurance Riding</div>
                                    <div onclick="selectOption(this)" data-value="English">English</div>
                                    <div onclick="selectOption(this)" data-value="English Pleasure">English Pleasure</div>
                                    <div onclick="selectOption(this)" data-value="Equitation">Equitation</div>
                                    <div onclick="selectOption(this)" data-value="Eventing">Eventing</div>
                                    <div onclick="selectOption(this)" data-value="Field Trial">Field Trial</div>
                                    <div onclick="selectOption(this)" data-value="Foxhunter">Foxhunter</div>
                                    <div onclick="selectOption(this)" data-value="Gun - Safe Hunting">Gun - Safe Hunting</div>
                                    <div onclick="selectOption(this)" data-value="Halter">Halter</div>
                                    <div onclick="selectOption(this)" data-value="Harness">Harness</div>
                                    <div onclick="selectOption(this)" data-value="Harness Racing">Harness Racing</div>
                                    <div onclick="selectOption(this)" data-value="Horsemanship">Horsemanship</div>
                                    <div onclick="selectOption(this)" data-value="Hunt Seat Equitation">Hunt Seat Equitation</div>
                                    <div onclick="selectOption(this)" data-value="Hunter">Hunter</div>
                                    <div onclick="selectOption(this)" data-value="Hunter Pleasure">Hunter Pleasure</div>
                                    <div onclick="selectOption(this)" data-value="Hunter Under Saddle">Hunter Under Saddle</div>
                                    <div onclick="selectOption(this)" data-value="Jumping">Jumping</div>
                                    <div onclick="selectOption(this)" data-value="Lesson Horse">Lesson Horse</div>
                                    <div onclick="selectOption(this)" data-value="Liberty Training">Liberty Training</div>
                                    <div onclick="selectOption(this)" data-value="Light Riding">Light Riding</div>
                                    <div onclick="selectOption(this)" data-value="Longe Line">Longe Line</div>
                                    <div onclick="selectOption(this)" data-value="Mountain Trail">Mountain Trail</div>
                                    <div onclick="selectOption(this)" data-value="Mounted Games">Mounted Games</div>
                                    <div onclick="selectOption(this)" data-value="Mounted Police">Mounted Police</div>
                                    <div onclick="selectOption(this)" data-value="Native Costume">Native Costume</div>
                                    <div onclick="selectOption(this)" data-value="Natural Horsemanship Training">Natural Horsemanship Training</div>
                                    <div onclick="selectOption(this)" data-value="Nurse Mare">Nurse Mare</div>
                                    <div onclick="selectOption(this)" data-value="Pacing Gait">Pacing Gait</div>
                                    <div onclick="selectOption(this)" data-value="Pack">Pack</div>
                                    <div onclick="selectOption(this)" data-value="Parade">Parade</div>
                                    <div onclick="selectOption(this)" data-value="Performance">Performance</div>
                                    <div onclick="selectOption(this)" data-value="Play day">Play day</div>
                                    <div onclick="selectOption(this)" data-value="Pleasure Driving">Pleasure Driving</div>
                                    <div onclick="selectOption(this)" data-value="Pole Bending">Pole Bending</div>
                                    <div onclick="selectOption(this)" data-value="Polo">Polo</div>
                                    <div onclick="selectOption(this)" data-value="Pony Club">Pony Club</div>
                                    <div onclick="selectOption(this)" data-value="Project">Project</div>
                                    <div onclick="selectOption(this)" data-value="Racing">Racing</div>
                                    <div onclick="selectOption(this)" data-value="Retired Race Horse">Retired Race Horse</div>
                                    <div onclick="selectOption(this)" data-value="Racking Gait">Racking Gait</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Conformation Class">Ranch Conformation Class</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Rail Class">Ranch Rail Class</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Riding - Ranch Pleasure">Ranch Riding - Ranch Pleasure</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Sorting">Ranch Sorting</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Trail Class">Ranch Trail Class</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Versatility">Ranch Versatility</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Work">Ranch Work</div>
                                    <div onclick="selectOption(this)" data-value="Reining">Reining</div>
                                    <div onclick="selectOption(this)" data-value="Reining - Cowhorse - Cutting">Reining - Cowhorse - Cutting</div>
                                    <div onclick="selectOption(this)" data-value="Rodeo">Rodeo</div>
                                    <div onclick="selectOption(this)" data-value="Rodeo Bronc">Rodeo Bronc</div>
                                    <div onclick="selectOption(this)" data-value="Roping">Roping</div>
                                    <div onclick="selectOption(this)" data-value="Saddle Seat">Saddle Seat</div>
                                    <div onclick="selectOption(this)" data-value="School">School</div>
                                    <div onclick="selectOption(this)" data-value="Schoolmaster">Schoolmaster</div>
                                    <div onclick="selectOption(this)" data-value="Show Experience">Show Experience</div>
                                    <div onclick="selectOption(this)" data-value="Show Hack">Show Hack</div>
                                    <div onclick="selectOption(this)" data-value="Show Winner">Show Winner</div>
                                    <div onclick="selectOption(this)" data-value="Showmanship Halter">Showmanship Halter</div>
                                    <div onclick="selectOption(this)" data-value="Sidesaddle">Sidesaddle</div>
                                    <div onclick="selectOption(this)" data-value="Stallion - Stud - Breeding">Stallion - Stud - Breeding</div>
                                    <div onclick="selectOption(this)" data-value="Started Under Saddle">Started Under Saddle</div>
                                    <div onclick="selectOption(this)" data-value="Steer Roping">Steer Roping</div>
                                    <div onclick="selectOption(this)" data-value="Steer Wrestling">Steer Wrestling</div>
                                    <div onclick="selectOption(this)" data-value="Stock">Stock</div>
                                    <div onclick="selectOption(this)" data-value="Team Driving">Team Driving</div>
                                    <div onclick="selectOption(this)" data-value="Team Penning">Team Penning</div>
                                    <div onclick="selectOption(this)" data-value="Team Roping">Team Roping</div>
                                    <div onclick="selectOption(this)" data-value="Team Roping - Head">Team Roping - Head</div>
                                    <div onclick="selectOption(this)" data-value="Team Roping - Heel">Team Roping - Heel</div>
                                    <div onclick="selectOption(this)" data-value="Team Sorting">Team Sorting</div>
                                    <div onclick="selectOption(this)" data-value="Therapeutic Riding">Therapeutic Riding</div>
                                    <div onclick="selectOption(this)" data-value="Therapy">Therapy</div>
                                    <div onclick="selectOption(this)" data-value="Trail Class Competition">Trail Class Competition</div>
                                    <div onclick="selectOption(this)" data-value="Trail Master">Trail Master</div>
                                    <div onclick="selectOption(this)" data-value="Trail Riding">Trail Riding</div>
                                    <div onclick="selectOption(this)" data-value="Trick">Trick</div>
                                    <div onclick="selectOption(this)" data-value="Unicorn">Unicorn</div>
                                    <div onclick="selectOption(this)" data-value="Vaulting">Vaulting</div>
                                    <div onclick="selectOption(this)" data-value="Western">Western</div>
                                    <div onclick="selectOption(this)" data-value="Western Dressage">Western Dressage</div>
                                    <div onclick="selectOption(this)" data-value="Western Pleasure">Western Pleasure</div>
                                    <div onclick="selectOption(this)" data-value="Western Riding">Western Riding</div>
                                    <div onclick="selectOption(this)" data-value="Working Cattle">Working Cattle</div>
                                    <div onclick="selectOption(this)" data-value="Working Equitation">Working Equitation</div>
                                    <div onclick="selectOption(this)" data-value="4H">4H</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="border_box_one">
                            <h4 class="mb-3">What type of rider level best suits your horse? </h4>
                            <div class="custom-multiselect" id="multiSelect">
                                <div class="selected-tags" id="selectedTags">
                                    <span class="placeholderOne">Select Level</span>
                                </div>
                                <div class="dropdown hidden" id="dropdown">
                                    <div data-value="Beginner Riders - have minimal or no experience">Beginner Riders - have minimal or no experience</div>
                                    <div data-value="Novice Riders - have a basic understanding of riding and can perform basic gaits.">Novice Riders - have a basic understanding of riding and can
                                        perform basic gaits.</div>
                                    <div data-value="Intermediate Riders - are comfortable with all gaits and can handle more challenging situations">Intermediate Riders - are comfortable with all gaits
                                        and can handle more challenging situations</div>
                                    <div data-value="Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level.">Advanced Riders - have a high level
                                        of skill and experience, often competing or riding at a professional level.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="border_box_one pb_50">
                            <h4 class="mb-3"> Gaited</h4>
                            <div class="d-flex gap-3">
                                @php
                                    $gaitedValue = $data->gaited ?? '';
                                @endphp

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" id="gaited_yes" name="gaited" {{ $gaitedValue === 'Yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gaited_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" id="gaited_no" name="gaited" {{ $gaitedValue === 'No' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gaited_no">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border_box_one">
                            <div class="mb-0">
                                <h4 class="mb-3">Description <span class="asterisk" id="astrik">*</span></h4>
                                <textarea class="textarea" name="pro_desc" maxlength="2000" style="width: 100%; height: 15rem;" placeholder="Write a description here..." required>{{ $data->pro_desc }}</textarea>
                                <div id="charCount" style="margin-top: 5px; font-size: 0.9rem; color: #666;">0 / 2000 characters</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row align-items-center gy-4">
                            @php
                                $ppeFiles = is_array($data->ppe_file)
                                    ? $data->ppe_file
                                    : (is_string($data->ppe_file) && str_starts_with($data->ppe_file, '[')
                                        ? json_decode($data->ppe_file, true)
                                        : explode(',', $data->ppe_file));

                                $x_rays = is_array($data->xray_file)
                                    ? $data->xray_file
                                    : (is_string($data->xray_file) && str_starts_with($data->xray_file, '[')
                                        ? json_decode($data->xray_file, true)
                                        : explode(',', $data->xray_file));

                                $featured_image = is_array($data->pro_Fimg)
                                    ? $data->pro_Fimg
                                    : (is_string($data->pro_Fimg) && str_starts_with($data->pro_Fimg, '[')
                                        ? json_decode($data->pro_Fimg, true)
                                        : explode(',', $data->pro_Fimg));
                            @endphp

                            <div class="col-6">
                                <div class="border_box_one">
                                    <h4 class="mb-3">PPE</h4>
                                    <div class="col-12">
                                        <div class="upload__box">
                                            <div class="upload__img-wrap">
                                                @foreach ($ppeFiles as $file)
                                                    @if (!empty(trim($file)))
                                                        <div class="upload__img-box">
                                                            <div class="img-bg" style="background-image: url('{{ asset('Product_images/' . $file) }}')"></div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Drag your file here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                    <input name="ppe_file[]" type="file" multiple="multiple" class="upload__inputfile">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border_box_one">
                                    <h4 class="mb-3">X-Rays</h4>
                                    <div class="col-12">
                                        <div class="upload__box">
                                            <div class="upload__img-wrap">
                                                @foreach ($x_rays as $x_ray)
                                                    @if (!empty(trim($x_ray)))
                                                        <div class="upload__img-box">
                                                            <div class="img-bg" style="background-image: url('{{ asset('Product_images/' . $x_ray) }}')"></div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Drag your file here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                    <input name="xray_file[]" type="file" multiple="multiple" class="upload__inputfile">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border_box_one">
                                    <h4 class="card-title mb-4">Media Featured Image <span class="asterisk" id="astrik">*</span></h4>
                                    <div class="">
                                        <div class="col-12 mb-3">
                                            <div class="upload__box">
                                                <div class="upload__img-wrap">
                                                    @foreach ($featured_image as $file)
                                                        @if (!empty(trim($file)))
                                                            <div class="upload__img-box">
                                                                <div class="img-bg" style="background-image: url('{{ asset('Featured_image/' . $file) }}')"></div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
                                                        <p>Drag your Image here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                        <input name="pro_Fimg" type="file" class="upload__inputfile">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="border_box_one">
                                    <h4 class="card-title mb-4">Images</h4>
                                    <div class="">
                                        <div class="col-12 mb-3">
                                            <div class="custom-upload__box">
                                                <div class="custom-upload__btn-box">
                                                    <label class="custom-upload__btn">
                                                        <p>Drag your Image here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                        <input id="customImageInput" name="pro_imgs[]" type="file" class="custom-upload__inputfile" accept="image/*" multiple>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div id="customErrorMsg" style="color: red; margin-top: 10px;"></div>
                                            {{-- <div class="custom-upload-images-flex" id="customUploadImagesContainer">
                                                <div class="custom-upload-img-box">
                                                    <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                    <span class="custom-remove-btn">&times;</span>
                                                </div>
                                                <div class="custom-upload-img-box">
                                                    <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                    <span class="custom-remove-btn">&times;</span>
                                                </div>
                                                <div class="custom-upload-img-box">
                                                    <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                    <span class="custom-remove-btn">&times;</span>
                                                </div> --}}
                                            <!-- HTML Section -->
                                            <?php
                                            // In your controller
                                            $existingImages = json_decode($data->pro_imgs) ?? [];
                                            $maxImages = 3; // Match your JavaScript limit
                                            ?>
                                            {{-- @dd($existingImages) --}}
                                            <div class="custom-upload-images-flex" id="customUploadImagesContainer">
                                                @for ($i = 0; $i < $maxImages; $i++)
                                                    <div class="custom-upload-img-box">
                                                        @if (isset($existingImages[$i]))
                                                            <img src="{{ asset('storage/uploads/products/' . $existingImages[$i]) }}" class="img-fluid uploaded existing"
                                                                data-image-index="{{ $i }}" alt="Existing image">
                                                            <span class="custom-remove-btn">&times;</span>
                                                        @else
                                                            <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                                                            <span class="custom-remove-btn" style="display: none">&times;</span>
                                                        @endif
                                                    </div>
                                                @endfor
                                                {{-- </div> --}}
                                                <!-- Optional: locked images -->
                                                <div class="custom-relative-box">
                                                    <p>To add more pictures click to <a href="javascript:void(0)">upgrade</a></p>
                                                    <div class="custom-upload-images-flex">
                                                        <div class="custom-upload-img-box inactive">
                                                            <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                            <span class="custom-remove-btn">&times;</span>
                                                        </div>
                                                        <div class="custom-upload-img-box inactive">
                                                            <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                            <span class="custom-remove-btn">&times;</span>
                                                        </div>
                                                        <div class="custom-upload-img-box inactive">
                                                            <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                            <span class="custom-remove-btn">&times;</span>
                                                        </div>
                                                        <div class="custom-upload-img-box inactive">
                                                            <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="">
                                                            <span class="custom-remove-btn">&times;</span>
                                                        </div>
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
                            <h4 class="">Upload Video:</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="">Video URL:</h5>
                                        {{-- <a href="#!" class="add_url_btn">Add another video</a> --}}
                                    </div>
                                    {{-- @php
                                        $videoUrls = is_array($data->pro_video_url) ? $data->pro_video_url : json_decode($data->pro_video_url, true) ?? explode(',', $data->pro_video_url);
                                    @endphp --}}

                                    <div id="video_inputs_wrapper">
                                        {{-- @foreach ($videoUrls as $url)
                                            @if ($loop->index < 3)
                                                <div class="video_input d-flex align-items-center mb-2"> --}}
                                                    <input class="form-control gen_input" type="url" name="pro_youtube" value="{{ $data->pro_youtube }}"
                                                        placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                                                    {{-- @if (!$loop->first)
                                                        <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach --}}
                                    </div>

                                    <p id="error_message" style="color: red; display: none;">You can only add up to 3 video URLs.</p>
                                </div>
                                <div class="col-6">
                                    <div class="upload__box">
                                        @php
                                            $videoFiles = json_decode($data->pro_video_url, true);
                                        @endphp

                                        @if (!empty($videoFiles) && is_array($videoFiles) && count($videoFiles) > 0)
                                            <div class="video-icon mb-2">
                                                <i class="fas fa-video fa-2x text-primary"></i>
                                            </div>
                                        @endif


                                        <div class="upload__img-wrap"></div>
                                        <div class="upload__btn-box">
                                            <label class="upload__btn">
                                                <p>Drag your video here
                                                    <span class="text-800 px-1">or</span>
                                                    <button class="btn btn-link p-0" type="button">Browse from device</button>
                                                </p>
                                                <input name="pro_video_url[]" type="file" multiple class="upload__inputfile" accept="video/*">
                                            </label>
                                        </div>
                                    </div>

                                    {{-- <div class="upload__box">
                                        <div class="upload__img-wrap"></div>
                                        <div class="upload__btn-box">
                                            <label class="upload__btn">
                                                <p>Drag your video here<span class="text-800 px-1">or</span><button class="btn btn-link p-0" type="button">Browse from device</span></p>
                                                <input name="pro_video_url[]" type="file" multiple="multiple" class="upload__inputfile">
                                            </label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <h2 class="mb-3 text-white">Contact Details</h2>
                        <div class="border_box_one">
                            <div class="row gy-4">
                                <div class="col-6">
                                    <h4 class="mb-3">State:<span class="asterisk">*</span></h4>
                                    <select class="form-control gen_input_one" name="pro_state">
                                        <option value="">Select your state</option>
                                        <option value="alabama" {{ $data->pro_state == 'alabama' ? 'selected' : '' }}>Alabama</option>
                                        <option value="alaska" {{ $data->pro_state == 'alaska' ? 'selected' : '' }}>Alaska</option>
                                        <option value="arizona" {{ $data->pro_state == 'arizona' ? 'selected' : '' }}>Arizona</option>
                                        <option value="arkansas" {{ $data->pro_state == 'arkansas' ? 'selected' : '' }}>Arkansas</option>
                                        <option value="california" {{ $data->pro_state == 'california' ? 'selected' : '' }}>California</option>
                                        <option value="colorado" {{ $data->pro_state == 'colorado' ? 'selected' : '' }}>Colorado</option>
                                        <option value="connecticut" {{ $data->pro_state == 'connecticut' ? 'selected' : '' }}>Connecticut</option>
                                        <option value="delaware" {{ $data->pro_state == 'delaware' ? 'selected' : '' }}>Delaware</option>
                                        <option value="florida" {{ $data->pro_state == 'florida' ? 'selected' : '' }}>Florida</option>
                                        <option value="georgia" {{ $data->pro_state == 'georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="hawaii" {{ $data->pro_state == 'hawaii' ? 'selected' : '' }}>Hawaii</option>
                                        <option value="idaho" {{ $data->pro_state == 'idaho' ? 'selected' : '' }}>Idaho</option>
                                        <option value="illinois" {{ $data->pro_state == 'illinois' ? 'selected' : '' }}>Illinois</option>
                                        <option value="indiana" {{ $data->pro_state == 'indiana' ? 'selected' : '' }}>Indiana</option>
                                        <option value="iowa" {{ $data->pro_state == 'iowa' ? 'selected' : '' }}>Iowa</option>
                                        <option value="kansas" {{ $data->pro_state == 'kansas' ? 'selected' : '' }}>Kansas</option>
                                        <option value="kentucky" {{ $data->pro_state == 'kentucky' ? 'selected' : '' }}>Kentucky</option>
                                        <option value="louisiana" {{ $data->pro_state == 'louisiana' ? 'selected' : '' }}>Louisiana</option>
                                        <option value="maine" {{ $data->pro_state == 'maine' ? 'selected' : '' }}>Maine</option>
                                        <option value="maryland" {{ $data->pro_state == 'maryland' ? 'selected' : '' }}>Maryland</option>
                                        <option value="massachusetts" {{ $data->pro_state == 'massachusetts' ? 'selected' : '' }}>Massachusetts</option>
                                        <option value="michigan" {{ $data->pro_state == 'michigan' ? 'selected' : '' }}>Michigan</option>
                                        <option value="minnesota" {{ $data->pro_state == 'minnesota' ? 'selected' : '' }}>Minnesota</option>
                                        <option value="mississippi" {{ $data->pro_state == 'mississippi' ? 'selected' : '' }}>Mississippi</option>
                                        <option value="missouri" {{ $data->pro_state == 'missouri' ? 'selected' : '' }}>Missouri</option>
                                        <option value="montana" {{ $data->pro_state == 'montana' ? 'selected' : '' }}>Montana</option>
                                        <option value="nebraska" {{ $data->pro_state == 'nebraska' ? 'selected' : '' }}>Nebraska</option>
                                        <option value="nevada" {{ $data->pro_state == 'nevada' ? 'selected' : '' }}>Nevada</option>
                                        <option value="new_hampshire" {{ $data->pro_state == 'new_hampshire' ? 'selected' : '' }}>New Hampshire</option>
                                        <option value="new_jersey" {{ $data->pro_state == 'new_jersey' ? 'selected' : '' }}>New Jersey</option>
                                        <option value="new_mexico" {{ $data->pro_state == 'new_mexico' ? 'selected' : '' }}>New Mexico</option>
                                        <option value="new_york" {{ $data->pro_state == 'new_york' ? 'selected' : '' }}>New York</option>
                                        <option value="north_carolina" {{ $data->pro_state == 'north_carolina' ? 'selected' : '' }}>North Carolina</option>
                                        <option value="north_dakota" {{ $data->pro_state == 'north_dakota' ? 'selected' : '' }}>North Dakota</option>
                                        <option value="ohio" {{ $data->pro_state == 'ohio' ? 'selected' : '' }}>Ohio</option>
                                        <option value="oklahoma" {{ $data->pro_state == 'oklahoma' ? 'selected' : '' }}>Oklahoma</option>
                                        <option value="oregon" {{ $data->pro_state == 'oregon' ? 'selected' : '' }}>Oregon</option>
                                        <option value="pennsylvania" {{ $data->pro_state == 'pennsylvania' ? 'selected' : '' }}>Pennsylvania</option>
                                        <option value="rhode_island" {{ $data->pro_state == 'rhode_island' ? 'selected' : '' }}>Rhode Island</option>
                                        <option value="south_carolina" {{ $data->pro_state == 'south_carolina' ? 'selected' : '' }}>South Carolina</option>
                                        <option value="south_dakota" {{ $data->pro_state == 'south_dakota' ? 'selected' : '' }}>South Dakota</option>
                                        <option value="tennessee" {{ $data->pro_state == 'tennessee' ? 'selected' : '' }}>Tennessee</option>
                                        <option value="texas" {{ $data->pro_state == 'texas' ? 'selected' : '' }}>Texas</option>
                                        <option value="utah" {{ $data->pro_state == 'utah' ? 'selected' : '' }}>Utah</option>
                                        <option value="vermont" {{ $data->pro_state == 'vermont' ? 'selected' : '' }}>Vermont</option>
                                        <option value="virginia" {{ $data->pro_state == 'virginia' ? 'selected' : '' }}>Virginia</option>
                                        <option value="washington" {{ $data->pro_state == 'washington' ? 'selected' : '' }}>Washington</option>
                                        <option value="west_virginia" {{ $data->pro_state == 'west_virginia' ? 'selected' : '' }}>West Virginia</option>
                                        <option value="wisconsin" {{ $data->pro_state == 'wisconsin' ? 'selected' : '' }}>Wisconsin</option>
                                        <option value="wyoming" {{ $data->pro_state == 'wyoming' ? 'selected' : '' }}>Wyoming</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Phone:<span class="text-danger">*</span></h4>
                                    <input class="form-control gen_input_one phone-input" type="tel" name="per_phone" value="{{ $data->per_phone }}" placeholder="Enter Phone" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Zip:</h4>
                                    <input class="form-control gen_input_one" type="tel" name="per_zip" value="{{ $data->per_zip }}" placeholder="Enter Zip code" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Email:</h4>
                                    <input class="form-control gen_input_one" type="email" name="per_email" value="{{ $data->per_email }}" placeholder="Enter email address" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Address:</h4>
                                    <input class="form-control gen_input_one" type="text" name="per_address" value="{{ $data->per_address }}" placeholder="Enter Address" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Website:</h4>
                                    <input class="form-control gen_input_one" type="url" name="per_website" value="{{ $data->per_website }}" placeholder="Enter website" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <h2 class="text-white mb-3">Social Profiles</h2>
                        <div class="border_box_one">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="mb-3">Facebook:</h4>
                                    <input class="form-control gen_input_one mb-3" type="url" name="pro_facebook" value="{{ $data->pro_facebook }}" placeholder="Enter link" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Youtube:</h4>
                                    <input class="form-control gen_input_one mb-3" type="url" name="pro_youtube" value="{{ $data->pro_youtube }}" placeholder="Enter link" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Instagram:</h4>
                                    <input class="form-control gen_input_one mb-3" type="url" name="pro_insta" value="{{ $data->pro_insta }}" placeholder="Enter link" />
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-3">Tiktok:</h4>
                                    <input class="form-control gen_input_one" type="url" name="pro_tiktok" value="{{ $data->pro_tiktok }}" placeholder="Enter link" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                    </div>
                    <div class="col-6 ">
                        <div class="col-auto d-flex justify-content-end gap-3">
                            <a href="{{ url('products') }}/{{ last(request()->segments()) }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a>
                            <button class="btn submit_btn_one" type="submit">Submit</button>
                            {{-- <a href="#!" class="btn submit_btn_one">Preview</a> --}}
                        </div>
                    </div>

            </form>
        @endforeach

        <style>
            img.f_img_preview {
                width: 100%;
                height: auto;
                margin-bottom: 10px;
                border-radius: 7px;
                border: 1px solid #00000036;
            }

            .prodict_Color {
                width: 50px;
                height: 30px;
                border-radius: 4px;
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
            // Auction Bid Box Toggle
            const auctionRadioButtons = document.querySelectorAll('input[name="pro_ad_type"]');
            const bidBox = document.querySelector('.bid_box');

            function toggleBidBox() {
                const selected = document.querySelector('input[name="pro_ad_type"]:checked');
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
        </script>

        <script>
            function initCustomImageUpload() {
                const maxImages = 3;
                let currentImages = @json(array_slice($existingImages, 0, $maxImages));
                let newImages = [];
                let imagesToDelete = [];

                $('#customImageInput').on('change', function(e) {
                    const files = Array.from(e.target.files);
                    const usedSlots = $('.custom-upload-img-box:not(.inactive) img.uploaded').length;
                    const availableSlots = maxImages - usedSlots;
                    const filesToUse = files.slice(0, availableSlots);

                    const availableBoxes = $('.custom-upload-img-box:not(.inactive)').filter(function() {
                        return !$(this).find('img').hasClass('uploaded');
                    });

                    filesToUse.forEach((file, i) => {
                        const box = $(availableBoxes[i]);
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const img = box.find('img');
                            img.attr('src', event.target.result)
                                .addClass('uploaded new')
                                .removeClass('existing')
                                .removeAttr('data-image-index');
                            box.find('.custom-remove-btn').show();
                            newImages.push(file);
                        };
                        reader.readAsDataURL(file);
                    });
                });

                $('#customUploadImagesContainer').on('click', '.custom-remove-btn', function() {
                    const box = $(this).closest('.custom-upload-img-box');
                    const img = box.find('img');
                    if (img.hasClass('existing')) {
                        const index = img.data('image-index');
                        if (!imagesToDelete.includes(index)) {
                            imagesToDelete.push(index);
                        }
                    }
                    img.attr('src', 'https://img.icons8.com/m_rounded/512/plus.png')
                        .removeClass('uploaded new existing')
                        .removeAttr('data-image-index');
                    $(this).hide();
                });

                $('form').on('submit', function() {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'images_to_delete',
                        value: JSON.stringify(imagesToDelete)
                    }).appendTo(this);
                });
            }

            jQuery(document).ready(initCustomImageUpload);
        </script>

        <script>
            // Registered Horse Box Toggle
            const horseRadioButtons = document.querySelectorAll('input[name="registerd_horse"]');
            const registrationBox = document.querySelector('.registration_box');

            function toggleRegistrationBox() {
                if (document.getElementById('yes')?.checked) {
                    registrationBox.style.display = 'block';
                } else {
                    registrationBox.style.display = 'none';
                }
            }

            horseRadioButtons.forEach(radio => {
                radio.addEventListener('change', toggleRegistrationBox);
            });

            // Initial state
            document.addEventListener("DOMContentLoaded", toggleRegistrationBox);
        </script>
        <script>
            document.querySelectorAll('.deleteButton').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    var form = button.closest('form');

                    var id = form.getAttribute('action').split('/').pop();

                    var confirmDelete = confirm("Are you sure you want to delete this Addon?");

                    if (confirmDelete) {
                        form.submit();
                    } else {
                        alert("Listed Addon not deleted.");
                        event.preventDefault(); // Stop the form from submitting
                    }
                });
            });
        </script>

        <script>
            const addBtn = document.querySelector('.add_url_btn');
            const wrapper = document.getElementById('video_inputs_wrapper');
            const errorMsg = document.getElementById('error_message');

            function attachRemoveEvents() {
                wrapper.querySelectorAll('.remove_btn').forEach(btn => {
                    btn.onclick = function() {
                        this.parentElement.remove();
                        errorMsg.style.display = 'none';
                    };
                });
            }

            attachRemoveEvents(); // for existing remove buttons

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
                attachRemoveEvents(); // re-bind remove event
            });
        </script>

        {{-- <script>
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
        </script> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const priceInput = document.querySelector('input[name="pro_reg_price"]');
                const asterisk = document.getElementById('astrik');
                const adTypeRadios = document.querySelectorAll('input[name="pro_ad_type"]');

                adTypeRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'Auction') {
                            priceInput.removeAttribute('required');
                            asterisk.style.display = 'none';
                        } else {
                            priceInput.setAttribute('required', 'required');
                            asterisk.style.display = 'inline';
                        }
                    });
                });

                // Trigger change on page load in case one is pre-selected
                const checkedRadio = document.querySelector('input[name="pro_ad_type"]:checked');
                if (checkedRadio) {
                    checkedRadio.dispatchEvent(new Event('change'));
                }
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
            function normalizeAndUpdate(inputEl, labelEl, wrapperEl, singular, plural) {
                let value = inputEl.value.trim().replace(/^0+/, '') || '0';
                if (/^\d{1,2}$/.test(value) && parseInt(value) > 0) {
                    labelEl.textContent = value === "1" ? singular : plural;
                    wrapperEl.classList.add('show-label');
                } else {
                    wrapperEl.classList.remove('show-label');
                }
            }

            function allowOnlyNumbers(e) {
                if ([8, 46, 9, 37, 39].includes(e.keyCode)) return;
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault();
                }
            }

            const yearInput = document.getElementById("yearInput");
            const yearLabel = document.getElementById("yearLabel");
            const yearGroup = document.getElementById("yearGroup");

            const monthInput = document.getElementById("monthInput");
            const monthLabel = document.getElementById("monthLabel");
            const monthGroup = document.getElementById("monthGroup");

            yearInput.addEventListener("input", () => {
                normalizeAndUpdate(yearInput, yearLabel, yearGroup, "Year", "Years");
            });
            yearInput.addEventListener("keydown", allowOnlyNumbers);

            monthInput.addEventListener("input", () => {
                normalizeAndUpdate(monthInput, monthLabel, monthGroup, "Month", "Months");
            });
            monthInput.addEventListener("keydown", allowOnlyNumbers);
        </script>

        <script>
            const selectedTags = document.getElementById("selectedTags");
            const dropdown = document.getElementById("dropdown");
            const multiSelect = document.getElementById("multiSelect");

            let selectedValues = [];

            // Toggle dropdown
            selectedTags.addEventListener("click", () => {
                dropdown.classList.toggle("hidden");
            });

            // Add selection
            dropdown.addEventListener("click", (e) => {
                const value = e.target.dataset.value;
                if (!value || selectedValues.includes(value)) return;

                selectedValues.push(value);
                updateTags();
            });

            // Remove tag
            function removeTag(value) {
                selectedValues = selectedValues.filter(v => v !== value);
                updateTags();
            }

            // Render tags
            function updateTags() {
                selectedTags.innerHTML = "";

                if (selectedValues.length === 0) {
                    selectedTags.innerHTML = '<span class="placeholderOne">Select Level</span>';
                    return;
                }

                selectedValues.forEach(value => {
                    const label = value.split(" - ")[0];
                    const tag = document.createElement("span");
                    tag.className = "tag";
                    tag.innerHTML = `${label} <span class="remove">&times;</span>`;

                    // Add event listener to remove button
                    tag.querySelector(".remove").addEventListener("click", () => {
                        removeTag(value);
                    });

                    selectedTags.appendChild(tag);
                });
            }

            // Close dropdown on outside click
            document.addEventListener("click", function(e) {
                if (!multiSelect.contains(e.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        </script>

        <script>
            (function() {
                const allOptions = [
                    "Agility", "All Around", "All-Around Show", "Beginner", "Barrel Racing",
                    "Barrels* Poles *Gymkhana", "Breakaway Roping", "Brood mare", "Cutting Prospect",
                    "Cutting", "Calf Roping", "Clicker Training", "Companion Only", "Competitive Trail Riding",
                    "Country English Pleasure", "Cowboy Dressage", "Cowboy Mounted Shooting", "Cowboy Racing",
                    "Cow horse", "Cross-Country", "Dressage", "Drill Team", "Driving",
                    "Endurance Riding", "English", "English Pleasure", "Equitation", "Eventing",
                    "Field Trial", "Foxhunter", "Gun - Safe Hunting", "Halter", "Harness",
                    "Harness Racing", "Horsemanship", "Hunt Seat Equitation", "Hunter", "Hunter Pleasure",
                    "Hunter Under Saddle", "Jumping", "Lesson Horse", "Liberty Training", "Light Riding",
                    "Longe Line", "Mountain Trail", "Mounted Games", "Mounted Police", "Native Costume",
                    "Natural Horsemanship Training", "Nurse Mare", "Pacing Gait", "Pack", "Parade",
                    "Performance", "Play day", "Pleasure Driving", "Pole Bending", "Polo",
                    "Pony Club", "Project", "Racing", "Retired Race Horse", "Racking Gait",
                    "Ranch Conformation Class", "Ranch Rail Class", "Ranch Riding - Ranch Pleasure",
                    "Ranch Sorting", "Ranch Trail Class", "Ranch Versatility", "Ranch Work", "Reining",
                    "Reining - Cowhorse - Cutting", "Rodeo", "Rodeo Bronc", "Roping", "Saddle Seat",
                    "School", "Schoolmaster", "Show Experience", "Show Hack", "Show Winner",
                    "Showmanship Halter", "Sidesaddle", "Stallion - Stud - Breeding", "Started Under Saddle",
                    "Steer Roping", "Steer Wrestling", "Stock", "Team Driving", "Team Penning",
                    "Team Roping", "Team Roping - Head", "Team Roping - Heel", "Team Sorting",
                    "Therapeutic Riding", "Therapy", "Trail Class Competition", "Trail Master",
                    "Trail Riding", "Trick", "Unicorn", "Vaulting", "Western", "Western Dressage",
                    "Western Pleasure", "Western Riding", "Working Cattle", "Working Equitation", "4H"
                ];

                let selectedValues2 = [];

                const dropdownList = document.getElementById("dropdownList");
                const searchInput = document.getElementById("searchInput");
                const tagsContainer = document.getElementById("tagsContainer");

                window.toggleDropdown = function() {
                    dropdownList.classList.toggle("active");
                    filterOptions(searchInput.value);
                }

                window.handleInput = function() {
                    dropdownList.classList.add("active");
                    filterOptions(searchInput.value);
                }

                window.handleKeyDown = function(e) {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        const inputValue = searchInput.value.trim();
                        if (inputValue && !selectedValues2.includes(inputValue) && selectedValues2.length < 5) {
                            selectedValues2.push(inputValue);
                            searchInput.value = "";
                            renderTags();
                            filterOptions("");
                        }
                    }
                }

                function filterOptions(query) {
                    const filtered = allOptions.filter(option =>
                        option.toLowerCase().startsWith(query.toLowerCase()) &&
                        !selectedValues2.includes(option)
                    );

                    dropdownList.innerHTML = "";

                    filtered.forEach(option => {
                        const div = document.createElement("div");
                        div.textContent = option;
                        div.onclick = () => selectOption(option);
                        dropdownList.appendChild(div);
                    });

                    if (filtered.length === 0 && query.trim() !== "") {
                        const customOption = document.createElement("div");
                        customOption.textContent = `Add "${query}"`;
                        customOption.className = "custom-option";
                        customOption.onclick = () => {
                            if (!selectedValues2.includes(query) && selectedValues2.length < 5) {
                                selectedValues2.push(query);
                                searchInput.value = "";
                                renderTags();
                                filterOptions("");
                            }
                        };
                        dropdownList.appendChild(customOption);
                    }
                }

                function selectOption(value) {
                    if (!selectedValues2.includes(value) && selectedValues2.length < 5) {
                        selectedValues2.push(value);
                        searchInput.value = "";
                        renderTags();
                        filterOptions("");
                    }
                }

                window.removeTag2 = function(value) {
                    selectedValues2 = selectedValues2.filter(v => v !== value);
                    renderTags();
                    filterOptions(searchInput.value);
                }

                function renderTags() {
                    tagsContainer.innerHTML = "";
                    selectedValues2.forEach(value => {
                        const tag = document.createElement("div");
                        tag.className = "tag";
                        tag.innerHTML = `${value} <button onclick="removeTag2('${value}')">✕</button>`;
                        tagsContainer.appendChild(tag);
                    });
                    document.getElementById("selectedActivitiesInput").value = selectedValues2.join(',');
                }

                document.addEventListener("click", (e) => {
                    if (!document.querySelector(".dropdown-container").contains(e.target)) {
                        dropdownList.classList.remove("active");
                    }
                });

                renderTags();
            })();
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const textarea = document.querySelector('textarea[name="pro_desc"]');
                const charCount = document.getElementById("charCount");
                const maxLength = 2000;

                textarea.addEventListener("input", function() {
                    let currentLength = textarea.value.length;
                    charCount.textContent = `${currentLength} / ${maxLength} characters`;

                    // Optional: color warning near limit
                    if (currentLength > maxLength * 0.9) {
                        charCount.style.color = "red";
                    } else {
                        charCount.style.color = "#666";
                    }
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

    @endsection
