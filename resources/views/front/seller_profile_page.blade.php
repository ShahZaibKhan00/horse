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
            padding: 100px 0px 100px 0px;
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
            height: 60px;
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
            height: 280px;
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
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #1d2139;
            border-radius: 100%;
        }

        .social_icons a img {
            max-width: 20px;
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
            border-radius: 12px;
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
            margin-bottom: 35px;
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
        }

        .seller_chat_btn {
            font-family: var(--pp_mori_reg);
            width: 170px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #fff;
            font-size: 14px;
            color: #fff;
            transition: all 0.25s;
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
            height: 445px;
            object-fit: cover;
            object-position: center;
        }

        .seller_profile_text_box {
            width: 100%;
            height: 445px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            border: 2px solid #000;
            padding-left: 130px;
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
            width: 32.33% !important;
            font-family: var(--pp_mori_semi);
            font-size: 22px !important;
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
            padding: 30px 20px;
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
            color: #1C2039;
        }

        .side_box_one {
            border: 2px solid #000;
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 35px 20px 35px 105px;
            position: relative;
            margin-bottom: 30px;
            height: 280px;
        }
        .side_box_one.v1 {
            height: 430px;
        }
        .side_box_one ul li {
            display: flex;
            align-items: center;
            font-family: var(--pp_mori_reg);
            font-size: 18px !important;
            color: #000;
            margin: 15px 0px;
        }

        .side_box_one ul li span {
            max-width: 35px;
        }

        .side_box_one .box_title {
            width: 75px;
        }

        .side_box_one .box_title h2 {
            font-size: 20px;
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
                font-size: 16px !important;
            }

            .side_box_one {
                padding: 20px 20px 20.8px 85px;
                margin-bottom: 23px;
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
                font-size: 18px !important;
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
            .side_box_one {
                height: 260px;
            }
        }

        .horse_list_card {
            width: 100%;
            display: flex;
            gap: 0px;
            flex-direction: column;
            position: relative;
        }

        .blue_stripe {
            position: relative;
        }

        .horse_list_card_new .blue_stripe {
            padding: 0 5px 0px 5px;
        }

        .horse_list_card_new .blue_stripe.blue_stripe_new {
            padding: 0 5px;
        }

        .blue_stripe h2 {
            text-transform: uppercase;
            font-family: "AvenirNextLTPro-Bold";
        }

        .icon_heart {
            position: absolute;
            font-size: 24px;
            top: -21px;
            right: 6px;
            transform: translateY(-50%);
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .fs_tag {
            font-size: 18px;
            padding: 3px 32px;
            top: -8px;
            font-weight: 600;
            left: -5px;
        }

        .horse_list_card_new .top_list {
            padding: 20px 0px;
        }

        .horse_list_card .img_box {
            height: 260px;
        }

        .breed_text {
            background: #1d2139;
            width: 100%;
            z-index: 9;
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            padding: 7px 0;
        }

        .horse_list_card .text_box {
            width: 100%;
        }

        .horse_list_card_new .custome_listing_row {
            display: flex;
            width: 100%;
            gap: 5px;
        }

        .horse_list_card.horse_list_card_new .blue_stripe h3 {
            font-size: 25px;
            text-transform: uppercase;
            font-family: "AvenirNextLTPro-Bold";
        }

        .horse_list_card_new .custome_listing_col {
            width: 50%;
        }

        .horse_list_card_new .info_list {
            list-style: none;
            margin: 0px 0px;
        }

        .info_list li {
            border: 1px solid #1d2139;
            padding: 5px;
            text-align: center;
            font-size: 20px;
        }

        .horse_list_card_new .custome_listing_col .info_list li {
            font-size: 18px;
            font-weight: 600;
            margin: 5px 0px;
            padding: 0px 10px;
            text-transform: uppercase;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .horse_list_card_new .blue_wrapper {
            padding: 5px;
        }

        .horse_list_card_new .blue_stripe {
            padding: 0 5px 0px 5px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
            margin-bottom: 5px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.top_row,
        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
            display: flex;
            gap: 5px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
            width: 100%;
            font-size: 18px;
            height: 35px;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
            text-transform: uppercase;
        }

        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row .horse_card_btn,
        .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row .fvrt_btn {
            width: 100%;
        }

        img.sold_badge {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
            max-width: 260px;
            object-fit: contain !important;
        }

        @media (max-width: 1799px) {
            .gen_card_flex {
                max-width: 1200px;
                gap: 20px;
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
                font-size: 11px;
                padding: 0px 3px;
            }

            .horse_list_card_new .blue_stripe h2 {
                font-size: 20px;
                margin-top: 3px;
            }

            .horse_list_card_new .custome_listing_col .info_list li {
                font-size: 17px;
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
                font-size: 13px;
            }

            .breed_text {
                font-size: 16px;
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
                max-width: 1200px;
                width: 100%;
                margin: 0 auto;
            }
        }

        @media (max-width: 1399px) {
            .gen_card_flex {
                max-width: 100%;
                gap: 15px;
            }

            .gen_card_flex .horse_list_card {
                width: 280px;
            }

            .horse_list_card_new .custome_listing_col .info_list li {
                font-size: 13px;
            }

            .horse_list_card_new .top_list {
                padding: 20px 0px 5px 0;
            }

            .horse_list_card_new .icon_heart {
                font-size: 21px;
                top: -8px;
                right: 6px;
            }
        }
    </style>
    <section class="view_detail_page">
        <div class="container-fluid p-0">
            <div class="seller_top_bar">
                <div class="lgo_box">
                    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                </div>
                <h1>{{ $user->name }}</h1>
                <a href="#!" class="seller_chat_btn">CHAT WITH SELLER</a>
            </div>
            <div class="seller_content_wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="nav nav-pills seller_tabs mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v_pills_seller_1-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_1" type="button" role="tab"
                                aria-controls="v_pills_seller_1" aria-selected="true">
                                <span>About Us</span>
                            </button>
                            <button class="nav-link" id="v_pills_seller_2-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_2" type="button" role="tab" aria-controls="v_pills_seller_2"
                                aria-selected="false">
                                <span>Horse for sale</span>
                            </button>
                            <button class="nav-link" id="v_pills_seller_3-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_3" type="button" role="tab" aria-controls="v_pills_seller_3"
                                aria-selected="false">
                                <span>Horse Sold</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                        <div class="row mb-4">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="seller_profile_img">
                                    <img src="{{ getenv('APP_URL') }}/Profile_image/{{ $user->Profile_img != '' ? $user->Profile_img : 'profile.jpg' }}" alt="img" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="seller_profile_text_box">
                                    <div class="box_title">
                                        <h2>
                                            Contact
                                            <h2>
                                    </div>
                                    <h1>{{ $user->name }}</h1>
                                    <p><i class="fa fa-envelope me-3" aria-hidden="true"></i>{{ $user->email ?? '-' }}</p>
                                    <p><i class="fa fa-bandcamp me-3" aria-hidden="true"></i>{{ $user->website_link ?? '-' }}</p>
                                    <p><i class="fa fa-phone-square me-3" aria-hidden="true"></i>Cell: {{ $user->Number ?? '-' }}</p>
                                    <p><i class="fa fa-map-marker me-3" aria-hidden="true"></i>Location: {{ $user->Address ?? '-' }} {{-- Lafayette, NJ --}}</p>
                                    <hr>
                                    <div class="social_icons mt-4">
                                        <a href="{{ $user->facebook_link ?? '-' }}" title="Facebook"><img src="/assets/images/facebook.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $user->youtube_link ?? '-' }}" title="Youtube"><img src="/assets/images/youtube.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $user->tiktok_link ?? '-' }}" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $user->insta_link ?? '-' }}" title="Instagram"><img src="/assets/images/instagram.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $user->business_link ?? '-' }}" title="Website"><img src="/assets/images/website-icon-11.png" alt="img" class="img-fluid" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-content" id="seller_pills-tabContent">
                            <div class="tab-pane fade show active" id="v_pills_seller_1" role="tabpanel" aria-labelledby="v_pills_seller_1-tab">
                                <div class="about_text_box">
                                    <h3>About:</h3>
                                    <p>{{ $user->about ?? '-' }}</p>
                                    {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                           has
                           been the industry's standard dummy text ever since the 1500s, when an
                           unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                           survived not only five centuries, but also the leap into electronic
                           typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                           release of Letraset sheets containing Lorem Ipsum passages.Lorem Ipsum is
                           simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                           industry's standard dummy text ever since the 1500s, when an unknown printer
                           took a galley of type and scrambled it to make a type specimen book. It has survived not only
                           five centuries, but also the leap into electronic typesetting,
                           remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                           sheets containing Lorem Ipsum passages.
                        </p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                           been the industry's standard dummy text ever since the 1500s, when an
                           unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                           survived not only five centuries, but also the leap into electronic
                           typesetting, remaining essentially unchanged.
                        </p> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v_pills_seller_2" role="tabpanel" aria-labelledby="v_pills_seller_2-tab">
                                <div class="row">
                                    @if ($products->count() > 0)
                                        @foreach ($products as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <div class="horse_list_card horse_list_card_new">
                                                    <div class="blue_stripe">
                                                        <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                                        <ul class="top_list">
                                                        </ul>
                                                    </div>
                                                    <div class="blue_stripe blue_stripe_new">
                                                        <h2>{{ $product->pro_name }}</h2>
                                                        <label class="heart_checkbox_wrapper d-block">
                                                            <input type="checkbox" class="heartCheckbox" hidden {{ $product->horsrFavs->isNotEmpty() ? 'checked' : '' }} />
                                                            <i class="fa fa-heart{{ $product->horsrFavs->isNotEmpty() ? '' : '-o' }} icon_heart" aria-hidden="true"
                                                                style="{{ $product->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                                        </label>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                                            <div class="swiper horse_list_card_slider h-100 w-100">
                                                                <div class="swiper-wrapper">
                                                                    @php
                                                                        $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : [];
                                                                    @endphp

                                                                    @if (!empty($product->pro_Fimg))
                                                                        <div class="swiper-slide">
                                                                            <img src="{{ asset('Featured_image/' . $product->pro_Fimg) }}" alt="Featured Image"
                                                                                class="img-fluid w-100 img_radius_one" />
                                                                        </div>
                                                                    @endif

                                                                    @forelse ($productImages as $item)
                                                                        <div class="swiper-slide">
                                                                            <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="Product Image" class="img-fluid w-100 img_radius_one" />
                                                                        </div>
                                                                    @empty
                                                                        {{-- Agar featured image bhi na ho aur gallery bhi khali ho tab placeholder
                                                dikhayein --}}
                                                                        @if (empty($data->pro_Fimg))
                                                                            <div class="swiper-slide">
                                                                                <img src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder" class="img-fluid w-100 img_radius_one" />
                                                                            </div>
                                                                        @endif
                                                                    @endforelse
                                                                </div>
                                                                <div class="swiper-pagination"></div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-6cf9713f68ad1553"><i
                                                                    class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-6cf9713f68ad1553"><i
                                                                    class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                                    <div class="text_box">
                                                        <div class="custome_listing_row">
                                                            <div class="custome_listing_col">
                                                                <ul class="info_list">
                                                                    <li>
                                                                        @if ($product->pro_age_year > 0)
                                                                            {{ $product->pro_age_year }} {{ $product->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                                        @endif
                                                                        @if ($product->pro_age_month > 0)
                                                                            {{ $product->pro_age_month }}
                                                                            {{ $product->pro_age_month == 1 ? 'Mo' : 'Mos' }}
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
                                                                    {{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }},
                                                                    {{ $stateCode }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="blue_wrapper">
                                                            <div class="blue_stripe">
                                                                <h3>
                                                                    @if ($product->pro_ad_type == 'At Auction')
                                                                        Starting Bid: ${{ $product->bid_amount ?? '0' }}
                                                                    @else
                                                                        Price: ${{ $product->pro_reg_price ?? '0' }}
                                                                    @endif
                                                                </h3>
                                                            </div>
                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn w-100">View Details</a>
                                                            </div>
                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                <a href="{{ url('seller_profile_one/' . $product->id) }}" class="horse_card_btn">Seller Profile</a>
                                                                <a href="{{ route('start.conversation', ['receiver_id' => $product->user_id, 'product_id' => $product->id, 'product_type' => 'horse']) }}"
                                                                    class="horse_card_btn">Chat with seller</a>
                                                            </div>
                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                <a href="#!" class="horse_card_btn">Share</a>
                                                                <form class="horse_card_btn favorite-form" action="{{ route('horse.favorite', Crypt::encrypt($product->id)) }}" method="POST">
                                                                    @csrf
                                                                    <button class="fvrt_btn" type="button" title="Add to favorite">
                                                                        {{ $product->horsrFavs->isNotEmpty() ? 'Favorited ' : 'Favorite ' }}<i
                                                                            class="fa fa-heart{{ $product->horsrFavs->isNotEmpty() ? '' : '-o' }}" aria-hidden="true"
                                                                            style="{{ $product->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>
                                            No Product Listed For Sale

                                        </p>
                                    @endif

                                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="horse_list_card horse_list_card_new">
                              <div class="blue_stripe">
                                 <p class="fs_tag">For Sale</p>
                                 <ul class="top_list">
                                 </ul>
                              </div>
                              <div class="blue_stripe blue_stripe_new">
                                 <h2>Riding the Silver Lining</h2>
                                 <label class="heart_checkbox_wrapper d-block">
                                    <input type="checkbox" class="heartCheckbox" hidden="">
                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                 </label>
                              </div>
                              <div class="img_box">
                                 <div
                                    class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-6cf9713f68ad1553" aria-live="polite">
                                       <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2"
                                          data-swiper-slide-index="0" style="width: 420px;">
                                          <img
                                             src="https://horse.testlinkhost.com/Featured_image/Featured_1776836581_QY0LQ1IuLX.png"
                                             alt="Featured Image" class="img-fluid w-100 img_radius_one">
                                       </div>
                                       <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 2"
                                          data-swiper-slide-index="1" style="width: 420px;">
                                          <img src="https://horse.testlinkhost.com/assets/images/placeholder.png"
                                             alt="Placeholder" class="img-fluid w-100 img_radius_one">
                                       </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                 </div>
                                 <div class="arrow_flex">
                                    <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-left"
                                          aria-hidden="true"></i></button>
                                    <button class="horse_arrow_right" tabindex="0" aria-label="Next slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-right"
                                          aria-hidden="true"></i></button>
                                 </div>
                              </div>
                              <h2 class="breed_text">Alter Real</h2>
                              <div class="text_box">
                                 <div class="custome_listing_row">
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>
                                             12 Yrs
                                             Old
                                          </li>
                                          <li>16.0 HH</li>
                                          <li>Stallion</li>
                                       </ul>
                                    </div>
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>Black Bay</li>
                                          <li>Registered: No</li>
                                          <li>Gaited: </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="custome_listing_col w-100">
                                    <ul class="info_list">
                                       <li class="m-0 mb-2">
                                          Lafayette,
                                          NJ
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="blue_wrapper">
                                    <div class="blue_stripe">
                                       <h3>
                                          Price: $15,000
                                       </h3>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="https://horse.testlinkhost.com/products_detail/PROSKUdfcb6b9529abc89c26d3cd00ffa3dd60"
                                          class="horse_card_btn w-100">View Details</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Seller Profile</a>
                                       <a href="#!" class="horse_card_btn">Chat with seller</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Share</a>
                                       <form class="horse_card_btn favorite-form" action="" method="POST">
                                          <input type="hidden" name="_token" value="" autocomplete="off">
                                          <button class="fvrt_btn" type="button" title="Add to favorite">
                                             Favorite <i class="fa fa-heart-o" aria-hidden="true" style=""></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="horse_list_card horse_list_card_new">
                              <div class="blue_stripe">
                                 <p class="fs_tag">For Sale</p>
                                 <ul class="top_list">
                                 </ul>
                              </div>
                              <div class="blue_stripe blue_stripe_new">
                                 <h2>Riding the Silver Lining</h2>
                                 <label class="heart_checkbox_wrapper d-block">
                                    <input type="checkbox" class="heartCheckbox" hidden="">
                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                 </label>
                              </div>
                              <div class="img_box">
                                 <div
                                    class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-6cf9713f68ad1553" aria-live="polite">
                                       <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2"
                                          data-swiper-slide-index="0" style="width: 420px;">
                                          <img
                                             src="https://horse.testlinkhost.com/Featured_image/Featured_1776836581_QY0LQ1IuLX.png"
                                             alt="Featured Image" class="img-fluid w-100 img_radius_one">
                                       </div>
                                       <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 2"
                                          data-swiper-slide-index="1" style="width: 420px;">
                                          <img src="https://horse.testlinkhost.com/assets/images/placeholder.png"
                                             alt="Placeholder" class="img-fluid w-100 img_radius_one">
                                       </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                 </div>
                                 <div class="arrow_flex">
                                    <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-left"
                                          aria-hidden="true"></i></button>
                                    <button class="horse_arrow_right" tabindex="0" aria-label="Next slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-right"
                                          aria-hidden="true"></i></button>
                                 </div>
                              </div>
                              <h2 class="breed_text">Alter Real</h2>
                              <div class="text_box">
                                 <div class="custome_listing_row">
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>
                                             12 Yrs
                                             Old
                                          </li>
                                          <li>16.0 HH</li>
                                          <li>Stallion</li>
                                       </ul>
                                    </div>
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>Black Bay</li>
                                          <li>Registered: No</li>
                                          <li>Gaited: </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="custome_listing_col w-100">
                                    <ul class="info_list">
                                       <li class="m-0 mb-2">
                                          Lafayette,
                                          NJ
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="blue_wrapper">
                                    <div class="blue_stripe">
                                       <h3>
                                          Price: $15,000
                                       </h3>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="https://horse.testlinkhost.com/products_detail/PROSKUdfcb6b9529abc89c26d3cd00ffa3dd60"
                                          class="horse_card_btn w-100">View Details</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Seller Profile</a>
                                       <a href="#!" class="horse_card_btn">Chat with seller</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Share</a>
                                       <form class="horse_card_btn favorite-form" action="" method="POST">
                                          <input type="hidden" name="_token" value="" autocomplete="off">
                                          <button class="fvrt_btn" type="button" title="Add to favorite">
                                             Favorite <i class="fa fa-heart-o" aria-hidden="true" style=""></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v_pills_seller_3" role="tabpanel" aria-labelledby="v_pills_seller_3-tab">
                                <div class="row">
                                    @if (!empty($product_solds) && $product_solds->count() > 0)
                                        @foreach ($product_solds as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <div class="horse_list_card horse_list_card_new">
                                                    <div class="blue_stripe">
                                                        <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                                        <ul class="top_list">
                                                        </ul>
                                                    </div>
                                                    <div class="blue_stripe blue_stripe_new">
                                                        <h2>{{ $product->pro_name }}</h2>
                                                        <label class="heart_checkbox_wrapper d-block">
                                                            <input type="checkbox" class="heartCheckbox" hidden {{ $product->horsrFavs->isNotEmpty() ? 'checked' : '' }} />
                                                            <i class="fa fa-heart{{ $product->horsrFavs->isNotEmpty() ? '' : '-o' }} icon_heart" aria-hidden="true"
                                                                style="{{ $product->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                                        </label>
                                                    </div>
                                                    <div class="img_box">
                                                        @if ($product->horse_status)
                                                            <img src="{{ asset('assets/images/SOLD.png') }}" class="sold_badge" alt="" srcset="">
                                                        @endif
                                                        <div class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                                            <div class="swiper horse_list_card_slider h-100 w-100">
                                                                <div class="swiper-wrapper">
                                                                    @php
                                                                        $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : [];
                                                                    @endphp

                                                                    @if (!empty($product->pro_Fimg))
                                                                        <div class="swiper-slide">
                                                                            <img src="{{ asset('Featured_image/' . $product->pro_Fimg) }}" alt="Featured Image"
                                                                                class="img-fluid w-100 img_radius_one" />
                                                                        </div>
                                                                    @endif

                                                                    @forelse ($productImages as $item)
                                                                        <div class="swiper-slide">
                                                                            <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="Product Image" class="img-fluid w-100 img_radius_one" />
                                                                        </div>
                                                                    @empty
                                                                        {{-- Agar featured image bhi na ho aur gallery bhi khali ho tab placeholder
                                                dikhayein --}}
                                                                        @if (empty($data->pro_Fimg))
                                                                            <div class="swiper-slide">
                                                                                <img src="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder" class="img-fluid w-100 img_radius_one" />
                                                                            </div>
                                                                        @endif
                                                                    @endforelse
                                                                </div>
                                                                <div class="swiper-pagination"></div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-6cf9713f68ad1553"><i
                                                                    class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-6cf9713f68ad1553"><i
                                                                    class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                                    <div class="text_box">
                                                        <div class="custome_listing_row">
                                                            <div class="custome_listing_col">
                                                                <ul class="info_list">
                                                                    <li>
                                                                        @if ($product->pro_age_year > 0)
                                                                            {{ $product->pro_age_year }} {{ $product->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                                        @endif
                                                                        @if ($product->pro_age_month > 0)
                                                                            {{ $product->pro_age_month }}
                                                                            {{ $product->pro_age_month == 1 ? 'Mo' : 'Mos' }}
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
                                                                    {{ Str::ucfirst(str_replace('_', ' ', $product->pro_city)) }},
                                                                    {{ $stateCode }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="blue_wrapper">
                                                            <div class="blue_stripe">
                                                                <h3>
                                                                    @if ($product->pro_ad_type == 'At Auction')
                                                                        Starting Bid: ${{ $product->bid_amount ?? '0' }}
                                                                    @else
                                                                        Price: ${{ $product->pro_reg_price ?? '0' }}
                                                                    @endif
                                                                </h3>
                                                            </div>
                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn w-100">View Details</a>
                                                            </div>
                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                <a href="{{ url('seller_profile_one/' . $product->id) }}" class="horse_card_btn">Seller Profile</a>
                                                                <a href="{{ route('start.conversation', ['receiver_id' => $product->user_id, 'product_id' => $product->id, 'product_type' => 'horse']) }}"
                                                                    class="horse_card_btn">Chat with seller</a>
                                                            </div>
                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                <a href="#!" class="horse_card_btn">Share</a>
                                                                <form class="horse_card_btn favorite-form" action="{{ route('horse.favorite', Crypt::encrypt($product->id)) }}" method="POST">
                                                                    @csrf
                                                                    <button class="fvrt_btn" type="button" title="Add to favorite">
                                                                        {{ $product->horsrFavs->isNotEmpty() ? 'Favorited ' : 'Favorite ' }}<i
                                                                            class="fa fa-heart{{ $product->horsrFavs->isNotEmpty() ? '' : '-o' }}" aria-hidden="true"
                                                                            style="{{ $product->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>

                                            No Product Sold
                                        </p>
                                    @endif
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="horse_list_card horse_list_card_new">
                              <div class="blue_stripe">
                                 <p class="fs_tag">For Sale</p>
                                 <ul class="top_list">
                                 </ul>
                              </div>
                              <div class="blue_stripe blue_stripe_new">
                                 <h2>Riding the Silver Lining</h2>
                                 <label class="heart_checkbox_wrapper d-block">
                                    <input type="checkbox" class="heartCheckbox" hidden="">
                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                 </label>
                              </div>
                              <div class="img_box">
                                 <div
                                    class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-6cf9713f68ad1553" aria-live="polite">
                                       <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2"
                                          data-swiper-slide-index="0" style="width: 420px;">
                                          <img
                                             src="https://horse.testlinkhost.com/Featured_image/Featured_1776836581_QY0LQ1IuLX.png"
                                             alt="Featured Image" class="img-fluid w-100 img_radius_one">
                                       </div>
                                       <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 2"
                                          data-swiper-slide-index="1" style="width: 420px;">
                                          <img src="https://horse.testlinkhost.com/assets/images/placeholder.png"
                                             alt="Placeholder" class="img-fluid w-100 img_radius_one">
                                       </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                 </div>
                                 <div class="arrow_flex">
                                    <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-left"
                                          aria-hidden="true"></i></button>
                                    <button class="horse_arrow_right" tabindex="0" aria-label="Next slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-right"
                                          aria-hidden="true"></i></button>
                                 </div>
                                 <img src="https://horse.testlinkhost.com/assets/images/SOLD.png" class="sold_badge"
                                    alt="" srcset="">
                              </div>
                              <h2 class="breed_text">Alter Real</h2>
                              <div class="text_box">
                                 <div class="custome_listing_row">
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>
                                             12 Yrs
                                             Old
                                          </li>
                                          <li>16.0 HH</li>
                                          <li>Stallion</li>
                                       </ul>
                                    </div>
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>Black Bay</li>
                                          <li>Registered: No</li>
                                          <li>Gaited: </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="custome_listing_col w-100">
                                    <ul class="info_list">
                                       <li class="m-0 mb-2">
                                          Lafayette,
                                          NJ
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="blue_wrapper">
                                    <div class="blue_stripe">
                                       <h3>
                                          Price: $15,000
                                       </h3>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="https://horse.testlinkhost.com/products_detail/PROSKUdfcb6b9529abc89c26d3cd00ffa3dd60"
                                          class="horse_card_btn w-100">View Details</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Seller Profile</a>
                                       <a href="#!" class="horse_card_btn">Chat with seller</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Share</a>
                                       <form class="horse_card_btn favorite-form" action="" method="POST">
                                          <input type="hidden" name="_token" value="" autocomplete="off">
                                          <button class="fvrt_btn" type="button" title="Add to favorite">
                                             Favorite <i class="fa fa-heart-o" aria-hidden="true" style=""></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="horse_list_card horse_list_card_new">
                              <div class="blue_stripe">
                                 <p class="fs_tag">For Sale</p>
                                 <ul class="top_list">
                                 </ul>
                              </div>
                              <div class="blue_stripe blue_stripe_new">
                                 <h2>Riding the Silver Lining</h2>
                                 <label class="heart_checkbox_wrapper d-block">
                                    <input type="checkbox" class="heartCheckbox" hidden="">
                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                 </label>
                              </div>
                              <div class="img_box">
                                 <div
                                    class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-6cf9713f68ad1553" aria-live="polite">
                                       <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2"
                                          data-swiper-slide-index="0" style="width: 420px;">
                                          <img
                                             src="https://horse.testlinkhost.com/Featured_image/Featured_1776836581_QY0LQ1IuLX.png"
                                             alt="Featured Image" class="img-fluid w-100 img_radius_one">
                                       </div>
                                       <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 2"
                                          data-swiper-slide-index="1" style="width: 420px;">
                                          <img src="https://horse.testlinkhost.com/assets/images/placeholder.png"
                                             alt="Placeholder" class="img-fluid w-100 img_radius_one">
                                       </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                 </div>
                                 <div class="arrow_flex">
                                    <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-left"
                                          aria-hidden="true"></i></button>
                                    <button class="horse_arrow_right" tabindex="0" aria-label="Next slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-right"
                                          aria-hidden="true"></i></button>
                                 </div>
                                 <img src="https://horse.testlinkhost.com/assets/images/SOLD.png" class="sold_badge"
                                    alt="" srcset="">
                              </div>
                              <h2 class="breed_text">Alter Real</h2>
                              <div class="text_box">
                                 <div class="custome_listing_row">
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>
                                             12 Yrs
                                             Old
                                          </li>
                                          <li>16.0 HH</li>
                                          <li>Stallion</li>
                                       </ul>
                                    </div>
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>Black Bay</li>
                                          <li>Registered: No</li>
                                          <li>Gaited: </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="custome_listing_col w-100">
                                    <ul class="info_list">
                                       <li class="m-0 mb-2">
                                          Lafayette,
                                          NJ
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="blue_wrapper">
                                    <div class="blue_stripe">
                                       <h3>
                                          Price: $15,000
                                       </h3>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="https://horse.testlinkhost.com/products_detail/PROSKUdfcb6b9529abc89c26d3cd00ffa3dd60"
                                          class="horse_card_btn w-100">View Details</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Seller Profile</a>
                                       <a href="#!" class="horse_card_btn">Chat with seller</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Share</a>
                                       <form class="horse_card_btn favorite-form" action="" method="POST">
                                          <input type="hidden" name="_token" value="" autocomplete="off">
                                          <button class="fvrt_btn" type="button" title="Add to favorite">
                                             Favorite <i class="fa fa-heart-o" aria-hidden="true" style=""></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="horse_list_card horse_list_card_new">
                              <div class="blue_stripe">
                                 <p class="fs_tag">For Sale</p>
                                 <ul class="top_list">
                                 </ul>
                              </div>
                              <div class="blue_stripe blue_stripe_new">
                                 <h2>Riding the Silver Lining</h2>
                                 <label class="heart_checkbox_wrapper d-block">
                                    <input type="checkbox" class="heartCheckbox" hidden="">
                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                 </label>
                              </div>
                              <div class="img_box">
                                 <div
                                    class="swiper horse_list_card_slider h-100 w-100 swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-6cf9713f68ad1553" aria-live="polite">
                                       <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2"
                                          data-swiper-slide-index="0" style="width: 420px;">
                                          <img
                                             src="https://horse.testlinkhost.com/Featured_image/Featured_1776836581_QY0LQ1IuLX.png"
                                             alt="Featured Image" class="img-fluid w-100 img_radius_one">
                                       </div>
                                       <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 2"
                                          data-swiper-slide-index="1" style="width: 420px;">
                                          <img src="https://horse.testlinkhost.com/assets/images/placeholder.png"
                                             alt="Placeholder" class="img-fluid w-100 img_radius_one">
                                       </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                 </div>
                                 <div class="arrow_flex">
                                    <button class="horse_arrow_left" tabindex="0" aria-label="Previous slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-left"
                                          aria-hidden="true"></i></button>
                                    <button class="horse_arrow_right" tabindex="0" aria-label="Next slide"
                                       aria-controls="swiper-wrapper-6cf9713f68ad1553"><i class="fa fa-chevron-right"
                                          aria-hidden="true"></i></button>
                                 </div>
                                 <img src="https://horse.testlinkhost.com/assets/images/SOLD.png" class="sold_badge"
                                    alt="" srcset="">
                              </div>
                              <h2 class="breed_text">Alter Real</h2>
                              <div class="text_box">
                                 <div class="custome_listing_row">
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>
                                             12 Yrs
                                             Old
                                          </li>
                                          <li>16.0 HH</li>
                                          <li>Stallion</li>
                                       </ul>
                                    </div>
                                    <div class="custome_listing_col">
                                       <ul class="info_list">
                                          <li>Black Bay</li>
                                          <li>Registered: No</li>
                                          <li>Gaited: </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="custome_listing_col w-100">
                                    <ul class="info_list">
                                       <li class="m-0 mb-2">
                                          Lafayette,
                                          NJ
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="blue_wrapper">
                                    <div class="blue_stripe">
                                       <h3>
                                          Price: $15,000
                                       </h3>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="https://horse.testlinkhost.com/products_detail/PROSKUdfcb6b9529abc89c26d3cd00ffa3dd60"
                                          class="horse_card_btn w-100">View Details</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Seller Profile</a>
                                       <a href="#!" class="horse_card_btn">Chat with seller</a>
                                    </div>
                                    <div class="horse_list_card_btn_flex_new bottom_row">
                                       <a href="#!" class="horse_card_btn">Share</a>
                                       <form class="horse_card_btn favorite-form" action="" method="POST">
                                          <input type="hidden" name="_token" value="" autocomplete="off">
                                          <button class="fvrt_btn" type="button" title="Add to favorite">
                                             Favorite <i class="fa fa-heart-o" aria-hidden="true" style=""></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="side_box_one">
                            <div class="box_title">
                                <h2>
                                    Services offered
                                    <h2>
                            </div>
                            <ul>
                                @if (!empty($user->services))
                                    @php
                                        $services = json_decode($user->services, true);
                                        $services = array_slice($services ?? [], 0, 4);
                                    @endphp

                                    @foreach ($services as $index => $item)
                                        <li>
                                            <span class="me-3">
                                                <img src="/assets/images/h_icon.png" alt="img" class="img-fluid">
                                            </span>

                                            {{ $item }}
                                        </li>
                                    @endforeach
                                @endif
                                {{-- <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Training</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Lessons</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Boarding</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Sales</li> --}}
                            </ul>
                        </div>
                        <div class="side_box_one">
                            <div class="box_title">
                                <h2>
                                    Specialized breeds
                                    <h2>
                            </div>
                            <ul>

                              @if (!empty($user->breed))
                                 @php
                                       $services = json_decode($user->breed, true);
                                       $services = array_slice($services ?? [], 0, 4);
                                 @endphp

                                 @foreach ($services as $index => $item)
                                    <li>
                                       <span class="me-3">
                                          <img src="/assets/images/h_icon.png" alt="img" class="img-fluid">
                                       </span>

                                       {{ $item }}
                                    </li>
                                 @endforeach
                              @endif

                                {{-- <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Quarter Horses</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Friesian Crosses</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Draft Crosses</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Gypsy Crosses</li> --}}
                            </ul>
                        </div>
                        <div class="side_box_one v1">
                            <div class="box_title">
                                <h2>
                                    SPECIALIZED SKILLS | DISCIPLINE
                                    <h2>
                            </div>
                            <ul>
                              @if (!empty($user->skill))
                                 @php
                                       $services = json_decode($user->skill, true);
                                       $services = array_slice($services ?? [], 0, 7);
                                 @endphp

                                 @foreach ($services as $index => $item)
                                    <li>
                                       <span class="me-3">
                                          <img src="/assets/images/h_icon.png" alt="img" class="img-fluid">
                                       </span>

                                       {{ $item }}
                                    </li>
                                 @endforeach
                              @endif
                              
                                {{-- <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Trail riding</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Dressage</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Western</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Lessons</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Trick</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Riding</li>
                                <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>Jumping</li> --}}
                            </ul>
                        </div>
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
@endsection
