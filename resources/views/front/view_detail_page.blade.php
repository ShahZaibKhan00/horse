@extends($isModal ? 'layouts.blank' : 'layouts.app') @section('content')
    <style>
        .view_detail_page {
            font-family: "AvenirNextLTPro-Regular";
            padding: 10px 0px !important;
            position: relative;
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
            font-size: 35px;
        }

        .blue_stripe {
            position: relative;
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
            border-radius: 5px;
        }

        .horse_name_bar p span {
            font-weight: 700;
            color: #1d2139;
            font-size: 14px;
            padding: 22px 20px;
            background: #bf9855;
            background: linear-gradient(180deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            border-radius: 5px;
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
            height: 310px;
            object-fit: cover;
            object-position: center;
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

        .top_blue_strip_flex {
            display: flex;
            background: #1d2139;
            position: relative;
            justify-content: flex-end;
        }

        .sale_tag {
            font-size: 18px;
            font-weight: 600;
            background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
            position: absolute;
            top: -8px;
            left: -5px;
            width: fit-content;
            text-transform: uppercase;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 0;
            z-index: 9;
            color: #1d2139;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            padding: 5px 32px;
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
            border-radius: 0px;
            border: 2px solid #1d2139;
        }

        .horser_information_box.mb-0 {
            background: #fff;
            border-bottom: 0;
            border: 0;
            padding: 0px 0px;
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

        .price_Text {
            font-size: 26px;
            margin: 0;
            background: linear-gradient(to right, #ae8e3b 40%, #ffffff 75%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
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
            height: 300px;
            object-fit: cover;
        }

        .videoplay_box {
            position: relative;
            /* height: 400px; */
            overflow: hidden;
        }

        .videoplay_box video {
            height: 100%;
            object-fit: cover;
            object-position: center;
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
            transform: translateY(-50%) scaleX(-1);
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
            column-gap: 15px;
            row-gap: 5px;
        }

        .border_box_one ul li {
            font-size: 15px;
            font-weight: 700;
            color: #1d2139;
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 20px;
            width: fit-content;
            border: 2px solid #1d2139;
            gap: 12px;
            border-radius: 60px;
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
            flex-direction: column;
        }

        .border_box_one.ppe_border_box .horse_info_btn {
            width: 100%;
            font-size: 14px;
        }

        .ppe_xray_box {
            text-align: center;
            max-width: 100%;
            width: 100%;
        }
        .ppe_xray_box img {
            width: 100%;
        }

        .pedigree_box {
            display: flex;
            align-items: center;
        }
        .pedigree_col {
            width: 25%;
        }
        .pedigree_box_1.colord_box.xy_center.border_btm {
            width: 100%;
        }
        .pedigree_box_1.xy_center {
            width: 100%;
        }
        .pedigree_box_1, .pedigree_box_2, .pedigree_box_3, .pedigree_box_4 {
            border: 1px solid #ccc;
            margin: 3px 0;
            border-radius: 5px;
            background: #f5f5f5 !important;
            text-align: center;
        }

        .pedigree_box_1 {
            width: 25%;
            height: 110px;
        }

        .pedigree_box_2 {
            width: 100%;
            height: 110px;
        }

        /*.border_btm {*/
        /*    border-bottom: 2px solid #000;*/
        /*}*/

        .pedigree_box_3 {
            width: 100%;
            height: 55px;
        }

        .pedigree_box_4 {
            width: 100%;
            height: 27.5px;
        }

        .xy_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pedigree_box p {
            margin: 0;
            font-size: 12px;
            font-weight: 600;
        }

        /*.colord_box {*/
        /*    background: #e4dfdf;*/
        /*}*/

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
            height: 300px;
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
            margin-top: 25px;
            flex-wrap: wrap;
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
            text-transform: uppercase;
        }

        .horser_action_info_btn:hover {
            background: #fff;
            color: #1d2139;
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
            -webkit-text-stroke: 2px white;
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

        .horser_information_box .info_list_one li {
            color: #1d2139;
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
            gap: 0px;
            justify-content: center;
            font-weight: 700;
            padding-top: 4px;
        }

        .h_tages p,
        .h_tages span {
            font-family: "AvenirNextLTPro-Regular";
            font-size: 12px;
            padding: 3px;
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

        .horser_action_info_btn.action_btn,
        .horse_info_btn.fvrt_btn.action_btn {
            width: 28%;
            font-size: 16px;
                font-weight: 600;
        }

        .top_blue_strip {
            background: #1d2139;
            padding: 25px 5px 10px 5px;
            position: relative;
        }

        .top_blue_strip .heading44px {
            font-family: "AvenirNextLTPro-Bold";
            color: white;
            text-align: center;
            text-transform: uppercase;
            margin: 0;
        }

        .horser_information_box.type_one {
            padding: 5px 5px;
        }

        .about_horse_heading,
        .seller_tab .heading44px {
           color: var(--primeColor)!important;
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
            font-size: 20px;
            font-weight: 700;
            margin: 0 !important;
            margin-bottom: 10px !important;
            max-height: 105px;
            overflow-y: auto;
        }

        .horse_list_card .text_box .top_list li {
            font-size: 13px;
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

        /*.content_scroll::-webkit-scrollbar {*/
        /*    width: 6px;*/
        /*}*/

        /*.content_scroll::-webkit-scrollbar-thumb {*/
        /*    background: rgba(0, 0, 0, 0.2);*/
        /*    border-radius: 4px;*/
        /*}*/

        .detail_left {
            width: 100%;
            background: #fff;
            z-index: 1;
            margin-top: 10px;
            position: relative;
        }
        .detail_right {
            padding-top: 10px;
        }

        /*.detail_right {*/
        /*    max-height: 665px;*/
        /*    overflow-y: auto;*/
        /*    overflow-x: hidden;*/
        /*    padding-top: 10px;*/
        /*    z-index: 2;*/
        /*    position: relative;*/
        /*}*/

        .reg {
            font-size: 22px;
        }

        .horse_list_card {
            margin: 5px;
        }
        .detail_left .horser_action_info_btn button {
        width: 100%;
        justify-content: center;
        font-size: 16px;
        font-weight: 600;
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

        .horse_add_pills {
            gap: 10px !important;
            flex-wrap: nowrap;
        }

        .unique_nav {
            width: 320px !important;
        }

        .icon_heart {
            position: absolute;
            font-size: 28px;
            top: 24%;
            transform: translateY(-50%);
            right: 8px;
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon_heart.filled {
            color: #c09957;
        }

       .horse_list_card_new .fs_tag {
            font-size: 16px;
            padding: 3px 18px;
            top: -8px;
            font-weight: 600;
            left: -5px;
        }
        .horse_list_card_new .blue_stripe h2 {
            text-transform: uppercase;
        }
      .horse_list_card_new .custome_listing_col .info_list li {
    font-size: 16px;
    font-weight: 700;
    margin: 5px 0px;
    padding: 2px 10px;
    text-transform: uppercase;
    text-align: center;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    border: 1px solid #1d2139;
}
.blue_stripe h3{
    font-family: "AvenirNextLTPro-Bold";
}
.horse_list_card_new .blue_wrapper .horse_card_btn {
    border: 1px solid #fff;
    width: 50%;
    font-size: 20px;
}
.horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
    margin: 5px 0;
}
.view_detail_page .horse_list_card.horse_list_card_new .fvrt_btn {
    width: 100%;
    font-size: 17px;
    font-weight: 700;
}


.breed_text {
            background: #1d2139;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 35px;
            z-index: 9;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
        }

        .custome_listing_row {
            display: flex;
            width: 100%;
            gap: 5px;
        }

        .custome_listing_col {
            width: 50%;
        }

       .custome_listing_col .info_list li {
            font-size: 16px;
            margin: 5px 0px;
            padding: 4px 10px;
            text-transform: uppercase;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #1d2139;
            border-width: 1px;
        }

        .custome_listing_col .info_list {
            margin: 0;
        }

        .horse_list_card_btn_flex_new.bottom_row {
            display: flex;
            gap: 5px;
        }

        .horser_action_info_btn button {
            border: 0;
            background: transparent;
            color: #fff;
        }

        .horser_action_info_btn:hover button {
            color: #1d2139;
            width: 100%;
            height: 100%;
        }

        .horser_ad_inner_container {
            /*max-width: 1260px;*/
            /*margin: 0 auto;*/
        }
        .countdown {
            display: flex;
            gap: 0px;
            align-items: center;
            justify-content: center;
            position: absolute;
            z-index: 999;
            bottom: 50px;
            right: 3px;
            background: #1d2139db;
            padding: 5px 10px 25px 10px;
            border: 1px solid #ffffff54;
            width: 340px;
        }

        .countdown p {
            font-size: 18px;
            color: #fff;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            margin: 0;
            margin-top: 5px;
            font-weight: bold;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .circle-container {
            position: relative;
            padding: 0px 10px;
            border-right: 1px solid #c09956;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring circle {
            fill: none;
            stroke-width: 3;
            /* Reduced from 4 to maintain proportions */
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
            text-align: center;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .circle-text span {
            font-size: 18px;
            font-weight: bold;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .circle-text small {
            font-size: 18px;
            /* Reduced from 9px */
            display: block;
            font-weight: bold;
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bck_btn {
            width: fit-content;
            display: none;
            align-items: center;
            justify-content: space-between;
            height: 45px;
            border: 1px solid #1d2139;
            font-size: 16px;
            font-weight: 800;
            color: #fff;
            padding: 0px 25px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px inset;
            border-radius: 0px;
            background: #21253c;
            gap: 20px;
        }
        .bck_btn:hover {
            color: #fff;
            background: #21253c;
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
        .seller_uni_tab {
            width: 260px!important;
        }
        .horser_ad_inner_container .col-lg-5 {
            
            width: 35%;
        }
        .horser_ad_inner_container .col-lg-7 {
            width: 65%;
        }
        
        .view_detail_page .container {
            max-width: 100%;
        }
        
        hr {
            margin: 2px 0;
            background-color: rgb(178 143 99);
            opacity: 0.2;
        }
        
        .data-list {
          list-style: none;
          padding: 0;
          margin: 0;
          max-width: 500px; /* Adjust based on your container */
          font-family: sans-serif;
          color: #2c3e50; /* Dark blue/grey text color */
        }
        
        .data-list li {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 12px 0;
          border-bottom: 1px solid #f0f0f0; /* Light grey divider line */
        }
        
        .data-list li:last-child {
          border-bottom: none; /* Removes line from the last item */
        }
        
        .label {
            font-weight: 700;
            color: #1f2339;
        }
        
        .value {
          font-weight: 700;
        }
        span.value.text-red {
            color: #b18d61;
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
            flex-wrap: nowrap!important;
            margin-top: 0!important;
        }
        
        
 
        .videoplay_max_box {
            height: 420px;
            
        }
        .videoplay_max_box iframe {
            border-radius: 15px;
            border: none; 
            overflow: hidden; 
            display: block; 
        }
        .videoplay_box iframe {
            border-radius: 15px;
            border: none; 
            overflow: hidden; 
            display: block; 
        }
        
        .border_box_one.ppe_border_box.grid_sys {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin: 20px 0;
        
            justify-content: center;   /* centers grid horizontally */
            align-items: center;       /* centers items vertically */
        }
        .border_box_one.ppe_border_box.grid_sys.v1 {
            display: flex!important;
            justify-content: center!important;
            align-items: center!important;
            flex-direction: row;
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
        .preview_bax iframe {
            width: 100%;
            height: 100%!important;
        }
        
        .view_detail_page {
            position: relative;
        }

/* 2. Tabs container ko sticky banayein */
.horse_add_pills {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: #fff; /* Background color zaroori hai taake scroll content niche se nazar na aaye */
    padding: 10px 0;
    margin-bottom: 20px !important;
    border-bottom: 1px solid #ddd; /* Optional: Separator line */
}
.horse_add_pills {
    background: #fff;
    padding: 15px 0;
    z-index: 1000;
    width: 100%;
    border-bottom: 1px solid #ddd;
    /* transition for smooth background/shadow effect */
    transition: box-shadow 0.3s ease;
}
.vid_row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.vid_col {
    flex: 0 0 calc((100% - 40px) / 5);
}
     
     .seller_btxns {
background: 0 0;
    border-radius: 5px !important;
    width: 12%;
    height: 55px;
    border: 1px solid #d6d8d9;
    font-size: 12px;
    font-weight: 800;
    color: #1d2139;
    padding: 0px 5px;
    /* box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px inset;
}

    </style>
    <div class="horser_ad_inner_container mt-0">
       <div class="row">
          <div class="col-12">
             <a href="javascript:void(0);" class="bck_btn" onclick="history.back();">
             <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
             </a>
          </div>
       </div>
    </div>
    <section class="view_detail_page">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                <div class="container">
                    
                    <div class="horser_ad_inner_container">
                        <div class="row">
                            <div class="col-12">
                                <div class="nav flex-row nav-pills mb-2 horse_add_pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-detail_1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_1" type="button" role="tab"
                                        aria-controls="v-pills-detail_1" aria-selected="true">
                                        ALL PHOTOS
                                    </button>
                                    <button class="nav-link" id="v-pills-detail_2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_2" type="button" role="tab"
                                        aria-controls="v-pills-detail_2" aria-selected="false">VIDEOS</button>
                                    <button class="nav-link unique_nav" id="v-pills-detail_3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_3" type="button" role="tab"
                                        aria-controls="v-pills-detail_3" aria-selected="false">
                                        SKILLS | DISCIPLINE | RIDER LEVEL
                                    </button>
                                    <button class="nav-link" id="v-pills-detail_4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_4" type="button" role="tab"
                                        aria-controls="v-pills-detail_4" aria-selected="false">DESCRIPTION</button>

                                    <button class="nav-link" id="v-pills-detail_5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_5" type="button" role="tab"
                                        aria-controls="v-pills-detail_4" aria-selected="false">PPE | X-RAYS</button>
                                    <button class="nav-link unique_nav" id="v-pills-detail_6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_6" type="button" role="tab"
                                        aria-controls="v-pills-detail_4" aria-selected="false">
                                        PEDIGREE | REGISTRATION INFO
                                    </button>
                                    <button class="nav-link" id="v-pills-detail_7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_7" type="button" role="tab"
                                        aria-controls="v-pills-detail_4" aria-selected="false">LOCATION</button>
                                    <button class="nav-link seller_uni_tab" id="v-pills-detail_8-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_8" type="button" role="tab"
                                        aria-controls="v-pills-detail_4" aria-selected="false">
                                        SELLER INFORMATION
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="detail_left">
                                    <div class="top_blue_strip_flex">
                                        <h3 class="sale_tag">{{ $data->pro_ad_type }}</h3>
                                        <div class="h_tages">
                                            {{-- <p>Payment Options Available</p>
                                                <span>|</span>
                                                <p>May Trade</p>
                                                <span>|</span>
                                                <p>Negotiable</p> --}}
                                        </div>
                                    </div>
                                    <div class="top_blue_strip">
                                        <h3 class="heading44px fw_700 text_border">{{ $data->pro_name }}</h3>
                                        <label class="heart_checkbox_wrapper d-block">
                                            <input type="checkbox" class="heartCheckbox" hidden {{ $data->horsrFavs->isNotEmpty() ? 'checked' : '' }} />
                                            <i class="fa fa-heart{{ $data->horsrFavs->isNotEmpty() ? ' filled' : '-o' }} icon_heart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="relative_img_box">
                                        <div class="swiper horse_swiper_one">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="{{ asset(path: 'Featured_image/' . $data->pro_Fimg) }}" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            </div>
                                            <button class="horse_arrow right"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
                                            <button class="horse_arrow left"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                        <h2 class="breed_text">{{ $data->pro_breed }}</h2>
                                        @if (is_null($data->horse_status))
                                            @if ($data->pro_ad_type == 'At Auction')
                                                <div class="countdown" data-enddate="{{ \Carbon\Carbon::parse($data->auc_end_date)->endOfDay()->format('Y-m-d\TH:i:s') }}">
                                                    <div class="circle-container" data-type="days">
                                                        <div class="circle-text">
                                                            <span class="value">0</span>
                                                            <small>Days</small>
                                                        </div>
                                                    </div>
                                                    <div class="circle-container" data-type="hours">
                                                        <div class="circle-text">
                                                            <span class="value">0</span>
                                                            <small>Hrs</small>
                                                        </div>
                                                    </div>
                                                    <div class="circle-container" data-type="minutes">
                                                        <div class="circle-text">
                                                            <span class="value">0</span>
                                                            <small>Mins</small>
                                                        </div>
                                                    </div>
                                                    <div class="circle-container border-0" data-type="seconds">
                                                        <div class="circle-text">
                                                            <span class="value">0</span>
                                                            <small>Secs</small>
                                                        </div>
                                                    </div>
                                                    <p>TILL END OF AUCTION</p>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="horser_information_box mb-0">
                                        <div class="custome_listing_row">
                                            <div class="custome_listing_col">
                                                <ul class="info_list">
                                                    <li><span>
                                                            @if ($data->pro_age_year > 0)
                                                                {{ $data->pro_age_year }} {{ $data->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                                @endif @if ($data->pro_age_month > 0)
                                                                    {{ $data->pro_age_month }} {{ $data->pro_age_month == 1 ? 'Mo' : 'Mos' }}
                                                                @endif
                                                                Old
                                                        </span></li>
                                                    <li><span>{{ $data->pro_height }} HH</span></li>
                                                    <li><span>{{ $data->pro_gender }}</span></li>
                                                </ul>
                                            </div>
                                            <div class="custome_listing_col">
                                                <ul class="info_list">
                                                    <li><span>{{ $data->pro_color }}</span></li>
                                                    <li><span>REGISTERED: {{ $data->registerd_horse ?? 'no' }}</span></li>
                                                    <li><span>GAITED: {{ $data->gaited }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="custome_listing_col w-100">
                                            <ul class="info_list">
                                                <li class="m-0 mb-2"><span>
                                                        @php
                                                            $state = $data->per_state ?? 'alabama (AL)';
                                                            preg_match('/\((.*?)\)/', $state, $matches);
                                                            $stateCode = $matches[1] ?? '';
                                                        @endphp
                                                        {{-- @if ($data->pro_ad_type == 'At Auction')
                                                            <a href="{{ $data->auc_link ?? 'javascript:;' }}" target="{{ !empty($data->auc_link) ? '_blank' : '' }}" rel="noopener noreferrer"
                                                                class="horse_card_btn w-100 {{ empty($data->auc_link) ? 'disabled' : '' }}">
                                                                View Details
                                                            </a>
                                                        @else --}}
                                                        {{ $data->pro_city . ', ' . $stateCode . '' }}
                                                        {{-- @endif --}}
                                                    </span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="horser_information_box type_one">
                                        <h3 class="heading30px price_Text mb-2">
                                            {{-- @if ($data->pro_ad_type == 'At Auction')
                                                Starting Bid:
                                            @else
                                                PRICE:
                                            @endif
                                            ${{ $data->pro_reg_price }} --}}
                                            @if ($data->pro_ad_type == 'At Auction')
                                                Starting Bid: ${{ $data->bid_amount ?? '0' }}
                                            @else
                                                Price: ${{ $data->pro_reg_price ?? '0' }}
                                            @endif
                                        </h3>
                                        @if ($data->pro_ad_type == 'At Auction')
                                            <a href="{{ $data->auc_link ?? 'javascript:;' }}" target="{{ !empty($data->auc_link) ? '_blank' : '' }}"
                                                class="horser_action_info_btn action_btn w-100 mb-2 {{ empty($data->auc_link) ? 'disabled' : '' }}">Auction Link</a>
                                        @else
                                        @endif
                                        <div class="horse_list_card_btn_flex_new bottom_row mb-2">
                                            <a href="{{ route('seller_profile_main', $data->pro_sku) }}" class="horser_action_info_btn action_btn w-50">Seller Profile</a>
                                            <a href="{{ route('start.conversation', ['receiver_id' => $data->user_id, 'product_id' => $data->id, 'product_type' => 'horse']) }}"
                                                class="horser_action_info_btn action_btn w-50">Chat with seller</a>
                                        </div>
                                        <div class="horse_list_card_btn_flex_new bottom_row">
                                            <a href="#!" class="horser_action_info_btn action_btn w-50">Share</a>
                                            
                                            <form class="horse_card_btn favorite-form horser_action_info_btn action_btn w-50" action="{{ route('horse.favorite', Crypt::encrypt($data['id'])) }}" method="POST">
                                                @csrf
                                                <button class="fvrt_btn text-light" type="button" title="Add to favorite">
                                                    {{ $data->horsrFavs->isNotEmpty() ? 'Favorited ' : 'Favorite ' }}<i class="fa fa-heart{{ $data->horsrFavs->isNotEmpty() ? '' : '-o' }}" aria-hidden="true" style="{{ $data->horsrFavs->isNotEmpty() ? 'color: #e74c3c;' : '' }}"></i>
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
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="content_scroll detail_right ">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-detail_1" role="tabpanel" aria-labelledby="v-pills-detail_1-tab">
                                            <div class="image-grid">
                                                @php
                                                    $productImages = !empty($data->pro_imgs) ? json_decode($data->pro_imgs) : [];
                                                @endphp
                                                @forelse ($productImages as $index => $item)
                                                    <a href="javascript:void(0)" class="gallery-trigger" data-index="{{ $index }}">
                                                        <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="img" class="gallery-item" />
                                                    </a>
                                                @empty
                                                    <p>No Images Found.</p>
                                                @endforelse
                                            </div>
                                            
                                            
                                            <p class="heading18px text-center mt-4"><strong>CLICK PICTURE TO ENLARGE</strong></p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-detail_2" role="tabpanel" aria-labelledby="v-pills-detail_2-tab">
                                            <div class="w-100">
                                                @php
                                                    $raw = $data->pro_youtube ?? null;
                                                
                                                    if (is_null($raw) || $raw === '') {
                                                        $links = [];
                                                    }
                                                    elseif (is_array($raw)) {
                                                        $links = $raw; // already array (rare)
                                                    }
                                                    else {
                                                        // string hai → decode try karo
                                                        $decoded = json_decode($raw, true);
                                                
                                                        if (json_last_error() === JSON_ERROR_NONE) {
                                                            // valid JSON
                                                            $links = is_array($decoded) ? $decoded : (is_string($decoded) ? [$decoded] : []);
                                                        }
                                                        else {
                                                            // invalid JSON → single URL samjho
                                                            $links = is_string($raw) && trim($raw) !== '' ? [$raw] : [];
                                                        }
                                                    }
                                                
                                                    // Optional: duplicate links hata sakte ho agar chaho
                                                    // $links = array_unique($links);
                                                @endphp
                                                
                                                
                                                @if(!empty($links))
                                                    <div class="row">
                                                        <div class="new_heading_bar">
                                                            <i class="fa fa-video-camera me-2" aria-hidden="true" style="color: #1f2339; font-size: 22px;"></i>
                                                            <h2>VIDEOS</h2>
                                                        </div>
                                                        <p>Watch videos to see {{ $data->pro_name }} in action</p>
                                                
                                                        <div class="col-12 mb-4">
                                                            <div class="videoplay_max_box mb-0">
                                                                @php
                                                                    // Pehli video ka ID nikalne ke liye
                                                                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $links[0], $firstMatch);
                                                                    $firstVideoId = $firstMatch[1] ?? '';
                                                                @endphp
                                                                <iframe 
                                                                    id="mainPlayer"
                                                                    width="100%" 
                                                                    height="450" 
                                                                    src="https://www.youtube.com/embed/{{ $firstVideoId }}"
                                                                    frameborder="0" 
                                                                    allow="autoplay; encrypted-media" 
                                                                    allowfullscreen>
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="col-12 mt-4">
                                                            <p class="heading18px mb-3"><strong>MORE VIDEOS</strong></p>
                                                            <div class="vid_row">
                                                                @foreach($links as $link)
                                                                    @php
                                                                        // Video ID extract karne ka naya aur behtar tareeka
                                                                        $videoId = '';
                                                                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $link, $match)) {
                                                                            $videoId = $match[1];
                                                                        }
                                                                    @endphp
                                                
                                                                    @if($videoId)
                                                                        <div class="vid_col">
                                                                            <div class="thumbnail_container" 
                                                                                 style="cursor: pointer; position: relative;" 
                                                                                 onclick="changeVideo('{{ $videoId }}')">
                                                                                
                                                                                <div class="play_overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                                                                                    <i class="fa fa-play-circle" style="font-size: 40px; color: white; opacity: 0.8;"></i>
                                                                                </div>
                                                
                                                                                <img src="https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg" 
                                                                                     class="img-fluid rounded shadow-sm" 
                                                                                     alt="Video Thumbnail"
                                                                                     style="width: 100%; display: block;">
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p>No videos added yet.</p>
                                                @endif


                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-detail_3" role="tabpanel" aria-labelledby="v-pills-detail_3-tab">
                                            <div class="mb-4">
                                                <div class="new_heading_bar">
                                                    <div class="new_heading_icon_box">
                                                        <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                    </div>
                                                    <h2>RIDER LEVEL</h2>
                                                </div>

                                                <div class="border_box_one p-1">
                                                    <ul class="gen_list_flex">
                                                        {{-- @dd(explode(',', $data->pro_skill)) --}}
                                                        @if (!empty($data->pro_skill))
                                                            @foreach (explode(',', $data->pro_skill) as $skill)
                                                                <li>
                                                                    {{ trim($skill) }}
                                                                    <span class="me-0">
                                                                        <img src="/assets/images/checkbox-icon.png" alt="img" class="img-fluid" />
                                                                    </span>
                                                                    
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li>
                                                                No skills specified
                                                                <span class="me-0">
                                                                    <img src="/assets/images/checkbox-icon.png" alt="img" class="img-fluid" />
                                                                </span>
                                                                
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            @php
                                                $riderLevels = array_filter(explode(',', $data->pro_rider_level ?? ''));
                                            @endphp
                                            
                                            <hr>

                                            <div class="mb-4">
        
                                                
                                                <div class="new_heading_bar">
                                                    <div class="new_heading_icon_box">
                                                        <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                    </div>
                                                    <h2>SKILLS | DISCIPLINE</h2>
                                                </div>

                                                <div class="border_box_one p-1">
                                                    <ul class="gen_list_flex">
                                                        @if (count($riderLevels) > 0)
                                                            @foreach ($riderLevels as $item)
                                                                <li>
                                                                    {{ $item }}
                                                                    <span class="me-0">
                                                                        <img src="/assets/images/checkbox-icon.png" alt="img" class="img-fluid" />
                                                                    </span>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li>
                                                                {{ 'No Level Selected' }}
                                                                <span class="me-0">
                                                                    <img src="/assets/images/checkbox-icon.png" alt="img" class="img-fluid" />
                                                                </span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-detail_4" role="tabpanel" aria-labelledby="v-pills-detail_4-tab">
                                            <div class="mb-4">
                                                <div class="new_heading_bar">
                                                    <h2 class="text-uppercase about_horse_heading">ABOUT {{ $data->pro_name }}:</h2>
                                                </div>
                                                
                                                
                                               
                                                <p>
                                                    {!! $data->pro_desc !!}
                                                </p>
                                            </div>

                                            <div class="mb-4">
 
                                                
                                                <div class="new_heading_bar">
                                                    <h2 class="text-uppercase about_horse_heading">ADDITIONAL INFORMATION</h2>
                                                </div>
                                                @php
                                                    $aboutPrices = $data->about_price ? explode(',', $data->about_price) : [];
                                                @endphp
                                                <div class="p-1">

                                                   <ul class="data-list">
                                                        <li>
                                                            <span class="label">Trail Period</span>
                                                            <span class="value {{ ($data->trial_period ?? 'No') == 'Yes' ? 'text-red' : '' }}">
                                                                {{ $data->trial_period ?? 'No' }}
                                                            </span>
                                                        </li>
                                                    
                                                        <li>
                                                            <span class="label">Firm</span>
                                                            <span class="value {{ in_array('Firm', $aboutPrices) ? 'text-red' : '' }}">
                                                                {{ in_array('Firm', $aboutPrices) ? 'Yes' : 'No' }}
                                                            </span>
                                                        </li>
                                                    
                                                        <li>
                                                            <span class="label">May Trade</span>
                                                            <span class="value {{ in_array('May Trade', $aboutPrices) ? 'text-red' : '' }}">
                                                                {{ in_array('May Trade', $aboutPrices) ? 'Yes' : 'No' }}
                                                            </span>
                                                        </li>
                                                    
                                                        <li>
                                                            <span class="label">Negotiable</span>
                                                            <span class="value {{ in_array('Negotiable', $aboutPrices) ? 'text-red' : '' }}">
                                                                {{ in_array('Negotiable', $aboutPrices) ? 'Yes' : 'No' }}
                                                            </span>
                                                        </li>
                                                    
                                                        <li>
                                                            <span class="label">Payment Options Available</span>
                                                            <span class="value {{ in_array('Payment Options Available', $aboutPrices) ? 'text-red' : '' }}">
                                                                {{ in_array('Payment Options Available', $aboutPrices) ? 'Yes' : 'No' }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @php
                                            $ppeFiles = json_decode($data->ppe_file, true);
                                        @endphp --}}
                                        <div class="tab-pane fade" id="v-pills-detail_5" role="tabpanel" aria-labelledby="v-pills-detail_5-tab">
                                            @php
                                            // Decode PPE Files
                                            $ppeFiles = [];
                                            if (!empty($data->ppe_file)) {
                                                $decoded = json_decode($data->ppe_file, true);
                                                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                    $ppeFiles = $decoded;
                                                }
                                            }
                                            
                                            // Decode X-Ray Files
                                            $xrayFiles = [];
                                            if (!empty($data->xray_file)) {
                                                $decoded = json_decode($data->xray_file, true);
                                                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                    $xrayFiles = $decoded;
                                                }
                                            }
                                        
                                            // Helper to get first file for default preview
                                            function getFirstFile($files) {
                                                if(empty($files)) return null;
                                                foreach($files as $f) {
                                                    $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                                                    if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'])) {
                                                        return asset('Product_images/' . $f);
                                                    }
                                                }
                                                return null;
                                            }
                                            
                                            $defaultPpe = getFirstFile($ppeFiles);
                                            $defaultXray = getFirstFile($xrayFiles);
                                            @endphp
                                        
                                            <!-- ================= PPE SECTION ================= -->
                                            <div class="mb-4">
                                                <div class="new_heading_bar">
                                                    <div class="new_heading_icon_box">
                                                        <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                    </div>
                                                    <h2>PRE-PURCHASE EXAM</h2>
                                                </div>
                                                <p class="">Review and download the Pre-Purchase Exam documents.</p>
                                                
                                                @if (!empty($ppeFiles))
                                                    <div class="border_box_one ppe_border_box grid_sys v1 border-0 p-1">
                                                        <div class="preview_flex">
                                                            <div class="preview_bax" id="ppe-preview-container">
                                                                <!-- Default Content Loader -->
                                                                @php
                                                                    $firstExt = !empty($ppeFiles) ? strtolower(pathinfo($ppeFiles[0], PATHINFO_EXTENSION)) : '';
                                                                @endphp
                                                                
                                                                @if(in_array($firstExt, ['jpg', 'jpeg', 'png', 'gif']))
                                                                    <img id="ppe-main-img" src="{{ $defaultPpe }}" alt="img" class="img-fluid" />
                                                                    <div id="ppe-file-view" style="display:none;"></div>
                                                                @elseif($firstExt == 'pdf')
                                                                    <img id="ppe-main-img" style="display:none;" />
                                                                    <div id="ppe-file-view" style="width:100%; height:100%;">
                                                                        <iframe src="{{ $defaultPpe }}" width="100%" height="100%" style="border:none;"></iframe>
                                                                    </div>
                                                                @else
                                                                    <!-- DOC Default -->
                                                                    <img id="ppe-main-img" style="display:none;" />
                                                                    <div id="ppe-file-view" style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
                                                                        <i class="fa fa-file-word-o" style="font-size:80px; color:#2b579a;"></i>
                                                                        <p style="margin-top:10px;">{{ $ppeFiles[0] }}</p>
                                                                        <a href="{{ $defaultPpe }}" download class="horse_info_btn common_btn mt-2" style="width: 200px; padding:10px 20px;">
                                                                             DOWNLOAD FILE
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                        
                                                            <!-- Thumbnails -->
                                                            <div class="new_flex" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                                @foreach ($ppeFiles as $file)
                                                                    @php
                                                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                    $filePath = asset('Product_images/' . $file);
                                                                    @endphp
                                        
                                                                    @if ($extension == 'pdf')
                                                                        <a href="javascript:void(0)" class="ppe_xray_box u_box ppe-trigger-pdf" 
                                                                           data-src="{{ $filePath }}">
                                                                            <i class="fa fa-file-pdf-o" style="font-size:65px;color:#e74c3c;"></i>
                                                                        </a>
                                                                    
                                                                    @elseif ($extension == 'doc' || $extension == 'docx')
                                                                        <a href="javascript:void(0)" class="ppe_xray_box u_box ppe-trigger-doc" 
                                                                           data-src="{{ $filePath }}" 
                                                                           data-name="{{ $file }}">
                                                                            <i class="fa fa-file-word-o" style="font-size:65px;color:#2b579a;"></i>
                                                                        </a>
                                                                    
                                                                    @else
                                                                        <a href="javascript:void(0)" class="ppe_xray_box u_box v1 ppe-trigger-img" 
                                                                           data-src="{{ $filePath }}">
                                                                            <img src="{{ $filePath }}" alt="img" class="img-fluid" />
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-muted">No PPE files available.</p>
                                                @endif
                                            </div>
                                        
                                            <!-- ================= X-RAYS SECTION ================= -->
                                            <div class="mb-4">
                                                <div class="new_heading_bar">
                                                    <div class="new_heading_icon_box">
                                                        <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                    </div>
                                                    <h2>X-RAYS</h2>
                                                </div>
                                                <p class="">Review and download the X-RAYS images.</p>
                                                
                                                @if (!empty($xrayFiles))
                                                    <div class="border_box_one ppe_border_box grid_sys v1 border-0 p-1">
                                                        <div class="preview_flex">
                                                            <div class="preview_bax" id="xray-preview-container">
                                                                 @php
                                                                    $firstXrayExt = !empty($xrayFiles) ? strtolower(pathinfo($xrayFiles[0], PATHINFO_EXTENSION)) : '';
                                                                @endphp
                                        
                                                                @if(in_array($firstXrayExt, ['jpg', 'jpeg', 'png', 'gif']))
                                                                    <img id="xray-main-img" src="{{ $defaultXray }}" alt="img" class="img-fluid" />
                                                                    <div id="xray-file-view" style="display:none;"></div>
                                                                @elseif($firstXrayExt == 'pdf')
                                                                    <img id="xray-main-img" style="display:none;" />
                                                                    <div id="xray-file-view" style="width:100%; height:100%;">
                                                                        <iframe src="{{ $defaultXray }}" width="100%" height="100%" style="border:none;"></iframe>
                                                                    </div>
                                                                @else
                                                                     <img id="xray-main-img" style="display:none;" />
                                                                     <div id="xray-file-view" style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                                                        <i class="fa fa-file-word-o" style="font-size:80px; color:#2b579a;"></i>
                                                                        <p style="margin-top:10px;">{{ $xrayFiles[0] }}</p>
                                                                        <a href="{{ $defaultXray }}" download class="horse_info_btn common_btn mt-2" style="width: 200px; padding:10px 20px;">
                                                                             DOWNLOAD FILE
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                        
                                                            <div class="new_flex" style="display: flex; gap: 10px; margin-top: 15px; flex-wrap: wrap;">
                                                                @foreach ($xrayFiles as $file)
                                                                    @php
                                                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                    $filePath = asset('Product_images/' . $file);
                                                                    @endphp
                                                                    @if ($extension == 'pdf')
                                                                        <a href="javascript:void(0)" class="ppe_xray_box u_box xray-trigger-pdf"
                                                                           data-src="{{ $filePath }}">
                                                                            <i class="fa fa-file-pdf-o" style="font-size:65px;color:#e74c3c;"></i>
                                                                        </a>
                                                                    @elseif ($extension == 'doc' || $extension == 'docx')
                                                                        <a href="javascript:void(0)" class="ppe_xray_box u_box xray-trigger-doc"
                                                                           data-src="{{ $filePath }}" 
                                                                           data-name="{{ $file }}">
                                                                            <i class="fa fa-file-word-o" style="font-size:65px;color:#2b579a;"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0)" class="ppe_xray_box u_box xray-trigger-img"
                                                                           data-src="{{ $filePath }}">
                                                                            <img src="{{ $filePath }}" alt="xray-img" class="img-fluid" style="width: 70px; height: 70px; object-fit: cover;" />
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-muted">No X-rays available.</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-detail_6" role="tabpanel" aria-labelledby="v-pills-detail_6-tab">
                                            <!-- Sire -->
                                            <div class="mb-4">

                                                
                                                
                                                <div class="new_heading_bar">
                                                    <div class="new_heading_icon_box">
                                                        <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                    </div>
                                                    <h2 style="text-transform: uppercase;">{{ $data->pro_name }} PEDIGREE</h2>
                                                </div>
                                                
                                                

                                                <div class="pedigree_box" style="display: flex; gap: 15px; overflow-x: auto; padding: 0px; align-items: stretch;">

                                                    <div class="pedigree_col" style="display: flex; flex-direction: column; justify-content: space-around;">
                                                        <div class="pedigree_box_1 colord_box xy_center border_btm">
                                                            <p><strong>SIRE:</strong><br>{{ $data->pro_sire ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="pedigree_box_1 xy_center">
                                                            <p><strong>DAM:</strong><br>{{ $data->pro_dam ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="pedigree_col" style="display: flex; flex-direction: column; justify-content: space-around;">
                                                        @php
                                                            $gs = explode(',', $data->pro_grand_sire);
                                                            $gd = explode(',', $data->pro_grand_dam);
                                                        @endphp
                                                        @for($i=0; $i<2; $i++)
                                                            <div class="pair_wrapper {{ $i == 0 ? 'border_btm' : '' }}" style="display: flex; flex-direction: column; flex: 1; justify-content: center;">
                                                                <div class="pedigree_box_2 colord_box xy_center border_btm"><p>{{ trim($gs[$i] ?? 'N/A') }}</p></div>
                                                                <div class="pedigree_box_2 xy_center"><p>{{ trim($gd[$i] ?? 'N/A') }}</p></div>
                                                            </div>
                                                        @endfor
                                                    </div>

                                                    <div class="pedigree_col" style="display: flex; flex-direction: column; justify-content: space-around;">
                                                        @php
                                                            $ggs = explode(',', $data->pro_great_grand_sire);
                                                            $ggd = explode(',', $data->pro_great_grand_dam);
                                                        @endphp
                                                        @for($i=0; $i<4; $i++)
                                                            <div class="pair_wrapper {{ $i < 3 ? 'border_btm' : '' }}" style="display: flex; flex-direction: column; flex: 1; justify-content: center;">
                                                                <div class="pedigree_box_3 colord_box xy_center border_btm"><p>{{ trim($ggs[$i] ?? 'N/A') }}</p></div>
                                                                <div class="pedigree_box_3 xy_center"><p>{{ trim($ggd[$i] ?? 'N/A') }}</p></div>
                                                            </div>
                                                        @endfor
                                                    </div>

                                                    <div class="pedigree_col" style="display: flex; flex-direction: column; justify-content: space-around;">
                                                        @php
                                                            $tggs = explode(',', $data->pro_twogreat_grand_sire);
                                                            $tggd = explode(',', $data->pro_twogreat_grand_dam);
                                                        @endphp
                                                        @for($i=0; $i<8; $i++)
                                                            <div class="pair_wrapper {{ $i < 7 ? 'border_btm' : '' }}" style="display: flex; flex-direction: column; flex: 1; justify-content: center;">
                                                                <div class="pedigree_box_4 colord_box xy_center border_btm">
                                                                    <p style="font-size: 10px;">{{ trim($tggs[$i] ?? 'N/A') }}</p>
                                                                </div>
                                                                <div class="pedigree_box_4 xy_center">
                                                                    <p style="font-size: 10px;">{{ trim($tggd[$i] ?? 'N/A') }}</p>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end Sire -->

                                            <div class="mb-4">

                                                
                                                <div class="new_heading_bar">
                                                    <h2 style="text-transform: uppercase;">REGISTRY INFORMATION</h2>
                                                </div>
                                                <div class="border_box_one">
                                                    <h1 class="heading30px my-2 text-center reg">{{ $data->pro_reg_name }}</h1>
                                                    <h1 class="heading18px text-center">Association Name: {{ $data->pro_reg_association }}</h1>
                                                    <h1 class="heading18px text-center">REGISTRATION #: {{ $data->pro_reg_number }}</h1>
                                                    <div class="row mb-4 justify-content-center">
                                                        @php
                                                            $files = [];
                                                            if (!empty($data->pro_reg_file)) {
                                                                $decoded = json_decode($data->pro_reg_file, true);
                                                                $files = is_array($decoded) ? $decoded : [];
                                                            }
                                                        @endphp

                                                        @if (!empty($files))
                                                            @foreach ($files as $file)
                                                                @php
                                                                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                    $isPdf = ($ext === 'pdf');
                                                                    $isDoc = in_array($ext, ['doc', 'docx']);
                                                                    $filePath = asset('Product_images/' . $file);
                                                                @endphp

                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-3">
                                                                    @if ($isPdf)
                                                                        {{-- PDF: Open in new tab --}}
                                                                        <a href="{{ $filePath }}" target="_blank">
                                                                            <div style="height:150px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1px solid #ddd;border-radius:6px;">
                                                                                <i class="fa fa-file-pdf-o" style="font-size:50px;color:#e74c3c;"></i>
                                                                                <span style="margin-top:8px;font-weight:600;">View PDF</span>
                                                                            </div>
                                                                        </a>
                                                                    @elseif ($isDoc)
                                                                        {{-- DOCX: Force Download --}}
                                                                        <a href="{{ $filePath }}" download>
                                                                            <div style="height:150px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1px solid #ddd;border-radius:6px;background:#f9f9f9;">
                                                                                <i class="fa fa-file-word-o" style="font-size:50px;color:#2b579a;"></i>
                                                                                <span style="margin-top:8px;font-weight:600;">Download DOCX</span>
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        {{-- IMAGE: Show Preview with Fancybox --}}
                                                                        <a href="{{ $filePath }}" class="gallery-trigger">
                                                                            <img src="{{ $filePath }}" alt="certificate" class="img-fluid gallery-item"
                                                                                style="height:150px;object-fit:cover;width:100%; border-radius:6px; border:1px solid #ddd;" />
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                                <a href="{{ asset('assets/images/placeholder.png') }}" class="gallery-trigger">
                                                                    <img src="{{ asset('assets/images/placeholder.png') }}" alt="No Image" class="img-fluid gallery-item" />
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <p class="heading18px text-center m-0"><strong>CLICK TO ENLARGE</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-detail_7" role="tabpanel" aria-labelledby="v-pills-detail_7-tab">
                                            <div class="mb-4">
                 
                                                <div class="new_heading_bar">
                                                    <h2 style="text-transform: uppercase;">HORSES LOCATION</h2>
                                                </div>

                                                <div class="border_box_one border-0 p-0" style="border-radius: 10px; overflow: hidden;">
@php
    // ================== MAP QUERY LOGIC ==================
    $rawAddress = trim($pro_address ?? '');

    if (!empty($rawAddress)) {
        $mapQuery = $rawAddress;

        $city  = trim($city ?? $data->pro_city ?? $product->pro_city ?? $data->pro_city ?? '');
        $state = trim($state ?? $data->per_state ?? $product->per_state ?? '');

        if (!empty($city))  { $mapQuery .= ', ' . $city; }
        if (!empty($state)) { $mapQuery .= ', ' . $state; }
    } 
    else {
        $chosenState = trim($state ?? $data->per_state ?? $product->per_state ?? 'Alabama');
        $mapQuery = $chosenState;
    }

    // USA add karo
    if (stripos($mapQuery, 'USA') === false && stripos($mapQuery, 'United States') === false) {
        $mapQuery .= ' USA';
    }

    $encodedMapQuery = urlencode($mapQuery);
@endphp

{{-- ================== MAP WITH MARKER ================== --}}
@if(!empty($mapQuery) && $mapQuery !== 'USA')
    <div id="dynamic-map-container" class="border_box_one border-0 p-0" style="border-radius: 10px; overflow: hidden;">
        <iframe
            id="business-dynamic-map"
            src="https://maps.google.com/maps?q={{ $encodedMapQuery }}&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            style="border: 0; width: 100%; height: 450px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Error Message -->
    <div id="dynamic-map-error" style="display: none; padding: 30px 20px; background: #fafafa; color: #666666; border: 1px dashed #dddddd; border-radius: 8px; text-align: center; font-size: 14px;">
        <div style="font-size: 24px; color: #999999; margin-bottom: 10px;">🗺️</div>
        <h4 style="margin: 0 0 5px 0; color: #333333; font-size: 16px; font-weight: 600;">Map Preview Unavailable</h4>
        <p style="margin: 0;">Please refer to the physical address details listed on this page.</p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var targetString = "{{ addslashes($mapQuery) }}";
            
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(targetString)}`, {
                headers: { 'User-Agent': 'Mozilla/5.0' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    document.getElementById('dynamic-map-container').style.display = 'none';
                    document.getElementById('dynamic-map-error').style.display = 'block';
                }
            })
            .catch(() => {
                console.log("Map verification skipped.");
            });
        });
    </script>

@else
    <div style="padding: 20px; text-align: center; color: #9ca3af;">
        Location details are currently unavailable.
    </div>
@endif


                                                    {{-- @php
                                                        // Using the exact $state variable coming from your backend context
                                                        // If the parent context variable $state is not set, fallback to the current product/data state property
                                                        $chosenState = trim($state ?? $data->service_state ?? $product->per_state ?? 'alabama (AL)');
                                                        
                                                        // Append 'USA' to guarantee Google Maps renders the correct country boundary
                                                        $cleanStateQuery = $chosenState . ' USA';
                                                        $encodedStateQuery = urlencode($cleanStateQuery);
                                                    @endphp
                                            
                                                    @if(!empty($chosenState))
                                                        <div id="dynamic-map-container" class="border_box_one border-0 p-0" style="border-radius: 10px; overflow: hidden;">
                                                            <iframe
                                                                id="business-dynamic-map"
                                                                src="https://maps.google.com/maps?q={{ $encodedStateQuery }}&t=&z=6&ie=UTF8&iwloc=&output=embed"
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
                                                                var targetStateString = "{{ addslashes($cleanStateQuery) }}";
                                                                
                                                                // Verifying location lookup coordinates with OpenStreetMap fetch request
                                                                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(targetStateString)}`)
                                                                    .then(response => response.json())
                                                                    .then(data => {
                                                                        if (data.length === 0) {
                                                                            // Toggle visibility nodes if backend state string returns invalid
                                                                            document.getElementById('dynamic-map-container').style.display = 'none';
                                                                            document.getElementById('dynamic-map-error').style.display = 'block';
                                                                        }
                                                                    })
                                                                    .catch(error => {
                                                                        // Safe error handling to prevent UI rendering blockages
                                                                        console.log("State verification skipped, map displayed with original parameters.");
                                                                    });
                                                            });
                                                        </script>
                                                    @else
                                                        <div style="padding: 20px; text-align: center; color: #9ca3af;">
                                                            Location details are currently unavailable.
                                                        </div>
                                                    @endif --}}
                                                </div>
                                            </div>

                                            <div class="mb-4">

                                                
                                                <div class="new_heading_bar">
                                             
                                                    <h2 style="text-transform: uppercase;">SERVICE PROVIDERS AROUND THIS AREA</h2>
                                                </div>

                                                <div class="row gy-4">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="product_clm">
                                                            <div class="product_clm_img_box">
                                                                <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg" class="pro_img" width="" height=""
                                                                    alt="" />
                                                                <div class="product_clm_img_hover_box">
                                                                    <a href="javascript:void(0)" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                                                    <a href="javascript:void(0)" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                                                    <a href="javascript:void(0)" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                                                </div>
                                                            </div>
                                                            <h5 class="heading22px primeColor mb-1">ABC Horse transport company</h5>
                                                            <p class="mb-1">(973) 555-555</p>
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
                                                            <h5 class="heading22px primeColor mb-1">ABC Horse transport company</h5>
                                                            <p class="mb-1">(973) 555-555</p>
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
                                                            <h5 class="heading22px primeColor mb-1">ABC Horse transport company</h5>
                                                            <p class="mb-1">(973) 555-555</p>
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

                                                <a href="{{ url('/services') }}" class="search_all_btn"><span>Search All</span></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade seller_tab" id="v-pills-detail_8" role="tabpanel" aria-labelledby="v-pills-detail_8-tab">

                                            
                                            <div class="new_heading_bar">
                                                    <h2 style="text-transform: uppercase;">ABOUT SELLER:</h2>
                                                </div>

                                            <div class="row mb-4">
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                    <!--<div class="seller_img">-->
                                                    <!--    <img src="/assets/images/seller.webp" alt="img" class="img-fluid" />-->
                                                    <!--    <img src="/assets/images/seller.webp" alt="img" class="img-fluid" />-->
                                                    <!--</div>-->
                                                    <div class="seller_img">
                                                        @if($profileImg)
                                                            <img src="{{ asset('Profile_image/' . $profileImg) }}" alt="User Profile">
                                                            <!-- Note: 'storage/' path tab change karein agar aapka image public folder mein direct save hota hai -->
                                                        @else
                                                            <img src="{{ asset('assets/images/placeholder.png') }}" alt="Default User">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                    <p class="seller_desc">
                                                        
                                                        <div class="new_heading_bar ps-0 pt-1 pb-2">
                                                            <h2 style="text-transform: uppercase;">{{ $data->user->name }}</h2>
                                                        </div>
                                                        <a href="{{ url( "seller_profile_one/$data->id" ) }}" target="_blank" class="seller_btxns">Seller Profile</a>
                                                        {{-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen book. --}}
                                                    </p>

                                                    <h1 class="heading18px mb-2">Social Links</h1>

                                                    <div class="social_icons mb-3">
                                                        <a href="{{ $data->per_website }}" target="_blank" title="Website Link" class="web_btn">Website</a>
                                                        <a href="{{ $data->pro_facebook }}" target="_blank" title="Facebook"><img src="/assets/images/facebook.png" alt="img"
                                                                class="img-fluid" /></a>
                                                        <a href="{{ $data->pro_youtube }}" target="_blank" title="Youtube"><img src="/assets/images/youtube.png" alt="img"
                                                                class="img-fluid" /></a>
                                                        <a href="{{ $data->pro_tiktok }}" target="_blank" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img"
                                                                class="img-fluid" /></a>
                                                        <a href="{{ $data->pro_insta }}" target="_blank" title="Instagram"><img src="/assets/images/instagram.png" alt="img"
                                                                class="img-fluid" /></a>
                                                    </div>

                                                    <h1 class="heading18px mb-2">Contact</h1>

                                                    <div class="social_icons">
                                                        <a href="tel:0000000000"><img src="/assets/images/call.png" alt="img" class="img-fluid" /></a>
                                                        <a href="mailto:seller@abcd.com"><img src="/assets/images/email.png" alt="img" class="img-fluid" /></a>

                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="nav nav-tabs seller_action_btn_flex d-flex gap-2 mb-4" id="horseTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active horse_info_btn" id="for-sale-tab" data-bs-toggle="tab" data-bs-target="#for-sale" type="button" role="tab"
                                                        aria-controls="for-sale" aria-selected="true">
                                                        HORSES FOR SALE (5)
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link horse_info_btn common_btn" id="sold-tab" data-bs-toggle="tab" data-bs-target="#sold" type="button" role="tab"
                                                        aria-controls="sold" aria-selected="false">
                                                        HORSES SOLD (25)
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="horseTabsContent">
                                                <div class="tab-pane fade show active" id="for-sale" role="tabpanel" aria-labelledby="for-sale-tab">
                                                    <div class="row gy-4">
                                                        @forelse ($products as $product)
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="horse_list_card horse_list_card_new">
                                                                    <div class="blue_stripe">
                                                                        <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                                                    </div>
                                                                    <div class="blue_stripe blue_stripe_new">
                                                                        <h2>{{ $product->pro_name }}</h2>
                                                                        <label class="heart_checkbox_wrapper d-block">
                                                                            <input type="checkbox" class="heartCheckbox" hidden />
                                                                            <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="img_box">
                                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                                            <div class="swiper-wrapper">
                                                                                @php $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : []; @endphp @forelse ($productImages as $item)
                                                                                    <div class="swiper-slide">
                                                                                        <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="" />
                                                                                    </div>
                                                                                @empty
                                                                                    <div class="swiper-slide">
                                                                                        <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                                    </div>
                                                                                @endforelse
                                                                            </div>
                                                                            <div class="swiper-pagination"></div>
                                                                        </div>
                                                                        <div class="arrow_flex">
                                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                                        </div>
                                                                        <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                                                    </div>
                                                                    <div class="text_box">
                                                                        <div class="custome_listing_row">
                                                                            <div class="custome_listing_col">
                                                                                <ul class="info_list">
                                                                                    <li>@if ($product->pro_age_year > 0)
                                                                                        {{ $product->pro_age_year }} {{ $product->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                                                    @endif
                                                                                    @if ($product->pro_age_month > 0)
                                                                                        {{ $product->pro_age_month }} {{ $data->pro_age_month == 1 ? 'Mo' : 'Mos' }}
                                                                                    @endif
                                                                                    Old</li>
                                                                                    <li>{{ $product->pro_height . " HH" }} </li>
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
                                                                                    {{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }},
                                                                                    {{ $stateCode }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="blue_wrapper">
                                                                            <div class="blue_stripe">
                                                                                 <h3>
                                                                                    @if ($product->pro_ad_type == 'At Auction')
                                                                                        Starting Bid:
                                                                                    @else
                                                                                        Price:
                                                                                    @endif
                                                                                    ${{ $product->pro_reg_price }}
                                                                                </h3>
                                                                            </div>
                                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                                <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn view-detail-btn w-100">View Details</a>
                                                                            </div>
                                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                                <a href="#!" class="horse_card_btn">Seller Profile</a>
                                                                                <a href="#!" class="horse_card_btn">Chat with seller</a>
                                                                            </div>
                                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                                <a href="#!" class="horse_card_btn">Share</a>
                                                                                <form class="horse_card_btn favorite-form" action="{{ route('horse.favorite', Crypt::encrypt($product['id'])) }}" method="POST">
                                                                                    @csrf
                                                                                    <button class="fvrt_btn" type="button" title="Add to favorite">
                                                                                        Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @empty
                                                            
                                                        @endforelse
                                                    </div>
                                                    {{-- <a href="#!" class="search_all_btn mt-4"><span>SHOW MORE</span></a> --}}
                                                </div>
                                                <div class="tab-pane fade" id="sold" role="tabpanel" aria-labelledby="sold-tab">
                                                    <div class="row gy-4 d-none">
                                                        @forelse ($soldProducts as $product)
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="horse_list_card horse_list_card_new">
                                                                    <div class="blue_stripe">
                                                                        <p class="fs_tag">{{ $product->pro_ad_type }}</p>
                                                                    </div>
                                                                    <div class="blue_stripe blue_stripe_new">
                                                                        <h2>{{ $product->pro_ad_type }}</h2>
                                                                        <label class="heart_checkbox_wrapper d-block">
                                                                            <input type="checkbox" class="heartCheckbox" hidden />
                                                                            <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                        </label>
                                                                
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <div class="img_box">
                                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                                            @php $productImages = !empty($product->pro_imgs) ? json_decode($product->pro_imgs) : []; @endphp @forelse ($productImages as $item)
                                                                                <div class="swiper-slide">
                                                                                    <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="" />
                                                                                </div>
                                                                            @empty
                                                                                <div class="swiper-slide">
                                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                                </div>
                                                                            @endforelse
                                                                            <div class="swiper-pagination"></div>
                                                                        </div>
                                                                        <div class="arrow_flex">
                                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                                        </div>
                                                                        <div class="sold_abs_box">
                                                                            <h1>Sold</h1>
                                                                        </div>
                                                                        <h2 class="breed_text">{{ $product->pro_breed }}</h2>
                                                                    </div>
                                                                    <!--<div class="blue_stripe">
                                                                        <h3>@if ($product->pro_ad_type == 'At Auction')
                                                                            Starting Bid: ${{ $product->bid_amount ?? '0' }}
                                                                        @else
                                                                            Price: ${{ $product->pro_reg_price ?? '0' }}
                                                                        @endif</h3>
                                                                    </div> -->
                                                                    
                                                                    
                                                                    <!-- <div class="text_box">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <ul class="info_list">
                                                                                            <li><strong>Breed:</strong> {{ $product->pro_breed }}</li>
                                                                                            <li><strong>Age:</strong>  @if ($product->pro_age_year > 0)
                                                                                            {{ $product->pro_age_year }} {{ $product->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                                                            @endif @if ($product->pro_age_month > 0)
                                                                                                {{ $product->pro_age_month }} {{ $data->pro_age_month == 1 ? 'Mo' : 'Mos' }}
                                                                                            @endif
                                                                                            Old</li>
                                                                                            <li><strong>Sex:</strong> {{ $product->pro_gender }}</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <ul class="info_list">
                                                                                            <li>{{ $product->pro_color ?? ' ' }}</li>
                                                                                            <li>Registered: {{ Str::ucfirst($product->registerd_horse ?? ' ') }}</li>
                                                                                            <li>Gaited: {{ $product->gaited }}</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="blue_stripe">
                                                                            <ul class="top_list justify-content-center">
                                                                                <li>Trail</li>
                                                                                <li>Dressage</li>
                                                                                <li>Beginner Safe</li>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="horse_list_card_btn_flex">
                                                                            <a href="#!" class="horse_card_btn">Pictures</a>
                                                                            <a href="#!" class="horse_card_btn">Videos</a>
                                                                            <label class="fvrt_btn">
                                                                                <input type="checkbox" hidden />
                                                                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                                            </label>
                                                                            <a href="#!" class="horse_card_btn">View Details</a>
                                                                        </div>
                                                                    </div> -->
                                                                    
                                                                    
                                                                    <div class="text_box">
                                                                        <div class="custome_listing_row">
                                                                            <div class="custome_listing_col">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Breed:</strong> {{ $product->pro_breed }}</li>
                                                                                            <li><strong>Age:</strong>  @if ($product->pro_age_year > 0)
                                                                                            {{ $product->pro_age_year }} {{ $product->pro_age_year == 1 ? 'Yr' : 'Yrs' }}
                                                                                            @endif @if ($product->pro_age_month > 0)
                                                                                                {{ $product->pro_age_month }} {{ $data->pro_age_month == 1 ? 'Mo' : 'Mos' }}
                                                                                            @endif
                                                                                            Old</li>
                                                                                            <li><strong>Sex:</strong> {{ $product->pro_gender }}</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="custome_listing_col">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Height:</strong> 15 HH</li>
                                                                                    <li><strong>Ad Type:</strong> Auction</li>
                                                                                    <li><strong>Location:</strong> New Jersey</li>
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
                                                                                    {{ Str::ucfirst(str_replace('_', ' ', $product->pro_address)) }},
                                                                                    {{ $stateCode }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="blue_wrapper">
                                                                            <div class="blue_stripe">
                                                                                 <h3>
                                                                                    <h3>@if ($product->pro_ad_type == 'At Auction')
                                                                                        Starting Bid: ${{ $product->bid_amount ?? '0' }}
                                                                                    @else
                                                                                        Price: ${{ $product->pro_reg_price ?? '0' }}
                                                                                    @endif</h3>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                                <a href="{{ route('products_detail', $product->pro_sku) }}" class="horse_card_btn view-detail-btn w-100">View Details</a>
                                                                            </div>
                                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                                <a href="#!" class="horse_card_btn">Seller Profile</a>
                                                                                <a href="#!" class="horse_card_btn">Chat with seller</a>
                                                                            </div>
                                                                            <div class="horse_list_card_btn_flex_new bottom_row">
                                                                                <a href="#!" class="horse_card_btn">Share</a>
                                                                                <form class="horse_card_btn favorite-form" action="{{ route('horse.favorite', Crypt::encrypt($product['id'])) }}" method="POST">
                                                                                    @csrf
                                                                                    <button class="fvrt_btn" type="button" title="Add to favorite">
                                                                                        Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            
                                                        @endforelse
                                                                
                                                    </div>
                                                    <a href="#!" class="search_all_btn mt-4"><span>SHOW MORE</span></a>
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
   document.addEventListener("DOMContentLoaded", function () {
       const countdowns = document.querySelectorAll(".countdown");
   
       countdowns.forEach(function (countdown) {
           const endDateStr = countdown.getAttribute("data-enddate");
           const endDate = new Date(endDateStr).getTime();
   
           if (isNaN(endDate)) {
               console.error("Invalid date format:", endDateStr);
               return;
           }
   
           function updateCountdown() {
               const now = new Date().getTime();
               let distance = endDate - now;
   
               if (distance <= 0) {
                   distance = 0;
               }
   
               const days = Math.floor(distance / (1000 * 60 * 60 * 24));
               const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
               const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
               const seconds = Math.floor((distance % (1000 * 60)) / 1000);
   
               countdown.querySelector('[data-type="days"] .value').textContent = days;
               countdown.querySelector('[data-type="hours"] .value').textContent = hours;
               countdown.querySelector('[data-type="minutes"] .value').textContent = minutes;
               countdown.querySelector('[data-type="seconds"] .value').textContent = seconds;
           }
   
           updateCountdown();
           setInterval(updateCountdown, 1000);
       });
   });
</script>
<script>
   const FULL_DASH_ARRAY = 2 * Math.PI * 30;
   
   const countdownDuration = (2 * 60 * 60 + 46 * 60 + 11) * 1000; // 2h 46m 11s
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
   function changeVideo(url) {
       // Main player ka src change karein
       // Autoplay add karne ke liye humne '?autoplay=1' attach kiya hai
       document.getElementById("mainPlayer").src = url + "?autoplay=1";
   
       // Page ko upar scroll karne ke liye (Optional)
       window.scrollTo({
           top: document.getElementById("mainPlayer").offsetTop - 20,
           behavior: "smooth",
       });
   }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {

    // --- HELPER: Clear Preview Box ---
    function clearPreviewBox(containerId) {
        $(`#${containerId} #ppe-main-img, #${containerId} #xray-main-img`).hide();
        $(`#${containerId} #ppe-file-view, #${containerId} #xray-file-view`).show().empty();
    }

    // --- PPE SECTION LOGIC ---

    // 1. Image Click
    $(".ppe-trigger-img").on("click", function (e) {
        e.preventDefault();
        var src = $(this).data("src");
        var container = "ppe-preview-container";
        
        $(`#${container} #ppe-file-view`).hide();
        $(`#${container} #ppe-main-img`).attr("src", src).show();
    });

    // 2. PDF Click (Show in Iframe)
    $(".ppe-trigger-pdf").on("click", function (e) {
        e.preventDefault();
        var src = $(this).data("src");
        var container = "ppe-preview-container";
        
        clearPreviewBox(container);
        // Create Iframe for PDF Preview
        $(`#${container} #ppe-file-view`).html(`<iframe src="${src}" width="100%" height="100%" style="border:none;"></iframe>`);
    });

    // 3. DOC Click (Show Icon + Download Button)
    $(".ppe-trigger-doc").on("click", function (e) {
        e.preventDefault();
        var src = $(this).data("src");
        var name = $(this).data("name");
        var container = "ppe-preview-container";
        
        clearPreviewBox(container);
        $(`#${container} #ppe-file-view`).html(`
            <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; width:100%; height:100%;">
                <i class="fa fa-file-word-o" style="font-size:80px; color:#2b579a;"></i>
                <p style="margin-top:10px; font-weight:bold;">${name}</p>
                <a href="${src}" download class="horse_info_btn common_btn mt-2" style="width: 200px; padding:10px 20px;">
                    DOWNLOAD FILE
                </a>
            </div>
        `);
    });


    // --- X-RAY SECTION LOGIC ---

    // 1. Image Click
    $(".xray-trigger-img").on("click", function (e) {
        e.preventDefault();
        var src = $(this).data("src");
        var container = "xray-preview-container";
        
        $(`#${container} #xray-file-view`).hide();
        $(`#${container} #xray-main-img`).attr("src", src).show();
    });

    // 2. PDF Click (Show in Iframe)
    $(".xray-trigger-pdf").on("click", function (e) {
        e.preventDefault();
        var src = $(this).data("src");
        var container = "xray-preview-container";
        
        clearPreviewBox(container);
        $(`#${container} #xray-file-view`).html(`<iframe src="${src}" width="100%" height="100%" style="border:none;"></iframe>`);
    });

    // 3. DOC Click (Show Icon + Download Button)
    $(".xray-trigger-doc").on("click", function (e) {
        e.preventDefault();
        var src = $(this).data("src");
        var name = $(this).data("name");
        var container = "xray-preview-container";
        
        clearPreviewBox(container);
        $(`#${container} #xray-file-view`).html(`
            <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; height:100%;">
                <i class="fa fa-file-word-o" style="font-size:80px; color:#2b579a;"></i>
                <p style="margin-top:10px; font-weight:bold;">${name}</p>
                <a href="${src}" download class="horse_info_btn common_btn mt-2" style="width: 200px; padding:10px 20px;">
                    DOWNLOAD FILE
                </a>
            </div>
        `);
    });

});
</script>

<script>
   function changeVideo(videoId) {
       const mainPlayer = document.getElementById("mainPlayer");
       // Direct Video ID use ho rahi hai jo zyada clean hai
       const newSrc = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";
   
       mainPlayer.src = newSrc;
   
       // Smooth scroll to main player
       window.scrollTo({
           top: document.querySelector(".videoplay_max_box").offsetTop - 100,
           behavior: "smooth",
       });
   }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>


<script>
    gsap.registerPlugin(ScrollTrigger);

    // 1. Pinning Logic
    let st = ScrollTrigger.create({
        trigger: ".horse_add_pills", 
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
