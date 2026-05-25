@extends($isModal ? 'layouts.blank' : 'layouts.app') @section('content')
    <style>
        .container {
            max-width: 1340px;
        }

        /*.view_detail_page {*/
        /*    font-family: "AvenirNextLTPro-Regular";*/
        /*}*/

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
            padding: 10px 0px 100px 0px!important;
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
            border-radius: 5px !important;
            width: 100%;
            height: 45px;
            border: 1px solid #d6d8d9;
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
            height: 300px;
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
            justify-content: center;
        }

        .social_icons a {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 100%;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            background: #fff;
            transition: all 0.25s;
        }
        .social_icons a:hover {
            transform: scale(1.2);
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

        .videoplay_box video {
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
            transform: scaleX(-1);
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

        .seller_chat_btn, .seller_chat_btn:focus {
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
            margin: 0 auto;
            margin-top: 20px;
        }
        
        

        .seller_chat_btn:hover {
            background: var(--white);
            color: #000;
        }

        .seller_content_wrapper {
            padding: 20px 140px;
        }

        .seller_profile_img {
            position: relative;
        }
        .seller_profile_img img {
            border-radius: 5px 0 0 5px;
            z-index: -1;
            position: relative;
        }
        .icon_heart {
        font-size: 33px;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s ease;
        padding: 8px;
        background: #1c2039;
        /* border-radius: 8px; */
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* border: 2px solid #ffffff; */
        position: absolute;
        top: 6px;
        right: 6px;
    }

        .icon_heart.filled {
            color: #c09957;
        }

        .seller_profile_img img {
            width: 100%;
            height: 370px;
            object-fit: cover;
            object-position: center;
        }

       .seller_profile_text_box {
            width: 100%;
            height: 370px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            /* border: 2px solid #000; */
            position: relative;
            padding: 20px 10px 20px 10px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            border-radius: 0px 5px 5px 0;
            background: #1f2339;
        }
        .seller_profile_text_box.text-center::before {
            content: '';
            position: absolute;
            top: 0px;
            left: -60px;
            background: #1f2339;
            width: 100%;
            height: 100%;
            z-index: -1;
            transform: skew(-10deg, 0deg);
            border-left: 10px solid #b18d61;
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
            color: #ffffff;
            border-left: 3px solid #b18d61;
            max-width: 350px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 0 0 10px;
            line-height: 1;
            text-align: center;
            margin: 0 auto;
            margin-bottom: 12px;
        }

        .seller_profile_text_box p {
            /*font-family: var(--pp_mori_reg);*/
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            margin: 0px 0px 10px 0px;
            text-align: center;
        }

        .seller_tabs {
            justify-content: space-between;
        }

        .seller_tabs .nav-link {
            width: 19.5% !important;
            font-family: var(--pp_mori_semi);
            font-size: 16px !important;
            text-transform: uppercase;
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
        .new_heading_bar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 0px;
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
            width: 80px;
            height: 3px;
            background: #b18d61;
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
            /* border: 2px solid #000; */
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 0px 10px 0px 90px;
            position: relative;
            margin-bottom: 8px;
            height: 375px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            border-radius: 5px;
            overflow: hidden;
        }

        .side_box_one ul li {
            display: flex;
            align-items: center;
            /*font-family: var(--pp_mori_reg);*/
            font-size: 13px !important;
            font-weight: 600;
            color: #000;
            margin: 10px 0px;
        }

        .side_box_one ul li span {
            max-width: 25px;
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
       hr:not([size]) {
            height: 1px;
            background: #ffffff;
            opacity: 0.5;
        }

        @media only screen and (max-width: 1799px) {
            .seller_content_wrapper {
                padding: 20px 15px;
                width: 100%;
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


            .info_action_btns_flex a {
                width: 85px;
                font-size: 10px;
            }

            .seller_profile_text_box,
            .seller_profile_img img {
                height: 380px;
            }

            .seller_profile_text_box p {
                margin: 0px 0px 7px 0px;
            }
        }
    </style>

    <style>
        .profile_tabs__one {
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            /* border: 2px solid #1c2039; */
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            border-radius: 5px;
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

        .profile_tabs__one .languages {
            font-size: 14px;
            font-weight: 700;
            color: #1d2139;
        }
        .experience-value {
            font-size: 14px;
            font-weight: 700;
            color: #1d2139;
        }

        /*.profile_tabs__one .about-section {*/
        /*    max-height: 650px;*/
        /*    overflow-y: auto;*/
        /*    overflow-x: hidden;*/
        /*}*/

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
            margin-bottom: 15px;
        }

        .profile_tabs__one .about-text ul li {
            font-weight: 600;
            margin: 3px 0;
        }

        .s_details {
            max-width: 600px;
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
            align-items: center;
        }

        .profile_tabs__one .certificate-item {
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
            text-transform: uppercase;
        }

        .address_tabs_sec ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .address_tabs_sec ul li, .address_tabs_sec p {
            margin-bottom: 5px;
            color: #1d2139;
            font-size: 18px;
            text-transform: capitalize;
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
        .video_click_box {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .mb-2.thumbnail-wrapper {
            flex: 0 0 calc((100% - 40px) / 5);
        }
        .video_click_box iframe {
            width: 100%;
            height: 160px;
            border-radius: 8px;
        }
        .videoplay_max_box iframe {
            border-radius: 15px;
            border: none;
            overflow: hidden;
            display: block;
        }
        
        
        .seller_tabs {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: #fff; /* Background color zaroori hai taake scroll content niche se nazar na aaye */
        padding: 10px 0;
        margin-bottom: 20px !important;
        border-bottom: 1px solid #ddd; /* Optional: Separator line */
        }
        .seller_tabs {
            background: #fff;
            z-index: 1000;
            width: 100%;
            border-bottom: 1px solid #ddd;
            /* transition for smooth background/shadow effect */
            transition: box-shadow 0.3s ease;
        }
    </style>

    <section class="view_detail_page pt-0">
        <div class="container-fluid p-0">
            <!--<div class="seller_top_bar">
                <div class="lgo_box">
                    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                </div>

                <h1 class="d-none">{{ $data->business_name }}</h1>
                <div class="d-flex gap-3 detail_left">
                    <a href="{{ route('start.conversation', ['receiver_id' => $data->user_id, 'product_id' => $data->id, 'product_type' => 'service']) }}" class="seller_chat_btn">CHAT WITH SERVICE
                        PROVIDER</a>
                    <label class="heart_checkbox_wrapper d-block align-item-center">
                        <input type="checkbox" class="heartCheckbox" hidden {{ (auth()->check() && $data->serviceFavs->isNotEmpty()) ? 'checked' : '' }} />
                        <i class="fa fa-heart{{ (auth()->check() && $data->serviceFavs->isNotEmpty()) ? ' filled' : '-o' }} icon_heart" aria-hidden="true"></i>
                    </label>
                    <form class="favorite-form" action="{{ route('service.favorite', Crypt::encrypt($data->id)) }}" method="POST" style="display:none;">
                        @csrf
                    </form>

                </div>
            </div> -->

            <div class="seller_content_wrapper pt-0">
                <div class="row">
                    <div class="col-12 py-2">
                        <div class="nav nav-pills seller_tabs mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v_pills_seller_1-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_1" type="button" role="tab"
                                aria-controls="v_pills_seller_1" aria-selected="true">
                                <span>ABOUT</span>
                            </button>
                            <button class="nav-link" id="v_pills_seller_2-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_2" type="button" role="tab" aria-controls="v_pills_seller_2"
                                aria-selected="false">
                                <span>SERVICE DETAILS</span>
                            </button>
                            <button class="nav-link" id="v_pills_seller_3-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_3" type="button" role="tab" aria-controls="v_pills_seller_3"
                                aria-selected="false">
                                <span>LOCATION DETAILS</span>
                            </button>
                            <button class="nav-link" id="v_pills_seller_4-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_4" type="button" role="tab" aria-controls="v_pills_seller_4"
                                aria-selected="false">
                                <span>PHOTOS</span>
                            </button>
                            <button class="nav-link" id="v_pills_seller_5-tab" data-bs-toggle="pill" data-bs-target="#v_pills_seller_5" type="button" role="tab" aria-controls="v_pills_seller_5"
                                aria-selected="false">
                                <span>VIDEOS</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 pb-3">
                        <div class="row mb-2">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 pe-0">
                                <div class="seller_profile_img">
                                    <img src="{{ asset('service-profile/' . $data->ser_profile) }}" alt="img" class="img-fluid" />

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 ps-0">
                                <div class="seller_profile_text_box text-center">
                                    <h1>{{ $data->full_name }}</h1>
                                    <!-- <p>{{ $data->website_url }}</p> -->
                                    <p><i class="fa fa-phone me-2" aria-hidden="true" style="color: #b18d61; font-size: 17px;"></i> {{ $data->number }}</p>
                                    <p><i class="fa fa-envelope me-2" aria-hidden="true"  style="color: #b18d61; font-size: 17px;"></i>{{ $data->service_semail }}</p>
                                    <p>{{ $data->user_address }}</p>
                                    <hr>
                                    <div class="social_icons mt-3">
                                        <a href="{{ $data->facebook }}" target="_blank" title="Facebook"><img src="/assets/images/facebook.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $data->youtube }}" target="_blank" title="Youtube"><img src="/assets/images/youtube.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $data->tiktok }}" target="_blank" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $data->insta }}" target="_blank" title="Instagram"><img src="/assets/images/instagram.png" alt="img" class="img-fluid" /></a>
                                        <a href="{{ $data->zillow }}" target="_blank" title="Website"><img src="/assets/images/website-icon-11.png" alt="img" class="img-fluid" /></a>
                                        
                                    </div>
                                    <div class="top_action__flex">
                                        <a href="{{ route('start.conversation', ['receiver_id' => $data->User_id, 'product_id' => $data->id, 'product_type' => 'services']) }}" target="_blank" class="seller_chat_btn">CHAT WITH SERVICE PROVIDER</a>
                                    
                                        <label class="heart_checkbox_wrapper d-block align-item-center">
                                            <input type="checkbox" class="heartCheckbox" hidden {{ (auth()->check() && $data->serviceFavs->isNotEmpty()) ? 'checked' : '' }} />
                                            <i class="fa fa-heart{{ (auth()->check() && $data->serviceFavs->isNotEmpty()) ? ' filled' : '-o' }} icon_heart" aria-hidden="true"></i>
                                        </label>
                                        <form class="favorite-form" action="{{ route('service.favorite', Crypt::encrypt($data->id)) }}" method="POST" style="display:none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                        

                        <style>
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
                                                        flex-shrink: 0;
                                                    }
                                                .preview_flex {
                                                    width: 100%;
                                                    display: flex;
                                                    justify-content: space-between;
                                                    gap: 10px;
                                                    height: 470px;
                                                }
                                                .u_box img {
                                                    width: 100%; /* fixed width */
                                                    height: 100%; /* fixed height */
                                                    object-fit: cover; /* maintain aspect ratio, crop if needed */
                                                }
                                                .new_flex {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            gap: 10px;
            flex-direction: column;
            width: 150px;
            overflow-y: auto;
            overflow-x: hidden;
        }
                                                .preview_bax {
                                                    width: calc(100% - 110px);
                                                    padding: 10px;
                                                    background: #1f233b;
                                                    border-radius: 8px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                }
                                                .preview_bax img {
                                                                width: 100%;
                                                                height: 100%;
                                                                object-fit: cover;
                                                            }
                                                            
                                                            a#doc-download-btn-cert {
background: transparent;
    color: #1d2139;
    border: 2px solid #1d2139;
    border-radius: 0;
    font-size: 20px;
}
                                            </style>

                        <div class="tab-content" id="seller_pills-tabContent">
                            <div class="tab-pane fade show active" id="v_pills_seller_1" role="tabpanel" aria-labelledby="v_pills_seller_1-tab">
                                <div class="profile_tabs__one">
                                    <!-- Experience Section -->
                                    <div class="experience-section">
                                        <div class="experience-item">
                                            <div class="experience-label">EXPERIENCE</div>
                                            <div class="experience-value">{{ $data->experience }} Years</div>
                                        </div>
                                        <div class="experience-item">
                                            <div class="experience-label">LANGUAGES SPOKEN</div>
                                            <div class="languages">
                                                @foreach (explode(',', $data->Languages) as $item)
                                                    {{ $item }}@if (!$loop->last)
                                                        |
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- About Section -->
                                    <div class="about-section">
                                        <div class="new_heading_bar">
                                            <h2>ABOUT:</h2>
                                        </div>
                                        <div class="about-text">
                                            <?= $data->per_bio ?>
                                        </div>
                                        <!-- Certifications Section -->
                                        <div class="certifications-section">
                                        <div class="new_heading_bar">
                                            <h2>CERTIFICATIONS / ACCREDITATIONS :</h2>
                                        </div>
                                        
                                        <div class="preview_flex">
                                            <!-- MAIN PREVIEW AREA -->
                                            <div class="preview_bax" style="min-height: 300px; display: flex; align-items: center; justify-content: center; background: #f9f9f9; border: 1px solid #ddd; margin-bottom: 15px; position: relative;">
                                                
                                                <!-- 1. Image Preview (Default) -->
                                                @php
                                                    $certifications = json_decode($data->certifications, true);
                                                    $defaultCert = "";
                                                    $isDefaultImage = false;
                                                    
                                                    if (!empty($certifications) && is_array($certifications)) {
                                                        $firstCert = $certifications[0];
                                                        $firstCertExt = strtolower(pathinfo($firstCert, PATHINFO_EXTENSION));
                                                        
                                                        if (in_array($firstCertExt, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                                            $defaultCert = asset('certification_images/' . $firstCert);
                                                            $isDefaultImage = true;
                                                        }
                                                    }
                                                @endphp
                                    
                                                <img id="main-preview-cert" src="{{ $defaultCert }}" alt="img" class="img-fluid" style="{{ !$isDefaultImage ? 'display:none;' : '' }}" />
                                    
                                                <!-- 2. PDF Iframe Preview (Hidden by default) -->
                                                <iframe id="pdf-preview-frame-cert" src="" style="display:none; width:100%; height:100%; border:none;"></iframe>
                                    
                                                <!-- 3. Document Icon & Download Button Container (Hidden by default) -->
                                                <div id="doc-preview-container-cert" style="display:none; text-align:center;">
                                                    <i id="doc-preview-icon-cert" class="fa fa-file-word-o" style="font-size:80px; color:#2b579a; margin-bottom: 20px;"></i>
                                                    <p id="doc-preview-filename-cert" style="margin-bottom: 15px; font-weight:bold; color:#555; font-size: 16px;"></p>
                                                    <a id="doc-download-btn-cert" href="#" target="_blank" class="btn btn-primary">
                                                        <i class="fa fa-download"></i> Download Document
                                                    </a>
                                                </div>
                                    
                                                <!-- Placeholder Text -->
                                                @if(empty($defaultCert) && !empty($certifications))
                                                <p id="placeholder-text-cert" class="text-muted">Select a document from the sidebar to view.</p>
                                                @endif
                                            </div>
                                    
                                            <!-- SIDEBAR THUMBNAILS -->
                                            <div class="new_flex" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                @if (!empty($certifications) && is_array($certifications))
                                                    @foreach ($certifications as $cert)
                                                        @php
                                                            $filePath = asset('certification_images/' . $cert);
                                                            $extension = strtolower(pathinfo($cert, PATHINFO_EXTENSION));
                                                        @endphp
                                    
                                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                            <!-- Image Thumbnail -->
                                                            <a href="javascript:void(0)" class="certificate-item u_box cert-preview-trigger" data-type="image" data-src="{{ $filePath }}">
                                                                <img src="{{ $filePath }}" alt="img" class="img-fluid">
                                                            </a>
                                                        
                                                        @elseif($extension == 'pdf')
                                                            <!-- PDF Thumbnail -->
                                                            <a href="javascript:void(0)" class="certificate-item u_box cert-preview-trigger" data-type="pdf" data-src="{{ $filePath }}" data-name="{{ $cert }}">
                                                                <i class="fa fa-file-pdf-o" style="font-size:65px;color:#e74c3c;"></i>
                                                            </a>
                                                        
                                                        @elseif(in_array($extension, ['doc', 'docx']))
                                                            <!-- DOC Thumbnail -->
                                                            <a href="javascript:void(0)" class="certificate-item u_box cert-preview-trigger" data-type="doc" data-src="{{ $filePath }}" data-name="{{ $cert }}">
                                                                <i class="fa fa-file-word-o" style="font-size:65px;color:#2b579a;"></i>
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="v_pills_seller_2" role="tabpanel" aria-labelledby="v_pills_seller_2-tab">
                                <div class="profile_tabs__one">

                                    <!-- About Section -->
                                    <div class="about-section">
                                        <!--<h2 class="about-title">SERVICES DETAILS:</h2>-->
                                        
                                        <div class="new_heading_bar">
                                            <h2>SERVICES DETAILS:</h2>
                                        </div>
                                        <div class="about-text mb-5">
                                            <?= $data->service_desc ?>
                                        </div>

                                        <!--<h2 class="about-title">ADDITIONAL SERVICES OFFERED:</h2>-->
                                        
                                        <div class="new_heading_bar">
                                            <h2>ADDITIONAL SERVICES OFFERED:</h2>
                                        </div>
                                        <div class="about-text">
                                            <div class="row">
                                                {{-- @php
                                                    $serviceList = explode(',', $data->services_offered); // [".]
                                                    $filtered = array_filter($serviceList, function ($item) {
                                                        return strlen($item) > 10;
                                                    });
                                                    $chunks = array_chunk($filtered, 2);
                                                @endphp --}}

                                                @php
                                                    // Services explode
                                                    $serviceList = explode(',', $data->services_offered ?? '');

                                                    // Custom services add kar do same array me
                                                    $customServices = [
                                                        $data->custom_service_1 ?? null,
                                                        $data->custom_service_2 ?? null,
                                                        $data->custom_service_3 ?? null,
                                                        $data->custom_service_4 ?? null,
                                                    ];

                                                    // Merge both arrays
                                                    $allServices = array_merge($serviceList, $customServices);

                                                    // Remove empty & small values
                                                    $filtered = array_filter($allServices, function ($item) {
                                                        return !empty($item) && strlen($item) > 2;
                                                    });

                                                    $filtered = array_values($filtered);
                                                    // Chunk in 2 items per column
                                                    $chunks = array_chunk($filtered, 2);
                                                @endphp

                                                <!-- First Column -->
                                                @foreach ($chunks as $chunk)
                                                    <div class="col-md-4">
                                                        <ul class="list-unstyled">
                                                            @foreach ($chunk as $item)
                                                                <li>- {{ Str::title(Str::replace('_', ' ', $item)) }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="v_pills_seller_3" role="tabpanel" aria-labelledby="v_pills_seller_3-tab">
                                <div class="address_tabs_sec">
                                    <!-- Text Section -->
                                    <div class="text-section">
                                        <!--<h2 class="mb-2">BUSINESS PHYSICAL LOCATION:</h2>-->
                                        <div class="new_heading_bar">
                                            <h2>BUSINESS PHYSICAL LOCATION:</h2>
                                        </div>
                                        <p class="mb-2">
                                            {{ $data->service_address . ' ' . ($data->service_city ?? '') . ', '}}
                                        </p>
                                        {{-- @dd($data->service_state) --}}

                                        @php
                                            $state = $data->service_state ?? 'alabama (AL)';

                                            preg_match('/(.*?)\s*\((.*?)\)/', $state, $matches);

                                            $stateName = $matches[1] ?? $state;
                                            $stateCode = $matches[2] ?? '';
                                        @endphp
                                        <p class="mb-2">
                                            {{ ($stateName ?? '') . ' ' . ($data->zip_code ?? '') }}
                                        </p>
                                        <!--<h2 class="mb-2">Service Location:</h2>-->
                                        
                                         <div class="new_heading_bar">
                                            <h2>Service LOCATION:</h2>
                                        </div>
                                        <ul class="mb-2">
                                            @php
                                                $aboutPrices = $data->service_location ? explode(',', $data->service_location) : [];
                                            @endphp
                                            @foreach ($aboutPrices as $price)
                                                <li>{{ $price }}</li>
                                            @endforeach
                                            {{-- <li>{{ $data->service_address }} , {{ $data->state }}</li> --}}
                                        </ul>

                                        <!--<h2 class="mb-2">Service Area Coverd:</h2>-->
                                        
                                        <div class="new_heading_bar">
                                            <h2>Service Area Coverd:</h2>
                                        </div>
                                        {{-- <div class="d-flex gap-5">
                                            <ul class="mb-4">
                                                <li>Sussex County</li>
                                                <li>Morris County</li>
                                                <li>Warren County</li>
                                                <li>Lafayette</li>
                                                <li>Newton</li>
                                            </ul>
                                            <ul class="mb-4">
                                                <li>Morristown</li>
                                                <li>Somerset County</li>
                                                <li>Fredon</li>
                                                <li>Branchville</li>
                                                <li>Union County</li>
                                            </ul>
                                        </div> --}}
                                        @php
                                            $features = is_array($data->features) ? $data->features : ($data->features ? json_decode($data->features, true) : []);

                                            $features = array_values(array_filter($features)); // remove empty
                                            $chunks = array_chunk($features, 5); // 5 per column
                                        @endphp

                                        <div class="d-flex gap-5">
                                            @foreach ($chunks as $chunk)
                                                <ul class="mb-4">
                                                    @foreach ($chunk as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="map-section">
                                        @php
                                            $fullAddress = $data->service_address . ' ' . ($data->service_city ?? '') . ' ' . ($stateName ?? '') . ' ' . ($data->zip_code ?? '');
                                            $encodedAddress = urlencode(trim($fullAddress));
                                        @endphp
                                        
                                        @if(!empty(trim($fullAddress)))
                                            <div id="map-container">
                                                <iframe
                                                    id="business-map"
                                                    src="https://maps.google.com/maps?q={{ $encodedAddress }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                    allowfullscreen="" 
                                                    loading="lazy"
                                                    style="border:0; width:100%; height:500px;">
                                                </iframe>
                                            </div>
                                            
                                            <div id="map-error-message" style="display: none; padding: 30px 20px; background: #fafafa; color: #666666; border: 1px dashed #dddddd; border-radius: 8px; text-align: center; font-size: 14px;">
                                                <div style="font-size: 24px; color: #999999; margin-bottom: 10px;">🗺️</div>
                                                <h4 style="margin: 0 0 5px 0; color: #333333; font-size: 16px; font-weight: 600;">Map view is temporarily unavailable for this address.</h4>
                                                <p style="margin: 0;">Please see the address details provided on the left.</p>
                                            </div>
                                    
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    var address = "{{ addslashes(trim($fullAddress)) }}";
                                                    
                                                    // Fetch request to check if the address exists globally using OpenStreetMap
                                                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            if (data.length === 0) {
                                                                // Hide the map container and display the professional fallback message
                                                                document.getElementById('map-container').style.display = 'none';
                                                                document.getElementById('map-error-message').style.display = 'block';
                                                            }
                                                        })
                                                        .catch(error => {
                                                            // Keep showing the default map if the API check fails or times out
                                                            console.log("Location verification skipped or failed, showing default map.");
                                                        });
                                                });
                                            </script>
                                        @else
                                            <div style="padding: 20px; text-align: center; color: #666;">
                                                No location address available.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <style>
                                /* Gallery Overlay */
                                .fancybox-overlay {
                                    display: none;
                                    position: fixed;
                                    z-index: 9999;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    background: rgba(0, 0, 0, 0.9);
                                    align-items: center;
                                    justify-content: center;
                                }
                                
                                /* Container for Image */
                                .fancy-img-container {
                                    max-width: 80%;
                                    max-height: 80%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                }
                                
                                #fancy-main-img {
                                    max-width: 100%;
                                    max-height: 90vh;
                                    border: 3px solid #fff;
                                    border-radius: 4px;
                                    box-shadow: 0 0 20px rgba(0,0,0,0.5);
                                    transition: transform 0.3s ease;
                                }
                                
                                /* Navigation Buttons */
                                .fancy-nav {
                                    position: absolute;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    color: white;
                                    font-size: 50px;
                                    font-weight: bold;
                                    cursor: pointer;
                                    padding: 20px;
                                    text-decoration: none;
                                    user-select: none;
                                    transition: 0.3s;
                                }
                                
                                .fancy-nav:hover { color: #ffc107; }
                                .fancy-prev { left: 20px; }
                                .fancy-next { right: 20px; }
                                
                                /* Close Button */
                                .fancy-close {
                                    position: absolute;
                                    top: 20px;
                                    right: 40px;
                                    color: white;
                                    font-size: 50px;
                                    cursor: pointer;
                                    transition: 0.3s;
                                }
                                
                                .fancy-close:hover { color: #f44336; }
                            </style>

                            <div class="tab-pane fade" id="v_pills_seller_4" role="tabpanel" aria-labelledby="v_pills_seller_4-tab" tabindex="0">
                                <div class="image-grid">
                                    @php
                                        $certifications = json_decode($data->ser_gallery, true);
                                    @endphp

                                    @if (!empty($certifications) && is_array($certifications))
                                        @foreach ($certifications as $cert)
                                            <a href="javascript:void(0)" class="gallery-trigger" data-index="{{ $cert }}">
                                                <img src="{{ asset('storage/uploads/services/' . $cert) }}" alt="img" class="gallery-item" />
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @php
                                $videos = !empty($data->demo_link) ? explode(',', $data->demo_link) : [];
                            @endphp

                            <div class="tab-pane fade" id="v_pills_seller_5" role="tabpanel" aria-labelledby="v_pills_seller_5-tab" tabindex="0">
                                <div class="new_heading_bar">
                                    <i class="fa fa-video-camera me-2" aria-hidden="true" style="color: #1f2339; font-size: 22px;"></i>
                                    <h2>VIDEOS</h2>
                                </div>
                                <div class="row">
                                    <div class="col-12"> 
                                        <div class="videoplay_max_box mb-0">
                                            <iframe 
                                                id="mainPlayer"
                                                width="100%" 
                                                height="450" 
                                                src="https://www.youtube.com/embed/{{ $firstVideoId ?? '' }}"
                                                frameborder="0" 
                                                allow="autoplay; encrypted-media" 
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                
                                    <div class="col-12">
                                        <div class="thumbnail_flex">
                                            <div class="video_click_box">
                                                @if (count($videos) > 0)
                                                    @foreach ($videos as $video)
                                                        @php
                                                            $url = trim($video);
                                                            $videoId = null;
                                                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $match)) {
                                                                $videoId = $match[1];
                                                            }
                                                        @endphp
                                    
                                                        @if ($videoId)
                                                            <div class="mb-2 thumbnail-wrapper" 
                                                                 style="cursor: pointer; position: relative;" 
                                                                 onclick="changeVideo('{{ $videoId }}')">
                                                                <img src="https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg" 
                                                                     class="img-fluid rounded shadow-sm" 
                                                                     alt="video thumbnail">
                                                                     <div class="play_overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                                                                                    <i class="fa fa-play-circle" style="font-size: 40px; color: white; opacity: 0.8;"></i>
                                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <div class="text-center py-5">
                                                        <h5 class="text-muted">No videos available</h5>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="side_box_one">
                            <div class="box_title">
                                <h2>Services offered<h2>
                            </div>
                            <ul>
                                @php
                                    $services = collect(explode(',', $data->services_offered));
                                @endphp

                                @foreach ($filtered as $item)
                                    @if ($loop->iteration > 9)
                                        <li>
                                            <span class="me-3">
                                                <img src="/assets/images/h_icon.png" alt="img" class="img-fluid">
                                            </span>
                                            <a href="#!" class="view_btn">View All</a>
                                        </li>
                                        @break
                                    @endif
{{-- @dd($item) --}}
                                    <li>
                                        <span class="me-3">
                                            <img src="/assets/images/h_icon.png" alt="img" class="img-fluid">
                                        </span>
                                        {{ Str::title(Str::replace('_', ' ', $item)) }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="side_box_one pt-4">
                            <div class="box_title">
                                <h2>Pricing<h2>
                            </div>
                            @if ($data->pricing_type == 'Varying Price per Service')
                                <h6>{{ $data->pricing_type }}</h6>
                            @else
                                <h5>{{ $data->pkg_price }}</h5>
                                <h6>{{ $data->pricing_type }}</h6>
                            @endif
                            <h4>Payment Accepted</h4>
                            <ul>
                                @foreach (explode(',', $data->payment_method) as $item)
                                    <li><span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid"></span>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div id="fancybox-modal" class="fancybox-overlay">
        <span class="fancy-close">&times;</span>
        
        <a class="fancy-nav fancy-prev">&#10094;</a>
        <div class="fancy-img-container">
            <img id="fancy-main-img" src="" alt="Gallery Image">
        </div>
        <a class="fancy-nav fancy-next">&#10095;</a>
    
        <div id="fancy-caption"></div>
    </div>

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
    <script>
        document.querySelectorAll('.heartCheckbox').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                this.nextElementSibling.classList.toggle('filled', this.checked);
            });
        });
    </script>
    
    
