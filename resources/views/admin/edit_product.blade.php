{{-- @extends('layouts.admin_app') --}}
@php
$layout = $usertype == 1 ? 'layouts.admin_app' : 'layouts.user_app';
@endphp
@extends($layout)
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
   form {
   background: #1c2039;
   padding: 30px;
   }
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
   height: auto;
   min-height: 55px;
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
   padding: 6px 12px;
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
   align-items: center;
   gap: 5px;
   border-radius: 8px;
   position: relative;
   cursor: text;
   background-color: #fff;
   height: auto;
   min-height: 55px;
   overflow-y: auto;
   }
   .selected-tags .tag {
   background-color: #e4e7ee;
   padding: 3px 8px;
   border-radius: 6px;
   display: flex;
   align-items: center;
   font-size: 11.5px;
   white-space: nowrap;
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
   overflow: hidden;
   background: #f0f0f0;
   }
   .custom-remove-btn {
   position: absolute;
   top: 2px;
   right: 4px;
   background: rgba(255, 0, 0, 0.9);
   color: white;
   border-radius: 50%;
   width: 20px;
   height: 20px;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: pointer;
   display: none;
   font-size: 14px;
   line-height: 1;
   z-index: 100;
   }
   .custom-upload-img-box:hover .custom-remove-btn {
   display: flex;
   }
   .custom-upload-img-box img.uploaded + .custom-remove-btn {
   display: flex; /* Always show if there's an image, or keep as hover? Let's do hover + show for new ones */
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
   justify-content: center;
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
   padding: 15px 5px 10px 5px;
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
   color: #1d2139;
   list-style: none;
   display: flex;
   align-items: center;
   /* margin: 5px; */
   padding: 20px 30px;
   width: 307px;
   box-shadow: rgba(50, 50, 93, 0.1) 0px 20px 40px -12px inset, rgba(0, 0, 0, 0.1) 0px 12px 24px -18px inset;
   border: 2px solid #1d2139;
   }
   .border_box_one ul li:last-child {
   margin: 0;
   }
   .border_box_one ul li span img {
   max-width: 35px;
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
   /* Ye CSS lazmi hai preview dikhane ke liye */
   .upload__img-wrap {
   display: flex;
   flex-wrap: wrap;
   gap: 10px;
   margin-bottom: 15px;
   }
   .img-bg {
   width: 100px;
   /* Size apni marzi se set karein */
   height: 100px;
   background-size: cover;
   background-position: center;
   position: relative;
   border: 1px solid #ddd;
   background-color: #f9f9f9;
   display: flex;
   align-items: center;
   justify-content: center;
   }
   .upload__img-close {
   position: absolute;
   top: 3px;
   right: 1px;
   background: red;
   color: white;
   border-radius: 50%;
   width: 20px;
   height: 20px;
   text-align: center;
   line-height: 18px;
   cursor: pointer;
   z-index: 9;
   }
   .file-icon-text {
   font-weight: bold;
   font-size: 12px;
   color: #555;
   }
   .remove-tag {
   cursor: pointer;
   }
   .web_link_wrap {
   position: relative;
   }
   .web_link_wrap .gen_input_one {
   padding-left: 120px;
   }
   .web_link_wrap span {
   position: absolute;
   width: 100px;
   height: 55px;
   display: flex;
   align-items: center;
   justify-content: center;
   line-height: 1;
   background: #fdfdfd38;
   border-radius: 8px 0 0 8px;
   box-shadow: rgb(204, 219, 232) 4px 3px 18px 3px inset, rgb(255 255 255 / 68%) -3px -3px 11px -8px inset;
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
      <div class="col-12">
         <div class="bid_box">
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
                  <small class="text-muted">
                  Please enter a valid URL starting with https:// (e.g., https://www.auction.com/)
                  </small>
               </div>
            </div>
         </div>
      </div>
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
                    'American Quarter Pony',
                    'American Saddlebred',
                    'American Shetland Pony',
                    'American Spotted',
                    'American Standardbred',
                    'American Walking Pony',
                    'American Warmblood',
                    'Andalusian Horse',
                    'Anglo Arabian',
                    'Appaloosa',
                    'Appendix',
                    'Appendix Quarter Horse',
                    'Arabian',
                    'Arabian-Berber',
                    'Arabian Halfbred',
                    'Arabian Horses',
                    'Arabian Partbred',
                    'Araloosa',
                    'Arcenberg-Nordkirchen',
                    'Ardennes',
                    'Australian Brumby',
                    'Australian Draught Horse',
                    'Australian Stock Horse',
                    'Austrian Warmblood',
                    'Auxois',
                    'Azteca',
                    'Baden-Wurttemberg',
                    'Balearic',
                    'Balikun Horse',
                    'Baltic Hanoverian',
                    'Banker',
                    'Bardigiano',
                    'Baroque',
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
                    'Cob Horse',
                    'Comtois',
                    'Connemara Pony',
                    'Criollo Horse',
                    'Crossbred',
                    'Cumberland Island Horse',
                    'Curly',
                    'Curly Horses',
                    'Dales Pony',
                    'Danish Warmblood',
                    'Dartmoor Pony',
                    'Draft',
                    'Draft Cross',
                    'Driving',
                    'Drum Horse',
                    'Dutch Harness Horse',
                    'Dutch Warmblood',
                    'Falabella',
                    'Fell Pony',
                    'Finnhorse',
                    'Florida Cracker Horse',
                    'Friesian',
                    'Friesian Cross',
                    'Friesian Sporthorse',
                    'Friesian Warmblood Cross',
                    'Fjord',
                    'Fjord Cross',
                    'Gaited',
                    'Galiceno',
                    'Gelderland',
                    'Gypsy Cross',
                    'Gypsy Drum Horse',
                    'Gypsy Friesian Cross',
                    'Gypsy Vanner',
                    'Gypsy Warmblood Cross',
                    'Hackney',
                    'Hackney Pony',
                    'Hanoverian',
                    'Haflinger',
                    'Holsteiner',
                    'Iberian',
                    'Icelandic Horse',
                    'Irish Draught',
                    'Irish Draft Cross',
                    'Irish Sport Horse',
                    'Kathiawari',
                    'Kentucky Mountain Saddle Horse',
                    'Kinsky Horse',
                    'Knabstrupper',
                    'Lippizan',
                    'Lusitano',
                    'Mangalarga Marchador',
                    'Mangalarga Paulista',
                    'Marwari Horse',
                    'Mecklenburg',
                    'Miniature',
                    'Missouri Fox Trotter',
                    'Morgan',
                    'Morgan Cross',
                    'Mountain Pleasure Horse',
                    'Mustang',
                    'National Show Horse',
                    'New Forest Pony',
                    'Newfoundland Pony',
                    'Nokota',
                    'Oldenburg',
                    'Paint',
                    'Paso Fino',
                    'Percheron',
                    'Percheron Cross',
                    'Pinto',
                    'POA',
                    'Polish Warmblood',
                    'Pony',
                    'Quarter Draft',
                    'Quarter Horse',
                    'Quarter Horse Cross',
                    'Racking Horse',
                    'Rhinelander',
                    'Rocky Mountain Horse',
                    'Selle Français',
                    'Shire',
                    'Shire Cross',
                    'Single-Footing Horse',
                    'Sport Horse',
                    'Spotted Draft',
                    'Spotted Draft Cross',
                    'Spotted Saddle Horse',
                    'Stock Horse',
                    'Suffolk Punch',
                    'Swedish Warmblood',
                    'Swiss Warmblood',
                    'Tennessee Walking Horse',
                    'Thoroughbred',
                    'Thoroughbred Cross',
                    'Tinker',
                    'Trakehner',
                    'Virginia Highlander',
                    'Warmblood',
                    'Warmblood Cross',
                    'Warmblood Draft Cross',
                    'Warmblood TB Cross',
                    'Welsh',
                    'Welsh Cross',
                    'Welsh Pony',
                    'Westphalian',
                    'Zangersheide',
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
            <h4 class="mb-2">Address Details<span class="asterisk">*</span> <small class="text-muted">(For Information Purpose Only)</small></h4>
            <div class="row">
               <div class="col-12">
                  <input class="form-control gen_input mb-3" type="text" name="pro_address" value="{{ $data->pro_address }}" placeholder="Enter Your Address" />
               </div>
               <h4 class="mb-2">Town / City<span class="asterisk">*</span> <small class="text-muted">(For Ad Purpose Only)</small></h4>
               <div class="col-6">
                  <input class="form-control gen_input mb-3" type="text" name="pro_city" value="{{ $data->pro_city }}" placeholder="Enter Town" required />
               </div>
               <div class="col-6">
                  <select class="form-control gen_input mb-3" name="per_state">
                     <option disabled>Select your State</option>
                     <option value="alabama (AL)" {{ ($data->per_state ?? '') == 'alabama (AL)' ? 'selected' : '' }}>Alabama (AL)</option>
                     <option value="alaska (AK)" {{ ($data->per_state ?? '') == 'alaska (AK)' ? 'selected' : '' }}>Alaska (AK)</option>
                     <option value="arizona (AZ)" {{ ($data->per_state ?? '') == 'arizona (AZ)' ? 'selected' : '' }}>Arizona (AZ)</option>
                     <option value="arkansas (AR)" {{ ($data->per_state ?? '') == 'arkansas (AR)' ? 'selected' : '' }}>Arkansas (AR)</option>
                     <option value="california (CA)" {{ ($data->per_state ?? '') == 'california (CA)' ? 'selected' : '' }}>California (CA)</option>
                     <option value="colorado (CO)" {{ ($data->per_state ?? '') == 'colorado (CO)' ? 'selected' : '' }}>Colorado (CO)</option>
                     <option value="connecticut (CT)" {{ ($data->per_state ?? '') == 'connecticut (CT)' ? 'selected' : '' }}>Connecticut (CT)</option>
                     <option value="delaware (DE)" {{ ($data->per_state ?? '') == 'delaware (DE)' ? 'selected' : '' }}>Delaware (DE)</option>
                     <option value="florida (FL)" {{ ($data->per_state ?? '') == 'florida (FL)' ? 'selected' : '' }}>Florida (FL)</option>
                     <option value="georgia (GA)" {{ ($data->per_state ?? '') == 'georgia (GA)' ? 'selected' : '' }}>Georgia (GA)</option>
                     <option value="hawaii (HI)" {{ ($data->per_state ?? '') == 'hawaii (HI)' ? 'selected' : '' }}>Hawaii (HI)</option>
                     <option value="idaho (ID)" {{ ($data->per_state ?? '') == 'idaho (ID)' ? 'selected' : '' }}>Idaho (ID)</option>
                     <option value="illinois (IL)" {{ ($data->per_state ?? '') == 'illinois (IL)' ? 'selected' : '' }}>Illinois (IL)</option>
                     <option value="indiana (IN)" {{ ($data->per_state ?? '') == 'indiana (IN)' ? 'selected' : '' }}>Indiana (IN)</option>
                     <option value="iowa (IA)" {{ ($data->per_state ?? '') == 'iowa (IA)' ? 'selected' : '' }}>Iowa (IA)</option>
                     <option value="kansas (KS)" {{ ($data->per_state ?? '') == 'kansas (KS)' ? 'selected' : '' }}>Kansas (KS)</option>
                     <option value="kentucky (KY)" {{ ($data->per_state ?? '') == 'kentucky (KY)' ? 'selected' : '' }}>Kentucky (KY)</option>
                     <option value="louisiana (LA)" {{ ($data->per_state ?? '') == 'louisiana (LA)' ? 'selected' : '' }}>Louisiana (LA)</option>
                     <option value="maine (ME)" {{ ($data->per_state ?? '') == 'maine (ME)' ? 'selected' : '' }}>Maine (ME)</option>
                     <option value="maryland (MD)" {{ ($data->per_state ?? '') == 'maryland (MD)' ? 'selected' : '' }}>Maryland (MD)</option>
                     <option value="massachusetts (MA)" {{ ($data->per_state ?? '') == 'massachusetts (MA)' ? 'selected' : '' }}>Massachusetts (MA)</option>
                     <option value="michigan (MI)" {{ ($data->per_state ?? '') == 'michigan (MI)' ? 'selected' : '' }}>Michigan (MI)</option>
                     <option value="minnesota (MN)" {{ ($data->per_state ?? '') == 'minnesota (MN)' ? 'selected' : '' }}>Minnesota (MN)</option>
                     <option value="mississippi (MS)" {{ ($data->per_state ?? '') == 'mississippi (MS)' ? 'selected' : '' }}>Mississippi (MS)</option>
                     <option value="missouri (MO)" {{ ($data->per_state ?? '') == 'missouri (MO)' ? 'selected' : '' }}>Missouri (MO)</option>
                     <option value="montana (MT)" {{ ($data->per_state ?? '') == 'montana (MT)' ? 'selected' : '' }}>Montana (MT)</option>
                     <option value="nebraska (NE)" {{ ($data->per_state ?? '') == 'nebraska (NE)' ? 'selected' : '' }}>Nebraska (NE)</option>
                     <option value="nevada (NV)" {{ ($data->per_state ?? '') == 'nevada (NV)' ? 'selected' : '' }}>Nevada (NV)</option>
                     <option value="new hampshire (NH)" {{ ($data->per_state ?? '') == 'new hampshire (NH)' ? 'selected' : '' }}>New Hampshire (NH)</option>
                     <option value="new jersey (NJ)" {{ ($data->per_state ?? '') == 'new jersey (NJ)' ? 'selected' : '' }}>New Jersey (NJ)</option>
                     <option value="new mexico (NM)" {{ ($data->per_state ?? '') == 'new mexico (NM)' ? 'selected' : '' }}>New Mexico (NM)</option>
                     <option value="new york (NY)" {{ ($data->per_state ?? '') == 'new york (NY)' ? 'selected' : '' }}>New York (NY)</option>
                     <option value="north carolina (NC)" {{ ($data->per_state ?? '') == 'north carolina (NC)' ? 'selected' : '' }}>North Carolina (NC)</option>
                     <option value="north dakota (ND)" {{ ($data->per_state ?? '') == 'north dakota (ND)' ? 'selected' : '' }}>North Dakota (ND)</option>
                     <option value="ohio (OH)" {{ ($data->per_state ?? '') == 'ohio (OH)' ? 'selected' : '' }}>Ohio (OH)</option>
                     <option value="oklahoma (OK)" {{ ($data->per_state ?? '') == 'oklahoma (OK)' ? 'selected' : '' }}>Oklahoma (OK)</option>
                     <option value="oregon (OR)" {{ ($data->per_state ?? '') == 'oregon (OR)' ? 'selected' : '' }}>Oregon (OR)</option>
                     <option value="pennsylvania (PA)" {{ ($data->per_state ?? '') == 'pennsylvania (PA)' ? 'selected' : '' }}>Pennsylvania (PA)</option>
                     <option value="rhode island (RI)" {{ ($data->per_state ?? '') == 'rhode island (RI)' ? 'selected' : '' }}>Rhode Island (RI)</option>
                     <option value="south carolina (SC)" {{ ($data->per_state ?? '') == 'south carolina (SC)' ? 'selected' : '' }}>South Carolina (SC)</option>
                     <option value="south dakota (SD)" {{ ($data->per_state ?? '') == 'south dakota (SD)' ? 'selected' : '' }}>South Dakota (SD)</option>
                     <option value="tennessee (TN)" {{ ($data->per_state ?? '') == 'tennessee (TN)' ? 'selected' : '' }}>Tennessee (TN)</option>
                     <option value="texas (TX)" {{ ($data->per_state ?? '') == 'texas (TX)' ? 'selected' : '' }}>Texas (TX)</option>
                     <option value="utah (UT)" {{ ($data->per_state ?? '') == 'utah (UT)' ? 'selected' : '' }}>Utah (UT)</option>
                     <option value="vermont (VT)" {{ ($data->per_state ?? '') == 'vermont (VT)' ? 'selected' : '' }}>Vermont (VT)</option>
                     <option value="virginia (VA)" {{ ($data->per_state ?? '') == 'virginia (VA)' ? 'selected' : '' }}>Virginia (VA)</option>
                     <option value="washington (WA)" {{ ($data->per_state ?? '') == 'washington (WA)' ? 'selected' : '' }}>Washington (WA)</option>
                     <option value="west virginia (WV)" {{ ($data->per_state ?? '') == 'west virginia (WV)' ? 'selected' : '' }}>West Virginia (WV)</option>
                     <option value="wisconsin (WI)" {{ ($data->per_state ?? '') == 'wisconsin (WI)' ? 'selected' : '' }}>Wisconsin (WI)</option>
                     <option value="wyoming (WY)" {{ ($data->per_state ?? '') == 'wyoming (WY)' ? 'selected' : '' }}>Wyoming (WY)</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="border_box_one pricing_box">
            <div class="mb-3">
               <h4 class="mb-3 text-1000">Price [$] <span class="asterisk" id="astrik">*</span> <small class="text-muted"></small></h4>
               <input class="form-control gen_input gen_input thousand-separator numbers_limit price-input" name="pro_reg_price" value="${{ $data->pro_reg_price }}" type="text"
                  placeholder="Enter price" />
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
         <div class="border_box_one mb-4">
            <h4 class="mb-3">Trial Period</h4>
            <div class="d-flex align-items-center gap-3">
               <div class="form-check">
                  <input class="form-check-input" name="trial_period" type="radio" value="Yes" id="yes_trial" {{ $data->trial_period == 'Yes' ? 'checked' : '' }}>
                  <label class="form-check-label" for="yes_trial">
                  Yes
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" name="trial_period" type="radio" value="No" id="no_trial" {{ $data->trial_period == 'No' ? 'checked' : '' }}>
                  <label class="form-check-label" for="no_trial">
                  No
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" name="trial_period" type="radio" value="May Consider" id="may_trial"
                  {{ $data->trial_period == 'May Consider' ? 'checked' : '' }}>
                  <label class="form-check-label" for="may_trial">
                  May Consider
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="col-6">
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
      <div class="col-12 mt-0 mb-4">
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
                  {{-- 
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
                  --}}
                  {{-- @dd($data->pro_reg_name --}}
                  <div class="col-6">
                     <div class="custom-upload-images-flex mb-3" id="regFilesContainer">
                        @php
                        $regFiles = is_string($data->pro_reg_file) ? json_decode($data->pro_reg_file, true) : (array) $data->pro_reg_file;
                        $regFiles = is_array($regFiles) ? $regFiles : [];
                        @endphp
                        <input type="hidden" name="reg_files_to_delete" class="reg_files_to_delete_input" value="[]">
                        @foreach ($regFiles as $index => $fileName)
                        <div class="custom-upload-img-box">
                           @php
                           $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                           @endphp
                           @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp']))
                           <img src="{{ asset('Product_images/' . $fileName) }}" class="img-fluid uploaded existing"
                              data-file-index="{{ $index }}" alt="Registration file">
                           @elseif($ext == 'pdf')
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold; color: #b22033;">PDF</div>
                           @elseif(in_array($ext, ['doc', 'docx']))
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold; color: #2b5797;">DOCX</div>
                           @else
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold;">FILE</div>
                           @endif
                           <span class="custom-remove-btn" style="display: flex;">&times;</span>
                        </div>
                        @endforeach
                     </div>
                     <div class="custom-upload__btn-box mt-3">
                        <label class="custom-upload__btn">
                           <p>Upload Papers <span class="or">OR</span> <span class="browse_option">Browse</span></p>
                           <input id="regFilesInput" name="pro_reg_file[]" type="file" multiple class="custom-upload__inputfile" accept="image/*,application/pdf">
                        </label>
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
      <div class="col-12 mt-0">
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
            'Blanket Appaloosa',
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
            'Leopard Appaloosa',
            'Lerino Dun',
            'Liver Chestnut',
            'Medicine Hat',
            'Other',
            'Overo',
            'Paint',
            'Paintaloosa',
            'Palomino',
            'Palomino Roan',
            'Pearl',
            'Perlino',
            'Piebald',
            'Pinto',
            'Rabicano',
            'Red Chocolate',
            'Red Dun',
            'Red Dun Roan',
            'Red Roan',
            'Roan',
            'Rose Grey',
            'Sabino',
            'Seal Brown',
            'Silver',
            'Silver Bay',
            'Silver Black',
            'Silver Black Roan',
            'Silver Buckskin',
            'Silver Dapple',
            'Silver Dun',
            'Silver Perlino',
            'Silver Smokey Black',
            'Silver Smokey Cream',
            'Skewbald',
            'Smokey Black',
            'Smokey Cream',
            'Smokey Cream Dun',
            'Smokey Grullo',
            'Sooty Buckskin',
            'Sooty Palomino',
            'Sorrel',
            'Splash Overo',
            'Splash White',
            'Strawberry Roan',
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
            {{-- <select class="form-control gen_input" name="pro_height" required>
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
            @endforeach --}}
            <select class="form-control gen_input" name="pro_height" required>
            <option value="" disabled {{ empty($data->pro_height) ? 'selected' : '' }}>
            Select an Option
            </option>
            @php
            $heights = [
            '5.0' => '5.0 hh (20in)',
            '6.0' => '6.0 hh (24in)',
            '7.0' => '7.0 hh (28in)',
            '8.0' => '8.0 hh (32in)',
            '8.2' => '8.2 hh (34in)',
            '9.0' => '9.0 hh (36in)',
            '9.2' => '9.2 hh (38in)',
            '10.0' => '10.0 hh (40in)',
            '10.2' => '10.2 hh',
            '11.0' => '11.0 hh (44in)',
            '11.2' => '11.2 hh',
            '12.0' => '12.0 hh (48in)',
            '12.1' => '12.1 hh',
            '12.2' => '12.2 hh',
            '12.3' => '12.3 hh',
            '13.0' => '13.0 hh (52in)',
            '13.1' => '13.1 hh',
            '13.2' => '13.2 hh',
            '13.3' => '13.3 hh',
            '14.0' => '14.0 hh (56in)',
            '14.1' => '14.1 hh',
            '14.2' => '14.2 hh',
            '14.3' => '14.3 hh',
            '15.0' => '15.0 hh (60in)',
            '15.1' => '15.1 hh',
            '15.2' => '15.2 hh',
            '15.3' => '15.3 hh',
            '16.0' => '16.0 hh (64in)',
            '16.1' => '16.1 hh',
            '16.2' => '16.2 hh',
            '16.3' => '16.3 hh',
            '17.0' => '17.0 hh (68in)',
            '17.1' => '17.1 hh',
            '17.2' => '17.2 hh',
            '17.3' => '17.3 hh',
            '18.0' => '18.0 hh (72in)',
            '18.1' => '18.1 hh',
            '18.2' => '18.2 hh',
            '18.3' => '18.3 hh',
            '19.0' => '19.0 hh (76in)',
            '20.0' => '20.0 hh (80in)',
            '21.0' => '21.0 hh (84in)',
            ];
            @endphp
            @foreach ($heights as $value => $label)
            <option value="{{ $value }}" {{ $data->pro_height == $value ? 'selected' : '' }}>
            {{ $label }}
            </option>
            @endforeach
            </select>
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
                     <select class="form-control gen_input" name="pro_age_year" id="yearInput" required>
                        <option value="" disabled>Years</option>
                        <option value="1" {{ $data->pro_age_year == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $data->pro_age_year == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $data->pro_age_year == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $data->pro_age_year == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $data->pro_age_year == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $data->pro_age_year == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $data->pro_age_year == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $data->pro_age_year == 8 ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $data->pro_age_year == 9 ? 'selected' : '' }}>9</option>
                        <option value="10" {{ $data->pro_age_year == 10 ? 'selected' : '' }}>10</option>
                        <option value="11" {{ $data->pro_age_year == 11 ? 'selected' : '' }}>11</option>
                        <option value="12" {{ $data->pro_age_year == 12 ? 'selected' : '' }}>12</option>
                        <option value="13" {{ $data->pro_age_year == 13 ? 'selected' : '' }}>13</option>
                        <option value="14" {{ $data->pro_age_year == 14 ? 'selected' : '' }}>14</option>
                        <option value="15" {{ $data->pro_age_year == 15 ? 'selected' : '' }}>15</option>
                        <option value="16" {{ $data->pro_age_year == 16 ? 'selected' : '' }}>16</option>
                        <option value="17" {{ $data->pro_age_year == 17 ? 'selected' : '' }}>17</option>
                        <option value="18" {{ $data->pro_age_year == 18 ? 'selected' : '' }}>18</option>
                        <option value="19" {{ $data->pro_age_year == 19 ? 'selected' : '' }}>19</option>
                        <option value="20" {{ $data->pro_age_year == 20 ? 'selected' : '' }}>20</option>
                        <option value="21" {{ $data->pro_age_year == 21 ? 'selected' : '' }}>21</option>
                        <option value="22" {{ $data->pro_age_year == 22 ? 'selected' : '' }}>22</option>
                        <option value="23" {{ $data->pro_age_year == 23 ? 'selected' : '' }}>23</option>
                        <option value="24" {{ $data->pro_age_year == 24 ? 'selected' : '' }}>24</option>
                        <option value="25" {{ $data->pro_age_year == 25 ? 'selected' : '' }}>25</option>
                     </select>
                     <span id="yearLabel">Years Old</span>
                  </div>
               </div>
               <div class="col-6">
                  <!-- <h5 class="mb-3">Month</h5> -->
                  <div class="age_input_group" id="monthGroup">
                     <select class="form-control gen_input" name="pro_age_month" id="monthInput" required>
                        <option value="" disabled>Months</option>
                        <option value="0" {{ $data->pro_age_month == 0 ? 'selected' : '' }}>0</option>
                        <option value="1" {{ $data->pro_age_month == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $data->pro_age_month == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $data->pro_age_month == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $data->pro_age_month == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $data->pro_age_month == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $data->pro_age_month == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $data->pro_age_month == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $data->pro_age_month == 8 ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $data->pro_age_month == 9 ? 'selected' : '' }}>9</option>
                        <option value="10" {{ $data->pro_age_month == 10 ? 'selected' : '' }}>10</option>
                        <option value="11" {{ $data->pro_age_month == 11 ? 'selected' : '' }}>11</option>
                     </select>
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
                  “Your first 3 selected will display”
                  </small>
               </h4>
               <input type="hidden" name="pro_skill" id="selectedActivitiesInput" />
               <div class="dropdown-header" id="dropdownHeader">
                  @php
                  $selectedSkills = explode(',', $data->pro_rider_level ?? '');
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
                    <div onclick="selectOption(this)" data-value="Pole Bending">Pole Bending</div>
                    <div onclick="selectOption(this)" data-value="Gymkhana">Gymkhana</div>
                  <div onclick="selectOption(this)" data-value="Breakaway Roping">Breakaway Roping</div>
                  <div onclick="selectOption(this)" data-value="Broodmare">Broodmare</div>
                  <div onclick="selectOption(this)" data-value="Cutting Prospect">Cutting Prospect</div>
                  <div onclick="selectOption(this)" data-value="Cutting">Cutting</div>
                  <div onclick="selectOption(this)" data-value="Calf Roping">Calf Roping</div>
                  <div onclick="selectOption(this)" data-value="Clicker Training">Clicker Training</div>
                  <div onclick="selectOption(this)" data-value="Companion Only">Companion Only</div>
                  <div onclick="selectOption(this)" data-value="Competitive Trail Riding">Competitive Trail Riding</div>
                  <div onclick="selectOption(this)" data-value="Country English Pleasure">Country English Pleasure</div>
                  <div onclick="selectOption(this)" data-value="Cowboy Dressage">Cowboy Dressage</div>
                  <div onclick="selectOption(this)" data-value="Mounted Shooting">Mounted Shooting</div>
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
                  <div onclick="selectOption(this)" data-value="Ranch Riding">Ranch Riding</div>
                  <div onclick="selectOption(this)" data-value="Ranch Pleasure">Ranch Pleasure</div>
                  <div onclick="selectOption(this)" data-value="Ranch Sorting">Ranch Sorting</div>
                  <div onclick="selectOption(this)" data-value="Ranch Trail Class">Ranch Trail Class</div>
                  <div onclick="selectOption(this)" data-value="Ranch Versatility">Ranch Versatility</div>
                  <div onclick="selectOption(this)" data-value="Ranch Work">Ranch Work</div>
                  <div onclick="selectOption(this)" data-value="Reining">Reining</div>
                  <div onclick="selectOption(this)" data-value="Reined Cow Horse">Reined Cow Horse</div>
                  <div onclick="selectOption(this)" data-value="Cutting">Cutting</div>
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
      @php
      $selectedRiderLevels = array_filter(explode(',', old('pro_rider_level_display', $data->pro_skill ?? '')));
      @endphp
      <div class="col-6">
         <div class="border_box_one">
            <h4 class="mb-3">What type of rider level best suits your horse? </h4>
            <div class="custom-multiselect" id="multiSelect">
               <div class="selected-tags" id="selectedTags">
                  {{-- Agar koi value select nahi hai to placeholder dikhao --}}
                  <span class="placeholderOne" style="{{ count($selectedRiderLevels) > 0 ? 'display:none' : '' }}">Select Level</span>
                  {{-- PHP se hi tags generate karna --}}
                  @foreach ($selectedRiderLevels as $fullValue)
                  @php
                  // "-" se pehle wala part alag karna
                  $shortText = trim(explode('-', $fullValue)[0]);
                  @endphp
                  <span class="tag" data-full="{{ $fullValue }}">
                  {{ $shortText }}
                  <span class="remove-tag" onclick="removeThisTag(this, '{{ $fullValue }}')">&times;</span>
                  </span>
                  @endforeach
               </div>
               <div class="dropdown hidden" id="dropdown">
                  <div data-value="Beginner Riders">Beginner Riders - have minimal or no experience</div>
                  <div data-value="Novice Riders">Novice Riders - have a basic understanding...</div>
                  <div data-value="Intermediate Riders">Intermediate Riders - are comfortable...</div>
                  <div data-value="Advanced Riders">Advanced Riders - have a high level...</div>
               </div>
            </div>
         </div>
         {{-- Hidden Input for Form Submission --}}
         <input type="hidden" name="pro_rider_level_display" id="riderLevelsInput" value="{{ old('pro_rider_level_display', $data->pro_skill ?? '') }}">
      </div>
      <script>
         const selectedTags = document.getElementById("selectedTags");
         const dropdown = document.getElementById("dropdown");
         const multiSelect = document.getElementById("multiSelect");
         const hiddenInput = document.getElementById("riderLevelsInput");
         
         // 1. FIX: Page load par existing values ko array mein load karein
         let selectedValues = hiddenInput.value ? hiddenInput.value.split(',').filter(v => v.trim() !== "") : [];
         
         // Toggle dropdown
         selectedTags.addEventListener("click", () => {
             dropdown.classList.toggle("hidden");
         });
         
         // Add selection
         dropdown.querySelectorAll('div').forEach(option => {
             option.addEventListener("click", (e) => {
                 const value = e.target.dataset.value;
                 if (!value || selectedValues.includes(value)) return;
         
                 selectedValues.push(value);
                 updateTags();
                 dropdown.classList.add("hidden"); // Selection ke baad band kar dein
             });
         });
         
         // Remove tag logic (Global scope for onclick)
         window.removeThisTag = function(element, value) {
             selectedValues = selectedValues.filter(v => v !== value);
             updateTags();
         };
         
         function updateTags() {
             selectedTags.innerHTML = "";
         
             if (selectedValues.length === 0) {
                 selectedTags.innerHTML = '<span class="placeholderOne">Select Level</span>';
             } else {
                 selectedValues.forEach(value => {
                     // Sirf hyphen (-) se pehle wala text dikhayein
                     const label = value.split(" - ")[0].trim();
         
                     const tag = document.createElement("span");
                     tag.className = "tag";
                     // Template literal use karein taake UI clean rahe
                     tag.innerHTML = `${label} <span class="remove-tag" onclick="removeThisTag(this, '${value}')">&times;</span>`;
                     selectedTags.appendChild(tag);
                 });
             }
         
             // Hidden input ko update karein
             hiddenInput.value = selectedValues.join(",");
         }
         
         // Close dropdown on outside click
         document.addEventListener("click", function(e) {
             if (!multiSelect.contains(e.target)) {
                 dropdown.classList.add("hidden");
             }
         });
      </script>
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
               <textarea class="textarea" name="pro_desc" id="summernote" style="width: 100%; height: 15rem;" placeholder="Write a description here..." required>{{ $data->pro_desc }}</textarea>
               {{-- 
               <div id="charCount" style="margin-top: 5px; font-size: 0.9rem; color: #666;">0 / 2000 characters</div>
               --}}
            </div>
         </div>
      </div>
      <style>
         .upload__img-box {
         position: relative;
         width: 100px;
         /* apne hisaab se adjust kar sakte ho */
         height: 100px;
         margin: 8px;
         border: 1px solid #e0e0e0;
         border-radius: 6px;
         overflow: hidden;
         background: #f9f9f9;
         }
         .img-bg {
         width: 100%;
         height: 100%;
         background-size: cover;
         background-position: center;
         }
         /* Non-image file preview */
         .file-icon-wrapper {
         width: 100%;
         height: 100%;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         text-align: center;
         padding: 8px;
         box-sizing: border-box;
         }
         .file-icon {
         width: 60px;
         height: 70px;
         line-height: 70px;
         font-weight: bold;
         font-size: 18px;
         color: white;
         border-radius: 6px;
         margin-bottom: 6px;
         }
         .file-icon.pdf {
         background: #e74c3c;
         }
         /* red-ish */
         .file-icon.word {
         background: #2c589c;
         }
         /* blue */
         .file-icon.generic {
         background: #7f8c8d;
         }
         .file-name-below {
         font-size: 11px;
         color: #444;
         text-align: center;
         width: 100%;
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         }
      </style>
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
                     <div class="custom-upload-images-flex mb-3" id="ppeFilesContainer">
                        <input type="hidden" name="ppe_files_to_delete" class="ppe_files_to_delete_input" value="[]">
                        @foreach ($ppeFiles as $index => $fileName)
                        @if (!empty(trim($fileName)))
                        <div class="custom-upload-img-box">
                           @php
                           $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                           @endphp
                           @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp']))
                           <img src="{{ asset('Product_images/' . $fileName) }}" class="img-fluid uploaded existing"
                              data-file-index="{{ $index }}" alt="PPE file">
                           @elseif($ext == 'pdf')
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold; color: #b22033;">PDF</div>
                           @elseif(in_array($ext, ['doc', 'docx']))
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold; color: #2b5797;">DOCX</div>
                           @else
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold;">FILE</div>
                           @endif
                           <span class="custom-remove-btn" style="display: flex;">&times;</span>
                        </div>
                        @endif
                        @endforeach
                     </div>
                     <div class="custom-upload__btn-box mt-3">
                        <label class="custom-upload__btn">
                           <p>Upload PPE <span class="or">OR</span> <span class="browse_option">Browse</span></p>
                           <input id="ppeFilesInput" name="ppe_file[]" type="file" multiple class="custom-upload__inputfile" accept="image/*,.pdf,.doc,.docx">
                        </label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-6">
               <div class="border_box_one">
                  <h4 class="mb-3">X-Rays</h4>
                  <div class="col-12">
                     <div class="custom-upload-images-flex mb-3" id="xrayFilesContainer">
                        <input type="hidden" name="xray_files_to_delete" class="xray_files_to_delete_input" value="[]">
                        @foreach ($x_rays as $index => $fileName)
                        @if (!empty(trim($fileName)))
                        <div class="custom-upload-img-box">
                           @php
                           $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                           @endphp
                           @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp']))
                           <img src="{{ asset('Product_images/' . $fileName) }}" class="img-fluid uploaded existing"
                              data-file-index="{{ $index }}" alt="X-Ray file">
                           @elseif($ext == 'pdf')
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold; color: #b22033;">PDF</div>
                           @elseif(in_array($ext, ['doc', 'docx']))
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold; color: #2b5797;">DOCX</div>
                           @else
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight: bold;">FILE</div>
                           @endif
                           <span class="custom-remove-btn" style="display: flex;">&times;</span>
                        </div>
                        @endif
                        @endforeach
                     </div>
                     <div class="custom-upload__btn-box mt-3">
                        <label class="custom-upload__btn">
                           <p>Upload X-Rays <span class="or">OR</span> <span class="browse_option">Browse</span></p>
                           <input id="xrayFilesInput" name="xray_file[]" type="file" multiple class="custom-upload__inputfile" accept="image/*,.pdf,.doc,.docx">
                        </label>
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
                        {{-- 
                        <div class="custom-upload-images-flex" id="customUploadImagesContainer">
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
                           </div>
                           --}}
                           <?php
                              // In your controller
                              $existingImages = json_decode($data->pro_imgs, true) ?? [];
                              $maxImages = 20; // Match your JavaScript limit
                              ?>
                           <input type="hidden" name="images_to_delete" class="images_to_delete_input" value="[]">
                           {{-- @dd($existingImages) --}}
                           <div class="custom-upload-images-flex" id="customUploadImagesContainer">
                              @for ($i = 0; $i < 20; $i++)
                              <div class="custom-upload-img-box">
                                 @if (isset($existingImages[$i]))
                                 <img src="{{ asset('storage/uploads/products/' . $existingImages[$i]) }}" class="img-fluid uploaded existing"
                                    data-image-index="{{ $i }}" alt="Existing image">
                                 <label style="display: none; cursor: pointer; width: 100%; height: 100%; align-items: center; justify-content: center; margin-bottom: 0;">
                                 <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                                 </label>
                                 <span class="custom-remove-btn" style="display: flex;">&times;</span>
                                 @else
                                 <img src="" class="img-fluid" style="display: none;" alt="New image">
                                 <label style="cursor: pointer; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; margin-bottom: 0;">
                                 <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                                 </label>
                                 <span class="custom-remove-btn" style="display: none;">&times;</span>
                                 @endif
                              </div>
                              @endfor
                           </div>
                           {{-- 
                        </div>
                        --}}
                        <!-- Optional: locked images -->
                        {{-- 
                        <p>To add more pictures click to <a href="javascript:void(0)">upgrade</a></p>
                        --}}
                        <div class="custom-relative-box">
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
   
       <div class="col-12">
          <div class="border_box_one">
             <h4 class="">Upload Video:</h4>
             <div class="row">
                <div class="col-12">
                   <div class="d-flex align-items-center justify-content-between mb-3">
                      <h5 class="">Video URL:</h5>
                      <a href="#!" class="add_url_btn">Add another video</a>
                   </div>
                   @php
                   $videoUrls = is_array($data->pro_video_url) ? $data->pro_video_url : json_decode($data->pro_video_url, true) ?? explode(',', $data->pro_video_url);
                   @endphp
                   <div id="video_inputs_wrapper">
                      @php
                      $raw = $data->pro_youtube;
                      if (is_string($raw) && $raw !== '') {
                      $decoded = json_decode($raw, true);
                      // If decode failed → treat as no links
                      $youtubeLinks = json_last_error() === JSON_ERROR_NONE && is_array($decoded) ? $decoded : [];
                      } else {
                      $youtubeLinks = [];
                      }
                      @endphp
                      @forelse($youtubeLinks as $link)
                      <div class="video_input d-flex align-items-center mb-2">
                         <input class="form-control gen_input" type="url" name="pro_youtube[]" value="{{ $link }}"
                            placeholder="https://www.youtube.com/watch?v=..." />
                         <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">×</button>
                      </div>
                      @empty
                      <!-- Agar koi link nahi to kam se kam ek khali input dikhao -->
                      <div class="video_input d-flex align-items-center mb-2">
                         <input class="form-control gen_input" type="url" name="pro_youtube[]" placeholder="https://www.youtube.com/watch?v=..." />
                      </div>
                      @endforelse
                   </div>
                   <small class="text-muted">
                   Please enter a valid URL starting with https:// (e.g., https://www.youtube.com/)
                   </small>
                   {{-- <a href="#!" class="add_url_btn">Add another video</a> --}}
                   <div id="error_message" style="display:none; color:red; font-size:0.9rem;">
                      Maximum 5 videos allowed.
                   </div>
                   {{-- 
                   <div id="video_inputs_wrapper">
                      @foreach ($videoUrls as $url)
                      @if ($loop->index < 3)
                      <div class="video_input d-flex align-items-center mb-2">
                         <input class="form-control gen_input" type="url" name="pro_youtube" value="{{ $url }}"
                            placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                         @if (!$loop->first)
                         <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
                         @endif
                      </div>
                      @endif
                      @endforeach
                   </div>
                   <p id="error_message" style="color: red; display: none;">You can only add up to 3 video URLs.</p>
                </div>
                --}}
                {{-- 
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
                </div>
                --}}
             </div>
          </div>
       </div>
       <div class="col-12">
          <h2 class="text-white mb-3">Social Profiles</h2>
          <div class="border_box_one">
             <div class="row">
                <div class="col-6">
                   <h5 class="mb-2">Facebook</h5>
                   <div class="web_link_wrap">
                      <span>http://</span>
                      <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="pro_facebook"  value="{{ $data->pro_facebook }}" placeholder="Enter link" />
                   </div>
                </div>
                <div class="col-6">
                   <h5 class="mb-2">Youtube</h5>
                   <div class="web_link_wrap">
                      <span>http://</span>
                      <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="link" value="{{ $data->link }}" placeholder="Enter link" />
                   </div>
                </div>
                <div class="col-6">
                   <h5 class="mb-2">Instagram</h5>
                   <div class="web_link_wrap">
                      <span>http://</span>
                      <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="pro_insta" value="{{ $data->pro_insta }}" placeholder="Enter link" />
                   </div>
                </div>
                <div class="col-6">
                   <h5 class="mb-2">TikTok</h5>
                   <div class="web_link_wrap">
                      <span>http://</span>
                      <input class="form-control gen_input_one websiteInput" type="text" name="pro_tiktok" value="{{ $data->pro_tiktok }}" placeholder="Enter link" />
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-6"></div>
       <div class="col-12 mt-4">
          <div class="col-auto d-flex justify-content-end gap-3">
             @if (Auth::user()->usertype == 1)
             <a href="{{ url('products') }}/{{ last(request()->segments()) }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Go Back</a>
             @else
             <a href="{{ url('horse-listing') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Go Back</a>
             @endif
             {{-- <a href="{{ url('products') }}/{{ last(request()->segments()) }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a> --}}
             <button class="btn submit_btn_one" type="submit">Update</button>
             {{-- <a href="#!" class="btn submit_btn_one">Preview</a> --}}
          </div>
       </div>
   </div>
</form>
@endforeach
<style>
   .submit_btn_one, .submit_btn_one:hover {
   width: 160px!important;
   padding: 0 6px !important;
   }
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
   const priceBox = document.querySelector('.pricing_box');
   
   function toggleBidBox() {
       const selected = document.querySelector('input[name="pro_ad_type"]:checked');
       if (selected && selected.value === "At Auction") {
           bidBox.style.display = 'block';
           priceBox.style.display = "none";
       } else {
           bidBox.style.display = 'none';
           priceBox.style.display = "block";
       }
   }
   
   auctionRadioButtons.forEach(rb => {
       rb.addEventListener('change', toggleBidBox);
   });
   
   // Initial state
   document.addEventListener("DOMContentLoaded", toggleBidBox);
</script>
<script>
   (function() {
       const allOptions = [
           "Agility", "All Around", "All-Around Show", "Beginner", "Barrel Racing",
           "Pole Bending", "Gymkhana", "Breakaway Roping", "Broodmare", "Cutting Prospect",
           "Cutting", "Calf Roping", "Clicker Training", "Companion Only", "Competitive Trail Riding",
           "Country English Pleasure", "Cowboy Dressage", "Mounted Shooting", "Cowboy Racing",
           "Cow horse", "Cross-Country", "Dressage", "Drill Team", "Driving",
           "Endurance Riding", "English", "English Pleasure", "Equitation", "Eventing",
           "Field Trial", "Foxhunter", "Gun - Safe Hunting", "Halter", "Harness",
           "Harness Racing", "Horsemanship", "Hunt Seat Equitation", "Hunter", "Hunter Pleasure",
           "Hunter Under Saddle", "Jumping", "Lesson Horse", "Liberty Training", "Light Riding",
           "Longe Line", "Mountain Trail", "Mounted Games", "Mounted Police", "Native Costume",
           "Natural Horsemanship Training", "Nurse Mare", "Pacing Gait", "Pack", "Parade",
           "Performance", "Play day", "Pleasure Driving", "Pole Bending", "Polo",
           "Pony Club", "Project", "Racing", "Retired Race Horse", "Racking Gait",
           "Ranch Conformation Class", "Ranch Rail Class", "Ranch Riding", "Ranch Pleasure",
           "Ranch Sorting", "Ranch Trail Class", "Ranch Versatility", "Ranch Work", "Reining",
           "Reined Cow Horse", "Cutting", "Rodeo", "Rodeo Bronc", "Roping", "Saddle Seat",
           "School", "Schoolmaster", "Show Experience", "Show Hack", "Show Winner",
           "Showmanship Halter", "Sidesaddle", "Stallion - Stud - Breeding", "Started Under Saddle",
           "Steer Roping", "Steer Wrestling", "Stock", "Team Driving", "Team Penning",
           "Team Roping", "Team Roping - Head", "Team Roping - Heel", "Team Sorting",
           "Therapeutic Riding", "Therapy", "Trail Class Competition", "Trail Master",
           "Trail Riding", "Trick", "Unicorn", "Vaulting", "Western", "Western Dressage",
           "Western Pleasure", "Western Riding", "Working Cattle", "Working Equitation", "4H"
       ];
   
       // FIX 1: Hidden input se initial values uthayein taake purane tags show hon
       const hiddenInput = document.getElementById("selectedActivitiesInput");
       let selectedValues2 = hiddenInput.value ? hiddenInput.value.split(',').filter(v => v.trim() !== "") : [];
   
       const dropdownList = document.getElementById("dropdownList");
       const searchInput = document.getElementById("searchInput");
       const tagsContainer = document.getElementById("tagsContainer");
       const MAX_LIMIT = 10; // 10 ki limit
   
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
               // FIX 2: Check limit and duplicates
               if (inputValue) {
                   if (selectedValues2.length >= MAX_LIMIT) {
                       alert("Maximum 10 tags allowed");
                       return;
                   }
                   if (!selectedValues2.includes(inputValue)) {
                       selectedValues2.push(inputValue);
                       searchInput.value = "";
                       renderTags();
                       filterOptions("");
                   }
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
                   // FIX 3: Limit check here too
                   if (selectedValues2.length < MAX_LIMIT) {
                       selectedValues2.push(query);
                       searchInput.value = "";
                       renderTags();
                       filterOptions("");
                   } else {
                       alert("Maximum 10 tags allowed");
                   }
               };
               dropdownList.appendChild(customOption);
           }
       }
   
       function selectOption(value) {
           // FIX 4: Sab jagah 10 ki limit apply kar di
           if (!selectedValues2.includes(value) && selectedValues2.length < MAX_LIMIT) {
               selectedValues2.push(value);
               searchInput.value = "";
               renderTags();
               filterOptions("");
           } else if (selectedValues2.length >= MAX_LIMIT) {
               alert("Maximum 10 tags allowed");
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
               // X icon ke liye button ya span
               tag.innerHTML = `${value} <span style="cursor:pointer; margin-left:8px;" onclick="removeTag2('${value}')">✕</span>`;
               tagsContainer.appendChild(tag);
           });
           // Hidden input ko hamesha update rakhein
           hiddenInput.value = selectedValues2.join(',');
       }
   
       // Close dropdown on outside click
       document.addEventListener("click", (e) => {
           const container = document.querySelector(".dropdown-container");
           if (container && !container.contains(e.target)) {
               dropdownList.classList.remove("active");
           }
       });
   
       // FIX 5: Page load par renderTags call karein taake purane tags dikhen
       renderTags();
   })();
</script>
<script>
   function initCustomImageUpload() {
    const maxImages = 20;
    let imagesToDelete = [];
    
    // Window variable taake data wipe na ho aur re-upload kaam kare
    if (!window.customGalleryDataTransfer) {
        window.customGalleryDataTransfer = new DataTransfer();
    }

    // Input change hone par multiple images handle karne ka block
    $('#customImageInput').on('change', function(e) {
        const newFiles = Array.from(e.target.files);
        const currentUploaderImages = $('#customUploadImagesContainer img.uploaded').length;

        if (currentUploaderImages + newFiles.length > maxImages) {
            alert(`You can only upload a maximum of ${maxImages} images.`);
            $(this).val('');
            return;
        }

        // Sabhi available dabbo ki list nikaal lein jo pehle se uploaded nahi hain
        let availableBoxes = $('#customUploadImagesContainer .custom-upload-img-box').filter(function() {
            return $(this).find('img.uploaded').length === 0;
        });

        newFiles.forEach((file, index) => {
            // Har file ko uske relevant index ke dabbe me bhejein
            if (index < availableBoxes.length) {
                const box = $(availableBoxes[index]);
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    const img = box.find('img').first();
                    
                    // Dabbe ko unhide (show) karein kyunki default HTML me style="display:none" ho sakta hai
                    box.show().css('display', 'flex');
                    
                    // Preview lagayein aur display unhide karein
                    img.attr('src', event.target.result)
                       .addClass('uploaded new')
                       .css('display', 'block')
                       .show();
                       
                    img.attr('data-file-name', file.name);
                    
                    // Plus label ko chupaayein aur cross button unhide karein
                    box.find('label').hide();
                    box.find('.custom-remove-btn').css('display', 'flex').show();
                    
                    // DataTransfer list me file save karein
                    window.customGalleryDataTransfer.items.add(file);
                    document.getElementById('customImageInput').files = window.customGalleryDataTransfer.files;
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Input clear taake agli bar selection me koi clash na ho
        $(this).val('');
    });

    // Cross (×) click remove handle
    $('#customUploadImagesContainer').off('click', '.custom-remove-btn').on('click', '.custom-remove-btn', function(e) {
        e.preventDefault();
        const box = $(this).closest('.custom-upload-img-box');
        const img = box.find('img').first();

        if (img.hasClass('existing')) {
            // Database se aayi hui image ka data index handle
            const index = img.data('image-index');
            if (index !== undefined && !imagesToDelete.includes(index)) {
                imagesToDelete.push(index);
                box.closest('form').find('.images_to_delete_input').val(JSON.stringify(imagesToDelete));
            }
        } else if (img.hasClass('new')) {
            // Nayi file ko global variable se remove karne ka code
            const fileName = img.attr('data-file-name');
            const newDT = new DataTransfer();
            
            for (let i = 0; i < window.customGalleryDataTransfer.files.length; i++) {
                if (window.customGalleryDataTransfer.files[i].name !== fileName) {
                    newDT.items.add(window.customGalleryDataTransfer.files[i]);
                }
            }
            window.customGalleryDataTransfer = newDT;
            document.getElementById('customImageInput').files = window.customGalleryDataTransfer.files;
        }

        // Element aur attributes ko completely fresh karna taake dubara wahan upload ho sake
        img.attr('src', '').removeClass('uploaded new existing').hide();
        img.removeAttr('data-image-index').removeAttr('data-file-name');
        
        // Label ko reset karein
        box.find('label').css('display', 'flex').show();
        $(this).hide();
    });

    // Pehle se mojood images ke cross button auto display karna
    $('#customUploadImagesContainer .custom-upload-img-box img.existing').siblings('.custom-remove-btn').css('display', 'flex').show();
}
   
   function initRegistrationFileUpload() {
       const maxFiles = 10;
       let filesToDelete = [];
       let regDataTransfer = new DataTransfer();
   
       $('#regFilesInput').on('change', function(e) {
           const newFiles = Array.from(e.target.files);
           const currentUploaderImages = $('#regFilesContainer img.uploaded, #regFilesContainer .pdf-icon.uploaded').length;
   
           if (currentUploaderImages + newFiles.length > maxFiles) {
               alert(`You can only upload a maximum of ${maxFiles} registration files.`);
               $(this).val('');
               return;
           }
   
           newFiles.forEach(file => {
               const reader = new FileReader();
               reader.onload = function(event) {
                   let preview;
                   const fileName = file.name.toLowerCase();
                   if (file.type.includes('image')) {
                       preview = `<img src="${event.target.result}" class="img-fluid uploaded new" data-file-name="${file.name}" alt="New file">`;
                   } else if (fileName.endsWith('.pdf')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold; color: #b22033;">PDF</div>`;
                   } else if (fileName.endsWith('.doc') || fileName.endsWith('.docx')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold; color: #2b5797;">DOCX</div>`;
                   } else {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold;">FILE</div>`;
                   }
                   
                   const newBox = $(`
                       <div class="custom-upload-img-box">
                           ${preview}
                           <span class="custom-remove-btn" style="display: flex;">&times;</span>
                       </div>
                   `);
                   $('#regFilesContainer').append(newBox);
   
                   regDataTransfer.items.add(file);
                   document.getElementById('regFilesInput').files = regDataTransfer.files;
               };
               reader.readAsDataURL(file);
           });
           $(this).val('');
       });
   
       $('#regFilesContainer').on('click', '.custom-remove-btn', function() {
           const box = $(this).closest('.custom-upload-img-box');
           const img = box.find('.uploaded');
           
           if (img.hasClass('existing')) {
               const index = img.data('file-index');
               if (index !== undefined && !filesToDelete.includes(index)) {
                   filesToDelete.push(index);
                   box.closest('form').find('.reg_files_to_delete_input').val(JSON.stringify(filesToDelete));
               }
           } else if (img.hasClass('new')) {
               const fileName = img.attr('data-file-name');
               const newDataTransfer = new DataTransfer();
               for (let i = 0; i < regDataTransfer.files.length; i++) {
                   if (regDataTransfer.files[i].name !== fileName) {
                       newDataTransfer.items.add(regDataTransfer.files[i]);
                   }
               }
               regDataTransfer = newDataTransfer;
               document.getElementById('regFilesInput').files = regDataTransfer.files;
           }
   
           // Remove the whole box since it's dynamic
           box.remove();
       });
   
       // Show remove buttons for existing
       $('#regFilesContainer .uploaded.existing').siblings('.custom-remove-btn').show();
   }
   
   function initPPEFileUpload() {
       const maxFiles = 10;
       let filesToDelete = [];
       let ppeDataTransfer = new DataTransfer();
   
       $('#ppeFilesInput').on('change', function(e) {
           const newFiles = Array.from(e.target.files);
           const currentUploaderImages = $('#ppeFilesContainer .uploaded').length;
   
           if (currentUploaderImages + newFiles.length > maxFiles) {
               alert(`You can only upload a maximum of ${maxFiles} PPE files.`);
               $(this).val('');
               return;
           }
   
           newFiles.forEach(file => {
               const reader = new FileReader();
               reader.onload = function(event) {
                   let preview;
                   const fileName = file.name.toLowerCase();
                   if (file.type.includes('image')) {
                       preview = `<img src="${event.target.result}" class="img-fluid uploaded new" data-file-name="${file.name}" alt="New file">`;
                   } else if (fileName.endsWith('.pdf')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold; color: #b22033;">PDF</div>`;
                   } else if (fileName.endsWith('.doc') || fileName.endsWith('.docx')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold; color: #2b5797;">DOCX</div>`;
                   } else {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold;">FILE</div>`;
                   }
                   
                   const newBox = $(`
                       <div class="custom-upload-img-box">
                           ${preview}
                           <span class="custom-remove-btn" style="display: flex;">&times;</span>
                       </div>
                   `);
                   $('#ppeFilesContainer').append(newBox);
   
                   ppeDataTransfer.items.add(file);
                   document.getElementById('ppeFilesInput').files = ppeDataTransfer.files;
               };
               reader.readAsDataURL(file);
           });
           $(this).val('');
       });
   
       $('#ppeFilesContainer').on('click', '.custom-remove-btn', function() {
           const box = $(this).closest('.custom-upload-img-box');
           const img = box.find('.uploaded');
           
           if (img.hasClass('existing')) {
               const index = img.data('file-index');
               if (index !== undefined && !filesToDelete.includes(index)) {
                   filesToDelete.push(index);
                   box.closest('form').find('.ppe_files_to_delete_input').val(JSON.stringify(filesToDelete));
               }
           } else if (img.hasClass('new')) {
               const fileName = img.attr('data-file-name');
               const newDataTransfer = new DataTransfer();
               for (let i = 0; i < ppeDataTransfer.files.length; i++) {
                   if (ppeDataTransfer.files[i].name !== fileName) {
                       newDataTransfer.items.add(ppeDataTransfer.files[i]);
                   }
               }
               ppeDataTransfer = newDataTransfer;
               document.getElementById('ppeFilesInput').files = ppeDataTransfer.files;
           }
           box.remove();
       });
   }
   
   function initXrayFileUpload() {
       const maxFiles = 10;
       let filesToDelete = [];
       let xrayDataTransfer = new DataTransfer();
   
       $('#xrayFilesInput').on('change', function(e) {
           const newFiles = Array.from(e.target.files);
           const currentUploaderImages = $('#xrayFilesContainer .uploaded').length;
   
           if (currentUploaderImages + newFiles.length > maxFiles) {
               alert(`You can only upload a maximum of ${maxFiles} X-Ray files.`);
               $(this).val('');
               return;
           }
   
           newFiles.forEach(file => {
               const reader = new FileReader();
               reader.onload = function(event) {
                   let preview;
                   const fileName = file.name.toLowerCase();
                   if (file.type.includes('image')) {
                       preview = `<img src="${event.target.result}" class="img-fluid uploaded new" data-file-name="${file.name}" alt="New file">`;
                   } else if (fileName.endsWith('.pdf')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold; color: #b22033;">PDF</div>`;
                   } else if (fileName.endsWith('.doc') || fileName.endsWith('.docx')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold; color: #2b5797;">DOCX</div>`;
                   } else {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight: bold;">FILE</div>`;
                   }
                   
                   const newBox = $(`
                       <div class="custom-upload-img-box">
                           ${preview}
                           <span class="custom-remove-btn" style="display: flex;">&times;</span>
                       </div>
                   `);
                   $('#xrayFilesContainer').append(newBox);
   
                   xrayDataTransfer.items.add(file);
                   document.getElementById('xrayFilesInput').files = xrayDataTransfer.files;
               };
               reader.readAsDataURL(file);
           });
           $(this).val('');
       });
   
       $('#xrayFilesContainer').on('click', '.custom-remove-btn', function() {
           const box = $(this).closest('.custom-upload-img-box');
           const img = box.find('.uploaded');
           
           if (img.hasClass('existing')) {
               const index = img.data('file-index');
               if (index !== undefined && !filesToDelete.includes(index)) {
                   filesToDelete.push(index);
                   box.closest('form').find('.xray_files_to_delete_input').val(JSON.stringify(filesToDelete));
               }
           } else if (img.hasClass('new')) {
               const fileName = img.attr('data-file-name');
               const newDataTransfer = new DataTransfer();
               for (let i = 0; i < xrayDataTransfer.files.length; i++) {
                   if (xrayDataTransfer.files[i].name !== fileName) {
                       newDataTransfer.items.add(xrayDataTransfer.files[i]);
                   }
               }
               xrayDataTransfer = newDataTransfer;
               document.getElementById('xrayFilesInput').files = xrayDataTransfer.files;
           }
           box.remove();
       });
   }
   
   jQuery(document).ready(function() {
       initCustomImageUpload();
       initRegistrationFileUpload();
       initPPEFileUpload();
       initXrayFileUpload();
   });
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
   (function() {
       const allOptions = [
           "Agility", "All Around", "All-Around Show", "Beginner", "Barrel Racing",
           "Pole Bending", "Gymkhana", "Breakaway Roping", "Broodmare", "Cutting Prospect",
           "Cutting", "Calf Roping", "Clicker Training", "Companion Only", "Competitive Trail Riding",
           "Country English Pleasure", "Cowboy Dressage", "Mounted Shooting", "Cowboy Racing",
           "Cow horse", "Cross-Country", "Dressage", "Drill Team", "Driving",
           "Endurance Riding", "English", "English Pleasure", "Equitation", "Eventing",
           "Field Trial", "Foxhunter", "Gun - Safe Hunting", "Halter", "Harness",
           "Harness Racing", "Horsemanship", "Hunt Seat Equitation", "Hunter", "Hunter Pleasure",
           "Hunter Under Saddle", "Jumping", "Lesson Horse", "Liberty Training", "Light Riding",
           "Longe Line", "Mountain Trail", "Mounted Games", "Mounted Police", "Native Costume",
           "Natural Horsemanship Training", "Nurse Mare", "Pacing Gait", "Pack", "Parade",
           "Performance", "Play day", "Pleasure Driving", "Pole Bending", "Polo",
           "Pony Club", "Project", "Racing", "Retired Race Horse", "Racking Gait",
           "Ranch Conformation Class", "Ranch Rail Class", "Ranch Riding", "Ranch Pleasure",
           "Ranch Sorting", "Ranch Trail Class", "Ranch Versatility", "Ranch Work", "Reining",
           "Reined Cow Horse", "Cutting", "Rodeo", "Rodeo Bronc", "Roping", "Saddle Seat",
           "School", "Schoolmaster", "Show Experience", "Show Hack", "Show Winner",
           "Showmanship Halter", "Sidesaddle", "Stallion - Stud - Breeding", "Started Under Saddle",
           "Steer Roping", "Steer Wrestling", "Stock", "Team Driving", "Team Penning",
           "Team Roping", "Team Roping - Head", "Team Roping - Heel", "Team Sorting",
           "Therapeutic Riding", "Therapy", "Trail Class Competition", "Trail Master",
           "Trail Riding", "Trick", "Unicorn", "Vaulting", "Western", "Western Dressage",
           "Western Pleasure", "Western Riding", "Working Cattle", "Working Equitation", "4H"
       ];
   
       const dropdownList = document.getElementById("dropdownList");
       const searchInput = document.getElementById("searchInput");
       const tagsContainer = document.getElementById("tagsContainer");
       const hiddenInput = document.getElementById("selectedActivitiesInput");
   
       // FIX: Page load par PHP ka data array mein load karein
       let initialData = searchInput.value.trim();
       let selectedValues2 = initialData ? initialData.split(',').map(s => s.trim()).filter(s => s !== "") : [];
   
       // Input field ko khali kar dein kyunki tags ab container mein dikhenge
       searchInput.value = "";
   
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
               if (inputValue && !selectedValues2.includes(inputValue) && selectedValues2.length < 10) {
                   selectedValues2.push(inputValue);
                   searchInput.value = "";
                   renderTags();
                   filterOptions("");
               }
           }
       }
   
       function filterOptions(query) {
           const filtered = allOptions.filter(option =>
               option.toLowerCase().includes(query.toLowerCase()) &&
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
                   if (!selectedValues2.includes(query) && selectedValues2.length < 10) {
                       selectedValues2.push(query);
                       searchInput.value = "";
                       renderTags();
                       filterOptions("");
                   }
               };
               dropdownList.appendChild(customOption);
           }
       }
   
       window.selectOption = function(value) {
           if (!selectedValues2.includes(value) && selectedValues2.length < 10) {
               selectedValues2.push(value);
               searchInput.value = "";
               renderTags();
               filterOptions("");
               dropdownList.classList.remove("active");
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
               tag.innerHTML = `${value} <span style="cursor:pointer; margin-left:8px" onclick="removeTag2('${value}')">✕</span>`;
               tagsContainer.appendChild(tag);
           });
           hiddenInput.value = selectedValues2.join(',');
       }
   
       document.addEventListener("click", (e) => {
           if (!document.querySelector(".dropdown-container").contains(e.target)) {
               dropdownList.classList.remove("active");
           }
       });
   
       // Sabse important: Pehli baar tags render karne ke liye
       renderTags();
   })();
</script>
{{-- <script>
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
</script> --}}
<script>
   // Add new input
   document.querySelector('.add_url_btn').addEventListener('click', function(e) {
       e.preventDefault();
   
       const wrapper = document.getElementById('video_inputs_wrapper');
       const inputs = wrapper.querySelectorAll('.video_input');
   
       if (inputs.length >= 5) {
           document.getElementById('error_message').style.display = 'block';
           return;
       }
   
       document.getElementById('error_message').style.display = 'none';
   
       const div = document.createElement('div');
       div.className = 'video_input d-flex align-items-center mb-2';
       div.innerHTML = `
   <input class="form-control gen_input" type="url" name="pro_youtube[]" placeholder="https://www.youtube.com/watch?v=..." />
   <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">×</button>
   `;
   
       wrapper.appendChild(div);
       attachRemove(div);
   });
   
   // Remove functionality (existing + new walo ke liye)
   function attachRemove(el) {
       const btn = el.querySelector('.remove_btn');
       if (btn) {
           btn.addEventListener('click', () => {
               el.remove();
               document.getElementById('error_message').style.display = 'none';
           });
       }
   }
   
   // Pehle se mojood inputs pe remove listener laga do
   document.querySelectorAll('.video_input').forEach(attachRemove);
</script>s
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
{{-- <script>
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
</script> --}}
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
   $(document).ready(function() {
       // $("#summernote").summernote();
   
       $('#summernote').summernote({
           placeholder: 'Type your Description',
           height: 300,
           callbacks: {
               onEnter: function(e) {
                   e.preventDefault();
                   document.execCommand('insertLineBreak');
               }
           }
       });
       
       $('.dropdown-toggle').dropdown();
   });
</script>
<script>
   document.querySelectorAll('.websiteInput').forEach(function(input) {
       input.addEventListener('input', function () {
           let value = this.value;
   
           // remove http:// or https://
           value = value.replace(/^https?:\/\//, '');
   
           // remove www. (agar nahi chahte to is line ko comment kr dein)
           // value = value.replace(/^www\./, '');
   
           this.value = value;
       });
   });
</script>
@endsection