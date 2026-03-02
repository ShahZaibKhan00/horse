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
            width: 80px;
            height: 80px;
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
            max-width: 960px;
            margin: 0 auto;
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
        /* Only what's needed - no reset here so it plays nice with other frameworks */
        .fsm-overlay {
            display: none;
            position: fixed;
            inset: 0;
            width: 100vw;
            background: rgb(0 0 0 / 54%);
            z-index: 9999;
            align-items: center;
            backdrop-filter: blur(2px);
            justify-content: center;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .fsm-overlay.is-visible {
            display: flex;
            opacity: 1;
        }

        .fsm-dialog {
            background: #fff;
            padding: 20px;
            border-radius: 1rem;
            max-width: 1180px;
            max-height: 100vh;
            width: 100%;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 30px 70px -15px rgba(0, 0, 0, 0.7);
            transform: scale(0.95);
            transition: transform 0.25s ease;
            /* Firefox scrollbar */
            scrollbar-width: thin;
            /* Makes it thinner */
            scrollbar-color: #888 #f1f1f1;
            /* thumb color, track color */
        }

        /* WebKit browsers */
        .fsm-dialog::-webkit-scrollbar {
            width: 5px;
            /* width of the scrollbar */
        }

        .fsm-dialog::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* track color */
            border-radius: 10px;
        }

        .fsm-dialog::-webkit-scrollbar-thumb {
            background: #888;
            /* thumb color */
            border-radius: 10px;
        }

        .fsm-dialog::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* thumb color on hover */
        }

        .fsm-overlay.is-visible .fsm-dialog {
            transform: scale(1);
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

        .fsm-close:hover,
        .fsm-close:focus {
            color: #000;
            outline: none;
        }
    </style>
    <style>
        .fsm-content {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .detail_left {
            width: 100%;
            background: #fff;
            z-index: 1;
            position: relative;
        }

        .top_blue_strip_flex {
            display: flex;
            background: #1d2139;
            position: relative;
            justify-content: flex-end;
        }

        .sale_tag {
            font-size: 16px;
            font-weight: 700;
            padding: 8px 15px;
            background: #bf9855;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            position: absolute;
            top: -5px;
            left: -10px;
            width: fit-content;
            text-transform: uppercase;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 0;
            z-index: 999;
            color: #1d2139;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        .h_tages {
            display: flex;
            align-items: center;
            gap: 0px;
            justify-content: center;
            font-weight: 700;
            padding-top: 4px;
        }

        .top_blue_strip {
            background: #1d2139;
            padding: 25px 5px 10px 5px;
            position: relative;
        }

        .heading44px {
            font-size: 40px;
            color: var(--primeColor);
        }

        .top_blue_strip .heading44px {
            color: white;
            text-align: center;
            text-transform: uppercase;
            margin: 0;
        }

        .text_border {
            font-size: 30px;
            text-shadow: -1px 0 0 #ba9148, 1px 0 0 #ba9148, 0 -1px 0 #ba9148, 0 1px 0 #ba9148, -1px -1px 0 #ba9148, 1px -1px 0 #ba9148, -1px 1px 0 #ba9148, 1px 1px 0 #ba9148;
            line-height: 1;
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

        .horse_arrow {
            background: transparent !important;
            border: 0 !important;
            font-size: 20px !important;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            position: absolute !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            z-index: 9999 !important;
            width: 30px !important;
            height: 30px !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .horse_arrow.right {
            right: 10px;
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
            font-weight: 600;
            color: #fff;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
        }

        .horser_information_box.mb-0 {
            background: #fff;
            border-bottom: 0;
            border: 0;
            padding: 0px 0px;
        }

        .custome_listing_row {
            display: flex;
            width: 100%;
            gap: 5px;
        }

        .custome_listing_col {
            width: 50%;
        }

        .custome_listing_col .info_list {
            margin: 0;
            padding-left: 0;
        }

        .info_list {
            list-style: none;
            margin: 15px 0px;
        }

        .horser_information_box ul li {
            text-transform: uppercase;
            color: white;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 700;
            list-style: none;
            border: 2px solid #1d2139;
            padding: 8px;
            text-align: center;
        }

        .custome_listing_col .info_list li {
            font-size: 17px;
            margin: 5px 0px;
            padding: 2px 10px;
            text-transform: uppercase;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #1d2139;
            border-width: 1px;
        }

        .horser_information_box {
            background: #1d2139;
            border-radius: 0px;
            border: 2px solid #1d2139;
        }

        .horser_information_box.type_one {
            padding: 5px 5px;
        }

        .heading30px {
            font-size: 30px;
            color: var(--primeColor);
        }

        .price_Text {
            font-size: 30px;
            margin: 0;
            background: linear-gradient(to right, #e5dbc2 40%, #c19b59 75%, #c3ad72 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            text-align: center;
        }

        .horser_information_box .heading44px,
        .horser_information_box .heading30px {
            color: white;
        }

        .horse_list_card_btn_flex_new.bottom_row {
            display: flex;
            gap: 5px;
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

        a:visited {
            text-decoration: none;
            outline: 0;
        }

        .horser_action_info_btn.action_btn,
        .horse_info_btn.fvrt_btn.action_btn {
            width: 28%;
            font-size: 15.5px;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
        }

        .image-grid div {
            display: block;
            position: relative;
            overflow: hidden;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            padding: 10px;
        }

        .image-grid div img {
            transition: filter 0.3s ease;
        }

        .image-grid img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .image-grid a::after {
            content: "\f06e";
            font-family: "FontAwesome";
            font-size: 34px;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .heading65px {
            font-size: 65px;
            color: #ab8d35;
            background: #1d2139;
            text-align: center;
            padding: 10px 20px;
            position: relative;
        }

        .view_detail_page .heading65px h1 {
            font-size: 30px;
            margin: 0;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .view_detail_page .heading65px img {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            max-width: 60px;
        }

        .border_box_one {
            border: 3px solid #1d2139;
            padding: 20px;
        }

        .border_box_one.p-1 {
            border: 0;
            padding: 0px;
        }

        .gen_list_flex {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1000px;
            column-gap: 5px;
            row-gap: 5px;
        }

        .border_box_one ul li {
            font-size: 13px;
            font-weight: 700;
            color: #1d2139;
            list-style: none;
            display: flex;
            align-items: center;
            /* margin: 5px; */
            padding: 20px 30px;
            width: 307px;
            box-shadow: rgba(50, 50, 93, 0.1) 0px 20px 40px -12px inset, rgba(0, 0, 0, 0.1) 0px 12px 24px -18px inset;
            border: 2px solid #1d2139;
            flex-direction: column;
        }

        .border_box_one ul li:last-child {
            margin: 0;
        }

       .border_box_one ul li span img {
    max-width: 35px;
    display: none;
}

        .border_box_one.ppe_border_box {
            display: flex;
            align-items: center;
            gap: 20px;
            justify-content: space-between;
        }

        .ppe_xray_box {
            text-align: center;
            max-width: 288px;
            margin: 0 auto;
        }

        .pedigree_box {
            display: flex;
            align-items: center;
            border: 1px solid #000;
        }

        .pedigree_box_1 {
            width: 25%;
            height: 200px;
            border: 1px solid #000;
        }

        .pedigree_box_2 {
            width: 100%;
            height: 100px;
        }

        .border_btm {
            border-bottom: 2px solid #000;
        }

        .pedigree_box_3 {
            width: 100%;
            height: 50px;
        }

        .pedigree_box_4 {
            width: 100%;
            height: 25px;
        }

        .xy_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pedigree_box p {
            margin: 0;
            font-size: 12px;
        }

        .colord_box {
            background: #e4dfdf;
        }

        .border_box_one iframe {
            width: 100%;
            height: 320px;
        }

        .reg {
            font-size: 22px;
        }

        .heading18px {
            font-size: 18px;
            color: var(--primeColor);
        }

        .heading44px {
            font-size: 35px;
        }

        .seller_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .seller_img {
            width: 100%;
            height: 300px;
        }

        .seller_desc {
            font-size: 14px;
            margin: 0 !important;
            margin-bottom: 10px !important;
            height: 105px;
            overflow-y: auto;
        }

        .social_icons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .social_icons a {
            width: 60px;
            height: 60px;
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
            max-width: 26px;
        }

        .horse_slider {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .horse_slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .horse_slide {
            min-width: 100%;
        }

        .horse_arrow.left {
            left: 10px;
        }

        .horse_arrow.right {
            right: 10px;
        }

        .horse_pagination {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .horse_pagination span {
            width: 10px;
            height: 10px;
            background: #ccc;
            border-radius: 50%;
            cursor: pointer;
        }

        .horse_pagination span.active {
            background: #000;
        }
    </style>
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
        video.img-fluid {
            width: 100%;
            height: 400px;
            object-fit: contain;
        }
    </style>
    <div class="content user_main_content p-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="mb-9" action="{{ route('submit_list') }}" id="myForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cate_id_name" value="{{ $name }}">
            <div class="box_top">
                <h2 class="mb-2 main_heading_dashboard">Horse Ad Information</h2>
            </div>
            <div class="row gy-4">
                <div class="col-12">
                    <div class="border_box_one">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h4 class="mb-3">Breed Type <span class="asterisk">*</span></h4>
                            </div>
                            <div class="col-12">
                                <select class="form-control gen_input breed-select" name="pro_breed" required>
                                    <option disabled selected>Select a Breed</option>
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
                    </div>
                </div>
                <div class="col-12">
                    <div class="border_box_one">
                        <h4 class="mb-3">Horse Name: <span class="asterisk">*</span> <small class="text-muted">( to be
                                displayed at the top of the ad)</small>
                        </h4>
                        <input class="form-control gen_input" type="text" name="pro_name" placeholder="Write title here..." value="{{ old('pro_name') }}" required />
                    </div>
                </div>
                <div class="col-12">
                    <div class="border_box_one">
                        <h4 class="mb-2">Details<span class="asterisk">*</span> <small class="text-muted">(For Information Purpose Only)</small></h4>
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control gen_input mb-3" type="text" name="pro_address" placeholder="Enter Your Address" />
                            </div>
                            <h4 class="mb-2">Town / City<span class="asterisk">*</span> <small class="text-muted">(For Ad Purpose Only)</small></h4>
                            <div class="col-6">
                                <input class="form-control gen_input mb-3" type="text" name="pro_city" placeholder="Enter Town" required />
                            </div>
                            <div class="col-6">
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
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="border_box_one">
                        <div class="mb-3">
                            <h4 class="mb-3 text-1000">Price [$] <span class="asterisk" id="astrik">*</span> <small class="text-muted"></small></h4>
                            <input class="form-control gen_input gen_input thousand-separator numbers_limit price-input" name="pro_reg_price" type="text" placeholder="Enter price" required />
                        </div>
                        <div class="row align-items-cennter">
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" name="about_price[]" {{ is_array(old('about_price')) && in_array('Firm', old('about_price')) ? 'checked' : '' }} type="checkbox"
                                            value="Firm" id="firmCheck">
                                        <label class="form-check-label" for="firmCheck">
                                            Firm
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="about_price[]" {{ is_array(old('about_price')) && in_array('Negotiable', old('about_price')) ? 'checked' : '' }}
                                            type="checkbox" value="Negotiable" id="negotiableCheck">
                                        <label class="form-check-label" for="negotiableCheck">
                                            Negotiable
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="about_price[]" {{ is_array(old('about_price')) && in_array('Firm', old('about_price')) ? 'checked' : '' }} type="checkbox"
                                            value="May Trade" id="tradeCheck">
                                        <label class="form-check-label" for="tradeCheck">
                                            May Trade
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="about_price[]" {{ is_array(old('about_price')) && in_array('Firm', old('about_price')) ? 'checked' : '' }} type="checkbox"
                                            value="Payment Options Available" id="poa-check">
                                        <label class="form-check-label" for="poa-check">
                                            Payment Options Available
                                        </label>
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
                            <div class="col-5 d-flex flex-column gap-2">
                                <div class="form-check">
                                    <label><input class="form-check-input" name="pro_ad_type" type="radio" value="For Sale" required />
                                        For Sale</label>
                                </div>
                                <div class="form-check">
                                    <label><input class="form-check-input" name="pro_ad_type" type="radio" value="At Auction" /> At Auction</label>
                                </div>
                                {{--
                  <div class="form-check">
                     <label><input class="form-check-input" name="pro_ad_type" type="radio" value="Private Treaty" /> Private Treaty</label>
                  </div>
                  --}}
                                <div class="form-check">
                                    <label><input class="form-check-input" name="pro_ad_type" type="radio" value="For Lease" />
                                        For Lease</label>
                                </div>
                                <div class="form-check">
                                    <label><input class="form-check-input" name="pro_ad_type" type="radio" value="At Stud" /> At Stud</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border_box_one mb-4">
                        <h4 class="mb-3">Trial Period</h4>
                        <div class="form-check">
                            <input class="form-check-input" name="trial_period" type="radio" value="Yes" id="yes_trial">
                            <label class="form-check-label" for="yes_trial">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="trial_period" type="radio" value="No" id="no_trial">
                            <label class="form-check-label" for="no_trial">
                                No
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="trial_period" type="radio" value="May Consider" id="may_trial">
                            <label class="form-check-label" for="may_trial">
                                May Consider
                            </label>
                        </div>
                    </div>
                    <div class="border_box_one">
                        <h4 class="mb-3">Registered</h4>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" id="yes" name="registerd_horse">
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" id="no" name="registerd_horse" checked>
                                <label class="form-check-label" for="no">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="bid_box">
                        <h4 class="mb-5 text-1000">Will be shown on first picture of ad</h4>
                        <div class="row gy-4">
                            <div class="col-6">
                                <h5 class="mb-3">Starting Bid Amount</h5>
                                <input class="form-control gen_input thousand-separator" type="text" name="bid_amount" placeholder="Start bid" />
                            </div>
                            <div class="col-6">
                                <h5 class="mb-3">Reserve Amount (Optional) </h5>
                                <input class="form-control gen_input thousand-separator" type="text" name="reserve_amount" placeholder="Reserve Amount" />
                            </div>
                            <div class="col-6">
                                <h5 class="mb-3">Start Date</h5>
                                <input class="form-control gen_input" type="date" name="auc_start_date" placeholder="Start bid" />
                            </div>
                            <div class="col-6">
                                <h5 class="mb-3">End Date</h5>
                                <input class="form-control gen_input" type="date" name="auc_end_date" placeholder="Reserve Amount" />
                            </div>
                            <div class="col-12">
                                <h5 class="mb-3">Auction Link</h5>
                                <input class="form-control gen_input" type="url" name="auc_link" placeholder="Please past the link to your horses ad on the auction" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="registration_box border_box_one" style="display: none;">
                        <div class="col-12 mb-4">
                            <h4 class="mb-3">Horse Registered Name:</h4>
                            <input class="form-control gen_input gen_input" type="text" name="pro_reg_name" placeholder="Type Horse Registered Name" />
                        </div>
                        <div class="col-12">
                            <h5 class="mb-4 text-center">Upload Papers</h5>
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <h4 class="mb-3">Registration Association:</h4>
                                        <input class="form-control gen_input gen_input" type="text" name="pro_reg_association" placeholder="Type Registration Association" />
                                    </div>
                                    <div class="mb-0">
                                        <h4 class="mb-3">Registration Number:</h4>
                                        <input class="form-control gen_input gen_input" type="text" name="pro_reg_number" placeholder="Type Registration Association" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="upload__box">
                                        <div class="upload__img-wrap"></div>
                                        <div class="upload__btn-box">
                                            <label class="upload__btn">
                                                <p>Drag your file here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                                <input name="pro_reg_file[]" type="file" multiple class="upload__inputfile" accept="image/*,application/pdf">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="border_box_one pedigree_form">
                        <h4 class="mb-3"> Pedigree</h4>
                        <div class="sire-form mb-4">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <div class="box_dark">
                                        <h4 class="mb-2">Sire:</h4>
                                        <input class="form-control gen_input" id="pedigree_start_1" type="text" name="pro_sire" placeholder="Type Here" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box_dark one">
                                        <div class="grand-sire-wrapper mb-4">
                                            <h4 class="mb-2">Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_1" type="text" name="pro_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="grand-dam-wrapper">
                                            <h4 class="mb-2">Grand Dam </h4>
                                            <input class="form-control gen_input" id="pedigree_2" type="text" name="pro_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box_dark two mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_1_1" type="text" name="pro_great_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Grand Dam</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_1_2" type="text" name="pro_great_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark three">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_2_1" type="text" name="pro_great_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-0">
                                            <h4 class="mb-2">Great Grand Dam</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_2_2" type="text" name="pro_great_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box_dark four mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_1_1_1" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_1_1_2" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark five mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_1_2_1" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_1_2_2" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark six mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_2_1_1" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_2_1_2" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark seven">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_2_2_1" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-0">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input gen_input" id="pedigree_2_2_2" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dam-form">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <div class="box_dark">
                                        <h4 class="mb-2">Dam:</h4>
                                        <input class="form-control gen_input" id="pedigree_start_1_dam" name="pro_dam" type="text" placeholder="Type Here" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box_dark one_dam">
                                        <div class="grand-sire-wrapper-dam mb-4">
                                            <h4 class="mb-2">Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_1_dam" type="text" name="pro_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="grand-dam-wrapper-dam">
                                            <h4 class="mb-2">Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_2_dam" type="text" name="pro_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box_dark two_dam mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_1_1_dam" type="text" name="pro_great_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_1_2_dam" type="text" name="pro_great_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark three_dam">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_2_1_dam" type="text" name="pro_great_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-0">
                                            <h4 class="mb-2">Great Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_2_2_dam" type="text" name="pro_great_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box_dark four_dam mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_1_1_1_dam" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_1_1_2_dam" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark five_dam mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_1_2_1_dam" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_1_2_2_dam" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark six_dam mb-5">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_2_1_1_dam" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_2_1_2_dam" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                    <div class="box_dark seven_dam">
                                        <div class="mb-4">
                                            <h4 class="mb-2">Great Great Grand Sire</h4>
                                            <input class="form-control gen_input" id="pedigree_2_2_1_dam" type="text" name="pro_twogreat_grand_sire[]" placeholder="Type Here" />
                                        </div>
                                        <div class="mb-0">
                                            <h4 class="mb-2">Great Great Grand Dam</h4>
                                            <input class="form-control gen_input" id="pedigree_2_2_2_dam" type="text" name="pro_twogreat_grand_dam[]" placeholder="Type Here" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border_box_one">
                        <h4 class="mb-3"> Color <span class="asterisk">*</span></h4>
                        <select class="form-control gen_input breed-select" name="pro_color" required>
                            <option value="">Select an option</option>
                            <option value="Appaloosa">Appaloosa</option>
                            <option value="Bay">Bay</option>
                            <option value="Bay Dun">Bay Dun</option>
                            <option value="Bay Dun Roan">Bay Dun Roan</option>
                            <option value="Bay Roan">Bay Roan</option>
                            <option value="Black">Black</option>
                            <option value="Black Bay">Black Bay</option>
                            <option value="Blue Roan">Blue Roan</option>
                            <option value="Brindle">Brindle</option>
                            <option value="Brown">Brown</option>
                            <option value="Buckskin">Buckskin</option>
                            <option value="Buckskin Roan">Buckskin Roan</option>
                            <option value="Champagne">Champagne</option>
                            <option value="Chestnut">Chestnut</option>
                            <option value="Chocolate">Chocolate</option>
                            <option value="Chocolate Flaxen">Chocolate Flaxen</option>
                            <option value="Cream">Cream</option>
                            <option value="Cremello">Cremello</option>
                            <option value="Cremello Dun">Cremello Dun</option>
                            <option value="Dapple Grey">Dapple Grey</option>
                            <option value="Dun">Dun</option>
                            <option value="Dunalino">Dunalino</option>
                            <option value="Dunskin">Dunskin</option>
                            <option value="Flaxen">Flaxen</option>
                            <option value="Flea-bitten Gray">Flea-bitten Gray</option>
                            <option value="Frame Overo">Frame Overo</option>
                            <option value="Grey">Grey</option>
                            <option value="Grullo">Grullo</option>
                            <option value="Isabella">Isabella</option>
                            <option value="Lerino Dun">Lerino Dun</option>
                            <option value="Liver Chestnut">Liver Chestnut</option>
                            <option value="Other">Other</option>
                            <option value="Overo">Overo</option>
                            <option value="Paint">Paint</option>
                            <option value="Paintaloosa">Paintaloosa</option>
                            <option value="Palomino">Palomino</option>
                            <option value="Palomino Roan">Palomino Roan</option>
                            <option value="Pearl">Pearl</option>
                            <option value="Perlino">Perlino</option>
                            <option value="Piebald">Piebald</option>
                            <option value="Pinto">Pinto</option>
                            <option value="Red Chocolate">Red Chocolate</option>
                            <option value="Red Dun">Red Dun</option>
                            <option value="Red Dun Roan">Red Dun Roan</option>
                            <option value="Red Roan">Red Roan</option>
                            <option value="Roan">Roan</option>
                            <option value="Sabino">Sabino</option>
                            <option value="Seal Brown">Seal Brown</option>
                            <option value="Silver">Silver</option>
                            <option value="Silver Bay">Silver Bay</option>
                            <option value="Silver Black">Silver Black</option>
                            <option value="Silver Black Roan">Silver Black Roan</option>
                            <option value="Silver Buckskin">Silver Buckskin</option>
                            <option value="Silver Dapple">Silver Dapple</option>
                            <option value="Silver Perlino">Silver Perlino</option>
                            <option value="Silver Smokey Black">Silver Smokey Black</option>
                            <option value="Silver Smokey Cream">Silver Smokey Cream</option>
                            <option value="Skewbald">Skewbald</option>
                            <option value="Smokey Black">Smokey Black</option>
                            <option value="Smokey Cream">Smokey Cream</option>
                            <option value="Smokey Cream Dun">Smokey Cream Dun</option>
                            <option value="Smokey Grullo">Smokey Grullo</option>
                            <option value="Sooty Buckskin">Sooty Buckskin</option>
                            <option value="Sorrel">Sorrel</option>
                            <option value="Splash Overo">Splash Overo</option>
                            <option value="Splash White">Splash White</option>
                            <option value="Tobiano">Tobiano</option>
                            <option value="Tovero">Tovero</option>
                            <option value="Unknown">Unknown</option>
                            <option value="White">White</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border_box_one">
                        <h4 class="mb-3">Gender <span class="asterisk">*</span></h4>
                        <select class="form-control gen_input breed-select" name="pro_gender" required>
                            <option value="">Select an Option</option>
                            <option value="Colt">Colt</option>
                            <option value="Filly">Filly</option>
                            <option value="Gelding">Gelding</option>
                            <option value="Mare">Mare</option>
                            <option value="Stallion">Stallion</option>
                            <option value="Unborn Foal">Unborn Foal</option>
                            <option value="Jack">Jack</option>
                            <option value="Jenny">Jenny</option>
                            <option value="John">John</option>
                            <option value="Molly">Molly</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border_box_one">
                        <h4 class="mb-3">Height <span class="asterisk">*</span></h4>
                        <select class="form-control gen_input" name="pro_height" required>
                            <option value="" disabled selected>Select an Option</option>
                            <option value="5.0">5.0 hh (20in)</option>
                            <option value="6.0">6.0 hh (24in)</option>
                            <option value="7.0">7.0 hh (28in)</option>
                            <option value="8.0">8.0 hh (32in)</option>
                            <option value="8.2">8.2 hh (34in)</option>
                            <option value="9.0">9.0 hh (36in)</option>
                            <option value="9.2">9.2 hh (38in)</option>
                            <option value="10.0">10.0 hh (40in)</option>
                            <option value="10.2">10.2 hh</option>
                            <option value="11.0">11.0 hh (44in)</option>
                            <option value="11.2">11.2 hh</option>
                            <option value="12.0">12.0 hh (48in)</option>
                            <option value="12.1">12.1 hh</option>
                            <option value="12.2">12.2 hh</option>
                            <option value="12.3">12.3 hh</option>
                            <option value="13.0">13.0 hh (52in)</option>
                            <option value="13.1">13.1 hh</option>
                            <option value="13.2">13.2 hh</option>
                            <option value="13.3">13.3 hh</option>
                            <option value="14.0">14.0 hh (56in)</option>
                            <option value="14.1">14.1 hh</option>
                            <option value="14.2">14.2 hh</option>
                            <option value="14.3">14.3 hh</option>
                            <option value="15.0">15.0 hh (60in)</option>
                            <option value="15.1">15.1 hh</option>
                            <option value="15.2">15.2 hh</option>
                            <option value="15.3">15.3 hh</option>
                            <option value="16.0">16.0 hh (64in)</option>
                            <option value="16.1">16.1 hh</option>
                            <option value="16.2">16.2 hh</option>
                            <option value="16.3">16.3 hh</option>
                            <option value="17.0">17.0 hh (68in)</option>
                            <option value="17.1">17.1 hh</option>
                            <option value="17.2">17.2 hh</option>
                            <option value="17.3">17.3 hh</option>
                            <option value="18.0">18.0 hh (72in)</option>
                            <option value="18.1">18.1 hh</option>
                            <option value="18.2">18.2 hh</option>
                            <option value="18.3">18.3 hh</option>
                            <option value="19.0">19.0 hh (76in)</option>
                            <option value="20.0">20.0 hh (80in)</option>
                            <option value="21.0">21.0 hh (84in)</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border_box_one">
                        <h4 class="mb-3">Age <span class="asterisk">*</span></h4>
                        <div class="row">
                            <div class="col-6 pe-2">
                                <select class="form-control gen_input" name="pro_age_year">
                                    <option selected disabled>Years</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                            <div class="col-6 ps-2">
                                <select class="form-control gen_input" name="pro_age_month">
                                    <option selected disabled>Months</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
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
                                    Your first 3 selected skills/disciplines will display on your ad card. All selected
                                    skills/disciplines will display on your full ad page. Max 5 Skill/Discipline
                                </small>
                            </h4>
                            <input type="hidden" name="pro_skill" id="selectedActivitiesInput" />
                            <div class="dropdown-container">
                                <div class="dropdown-header" id="dropdownHeader">
                                    <div class="tags" id="tagsContainer"></div>
                                    <input type="text" id="searchInput" placeholder="Start typing or Select an Option from the drop down list." oninput="handleInput()"
                                        onkeydown="handleKeyDown(event)" name="pro_rider_level_display" />
                                    <span class="dropdown-arrow" onclick="toggleDropdown()">▼</span>
                                </div>
                                <div class="dropdown-list" id="dropdownList">
                                    <div onclick="selectOption(this)" data-value="Agility">Agility</div>
                                    <div onclick="selectOption(this)" data-value="All Around">All Around</div>
                                    <div onclick="selectOption(this)" data-value="All-Around Show">All-Around Show</div>
                                    <div onclick="selectOption(this)" data-value="Beginner">Beginner</div>
                                    <div onclick="selectOption(this)" data-value="Barrel Racing">Barrel Racing</div>
                                    <div onclick="selectOption(this)" data-value="Barrels* Poles *Gymkhana">Barrels* Poles
                                        *Gymkhana
                                    </div>
                                    <div onclick="selectOption(this)" data-value="Breakaway Roping">Breakaway Roping</div>
                                    <div onclick="selectOption(this)" data-value="Brood mare">Brood mare</div>
                                    <div onclick="selectOption(this)" data-value="Cutting Prospect">Cutting Prospect</div>
                                    <div onclick="selectOption(this)" data-value="Cutting">Cutting</div>
                                    <div onclick="selectOption(this)" data-value="Calf Roping">Calf Roping</div>
                                    <div onclick="selectOption(this)" data-value="Clicker Training">Clicker Training</div>
                                    <div onclick="selectOption(this)" data-value="Companion Only">Companion Only</div>
                                    <div onclick="selectOption(this)" data-value="Competitive Trail Riding">Competitive Trail
                                        Riding
                                    </div>
                                    <div onclick="selectOption(this)" data-value="Country English Pleasure">Country English
                                        Pleasure
                                    </div>
                                    <div onclick="selectOption(this)" data-value="Cowboy Dressage">Cowboy Dressage</div>
                                    <div onclick="selectOption(this)" data-value="Cowboy Mounted Shooting">Cowboy Mounted
                                        Shooting
                                    </div>
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
                                    <div onclick="selectOption(this)" data-value="Hunt Seat Equitation">Hunt Seat Equitation
                                    </div>
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
                                    <div onclick="selectOption(this)" data-value="Natural Horsemanship Training">Natural
                                        Horsemanship Training
                                    </div>
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
                                    <div onclick="selectOption(this)" data-value="Ranch Conformation Class">Ranch Conformation
                                        Class
                                    </div>
                                    <div onclick="selectOption(this)" data-value="Ranch Rail Class">Ranch Rail Class</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Riding - Ranch Pleasure">Ranch Riding -
                                        Ranch Pleasure
                                    </div>
                                    <div onclick="selectOption(this)" data-value="Ranch Sorting">Ranch Sorting</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Trail Class">Ranch Trail Class</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Versatility">Ranch Versatility</div>
                                    <div onclick="selectOption(this)" data-value="Ranch Work">Ranch Work</div>
                                    <div onclick="selectOption(this)" data-value="Reining">Reining</div>
                                    <div onclick="selectOption(this)" data-value="Reining - Cowhorse - Cutting">Reining -
                                        Cowhorse - Cutting
                                    </div>
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
                                    <div onclick="selectOption(this)" data-value="Stallion - Stud - Breeding">Stallion - Stud -
                                        Breeding
                                    </div>
                                    <div onclick="selectOption(this)" data-value="Started Under Saddle">Started Under Saddle
                                    </div>
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
                                    <div onclick="selectOption(this)" data-value="Trail Class Competition">Trail Class
                                        Competition
                                    </div>
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
                                <input type="hidden" name="pro_rider_level" id="pro_rider_level" value="">
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
                                <div data-value="Beginner Riders - have minimal or no experience">Beginner Riders - have
                                    minimal or no experience
                                </div>
                                <div data-value="Novice Riders - have a basic understanding of riding and can perform basic gaits.">
                                    Novice Riders - have a basic understanding of riding and can perform basic gaits.
                                </div>
                                <div data-value="Intermediate Riders - are comfortable with all gaits and can handle more challenging situations">
                                    Intermediate Riders - are comfortable with all gaits and can handle more challenging
                                    situations
                                </div>
                                <div data-value="Advanced Riders - have a high level of skill and experience, often competing or riding at a professional level.">
                                    Advanced Riders - have a high level of skill and experience, often competing or riding
                                    at a professional level.
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="pro_rider_level_display" id="riderLevelsInput" value="">
                </div>
                <div class="col-6">
                    <div class="border_box_one pb_50">
                        <h4 class="mb-3"> Gaited</h4>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Yes" id="gaited_yes" name="gaited">
                                <label class="form-check-label" for="gaited_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="No" id="gaited_no" name="gaited">
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
                            <textarea class="textarea" name="pro_desc" maxlength="2000" style="width: 100%; height: 15rem;" placeholder="Write a description here..." required></textarea>
                            <div id="charCount" style="margin-top: 5px; font-size: 0.9rem; color: #666;">0 / 2000 characters
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row align-items-center gy-4">
                        <div class="col-6">
                            <div class="border_box_one">
                                <h4 class="mb-3">PPE</h4>
                                <div class="col-12">
                                    <div class="upload__box">
                                        <div class="upload__img-wrap"></div>
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
                                        <div class="upload__img-wrap"></div>
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
                                <h4 class="card-title mb-4">Media Featured Image <span class="asterisk" id="astrik">*</span>
                                </h4>
                                <div class="">
                                    <div class="col-12 mb-3">
                                        <div class="upload__box">
                                            <div class="upload__img-wrap"></div>
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
                        <div class="col-12 mb-4">
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
                                        <div class="custom-upload-images-flex" id="customUploadImagesContainer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="border_box_one">
                    <h4 class="">Upload Video:</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="">Video URL:</h5>
                                <a href="#!" class="add_url_btn">Add another video</a>
                            </div>
                            <div id="video_inputs_wrapper">
                                <div class="video_input d-flex align-items-center mb-2">
                                    <input class="form-control gen_input" type="url" name="pro_youtube" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
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
                                            <button class="btn btn-link p-0" type="button">Browse from device</button>
                                        </p>
                                        <input name="pro_video_url[]" type="file" multiple class="upload__inputfile" accept="video/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="col-12 mb-4">
                  <h2 class="mb-3 text-white">Contact Details</h2>
                  <div class="border_box_one">
                      <div class="row gy-4">
                          <div class="col-6">
                              <h4 class="mb-3">State:<span class="asterisk">*</span></h4>
                              <select class="form-control gen_input_one" name="per_state">
                                  <option value="">Select your state</option>
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
                          <div class="col-6">
                              <h4 class="mb-3">Phone:<span class="text-danger">*</span></h4>
                              <input class="form-control gen_input_one phone-input" type="tel" name="per_phone" placeholder="Enter Phone" />
                          </div>
                          <div class="col-6">
                              <h4 class="mb-3">Zip:</h4>
                              <input class="form-control gen_input_one" type="tel" name="per_zip" placeholder="Enter Zip code" />
                          </div>
                          <div class="col-6">
                              <h4 class="mb-3">Email:</h4>
                              <input class="form-control gen_input_one" type="email" name="per_email" placeholder="Enter email address" />
                          </div>
                          <div class="col-6">
                              <h4 class="mb-3">Address:</h4>
                              <input class="form-control gen_input_one" type="text" name="per_address" placeholder="Enter Address" />
                          </div>
                          <div class="col-6">
                              <h4 class="mb-3">Website:</h4>
                              <input class="form-control gen_input_one" type="url" name="per_website" placeholder="Enter website" />
                          </div>
                      </div>
                  </div>
                  </div>-->
            <div class="col-12 mb-4">
                <h2 class="text-white mb-3">Social Profiles</h2>
                <div class="border_box_one">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mb-3">Facebook:</h4>
                            <input class="form-control gen_input_one mb-3" type="url" name="pro_facebook" placeholder="Enter link" />
                        </div>
                        <div class="col-6">
                            <h4 class="mb-3">Youtube:</h4>
                            <input class="form-control gen_input_one mb-3" type="url" name="pro_youtube" placeholder="Enter link" />
                        </div>
                        <div class="col-6">
                            <h4 class="mb-3">Instagram:</h4>
                            <input class="form-control gen_input_one mb-3" type="url" name="pro_insta" placeholder="Enter link" />
                        </div>
                        <div class="col-6">
                            <h4 class="mb-3">Tiktok:</h4>
                            <input class="form-control gen_input_one" type="url" name="pro_tiktok" placeholder="Enter link" />
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
                <div class="col-auto d-flex justify-content-center gap-3">
                    @if (Auth::user()->usertype == 1)

                        <a href="{{ url('products') }}/{{ last(request()->segments()) }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a>
                    @else
                        <a href="{{ url('horse-listing') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a>

                    @endif
                    <button class="btn submit_btn_one" type="submit">Submit</button>
                    <button type="button" id="previewBtn" class="btn submit_btn_one">Preview</button>
                </div>
            </div>
        </form>
        <div id="fsmOverlay" class="fsm-overlay">
            <div class="fsm-dialog">
                <button class="fsm-close" aria-label="Close modal">×</button>
                <div class="fsm-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="detail_left">
                                <div class="top_blue_strip_flex">
                                    <h3 class="sale_tag">For Sale</h3>
                                    <div class="h_tages">
                                    </div>
                                </div>
                                <div class="top_blue_strip">
                                    <h3 class="heading44px fw_700 text_border">Boaz</h3>
                                </div>
                                <div class="relative_img_box">
                                    <div class="horse_slider">
                                        <div class="horse_slides">
                                            <div class="horse_slide">
                                                <img src="/assets/images/placeholder.png" class="img-fluid w-100 img_radius_one">
                                            </div>
                                            <div class="horse_slide">
                                                <img src="/assets/images/placeholder.png" class="img-fluid w-100 img_radius_one">
                                            </div>
                                            <div class="horse_slide">
                                                <img src="/assets/images/placeholder.png" class="img-fluid w-100 img_radius_one">
                                            </div>
                                        </div>
                                        <button class="horse_arrow left">
                                            <i class="fa fa-caret-left"></i>
                                        </button>
                                        <button class="horse_arrow right">
                                            <i class="fa fa-caret-right"></i>
                                        </button>
                                        <div class="horse_pagination"></div>
                                    </div>
                                    <h2 class="breed_text">Draft Cross</h2>
                                </div>
                                <div class="horser_information_box mb-0">
                                    <div class="custome_listing_row">
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <li><span>7 Years 0 Mo Old</span></li>
                                                <li><span>16.2 hh</span></li>
                                                <li><span>Gelding</span></li>
                                            </ul>
                                        </div>
                                        <div class="custome_listing_col">
                                            <ul class="info_list">
                                                <li><span>Paint</span></li>
                                                <li><span>REGISTERED: no</span></li>
                                                <li><span>GAITED: No</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="custome_listing_col w-100">
                                        <ul class="info_list">
                                            <li class="m-0 mb-2"><span>Lafayette new_york</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="horser_information_box type_one">
                                    <h3 class="heading30px price_Text mb-0">PRICE : $22,500</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="image-grid">
                                <div>
                                    <img src="/assets/images/placeholder.png" alt="img" class="">
                                </div>
                                <div>
                                    <img src="/assets/images/placeholder.png" alt="img" class="">
                                </div>
                                <div>
                                    <img src="/assets/images/placeholder.png" alt="img" class="">
                                </div>
                                <div>
                                    <img src="/assets/images/placeholder.png" alt="img" class="">
                                </div>
                                <div>
                                    <img src="/assets/images/placeholder.png" alt="img" class="">
                                </div>
                                <div>
                                    <img src="/assets/images/placeholder.png" alt="img" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fsm-content view_detail_page">
                    <div class="col-12">
                        <div class="mb-4">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                                <h1>SKILLS | DISCIPLINE</h1>
                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one p-1">
                                <ul class="gen_list_flex">
                                    <li>
                                        <span class="me-3">
                                            <img src="/assets/images/h_icon.png" alt="img" class="img-fluid">
                                        </span>
                                        No skills specified
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                                <h1>RIDER LEVEL</h1>
                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one p-1">
                                <ul class="gen_list_flex">
                                    <li>
                                        <span class="me-3">
                                            <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid">
                                        </span>
                                        No Level Selected
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fsm-content view_detail_page">
                    <div class="mb-4">
                        <h3 class="heading44px fw_700 about_horse_heading">About Hope:</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                            like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="mb-4">
                        <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>ADDITIONAL INFORMATION</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                        </div>
                        <div class="border_box_one p-1">
                            <ul class="gen_list_flex gen_list_flex_one">
                                <li>
                                    <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid"></span>
                                    <p class="mb-0"> Trail Period:</p>
                                    <p class="mb-0">Yes</p>
                                    <p></p>
                                </li>
                                <li>
                                    <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid"></span>
                                    <p class="mb-0">May Trade:</p>
                                    <p class="mb-0">No</p>
                                    <p></p>
                                </li>
                                <li>
                                    <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid"></span>
                                    <p class="mb-0">Payment Options Available:</p>
                                    <p class="mb-0">Yes</p>
                                    <p></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fsm-content view_detail_page">
                    <div>
                        <div class="mb-4">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                                <h1>PRE-PURCHASE EXAM</h1>
                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one ppe_border_box">
                                <div class="ppe_xray_box">
                                    <img src="/assets/images/placeholder.png" alt="img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="heading65px monte_carlo fw_400 mb-4">
                                <h1>X-RAYS</h1>
                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                            </div>
                            <div class="border_box_one ppe_border_box">
                                <div class="ppe_xray_box">
                                    <img src="/assets/images/placeholder.png" alt="img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fsm-content view_detail_page">
                    <div class="mb-4">
                        <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>PEDIGREE</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                        </div>
                        <div class="pedigree_box">
                            <div class="pedigree_box_1 colord_box xy_center">
                                <p></p>
                            </div>
                            <div class="pedigree_box_1">
                                <div class="pedigree_box_2 border_btm colord_box xy_center">
                                    <p></p>
                                </div>
                                <div class="pedigree_box_2  xy_center">
                                    <p></p>
                                </div>
                            </div>
                            <div class="pedigree_box_1">
                                <div class="pedigree_box_2 border_btm">
                                    <div class="pedigree_box_3 border_btm colord_box xy_center">
                                        <p></p>
                                    </div>
                                    <div class="pedigree_box_3  xy_center">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="pedigree_box_2">
                                    <div class="pedigree_box_3 border_btm colord_box xy_center">
                                        <p></p>
                                    </div>
                                    <div class="pedigree_box_3  xy_center">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="pedigree_box_1">
                                <div class="pedigree_box_2 border_btm">
                                    <div class="pedigree_box_3 border_btm">
                                        <div class="pedigree_box_4 border_btm colord_box xy_center">
                                            <p></p>
                                        </div>
                                        <div class="pedigree_box_4  xy_center">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="pedigree_box_3 ">
                                        <div class="pedigree_box_4 border_btm colord_box xy_center">
                                            <p></p>
                                        </div>
                                        <div class="pedigree_box_4  xy_center">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pedigree_box_2 ">
                                    <div class="pedigree_box_3 border_btm">
                                        <div class="pedigree_box_4 border_btm colord_box xy_center">
                                            <p></p>
                                        </div>
                                        <div class="pedigree_box_4  xy_center">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="pedigree_box_3 ">
                                        <div class="pedigree_box_4 border_btm colord_box xy_center">
                                            <p></p>
                                        </div>
                                        <div class="pedigree_box_4  xy_center">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>REGISTRY INFORMATION</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                        </div>
                        <div class="border_box_one">
                            <h1 class="heading30px my-2 text-center reg">Friesian Heritage and Sporthorse International</h1>
                            <h1 class="heading18px text-center">REGISTRATION #: MU-9497947472973</h1>
                            <div class="row mb-4 justify-content-center">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#!" data-fancybox="certificate">
                                        <img src="/assets/images/placeholder.png" alt="img" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#!" data-fancybox="certificate">
                                        <img src="/assets/images/placeholder.png" alt="img" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="heading65px monte_carlo fw_400 mb-4">
                            <h1>SOCIAL PROFILES</h1>
                            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid">
                        </div>
                        <div class="social_icons">
                            <a href="" target="_blank" title="Facebook"><img src="/assets/images/facebook.png" alt="img" class="img-fluid"></a>
                            <a href="" target="_blank" title="Youtube"><img src="/assets/images/youtube.png" alt="img" class="img-fluid"></a>
                            <a href="" target="_blank" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid"></a>
                            <a href="" target="_blank" title="Instagram"><img src="/assets/images/instagram.png" alt="img" class="img-fluid"></a>
                        </div>
                    </div>
                </div>

                <div class="fsm-content view_detail_page">

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
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                const slidesContainer = document.querySelector(".horse_slides");
                const slides = document.querySelectorAll(".horse_slide");
                const nextBtn = document.querySelector(".horse_arrow.right");
                const prevBtn = document.querySelector(".horse_arrow.left");
                const pagination = document.querySelector(".horse_pagination");

                let currentIndex = 0;
                const totalSlides = slides.length;

                // Create Pagination Dots
                slides.forEach((_, index) => {
                    const dot = document.createElement("span");
                    if (index === 0) dot.classList.add("active");
                    dot.addEventListener("click", () => goToSlide(index));
                    pagination.appendChild(dot);
                });

                const dots = document.querySelectorAll(".horse_pagination span");

                function updateSlider() {
                    slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
                    dots.forEach(dot => dot.classList.remove("active"));
                    dots[currentIndex].classList.add("active");
                }

                function goToSlide(index) {
                    currentIndex = index;
                    updateSlider();
                }

                nextBtn.addEventListener("click", () => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlider();
                });

                prevBtn.addEventListener("click", () => {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateSlider();
                });

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
            // Auction Bid Box Toggle
            const auctionRadioButtons = document.querySelectorAll('input[name="pro_ad_type"]');
            const bidBox = document.querySelector('.bid_box');

            function toggleBidBox() {
                const selected = document.querySelector('input[name="pro_ad_type"]:checked');
                if (selected && selected.value === "At Auction") {
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

            function updateTags() {
                selectedTags.innerHTML = "";

                if (selectedValues.length === 0) {
                    selectedTags.innerHTML = '<span class="placeholderOne">Select Level</span>';
                } else {
                    selectedValues.forEach(value => {
                        const label = value.split(" - ")[0];
                        const tag = document.createElement("span");
                        tag.className = "tag";
                        tag.innerHTML = `${label} <span class="remove">&times;</span>`;

                        tag.querySelector(".remove").addEventListener("click", () => {
                            removeTag(value);
                        });

                        selectedTags.appendChild(tag);
                    });
                }

                // Update hidden input value
                const hiddenInput = document.getElementById("riderLevelsInput");
                hiddenInput.value = selectedValues.join(",");
            }

            // Render tags
            // function updateTags() {
            //     selectedTags.innerHTML = "";

            //     if (selectedValues.length === 0) {
            //         selectedTags.innerHTML = '<span class="placeholderOne">Select Level</span>';
            //         return;
            //     }

            //     selectedValues.forEach(value => {
            //         const label = value.split(" - ")[0];
            //         const tag = document.createElement("span");
            //         tag.className = "tag";
            //         tag.innerHTML = `${label} <span class="remove">&times;</span>`;

            //         // Add event listener to remove button
            //         tag.querySelector(".remove").addEventListener("click", () => {
            //             removeTag(value);
            //         });

            //         selectedTags.appendChild(tag);
            //     });
            // }

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

                    // Set the hidden input value with comma-separated selected values
                    document.getElementById("pro_rider_level").value = selectedValues2.join(',');
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
            $(document).ready(function() {
                function toggleGrandFields() {
                    const val = $('#pedigree_start_1').val().trim();
                    if (val !== '') {
                        $('.grand-sire-wrapper').show();
                        $('.grand-dam-wrapper').show();
                        $('.box_dark.one').show();
                    } else {
                        $('.grand-sire-wrapper').hide();
                        $('.grand-dam-wrapper').hide();
                        $('.box_dark.one').hide();
                    }
                }

                function togglePedigree1Children() {
                    const val = $('#pedigree_1').val().trim();
                    if (val !== '') {
                        $('#pedigree_1_1').closest('.mb-4').show();
                        $('#pedigree_1_2').closest('.mb-4').show();
                        $('.box_dark.two').show();
                    } else {
                        $('#pedigree_1_1').closest('.mb-4').hide();
                        $('#pedigree_1_2').closest('.mb-4').hide();
                        $('.box_dark.two').hide();
                    }
                }

                function togglePedigree2Children() {
                    const val = $('#pedigree_2').val().trim();
                    if (val !== '') {
                        $('#pedigree_2_1').closest('.mb-4').show();
                        $('#pedigree_2_2').closest('.mb-0').show();
                        $('.box_dark.three').show();
                    } else {
                        $('#pedigree_2_1').closest('.mb-4').hide();
                        $('#pedigree_2_2').closest('.mb-0').hide();
                        $('.box_dark.three').hide();
                    }
                }

                function togglePedigree3Children() {
                    const val = $('#pedigree_1_1').val().trim();
                    if (val !== '') {
                        $('#pedigree_1_1_1').closest('.mb-4').show();
                        $('#pedigree_1_1_2').closest('.mb-4').show();
                        $('.box_dark.four').show();
                    } else {
                        $('#pedigree_1_1_1').closest('.mb-4').hide();
                        $('#pedigree_1_1_2').closest('.mb-4').hide();
                        $('.box_dark.four').hide();
                    }
                }

                function togglePedigree4Children() {
                    const val = $('#pedigree_1_2').val().trim();
                    if (val !== '') {
                        $('#pedigree_1_2_1').closest('.mb-4').show();
                        $('#pedigree_1_2_2').closest('.mb-4').show();
                        $('.box_dark.five').show();
                    } else {
                        $('#pedigree_1_2_1').closest('.mb-4').hide();
                        $('#pedigree_1_2_2').closest('.mb-4').hide();
                        $('.box_dark.five').hide();
                    }
                }

                function togglePedigree5Children() {
                    const val = $('#pedigree_2_1').val().trim();
                    if (val !== '') {
                        $('#pedigree_2_1_1').closest('.mb-4').show();
                        $('#pedigree_2_1_2').closest('.mb-4').show();
                        $('.box_dark.six').show();
                    } else {
                        $('#pedigree_2_1_1').closest('.mb-4').hide();
                        $('#pedigree_2_1_2').closest('.mb-4').hide();
                        $('.box_dark.six').hide();
                    }
                }

                function togglePedigree6Children() {
                    const val = $('#pedigree_2_2').val().trim();
                    if (val !== '') {
                        $('#pedigree_2_2_1').closest('.mb-4').show();
                        $('#pedigree_2_2_2').closest('.mb-0').show();
                        $('.box_dark.seven').show();
                    } else {
                        $('#pedigree_2_2_1').closest('.mb-4').hide();
                        $('#pedigree_2_2_2').closest('.mb-0').hide();
                        $('.box_dark.seven').hide();
                    }
                }

                // Initial checks on page load
                toggleGrandFields();
                togglePedigree1Children();
                togglePedigree2Children();
                togglePedigree3Children();
                togglePedigree4Children();
                togglePedigree5Children();
                togglePedigree6Children();

                // Event bindings
                $('#pedigree_start_1').on('input', toggleGrandFields);
                $('#pedigree_1').on('input', togglePedigree1Children);
                $('#pedigree_2').on('input', togglePedigree2Children);
                $('#pedigree_1_1').on('input', togglePedigree3Children);
                $('#pedigree_1_2').on('input', togglePedigree4Children);
                $('#pedigree_2_1').on('input', togglePedigree5Children);
                $('#pedigree_2_2').on('input', togglePedigree6Children);
            });
        </script>


        <script>
            $(document).ready(function() {
                function toggleDamGrandFields() {
                    const val = $('#pedigree_start_1_dam').val().trim();
                    if (val !== '') {
                        $('.grand-sire-wrapper-dam').show();
                        $('.grand-dam-wrapper-dam').show();
                        $('.box_dark.one_dam').show();
                    } else {
                        $('.grand-sire-wrapper-dam').hide();
                        $('.grand-dam-wrapper-dam').hide();
                        $('.box_dark.one_dam').hide();
                    }
                }

                function toggleDamPedigree1Children() {
                    const val = $('#pedigree_1_dam').val().trim();
                    if (val !== '') {
                        $('#pedigree_1_1_dam').closest('.mb-4').show();
                        $('#pedigree_1_2_dam').closest('.mb-4').show();
                        $('.box_dark.two_dam').show();
                    } else {
                        $('#pedigree_1_1_dam').closest('.mb-4').hide();
                        $('#pedigree_1_2_dam').closest('.mb-4').hide();
                        $('.box_dark.two_dam').hide();
                    }
                }

                function toggleDamPedigree2Children() {
                    const val = $('#pedigree_2_dam').val().trim();
                    if (val !== '') {
                        $('#pedigree_2_1_dam').closest('.mb-4').show();
                        $('#pedigree_2_2_dam').closest('.mb-0').show();
                        $('.box_dark.three_dam').show();
                    } else {
                        $('#pedigree_2_1_dam').closest('.mb-4').hide();
                        $('#pedigree_2_2_dam').closest('.mb-0').hide();
                        $('.box_dark.three_dam').hide();
                    }
                }

                function toggleDamPedigree3Children() {
                    const val = $('#pedigree_1_1_dam').val().trim();
                    if (val !== '') {
                        $('#pedigree_1_1_1_dam').closest('.mb-4').show();
                        $('#pedigree_1_1_2_dam').closest('.mb-4').show();
                        $('.box_dark.four_dam').show();
                    } else {
                        $('#pedigree_1_1_1_dam').closest('.mb-4').hide();
                        $('#pedigree_1_1_2_dam').closest('.mb-4').hide();
                        $('.box_dark.four_dam').hide();
                    }
                }

                function toggleDamPedigree4Children() {
                    const val = $('#pedigree_1_2_dam').val().trim();
                    if (val !== '') {
                        $('#pedigree_1_2_1_dam').closest('.mb-4').show();
                        $('#pedigree_1_2_2_dam').closest('.mb-4').show();
                        $('.box_dark.five_dam').show();
                    } else {
                        $('#pedigree_1_2_1_dam').closest('.mb-4').hide();
                        $('#pedigree_1_2_2_dam').closest('.mb-4').hide();
                        $('.box_dark.five_dam').hide();
                    }
                }

                function toggleDamPedigree5Children() {
                    const val = $('#pedigree_2_1_dam').val().trim();
                    if (val !== '') {
                        $('#pedigree_2_1_1_dam').closest('.mb-4').show();
                        $('#pedigree_2_1_2_dam').closest('.mb-4').show();
                        $('.box_dark.six_dam').show();
                    } else {
                        $('#pedigree_2_1_1_dam').closest('.mb-4').hide();
                        $('#pedigree_2_1_2_dam').closest('.mb-4').hide();
                        $('.box_dark.six_dam').hide();
                    }
                }

                function toggleDamPedigree6Children() {
                    const val = $('#pedigree_2_2_dam').val().trim();
                    if (val !== '') {
                        $('#pedigree_2_2_1_dam').closest('.mb-4').show();
                        $('#pedigree_2_2_2_dam').closest('.mb-0').show();
                        $('.box_dark.seven_dam').show();
                    } else {
                        $('#pedigree_2_2_1_dam').closest('.mb-4').hide();
                        $('#pedigree_2_2_2_dam').closest('.mb-0').hide();
                        $('.box_dark.seven_dam').hide();
                    }
                }

                // Run all toggles on load
                toggleDamGrandFields();
                toggleDamPedigree1Children();
                toggleDamPedigree2Children();
                toggleDamPedigree3Children();
                toggleDamPedigree4Children();
                toggleDamPedigree5Children();
                toggleDamPedigree6Children();

                // Event listeners
                $('#pedigree_start_1_dam').on('input', toggleDamGrandFields);
                $('#pedigree_1_dam').on('input', toggleDamPedigree1Children);
                $('#pedigree_2_dam').on('input', toggleDamPedigree2Children);
                $('#pedigree_1_1_dam').on('input', toggleDamPedigree3Children);
                $('#pedigree_1_2_dam').on('input', toggleDamPedigree4Children);
                $('#pedigree_2_1_dam').on('input', toggleDamPedigree5Children);
                $('#pedigree_2_2_dam').on('input', toggleDamPedigree6Children);
            });
        </script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const overlay = document.getElementById("fsmOverlay");
        const previewBtn = document.getElementById("previewBtn");
        const closeBtn = overlay.querySelector(".fsm-close");

        previewBtn.addEventListener("click", function() {
            const getVal = (name, type = 'input') => {
                const el = document.querySelector(`${type}[name="${name}"]`);
                return el ? el.value : "";
            };

            // --- 1. Basic Info ---
            const horseName = getVal('pro_name');
            overlay.querySelector(".text_border").textContent = horseName || "Horse Name";
            overlay.querySelector(".breed_text").textContent = getVal('pro_breed', 'select') || "Breed";
            overlay.querySelector(".sale_tag").textContent = document.querySelector('input[name="pro_ad_type"]:checked')?.value || "For Sale";

            const rawPrice = getVal('pro_reg_price');
            overlay.querySelector(".price_Text").textContent = "PRICE : " + (rawPrice || "N/A");

            overlay.querySelector(".about_horse_heading").textContent = `About ${horseName || 'Horse'}:`;
            const descriptionP = overlay.querySelector(".about_horse_heading + p");
            if (descriptionP) {
                descriptionP.textContent = getVal('pro_desc', 'textarea') || "No description provided.";
            }

            const city = getVal('pro_city');
            const state = getVal('real_location', 'select');
            const locSpan = overlay.querySelector(".horser_information_box .custome_listing_col.w-100 span");
            if (locSpan) locSpan.textContent = `${city} ${state}`;

            // --- 2. Pedigree Mapping ---
            const sireP = overlay.querySelector(".pedigree_box .pedigree_box_1:nth-child(1) p");
            if (sireP) sireP.textContent = getVal('pro_sire');

            const damP = overlay.querySelector(".pedigree_box .pedigree_box_1:nth-child(2) .pedigree_box_2:nth-child(2) p");
            if (damP) damP.textContent = getVal('pro_dam');

            const gSires = Array.from(document.querySelectorAll('input[name="pro_grand_sire[]"]')).map(i => i.value);
            const gDams = Array.from(document.querySelectorAll('input[name="pro_grand_dam[]"]')).map(i => i.value);
            const ggSires = Array.from(document.querySelectorAll('input[name="pro_great_grand_sire[]"]')).map(i => i.value);
            const ggDams = Array.from(document.querySelectorAll('input[name="pro_great_grand_dam[]"]')).map(i => i.value);
            const gggSires = Array.from(document.querySelectorAll('input[name="pro_twogreat_grand_sire[]"]')).map(i => i.value);
            const gggDams = Array.from(document.querySelectorAll('input[name="pro_twogreat_grand_dam[]"]')).map(i => i.value);

            const allPedigreePTags = overlay.querySelectorAll(".pedigree_box p");
            if (gSires[0]) allPedigreePTags[1].textContent = gSires[0];
            if (gDams[0]) allPedigreePTags[2].textContent = gDams[0];
            if (ggSires[0]) allPedigreePTags[3].textContent = ggSires[0];
            if (ggDams[0]) allPedigreePTags[4].textContent = ggDams[0];
            if (ggSires[1]) allPedigreePTags[5].textContent = ggSires[1];
            if (ggDams[1]) allPedigreePTags[6].textContent = ggDams[1];
            if (gggSires[0]) allPedigreePTags[7].textContent = gggSires[0];
            if (gggDams[0]) allPedigreePTags[8].textContent = gggDams[0];
            if (gggSires[1]) allPedigreePTags[9].textContent = gggSires[1];
            if (gggDams[1]) allPedigreePTags[10].textContent = gggDams[1];
            if (gggSires[2]) allPedigreePTags[11].textContent = gggSires[2];
            if (gggDams[2]) allPedigreePTags[12].textContent = gggDams[2];
            if (gggSires[3]) allPedigreePTags[13].textContent = gggSires[3];
            if (gggDams[3]) allPedigreePTags[14].textContent = gggDams[3];

            // --- 3. Info List ---
            const ageYear = getVal('pro_age_year', 'select');
            const ageMonth = getVal('pro_age_month', 'select');
            const horseHeight = getVal('pro_height', 'select');
            const horseGender = getVal('pro_gender', 'select');
            const horseColor = getVal('pro_color', 'select');
            const isReg = document.querySelector('input[name="registerd_horse"]:checked')?.value || "no";
            const isGaited = document.querySelector('input[name="gaited"]:checked')?.value || "No";

            const statsList = overlay.querySelectorAll(".info_list li span");
            if (statsList.length >= 6) {
                let ageText = `${ageYear || 0} ${ageYear == 1 ? 'Year' : 'Years'}`;
                if (ageMonth && ageMonth !== "0" && ageMonth !== "Months") {
                    ageText += ` ${ageMonth} Mo`;
                }
                statsList[0].textContent = ageText + " Old";

                statsList[1].textContent = horseHeight ? `${horseHeight} hh` : "N/A";
                statsList[2].textContent = horseGender || "N/A";
                statsList[3].textContent = horseColor || "N/A";
                statsList[4].textContent = `REGISTERED: ${isReg}`;
                statsList[5].textContent = `GAITED: ${isGaited}`;
            }

            // --- 4. Registry Info & Documents ---
            const regFileInput = document.querySelector('input[name="pro_reg_file[]"]');
            const regDocContainer = overlay.querySelector(".fsm-content .row.mb-4.justify-content-center");
            const docIcon = "https://cdn-icons-png.flaticon.com/512/2991/2991108.png";

            if (regFileInput && regFileInput.files.length > 0) {
                regDocContainer.innerHTML = "";
                Array.from(regFileInput.files).forEach(file => {
                    const colDiv = document.createElement("div");
                    colDiv.className = "col-lg-3 col-md-3 col-sm-12 col-12";

                    if (file.type.match('image.*')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            colDiv.innerHTML = `<a href="${e.target.result}" data-fancybox="certificate"><img src="${e.target.result}" alt="Registry Doc" class="img-fluid"></a>`;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        colDiv.innerHTML = `<div class="text-center"><img src="${docIcon}" style="width:50px;" class="mb-2"><br><small>${file.name}</small></div>`;
                    }
                    regDocContainer.appendChild(colDiv);
                });
            }

            const regHeader = overlay.querySelector(".reg");
            const regSub = overlay.querySelector(".heading18px.text-center");
            if (regHeader) regHeader.textContent = getVal('pro_reg_name') || "Registry Association";
            if (regSub) regSub.textContent = `REGISTRATION #: ${getVal('pro_reg_number') || 'N/A'}`;

            // --- 5. Skills & Rider Level ---
            const skillValues = document.getElementById("pro_rider_level").value;
            const skillUl = overlay.querySelectorAll(".gen_list_flex")[0];
            if (skillValues && skillUl) {
                skillUl.innerHTML = skillValues.split(',').map(s => `<li><span class="me-3"><img src="/assets/images/h_icon.png"></span>${s}</li>`).join('');
            }

            const levelValues = document.getElementById("riderLevelsInput").value;
            const levelUl = overlay.querySelectorAll(".gen_list_flex")[1];
            if (levelValues && levelUl) {
                levelUl.innerHTML = levelValues.split(',').map(l => `<li><span class="me-3"><img src="/assets/images/h_icon_1.png"></span>${l.split(' - ')[0]}</li>`).join('');
            }

            // --- 6. Image Grid & Slider Sync ---
            const featuredFile = document.querySelector('input[name="pro_Fimg"]').files[0];
            const galleryFiles = document.getElementById("customImageInput").files;
            const sliderContainer = overlay.querySelector(".horse_slides");
            const gridContainer = overlay.querySelector(".image-grid");

            sliderContainer.innerHTML = "";
            gridContainer.innerHTML = "";

            const addImg = (file) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const sDiv = document.createElement("div");
                    sDiv.className = "horse_slide";
                    sDiv.innerHTML = `<img src="${e.target.result}" class="img-fluid w-100 img_radius_one" style="height:270px; object-fit:cover;">`;
                    sliderContainer.appendChild(sDiv);

                    const gDiv = document.createElement("div");
                    gDiv.innerHTML = `<img src="${e.target.result}" style="width:100%; height:220px; object-fit:cover;">`;
                    gridContainer.appendChild(gDiv);
                };
                reader.readAsDataURL(file);
            };

            if (featuredFile || galleryFiles.length > 0) {
                if (featuredFile) addImg(featuredFile);
                Array.from(galleryFiles).forEach(f => addImg(f));
            } else {
                const placeholderImg = "/assets/images/placeholder.png";
                sliderContainer.innerHTML = `<div class="horse_slide"><img src="${placeholderImg}" class="img-fluid w-100 img_radius_one" style="height:270px; object-fit:cover;"></div>`;
                gridContainer.innerHTML = `<div><img src="${placeholderImg}" style="width:100%; height:220px; object-fit:cover;"></div>`;
            }

            // --- 7. PPE & X-Rays ---
            const mapDoc = (name, idx) => {
                const fInput = document.querySelector(`input[name="${name}"]`);
                const box = overlay.querySelectorAll(".ppe_border_box .ppe_xray_box")[idx];

                if (fInput && fInput.files[0] && box) {
                    const f = fInput.files[0];
                    if (f.type.match('image.*')) {
                        const r = new FileReader();
                        r.onload = (e) => box.innerHTML = `<img src="${e.target.result}" class="img-fluid">`;
                        r.readAsDataURL(f);
                    } else {
                        box.innerHTML = `<div class="text-center"><img src="${docIcon}" style="width:60px;" class="mb-2"><br><p>${f.name}</p></div>`;
                    }
                }
            };
            mapDoc('ppe_file[]', 0);
            mapDoc('xray_file[]', 1);

            // --- 8. SOCIAL PROFILES ---
            const fbLink = getVal('pro_facebook');
            const ytLink = getVal('pro_youtube');
            const instaLink = getVal('pro_insta');
            const ttLink = getVal('pro_tiktok');

            const socialIconsDiv = overlay.querySelector(".social_icons");
            if (socialIconsDiv) {
                const icons = socialIconsDiv.querySelectorAll("a");
                if (icons[0]) icons[0].href = fbLink || "#!";
                if (icons[1]) icons[1].href = ytLink || "#!";
                if (icons[2]) icons[2].href = ttLink || "#!";
                if (icons[3]) icons[3].href = instaLink || "#!";
            }

            // --- 9. VIDEO PREVIEW ---
            const videoInput = document.querySelector('input[name="pro_video_url[]"]');
            const videoElement = overlay.querySelector("video");
            const videoHeading = overlay.querySelector(".view_detail_page .heading65px:last-of-type");

            if (videoInput && videoInput.files && videoInput.files[0]) {
                const file = videoInput.files[0];
                const fileURL = URL.createObjectURL(file);
                videoElement.src = fileURL;
                videoElement.style.display = "block";
                if(videoHeading) videoHeading.style.display = "block";
                videoElement.load();
            } else {
                videoElement.style.display = "none";
                if(videoHeading) videoHeading.style.display = "none";
            }

            // --- 10. Additional Info ---
            const additionalInfoUl = overlay.querySelector(".gen_list_flex_one");
            if (additionalInfoUl) {
                const trial = document.querySelector('input[name="trial_period"]:checked')?.value;
                let trialText = "Not Selected";
                if (trial === "yes_trial") trialText = "Yes";
                else if (trial === "no_trial") trialText = "No";
                else if (trial === "My Consider") trialText = "May Consider";

                const aboutPriceCheckboxes = Array.from(document.querySelectorAll('input[name="about_price[]"]:checked')).map(el => el.value);

                const negotiableText = aboutPriceCheckboxes.includes("Negotiable") ? "Yes" : "No";
                const mayTradeText = aboutPriceCheckboxes.includes("May Trade") ? "Yes" : "No";
                const paymentOptionsText = aboutPriceCheckboxes.includes("Payment Options Available") ? "Yes" : "No";

                additionalInfoUl.innerHTML = `
                    <li><span class="me-3"><img src="/assets/images/h_icon_2.png"></span><p class="mb-0">Trail Period:</p><p class="mb-0">${trialText}</p></li>
                    <li><span class="me-3"><img src="/assets/images/h_icon_2.png"></span><p class="mb-0">Negotiable:</p><p class="mb-0">${negotiableText}</p></li>
                    <li><span class="me-3"><img src="/assets/images/h_icon_2.png"></span><p class="mb-0">May Trade:</p><p class="mb-0">${mayTradeText}</p></li>
                    <li><span class="me-3"><img src="/assets/images/h_icon_2.png"></span><p class="mb-0">Payment Options Available:</p><p class="mb-0">${paymentOptionsText}</p></li>
                `;
            }

            // --- 11. Show Modal ---
            overlay.classList.add("is-visible");
            document.body.style.overflow = "hidden";
        });

        // --- Updated Close Logic: Handles Outside Click & Close Button ---
        overlay.addEventListener("click", function(e) {
            // Agar click seedha overlay (background) par ho ya close button par
            if (e.target === overlay || e.target.closest(".fsm-close")) {
                overlay.classList.remove("is-visible");
                document.body.style.overflow = "";
                const videoElement = overlay.querySelector("video");
                if(videoElement) videoElement.pause();
            }
        });
    });
</script>
    @endsection
