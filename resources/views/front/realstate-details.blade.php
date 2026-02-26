@extends('layouts.app') @section('content')
<style>
   .container {
   max-width: 1340px;
   }
   .view_detail_page {
   font-family: "AvenirNextLTPro-Regular";
   }
   ul#pills-tab {
   margin: auto;
   display: flex;
   margin-bottom: 0px !important;
   justify-content: center;
   margin-bottom: 18px !important;
   gap: 14px;
   }
   ul#pills-tab li button {
   border-radius: 5px !important;
   color: #1d2139;
   font-weight: 500;
   text-transform: capitalize;
   padding: 10px 0px;
   font-weight: 500;
   font-size: 10px;
   border: 2px solid #e1cfcf;
   margin: 0;
   padding: 0px 20px;
   height: 40px;
   }
   .heading44px {
   font-size: 45px;
   }
   .view_detail_page {
   padding: 10px 0px 100px 0px;
   }
   .horse_name_bar {
   height: 60px;
   }
   .horse_name_bar .heading44px {
   font-family: "AvenirNextLTPro-Bold";
   text-transform: uppercase;
   margin-bottom: 0;
   }
   .countdown .heading18px {
   font-size: 16px;
   padding: 20px 20px;
   background: #BF9855;
   background: linear-gradient(180deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   border-radius: 8px;
   }
   .horse_name_bar p span {
   font-weight: 700;
   color: #1d2139;
   font-size: 14px;
   padding: 22px 20px;
   background: #BF9855;
   background: linear-gradient(180deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   border-radius: 8px;
   }
   .heading18px strong {
   font-family: "AvenirNextLTPro-Bold";
   }
   .img_radius {
   border-radius: 15px;
   overflow: hidden;
   height: 750px;
   object-fit: cover;
   }
   .img_radius_one {
   border-radius: 0px;
   overflow: hidden;
   height: 585px;
   object-fit: cover;
   }
   .img_radius_two {
   border-radius: 0px;
   overflow: hidden;
   height: 645px;
   object-fit: cover;
   }
   .relative_img_box {
   position: relative;
   height: 260px;
   overflow: hidden;
   }
   .relative_img_box img {
   object-fit: cover;
   object-position: center;
   height: 100%;
   }
   .blue_stripe_one {
   padding: 10px 10px;
   background: #1c2037;
   display: flex;
   justify-content: space-between;
   align-items: center;
   }
   .blue_stripe_one h4 {
   font-size: 30px;
   font-family: "AvenirNextLTPro-Regular";
   padding: 12px 60px;
   background: #BF9855;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   width: 280px;
   text-transform: uppercase;
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   margin: 0;
   }
   .blue_stripe_one h3 {
   font-family: "AvenirNextLTPro-Bold";
   color: white;
   }
   .horser_share_btn_flex {
   display: flex;
   gap: 15px;
   }
   .horse_info_btn,
   .horse_info_btn:focus {
   width: 50%;
   height: 50px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #fff;
   font-size: 16px;
   color: #fff;
   transition: all 0.25s;
   }
   .horse_info_btn:hover {
   background: #1d2139;
   color: #fff;
   }
   .horser_information_box {
   background: #1d2139;
   padding: 32px;
   border-radius: 0px;
   height: 285px;
   }
   /* .horser_information_box_one  .horser_action_info_btn,
   .horser_information_box_one  .horser_action_info_btn:focus,
   .horser_information_box_one  .fvrt_btn {
   width: 30%;
   font-size: 12px;
   } */
   .horser_information_box.horser_information_box_one,
   .img_radius_ext {
   height: 340px;
   }
   .horser_information_box .heading44px {
   text-align: center;
   text-transform: uppercase;
   }
   .horse_info_btn.fvrt_btn:hover,
   .horse_info_btn.fvrt_btn:focus {
   background: #ab8d35;
   color: #fff;
   border-color: #ab8d35;
   }
   .horser_information_box .heading44px,
   .horser_information_box .heading30px {
   font-family: "AvenirNextLTPro-Bold";
   color: white;
   }
   .horser_information_box ul {
   margin-bottom: 40px;
   }
   .horser_information_box ul li {
   text-transform: uppercase;
   color: white;
   margin-bottom: 30px;
   font-size: 18px;
   list-style: none;
   }
   .price_Text {
   /* font-family: "AvenirLTStd-Book"; */
   font-size: 40px;
   margin: 0;
   background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 700;
   text-align: center;
   padding: 50px 0px 10px 0px;
   }
   .view_detail_page .nav-pills .nav-link {
   background: 0 0;
   border-radius: 0 !important;
   width: 100%;
   height: 45px;
   border: 4px solid #1d2139;
   font-size: 16px;
   color: #1d2139;
   }
   .view_detail_page .nav-pills .nav-link.active,
   .view_detail_page .nav-pills .show>.nav-link {
   color: #fff !important;
   background-color: #1d2139 !important;
   border-color: #b18d61;
   transform: translateX(5px)
   }
   .image-grid {
   display: grid;
   grid-template-columns: repeat(3, 1fr);
   gap: 15px;
   }
   .image-grid img {
   width: 100%;
   height: 220px;
   object-fit: cover;
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
   width: 90px;
   height: 90px;
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
   .view_detail_page .heading65px h1 {
   font-family: "AvenirLTStd-Book";
   font-size: 40px;
   margin: 0;
   background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   }
   .view_detail_page .heading65px img {
   position: absolute;
   top: 40%;
   transform: translateY(-50%);
   left: 20px;
   max-width: 70px;
   }
   .border_box_one {
   border: 3px solid #1d2139;
   padding: 20px;
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
   font-size: 18px;
   color: #1d2139;
   list-style: none;
   display: flex;
   align-items: center;
   /* margin: 5px; */
   font-family: "AvenirLTStd-Medium";
   padding: 20px 50px;
   border: 2px solid #1d2139;
   width: 300px;
   }
   .border_box_one ul li:last-child {
   margin: 0;
   }
   .border_box_one ul li span img {
   max-width: 35px;
   }
   .ppe_xray_box {
   text-align: center;
   max-width: 440px;
   margin: 0 auto;
   }
   .pedigree_box {
   display: flex;
   align-items: center;
   border: 1px solid #000;
   }
   .pedigree_box_1 {
   width: 25%;
   height: 300px;
   border: 1px solid #000;
   }
   .pedigree_box_2 {
   width: 100%;
   height: 150px;
   }
   .border_btm {
   border-bottom: 2px solid #000;
   }
   .pedigree_box_3 {
   width: 100%;
   height: 75px;
   }
   .pedigree_box_4 {
   width: 100%;
   height: 37.5px;
   }
   .xy_center {
   display: flex;
   justify-content: center;
   align-items: center;
   }
   .pedigree_box p {
   margin: 0;
   }
   .colord_box {
   background: #e4dfdf;
   }
   .border_box_one iframe {
   width: 100%;
   height: 450px;
   }
   .view_detail_page .product_clm .pro_img {
   margin-bottom: 0px;
   border-bottom: none;
   }
   .seller_tab .horse_info_btn {
   max-width: 300px;
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
   .social_icons {
   display: flex;
   align-items: center;
   gap: 10px;
   }
   .social_icons a {
   width: 45px;
   height: 45px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 1px solid #1d2139;
   border-radius: 100%;
   }
   .social_icons a img {
   max-width: 25px;
   }
   .social_icons a:active {
   background: #ccc;
   }
   .seller_action_btn_flex a {
   box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
   }
   .seller_action_btn_flex a:first-child {
   background: #1d2139;
   color: #fff;
   border-color: #b18d61;
   }
   .view_detail_page .horse_list_card .img_box {
   height: 210px;
   }
   .view_detail_page .horse_list_card .horse_card_btn {
   font-size: 11px;
   }
   .view_detail_page .horse_list_card .fvrt_btn {
   font-size: 11px;
   }
   .horser_information_btn_flex {
   display: flex;
   align-items: center;
   gap: 10px;
   justify-content: center;
   margin-top: 45px;
   }
   .horser_action_info_btn,
   .horser_action_info_btn:focus {
   width: 48%;
   height: 50px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #fff;
   font-size: 16px;
   color: #fff;
   transition: all 0.25s;
   }
   .horser_action_info_btn:hover {
   background: #fff;
   color: #1d2139;
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
   .videoplay_box img {
   height: 500px;
   object-fit: cover;
   }
   .note {
   font-size: 10px;
   }
   .sold_box {
   position: relative;
   overflow: hidden;
   }
   .sold_abs_box {
   position: absolute;
   top: 45%;
   left: 50%;
   transform: translate(-50%, -50%);
   text-align: center;
   padding: 30px 20px;
   z-index: 999;
   }
   .bottom_text {
   background: #1d2139;
   position: absolute;
   bottom: 0;
   left: 0;
   }
   .sold_abs_box h1 {
   font-family: var(--pp_mori_semi);
   font-size: 85px;
   margin: 0;
   background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   -webkit-text-stroke: 2px white;
   /* <-- this adds the white outline */
   transform: rotate(-20deg);
   position: relative;
   text-transform: uppercase;
   }
   /* Add white outline using a pseudo-element */
   .sold_abs_box h1::before {
   content: attr(data-text);
   position: absolute;
   top: 0;
   left: 0;
   z-index: -1;
   font-family: "AvenirNextLTPro-Bold";
   font-size: 240px;
   font-weight: 700;
   transform: rotate(0deg);
   color: white;
   -webkit-text-stroke: 2px white;
   z-index: 0;
   }
   .bottom_text {
   background: #1d2139;
   position: absolute;
   bottom: 0;
   left: 0;
   width: 100%;
   text-align: center;
   padding: 20px 1px;
   }
   .bottom_text h2 {
   margin: 0;
   font-family: "AvenirNextLTPro-Regular";
   text-transform: uppercase;
   font-size: 25px;
   font-weight: 400;
   }
   .chat_btn {
   max-width: 300px;
   margin: 0 auto;
   }
   .blank_box {
   height: 500px;
   display: flex;
   justify-content: center;
   align-items: center;
   flex-flow: column;
   }
   .text_border {
   font-size: 60px;
   text-shadow:
   -1px 0 0 #ba9148,
   1px 0 0 #ba9148,
   0 -1px 0 #ba9148,
   0 1px 0 #ba9148,
   -1px -1px 0 #ba9148,
   1px -1px 0 #ba9148,
   -1px 1px 0 #ba9148,
   1px 1px 0 #ba9148;
   }
   .horser_information_box .info_list_one li {
   color: #fff;
   font-style: italic;
   font-family: "AvenirNextLTPro-Bold";
   }
   .horser_information_box .info_list_one li span {
   font-family: "AvenirNextLTPro-Regular";
   margin-left: 6px;
   font-style: normal;
   text-transform: capitalize;
   }
   .horser_information_box .info_list_two li {
   color: #fff;
   }
   .gen_list_flex_one {
   max-width: 100%;
   }
   .border_box_one .gen_list_flex_one li {
   font-size: 18px;
   color: #1d2139;
   list-style: none;
   display: flex;
   align-items: center;
   /* margin: 5px; */
   font-family: "AvenirLTStd-Medium";
   padding: 20px 21px;
   border: 2px solid #1d2139;
   width: 409px;
   }
   .h_tages {
   display: flex;
   align-items: center;
   gap: 10px;
   justify-content: center;
   }
   .h_tages p,
   .h_tages span {
   font-family: "AvenirNextLTPro-Regular";
   font-size: 18px;
   color: #fff;
   margin: 0;
   }
   .auction_btn,
   .auction_btn::focus {
   width: 100%;
   max-width: 200px;
   }
   .common_btn {
   border-color: #1d2139;
   color: #1d2139;
   font-family: "AvenirNextLTPro-Bold";
   }
   .horser_action_info_btn.action_btn,
   .horse_info_btn.fvrt_btn.action_btn {
   width: 33.33%;
   }
   .new_btn_flex {
   width: 280px;
   }
   .new_btn_flex .horser_action_info_btn,
   .new_btn_flex .fvrt_btn {
   width: 100% !important;
   }
   .seller_top_bar {
   width: 100%;
   background: #1C2039;
   display: flex;
   align-items: center;
   justify-content: space-between;
   padding: 10px 140px;
   position: relative;
   }
   .seller_top_bar .lgo_box {
   width: 170px;
   }
   .seller_top_bar img {
   max-width: 80px;
   }
   .seller_top_bar h1 {
   font-family: var(--pp_mori_reg);
   font-size: 44px;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   margin: 0;
   position: absolute;
   top: 50%;
   transform: translate(-50%, -50%);
   left: 50%;
   }
   .seller_chat_btn {
   font-family: var(--pp_mori_reg);
   width: fit-content;
   height: 50px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #fff;
   font-size: 14px;
   color: #fff;
   transition: all 0.25s;
   padding: 0px 20px;
   }
   .seller_chat_btn:hover {
   background: var(--white);
   color: #1C2039;
   }
   .seller_content_wrapper {
   padding: 20px 140px;
   }
   .seller_profile_img img {
   width: 100%;
   height: 310px;
   object-fit: cover;
   object-position: center;
   }
   .seller_profile_text_box {
   width: 100%;
   height: 310px;
   display: flex;
   justify-content: center;
   align-items: center;
   flex-direction: column;
   border: 2px solid #000;
   padding-left: 90px;
   position: relative;
   }
   .box_title {
   width: 90px;
   height: 100%;
   background: #1C2039;
   display: flex;
   justify-content: center;
   align-items: center;
   position: absolute;
   top: 0;
   left: 0;
   }
   .box_title h2 {
   font-family: var(--pp_mori_reg);
   font-size: 32px;
   background: var(--Linear, linear-gradient(to right, #FAF8F4 35.48%, #B09240 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   margin: 0;
   writing-mode: sideways-lr;
   text-transform: uppercase;
   }
   .seller_profile_text_box h1 {
   font-family: var(--pp_mori_reg);
   font-size: 30px;
   color: #1C2039;
   padding: 0px 0px 10px 0px;
   border-bottom: 1px solid #1c2039;
   margin-bottom: 12px;
   }
   .seller_profile_text_box p {
   font-family: var(--pp_mori_reg);
   font-size: 20px;
   color: #1C2039;
   margin: 0px 0px 10px 0px
   }
   .seller_tabs {
   justify-content: space-between;
   }
   .seller_tabs .nav-link {
   width: 19.5% !important;
   font-family: var(--pp_mori_semi);
   font-size: 16px !important;
   text-transform: uppercase;
   border-width: 2px !important;
   }
   .seller_tabs .nav-link.active span {
   text-transform: uppercase;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   }
   .seller_tabs .nav-link.active {
   border-color: #1d2139 !important;
   transform: translateX(0px) !important;
   }
   .about_text_box {
   padding: 57px 30px;
   border: 2px solid #000;
   }
   .about_text_box h3 {
   font-family: var(--pp_mori_semi);
   font-size: 44px !important;
   text-transform: uppercase;
   color: #1C2039;
   }
   .about_text_box p {
   font-family: var(--pp_mori_reg);
   font-size: 16px !important;
   text-transform: uppercase;
   color: #1C2039;
   }
.side_box_one {
    border: 2px solid #000;
    width: 100%;
    display: flex;
    flex-direction: column;
    padding: 0px 10px 0px 90px;
    position: relative;
    margin-bottom: 8px;
    height: 480px;
}
   .side_box_one ul li {
   display: flex;
   align-items: center;
   font-family: var(--pp_mori_reg);
   font-size: 16px !important;
   color: #000;
   margin: 10px 0px;
   }
   .side_box_one ul li span {
   max-width: 35px;
   }
   .side_box_one ul li a {
   font-weight: 700;
   }
   .side_box_one .box_title {
   width: 75px;
   }
   .side_box_one .box_title h2 {
   font-size: 23px;
   }
   .seller_detail_card .card_title {
   width: 100%;
   padding: 15px;
   background: #1c2039;
   text-align: center;
   }
   .seller_detail_card .card_title h3 {
   font-family: var(--pp_mori_semi);
   font-size: 30px !important;
   text-transform: uppercase;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   margin: 0;
   }
   .horse_arrow {
   background: transparent;
   border: 0;
   font-size: 30px;
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   z-index: 9999;
   width: 30px;
   height: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   color: #fff;
   }
   .horse_arrow.right {
   right: 10px;
   }
   .horse_arrow.left {
   left: 10px;
   }
   .horse_swiper_one {
   height: 100%;
   }
   .horse_swiper_one .swiper-pagination-bullet {
   width: 11px;
   height: 11px;
   display: inline-block;
   border-radius: var(--swiper-pagination-bullet-border-radius, 50%);
   background: #fff;
   opacity: 1;
   }
   .horse_swiper_one .swiper-pagination-bullet-active {
   opacity: 1;
   background: #1d2139;
   transform: scale(1.3);
   border: 1px solid #fff;
   }
   .relative_img_box h3 {
   font-size: 17px;
   font-family: var(--pp_mori_semi);
   padding: 6px 36px;
   background: #bf9855;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   position: absolute;
   top: 0;
   left: 0;
   width: fit-content;
   text-transform: uppercase;
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   border-radius: 0;
   z-index: 999;
   }
   .middle_info_box {
   display: flex;
   gap: 5px;
   justify-content: space-between;
   margin: 12px 0px 0px 0px;
   }
   .middle_info_box ul li {
   font-family: var(--pp_mori_semi);
   text-transform: uppercase;
   color: #1c2039;
   margin-bottom: 10px;
   font-size: 11.9px;
   list-style: none;
   border: 2px solid #1d2139;
   padding: 8px;
   text-align: center;
   }
   .middle_info_box .info_list_one {
   width: 49%;
   }
   .bottom_info_box {
   width: 100%;
   padding: 15px;
   background: #1c2039;
   }
   .info_price {
   font-family: var(--pp_mori_reg);
   font-size: 26px;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   margin: 0;
   text-align: center;
   margin-bottom: 10px;
   }
   .info_action_btns_flex {
   list-style: none;
   display: flex;
   align-items: center;
   justify-content: center;
   gap: 8px;
   margin-top: 20px;
   }
   .info_action_btns_flex a {
   width: 110px;
   height: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #fff;
   font-size: 12px;
   font-family: var(--pp_mori_reg);
   color: #fff;
   transition: all 0.25s;
   text-transform: uppercase;
   }
   .info_action_btns_flex a:hover {
   background: #fff;
   color: #1d2139;
   }
   @media only screen and (max-width: 1799px) {
   .seller_content_wrapper {
   padding: 20px 30px;
   }
   .seller_top_bar {
   padding: 10px 30px;
   }
   .relative_img_box {
   height: 210px;
   }
   .middle_info_box ul li {
   font-size: 10px;
   padding: 8px 0px;
   }
   .side_box_one ul li {
   font-size: 15px !important;
   }
   /* .side_box_one {
   padding: 20px 20px 20.8px 85px;
   margin-bottom: 23px;
   } */
   .side_box_one {
   padding: 0px 10px 0px 70px;
   }
   .side_box_one .box_title {
   width: 55px;
   }
   .side_box_one .box_title h2 {
   font-size: 20px;
   }
   .countdown {
   transform: scale(0.9);
   }
   .about_text_box p {
   font-size: 14px !important;
   }
   .seller_tabs .nav-link {
   font-size: 16px !important;
   }
   .box_title {
   width: 60px;
   }
   .seller_profile_text_box {
   padding-left: 60px;
   }
   .info_action_btns_flex a {
   width: 85px;
   font-size: 10px;
   }
   .seller_profile_text_box,
   .seller_profile_img img {
   height: 360px;
   }
   .seller_profile_text_box p {
   font-size: 18px;
   margin: 0px 0px 7px 0px;
   }
   }
</style>
<style>
   .profile_tabs__one {
   margin: 0 auto;
   padding: 20px;
   background-color: #fff;
   border: 2px solid #1c2039;
   }
   .profile_tabs__one .experience-section {
   display: flex;
   justify-content: space-between;
   align-items: center;
   margin-bottom: 30px;
   padding: 15px 0;
   border-bottom: 2px solid #e0e0e0;
   }
   .profile_tabs__one .experience-item {
   text-align: center;
   }
   .profile_tabs__one .experience-label {
   font-weight: bold;
   font-size: 14px;
   color: #1d2139;
   margin-bottom: 5px;
   text-transform: uppercase;
   }
   .profile_tabs__one .experience-value {
   font-size: 16px;
   font-weight: bold;
   color: #444;
   }
   .profile_tabs__one .languages {
   font-size: 14px;
   color: #666;
   }
   .profile_tabs__one .about-section {
   max-height: 650px;
   overflow-y: auto;
   overflow-x: hidden;
   }
   .profile_tabs__one .about-title {
   font-size: 30px;
   font-weight: 700;
   color: #1d2139;
   margin-bottom: 10px;
   text-transform: uppercase;
   }
   .profile_tabs__one .about-text {
   line-height: 1.6;
   color: #000;
   font-size: 16px;
   text-align: justify;
   margin-bottom: 15px;
   }
   .profile_tabs__one .about-text ul li {
   font-weight: 700;
   }
   .profile_tabs__one .certifications-section {
   margin-top: 40px;
   }
   .profile_tabs__one .certifications-title {
   text-align: center;
   font-size: 20px;
   font-weight: bold;
   color: #1d2139;
   margin-bottom: 30px;
   text-transform: uppercase;
   letter-spacing: 1px;
   }
   .profile_tabs__one .certificates-grid {
   display: flex;
   justify-content: center;
   gap: 20px;
   flex-wrap: wrap;
   }
   .profile_tabs__one .certificate-item {
   flex: 1;
   max-width: 250px;
   transition: transform 0.3s ease;
   }
   .profile_tabs__one .certificate-item img {
   width: 100%;
   }
   .profile_tabs__one .certificate-item:hover {
   transform: translateY(-5px);
   }
   .profile_tabs__one .certificate-header {
   background-color: rgba(255, 255, 255, 0.9);
   padding: 10px;
   border-radius: 5px;
   margin-bottom: 15px;
   }
   .profile_tabs__one .certificate-title {
   font-weight: bold;
   color: #1d2139;
   font-size: 16px;
   margin-bottom: 5px;
   }
   .profile_tabs__one .certificate-subtitle {
   font-size: 12px;
   color: #666;
   }
   .profile_tabs__one .certificate-body {
   color: white;
   font-size: 14px;
   }
   .profile_tabs__one .certificate-name {
   font-weight: bold;
   margin-bottom: 5px;
   }
   .profile_tabs__one .certificate-details {
   font-size: 12px;
   opacity: 0.9;
   }
   .address_tabs_sec {
   display: flex;
   flex-wrap: wrap;
   justify-content: space-between;
   max-width: 100%;
   padding: 15px;
   gap: 20px;
   align-items: center;
   border: 2px solid #1d2139;
   }
   .address_tabs_sec .text-section {
   flex: 1;
   min-width: 250px;
   }
   .address_tabs_sec h2 {
   font-size: 30px;
   font-weight: 700;
   color: #1d2139;
   margin-bottom: 20px;
   text-transform: uppercase;
   }
   .address_tabs_sec ul {
   list-style: none;
   padding: 0;
   margin: 0;
   }
   .address_tabs_sec ul li,
   .address_tabs_sec p {
   margin-bottom: 5px;
   color: #1d2139;
   font-size: 18px;
   }
   .address_tabs_sec .map-section {
   flex: 1;
   min-width: 300px;
   }
   .address_tabs_sec iframe {
   width: 100%;
   height: 350px;
   border: 0;
   border-radius: 6px;
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
   .side_box_one h5 {
   font-family: var(--pp_mori_reg);
   font-size: 30px;
   font-weight: 700;
   color: #1C2039;
   margin-bottom: 12px;
   text-align: center;
   }
   .side_box_one h6 {
   font-family: var(--pp_mori_reg);
   font-size: 20px;
   font-weight: 700;
   color: #1C2039;
   padding: 0px 0px 10px 0px;
   border-bottom: 1px solid #1c2039;
   text-align: center;
   }
   .side_box_one h4 {
   font-family: var(--pp_mori_reg);
   font-size: 18px;
   font-weight: 700;
   color: #1C2039;
   padding: 0px 0px 10px 0px;
   border-bottom: 1px solid #1c2039;
   text-align: center;
   }
   @media (max-width: 1799px) {
   /* .side_box_one {
   min-height: 617px;
   margin-bottom: 8px;
   } */
   }
   @media (max-width: 1399px) {
   .seller_tabs .nav-link {
   font-size: 15px !important;
   }
   }
   @media (max-width: 768px) {
   .profile_tabs__one .experience-section {
   flex-direction: column;
   gap: 15px;
   }
   .profile_tabs__one .certificates-grid {
   flex-direction: column;
   align-items: center;
   }
   .profile_tabs__one .certificate-item {
   max-width: 100%;
   }
   }
</style>
{{-- @dd($data) --}}
<section class="view_detail_page">
   <div class="container-fluid p-0">
      <div class="seller_top_bar">
         <div class="lgo_box">
            <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
         </div>
         <h1>{{ $data->real_title ?? 'kjashdkjaskdas' }}</h1>
         <a href="#!" class="seller_chat_btn">CHAT WITH Realstate PROVIDER</a>
      </div>
      <div class="seller_content_wrapper">
         <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
               <div class="row mb-2">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     @php
                     $images = json_decode($data->gallery_imgs, true);
                     @endphp
                     <div class="seller_profile_img">
                        @if (!empty($images) && isset($images[0]))
                        <img src="{{ asset('Gallery_imgs/' . $images[0]) }}" alt="img" class="img-fluid" />
                        @endif
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <div class="seller_profile_text_box text-center">
                        <div class="box_title">
                           <h2>
                           Contact
                           <h2>
                        </div>
                        {{-- 🔹 Basic Info Section --}}
                        <div class="text-section mt-4">
                           <h1>{{ $data->first_name }} {{ $data->last_name }}</h1>
                           <p>Cell: {{ $data->number ?? 'N/A' }}</p>
                           <p>Email: {{ $data->email ?? 'N/A' }}</p>
                           <p>Address: {{ $data->user_address ?? 'N/A' }}</p>
                           {{-- @if (!empty($data->website_link)) --}}
                           {{-- 
                           <p>Website: <a href="{{ $data->website_link }}" target="_blank">{{ $data->website_link }}</a></p>
                           --}}
                           {{-- @endif --}}
                        </div>
                        <div class="social_icons mt-4">
                           @if (!empty($data->facebook))
                           <a href="{{ $data->facebook }}" target="_blank" title="Facebook">
                           <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook" class="img-fluid" />
                           </a>
                           @endif
                           @if (!empty($data->youtube))
                           <a href="{{ $data->youtube }}" target="_blank" title="YouTube">
                           <img src="{{ asset('assets/images/youtube.png') }}" alt="YouTube" class="img-fluid" />
                           </a>
                           @endif
                           @if (!empty($data->tiktok))
                           <a href="{{ $data->tiktok }}" target="_blank" title="TikTok">
                           <img src="{{ asset('assets/images/tik-tok.png') }}" alt="TikTok" class="img-fluid" />
                           </a>
                           @endif
                           @if (!empty($data->insta))
                           <a href="{{ $data->insta }}" target="_blank" title="Instagram">
                           <img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram" class="img-fluid" />
                           </a>
                           @endif
                           @if (!empty($data->zillow))
                           <a href="{{ $data->zillow }}" target="_blank" title="Zillow">
                           <img src="{{ asset('assets/images/website-icon-11.png') }}" alt="Zillow" class="img-fluid" />
                           </a>
                           @endif
                           {{-- @if (!empty($data->linkedin))
                           <a href="{{ $data->linkedin }}" target="_blank" title="LinkedIn">
                           <img src="{{ asset('assets/images/linkedin.png') }}" alt="LinkedIn" class="img-fluid" />
                           </a>
                           @endif --}}
                        </div>
                     </div>
                  </div>
               </div>
               <div class="nav nav-pills seller_tabs mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <button class="nav-link active" id="v_pills_seller_1-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_1" type="button" role="tab"
                     aria-controls="v_pills_seller_1" aria-selected="true">
                  <span>ABOUT</span>
                  </button>
                  <button class="nav-link" id="v_pills_seller_2-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_2" type="button" role="tab" aria-controls="v_pills_seller_2"
                     aria-selected="false">
                  <span>REALSTATE DETAILS</span>
                  </button>
                  <button class="nav-link" id="v_pills_seller_3-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_3" type="button" role="tab"
                     aria-controls="v_pills_seller_3" aria-selected="false">
                  <span>LOCATION DETAILS</span>
                  </button>
                  <button class="nav-link" id="v_pills_seller_4-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_4" type="button" role="tab"
                     aria-controls="v_pills_seller_4" aria-selected="false">
                  <span>PHOTOS</span>
                  </button>
                  <button class="nav-link" id="v_pills_seller_5-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_5" type="button" role="tab"
                     aria-controls="v_pills_seller_5" aria-selected="false">
                  <span>VIDEOS</span>
                  </button>
               </div>
               <div class="tab-content" id="seller_pills-tabContent">
                  <div class="tab-pane fade show active" id="v_pills_seller_1" role="tabpanel" aria-labelledby="v_pills_seller_1-tab">
                     <div class="profile_tabs__one">
                        <!-- Experience Section -->
                        {{-- 
                        <div class="experience-section">
                           <div class="experience-item">
                              <div class="experience-label">EXPERIENCE</div>
                              <div class="experience-value">{{ $data->experience }} Years</div>
                           </div>
                           <div class="experience-item">
                              <div class="experience-label">LANGUAGES SPOKEN</div>
                              <div class="languages">
                                 @foreach (explode(',', $data->Languages) as $item)
                                 {{ $item }} |
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        --}}
                        <!-- About Section -->
                        <div class="about-section">
                           <h2 class="about-title">ABOUT:</h2>
                           <div class="about-text">
                              {{-- {{ $data->per_bio }} --}}
                              <div class="row">
                                <div class="col-6">
                                    <p><strong>Barn Flooring:</strong> {{ $data->barn_flooring ?? 'N/A' }}</p>
                                    <p><strong>Rubber Matts:</strong> {{ $data->rubber_matts ?? 'N/A' }}</p>
                                    <p><strong>Tack Room:</strong> {{ $data->tack_room ?? 'N/A' }}</p>
                                    <p><strong>Heated:</strong> {{ $data->heated_not ?? 'N/A' }}</p>
                                    <p><strong>Wash Stall:</strong> {{ $data->wash_stall ?? 'N/A' }}</p>
                                    <p><strong>Hot Water:</strong> {{ $data->hot_water ?? 'N/A' }}</p>
                                    <p><strong>Cold Water:</strong> {{ $data->cold_water ?? 'N/A' }}</p>
                                    <p><strong>Heated Barn:</strong> {{ $data->heated_barn ?? 'N/A' }}</p>
                                    
                                </div>
                                <div class="col-6">
                                <p><strong>Air Condition Barn:</strong> {{ $data->air_condition_barn ?? 'N/A' }}</p>
                                    <p><strong>Dry Lots:</strong> {{ $data->dry_lots ?? 'N/A' }}</p>
                                    <p><strong>No. of Dry Lots:</strong> {{ $data->num_lots ?? 'N/A' }}</p>
                                    <p><strong>Fenced Grass:</strong> {{ $data->fenced_grass ?? 'N/A' }}</p>
                                    <p><strong>No. of Fenced Grass:</strong> {{ $data->num_fenced_grass ?? 'N/A' }}</p>
                                    <p><strong>Outdoor Riding Ring:</strong> {{ $data->out_ride_ring ?? 'N/A' }}</p>
                                    <p><strong>Indoor Riding Ring:</strong> {{ $data->in_ride_ring ?? 'N/A' }}</p>
                                    <p><strong>Round Pen:</strong> {{ $data->round_pen ?? 'N/A' }}</p>
                                </div>
                              </div>
                              @php
                              $hayStorage = json_decode($data->hay_storage, true);
                              @endphp
                              <p><strong>Hay Storage:</strong>
                                 {{ !empty($hayStorage) ? implode(', ', $hayStorage) : 'N/A' }}
                              </p>
                              @php
                              $fencing = json_decode($data->fencing, true);
                              @endphp
                              <p><strong>Fencing:</strong>
                                 {{ !empty($fencing) ? implode(', ', $fencing) : 'N/A' }}
                              </p>
                              @php
                              $outDimensions = json_decode($data->out_dimensions, true);
                              @endphp
                              <p><strong>Outdoor Dimensions:</strong>
                                 {{ !empty($outDimensions) ? implode(' x ', $outDimensions) : 'N/A' }}
                              </p>
                              @php
                              $inDimensions = json_decode($data->in_dimensions, true);
                              @endphp
                              <p><strong>Indoor Dimensions:</strong>
                                 {{ !empty($inDimensions) ? implode(' x ', $inDimensions) : 'N/A' }}
                              </p>
                           </div>
                           <!-- Certifications Section -->
                           <div class="certifications-section">
                              <h3 class="certifications-title">Documents</h3>
                              <div class="certificates-grid">
                                 {{-- @dd($data->property_document) --}}
                                 @php
                                 $files = json_decode($data->property_document, true);
                                 @endphp
                                 @if (!empty($files))
                                 @foreach ($files as $file)
                                 @php
                                 $extension = pathinfo($file, PATHINFO_EXTENSION);
                                 @endphp
                                 <div class="mb-3">
                                    {{-- Agar Image ho --}}
                                    @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <img src="{{ asset('Property_documents/' . $file) }}" class="img-fluid" width="200">
                                    {{-- Agar PDF ho --}}
                                    @elseif(strtolower($extension) == 'pdf')
                                    <a href="{{ asset('Property_documents/' . $file) }}" target="_blank" class="btn btn-primary">
                                    View PDF
                                    </a>
                                    @endif
                                 </div>
                                 @endforeach
                                 @else
                                 <p>N/A</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="v_pills_seller_2" role="tabpanel" aria-labelledby="v_pills_seller_2-tab">
                     <div class="profile_tabs__one">
                        <!-- About Section -->
                        <div class="about-section">
                           <h2 class="about-title">Realstates DETAILS:</h2>
                           <div class="about-text mb-5">
                              {!! $data->property_overview !!}
                           </div>
                           <h2 class="about-title">ADDITIONAL Realstates OFFERED:</h2>
                           <div class="about-text">
                              {!! $data->ad_write_up !!}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="v_pills_seller_3" role="tabpanel" aria-labelledby="v_pills_seller_3-tab">
                     <div class="address_tabs_sec">
                        <!-- Text Section -->
                        @php
                        $garageTypes = json_decode($data->garage_type, true);
                        @endphp
                        <div class="text-section">
                           {{-- SERVICE LOCATION --}}
                           <h2>Realstates Location:</h2>
                           <ul>
                              <li><strong>Property Type:</strong> {{ $data->property_type ?? 'N/A' }}</li>
                              <li><strong>Price:</strong> ${{ $data->real_price ?? 'N/A' }}</li>
                              <li><strong>Acres:</strong> {{ $data->real_acres ?? 'N/A' }}</li>
                              <li><strong>Bedrooms:</strong> {{ $data->real_bedroom ?? 'N/A' }}</li>
                              <li><strong>Bathrooms:</strong> {{ $data->real_bathroom ?? 'N/A' }}</li>
                              <li><strong>Farm Name:</strong> {{ $data->real_farm_name ?? 'N/A' }}</li>
                           </ul>
                           {{-- BUSINESS LOCATION --}}
                           <h2>BUSINESS LOCATION:</h2>
                           <p><strong>Garage:</strong> {{ $data->real_garage ?? 'N/A' }}</p>
                           @if ($data->real_garage == 'yes')
                           <p><strong># of Spaces:</strong> {{ $data->num_spaces ?? 'N/A' }}</p>
                           <p><strong>Garage Type:</strong>
                              {{ !empty($garageTypes) ? implode(', ', $garageTypes) : 'N/A' }}
                           </p>
                           @endif
                        </div>
                        <!-- Map Section -->
                        <div class="map-section">
                           <iframe
                              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.7681645269856!2d-74.99650742389953!3d40.7306102793286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3e4f2e8c06d8d%3A0xf50cb2c7b77e38f!2sLafayette%2C%20NJ!5e0!3m2!1sen!2sus!4v1691798334993!5m2!1sen!2sus"
                              allowfullscreen="" loading="lazy">
                           </iframe>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="v_pills_seller_4" role="tabpanel" aria-labelledby="v_pills_seller_4-tab" tabindex="0">
                     <div class="image-grid">
                        @php
                        $certifications = json_decode($data->gallery_imgs, true);
                        @endphp
                        @if (!empty($certifications) && is_array($certifications))
                        @foreach ($certifications as $cert)
                        <a href="{{ asset('Gallery_imgs/' . $cert) }}" data-fancybox="group" data-caption="Horse">
                        <img src="{{ asset('Gallery_imgs/' . $cert) }}" alt="img" class="" />
                        </a>
                        @endforeach
                        @endif
                     </div>
                  </div>
                  @php
                  $videoUrls = !empty($data->video_url) ? explode(',', $data->video_url) : [];
                  $uploadedVideos = !empty($data->pro_video_url) ? explode(',', $data->pro_video_url) : [];
                  @endphp
                  <div class="tab-pane fade" id="v_pills_seller_5" role="tabpanel" aria-labelledby="v_pills_seller_5-tab" tabindex="0">
                     <div class="row">
                        @foreach ($videoUrls as $url)
                        @php
                        preg_match('/v=([^&]+)/', $url, $matches);
                        $youtubeId = $matches[1] ?? null;
                        $thumbnail = $youtubeId ? "https://img.youtube.com/vi/$youtubeId/hqdefault.jpg" : asset('assets/images/H_05.jpg');
                        @endphp
                        <div class="col-md-6 mb-3">
                           <a href="{{ $url }}" target="_blank" class="position-relative d-block">
                           <img src="{{ $thumbnail }}" class="w-100 rounded" alt="Video Thumbnail">
                           <span style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size:40px; color:white;">▶</span>
                           </a>
                        </div>
                        @endforeach
                        @foreach ($uploadedVideos as $video)
                        <div class="col-md-6 mb-3">
                           <a href="{{ asset('service-videos/' . $video) }}" class="position-relative d-block">
                           <img src="{{ asset('assets/images/H_05.jpg') }}" class="w-100 rounded" alt="Video Thumbnail">
                           <span style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size:40px; color:white;">▶</span>
                           </a>
                        </div>
                        @endforeach
                        @if (empty($videoUrls) && empty($uploadedVideos))
                        <div class="text-center py-5">
                           <h5 class="text-muted">No videos available</h5>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
               <div class="side_box_one">
                  <div class="box_title">
                     <h2>
                    Property Features & Amenities
                     <h2>
                  </div>
                  <ul>
                     @php
                     // property_features database me comma separated ya JSON array ho sakte hain
                     $features = !empty($data->property_features) ? (is_array($data->property_features) ? $data->property_features : explode(',', $data->property_features)) : [];
                     @endphp
                     @if (count($features) > 0)
                     <ul>
                        @foreach ($features as $feature)
                        <li>
                           <span class="me-3">
                           <img src="{{ asset('assets/images/h_icon.png') }}" alt="icon" class="img-fluid">
                           </span>
                           {{ Str::title(Str::replace('_', ' ', $feature)) }}
                        </li>
                        @endforeach
                     </ul>
                     @else
                     <p class="text-muted">No features selected</p>
                     @endif
                  </ul>
               </div>
               <div class="side_box_one d-none">
                  <div class="user_photo_wrap mb-3">
                     @if (!empty($data->per_pic))
                     @php
                     // per_pic comma-separated ya JSON array
                     $photos = is_array($data->per_pic) ? $data->per_pic : explode(',', $data->per_pic);
                     @endphp
                     @foreach ($photos as $photo)
                     <img src="{{ asset('user-photos/' . $photo) }}" alt="User Photo" class="img-fluid mb-2" style="max-width:150px; border-radius:5px;">
                     @endforeach
                     @else
                     <p class="text-muted">No photo uploaded</p>
                     @endif
                  </div>
                  <div class="border_box_one mb-4">
                     {{-- 
                     <div class="row gy-3">
                        <div class="col-6">
                           <h5 class="mb-2">First Name <span class="asterisk">*</span></h5>
                           <p>{{ $data->first_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                           <h5 class="mb-2">Last Name <span class="asterisk">*</span></h5>
                           <p>{{ $data->last_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                           <h5 class="mb-3">If Agent - Brokerage Name <small class="text-muted">(Optional)</small></h5>
                           <p>{{ $data->agent_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                           <h5 class="mb-3">Contact Email <span class="asterisk">*</span></h5>
                           <p>{{ $data->email ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                           <h5 class="mb-3">Phone Number <span class="asterisk">*</span></h5>
                           <p>{{ $data->number ?? 'N/A' }}</p>
                        </div>
                        <div class="col-6">
                           <h5 class="mb-3">Website Link <small class="text-muted">(Optional)</small></h5>
                           <p>{{ $data->website_link ?? 'N/A' }}</p>
                        </div>
                     </div>
                     --}}
                     {{-- 🔹 User Photo --}}
                     <h5 class="mb-3">Photo <small class="text-muted">(Optional)</small></h5>
                  </div>
               </div>
               {{-- 
               <div class="side_box_one pt-4">
                  <div class="box_title">
                     <h2>
                     Pricing
                     <h2>
                  </div>
                  <h5>{{ $data->pkg_price }}</h5>
                  <h6>{{ $data->pkg_price . ' ' . $data->pricing_type }}</h6>
                  <h4>Payment Accepted</h4>
                  <ul>
                     @foreach (explode(',', $data->payment_method) as $item)
                     <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>{{ $item }}</li>
                     @endforeach
                  </ul>
               </div>
               --}}
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   const FULL_DASH_ARRAY = 2 * Math.PI * 34;
   
   const countdownDuration = (2 * 60 * 60 + 46 * 60 + 11) * 1000;
   const countdownEnd = new Date().getTime() + countdownDuration;
   
   function updateCountdown() {
       const now = new Date().getTime();
       let distance = countdownEnd - now;
   
       if (distance < 0) {
           document.querySelector(".countdown").innerHTML = "Time's up!";
           clearInterval(timerInterval);
           return;
       }
   
       const totalDays = Math.floor(countdownDuration / (1000 * 60 * 60 * 24));
       const totalHours = 24;
       const totalMinutes = 60;
       const totalSeconds = 60;
   
       const days = Math.floor(distance / (1000 * 60 * 60 * 24));
       const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
       const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
       const seconds = Math.floor((distance % (1000 * 60)) / 1000);
   
       updateCircle("days", days, totalDays || 1);
       updateCircle("hours", hours, totalHours);
       updateCircle("minutes", minutes, totalMinutes);
       updateCircle("seconds", seconds, totalSeconds);
   }
   
   function updateCircle(id, value, max) {
       document.getElementById(id).innerText = value;
   
       const circle = document.querySelector(`.circle-container[data-type="${id}"] .progress`);
       const offset = FULL_DASH_ARRAY * (1 - value / max);
       circle.style.strokeDasharray = FULL_DASH_ARRAY;
       circle.style.strokeDashoffset = offset;
   }
   
   const timerInterval = setInterval(updateCountdown, 1000);
   updateCountdown();
</script>
<script>
   // Wait for DOM
   document.addEventListener("DOMContentLoaded", function() {
       const viewBtn = document.querySelector(".view_btn");
       const tabEl = document.getElementById("v_pills_seller_2-tab");
   
       viewBtn.addEventListener("click", function(e) {
           e.preventDefault(); // Prevent default anchor behavior
   
           // Using Bootstrap 5 Tab API
           const tab = new bootstrap.Tab(tabEl);
           tab.show();
       });
   });
</script>
@endsection