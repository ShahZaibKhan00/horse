@php
$layout = Auth::user()->usertype == 1 ? 'layouts.admin_app' : 'layouts.user_app';
@endphp
@extends($layout)
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
    content: "x";
    font-size: 13px;
    color: white;
    opacity: 1;
    right: 6px;
    top: -1px;
    position: absolute;
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
   .max-160 {
    max-width: 160px;
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
   max-width: 90%;
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
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
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
    font-size: 16px;
    font-weight: 700;
    vertical-align: top;
    border: 1px solid #b18d61;
    word-wrap: break-word;
    text-transform: capitalize;
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
   #preloader {
   position: fixed;
   width: 100%;
   height: 100%;
   background: #00000091;
   display: none;
   justify-content: center;
   align-items: center;
   z-index: 9999;
   transition: opacity 0.8s ease-out;
   backdrop-filter: blur(3px);
   }
   .white_box {
   background: #fff;
   padding: 30px 20px;
   text-align: center;
   border-radius: 12px;
   width: 480px;
   transform: scale(0.8);
   opacity: 0;
   transition: all 0.4s ease;
   }
   .white_box.scale {
   transform: scale(1);
   opacity: 1;
   }
   .white_box img {
   max-width: 260px;
   }
   .typewriter {
   font-size: 26px;
   font-weight: 600;
   letter-spacing: 1px;
   color: #000;
   margin-bottom: 10px;
   }
   .loading {
    font-size: 20px;
    font-weight: 600;
    letter-spacing: 1px;
    color: #000;
}
  .white_box a {
   font-size: 16px;
   font-weight: 600;
   padding: 15px 35px;
   background: #bf9855;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   text-transform: uppercase;
   /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
   border-radius: 0;
   z-index: 9;
   color: #1d2139;
   display: block;
   width: fit-content;
   margin: 0 auto;
   border-radius: 10px;
   margin-top: 20px;
   }
   /* Safe Blinking Cursor */
   #cursor {
   display: inline-block;
   width: 3px;
   height: 1.1em;
   background: #4a9eff;
   vertical-align: middle;
   animation: blink 0.7s step-end infinite;
   }
   @keyframes blink {
   50% { opacity: 0; }
   }
   .loader {
   width: 200px;
   height: 200px;
   }
   .preloader-hide {
   opacity: 0;
   pointer-events: none;
   display: none;
   }
   .spinner {
   width: 65px;
   height: 65px;
   margin: 0 auto 30px;
   border: 7px solid #fff ;
   border-top: 7px solid #ae8e3b;
   border-radius: 50%;
   animation: spin 1s linear infinite;
   }
   @keyframes spin {
   0% { transform: rotate(0deg); }
   100% { transform: rotate(360deg); }
   }
   .max-160 {
        max-width: 160px;
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
   span.text_wrap {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
a.pfd-box {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 200px;
    margin: 0 auto;
    height: 200px;
}

.border_box_one_neww h2 {
    font-family: 'Inter', sans-serif;
    color: #1f2339;
    display: inline-block;
    padding-bottom: 5px;
    margin-bottom: 15px;
    font-size: 1.2rem;
    text-transform: uppercase;
    position: relative;
    font-weight: 700;
}
.border_box_one_neww h2::before {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 54px;
    height: 3px;
    background: #d59241;
}
.border_box_one_neww table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}
table tbody tr {
    border-bottom: 1px solid #d6d8d9;
}
.border_box_one_neww .label {
    background-color: #ffffff;
    font-weight: 600;
    width: 20%;
    color: #1f2339;
    font-size: 14px;
    font-weight: 700;
    font-family: 'Inter', sans-serif;
}
.border_box_one_neww .value {
    color: #1f2339;
    font-family: 'Inter', sans-serif;
    text-transform: capitalize;
}
.border_box_one_neww td {
    border: 1px solid #eeeeee;
    padding: 12px;
    font-size: 0.9rem;
}
.new_heading_bar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 10px;
        }
        .new_heading_icon_box {
            max-width: 30px;
        }
        .new_heading_bar h2 {
            color: #1f2339;
            font-size: 25px;
            font-weight: 700;
            margin: 0;
            position: relative;
            font-family: 'Inter', sans-serif;
        }
        .new_heading_bar h2::before {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 90px;
            height: 3px;
            background: #b18d61;
        }
        
        
        .preview_flex {
    width: 100%;
    display: flex;
    justify-content: space-between;
    gap: 10px;
    height: 600px;
}
.preview_bax {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f9f9f9;
    border: 1px solid #ddd;
    margin-bottom: 15px;
}
.preview_bax img {
    max-width: 100%!important;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.preview_bax iframe {
        height: 100%!important;
}
.new_flex {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 150px;
    height: 100%;
    gap: 10px;
    flex-direction: column;
    overflow-y: auto;
}

.u_box {
    background: #f5f5f5;
    padding: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 110px;
    height: 110px;
    border: 2px solid #b18d61;
    border-radius: 5px;

    flex-shrink: 0; /* add this */
}

.u_box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
        div#doc_thumbnail_list {
                width: 150px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        a.btn.btn-primary.mt-2 {
    background: transparent;
    color: #1d2139;
    border: 2px solid #1d2139;
    border-radius: 0;
    font-size: 20px;
}
</style>
<div id="preloader">
   <div class="white_box" id="w_box">
      <img src="/assets/images/test-logo-1.gif" alt="" class="img-fluid mb-2">
      <!--<h2 >Your ad is being submitted. Please wait...</h2>-->
      <div class="typewriter">
         <span id="text"></span><span id="cursor"></span>
      </div>
      <div class="loading">It Will Take Few Minutes</div>
      <div class="loading">
         Please wait
         <div class="dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
         </div>
      </div>
      <a href="{{ url('realstate-listing') }}" target="_blank">Back to Real Estate Listings</a>
   </div>
</div>
<div class="content user_main_content p-5">
<div class="pb-5">
   <form method="POST" action="{{ url('/realstate_store') }}" enctype="multipart/form-data" novalidate class="row g-3 mb-6" id="myForm">
      <div class="box_top">
         <h2 class="mb-2 main_heading_dashboard">Real Estate Ad <br /> Property Information</h2>
         <!-- <h5 class="text-700 fw-semi-bold">Hereâ€™s whatâ€™s going on at your business right now</h5> -->
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
            <!-- <div class="bid_box" style="display: none;">
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
               </div> -->
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
                        <input class="form-control gen_input mb-3" type="text" name="num_spaces" placeholder="# of spaces" />
                        <div class="row">
                           <div class="col-3">
                              <div class="d-flex gap-1 flex-column">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Detached" id="detached" name="garage_type[]">
                                    <label class="form-check-label" for="detached">Detached</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Attached" id="attached" name="garage_type[]">
                                    <label class="form-check-label" for="attached">Attached</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Tandem" id="tandem" name="garage_type[]">
                                    <label class="form-check-label" for="tandem">Tandem</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="oversized" id="oversized" name="garage_type[]">
                                    <label class="form-check-label" for="oversized">Oversized</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="d-flex gap-1 flex-column">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Breezeway" id="breezeway" name="garage_type[]">
                                    <label class="form-check-label" for="breezeway">Breezeway</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Garage Workshop" id="garage_ws" name="garage_type[]">
                                    <label class="form-check-label" for="garage_ws">Garage
                                    Workshop</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Garage Apartment" id="garage_a" name="garage_type[]">
                                    <label class="form-check-label" for="garage_a">Garage
                                    Apartment</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Carport" id="carport" name="garage_type[]">
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
               <h4 class="mb-3">Equestrian Amenities:</h4>
               <hr>
               <div class="row gy-4">
                  <div class="col-6">
                     <div class="row gy-4"> 
                        <div class="col-3">
                         <h5 class="mb-3">Stall</h5>
                         <div class="d-flex gap-1 flex-column">
                            <div class="form-check">
                               <input class="form-check-input" type="radio" value="Yes" id="have_stall_yes" name="have_stall" />
                               <label class="form-check-label" for="have_stall_yes">Yes</label>
                            </div>
                            <div class="form-check">
                               <input class="form-check-input" type="radio" value="No" id="have_stall_no" name="have_stall" />
                               <label class="form-check-label" for="have_stall_no">No</label>
                            </div>
                         </div>
                         </div>
                         <div class="col-9">
                         <div class="have_stall_box max-160 mt-4">
                            <div class="d-flex gap-1 flex-column">
                                <div class="form-check mb-2 ps-0">
                                   <label class="form-check-label mb-2" for="stall_nos">Total # of Stalls</label>
                                   <input class="form-control gen_input_one" type="number" id="stall_nos" name="num_stalls" placeholder="Enter here...">
                                </div>
                            </div>
                            <div class="d-flex gap-3 flex-row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Mini" id="mini_flooring" name="stall_types[]" />
                                    <label class="form-check-label" for="mini_flooring">Mini</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Standard" id="standard_flooring" name="stall_types[]" />
                                    <label class="form-check-label" for="standard_flooring">Standard</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Oversized" id="oversized_flooring" name="stall_types[]" />
                                    <label class="form-check-label" for="oversized_flooring">Oversized</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="col-6">
                      <div class="row gy-4"> 
                        <div class="col-3">                
                             <h5 class="mb-3">Barn</h5>
                             <div class="d-flex gap-1 flex-column">
                                <div class="form-check">
                                   <input class="form-check-input" type="radio" value="Yes" id="have_barn_yes" name="have_barn" />
                                   <label class="form-check-label" for="have_barn_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                   <input class="form-check-input" type="radio" value="No" id="have_bard_no" name="have_barn" />
                                   <label class="form-check-label" for="have_bard_no">No</label>
                                </div>
                             </div>
                         </div>
                         <div class="col-9">
                             <div class="have_barn_box max-160  mt-4">
                                <div class="d-flex gap-1 flex-column">
                    
                                    <div class="form-check mb-2 ps-0">
                                       <label class="form-check-label mb-2" for="barn_nos">Total # of Barns</label>
                                       <input class="form-control gen_input_one" type="number" id="barn_nos" name="num_barn" placeholder="Enter here...">
                                    </div>
                                </div>
                             </div>
                         </div>
                     </div>
                  </div>
                  
                  <div class="col-6">
                     <h5 class="mb-3">Barn flooring </h5>
                     <!--<div class="form-check other_flooring_box p-0 mb-4">
                        <div class="form-check  ps-0">
                           <input class="form-control gen_input_one" type="number" id="barn" name="num_barn">
                           <label class="form-check-label" for="barn">Total # of Barns</label>
                        </div>
                        <div class="form-check ps-0">
                           <input class="form-control gen_input_one" type="text" id="stalls" name="num_stalls">
                           <label class="form-check-label" for="stalls">Total # of Stalls</label>
                        </div> 
                     </div>-->
                     <div class="d-flex gap-1 flex-column">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="Rubber" id="rubber_flooring" name="barn_flooring[]" />
                           <label class="form-check-label" for="rubber_flooring">Rubber</label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="Concrete" id="concrete_flooring" name="barn_flooring[]" />
                           <label class="form-check-label" for="concrete_flooring">Concrete</label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="Dirt" id="dirt_flooring" name="barn_flooring[]" />
                           <label class="form-check-label" for="dirt_flooring">Dirt</label>
                        </div>
                        <div class="form-check other_flooring_box">
                           <input class="form-check-input" type="checkbox" name="">
                           <input class="form-control gen_input_one" type="text" name="barn_flooring[]" value="" placeholder="Other Flooring">
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <h5 class="mb-3">Rubber Mats in stalls</h5>
                     <div class="d-flex gap-1 flex-column">
                        <div class="form-check">
                           <input class="form-check-input" type="radio" value="yes" id="rubber_matt_yes" name="rubber_matts" />
                           <label class="form-check-label" for="rubber_matt_yes">Yes</label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" value="no" id="rubber_matt_no" name="rubber_matts" />
                           <label class="form-check-label" for="rubber_matt_no">No</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="row"> 
                         <div class="col-3"> 
                             <h5 class="mb-3">Run-In Shed</h5>
                             <div class="d-flex gap-1 flex-column">
                                <div class="form-check">
                                   <input class="form-check-input" type="radio" value="Yes" id="run_shed_yes" name="run_shed" />
                                   <label class="form-check-label" for="run_shed_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                   <input class="form-check-input" type="radio" value="No" id="run_shed_no" name="run_shed" />
                                   <label class="form-check-label" for="run_shed_no">No</label>
                                </div>
                             </div>
                         </div>
                         <div class="col-9">
                             <div class="run_shed_box mt-4 max-160">
                                    <div class="d-flex gap-1 flex-column">
                        
                                        <div class="form-check mb-2 ps-0">
                                           <label class="form-check-label mb-2" for="barn_nos">Total #  Run-In Sheds</label>
                                           <input class="form-control gen_input_one" type="number" id="barn_nos" name="num_sheds" placeholder="Enter here...">
                                        </div>
                                    </div>
                                 </div>
                            </div>
                     </div>
                  </div>
                  <div class="col-12">
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
                                    <input class="form-check-input" type="radio" value="yes" id="heated_yes" name="heated_not">
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
                                    <input class="form-check-input" type="radio" value="yes" id="hot_water_yes" name="hot_water">
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
                                    <input class="form-check-input" type="radio" value="yes" id="cold_water_yes" name="cold_water">
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
                           <input class="form-check-input" type="radio" value="yes" id="barn_yes" name="heated_barn" />
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
                           <input class="form-check-input" type="radio" value="yes" id="air_con_yes" name="air_condition_barn" />
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
                           <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="000">
                           <p class="mb-0">x</p>
                           <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="000">
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
                           <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="000">
                           <p class="mb-0">x</p>
                           <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="000">
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
                           <input class="form-check-input" type="radio" value="yes" id="rounnd_yes" name="round_pen" />
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
               <textarea class="textarea summernote" name="property_overview" style="width: 100%; height: 15rem;" placeholder="Write property overview..."></textarea>
            </div>
         </div>
         <div class="col-12">
            <div class="border_box_one mb-0">
               <h4 class="mb-2">Additional Write up</h4>
               <h4><small class="text-muted mb-3">( Please include anything additional you want to add)</small>
               </h4>
               <textarea class="textarea summernote" name="ad_write_up" style="width: 100%; height: 15rem;" placeholder="Additional Write up"></textarea>
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
            <h3 class="text-white">Media Featured Image</h3>
         </div>
         <div class="col-12 mt-3">
            <div class="border_box_one">
               <div class="col-12">
                  <div class="upload__box">
                     <div class="upload__img-wrap"></div>
                     <div class="upload__btn-box">
                        <label class="upload__btn">
                           <p>Drag your Image here<span class="or">OR</span> <span class="browse_option">Browse from
                              device</span>
                           </p>
                           <input name="featured_image" type="file" class="upload__inputfile" data-max_length="1" required>
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
                  <div class="col-12">
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="">Video URL:</h5>
                        <a href="#!" class="add_url_btn">Add another video</a>
                     </div>
                     <div id="video_inputs_wrapper">
                        <div class="video_input d-flex align-items-center mb-2">
                           <input class="form-control gen_input" type="url" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                        </div>
                     </div>
                     <small class="text-muted">
                     Please enter a valid URL starting with https:// (e.g., https://www.youtube.com/)
                     </small>
                     <p id="error_message" style="color: red; display: none;">You can only add up to 5 video
                        URLs.
                     </p>
                  </div>
                  <!-- <div class="col-6">
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
                  </div> -->
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
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="website_link" placeholder="example@abcd.com" />
                     </div>
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
                        <input name="per_pic[]" type="file" class="upload__inputfile">
                     </label>
                  </div>
               </div>
            </div>
            <h2 class="text-white mb-3">Social Media Links</h2>
            <div class="border_box_one">
               <div class="row gy-3">
                  <div class="col-6">
                     <h5 class="mb-2">Facebook</h5>
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="facebook" placeholder="Paste link here" />
                     </div>
                  </div>
                  <div class="col-6">
                     <h5 class="mb-2">Instagram</h5>
                     
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="insta" placeholder="Paste link here" />
                     </div>
                  </div>
                  <div class="col-6">
                     <h5 class="mb-2">TikTok</h5>
                     
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="tiktok" placeholder="Paste link here" />
                     </div>
                  </div>
                  <div class="col-6">
                     <h5 class="mb-2">LinkedIn</h5>
                     
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="linkedin" placeholder="Paste link here" />
                     </div>
                  </div>
                  <div class="col-6">
                     <h5 class="mb-2">YouTube</h5>
                     
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="youtube" placeholder="Paste link here" />
                     </div>
                  </div>
                  <div class="col-6">
                     <h5 class="mb-2">Zillow </h5>
                     
                     <div class="web_link_wrap">
                        <span>http://</span>
                        <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="zillow" placeholder="Paste link here" />
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tc_agree" required>
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
         <button class="fsm-close" aria-label="Close modal">x</button>
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
                                 <div class="swiper-slide"><img src="/assets/images/placeholder.png" alt="img" class="img-fluid w-100 img_radius_one"></div>
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
                                    <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid"></span> <span class="text_wrap">2 Detached</span></li>
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
                    <div class="new_heading_bar">
                        <h2>ABOUT:</h2>
                        
                    </div>
                    <p>Overview text here...</p> 
                </div>
                
                <div class="mb-4 border_box_one">
                    <div class="new_heading_bar">
                        <h2>ADDITIONAL INFORMATION</h2>
                    </div>
                    <p>Additional write up text here...</p> 
                </div>
            </div>
            <div class="cus_col view_detail_page">
               <div class="new_heading_bar">

                    <h2>FACILITY AMENITIES</h2>
                </div>
               <div class="border_box_one  border_box_one_neww">
                   <h2>Barn</h2>
                   <table>
                      <tbody>
                         <tr>
                            <td class="label">Barn Type:</td>
                            <td class="value" colspan="5">Home with Acreage</td>
                         </tr>
                         <tr>
                            <td class="label">Barns:</td>
                            <td class="value" colspan="5">2</td>
                         </tr>
                         <tr>
                            <td class="label">Barn Flooring:</td>
                            <td class="value" colspan="2">Concrete</td>
                            <td class="value" colspan="3"></td>
                            <!--<td class="value" colspan="2">Rubber</td>-->
                            <!--<td class="value" colspan="3">Concrete</td>-->
                         </tr>
                         <tr>
                            <td class="label">Air Conditioned Barn:</td>
                            <td class="value" colspan="5">no</td>
                         </tr>
                         <tr>
                            <td class="label">Heated Barn:</td>
                            <td class="value" colspan="5">no</td>
                         </tr>
                         <tr>
                            <td class="label">Wash Stall:</td>
                            <td class="value">yes</td>
                            <td class="label">Cold Water:</td>
                            <td class="value">yes</td>
                            <td class="label">Hot Water:</td>
                            <td class="value">no</td>
                         </tr>
                         <tr>
                            <td class="label">Tack Room:</td>
                            <td class="value">yes</td>
                            <td class="label">Heated:</td>
                            <td class="value" colspan="3">no</td>
                         </tr>
                         <tr>
                            <td class="label">Hay Storage:</td>
                            <td class="value" colspan="1">Hay loft</td>
                            <td class="value" colspan="1">Hay room</td>
                            <td class="value" colspan="2">Hay stall</td>
                            <!--<td class="value" colspan="1">Hay Loft</td>-->
                            <!--<td class="value" colspan="2">Hay Room</td>-->
                            <!--<td class="value" colspan="2">Additional Hay Barn</td>-->
                         </tr>
                      </tbody>
                   </table>
                   <h2>Stalls</h2>
                   <td
                   <td class="value">
                      <!--<td class="value">Mini</td>-->
                      <!--<td class="value">Standard</td>-->
                      </td
                   <td>
                      <table>
                         <tbody>
                            <tr>
                               <td class="label">Number of Stalls:</td>
                               <td class="value">15</td>
                               <td class="label">Sizes:</td>
                               <td class="value">Standard</td>
                            </tr>
                            <tr>
                               <td class="label">Rubber Mats in Stalls:</td>
                               <td class="value" colspan="4">yes</td>
                            </tr>
                         </tbody>
                      </table>
                      <h2>Turnout &amp; Pastures</h2>
                      <table>
                         <tbody>
                            <tr>
                               <td class="label">Dry Lots:</td>
                               <td class="value">yes</td>
                               <td class="label">Quantity:</td>
                               <td class="value">5</td>
                            </tr>
                            <tr>
                               <td class="label">Grass Pastures:</td>
                               <td class="value">yes</td>
                               <td class="label">Quantity:</td>
                               <td class="value">17</td>
                            </tr>
                            <tr>
                               <td class="label">Fencing Type:</td>
                               <td class="value">Electric</td>
                               <td class="value">Vinyl</td>
                               <td class="value">Wood</td>
                               <!--<td class="value">Electric</td>-->
                               <!--<td class="value">Wood</td>-->
                               <!--<td class="value">Metal</td>-->
                            </tr>
                            <tr>
                               <td class="label">Run in Sheds:</td>
                               <td class="value" colspan="3">Yes</td>
                            </tr>
                         </tbody>
                      </table>
                      <h2>Riding Arenas</h2>
                      <table>
                         <tbody>
                            <tr>
                               <td class="label">Outdoor Riding Ring:</td>
                               <td class="value">yes</td>
                               <td class="label">Size:</td>
                               <td class="value">200 × 85</td>
                               <td class="label">Watering System:</td>
                               <td class="value">no</td>
                            </tr>
                            <tr>
                               <td class="label">Indoor Riding Ring:</td>
                               <td class="value">yes</td>
                               <td class="label">Size:</td>
                               <td class="value">200 × 100</td>
                               <td class="label">Watering System:</td>
                               <td class="value">yes</td>
                            </tr>
                            <tr>
                               <td class="label">Round Pen:</td>
                               <td class="value" colspan="5">yes</td>
                            </tr>
                         </tbody>
                      </table>
                </div>
            </div>
            <div class="cus_col view_detail_page">
               
               <div class="new_heading_bar">
              
                    <h2>PROPERTY AMENITIES</h2>
                </div>
               <div class="border_box_one border_box_one_neww">
                        <h2>Home &amp; Living</h2>
                        <table>
                            <tbody><tr>
                                <td class="label">House Type:</td>
                                <td class="value" colspan="3">Home with Acreage</td>
                            </tr>
                            <tr>
                                <td class="label">Acreage:</td>
                                <td class="value" colspan="3">135 Acres</td>
                            </tr>
                            <tr>
                                <td class="label"># of Bedrooms:</td>
                                <td class="value" colspan="3">3</td>
                            </tr>
                            <tr>
                                <td class="label"># of Bathrooms:</td>
                                <td class="value" colspan="3">2</td>
                            </tr>
                            <tr>
                                <td class="label">Garage:</td>
                                <td class="value">5</td>
                                <td class="label">Details:</td>
                                <td class="value">Detached, Attached</td>
                            </tr>
                            <tr>
                                <td class="label">Pool:</td>
                                <td class="value" colspan="3">No</td>
                            </tr>
                            <tr>
                                <td class="label">Hot Tub:</td>
                                <td class="value" colspan="3">Yes</td>
                            </tr>
                            <tr>
                                <td class="label">Pond:</td>
                                <td class="value" colspan="3">No</td>
                            </tr>
                            <tr>
                                <td class="label">River:</td>
                                <td class="value" colspan="3">Yes</td>
                            </tr>
                            <tr>
                                <td class="label">Trails on Property:</td>
                                <td class="value" colspan="3">Yes</td>
                            </tr>
                            <tr>
                                <td class="label">Trail Access:</td>
                                <td class="value" colspan="3">Yes</td>
                            </tr>
                            <tr>
                                <td class="label">Hay Fields:</td>
                                <td class="value" colspan="3">Yes</td>
                            </tr>
                            <tr>
                                <td class="label">Extra Housing:</td>
                                <td class="value" colspan="3">Yes</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
            </div>
            <div class="cus_col view_detail_page">
                <div class="new_heading_bar">
       
                    <h2>DOCUMENTS</h2>
                </div>
                <div class="border_box_one">
                    <!-- Yeh Container JS se fill hoga -->
                    <div class="preview_flex" id="doc_preview_container">
                        
                        <!-- MAIN PREVIEW AREA (preview_bax) -->
                        <div class="preview_bax" id="main_doc_preview_area">
                            <p class="text-muted">Click the icon to view</p>
                        </div>
            
                        <!-- THUMBNAIL LIST (u_boxes yahan ayenge) -->
                        <div class="d-flex flex-column gap-2" id="doc_thumbnail_list">
                            <!-- Thumbnails JS se inject honge -->
                        </div>
            
                    </div>
                </div>
            </div>
            <div class="cus_col view_detail_page">

               
               <div class="new_heading_bar">
                    <h2>ABOUT THE AGENT | SELLER:</h2>
                </div>
               <div class="row mb-4 mt-3">
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
             <style>
              .videoplay_max_box {
                    height: 500px;
                }
               .videoplay_max_box  iframe {
                    width: 100%;
                    height: 100%;
                    border-radius: 10px;
                }
                .vid_row {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }
                .vid_col {
                    flex: 0 0 calc((100% - 40px) / 5);
                }
          </style>
            <div class="cus_col view_detail_page video_preview_section">
                <div class="row">
                    <div class="new_heading_bar">
                        <i class="fa fa-video-camera me-2" aria-hidden="true" style="color: #1f2339; font-size: 22px;"></i>
                        <h2>VIDEOS</h2>
                    </div>
                    
                    <!-- Main Player Area -->
                    <div class="col-12 mb-4 mt-4">
                        <div class="videoplay_max_box mb-0">
                            <iframe
                                id="mainPlayer"
                                width="100%"
                                height="450"
                                src="" 
                                frameborder="0"
                                allow="autoplay; encrypted-media"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
            
                    <!-- Thumbnails Area -->
                    <div class="col-12 mt-0">
                        <p class="heading18px mb-3"><strong>MORE VIDEOS</strong></p>
                        <div class="vid_row" id="video_thumbnails_container">
                            <!-- Thumbnails JS se inject honge -->
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
   $(document).ready(function() {
       // $("#summernote").summernote();
   
      $('.summernote').each(function() {
            $(this).summernote({
                placeholder: 'Type your Description',
                height: 300,
               callbacks: {
                   onEnter: function(e) {
                       e.preventDefault();
                       document.execCommand('insertLineBreak');
                   }
               }
            });
        });
       
       $('.dropdown-toggle').dropdown();
   });
</script>




<script>
document.addEventListener("DOMContentLoaded", function() {
    const overlay = document.getElementById("fsmOverlay");
    const previewBtn = document.getElementById("previewBtn");
    const closeBtn = overlay.querySelector(".fsm-close");
    const placeholderImg = "/assets/images/placeholder.png";

    // --- Utility Functions ---
    const getVal = (name, isSelect = false) => {
        const el = document.querySelector(`${isSelect ? 'select' : 'input'}[name="${name}"]`);
        return el && el.value.trim() !== "" ? el.value : "N/A";
    };

    const getTextVal = (name) => {
        const el = document.querySelector(`textarea[name="${name}"]`);
        return el && el.value.trim() !== "" ? el.value : "N/A";
    };

    const getRadioVal = (name) => {
        const checked = document.querySelector(`input[name="${name}"]:checked`);
        return checked ? checked.value : "N/A";
    };

    const getCheckboxVals = (name) => {
        const checked = Array.from(document.querySelectorAll(`input[name="${name}"]:checked`))
                             .map(el => el.value);
        return checked.length > 0 ? checked.join(', ') : "";
    };

    // Helper: Checkbox values + "Other" text input handle karne ke liye
    const getCheckboxWithOther = (name) => {
        const checked = Array.from(document.querySelectorAll(`input[name="${name}"]:checked`))
                             .filter(el => el.type !== 'text')
                             .map(el => el.value);
        const otherInput = document.querySelector(`input[name="${name}"][type="text"]`);
        if (otherInput && otherInput.value.trim() !== "") {
            checked.push(otherInput.value.trim());
        }
        return checked.length > 0 ? checked.join(', ') : "N/A";
    };

    // Helper: Table cell update by label text (robust selector)
    const updateTableByLabel = (tableElement, labelText, value, extraValue = "") => {
        if (!tableElement) return;
        const cells = tableElement.querySelectorAll('td.label, td:first-child');
        for (let cell of cells) {
            if (cell.innerText.toUpperCase().includes(labelText.toUpperCase())) {
                let valCell = cell.nextElementSibling;
                if (valCell && !valCell.classList.contains('label')) {
                    valCell.innerText = value || "N/A";
                }
                if (extraValue && valCell && valCell.nextElementSibling && !valCell.nextElementSibling.classList.contains('label')) {
                    valCell.nextElementSibling.innerText = extraValue;
                }
                break;
            }
        }
    };

    previewBtn.addEventListener("click", function(e) {
        e.preventDefault();

        // === 1. TOP HEADER ===
        overlay.querySelector('.sale_tag').textContent = getRadioVal('ad_type');
        
        const topLoc = overlay.querySelector('.text_border');
        if (topLoc) {
            const town = document.querySelector('input[name="real_title"]').value.trim();
            const fullLoc = document.querySelector('select[name="real_location"]').value;
            let abbrWithBrackets = "";
            if (fullLoc.includes('(') && fullLoc.includes(')')) {
                const matches = fullLoc.match(/\(([^)]+)\)/);
                if (matches) abbrWithBrackets = "" + matches[1].toUpperCase() + "";
            }
            if (town && abbrWithBrackets) {
                topLoc.textContent = town + ", " + abbrWithBrackets;
            } else if (town) {
                topLoc.textContent = town;
            } else if (abbrWithBrackets) {
                topLoc.textContent = abbrWithBrackets;
            } else {
                topLoc.textContent = "Location Info";
            }
        }
        overlay.querySelector('.price_Text').textContent = "PRICE : " + getVal('real_price');

        // === 2. QUICK INFO ICONS ===
        const infoList = overlay.querySelectorAll('.info_list_one');
        if (infoList.length >= 2) {
            const left = infoList[0].querySelectorAll('li span:last-child');
            left[0].textContent = getVal('real_acres') + " Acres";
            left[1].textContent = getVal('real_bedroom') + " Bedrooms";
            left[2].textContent = getVal('real_bathroom') + " Baths";
            const gTypes = getCheckboxWithOther('garage_type[]');
            left[3].textContent = getVal('num_spaces') + " " + (gTypes || "Spaces");

            const right = infoList[1].querySelectorAll('li span:last-child');
            right[0].textContent = getVal('num_barn') + " Barn";
            right[1].textContent = getVal('num_stalls') + " Stalls"; 
            right[2].textContent = "Indoor: " + getRadioVal('in_ride_ring');
            right[3].textContent = "Pastures: " + getVal('num_fenced_grass');
        }

        // === 3. FACILITY AMENITIES TABLES (3rd cus_col) ===
        const facilitySection = overlay.querySelector('.cus_col:nth-of-type(3) .border_box_one_neww');
        const tables = facilitySection ? facilitySection.querySelectorAll('table') : [];
        const barnTable = tables[0];
        const stallsTable = tables[1];
        const pastureTable = tables[2];
        const arenaTable = tables[3];

        // --- Barn Table ---
        if (barnTable) {
            updateTableByLabel(barnTable, "Barn Type", getVal('property_type', true));
            updateTableByLabel(barnTable, "Barns", getVal('num_barn'));
            updateTableByLabel(barnTable, "Barn Flooring", getCheckboxWithOther('barn_flooring[]'));
            updateTableByLabel(barnTable, "Air Conditioned Barn", getRadioVal('air_condition_barn'));
            updateTableByLabel(barnTable, "Heated Barn", getRadioVal('heated_barn'));
            
            // Wash Stall (multi-cell)
            const washRow = Array.from(barnTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('WASH STALL'));
            if (washRow) {
                const cells = washRow.querySelectorAll('td.value');
                if (cells[0]) cells[0].innerText = getRadioVal('wash_stall');
                if (cells[1]) cells[1].innerText = getRadioVal('cold_water');
                if (cells[2]) cells[2].innerText = getRadioVal('hot_water');
            }
            // Tack Room (multi-cell)
            const tackRow = Array.from(barnTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('TACK ROOM'));
            if (tackRow) {
                const cells = tackRow.querySelectorAll('td.value');
                if (cells[0]) cells[0].innerText = getRadioVal('tack_room');
                if (cells[1]) cells[1].innerText = getRadioVal('heated_not');
            }
            updateTableByLabel(barnTable, "Hay Storage", getCheckboxWithOther('hay_storage[]'));
        }

        // --- Stalls Table ---
        if (stallsTable) {
            updateTableByLabel(stallsTable, "Number of Stalls", getVal('num_stalls'));
            updateTableByLabel(stallsTable, "Sizes", getCheckboxWithOther('stall_types[]'));
            updateTableByLabel(stallsTable, "Rubber Mats in Stalls", getRadioVal('rubber_matts'));
        }

        // --- Pasture/Turnout Table ---
        if (pastureTable) {
            const dryRow = Array.from(pastureTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('DRY LOTS'));
            if (dryRow) {
                const cells = dryRow.querySelectorAll('td.value');
                if (cells[0]) cells[0].innerText = getRadioVal('dry_lots');
                if (cells[1]) cells[1].innerText = getVal('num_lots');
            }
            const grassRow = Array.from(pastureTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('GRASS PASTURES'));
            if (grassRow) {
                const cells = grassRow.querySelectorAll('td.value');
                if (cells[0]) cells[0].innerText = getRadioVal('fenced_grass');
                if (cells[1]) cells[1].innerText = getVal('num_fenced_grass');
            }
            updateTableByLabel(pastureTable, "Fencing Type", getCheckboxWithOther('fencing[]'));
            updateTableByLabel(pastureTable, "Run in Sheds", getVal('num_sheds'));
        }

        // --- Riding Arenas Table ---
        if (arenaTable) {
            // Outdoor Riding Ring
            const outRow = Array.from(arenaTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('OUTDOOR RIDING RING'));
            if (outRow) {
                const cells = outRow.querySelectorAll('td.value');
                const outDims = document.querySelectorAll('input[name="out_dimensions[]"]');
                const outSize = (outDims[0]?.value || "0") + " × " + (outDims[1]?.value || "0");
                if (cells[0]) cells[0].innerText = getRadioVal('out_ride_ring');
                if (cells[1]) cells[1].innerText = outSize;
                if (cells[2]) cells[2].innerText = getRadioVal('out_water_system');
            }
            // Indoor Riding Ring
            const inRow = Array.from(arenaTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('INDOOR RIDING RING'));
            if (inRow) {
                const cells = inRow.querySelectorAll('td.value');
                const inDims = document.querySelectorAll('input[name="in_dimensions[]"]');
                const inSize = (inDims[0]?.value || "0") + " × " + (inDims[1]?.value || "0");
                if (cells[0]) cells[0].innerText = getRadioVal('in_ride_ring');
                if (cells[1]) cells[1].innerText = inSize;
                if (cells[2]) cells[2].innerText = getRadioVal('in_water_system');
            }
            updateTableByLabel(arenaTable, "Round Pen", getRadioVal('round_pen'));
        }

        // === 4. PROPERTY AMENITIES TABLE (4th cus_col) ===
        const propertySection = overlay.querySelector('.cus_col:nth-of-type(4) .border_box_one_neww');
        const propertyTable = propertySection ? propertySection.querySelector('table') : null;
        
        if (propertyTable) {
            updateTableByLabel(propertyTable, "House Type", getVal('property_type', true));
            updateTableByLabel(propertyTable, "Acreage", getVal('real_acres') + " Acres");
            updateTableByLabel(propertyTable, "# of Bedrooms", getVal('real_bedroom'));
            updateTableByLabel(propertyTable, "# of Bathrooms", getVal('real_bathroom'));
            
            // Garage (multi-cell)
            const garageRow = Array.from(propertyTable.querySelectorAll('tr')).find(r => r.querySelector('td.label')?.innerText.toUpperCase().includes('GARAGE'));
            if (garageRow) {
                const cells = garageRow.querySelectorAll('td.value');
                if (cells[0]) cells[0].innerText = getRadioVal('real_garage') === "yes" ? getVal('num_spaces') : "No";
                if (cells[1]) cells[1].innerText = getRadioVal('real_garage') === "yes" ? getCheckboxWithOther('garage_type[]') : "";
            }
            
            // Property Features (Yes/No)
            const pFeatArr = Array.from(document.querySelectorAll('input[name="property_features[]"]:checked')).map(el => el.value);
            updateTableByLabel(propertyTable, "Pool", pFeatArr.includes('pool') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "Hot Tub", pFeatArr.includes('hot_tub') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "Pond", pFeatArr.includes('pond') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "River", pFeatArr.includes('river') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "Trails on Property", pFeatArr.includes('trails') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "Trail Access", pFeatArr.includes('trail_access') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "Hay Fields", pFeatArr.includes('hay_fields') ? "Yes" : "No");
            updateTableByLabel(propertyTable, "Extra Housing", pFeatArr.includes('extra_housing') ? "Yes" : "No");
        }

        // === 5. TEXT AREAS (Summernote) ===
        const detailParagraphs = overlay.querySelectorAll('.view_detail_page .border_box_one p');
        if (detailParagraphs[0]) {
            const overviewHTML = $('textarea[name="property_overview"]').summernote('code');
            const isEmpty = $(overviewHTML).text().trim() === "" && overviewHTML.indexOf('<img') === -1;
            detailParagraphs[0].innerHTML = !isEmpty ? overviewHTML : "No overview provided.";
        }
        if (detailParagraphs[1]) {
            const writeupHTML = $('textarea[name="ad_write_up"]').summernote('code');
            const isEmptyWriteup = $(writeupHTML).text().trim() === "" && writeupHTML.indexOf('<img') === -1;
            detailParagraphs[1].innerHTML = !isEmptyWriteup ? writeupHTML : "No additional information.";
        }

        // === 6. IMAGE HANDLING ===
        const mainSwiperWrapper = overlay.querySelector('.horse_swiper_one .swiper-wrapper');
        const gridWrapper = overlay.querySelector('.image-grid');
        const featuredFile = document.querySelector('input[name="featured_image"]').files[0];
        const galleryFiles = document.querySelector('input[name="gallery_imgs[]"]').files;
        
        mainSwiperWrapper.innerHTML = '';
        if (featuredFile) {
            const readerF = new FileReader();
            readerF.onload = (e) => {
                mainSwiperWrapper.innerHTML = `<div class="swiper-slide"><img src="${e.target.result}" class="img-fluid w-100 img_radius_one"></div>`;
            };
            readerF.readAsDataURL(featuredFile);
        } else {
            mainSwiperWrapper.innerHTML = `<div class="swiper-slide"><img src="/assets/images/placeholder.png" class="img-fluid w-100 img_radius_one"></div>`;
        }
        
        gridWrapper.innerHTML = '';
        if (galleryFiles && galleryFiles.length > 0) {
            Array.from(galleryFiles).forEach((file) => {
                const readerG = new FileReader();
                readerG.onload = (e) => {
                    gridWrapper.insertAdjacentHTML('beforeend', `<a href="#!"><img src="${e.target.result}" alt="img"></a>`);
                };
                readerG.readAsDataURL(file);
            });
        } else {
            gridWrapper.innerHTML = `<a href="#!"><img src="/assets/images/placeholder.png" alt="img"></a>`;
        }

        // === 7. AGENT & SOCIAL ===
        const agentLoc = overlay.querySelector('.view_detail_page h3.heading44px:not(.about_horse_heading)');
        if (agentLoc) {
            const town = document.querySelector('input[name="real_title"]').value.trim();
            const fullLoc = document.querySelector('select[name="real_location"]').value;
            let abbrWithBrackets = "";
            if (fullLoc.includes('(') && fullLoc.includes(')')) {
                const matches = fullLoc.match(/\(([^)]+)\)/);
                if (matches) abbrWithBrackets = "" + matches[1].toUpperCase() + "";
            }
            if (town && abbrWithBrackets) {
                agentLoc.textContent = town + ", " + abbrWithBrackets;
            } else {
                agentLoc.textContent = town || abbrWithBrackets || "Location Info";
            }
        }
        const socialLinks = overlay.querySelectorAll('.social_icons a');
        if (socialLinks.length >= 5) {
            socialLinks[0].href = getVal('website_link') !== "N/A" ? "http://" + getVal('website_link') : "#";
            socialLinks[1].href = getVal('facebook') !== "N/A" ? "http://" + getVal('facebook') : "#";
        }

        // === 8. SELLER PHOTO ===
        const sellerInput = document.querySelector('input[name="per_pic[]"]') || document.querySelector('input[name="ser_profile"]');
        const sellerImgTarget = overlay.querySelector(".seller_img img") || overlay.querySelector(".seller_profile_img img");
        if (sellerInput && sellerInput.files && sellerInput.files[0] && sellerImgTarget) {
            const readerS = new FileReader();
            readerS.onload = (e) => { sellerImgTarget.src = e.target.result; };
            readerS.readAsDataURL(sellerInput.files[0]);
        } else if (sellerImgTarget) {
            sellerImgTarget.src = "/assets/images/placeholder.png";
        }

// === 9. DOCUMENTS PREVIEW (Fixed Logic for PDF/Word/Image) ===
const docFiles = document.querySelector('input[name="property_document[]"]').files;
const docThumbList = document.getElementById('doc_thumbnail_list');
const mainDocPreview = document.getElementById('main_doc_preview_area');

// Clear previous previews
if (docThumbList) docThumbList.innerHTML = '';
if (mainDocPreview) mainDocPreview.innerHTML = '<p class="text-muted">Click the icon to view</p>';

if (docFiles && docFiles.length > 0) {
    Array.from(docFiles).forEach((file, index) => {
        const reader = new FileReader();
        
        // Define onload handler BEFORE reading
        reader.onload = function(e) {
            let thumbHtml = '';
            let fileType = ''; 

            // 1. Determine File Type and Icon/Content
            if (file.type.match('image.*')) {
                fileType = 'image';
                thumbHtml = `<img src="${e.target.result}" alt="${file.name}" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">`;
            } else if (file.type === 'application/pdf') {
                fileType = 'pdf';
                // FontAwesome 6 PDF Icon
                thumbHtml = `<i class="fa-solid fa-file-pdf" style="font-size: 40px; color: #e74c3c;"></i>`;
            } else if (file.type.match(/word|msword|openxmlformats-officedocument.wordprocessingml.document/)) {
                fileType = 'doc';
                // FontAwesome 6 Word Icon
                thumbHtml = `<i class="fa-solid fa-file-word" style="font-size: 40px; color: #2b579a;"></i>`;
            } else {
                fileType = 'other';
                thumbHtml = `<i class="fa-solid fa-file" style="font-size: 40px; color: #777;"></i>`;
            }

            // 2. Create the u_box (Thumbnail)
            const uBox = document.createElement('div');
            uBox.className = 'u_box doc-preview-trigger';
            uBox.style.cursor = 'pointer';
            uBox.setAttribute('data-type', fileType);
            uBox.setAttribute('data-src', e.target.result); 
            uBox.setAttribute('data-name', file.name);
            uBox.innerHTML = thumbHtml;

            // 3. Add Click Event to Switch Main Preview
            uBox.addEventListener('click', function() {
                const type = this.getAttribute('data-type');
                const src = this.getAttribute('data-src');
                const name = this.getAttribute('data-name');

                // Highlight selected thumbnail
                document.querySelectorAll('.u_box').forEach(b => b.style.borderColor = '#b18d61');
                this.style.borderColor = '#000'; 

                if (type === 'image') {
                    mainDocPreview.innerHTML = `<img src="${src}" alt="${name}" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">`;
                } else if (type === 'pdf') {
                    // Embed PDF in iframe for preview
                    mainDocPreview.innerHTML = `<iframe src="${src}" width="100%" height="350px" style="border:none;"></iframe>`;
                } else if (type === 'doc') {
                    // Word files cannot be previewed directly in browser without conversion/API
                    // Show Icon + Download Button
                    mainDocPreview.innerHTML = `
                        <div class="text-center">
                            <i class="fa-solid fa-file-word" style="font-size: 80px; color: #2b579a; margin-bottom: 20px;"></i>
                            <h5>${name}</h5>
                            <p class="text-muted small">Preview not available for Word documents.</p>
                            <a href="${src}" download="${name}" class="btn btn-primary mt-2">
                                <i class="fa-solid fa-download"></i> Download Document
                            </a>
                        </div>
                    `;
                } else {
                    mainDocPreview.innerHTML = `<div class="text-center"><i class="fa-solid fa-file" style="font-size: 80px;"></i><p>${name}</p></div>`;
                }
            });

            // 4. Append thumbnail to list
            if (docThumbList) {
                docThumbList.appendChild(uBox);
                
                // Automatically click the first item to show initial preview
                if (index === 0) {
                    uBox.click();
                }
            }
        };

        // Read file as Data URL (Base64) for preview
        // This handles Image, PDF, and Word files
        if (file.type.match('image.*') || file.type === 'application/pdf' || file.type.match(/word/)) {
            reader.readAsDataURL(file);
        } else {
            // For other files, just trigger onload with empty result to show icon
            reader.onload({ target: { result: null } });
        }
    });
} else {
    if (docThumbList) docThumbList.innerHTML = '<p class="small text-muted p-2">No docs uploaded</p>';
}

       // === 10. VIDEO PREVIEW (Dynamic Thumbnails & Player) ===
            const videoContainer = document.getElementById('video_thumbnails_container');
            const mainPlayer = document.getElementById('mainPlayer');
            const videoInputs = document.querySelectorAll('input[name="video_url[]"]');
            const videoSection = document.querySelector('.video_preview_section');
            
            if (videoContainer && mainPlayer) {
                videoContainer.innerHTML = '';
                let hasVideo = false;
                let firstVideoId = '';
            
                // Pehle saare URLs process karein
                videoInputs.forEach((input, index) => {
                    let url = input.value.trim();
                    if (url !== "") {
                        let videoId = "";
                        // YouTube ID Extract Logic
                        if (url.includes('v=')) videoId = url.split('v=')[1].split('&')[0];
                        else if (url.includes('youtu.be/')) videoId = url.split('youtu.be/')[1].split('?')[0];
                        else if (url.includes('embed/')) videoId = url.split('embed/')[1].split('?')[0];
                        
                        if (videoId) {
                            hasVideo = true;
                            if (index === 0) firstVideoId = videoId; // Pehli video ID save karein
            
                            // Create Thumbnail Container
                            const thumbCol = document.createElement('div');
                            thumbCol.className = 'vid_col';
                            thumbCol.style.flex = '0 0 calc((100% - 40px) / 5)'; // 5 items per row approx
                            thumbCol.style.marginBottom = '10px';
            
                            thumbCol.innerHTML = `
                                <div class="thumbnail_container"
                                     style="cursor: pointer; position: relative; border-radius: 8px; overflow: hidden;"
                                     onclick="changeVideo('${videoId}')">
                                    
                                    <!-- Play Button Overlay -->
                                    <div class="play_overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2; pointer-events: none;">
                                        <i class="fa fa-play-circle" style="font-size: 40px; color: white; opacity: 0.9; text-shadow: 0 0 5px rgba(0,0,0,0.5);"></i>
                                    </div>
                                    
                                    <!-- Thumbnail Image -->
                                    <img src="https://img.youtube.com/vi/${videoId}/mqdefault.jpg"
                                         class="img-fluid rounded shadow-sm"
                                         alt="Video Thumbnail"
                                         style="width: 100%; display: block; transition: transform 0.3s;">
                                </div>
                            `;
                            
                            // Hover effect add karein
                            thumbCol.querySelector('.thumbnail_container').addEventListener('mouseenter', function() {
                                this.querySelector('img').style.transform = 'scale(1.05)';
                            });
                            thumbCol.querySelector('.thumbnail_container').addEventListener('mouseleave', function() {
                                this.querySelector('img').style.transform = 'scale(1)';
                            });
            
                            videoContainer.appendChild(thumbCol);
                        }
                    }
                });
            
                // Agar videos hain, toh pehli video auto-load karein
                if (hasVideo) {
                    mainPlayer.src = `https://www.youtube.com/embed/${firstVideoId}`;
                    if (videoSection) videoSection.style.display = "block";
                } else {
                    if (videoSection) videoSection.style.display = "none";
                }
            }
            
            // Global Function to Change Video
            window.changeVideo = function(videoId) {
                const player = document.getElementById('mainPlayer');
                if (player) {
                    // Autoplay enable karne ke liye ?autoplay=1 add kiya hai
                    player.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                    
                    // Smooth scroll to player
                    window.scrollTo({
                        top: player.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            };

                    // Show Modal
            overlay.classList.add("is-visible");
            document.body.style.overflow = "hidden";
        });

        // Function to Close Modal
        const closeModal = () => {
            overlay.classList.remove("is-visible");
            document.body.style.overflow = "";
            
            // Optional: Reset video player when closing to stop audio
            const mainPlayer = document.getElementById('mainPlayer');
            if(mainPlayer) {
                mainPlayer.src = ""; 
            }
        };

        // 1. Close on 'X' Button Click
        closeBtn.addEventListener("click", closeModal);

        // 2. Close on Outside Click (Overlay Background)
        overlay.addEventListener("click", function(e) {
            // Agar click fsm-dialog (white box) ke ANDAR hua hai, toh kuch mat karo
            if (e.target.closest('.fsm-dialog')) {
                return;
            }
            // Agar click bahir (black background) par hua hai, toh close kardo
            closeModal();
        });

        // 3. Close on Escape Key Press
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape" && overlay.classList.contains("is-visible")) {
                closeModal();
            }
        });
});
</script>







