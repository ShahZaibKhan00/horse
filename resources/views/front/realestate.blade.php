@extends($isModal ? 'layouts.blank' : 'layouts.app') @section('content')
    <style>
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
            font-size: 38px;
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
            background: #bf9855;
            background: linear-gradient(180deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            border-radius: 8px;
        }

        .horse_name_bar p span {
            font-weight: 700;
            color: #1d2139;
            font-size: 14px;
            padding: 22px 20px;
            background: #bf9855;
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
            height: 230px;
            object-fit: cover;
        }

        .img_radius_two {
            border-radius: 0px;
            overflow: hidden;
            height: 365px;
            object-fit: cover;
        }

        .relative_img_box {
            position: relative;
            padding: 0;
            border-bottom: 0;
        }

        .detail_left .relative_img_box .horse_arrow {
            display: none;
        }

        .relative_img_box h3 {
            font-size: 17px;
            font-family: "AvenirNextLTPro-Regular";
            padding: 4px 34px;
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

        .horser_share_btn_flex {
            display: flex;
            gap: 15px;
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

        .horse_info_btn:hover {
            background: #1d2139;
            color: #fff;
        }

        .horser_information_box {
            background: #1d2139;
            border-radius: 0px;
            border: 2px solid #1d2139;
        }

        .horser_information_box.mb-0 {
            background: #fff;
            border-bottom: 0;
            border: 0;
            padding: 10px 0px;
        }

        .horser_information_box.horser_information_box_one,
        .img_radius_ext {
            height: 700px;
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

        .horse_list_card_btn_flex.v1 .horse_card_btn {
            width: 30%
        }

        .horse_list_card_btn_flex.v1 .fvrt_btn {
            width: 30%;
            justify-content: center;
        }

        .horser_information_box ul li {
            text-transform: uppercase;
            color: white;
            margin-bottom: 6px;
            font-size: 15px;
            list-style: none;
            border: 1px solid #1d2139;
            padding: 8px;
            text-align: start;
            display: flex;
            justify-content: flex-start;
            align-items: center;
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
            padding: 0px 0px 10px 0px;
        }

        .view_detail_page .nav-pills .nav-link {
            background: 0 0;
            border-radius: 5px !important;
            width: 12%;
            height: 55px;
            border: 1px solid #d6d8d9;
            font-size: 12px;
            font-weight: 800;
            color: #1d2139;
            padding: 0px 5px;
            /*box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px inset;*/
        }

        .view_detail_page .nav-pills .nav-link.active,
        .view_detail_page .nav-pills .show>.nav-link {
            color: #fff !important;
            background-color: #1d2139 !important;
            border-color: #1d2139;
        }

        .flex-row.nav-pills {
            flex-direction: row !important;
            justify-content: space-between;
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

        /* Eye icon with FA 4.7.0 using ::after */
        .image-grid a::after {
            content: "\f06e";
            /* FA 4.7.0 eye icon */
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

        .image-grid a:hover::after {
            opacity: 1;
        }

        .image-grid a img {
            transition: filter 0.3s ease;
        }

        .image-grid a:hover img {
            filter: brightness(0.7);
        }

        .image-grid img {
            width: 100%;
            height: 295px;
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

        .view_detail_page .heading65px h1 {
            font-family: "AvenirLTStd-Book";
            font-size: 30px;
            margin: 0;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 300;
        }

        .view_detail_page .heading65px img {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            max-width: 60px;
        }

        /*.border_box_one {*/
        /*    border: 3px solid #1d2139;*/
        /*    padding: 20px;*/
        /*}*/

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

        /*.border_box_one ul li {*/
        /*    font-size: 13px;*/
        /*    color: #1d2139;*/
        /*    list-style: none;*/
        /*    display: flex;*/
        /*    align-items: center;*/
            /* margin: 5px; */
        /*    font-family: "AvenirLTStd-Medium";*/
        /*    padding: 20px 50px;*/
        /*    width: 307px;*/
        /*    box-shadow: rgba(50, 50, 93, 0.1) 0px 20px 40px -12px inset, rgba(0, 0, 0, 0.1) 0px 12px 24px -18px inset;*/
        /*    border: 2px solid #1d2139;*/
        /*}*/

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

        .border_box_one.ppe_border_box .horse_info_btn {
            width: 300px !important;
            font-size: 14px;
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

        .search_all_btn {
            width: 160px;
            height: 50px;
            margin-top: 40px;
        }

        .search_all_btn span {
            font-size: 18px;
        }

        .view_detail_page .product_clm .pro_img {
            margin-bottom: 0px;
            border-bottom: none;
            height: 200px;
        }

        .seller_tab .horse_info_btn {
            max-width: 300px;
            width: 100%;
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
            border-radius: 15px;
        }

        .social_icons a img {
            max-width: 20px;
        }

        .social_icons a:active {
            background: #ccc;
        }

        .seller_action_btn_flex .horse_info_btn {
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
            border: 1px solid #1d2139 !important;
            border-radius: 0px;
            color: #1d2139;
            font-weight: 800;
            font-family: "AvenirNextLTPro-Bold";
        }

        .seller_action_btn_flex .horse_info_btn.active,
        .seller_action_btn_flex .horse_info_btn:hover {
            background: #1d2139;
            color: #fff;
            border-color: #1d2139;
        }

        .nav-tabs {
            border-bottom: 0px;
        }

        .seller_action_btn_flex a:first-child {
            background: #1d2139;
            color: #fff;
            border-color: #1d2139;
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

        .horser_action_info_btn:hover {
            background: #fff;
            color: #1d2139;
        }

        .horser_action_info_btn.action_btn, .horse_info_btn.fvrt_btn.action_btn {
            width: 28%;
            font-size: 16px;
            /* font-family: "AvenirNextLTPro-Bold"; */
            font-weight: 600;
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
            height: 400px;
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

        .sold_abs_box h1 {
            font-family: var(--pp_mori_semi);
            font-size: 85px;
            margin: 0;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke: 1px white;
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
            font-size: 150px;
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
            padding: 15px 5px;
        }

        .bottom_text h2 {
            margin: 0;
            font-family: "AvenirNextLTPro-Regular";
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 400;
        }

        .chat_btn {
            max-width: 300px;
            margin: 0 auto;
        }

        .blank_box {
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            padding: 100px 20px;
        }

        .text_border {
            font-size: 30px;
            text-shadow: -1px 0 0 #ba9148, 1px 0 0 #ba9148, 0 -1px 0 #ba9148, 0 1px 0 #ba9148, -1px -1px 0 #ba9148, 1px -1px 0 #ba9148, -1px 1px 0 #ba9148, 1px 1px 0 #ba9148;
            line-height: 1;
        }

        .info_list {
            margin: 0px;
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

        .horser_information_box .info_list_one li {
            color: #1d2139;
            font-size: 13.5px;
        }

        .info_list.v1 li {
            font-size: 13px;
            color: #000000;
            margin: 3px 0px;
            font-weight: 500;
            padding: 7px;
            margin-bottom: 8px;
            display: flex;
        }

        .horser_information_box .info_list_one li span {
            margin-left: 6px;
            font-style: normal;
            text-transform: uppercase;
            font-weight: 600;
        }

        .horser_information_box .info_list_two li {
            color: #fff;
        }

        .gen_list_flex_one {
            max-width: 100%;
        }

        .border_box_one .gen_list_flex_one li {
            font-size: 14px;
            color: #1d2139;
            list-style: none;
            display: flex;
            align-items: center;
            flex-direction: column;
            /* margin: 5px; */
            font-family: "AvenirLTStd-Medium";
            padding: 20px 21px;
            width: 307px;
            position: relative;
        }

        .border_box_one .gen_list_flex_one li p {
            margin: 0;
        }

        .border_box_one .gen_list_flex_one li span {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
        }

        .h_tages {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            font-weight: 700;
        }

        .h_tages p,
        .h_tages span {
            font-family: "AvenirNextLTPro-Regular";
            font-size: 18px;
            color: #fff;
            margin: 0;
        }

        .auction_btn {
            width: 100%;
            max-width: 200px;
        }

        .common_btn,
        .common_btn:focus {
            border-color: #1d2139;
            color: #1d2139;
            font-family: "AvenirNextLTPro-Bold";
        }

        .common_btn:hover {
            border-color: #1d2139;
            color: #fff;
        }

        .top_blue_strip {
            background: #1d2139;
            padding: 35px 5px 10px 5px;
            position: relative;
        }

        .blue_stripe {
            position: relative;
            margin-bottom: 5px;
        }

        .blue_stripe i {
            position: absolute;
            font-size: 18px;
            top: 50%;
            transform: translateY(-50%);
            right: 20px;
            color: red;
        }

        .top_blue_strip .heading44px {
            font-family: "AvenirNextLTPro-Bold";
            color: white;
            text-align: center;
            text-transform: uppercase;
            margin: 0;
        }

        .horser_information_box.type_one {
            padding: 5px;
        }

        .about_horse_heading,
        .seller_tab .heading44px {
            font-family: "AvenirNextLTPro-Bold";
        }

        .social_icons a.web_btn {
            width: 90px;
            color: var(--primeColor);
            font-weight: 700;
            border-radius: 12px;
        }

       .product_clm .heading22px {
            font-size: 18px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
        }

        .seller_desc {
            font-size: 14px;
            margin: 0 !important;
            margin-bottom: 10px !important;
            height: 105px;
            overflow-y: auto;
        }

        .horse_list_card .text_box .top_list li {
            font-size: 13px;
        }

        .horse_list_card_btn_flex_new.bottom_row {
            display: flex;
            gap: 5px;
        }

        /* .content_scroll {
                                            height: 100%;
                                            overflow-y: auto;
                                            overflow-x: hidden;
                                            padding: 0px 10px 0px 10px;
                                        } */
        /*.content_scroll {*/
        /*    height: 100%;*/
        /*    overflow-y: auto;*/
        /*    padding-right: 10px;*/
        /*}*/

        .content_scroll::-webkit-scrollbar {
            width: 6px;
        }

        .content_scroll::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }

        .detail_left {
            width: 100%;
            background: #fff;
            z-index: 1;
            margin-top: 10px;
            position: relative;
        }

        .sale_tag {
            font-size: 18px;
            font-family: "AvenirNextLTPro-Regular";
            font-weight: 700;
            padding: 8px 25px;
            background: #bf9855;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            position: absolute;
            top: -10px;
            left: -10px;
            width: fit-content;
            text-transform: uppercase;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 0;
            z-index: 999;
            color: #1d2139;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        .detail_right {
            /*max-height: 818px;*/
            /*overflow-y: auto;*/
            overflow-x: hidden;
            padding-top: 10px;
            background: #fff;
            /*z-index: 2;*/
            position: relative;
        }

        .reg {
            font-size: 22px;
        }

        .horse_list_card {
            margin: 5px;
        }

        @keyframes pulse-border {
            0% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                opacity: 1;
            }

            100% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                opacity: 0;
            }
        }

        .horse_arrow {
            background: transparent;
            border: 0;
            font-size: 40px;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 9999;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .horse_arrow.right {
            right: 10px;
        }

        .horse_arrow.left {
            left: 10px;
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

        .seller_tab .nav-item {
            width: 300px;
        }

         .mem_blue_stripe {
            /* background: #1d2139; */
            padding: 10px 10px 20px 10px;
            text-align: center;
            border-bottom: 3px solid #ab8d35;
            /*max-width: 95%;*/
            /*margin: 0 auto;*/
        }

        .mem_blue_stripe h2 {
            font-family: 'Inter', sans-serif;
            font-size: 30px;
            margin: 0;
            margin-bottom: 0px;
            color: #1d2139;
        }

        .real_icon_box img {
            max-width: 20px;
            margin-right: 10px;
        }

        .barn-table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
            border: 1px solid #d6d8d9;
            table-layout: fixed;
        }

        .barn-table tr:nth-child(odd) {
            background-color: #fff;
            color: #1d2139;
        }

       .barn-table tr:nth-child(even) {
            background-color: #1d213903;
            color: #1f2339;
        }

        .barn-table td {
            padding: 14px 16px;
            font-size: 14px;
            font-weight: 800;
            vertical-align: top;
            border: 1px solid #d6d8d9;
            word-wrap: break-word;
        }
        table tbody tr {
            border-bottom: 1px solid #d6d8d9;
        }
        .card_about_heading {
            font-size: 18px;
            margin-bottom: 00px;
        }

        .about_sm_desc {
            font-size: 12px;
            overflow-y: auto;
            max-height: 130px;
        }

        .icon_heart {
            position: absolute;
            font-size: 25px;
            top: 10px;
            right: 10px;
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon_heart.filled {
            color: #c09957;
        }

        .horser_ad_inner_container {
            /*max-width: 1320px;*/
            /*margin: 0 auto;*/
        }

        .fvrt_btn {
            font-size: 16px;
            font-weight: 600;
            
            border: 0;
        }

        .fvrt_btn:hover {
            color: #fff!important;
        }

        .amenities_flex {
            white-space: nowrap;
            width: 100%;
            text-overflow: ellipsis;
            overflow: hidden;
            justify-content: flex-start;
            margin: 0;
            display: flex;
        }

        #horseTabsContent {
            padding: 0 20px;
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
            text-transform: uppercase;
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
        
        .border_box_one {
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
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
        .preview_bax {
            width: calc(100% - 110px);
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
            width: 100%;
            height: 100%;
            object-fit: cover;
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
        
        
        .fixed_bar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: #fff; /* Background color zaroori hai taake scroll content niche se nazar na aaye */
        padding: 10px 0;
        margin-bottom: 20px !important;
        border-bottom: 1px solid #ddd; /* Optional: Separator line */
        }
        .fixed_bar {
            background: #fff;
            z-index: 1000;
            width: 100%;
            border-bottom: 1px solid #ddd;
            /* transition for smooth background/shadow effect */
            transition: box-shadow 0.3s ease;
        }
        
        
        .video_click_box {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .thumbnail_wrapper {
            flex: 0 0 calc((100% - 40px) / 5);
        }

        @media only screen and (max-width: 1799px) {
            .reg {
                font-size: 18px;
            }

            .horser_information_box {
                padding: 15px;
            }

            .horser_information_box ul li {
                margin-bottom: 8px;
                font-size: 15px;
                padding: 5px 20px;
            }

            .horser_information_box .info_list_one li span {
                margin-left: 0px;
            }

            .horse_list_card_btn_flex {
                flex-wrap: wrap;
                justify-content: center;
            }

            .horse_list_card .fvrt_btn {
                width: 85px;
                font-size: 12px;
            }

            .horse_list_card .horse_card_btn {
                width: 85px;
                height: 45px;
                font-size: 14px;
            }

            .price_Text {
                font-size: 26px;
            }

            .h_tages p,
            .h_tages span {
                font-size: 14px;
                font-weight: 700;
            }

            .view_detail_page .nav-pills .nav-link {
                height: 45px;
                font-size: 12px;
                padding: 0px 10px;
                margin: 0;
            }

            .image-grid img {
                height: 250px;
            }

            .videoplay_box img {
                height: 355px;
            }

            .border_box_one ul li {
                padding: 10px 18px;
                width: 218px;
            }

            .border_box_one .gen_list_flex_one li {
                font-size: 12px;
                padding: 10px 20px;
                width: 217px;
            }

            .border_box_one ul li span img {
                max-width: 18px;
            }

            .border_box_one iframe {
                width: 100%;
                height: 295px;
            }

            .view_detail_page .heading65px h1 {
                font-size: 35px;
            }



            .heading65px.monte_carlo.fw_400.mb-4.odd_heading h1 {
                font-size: 26px;
            }

            .product_clm .pro_img {
                height: 170px;
            }

            .product_clm .heading22px {
                font-size: 18px;
                margin-bottom: 5px;
            }

            .product_clm .fvrt_btn {
                width: 115px;
                height: 40px;
                font-size: 13px;
                border: 1px solid #1d2139;
            }
            .product_clm .fvrt_btn:hover {
                color: #1d2139;
            }

            .horse_card_btn {
                width: 115px;
                height: 36px;
                font-size: 13px;
            }

            .about_horse_heading,
            .seller_tab .heading44px {
                font-size: 30px;
            }

            .view_detail_page .horse_list_card .img_box {
                height: 150px;
            }

            .info_list li {
                font-size: 13px;
                display: flex;
                margin-bottom: 10px;
            }

            .card_about_heading {
                font-size: 16px !important;
                margin-bottom: 00px;
            }

            .about_sm_desc {
                height: 80px;
                overflow-y: auto;
            }

            .view_detail_page .container {
                max-width: 100%;
            }

            .horse_list_card .text_box .top_list li {
                font-size: 11px;
            }

            .ppe_xray_box {
                max-width: 187px;
            }

            /* Add white outline using a pseudo-element */
            .sold_abs_box h1::before {
                font-size: 130px;
            }

            .bottom_text h2 {
                font-size: 14px;
            }

            .view_detail_page {
                position: relative;
                padding-top: 10px !important;
            }


            .video-play-button {
                width: 24px;
                height: 32px;
                padding: 12px 14px 12px 20px;
            }

            .video-play-button:before,
            .video-play-button:after {
                width: 65px;
                height: 65px;
            }

            .video-play-button span {
                border-left: 14px solid #fff;
                border-top: 9px solid transparent;
                border-bottom: 9px solid transparent;
                top: 7px;
                left: 4px;
            }

            .blue_stripe h2 {
                font-size: 2px;
            }
        }
    </style>
    
     <style>
                                    .border_box_one.p-.border_box_one_neww {
                                        padding: 20px;
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
                                    .border_box_one_neww td {
                                        border: 1px solid #eeeeee;
                                        padding: 12px;
                                        font-size: 0.9rem;
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
                                    }
                                    .border_box_one_neww .multi-col {
                                        background-color: #fff;
                                    }
                                    a#doc-download-btn {
                                    background: transparent!important;
                                            color: #1d2139!important;
                                            border: 2px solid #1d2139!important;
                                            border-radius: 0!important;
                                            font-size: 18px!important;
                                    }
                                </style>

    
    <section class="view_detail_page">
        <div class="container">
            <div class="horser_ad_inner_container">
                <div class="row">
                    
                    <div class="col-12">
                        <div class="fixed_bar">
                            @php
                                    // Original value
                                    $location = $data['real_location'];

                                    // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                    if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                        $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                    } else {
                                        $displayLocation = ''; // agar nahi ha to empty
                                    }
                                @endphp
                            <div class="mem_blue_stripe mb-4">
                                <h2 class="">{{ $data->real_farm_name ?? $data['real_title'] }}, {{ $displayLocation }} </h2>
                            </div>
                            <div class="nav flex-row nav-pills mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-detail_1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_1" type="button" role="tab"
                                    aria-controls="v-pills-detail_1" aria-selected="true">
                                    ALL PHOTOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_2" type="button" role="tab" aria-controls="v-pills-detail_2"
                                    aria-selected="false">
                                    VIDEOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_3" type="button" role="tab" aria-controls="v-pills-detail_3"
                                    aria-selected="false">
                                    DESCRIPTION
                                </button>
                                <button class="nav-link" id="v-pills-detail_4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_4" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    FACILITY AMENITIES
                                </button>
                                <button class="nav-link" id="v-pills-detail_5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_5" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    PROPERTY AMENITIES
                                </button>
                                <button class="nav-link" id="v-pills-detail_6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_6" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    DOCUMENTS
                                </button>
                                <button class="nav-link" id="v-pills-detail_7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_7" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    LOCATION
                                </button>
                                <button class="nav-link" id="v-pills-detail_8-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_8" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    AGENT | SELLER INFO
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="detail_left">
                            <h3 class="sale_tag">{{ $data->ad_type }}</h3>
                            <div class="top_blue_strip">
                                {{-- @php
                                    // Original value
                                    $location = $data['real_location'];

                                    // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                    if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                        $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                    } else {
                                        $displayLocation = ''; // agar nahi ha to empty
                                    }
                                @endphp --}}
                                @php
                                    // Original value
                                    $location = $data['real_location'];

                                    // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                    if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                        $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                    } else {
                                        $displayLocation = ''; // agar nahi ha to empty
                                    }
                                @endphp
                                <h3 class="heading44px fw_700 text_border">{{ $data['real_title'] }}, {{ $displayLocation }} </h3>
                                {{-- ?? 'Undefined' }} , {{ $displayLocation }}</h3> --}}
                                <label class="heart_checkbox_wrapper d-block">
                                    <input type="checkbox" class="heartCheckbox" hidden {{ $data->favorites->isNotEmpty() ? 'checked' : '' }} />
                                    <i class="fa fa-heart{{ $data->favorites->isNotEmpty() ? ' filled' : '-o' }} icon_heart" aria-hidden="true"></i>
                                </label>
                            </div>
                            <div class="relative_img_box">
                                <div class="swiper horse_swiper_one">
                                    <div class="swiper-wrapper">
                                        @if(!empty($data->featured_image))
                                            <div class="swiper-slide"><img src="{{ asset('Featured_imgs/' . $data->featured_image) }}" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                        @else
                                            <div class="swiper-slide"><img src="/assets/images/farm_3.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                        @endif

                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <div class="horser_information_box mb-0">
                                <div class="custome_listing_row">
                                    <div class="custome_listing_col">
                                        <ul class="info_list_one">
                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid" /></span> <span>{{ $data->real_acres ?? '' }}
                                                    Acres</span></li>
                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid" /></span>
                                                <span>{{ $data->real_bedroom ?? '' }} Bedrooms </span>
                                            </li>
                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid" /></span>
                                                <span>{{ $data->real_bathroom ?? '' }} Baths </span>
                                            </li>
                                            @php
                                                $garageTypes = explode(',', $data->garage_type ?? '');
                                            @endphp
                                             <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid" /></span> <span>
                                                    {{ $data->num_spaces }} Car Garage
                                                </span></li> 
                                                
                                                {{-- <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid" /></span> <span>
                                                    {{ $data->num_spaces }}
                                                    {{ collect($garageTypes)->map(fn($item) => ucwords(strtolower($item)))->implode(', ') }}
                                                </span></li> --}}
                                        </ul>
                                    </div>
                                    <div class="custome_listing_col">
                                        <ul class="info_list_one">
                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_5.png" alt="img" class="img-fluid" /></span> <span>{{ $data->num_barn ?? 0 }}
                                                    Barn</span></li>
                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_6.png" alt="img" class="img-fluid" /></span>
                                                <span>{{ $data->num_stalls ?? 0 }} Stalls </span>
                                            </li>
                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_7.png" alt="img" class="img-fluid" /></span> <span>Indoor :
                                                    {{ $data->in_ride_ring ?? '' }} </span></li>
                                            <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_8.png" alt="img" class="img-fluid" /></span> <span>Pastures:
                                                    {{ $data->num_fenced_grass ?? '' }}</span></li> 
                                        </ul>
                                    </div>
                                    
                                </div>
                                <style>
                                    .long_point ul li {
                                        text-transform: uppercase;
                                        color: white;
                                        margin-bottom: 6px;
                                        font-size: 15px;
                                        list-style: none;
                                        border: 1px solid #1d2139;
                                        padding: 8px;
                                        text-align: start;
                                        display: flex;
                                        justify-content: flex-start;
                                        align-items: center;
                                        color: #1d2139;
                                        font-size: 14px;
                                    }
                                    .videoplay_max_box iframe {
                                        border-radius: 5px;
                                    }
                                </style>
                                   <!-- <div class="custome_listing_col w-100 long_point">
                                        <ul class="info_list_one">
                                            <li class=""><span class="real_icon_box"><img src="/assets/images/realestate_icon_8.png" alt="img" class="img-fluid" /></span> <span>Pastures:
                                                    {{ $data->num_fenced_grass ?? '' }}</span></li>
                                            <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid" /></span> <span>
                                                    {{ $data->num_spaces }}
                                                    {{ collect($garageTypes)->map(fn($item) => ucwords(strtolower($item)))->implode(', ') }}
                                                </span></li>
                                                
                                            </ul>
                                    </div> -->
                            </div>

                            <div class="horser_information_box type_one">
                                <h3 class="heading30px price_Text">PRICE : {{ $data->real_price }}</h3>

                                <div class="horser_information_btn_flex">
                                    <a href="#!" class="horser_action_info_btn action_btn w-50">SELLER’S PROFILE</a>
                                    <a href="#!" class="horser_action_info_btn action_btn w-50">CHAT WITH SELLER</a>
                                </div>
                                <div class="horser_information_btn_flex mt-2">
                                    <a href="#!" class="horser_action_info_btn action_btn w-50">SHARE</a>
                                    <form action="{{ route('farm.favorite', Crypt::encrypt($data['id'])) }}" class="horser_action_info_btn horse_card_btn favorite-form w-50" method="POST">
                                        @csrf
                                        <button class="fvrt_btn text-light" type="button" title="Add to favorite">
                                            {{ $data->favorites->isNotEmpty() ? 'Favorited ' : 'Favorite ' }}<i class="fa fa-heart{{ $data->favorites->isNotEmpty() ? '' : '-o' }}" aria-hidden="true" style="{{ $data->favorites->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4"><img src="/assets/images/ad-img.jpg" alt="img" class="img-fluid" /></div>
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
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content_scroll detail_right ">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-detail_1" role="tabpanel" aria-labelledby="v-pills-detail_1-tab">
                                    <div class="image-grid">
                                        @php
                                            $images = json_decode($data->gallery_imgs, true);
                                        @endphp
                                        @if (!empty($images))
                                            @foreach ($images as $image)
                                                
                                                <a href="javascript:void(0)" class="gallery-trigger" data-index="{{ $image }}">
                                                    <img src="{{ asset('Gallery_imgs/' . $image) }}" alt="img"  class="gallery-item"/>
                                                </a>
                                            @endforeach
                                        @endif
                                        {{-- @if (!empty($images) && isset($images[0]))
                                            <a href="{{ asset('Gallery_imgs/' . $images[0]) }}">
                                                <img src="{{ asset('Gallery_imgs/' . $images[0]) }}" alt="img" class="" />
                                            </a>
                                        @endif --}}
                                    </div>
                                    <p class="heading18px text-center mt-4"><strong>CLICK PICTURE TO ENLARGE</strong></p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-detail_2" role="tabpanel" aria-labelledby="v-pills-detail_2-tab">
                                    <div class="new_heading_bar">
                                        <i class="fa fa-video-camera me-2" aria-hidden="true" style="color: #1f2339; font-size: 22px;"></i>
                                        <h2>VIDEOS</h2>
                                    </div>
                                    <div class="row">
                                            @php
                                                if (!function_exists('getYoutubeId')) {
                                                    function getYoutubeId($url) {
                                                        $url = trim($url);
                                                        if (preg_match('/v=([a-zA-Z0-9_-]+)/', $url, $matches)) return $matches[1];
                                                        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) return $matches[1];
                                                        if (preg_match('/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) return $matches[1];
                                                        return null;
                                                    }
                                                }
                                        
                                                
                                                $videoUrls = !empty($data->video_url) ? explode(',', $data->video_url) : [];
                                                $firstVideoId = count($videoUrls) > 0 ? getYoutubeId($videoUrls[0]) : '';
                                            @endphp
                                        
                                            <div class="col-12 mb-4">
                                                <div class="videoplay_max_box mb-0">
                                                    <iframe 
                                                        id="mainPlayer"
                                                        width="100%" 
                                                        height="450" 
                                                        src="{{ $firstVideoId ? 'https://www.youtube.com/embed/' . $firstVideoId : '' }}"
                                                        frameborder="0" 
                                                        allow="autoplay; encrypted-media" 
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        
                                            <div class="col-12 mt-4">
                                                <p class="heading18px mb-3"><strong>MORE VIDEOS</strong></p>
                                                <div class="video_click_box">
                                                    @if (!empty($videoUrls))
                                                        @foreach ($videoUrls as $url)
                                                            @php $videoId = getYoutubeId($url); @endphp
                                        
                                                            @if($videoId)
                                                   
                                                                    <div class="thumbnail_wrapper" 
                                                                         style="cursor: pointer; position: relative; overflow: hidden; border-radius: 8px;" 
                                                                         onclick="changeVideo('{{ $videoId }}')">
                                                                        
                                                                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.2); display: flex; align-items: center; justify-content: center; z-index: 2;">
                                                                            <i class="fa fa-play-circle" style="color: #fff; font-size: 40px; opacity: 0.8;"></i>
                                                                        </div>
                                        
                                                                        <img src="https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg" 
                                                                             alt="Video Thumbnail" 
                                                                             class="img-fluid w-100 shadow-sm">
                                                                    </div>
                                                    
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <div class="text-center py-5 w-100">
                                                            <h5 class="text-muted">No videos available</h5>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-detail_3" role="tabpanel" aria-labelledby="v-pills-detail_3-tab">
                                    <div class="mb-4 border_box_one">
                                        <!--<h3 class="heading44px fw_700 about_horse_heading">About:</h3>-->
                                        <div class="new_heading_bar">
                                            
                                            <h2>About:</h2>
                                        </div>
                                        <p>
                                            {!! $data->property_overview !!}
                                        </p>
                                    </div>

                                    <div class="mb-4">
                                        <!--<div class="heading65px monte_carlo fw_400 mb-4">-->
                                        <!--    <h1>ADDITIONAL INFORMATION</h1>-->
                                        <!--    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />-->
                                        <!--</div>-->
                                        
                                        
                                        <div class="mb-4 border_box_one">
                                            <div class="new_heading_bar">
                                            
                                                <h2>ADDITIONAL INFORMATION</h2>
                                            </div>
                                            <p>
                                                {!! $data->ad_write_up !!}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                
                               
                                <div class="tab-pane fade" id="v-pills-detail_4" role="tabpanel" aria-labelledby="v-pills-detail_4-tab">
                                    <div class="mb-4">
                                        <!--<div class="heading65px monte_carlo fw_400 mb-4">-->
                                        <!--    <h1>FACILITY AMENITIES</h1>-->
                                        <!--    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />-->
                                        <!--</div>-->
                                        
                                        <div class="new_heading_bar">
                                            
                                            <h2>FACILITY AMENITIES</h2>
                                        </div>
                                        <p>All information is deemed reliable but not guaranteed. Buyer to verify all information.</p>

                                        <div class="border_box_one  border_box_one_neww">
                                            <h2>Barn</h2>
                                            <table>
                                                <tr>
                                                    <td class="label">Barn Type:</td>
                                                    <td class="value" colspan="5">{{ $data->property_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Barns:</td>
                                                    <td class="value" colspan="5">{{ $data->num_barn }}</td>
                                                </tr>
                                                @php
                                                    $fencingTypes = explode(',', $data->barn_flooring);
                                                @endphp
                                                <tr>
                                                    <td class="label">Barn Flooring:</td>
                                                    @for ($i = 0; $i <= 1; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="value" colspan="{{ $i == 1 ? 3 : 2 }}">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="value" colspan="{{ $i == 1 ? 3 : 2 }}"></td>
                                                        @endif
                                                    @endfor
                                                    
                                                    <!--<td class="value" colspan="2">Rubber</td>-->
                                                    <!--<td class="value" colspan="3">Concrete</td>-->
                                                </tr>
                                                <tr>
                                                    <td class="label">Air Conditioned Barn:</td>
                                                    <td class="value" colspan="5">{{ $data->air_condition_barn }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Heated Barn:</td>
                                                    <td class="value" colspan="5">{{ $data->heated_barn ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Wash Stall:</td>
                                                    <td class="value">{{ $data->wash_stall }}</td>
                                                    <td class="label">Cold Water:</td>
                                                    <td class="value">{{ $data->cold_water }}</td>
                                                    <td class="label">Hot Water:</td>
                                                    <td class="value">{{ $data->hot_water }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Tack Room:</td>
                                                    <td class="value">{{ $data->tack_room ?? 'No' }}</td>
                                                    <td class="label">Heated:</td>
                                                    <td class="value" colspan="3">{{ $data->heated_not }}</td>
                                                </tr>
                                                @php
                                                    $features = explode(',', $data->property_features ?? '');
                                                @endphp
                                                <tr>
                                                    <td class="label">Hay Storage:</td>
                                                    {{-- @php
                                                        $fencingTypes = explode(',', $data->hay_storage);
                                                    @endphp
                                                    @for ($i = 0; $i <= 2; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="value" colspan="{{ $i >= 2 ? 2 : 1 }}">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="value" colspan="{{ $i >= 2 ? 2 : 1 }}"></td>
                                                        @endif
                                                    @endfor --}}
                                                    @php
                                                        $fencingTypes = explode(',', $data->hay_storage ?? '');
                                                        $fencingTypes = array_filter(array_map('trim', $fencingTypes));
                                                        $fencingTypes = array_pad(array_values($fencingTypes), 5, ''); // Force exactly 4 items
                                                    @endphp

                                                    @foreach ($fencingTypes as $type)
                                                        <td class="value text-center">{{ !empty($type) ? ucfirst($type) : '' }}</td>
                                                    @endforeach

                                                    <!--<td class="value" colspan="1">Hay Loft</td>-->
                                                    <!--<td class="value" colspan="2">Hay Room</td>-->
                                                    <!--<td class="value" colspan="2">Additional Hay Barn</td>-->
                                                </tr>
                                            </table>
                                        
                                            <h2>Stalls</h2>
                                            <table>
                                                @php
                                                    $fencingTypes = explode(',', $data->stall_types);
                                                @endphp
                                                <tr>
                                                    <td class="label">Number of Stalls:</td>
                                                    <td class="value">{{ $data->num_stalls }}</td>
                                                    <td class="label">Sizes:</td>
                                                    @for ($i = 0; $i <= 1; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="value">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td<td class="value"></td>
                                                        @endif
                                                    @endfor
                                                    <!--<td class="value">Mini</td>-->
                                                    <!--<td class="value">Standard</td>-->
                                                </tr>
                                                <tr>
                                                    <td class="label">Rubber Mats in Stalls:</td>
                                                    <td class="value" colspan="4">{{ $data->rubber_matts ?? '' }}</td>
                                                </tr>
                                            </table>
                                        
                                            <h2>Turnout & Pastures</h2>
                                            <table>
                                                <tr>
                                                    <td class="label">Dry Lots:</td>
                                                    <td class="value">{{ $data->dry_lots ?? '' }}</td>
                                                    <td class="label">Quantity:</td>
                                                    <td class="value">{{ $data->num_lots ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Grass Pastures:</td>
                                                    <td class="value">{{ $data->fenced_grass ?? '' }}</td>
                                                    <td class="label">Quantity:</td>
                                                    <td class="value">{{ $data->num_fenced_grass ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Fencing Type:</td>@php
                                                        $fencingTypes = explode(',', $data->fencing);
                                                    @endphp
                                                    @for ($i = 0; $i <= 2; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="value">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="value"></td>
                                                        @endif
                                                    @endfor

                                                    <!--<td class="value">Electric</td>-->
                                                    <!--<td class="value">Wood</td>-->
                                                    <!--<td class="value">Metal</td>-->
                                                </tr>
                                                <tr>
                                                    <td class="label">Run in Sheds:</td>
                                                    <td class="value" colspan="3">{{ $data->run_shed ?? '' }}</td>
                                                </tr>
                                            </table>
                                            @php
                                                    $features = explode(',', $data->property_features ?? '');
                                                @endphp
                                            
                                            <h2>Riding Arenas</h2>
                                            <table>
                                                <tr>
                                                    <td class="label">Outdoor Riding Ring:</td>
                                                    <td class="value">{{ $data->out_ride_ring ?? '' }}</td>@php
                                                        $dimensions = explode(',', $data->out_dimensions);
                                                    @endphp
                                                    <td class="label">Size:</td>
                                                    <td class="value">{{ !empty($dimensions[0]) ? $dimensions[0] : '' }} &times; {{ !empty($dimensions[1]) ? $dimensions[1] : '' }}</td>
                                                    <td class="label">Watering System:</td>
                                                    <td class="value">{{ $data->out_water_system }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Indoor Riding Ring:</td>
                                                    <td class="value">{{ $data->in_ride_ring }}</td>@php
                                                        $dimensions = explode(',', $data->in_dimensions);
                                                    @endphp
                                                    <td class="label">Size:</td>
                                                    <td class="value">{{ !empty($dimensions[0]) ? $dimensions[0] : '' }} &times; {{ !empty($dimensions[1]) ? $dimensions[1] : '' }}</td>
                                                    <td class="label">Watering System:</td>
                                                    <td class="value">{{ $data->in_water_system }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Round Pen:</td>
                                                    <td class="value" colspan="5">{{ $data->round_pen }}</td>
                                                </tr>
                                            </table>
                                            
                                            
  
                                            <!--OLD TABLE <table class="barn-table">
                                                <tr>
                                                    <td>BARN TYPE :</td>
                                                    <td colspan="1">{{ $data->property_type }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>BARNS:</td>
                                                    <td>{{ $data->num_barn }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>
                                                @php
                                                    $fencingTypes = explode(',', $data->stall_types);
                                                @endphp
                                                <tr>
                                                    <td>STALLS:</td>
                                                    <td>{{ $data->num_stalls }}</td>
                                                    @for ($i = 0; $i <= 2; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="text-capitalize">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="text-capitalize"></td>
                                                        @endif
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    <td>RUBBER MATS IN STALLS:</td>
                                                    <td class="text-capitalize">{{ $data->rubber_matts ?? '' }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @php
                                                    $fencingTypes = explode(',', $data->barn_flooring);
                                                @endphp
                                                <tr>
                                                    <td>BARN FLOORING:</td>
                                                    @for ($i = 0; $i <= 3; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="text-capitalize">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="text-capitalize"></td>
                                                        @endif
                                                    @endfor
                                                    {{-- <td class="text-capitalize">{{ $data->barn_flooring ?? '' }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Red-in Shed:</td>
                                                    <td class="text-capitalize">{{ $data->run_shed ?? '' }}</td>
                                                    <td class="text-capitalize">{{ $data->num_sheds ?? '' }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">TACK ROOM:</td>
                                                    <td class="text-capitalize">{{ $data->tack_room ?? '' }}</td>
                                                    <td class="text-capitalize">Heated: {{ $data->heated_not }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td>WASH STALL:</td>
                                                    <td class="text-capitalize">{{ $data->wash_stall }}</td>
                                                    <td class="text-capitalize">Cold Water: {{ $data->cold_water }}</td>
                                                    <td class="text-capitalize">Hot Water: {{ $data->hot_water }}</td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td>AIR CONDITIONED BARN:</td>
                                                    <td class="text-capitalize">{{ $data->air_condition_barn }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td>HEATED BARN:</td>
                                                    <td class="text-capitalize">{{ $data->heated_barn ?? '' }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">DRY LOTS:</td>
                                                    <td class="text-capitalize">{{ $data->dry_lots ?? '' }}</td>
                                                    <td class="text-capitalize">{{ $data->num_lots ?? '' }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">GRASS PASTURES:</td>
                                                    <td class="text-capitalize">{{ $data->fenced_grass ?? '' }}</td>
                                                    <td class="text-capitalize">{{ $data->num_fenced_grass ?? '' }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">FENCING TYPE:</td>
                                                    @php
                                                        $fencingTypes = explode(',', $data->fencing);
                                                    @endphp
                                                    @for ($i = 0; $i <= 3; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="text-capitalize">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="text-capitalize"></td>
                                                        @endif
                                                    @endfor
                                                    {{-- @foreach ($fencingTypes as $type)
                                                        <td class="text-capitalize">{{ ucfirst($type) }}</td>
                                                    @endforeach --}}
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">OUTDOOR RIDING RING:</td>
                                                    <td class="text-capitalize">{{ $data->out_ride_ring ?? '' }}</td>
                                                    @php
                                                        $dimensions = explode(',', $data->out_dimensions);
                                                    @endphp
                                                    <td class="text-capitalize">
                                                        {{ !empty($dimensions[0]) ? $dimensions[0] : '' }}
                                                        {{ !empty($dimensions[0]) && !empty($dimensions[1]) ? ' × ' : '' }}
                                                        {{ !empty($dimensions[1]) ? $dimensions[1] : '' }}
                                                    </td>
                                                    {{-- <td class="text-capitalize">
                                                        {{ $dimensions[0] ?? '' }} × {{ $dimensions[1] ?? '' }}
                                                    </td> --}}
                                                    <td class="text-capitalize">Watering System: {{ $data->out_water_system }}</td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">INDOOR RIDING RING:</td>
                                                    <td class="text-capitalize">{{ $data->in_ride_ring }}</td>
                                                    @php
                                                        $dimensions = explode(',', $data->in_dimensions);
                                                    @endphp
                                                    <td class="text-capitalize">
                                                        {{ !empty($dimensions[0]) ? $dimensions[0] : '' }}
                                                        {{ !empty($dimensions[0]) && !empty($dimensions[1]) ? ' × ' : '' }}
                                                        {{ !empty($dimensions[1]) ? $dimensions[1] : '' }}
                                                    </td>
                                                    {{-- <td class="text-capitalize">{{ $dimensions[0] ?? '' }} × {{ $dimensions[1] ?? '' }}</td> --}}
                                                    <td class="text-capitalize">Watering System: {{ $data->in_water_system }}</td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize">ROUND PEN:</td>
                                                    <td class="text-capitalize">{{ $data->round_pen }}</td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                    <td class="text-capitalize"></td>
                                                </tr>
                                                @php
                                                    $features = explode(',', $data->property_features ?? '');
                                                @endphp
                                                <tr>
                                                    <td class="text-capitalize">Hay Storage:</td>
                                                    @php
                                                        $fencingTypes = explode(',', $data->hay_storage);
                                                    @endphp
                                                    @for ($i = 0; $i <= 3; $i++)
                                                        @if (!empty($fencingTypes[$i]))
                                                            <td class="text-capitalize">{{ ucfirst($fencingTypes[$i]) }}</td>
                                                        @else
                                                            <td class="text-capitalize"></td>
                                                        @endif
                                                    @endfor
                                                </tr>
                                            </table> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-detail_5" role="tabpanel" aria-labelledby="v-pills-detail_5-tab">
                                    <div class="mb-4">
                                        <!--<div class="heading65px monte_carlo fw_400 mb-4">-->
                                        <!--    <h1>PROPERTY AMENITIES </h1>-->
                                        <!--    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />-->
                                        <!--</div>-->
                                        
                                        <div class="new_heading_bar">
                                            
                                            <h2>PROPERTY AMENITIES</h2>
                                        </div>
                                        <p>All information is deemed reliable but not guaranteed. Buyer to verify all information.</p>

                                        <div class="border_box_one border_box_one_neww">
                                            <h2>Home & Living</h2>
                                            <table>
                                                <tr>
                                                    <td class="label">House Type:</td>
                                                    <td class="value" colspan="3">{{ $data->property_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Acreage:</td>
                                                    <td class="value" colspan="3">{{ $data->real_acres ?? '' }} Acres</td>
                                                </tr>
                                                <tr>
                                                    <td class="label"># of Bedrooms:</td>
                                                    <td class="value" colspan="3">{{ $data->real_bedroom ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label"># of Bathrooms:</td>
                                                    <td class="value" colspan="3">{{ $data->real_bathroom ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Garage:</td>
                                                    <td class="value">{{ $data->num_spaces }}</td>@php
                                                        $garageTypes = explode(',', $data->garage_type ?? '');
                                                    @endphp
                                                    <td class="label">Details:</td>
                                                    <td class="value">{{ collect($garageTypes)->map(fn($item) => ucwords(strtolower($item)))->implode(', ') }}
</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Pool:</td>
                                                    <td class="value" colspan="3">{{ in_array('pool', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Hot Tub:</td>
                                                    <td class="value" colspan="3">{{ in_array('hot_tub', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Pond:</td>
                                                    <td class="value" colspan="3">{{ in_array('pond', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">River:</td>
                                                    <td class="value" colspan="3">{{ in_array('river', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Trails on Property:</td>
                                                    <td class="value" colspan="3">{{ in_array('trails', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Trail Access:</td>
                                                    <td class="value" colspan="3">{{ in_array('trail_access', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Hay Fields:</td>
                                                    <td class="value" colspan="3">{{ in_array('hay_fields', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="label">Extra Housing:</td>
                                                    <td class="value" colspan="3">{{ in_array('extra_housing', $features) ? 'Yes' : 'No' }}</td>
                                                </tr>
                                            </table>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <!--OLD TABLE <table class="barn-table">
                                                <tr>
                                                    <td class="label">HOUSE TYPE :</td>
                                                    <td>{{ $data->property_type }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">ACREAGE:</td>
                                                    <td>{{ $data->real_acres ?? '' }} Acres</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label"># OF BEDROOMS:</td>
                                                    <td>{{ $data->real_bedroom ?? '' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label"># OF BATHROOMS:</td>
                                                    <td>{{ $data->real_bathroom ?? '' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">GARAGE:</td>
                                                    <td>{{ $data->num_spaces }}</td>
                                                    @php
                                                        $garageTypes = explode(',', $data->garage_type ?? '');
                                                    @endphp
                                                    {{-- @dd($garageTypes) --}}

                                                    <td>
                                                        {{ collect($garageTypes)->map(fn($item) => ucwords(strtolower($item)))->implode(', ') }}
                                                    </td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="label">EXTRA HOUSING:</td>
                                                    <td>Yes</td>
                                                    <td></td>
                                                </tr> --}}
                                                <tr>
                                                    <td class="label">POOL:</td>
                                                    <td>{{ in_array('pool', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label">HOT TUB:</td>
                                                    <td>{{ in_array('hot_tub', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label text-uppercase">pond:</td>
                                                    <td>{{ in_array('pond', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label text-uppercase">river:</td>
                                                    <td>{{ in_array('river', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label text-uppercase">TRAILS ON PROPERTY:</td>
                                                    <td>{{ in_array('trails', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label text-uppercase">Trail Access:</td>
                                                    <td>{{ in_array('trail_access', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label text-uppercase">Hay Fields:</td>
                                                    <td>{{ in_array('hay_fields', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="label text-uppercase">Extra Housing:</td>
                                                    <td>{{ in_array('extra_housing', $features) ? 'Yes' : 'No' }}</td>
                                                    <td></td>
                                                </tr>
                                            </table> -->
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-detail_6" role="tabpanel" aria-labelledby="v-pills-detail_6-tab">
                                    <div class="mb-4">
                                        <div class="new_heading_bar">
                                            <h2>DOCUMENTS</h2>
                                        </div>
                                        <div class="border_box_one">
                                            <div class="row mb-4 gy-4"></div>
                                            
                                            <div class="preview_flex">
                                                <!-- MAIN PREVIEW AREA -->
                                                <div class="preview_bax" style="min-height: 300px; display: flex; align-items: center; justify-content: center; background: #f9f9f9; border: 1px solid #ddd; margin-bottom: 15px; position: relative;">
                                                    
                                                    <!-- 1. Image Preview (Default) -->
                                                    @php
                                                        $files = json_decode($data->property_document, true);
                                                        $defaultProp = "";
                                                        $isDefaultImage = false;
                                                        if (!empty($files) && is_array($files)) {
                                                            $firstFile = $files[0];
                                                            $firstExt = strtolower(pathinfo($firstFile, PATHINFO_EXTENSION));
                                                            if (in_array($firstExt, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                                                $defaultProp = asset('Property_documents/' . $firstFile);
                                                                $isDefaultImage = true;
                                                            }
                                                        }
                                                    @endphp
                                                    
                                                    <img id="main-preview-prop" src="{{ $defaultProp }}" alt="img" class="img-fluid" style="{{ !$isDefaultImage ? 'display:none;' : '' }}" />
                                
                                                    <!-- 2. PDF Iframe Preview (Hidden by default) -->
                                                    <iframe id="pdf-preview-frame" src="" style="display:none; width:100%; height:100%; border:none;"></iframe>
                                
                                                    <!-- 3. Document Icon & Download Button Container (Hidden by default) -->
                                                    <div id="doc-preview-container" style="display:none; text-align:center;">
                                                        <i id="doc-preview-icon" class="fa fa-file-word-o" style="font-size:80px; color:#2b579a; margin-bottom: 20px;"></i>
                                                        <p id="doc-preview-filename" style="margin-bottom: 15px; font-weight:bold; color:#555; font-size: 16px;"></p>
                                                        <a id="doc-download-btn" href="#" target="_blank" class="btn btn-primary">
                                                         Download File
                                                        </a>
                                                    </div>
                                
                                                    <!-- Placeholder Text if nothing selected initially and no default image -->
                                                    @if(empty($defaultProp) && !empty($files))
                                                    <p id="placeholder-text-prop" class="text-muted">Select a document from the sidebar to view.</p>
                                                    @endif
                                                </div>
                                
                                                <!-- SIDEBAR THUMBNAILS -->
                                                <div class="new_flex">
                                                    @if (!empty($files))
                                                        @foreach ($files as $file)
                                                            @php
                                                                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                $filePath = asset('Property_documents/' . $file);
                                                            @endphp
                                
                                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                                <!-- Image Thumbnail -->
                                                                <a href="javascript:void(0)" class="u_box prop-preview-trigger" data-type="image" data-src="{{ $filePath }}">
                                                                    <img src="{{ $filePath }}" alt="img" class="img-fluid" />
                                                                </a>
                                                            
                                                            @elseif($extension == 'pdf')
                                                                <!-- PDF Thumbnail -->
                                                                <a href="javascript:void(0)" class="u_box prop-preview-trigger" data-type="pdf" data-src="{{ $filePath }}" data-name="{{ $file }}">
                                                                    <i class="fa fa-file-pdf-o" style="font-size:65px;color:#e74c3c;"></i>
                                                                </a>
                                                            
                                                            @elseif(in_array($extension, ['doc', 'docx']))
                                                                <!-- DOC Thumbnail -->
                                                                <a href="javascript:void(0)" class="u_box prop-preview-trigger" data-type="doc" data-src="{{ $filePath }}" data-name="{{ $file }}">
                                                                    <i class="fa fa-file-word-o" style="font-size:65px;color:#2b579a;"></i>
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No Files Or Documents Found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-detail_7" role="tabpanel" aria-labelledby="v-pills-detail_7-tab">
                                    <div class="mb-4">
                                        <!--<div class="heading65px monte_carlo fw_400 mb-4">-->
                                        <!--    <h1>LOCATION</h1>-->
                                        <!--    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />-->
                                        <!--</div>-->
                                        
                                        <div class="new_heading_bar">
                                            
                                            <h2>LOCATION</h2>
                                        </div>

                                        <div class="border_box_one border-0 p-0 shadow-none">
                                            @php
                                                // Fetching the exact real_location string passed from the backend context
                                                $backendStateLocation = trim($data['real_location'] ?? 'alabama (AL)');
                                                
                                                // Appending region context to ensure strict map pinning boundaries
                                                $cleanMapRegionQuery = $backendStateLocation . ' USA';
                                                $encodedMapRegionQuery = urlencode($cleanMapRegionQuery);
                                            @endphp
                                    
                                            @if(!empty($backendStateLocation))
                                                <div id="dynamic-map-container" class="border_box_one border-0 p-0" style="border-radius: 10px; overflow: hidden;">
                                                    <iframe
                                                        id="business-dynamic-map"
                                                        src="https://maps.google.com/maps?q={{ $encodedMapRegionQuery }}&t=&z=6&ie=UTF8&iwloc=&output=embed"
                                                        style="border: 0; width: 100%; height: 450px;" 
                                                        allowfullscreen="" 
                                                        loading="lazy" 
                                                        referrerpolicy="no-referrer-when-downgrade">
                                                    </iframe>
                                                </div>
                                    
                                                <div id="dynamic-map-error" style="display: none; padding: 30px 20px; background: #fafafa; color: #666666; border: 1px dashed #dddddd; border-radius: 8px; text-align: center; font-size: 14px;">
                                                    <div style="font-size: 24px; color: #999999; margin-bottom: 10px;">🗺️</div>
                                                    <h4 style="margin: 0 0 5px 0; color: #333333; font-size: 16px; font-weight: 600;">Map Preview Unavailable</h4>
                                                    <p style="margin: 0;">Please refer to the physical address details listed on this page.</p>
                                                </div>
                                    
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        var locationQueryString = "{{ addslashes($cleanMapRegionQuery) }}";
                                                        
                                                        // Triggering verification fetch sequence against OpenStreetMap index records
                                                        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(locationQueryString)}`)
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.length === 0) {
                                                                    // Manage visible display classes if structural layout fails
                                                                    document.getElementById('dynamic-map-container').style.display = 'none';
                                                                    document.getElementById('dynamic-map-error').style.display = 'block';
                                                                }
                                                            })
                                                            .catch(error => {
                                                                // Failsafe configuration layer fallback continuity rules
                                                                console.log("Map layout check skipped, displaying fallback element parameters.");
                                                            });
                                                    });
                                                </script>
                                            @else
                                                <div style="padding: 20px; text-align: center; color: #9ca3af;">
                                                    Location details are currently unavailable.
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <!--<div class="heading65px monte_carlo fw_400 mb-4 odd_heading">-->
                                        <!--    <h1>SERVICE PROVIDERS AROUND THIS AREA</h1>-->
                                        <!--    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />-->
                                        <!--</div>-->
                                        
                                        
                                         <div class="new_heading_bar">
                                            
                                            <h2>SERVICE PROVIDERS AROUND THIS AREA</h2>
                                        </div>

                                        <div class="row gy-4">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product_clm">
                                                    <div class="product_clm_img_box">
                                                        <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg" class="pro_img" width="" height=""
                                                            alt="" />
                                                        <div class="product_clm_img_hover_box">
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                                        </div>
                                                    </div>
                                                    <h5 class="heading22px primeColor">ABC Horse transport company</h5>
                                                    <p class="mb-0">(973) 555-555</p>
                                                    <a href="#!" class="webLink">www.abchorsetransport.com</a>
                                                    <div class="btn_set mt-3">
                                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                                        <label class="fvrt_btn">
                                                            <input type="checkbox" hidden />
                                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product_clm">
                                                    <div class="product_clm_img_box">
                                                        <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" class="pro_img" width="" height=""
                                                            alt="" />
                                                        <div class="product_clm_img_hover_box">
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                                        </div>
                                                    </div>
                                                    <h5 class="heading22px primeColor">ABC Horse transport company</h5>
                                                    <p class="mb-0">(973) 555-555</p>
                                                    <a href="#!" class="webLink">www.abchorsetransport.com</a>
                                                    <div class="btn_set mt-3">
                                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                                        <label class="fvrt_btn">
                                                            <input type="checkbox" hidden />
                                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="product_clm">
                                                    <div class="product_clm_img_box">
                                                        <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg" class="pro_img" width="" height=""
                                                            alt="" />
                                                        <div class="product_clm_img_hover_box">
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                                            <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                                        </div>
                                                    </div>
                                                    <h5 class="heading22px primeColor">ABC Horse transport company</h5>
                                                    <p class="mb-0">(973) 555-555</p>
                                                    <a href="#!" class="webLink">www.abchorsetransport.com</a>
                                                    <div class="btn_set mt-3">
                                                        <a href="#!" class="horse_card_btn">View Detail</a>
                                                        <label class="fvrt_btn">
                                                            <input type="checkbox" hidden />
                                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#!" class="search_all_btn"><span>Search All</span></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade seller_tab" id="v-pills-detail_8" role="tabpanel" aria-labelledby="v-pills-detail_8-tab">
                                    <!--<div class="d-flex justify-content-between align-items-center mb-4">-->
                                    <!--    <h3 class="heading44px fw_700 m-0">ABOUT THE AGENT | SELLER:</h3>-->
                                    <!--    <a href="#!" class="horse_info_btn">CHAT WIH SELLER</a>-->
                                    <!--</div>-->
                                    
                                     <div class="new_heading_bar">
                                            
                                            <h2>ABOUT THE AGENT | SELLER:</h2>
                                        </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            @php
                                                $defaultImage = 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg';
                                            @endphp

                                            @if (!empty($data->per_pic))
                                                @php
                                                    $photos = json_decode($data->per_pic, true);
                                                @endphp

                                                @foreach ($photos as $photo)
                                                    <div class="seller_img">
                                                        <img src="{{ asset('Personal_pictures/' . $photo) }}" alt="img" class="img-fluid"
                                                            onerror="this.onerror=null;this.src='{{ $defaultImage }}';" />
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="seller_img">
                                                    <img src="{{ $defaultImage }}" alt="img" class="img-fluid" />
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            {{-- <p class="seller_desc">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of
                                                type and scrambled it to make a type specimen book.
                                            </p> --}}

                                            <h1 class="heading18px mb-2">Social Links</h1>

                                            <div class="social_icons mb-3">
                                                <a href="{{ !empty($data->website_link) ? $data->website_link : 'javascript:;' }}" target="_blank" title="Website Link" class="web_btn">Website</a>
                                                <a href="{{ !empty($data->facebook) ? $data->facebook : 'javascript:;' }}" target="_blank" title="Facebook">
                                                    <img src="/assets/images/facebook.png" alt="img" class="img-fluid" />
                                                </a>

                                                <a href="{{ !empty($data->youtube) ? $data->youtube : 'javascript:;' }}" target="_blank" title="Youtube">
                                                    <img src="/assets/images/youtube.png" alt="img" class="img-fluid" />
                                                </a>

                                                <a href="{{ !empty($data->tiktok) ? $data->tiktok : 'javascript:;' }}" target="_blank" title="TikTok">
                                                    <img src="/assets/images/tik-tok.png" alt="img" class="img-fluid" />
                                                </a>

                                                <a href="{{ !empty($data->insta) ? $data->insta : 'javascript:;' }}" target="_blank" title="Instagram">
                                                    <img src="/assets/images/instagram.png" alt="img" class="img-fluid" />
                                                </a>
                                            </div>
                                            <h1 class="heading18px mb-2">Contact</h1>

                                            <div class="social_icons">
                                                <a href="tel:{{ $data->number }}"><img src="/assets/images/call.png" alt="img" class="img-fluid" /></a>
                                                <a href="mailto:{{ $data->email }}"><img src="/assets/images/email.png" alt="img" class="img-fluid" /></a>

                                            </div>
                                        </div>
                                    </div>

                                    <ul class="nav nav-tabs seller_action_btn_flex d-flex gap-2 mb-4" id="horseTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active horse_info_btn" id="for-sale-tab" data-bs-toggle="tab" data-bs-target="#for-sale" type="button" role="tab"
                                                aria-controls="for-sale" aria-selected="true">
                                                PROPERTIES FOR SALE ({{ $sale_count }})
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link horse_info_btn common_btn" id="sold-tab" data-bs-toggle="tab" data-bs-target="#sold" type="button" role="tab"
                                                aria-controls="sold" aria-selected="false">
                                                SOLD PROPERTIES ({{ $soldCount }})
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="horseTabsContent">
                                        <div class="tab-pane fade show active" id="for-sale" role="tabpanel" aria-labelledby="for-sale-tab">
                                            <div class="row gy-4">
                                                @foreach ($notSold as $state)
                                                    @php
                                                        // Original value
                                                        $location = $state['real_location'];

                                                        // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                                        if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                                            $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                                        } else {
                                                            $displayLocation = ''; // agar nahi ha to empty
                                                        }
                                                    @endphp
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <!-- <div class="horse_list_card">
                                                                    <div class="blue_stripe">
                                                                        <h2>{{ $state['real_title'] }}, {{ $displayLocation }}</h2>
                                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                                    </div>
                                                                    @php
                                                                        $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                                                    @endphp
                                                                    <div class="img_box">
                                                                        <div class="swiper">
                                                                            <div class="swiper-wrapper">
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
                                                                    </div>
                                                                    <div class="blue_stripe">
                                                                        <h3>Price: {{ $state['real_price'] }}</h3>
                                                                    </div>
                                                                    <div class="text_box">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <ul class="info_list v1">
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img"
                                                                                                        class="img-fluid"></span> {{ $state['real_acres'] }} Acres</li>
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img"
                                                                                                        class="img-fluid"></span> {{ $state['real_bedroom'] }} Bedrooms </li>
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img"
                                                                                                        class="img-fluid"></span> {{ $state['real_bathroom'] }} Baths</li>
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img"
                                                                                                        class="img-fluid"></span>{{ $state['num_spaces'] }}
                                                                                                {{ implode(' | ', array_slice(explode(',', $state['garage_type']), 0, 2)) }}
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <h5 class="heading44px card_about_heading">About</h5>
                                                                                        <p class="about_sm_desc">{!! $state->property_overview !!}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="horse_list_card_btn_flex v1">
                                                                            <a href="javascript:;" class="horse_card_btn">Pictures</a>
                                                                            <a href="javascript:;" class="horse_card_btn">Videos</a>
                                                                            <a href="javascript:;" class="horse_card_btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                        <div class="detail_left">
                                                            <h3 class="sale_tag">{{ $state->ad_type }}</h3>
                                                            <div class="top_blue_strip">
                                                                @php
                                                                    // Original value
                                                                    $location = $state['real_location'];

                                                                    // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                                                    if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                                                        $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                                                    } else {
                                                                        $displayLocation = ''; // agar nahi ha to empty
                                                                    }
                                                                @endphp
                                                                <h3 class="heading44px fw_700 text_border">{{ $state['real_title'] }}, {{ $displayLocation }}</h3>
                                                                {{-- ?? 'Undefined' }} , {{ $displayLocation }}</h3> --}}
                                                                <label class="heart_checkbox_wrapper d-block">
                                                                    <input type="checkbox" class="heartCheckbox" hidden />
                                                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                            @php
                                                                $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                                            @endphp
                                                            <div class="relative_img_box img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        @foreach ($images as $image)
                                                                            <div class="swiper-slide">
                                                                                <img src="{{ asset('Gallery_imgs/' . $image) }}" alt="img" class="img-fluid w-100 img_radius_one">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>

                                                            </div>
                                                            <div class="horser_information_box mb-0">
                                                                <div class="custome_listing_row">
                                                                    <div class="custome_listing_col">
                                                                        <ul class="info_list_one">
                                                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid" /></span>
                                                                                <span>{{ $state['real_acres'] }} Acres</span>
                                                                            </li>
                                                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid" /></span>
                                                                                <span>{{ $state['real_bedroom'] }} Bedrooms </span>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                    <div class="custome_listing_col">
                                                                        <ul class="info_list_one">
                                                                            <li><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid" /></span>
                                                                                <span>{{ $state['real_bathroom'] }} Baths </span>
                                                                            </li>
                                                                            @php
                                                                                $garageTypes = explode(',', $data->garage_type ?? '');
                                                                            @endphp
                                                                            <li class="mb-0"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img"
                                                                                        class="img-fluid" /></span> <span class="ms-2 amenities_flex">
                                                                                    {{ $state['num_spaces'] }}
                                                                                    {{ implode(' | ', array_slice(explode(',', $state['garage_type']), 0, 2)) }}
                                                                                </span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="horser_information_box type_one">
                                                                <h3 class="heading30px price_Text">PRICE : {{ $state['real_price'] }}</h3>

                                                                <div class="horser_information_btn_flex">
                                                                    <a href="#!" class="horser_action_info_btn action_btn w-50">SELLER’S PROFILE</a>
                                                                    <a href="#!" class="horser_action_info_btn action_btn w-50">CHAT WITH SELLER</a>
                                                                </div>
                                                                <div class="horser_information_btn_flex mt-2">
                                                                    <a href="#!" class="horser_action_info_btn action_btn w-50">SHARE</a>
                                                                    <form action="{{ route('farm.favorite', Crypt::encrypt($data['id'])) }}"
                                                                        class="horser_action_info_btn horse_card_btn favorite-form w-50" method="POST">
                                                                        <button class="fvrt_btn text-light" type="submit" title="Add to favorite">
                                                                            {{-- <label class="horse_info_btn fvrt_btn action_btn"> --}}
                                                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                                            {{-- </label> --}}
                                                                            {{-- </label>Favorite <i class="fa fa-heart" aria-hidden="true"></i> --}}
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <a href="#!" class="search_all_btn mt-4"><span>SHOW MORE</span></a>
                                        </div>
                                        <div class="tab-pane fade" id="sold" role="tabpanel" aria-labelledby="sold-tab">
                                            <div class="row gy-4">
                                                @foreach ($sold as $state)
                                                    @php
                                                        // Original value
                                                        $location = $state['real_location'];

                                                        // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                                        if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                                            $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                                        } else {
                                                            $displayLocation = ''; // agar nahi ha to empty
                                                        }
                                                    @endphp
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <!-- <div class="horse_list_card">
                                                                    <div class="blue_stripe">
                                                                        <h2>{{ $state['real_title'] }}, {{ $displayLocation }}</h2>
                                                                    </div>
                                                                    @php
                                                                        $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                                                    @endphp
                                                                    <div class="img_box">
                                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                                            <div class="swiper-wrapper">
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
                                                                        <div class="sold_abs_box">
                                                                            <h1>Sold</h1>
                                                                        </div>
                                                                    </div>
                                                                    <div class="blue_stripe">
                                                                        <h3>Price: {{ $state['real_price'] }}</h3>
                                                                    </div>
                                                                    <div class="text_box">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <ul class="info_list v1">
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img"
                                                                                                        class="img-fluid"></span> {{ $state['real_acres'] }} Acres</li>
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img"
                                                                                                        class="img-fluid"></span> {{ $state['real_bedroom'] }} Bedrooms </li>
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img"
                                                                                                        class="img-fluid"></span> {{ $state['real_bathroom'] }} Baths</li>
                                                                                            <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img"
                                                                                                        class="img-fluid"></span>{{ $state['num_spaces'] }}
                                                                                                {{ implode(' | ', array_slice(explode(',', $state['garage_type']), 0, 2)) }}
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <h5 class="heading44px card_about_heading">About</h5>
                                                                                        <p class="about_sm_desc">{!! $state->property_overview !!}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="horse_list_card_btn_flex v1">
                                                                            <a href="javascript:;" class="horse_card_btn">Pictures</a>
                                                                            <a href="javascript:;" class="horse_card_btn">Videos</a>
                                                                            <a href="javascript:;" class="horse_card_btn">View Details</a>
                                                                        </div>
                                                                    </div> -->
                                                    </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        {{-- <a href="#!" class="search_all_btn mt-4"><span>SHOW MORE</span></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
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
function changeVideo(videoId) {
    const mainPlayer = document.getElementById('mainPlayer');
    if(mainPlayer) {
        // Naya source set karein aur autoplay enable karein
        mainPlayer.src = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";
        
        // Scroll karke main player par le jayein
        window.scrollTo({
            top: document.querySelector('.videoplay_max_box').offsetTop - 100,
            behavior: 'smooth'
        });
    }
}
</script>
    
<script>
$(document).ready(function() {
    
    // Helper function to reset all preview elements
    function resetPreviewArea() {
        $('#main-preview-prop').hide();
        $('#pdf-preview-frame').hide().attr('src', ''); // Clear src to stop loading
        $('#doc-preview-container').hide();
        $('#placeholder-text-prop').hide();
    }

    // Click Event for Thumbnails
    $('.prop-preview-trigger').on('click', function(e) {
        e.preventDefault();
        
        var type = $(this).data('type'); // 'image', 'pdf', or 'doc'
        var src = $(this).data('src');
        var name = $(this).data('name');

        resetPreviewArea();

        if (type === 'image') {
            // Show Image
            $('#main-preview-prop').attr('src', src).show();
        } 
        else if (type === 'pdf') {
            // Show PDF in Iframe
            // Note: Using standard embed. Some browsers might force download depending on headers, 
            // but usually iframe works for inline viewing.
            $('#pdf-preview-frame').attr('src', src).show();
        } 
        else if (type === 'doc' || type === 'docx') {
            // Show Doc Icon and Download Button
            $('#doc-preview-filename').text(name);
            $('#doc-download-btn').attr('href', src);
            
            // Set Icon based on extension if needed, currently defaulting to Word icon
            if(type === 'docx') {
                 $('#doc-preview-icon').attr('class', 'fa fa-file-word-o').css('color', '#2b579a');
            } else {
                 $('#doc-preview-icon').attr('class', 'fa fa-file-word-o').css('color', '#2b579a');
            }
            
            $('#doc-preview-container').show();
        }
    });
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
    gsap.registerPlugin(ScrollTrigger);

    // 1. Pinning Logic
    let st = ScrollTrigger.create({
        trigger: ".fixed_bar", 
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