<script>
$(document).ready(function() {
    
    // Helper function to reset all preview elements for Certifications
    function resetCertPreviewArea() {
        $('#main-preview-cert').hide();
        $('#pdf-preview-frame-cert').hide().attr('src', ''); // Clear src to stop loading
        $('#doc-preview-container-cert').hide();
        $('#placeholder-text-cert').hide();
    }

    // Unified Click Event for Certifications Thumbnails
    $('.cert-preview-trigger').on('click', function(e) {
        e.preventDefault();
        
        var type = $(this).data('type'); // 'image', 'pdf', or 'doc'
        var src = $(this).data('src');
        var name = $(this).data('name');

        resetCertPreviewArea();

        if (type === 'image') {
            // Show Image
            $('#main-preview-cert').attr('src', src).show();
        } 
        else if (type === 'pdf') {
            // Show PDF in Iframe
            $('#pdf-preview-frame-cert').attr('src', src).show();
        } 
        else if (type === 'doc' || type === 'docx') {
            // Show Doc Icon and Download Button
            $('#doc-preview-filename-cert').text(name);
            $('#doc-download-btn-cert').attr('href', src);
            
            // Set Icon based on extension if needed
            $('#doc-preview-icon-cert').attr('class', 'fa fa-file-word-o').css('color', '#2b579a');
            
            $('#doc-preview-container-cert').show();
        }
    });
});
</script>