<script>
   const fullText = "Your ad is being submitted.";
   const textElement = document.getElementById("text");
   const cursorElement = document.getElementById("cursor");
   
   let charIndex = 0;
   let isDeleting = false;
   let timeout;
   
   function typeWriter() {
     if (!isDeleting) {
       // Typing
       textElement.textContent = fullText.substring(0, charIndex + 1);
       charIndex++;
   
       if (charIndex === fullText.length) {
         // Finished typing â†’ pause then start deleting
         isDeleting = true;
         timeout = setTimeout(typeWriter, 1800);
         return;
       }
       timeout = setTimeout(typeWriter, 60);
     } 
     else {
       // Deleting
       textElement.textContent = fullText.substring(0, charIndex - 1);
       charIndex--;
   
       if (charIndex === 0) {
         // Finished deleting â†’ pause then start typing again
         isDeleting = false;
         timeout = setTimeout(typeWriter, 600);
         return;
       }
       timeout = setTimeout(typeWriter, 35);
     }
   }
   
   // Start the effect
   window.onload = function() {
     typeWriter();
   };
</script>
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
   
   jQuery(document).ready(function () {
        ImgUpload();
    });
    
    function ImgUpload() {
    $('.upload__box').each(function () {
        let $box = $(this);
        $box.data('files', []);

        $box.find('.upload__inputfile').on('change', function (e) {
            let imgWrap = $box.find('.upload__img-wrap');
            let imgArray = $box.data('files');
            let maxLength = $(this).attr('data-max_length') || 10;
            let files = e.target.files;
            let filesArr = Array.prototype.slice.call(files);

            filesArr.forEach(function (f) {
                if (!f.type.match('image.*') && 
                    !f.type.match('application/pdf') && 
                    !f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document') && 
                    !f.type.match('video.*')) {
                    return;
                }

                if (imgArray.length >= maxLength) return;

                imgArray.push(f);

                let reader = new FileReader();
                reader.onload = function (e) {
                    let iconClass = "";
                    let iconContent = "";
                    let style = "";

                    if (f.type.match('image.*')) {
                        iconClass = "img-bg";
                        style = `background-image: url(${e.target.result})`;
                    } else if (f.type.match('application/pdf')) {
                        iconClass = "pdf-icon";
                        iconContent = '<i class="fa-solid fa-file-pdf"></i>'; // Font Awesome PDF Icon
                    } else if (f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document')) {
                        iconClass = "docx-icon";
                        iconContent = '<i class="fa-solid fa-file-word"></i>'; // Font Awesome Word Icon
                    } else if (f.type.match('video.*')) {
                        iconClass = "video-icon";
                        iconContent = '<i class="fa-solid fa-file-video"></i>'; // Font Awesome Video Icon
                    }

                    let html = `
                        <div class='upload__img-box'>
                            <div class='${iconClass}' style='${style}' data-file='${f.name}'>
                                ${iconContent ? `<div class='file-icon-text'>${iconContent}</div>` : ""}
                                <div class='upload__img-close'></div>
                            </div>
                        </div>
                    `;
                    imgWrap.append(html);
                };

                if (f.type.match('image.*')) {
                    reader.readAsDataURL(f);
                } else {
                    reader.onload();
                }
            });

            $box.data('files', imgArray);
        });
    });

    // âœ… FIXED DELETE LOGIC: Yeh UI, Array aur Input Field teeno ko sync rakhega
    $('body').on('click', ".upload__img-close", function () {
        let $box = $(this).closest('.upload__box');
        let imgArray = $box.data('files');
        let fileName = $(this).parent().data("file");

        // 1. Array se file nikaalein
        imgArray = imgArray.filter(f => f.name !== fileName);
        $box.data('files', imgArray);

        // 2. Input Field (files list) ko update karein
        let input = $box.find('.upload__inputfile')[0];
        let dataTransfer = new DataTransfer();
        
        imgArray.forEach(file => {
            dataTransfer.items.add(file);
        });
        
        input.files = dataTransfer.files; // Yeh line actual input files ko update kar degi

        // 3. UI se remove karein
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
   
       if (inputs.length >= 5) {
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
       
       function toggleHiddenBoxTen() {
           if ($('#have_stall_yes').is(':checked')) {
               $('.have_stall_box').show();
           } else {
               $('.have_stall_box').hide();
           }
       }
       
       function toggleHiddenBoxEleven() {
           if ($('#have_barn_yes').is(':checked')) {
               $('.have_barn_box').show();
           } else {
               $('.have_barn_box').hide();
           }
       }
       
       function toggleHiddenBoxTwelve() {
           if ($('#run_shed_yes').is(':checked')) {
               $('.run_shed_box').show();
           } else {
               $('.run_shed_box').hide();
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
       toggleHiddenBoxTen();
       toggleHiddenBoxEleven();
       toggleHiddenBoxTwelve();
   
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
       $('input[name="have_stall"]').on('change', toggleHiddenBoxTen);
       $('input[name="have_barn"]').on('change', toggleHiddenBoxEleven);
       $('input[name="run_shed"]').on('change', toggleHiddenBoxTwelve);
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
<script>
   document.addEventListener("DOMContentLoaded", function() {
       const form = document.getElementById("myForm");
       const preloader = document.getElementById("preloader");
       const whitebox = document.getElementById("w_box");
   
       if (form && preloader) {
           form.addEventListener("submit", function(e) {
               if (form.checkValidity()) {
                   preloader.style.display = "flex";
           
                   // Force reflow (important)
                   preloader.offsetHeight;
           
                   // Thoda delay do taake animation chale
                   setTimeout(() => {
                       preloader.style.opacity = "1";
                       preloader.classList.remove("preloader-hide");
                       whitebox.classList.add("scale");
                   }, 50);
           
                   const submitBtn = form.querySelector('button[type="submit"]');
                   if (submitBtn) {
                       submitBtn.disabled = true;
                       submitBtn.innerHTML = "Processing...";
                   }
               }
           });
       }
   });
</script>
@endsection