<script>
function changeVideo(videoId) {
    const mainPlayer = document.getElementById('mainPlayer');
    // Naya URL set karein autoplay ke sath
    const newSrc = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";
    
    mainPlayer.src = newSrc;
    
    // Smooth scroll back to top if needed
    window.scrollTo({
        top: mainPlayer.offsetTop - 100,
        behavior: 'smooth'
    });
}
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
    gsap.registerPlugin(ScrollTrigger);

    // 1. Pinning Logic
    let st = ScrollTrigger.create({
        trigger: ".seller_tabs", 
        start: "top top",            
        pin: true,                   
        pinSpacing: false,           
        endTrigger: "section.view_detail_page", 
        end: "bottom top+=100",      
        toggleClass: "pills-fixed",
    });

    const tabButtons = document.querySelectorAll('button[data-bs-toggle="pill"]');
    
    tabButtons.forEach(button => {
        // JAB TAB BADAL JAYE
        button.addEventListener('shown.bs.tab', function (event) {
            // GSAP ko batao ke content ki height change ho gayi hai
            ScrollTrigger.refresh();

            // CONTENT KO TOP PAR LE JANE KE LIYE:
            // Hum page ko scroll karke wahan le jayenge jahan pinned tabs start hote hain
            window.scrollTo({
                top: st.start, // Yeh tabs ka original top position hai
                behavior: 'smooth' // Smooth scroll ke liye
            });
        });

        // Click event se default anchors ko prevent karein
        button.addEventListener('click', function(e) {
            // Agar page scroll ho chuka hai, toh browser ka auto-jump rokein
            if(window.scrollY > st.start) {
                // Hum scroll manual handle kar rahe hain upar 'shown.bs.tab' mein
            }
        });
    });
</script>
<script>
$(document).ready(function() {
    var images = [];
    var currentIndex = 0;

    // 1. Function jo page ki saari relevant images ko collect karega
    function refreshGalleryArray() {
        images = [];
        $('.gallery-trigger img.gallery-item').each(function() {
            images.push($(this).attr('src'));
        });
    }

    // 2. Event Delegation: Page par kahin bhi click ho, agar class match hui toh trigger hoga
    $(document).on('click', '.gallery-trigger', function(e) {
        e.preventDefault();
        
        // Har baar click hone par array refresh karein taaki nayi images bhi shamil ho sakein
        refreshGalleryArray();
        
        var clickedSrc = $(this).find('img.gallery-item').attr('src');
        currentIndex = images.indexOf(clickedSrc);

        if (currentIndex !== -1) {
            openLightbox(currentIndex);
        }
    });

    function openLightbox(index) {
        $('#fancy-main-img').attr('src', images[index]);
        $('#fancybox-modal').css('display', 'flex');
        $('body').css('overflow', 'hidden'); 
    }

    // 3. Next Button Logic
    $('.fancy-next').on('click', function(e) {
        e.stopPropagation(); // Modal band hone se rokne ke liye
        currentIndex = (currentIndex + 1) % images.length;
        updateImage();
    });

    // 4. Prev Button Logic
    $('.fancy-prev').on('click', function(e) {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage();
    });

    function updateImage() {
        $('#fancy-main-img').fadeOut(200, function() {
            $(this).attr('src', images[currentIndex]).fadeIn(200);
        });
    }

    // 5. Close Modal
    $('.fancy-close, #fancybox-modal').on('click', function(e) {
        // Sirf tab band ho jab overlay ya close button par click ho (image par nahi)
        if (e.target !== this && !$(e.target).hasClass('fancy-close')) return;
        
        $('#fancybox-modal').hide();
        $('body').css('overflow', 'auto');
    });

    // 6. Keyboard Support
    $(document).keydown(function(e) {
        if ($('#fancybox-modal').is(':visible')) {
            if (e.keyCode == 37) $('.fancy-prev').click(); 
            if (e.keyCode == 39) $('.fancy-next').click(); 
            if (e.keyCode == 27) $('#fancybox-modal').click(); 
        }
    });
});
</script>
@endsection
