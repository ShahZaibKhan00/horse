@extends('layouts.app') @section('content')
    <style>
    .view_detail_page {
        font-family: "AvenirNextLTPro-Regular";
        padding: 100px 0px!important;
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
	font-size: 45px;
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
	height: 355px;
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
.detail_left .relative_img_box .horse_arrow  {
    display: none;
}
.top_blue_strip_flex {
    display: flex;
    background: #1d2139;
    position: relative;
    justify-content: flex-end;
}
.sale_tag {
    font-size: 25px;
    font-family: "AvenirNextLTPro-Regular";
    font-weight: 700;
    padding: 8px 65px;
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
	font-size: 40px;
	margin: 0;
	background: linear-gradient(to right, #e5dbc2 40%, #c19b59 75%, #c3ad72 100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	font-weight: 700;
	text-align: center;
}

.view_detail_page .nav-pills .nav-link {
    background: 0 0;
    border-radius: 0px 0 !important;
    width: 12%;
    height: 55px;
    border: 1px solid #1d2139;
    font-size: 15px;
    font-weight: 800;
    color: #1d2139;
    padding: 0px 5px;
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
	height: 205px;
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
	font-family: "AvenirLTStd-Medium";
	padding: 20px 50px;
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
    border: 1px solid #1d2139!important;
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
	margin-top: 25px;
	flex-wrap: wrap;
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
	font-size: 43px;
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
}
.h_tages p, .h_tages span {
    font-family: "AvenirNextLTPro-Regular";
    font-size: 16px;
    padding: 5px;
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
	font-size: 15.5px;
	font-family: "AvenirNextLTPro-Bold";
}

.top_blue_strip {
	background: #1d2139;
	padding: 25px 30px;
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
	padding: 15px 25px;
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

/* .content_scroll {
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0px 10px 0px 10px;
        } */
.content_scroll {
	height: 100%;
	overflow-y: auto;
	padding-right: 10px;
}

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

.detail_right {
	max-height: 818px;
	overflow-y: auto;
	overflow-x: hidden;
	padding-top: 10px;
	background: #fff;
	z-index: 2;
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

.horse_add_pills {
    gap: 10px!important;
    flex-wrap: nowrap;
}
.unique_nav {
    width: 320px!important;
}
 .icon_heart {
        position: absolute;
        font-size: 25px;
        top: 50%;
        transform: translateY(-50%);
        right: 24px;
         color: #fff;
         cursor: pointer;
        transition: color 0.3s ease;
    }


    .icon_heart.filled {
        color: #c09957;
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
		font-size: 16px;
        padding: 5px;
	}
    .sale_tag {
        font-size: 20px;
        padding: 8px 23px;
    }
    .blue_stripe h3 {
        font-size: 30px;
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

	.horser_information_box.type_one {
		padding: 15px 15px;
	}

	.h_tages p,
	.h_tages span {
		font-size: 14px;
		font-weight: 700;
	}

	.horser_action_info_btn.action_btn,
	.horse_info_btn.fvrt_btn.action_btn {
		font-size: 12px;
		height: 40px;
		width: 28%;
	}

	.view_detail_page .nav-pills .nav-link {
        height: 45px;
        font-size: 12px;
        padding: 0px 15px;
        margin: 0;
    }

	.image-grid img {
		height: 200px;
	}

	.videoplay_box img {
		height: 265px;
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
    .detail_right {
        max-height: 735px;
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
		height: 36px;
		font-size: 13px;
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
		flex-direction: column;
		margin-bottom: 10px;
            border: 2px solid #1d2139;
        padding: 8px;
        text-align: center;
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

	.text_border {
		font-size: 40px;
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
}
</style>


    <section class="view_detail_page">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav flex-row nav-pills mb-2 horse_add_pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-detail_1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_1" type="button" role="tab"
                                    aria-controls="v-pills-detail_1" aria-selected="true">
                                    ALL PHOTOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_2" type="button" role="tab" aria-controls="v-pills-detail_2"
                                    aria-selected="false">VIDEOS</button>
                                <button class="nav-link unique_nav" id="v-pills-detail_3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_3" type="button" role="tab" aria-controls="v-pills-detail_3"
                                    aria-selected="false">
                                    SKILLS | DISCIPLINE | RIDER LEVEL
                                </button>
                                <button class="nav-link" id="v-pills-detail_4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_4" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">DESCRIPTION</button>

                                <button class="nav-link" id="v-pills-detail_5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_5" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">PPE | X-RAYS</button>
                                <button class="nav-link unique_nav" id="v-pills-detail_6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_6" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    PEDIGREE | REGISTRATION INFO
                                </button>
                                <button class="nav-link" id="v-pills-detail_7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_7" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">LOCATION</button>
                                <button class="nav-link" id="v-pills-detail_8-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_8" type="button" role="tab" aria-controls="v-pills-detail_4"
                                    aria-selected="false">
                                    SELLER INFORMATION
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="detail_left">
                                <div class="top_blue_strip_flex">
                                    <h3 class="sale_tag">For Sale</h3>
                                    <div class="h_tages">
                                            <p>Payment Options Available</p>
                                            <span>|</span>
                                            <p>May Trade</p>
                                            <span>|</span>
                                            <p>Negotiable</p>
                                        </div>
                                    </div>
                                <div class="top_blue_strip">
                                    <h3 class="heading44px fw_700 text_border">{{$data->pro_name}}</h3>
                                    <label class="heart_checkbox_wrapper d-block">
                                        <input type="checkbox" class="heartCheckbox" hidden />
                                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="relative_img_box">
                                    <div class="swiper horse_swiper_one">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="{{ asset('Featured_image/' . $data->pro_Fimg) }}" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                        </div>
                                        <button class="horse_arrow right"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
                                        <button class="horse_arrow left"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                   
                                </div>
                                <div class="horser_information_box mb-0">
                                    <div class="row">
                                        <div class="col-6 pe-0">
                                            <ul class="info_list_one">
                                                <li><span>{{ $data->pro_breed }}</span></li>
                                                <li><span>{{ $data->pro_age_year }} Years</span></li>
                                                <li><span>{{ $data->pro_height }}</span></li>
                                                <li class="mb-0"><span>{{ $data->pro_gender }}</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="info_list_one">
                                                <li><span>{{ $data->pro_color }}</span></li>
                                                <li><span>REGISTERED: {{$data->registerd_horse ?? "no" }}</span></li>
                                                <li><span>GAITED: {{ $data->gaited }}</span></li>
                                                <li class="mb-0"><span>{{ $data->pro_address . ' ' . $data->pro_city }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="horser_information_box type_one">
                                    <h3 class="heading30px price_Text">PRICE : ${{ $data->pro_reg_price }}</h3>

                                    

                                    <div class="horser_information_btn_flex">
                                        <a href="#!" class="horser_action_info_btn action_btn">SELLER’S PROFILE</a>
                                        <a href="#!" class="horser_action_info_btn action_btn">CHAT WITH SELLER</a>
                                    </div>
                                    <div class="horser_information_btn_flex mt-2">
                                        <a href="#!" class="horser_action_info_btn action_btn">SHARE</a>
                                        <form action="{{ route('horse.favorite', Crypt::encrypt($data['id'])) }}" method="POST">
                                            @csrf
                                            <button class="fvrt_btn" type="submit">
                                                Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="content_scroll detail_right ">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-detail_1" role="tabpanel" aria-labelledby="v-pills-detail_1-tab">
                                        <div class="image-grid">
                                            @php
                                                $productImages = !empty($data->pro_imgs) ? json_decode($data->pro_imgs) : [];
                                            @endphp
                                            @forelse ($productImages as $item)
                                                <a href="{{asset('storage/uploads/products/' . $item) }}" data-fancybox="group" data-caption="Horse">
                                                    <img src="{{ asset('storage/uploads/products/' . $item) }}" alt="img" class="" />
                                                </a>
                                            @empty
                                            @endforelse
                                        </div>
                                        <p class="heading18px text-center mt-4"><strong>CLICK PICTURE TO ENLARGE</strong></p>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_2" role="tabpanel" aria-labelledby="v-pills-detail_2-tab">
                                        <div class="row">
                                            @php
                                                $videoUrls = json_decode($data->pro_video_url, true) ?? [];
                                                $filteredVideoUrls = array_filter($videoUrls); // remove empty values
                                            @endphp
                                            @if(!empty($filteredVideoUrls))
                                                @if(count($filteredVideoUrls) > 0)
                                                    @foreach ($filteredVideoUrls as $item)
                                                        <div class="col-12 mb-4">
                                                            <a data-fancybox="gallery" href="{{ asset('pro_video/'.$item) }}" class="videoplay_box d-block">
                                                                <img src="/assets/images/H_05.jpg" alt="Video Thumbnail" class="w-100" />
                                                                <span class="video-play-button"><span></span></span>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-12 mb-4">
                                                        <div class="border_box_one text-center blank_box">
                                                            <h3 class="heading44px fw_700">We’re sorry!</h3>
                                                            <p>No videos have been uploaded.</p>
                                                            <!-- <a href="#!" class="horse_info_btn chat_btn">CHAT WITH SELLER</a> -->
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            @if(!empty($data->pro_youtube))
                                                @if (!empty($data->pro_youtube))
                                                    <div class="col-12 mb-4">
                                                        <div data-src="{{ $data->pro_youtube }}" data-fancybox="group" data-caption="Horse 6"
                                                            class="videoplay_box">
                                                            <img src="/assets/images/H_01.jpg" alt="img" class="w-100" />
                                                            <a id="play-video" class="video-play-button" href="{{ $data->pro_youtube }}" data-toggle="modal" data-target="#savoybeachhotel">
                                                                <span></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @else 
                                                    <div class="col-12 mb-4">
                                                        <div class="border_box_one text-center blank_box">
                                                            <h3 class="heading44px fw_700">We’re sorry!</h3>
                                                            <p>No videos have been uploaded, please contact the Seller.</p>
                                                            <a href="#!" class="horse_info_btn chat_btn">CHAT WITH SELLER</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_3" role="tabpanel" aria-labelledby="v-pills-detail_3-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>SKILLS | DISCIPLINE</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex">
                                                    {{-- @dd(explode(',', $data->pro_skill)) --}}
                                                    @if (!empty($data->pro_skill))
                                                        @foreach (explode(',', $data->pro_skill) as $skill)
                                                            <li>
                                                                <span class="me-3">
                                                                    <img src="/assets/images/h_icon.png" alt="img" class="img-fluid" />
                                                                </span>
                                                                {{ trim($skill) }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li>
                                                            <span class="me-3">
                                                                <img src="/assets/images/h_icon.png" alt="img" class="img-fluid" />
                                                            </span>
                                                            No skills specified
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @php
                                            $riderLevels = array_filter(explode(",", $data->pro_rider_level ?? ''));
                                        @endphp

                                            <div class="mb-4">
                                                <div class="heading65px monte_carlo fw_400 mb-4">
                                                    <h1>RIDER LEVEL</h1>
                                                    <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                                </div>

                                                <div class="border_box_one p-1">
                                                    <ul class="gen_list_flex">
                                                        @if(count($riderLevels) > 0)
                                                            @foreach ($riderLevels as $item)
                                                                <li>
                                                                    <span class="me-3">
                                                                        <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                                    </span>
                                                                    {{ $item }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li>
                                                                <span class="me-3">
                                                                    <img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" />
                                                                </span>
                                                                {{ "No Level Selected" }}
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_4" role="tabpanel" aria-labelledby="v-pills-detail_4-tab">
                                        <div class="mb-4">
                                            <h3 class="heading44px fw_700 about_horse_heading">About {{$data->pro_name}}:</h3>
                                            <p>
                                                {!! $data->pro_desc !!}
                                            </p>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>ADDITIONAL INFORMATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex gen_list_flex_one">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p> Trail Period:</p>
                                                        <p>Yes
                                                        <p>
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p>May Trade:</p>
                                                        <p>No
                                                        <p>
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p>Payment Options Available:</p>
                                                        <p>Yes
                                                        <p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $ppeFiles = json_decode($data->ppe_file, true);
                                    @endphp
                                    <div class="tab-pane fade" id="v-pills-detail_5" role="tabpanel" aria-labelledby="v-pills-detail_5-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>PRE-PURCHASE EXAM</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>
                                            <div class="border_box_one ppe_border_box">
                                                @foreach ($ppeFiles as $file)
                                                    <a href="{{ asset('Product_images/' . $file) }}" class="horse_info_btn mb-3 w-100 common_btn" data-fancybox="ppe">CLICK TO VIEW PPE</a>
                                                    <div class="ppe_xray_box">
                                                        <img src="{{ asset('Product_images/' . $file) }}" alt="img" class="img-fluid" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>X-RAYS</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>
                                            @php
                                                $x_rays = json_decode($data->xray_file, true);
                                            @endphp
                                            <div class="border_box_one ppe_border_box">
                                                @foreach ($x_rays as $file)
                                                    <a href="{{ asset('Product_images/' . $file) }}" class="horse_info_btn mb-3 w-100 common_btn" data-fancybox="ppe">CLICK TO VIEW X-RAYS</a>
                                                    <div class="ppe_xray_box">
                                                        <img src="{{ asset('Product_images/' . $file) }}" alt="img" class="img-fluid" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_6" role="tabpanel" aria-labelledby="v-pills-detail_6-tab">
                                        <!-- Sire -->
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>PEDIGREE</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="pedigree_box">
                                                <div class="pedigree_box_1 colord_box xy_center">
                                                    <p>{{ $data->pro_sire ?? '' }}</p>
                                                </div>
                                                @if (!empty($data->pro_grand_sire))
                                                    <div class="pedigree_box_1">
                                                        @foreach (explode(',', $data->pro_grand_sire) as $item)
                                                            <div class="pedigree_box_2 {{ $loop->first ? 'border_btm colord_box' : '' }} xy_center">
                                                                <p>{{ $item }}</p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @if (!empty($data->pro_great_grand_sire))
                                                    <div class="pedigree_box_1">
                                                        @foreach (array_chunk(explode(',', $data->pro_great_grand_sire), 2) as $chunkIndex => $pair)
                                                            <div class="pedigree_box_2 {{ $chunkIndex == 0 ? 'border_btm' : '' }}">
                                                                @foreach ($pair as $index => $item)
                                                                    <div class="pedigree_box_3 {{ $index == 0 ? 'border_btm colord_box' : '' }} xy_center">
                                                                        <p>{{ $item }}</p>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                @if (!empty($data->pro_twogreat_grand_sire))
                                                    @php
                                                        $pedigreeItems = explode(',', $data->pro_twogreat_grand_sire);
                                                        $groupedItems = array_chunk($pedigreeItems, 4); // Split into groups of 4
                                                    @endphp

                                                    <div class="pedigree_box_1">
                                                        @foreach ($groupedItems as $groupIndex => $group)
                                                            <div class="pedigree_box_2 {{ $groupIndex == 0 ? 'border_btm' : '' }}">
                                                                @foreach (array_chunk($group, 2) as $pairIndex => $pair)
                                                                    <div class="pedigree_box_3 {{ $pairIndex == 0 ? 'border_btm' : '' }}">
                                                                        @foreach ($pair as $itemIndex => $item)
                                                                            <div class="pedigree_box_4 {{ $itemIndex == 0 ? 'border_btm colord_box' : '' }} xy_center">
                                                                                <p>{{ trim($item) }}</p>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- end Sire -->

                                        

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>REGISTRY INFORMATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>
                                            <div class="border_box_one">
                                                <h1 class="heading30px my-2 text-center reg">Friesian Heritage and Sporthorse International</h1>
                                                <h1 class="heading18px text-center">REGISTRATION #: MU-9497947472973</h1>
                                                <div class="row mb-4 justify-content-center">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <a href="/assets/images/certificate_1.png" data-fancybox="certificate">
                                                            <img src="/assets/images/certificate_1.png" alt="img" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <a href="/assets/images/certificate_1.png" data-fancybox="certificate">
                                                            <img src="/assets/images/certificate_1.png" alt="img" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <p class="heading18px text-center m-0"><strong>CLICK TO ENLARGE</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_7" role="tabpanel" aria-labelledby="v-pills-detail_7-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>HORSES LOCATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.953385382017!2d-74.04668928459306!3d40.68924997933561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c2927b2e6fe40f4!2sStatue%20of%20Liberty!5e0!3m2!1sen!2sus!4v1716905061377!5m2!1sen!2sus"
                                                    style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4 odd_heading">
                                                <h1>SERVICE PROVIDERS AROUND THIS AREA</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
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
                                                        <h5 class="heading22px primeColor">ABC Horse transport company</h5>
                                                        <p>(973) 555-555</p>
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
                                                        <p>(973) 555-555</p>
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
                                                        <p>(973) 555-555</p>
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
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h3 class="heading44px fw_700 m-0">ABOUT THE AGENT | SELLER:</h3>
                                            <!-- <a href="#!" class="horse_info_btn">CHAT WIH SELLER</a> -->
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <div class="seller_img">
                                                    <img src="/assets/images/seller.webp" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                <p class="seller_desc">
                                                   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                                type and scrambled it to make a type specimen book.
                                                </p>

                                                <h1 class="heading18px mb-2">Social Links</h1>

                                                <div class="social_icons mb-3">
                                                    <a href="{{ $data->per_website }}" title="Website Link" class="web_btn">Website</a>
                                                    <a href="{{ $data->pro_facebook }}" title="Facebook"><img src="/assets/images/facebook.png" alt="img" class="img-fluid" /></a>
                                                    <a href="{{ $data->pro_youtube }}" title="Youtube"><img src="/assets/images/youtube.png" alt="img" class="img-fluid" /></a>
                                                    <a href="{{ $data->pro_tiktok }}" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid" /></a>
                                                    <a href="{{ $data->pro_insta }}" title="Instagram"><img src="/assets/images/instagram.png" alt="img" class="img-fluid" /></a>
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
                                                <button class="nav-link active horse_info_btn" id="for-sale-tab" data-bs-toggle="tab" data-bs-target="#for-sale" type="button" role="tab" aria-controls="for-sale" aria-selected="true">
                                                HORSES FOR SALE (5)
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link horse_info_btn common_btn" id="sold-tab" data-bs-toggle="tab" data-bs-target="#sold" type="button" role="tab" aria-controls="sold" aria-selected="false">
                                                HORSES SOLD (25)
                                                </button>
                                            </li>
                                        </ul>


                                        <div class="tab-content" id="horseTabsContent">
                                            <div class="tab-pane fade show active" id="for-sale" role="tabpanel" aria-labelledby="for-sale-tab">
                                                <div class="row gy-4">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="horse_list_card">
                                                            <div class="blue_stripe">
                                                                <h2>ZION</h2>
                                                                <label class="heart_checkbox_wrapper d-block">
                                                                    <input type="checkbox" class="heartCheckbox" hidden />
                                                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                            <div class="img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                                <div class="arrow_flex">
                                                                    <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                                    <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="blue_stripe">
                                                                <h3>Price: $10,000.00</h3>
                                                            </div>
                                                            <div class="text_box">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong></strong> Friesian Sport Horse</li>
                                                                                    <li><strong></strong> 1.5 Years Old</li>
                                                                                    <li><strong></strong> Gelding</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong></strong> 15 HH</li>
                                                                                    <li><strong></strong> Auction</li>
                                                                                    <li><strong></strong> New Jersey</li>
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
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="horse_list_card">
                                                            <div class="blue_stripe">
                                                                <h2>ZION</h2>
                                                                <label class="heart_checkbox_wrapper d-block">
                                                                    <input type="checkbox" class="heartCheckbox" hidden />
                                                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                            <div class="img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                                <div class="arrow_flex">
                                                                    <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                                    <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="blue_stripe">
                                                                <h3>Price: $10,000.00</h3>
                                                            </div>
                                                            <div class="text_box">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong></strong> Friesian Sport Horse</li>
                                                                                    <li><strong></strong> 1.5 Years Old</li>
                                                                                    <li><strong></strong> Gelding</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong></strong> 15 HH</li>
                                                                                    <li><strong></strong> Auction</li>
                                                                                    <li><strong></strong> New Jersey</li>
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
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="horse_list_card">
                                                            <div class="blue_stripe">
                                                                <h2>ZION</h2>
                                                                <label class="heart_checkbox_wrapper d-block">
                                                                    <input type="checkbox" class="heartCheckbox" hidden />
                                                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                            <div class="img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                                <div class="arrow_flex">
                                                                    <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                                    <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="blue_stripe">
                                                                <h3>Price: $10,000.00</h3>
                                                            </div>
                                                            <div class="text_box">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                                    <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                                    <li><strong>Sex:</strong> Gelding</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Height:</strong> 15 HH</li>
                                                                                    <li><strong>Ad Type:</strong> Auction</li>
                                                                                    <li><strong>Location:</strong> New Jersey</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="blue_stripe">
                                                                    <ul class="top_list justify-content-center justify-content-center">
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
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="horse_list_card">
                                                            <div class="blue_stripe">
                                                                <h2>ZION</h2>
                                                                <label class="heart_checkbox_wrapper d-block">
                                                                    <input type="checkbox" class="heartCheckbox" hidden />
                                                                    <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                                                                </label>
                                                            </div>
                                                            <div class="img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                                <div class="arrow_flex">
                                                                    <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                                    <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="blue_stripe">
                                                                <h3>Price: $10,000.00</h3>
                                                            </div>
                                                            <div class="text_box">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                                    <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                                    <li><strong>Sex:</strong> Gelding</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Height:</strong> 15 HH</li>
                                                                                    <li><strong>Ad Type:</strong> Auction</li>
                                                                                    <li><strong>Location:</strong> New Jersey</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="blue_stripe">
                                                                    <ul class="top_list justify-content-center justify-content-center">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#!" class="search_all_btn mt-4"><span>SHOW MORE</span></a>
                                            </div>
                                            <div class="tab-pane fade" id="sold" role="tabpanel" aria-labelledby="sold-tab">
                                                <div class="row gy-4">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="horse_list_card">
                                                            <div class="blue_stripe">
                                                                <h2>ZION</h2>
                                                            </div>
                                                            <div class="img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
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
                                                                <h3>Price: $10,000.00</h3>
                                                            </div>
                                                            <div class="text_box">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                                    <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                                    <li><strong>Sex:</strong> Gelding</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Height:</strong> 15 HH</li>
                                                                                    <li><strong>Ad Type:</strong> Auction</li>
                                                                                    <li><strong>Location:</strong> New Jersey</li>
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
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="horse_list_card">
                                                            <div class="blue_stripe">
                                                                <h2>ZION</h2>
                                                            </div>
                                                            <div class="img_box">
                                                                <div class="swiper horse_list_card_slider h-100 w-100">
                                                                    <div class="swiper-wrapper">
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                        </div>
                                                                        <div class="swiper-slide">
                                                                            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                        </div>
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
                                                                <h3>Price: $10,000.00</h3>
                                                            </div>
                                                            <div class="text_box">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                                    <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                                    <li><strong>Sex:</strong> Gelding</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <ul class="info_list">
                                                                                    <li><strong>Height:</strong> 15 HH</li>
                                                                                    <li><strong>Ad Type:</strong> Auction</li>
                                                                                    <li><strong>Location:</strong> New Jersey</li>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#!" class="search_all_btn mt-4"><span>SHOW MORE</span></a>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="google_ad_box mt-3">
                                <img src="/assets/images/horser_ad.png" alt="img" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="tab-pane fade" id="pills-auction" role="tabpanel" aria-labelledby="pills-auction-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav flex-row nav-pills mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-detail_1_ex_27-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_1_ex_27" type="button" role="tab"
                                    aria-controls="v-pills-detail_1_ex_27" aria-selected="true">
                                    ALL PHOTOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_2_ex_28-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_2_ex_28" type="button" role="tab"
                                    aria-controls="v-pills-detail_2_ex_28" aria-selected="false">
                                    VIDEOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_3_ex_29-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_3_ex_29" type="button" role="tab"
                                    aria-controls="v-pills-detail_3_ex_29" aria-selected="false">
                                    SKILLS | DISCIPLINE | RIDER LEVEL
                                </button>
                                <button class="nav-link" id="v-pills-detail_4_ex_30-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_4_ex_30" type="button" role="tab"
                                    aria-controls="v-pills-detail_4_ex_30" aria-selected="false">
                                    DESCRIPTION
                                </button>

                                <button class="nav-link" id="v-pills-detail_5_ex_31-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_5_ex_31" type="button" role="tab"
                                    aria-controls="v-pills-detail_5_ex_31" aria-selected="false">
                                    PPE | X-RAYS
                                </button>
                                <button class="nav-link" id="v-pills-detail_6_ex_32-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_6_ex_32" type="button" role="tab"
                                    aria-controls="v-pills-detail_6_ex_32" aria-selected="false">
                                    PEDIGREE | REGISTRATION INFO
                                </button>
                                <button class="nav-link" id="v-pills-detail_7_ex_33-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_7_ex_33" type="button" role="tab"
                                    aria-controls="v-pills-detail_7_ex_33" aria-selected="false">
                                    LOCATION
                                </button>
                                <button class="nav-link" id="v-pills-detail_8_ex_34-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_8_ex_34" type="button" role="tab"
                                    aria-controls="v-pills-detail_8_ex_34" aria-selected="false">
                                    SELLER INFORMATION
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="detail_left">
                                <div class="top_blue_strip">
                                    <h3 class="heading44px fw_700 text_border">GABRIEL</h3>
                                </div>
                                <div class="relative_img_box">
                                    <div class="swiper horse_swiper_one">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="/assets/images/H_01.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_02.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_03.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_04.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_05.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_06.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                        </div>
                                        <button class="horse_arrow right"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
                                        <button class="horse_arrow left"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <h3 class="heading44px fw_700">AUCTION</h3>
                                </div>
                                <div class="horser_information_box mb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="info_list_one">
                                                <li>BREED: <span>Gypsy Cross</span></li>
                                                <li>AGE: <span>2 Years 3 Months</span></li>
                                                <li>HEIGHT: <span>10.2 HH</span></li>
                                                <li>SEX: <span>Mare</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="info_list_one">
                                                <li>COLOR: <span>Silver Dapple</span></li>
                                                <li>REGISTERED: <span>Yes</span></li>
                                                <li>GAITED: <span>No</span></li>
                                                <li>LOCATION: <span>Lafayette, NJ</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="horser_information_box type_one">
                                    <h3 class="heading30px price_Text">STARTING BID : $30,500.00</h3>

                                    <div class="countdown">
                                        <div class="circle-container" data-type="days">
                                            <svg class="progress-ring" width="68" height="68">
                                                <circle class="bg" r="30" cx="34" cy="34" />
                                                <circle class="progress" r="30" cx="34" cy="34" />
                                            </svg>
                                            <div class="circle-text">
                                                <span id="days">0</span>
                                                <small>Days</small>
                                            </div>
                                        </div>

                                        <div class="circle-container" data-type="hours">
                                            <svg class="progress-ring" width="68" height="68">
                                                <circle class="bg" r="30" cx="34" cy="34" />
                                                <circle class="progress" r="30" cx="34" cy="34" />
                                            </svg>
                                            <div class="circle-text">
                                                <span id="hours">0</span>
                                                <small>Hours</small>
                                            </div>
                                        </div>

                                        <div class="circle-container" data-type="minutes">
                                            <svg class="progress-ring" width="68" height="68">
                                                <circle class="bg" r="30" cx="34" cy="34" />
                                                <circle class="progress" r="30" cx="34" cy="34" />
                                            </svg>
                                            <div class="circle-text">
                                                <span id="minutes">0</span>
                                                <small>Minutes</small>
                                            </div>
                                        </div>

                                        <div class="circle-container" data-type="seconds">
                                            <svg class="progress-ring" width="68" height="68">
                                                <circle class="bg" r="30" cx="34" cy="34" />
                                                <circle class="progress" r="30" cx="34" cy="34" />
                                            </svg>
                                            <div class="circle-text">
                                                <span id="seconds">0</span>
                                                <small>Seconds</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="horser_information_btn_flex">
                                        <a href="#!" class="horser_action_info_btn action_btn">SELLER’S PROFILE</a>
                                        <a href="#!" class="horser_action_info_btn action_btn">CHAT WITH SELLER</a>
                                        <a href="#!" class="horser_action_info_btn action_btn">AUCTION LINK</a>

                                        <a href="#!" class="horser_action_info_btn action_btn">SHARE</a>
                                        <label class="horse_info_btn fvrt_btn action_btn">
                                            <input type="checkbox" hidden />
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="content_scroll detail_right ">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-detail_1_ex_27" role="tabpanel" aria-labelledby="v-pills-detail_1_ex_27-tab">
                                        <div class="image-grid">
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_03.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_03.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_04.jpg" data-fancybox="grofup_img" data-caption="Horse">
                                                <img src="/assets/images/H_04.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_05.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_05.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_06.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_06.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_03.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_03.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_04.jpg" data-fancybox="grofup_img" data-caption="Horse">
                                                <img src="/assets/images/H_04.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_05.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_05.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_06.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_06.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_03.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_03.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_04.jpg" data-fancybox="grofup_img" data-caption="Horse">
                                                <img src="/assets/images/H_04.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_05.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_05.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_06.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_06.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                        </div>
                                        <p class="heading18px text-center mt-4"><strong>CLICK PICTURE TO ENLARGE</strong></p>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_2_ex_28" role="tabpanel" aria-labelledby="v-pills-detail_2_ex_28-tab">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div data-src="https://www.youtube.com/watch?v=mFTF9BRIoZQ&pp=ygUXaG9yc2UgZXhhbXBsZSB2aWRlbyB1c2E%3D" data-fancybox="group" data-caption="Horse 6"
                                                    class="videoplay_box">
                                                    <img src="/assets/images/H_05.jpg" alt="img" class="w-100" />
                                                    <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mFTF9BRIoZQ&pp=ygUXaG9yc2UgZXhhbXBsZSB2aWRlbyB1c2E%3D"
                                                        data-toggle="modal" data-target="#savoybeachhotel">
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div data-src="https://www.youtube.com/watch?v=mFTF9BRIoZQ&pp=ygUXaG9yc2UgZXhhbXBsZSB2aWRlbyB1c2E%3D" data-fancybox="group" data-caption="Horse 6"
                                                    class="videoplay_box">
                                                    <img src="/assets/images/H_01.jpg" alt="img" class="w-100" />
                                                    <a id="play-video" class="video-play-button" href="https://www.youtube.com/embed/hXAdt5w3sPQ" data-toggle="modal"
                                                        data-target="#savoybeachhotel">
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_3_ex_29" role="tabpanel" aria-labelledby="v-pills-detail_3_ex_29-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>SKILLS | DISCIPLINE</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Trail riding
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Dressage
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Lesson Horse
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Trick Horse
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Jumping
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>RIDER LEVEL</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" /></span>Beginner
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" /></span>Intermediate
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" /></span>Advanced
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_4_ex_30" role="tabpanel" aria-labelledby="v-pills-detail_4_ex_30-tab">
                                        <div class="mb-4">
                                            <h3 class="heading44px fw_700 about_horse_heading">About Taxi:</h3>
                                            <p>
                                                Max is a majestic Belgian Draft horse who works as a taxi horse in the historic district of Charleston, South Carolina. Standing over 17 hands tall with a
                                                broad chestnut coat and a flowing white mane,
                                                Max turns heads wherever he goes. With a calm and steady demeanor, Max has been a favorite among tourists for years, known for his friendly nature and
                                                impressive strength. Every morning, Max is
                                                groomed and harnessed with care by his handler, Jake, who has worked with horses his entire life.
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>ADDITIONAL INFORMATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex gen_list_flex_one">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p> Trail Period:</p>
                                                        <p>Yes
                                                        <p>
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p>May Trade:</p>
                                                        <p>No
                                                        <p>
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p>Payment Options Available:</p>
                                                        <p>Yes
                                                        <p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_5_ex_31" role="tabpanel" aria-labelledby="v-pills-detail_5_ex_31-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>PRE-PURCHASE EXAM</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one ppe_border_box">
                                                <a href="/assets/images/ppe.png" class="horse_info_btn mb-3 w-100 common_btn" data-fancybox="ppe">CLICK TO VIEW PPE</a>
                                                <div class="ppe_xray_box">
                                                    <img src="/assets/images/ppe.png" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>X-RAYS</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one ppe_border_box">
                                                <a href="/assets/images/xray.webp" class="horse_info_btn mb-3 w-100 common_btn" data-fancybox="ppe">CLICK TO VIEW X-RAYS</a>
                                                <div class="ppe_xray_box">
                                                    <img src="/assets/images/xray.webp" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_6_ex_32" role="tabpanel" aria-labelledby="v-pills-detail_6_ex_32-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>PEDIGREE</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="pedigree_box">
                                                <div class="pedigree_box_1 colord_box xy_center">
                                                    <p>PEDIGREE</p>
                                                </div>
                                                <div class="pedigree_box_1">
                                                    <div class="pedigree_box_2 border_btm colord_box xy_center">
                                                        <p>PEDIGREE</p>
                                                    </div>
                                                    <div class="pedigree_box_2 xy_center">
                                                        <p>PEDIGREE</p>
                                                    </div>
                                                </div>
                                                <div class="pedigree_box_1">
                                                    <div class="pedigree_box_2 border_btm">
                                                        <div class="pedigree_box_3 border_btm colord_box xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                        <div class="pedigree_box_3 xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                    </div>
                                                    <div class="pedigree_box_2">
                                                        <div class="pedigree_box_3 border_btm colord_box xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                        <div class="pedigree_box_3 xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pedigree_box_1">
                                                    <div class="pedigree_box_2 border_btm">
                                                        <div class="pedigree_box_3 border_btm">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                        <div class="pedigree_box_3">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pedigree_box_2">
                                                        <div class="pedigree_box_3 border_btm">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                        <div class="pedigree_box_3">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>REGISTRY INFORMATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one">
                                                <h1 class="heading30px my-2 text-center reg">Friesian Heritage and Sporthorse International REGISTRATION #: MU-949794747297</h1>

                                                <div class="row mb-4 justify-content-center">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <a href="/assets/images/certificate_1.png" data-fancybox="certificate">
                                                            <img src="/assets/images/certificate_1.png" alt="img" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <a href="/assets/images/certificate_1.png" data-fancybox="certificate">
                                                            <img src="/assets/images/certificate_1.png" alt="img" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <p class="heading18px text-center m-0"><strong>CLICK TO ENLARGE</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_7_ex_33" role="tabpanel" aria-labelledby="v-pills-detail_7_ex_33-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>HORSES LOCATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.953385382017!2d-74.04668928459306!3d40.68924997933561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c2927b2e6fe40f4!2sStatue%20of%20Liberty!5e0!3m2!1sen!2sus!4v1716905061377!5m2!1sen!2sus"
                                                    style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4 odd_heading">
                                                <h1>SERVICE PROVIDERS AROUND THIS AREA</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
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
                                                        <p>(973) 555-555</p>
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
                                                        <p>(973) 555-555</p>
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
                                                        <p>(973) 555-555</p>
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
                                    <div class="tab-pane fade seller_tab" id="v-pills-detail_8_ex_34" role="tabpanel" aria-labelledby="v-pills-detail_8_ex_34-tab">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h3 class="heading44px fw_700 m-0">ABOUT THE SELLER:</h3>
                                             <a href="#!" class="horse_info_btn">CHAT WIH SELLER</a> 
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <div class="seller_img">
                                                    <img src="/assets/images/seller.webp" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                <p class="seller_desc">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                    when an unknown printer took a galley of
                                                    type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                                                    essentially unchanged. It was popularised in
                                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                                                    including versions of Lorem Ipsum.
                                                </p>
                                                <h1 class="heading18px mb-2">Social Links</h1>

                                                <div class="social_icons">
                                                    <a href="#!" title="Website Link" class="web_btn">Website</a>
                                                    <a href="#!" title="Facebook"><img src="/assets/images/facebook.png" alt="img" class="img-fluid" /></a>
                                                    <a href="#!" title="Youtube"><img src="/assets/images/youtube.png" alt="img" class="img-fluid" /></a>
                                                    <a href="#!" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid" /></a>
                                                    <a href="#!" title="Instagram"><img src="/assets/images/instagram.png" alt="img" class="img-fluid" /></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="seller_action_btn_flex d-flex gap-2 mb-4">
                                            <a href="#!" class="horse_info_btn"><span>HORSES FOR SALE (5)</span></a>
                                            <a href="#!" class="horse_info_btn common_btn">HORSES SOLD (25)</a>
                                        </div>

                                        <div class="row gy-4">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong></strong> Friesian Sport Horse</li>
                                                                            <li><strong></strong> 1.5 Years Old</li>
                                                                            <li><strong></strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong></strong> 15 HH</li>
                                                                            <li><strong></strong> Auction</li>
                                                                            <li><strong></strong> New Jersey</li>
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                            <li><strong>Sex:</strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                            <li><strong>Sex:</strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                            <li><strong>Sex:</strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="google_ad_box mt-3">
                                <img src="/assets/images/horser_ad.png" alt="img" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-sold" role="tabpanel" aria-labelledby="pills-sold-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav flex-row nav-pills mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-detail_1_sold_27-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_1_sold_27" type="button" role="tab"
                                    aria-controls="v-pills-detail_1_ex_27" aria-selected="true">
                                    ALL PHOTOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_2_sold_28-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_2_sold_28" type="button" role="tab"
                                    aria-controls="v-pills-detail_2_ex_28" aria-selected="false">
                                    VIDEOS
                                </button>
                                <button class="nav-link" id="v-pills-detail_3_sold_29-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_3_sold_29" type="button" role="tab"
                                    aria-controls="v-pills-detail_3_ex_29" aria-selected="false">
                                    SKILLS | DISCIPLINE | RIDER LEVEL
                                </button>
                                <button class="nav-link" id="v-pills-detail_4_sold_30-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_4_sold_30" type="button" role="tab"
                                    aria-controls="v-pills-detail_4_ex_30" aria-selected="false">
                                    DESCRIPTION
                                </button>
                                <button class="nav-link" id="v-pills-detail_5_sold_31-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_5_sold_31" type="button" role="tab"
                                    aria-controls="v-pills-detail_5_ex_31" aria-selected="false">
                                    PPE | X-RAYS
                                </button>
                                <button class="nav-link" id="v-pills-detail_6_sold_32-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_6_sold_32" type="button" role="tab"
                                    aria-controls="v-pills-detail_6_ex_32" aria-selected="false">
                                    PEDIGREE | REGISTRATION INFO
                                </button>
                                <button class="nav-link" id="v-pills-detail_7_sold_33-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_7_sold_33" type="button" role="tab"
                                    aria-controls="v-pills-detail_7_ex_33" aria-selected="false">
                                    LOCATION
                                </button>
                                <button class="nav-link" id="v-pills-detail_8_sold_34-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail_8_sold_34" type="button" role="tab"
                                    aria-controls="v-pills-detail_8_ex_34" aria-selected="false">
                                    SELLER INFORMATION
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="detail_left">
                                <div class="top_blue_strip">
                                    <h3 class="heading44px fw_700 text_border">KING OF KING</h3>
                                </div>
                                <div class="sold_box">
                                    <div class="swiper horse_swiper_one">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img src="/assets/images/H_01.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_02.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_03.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_04.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_05.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                            <div class="swiper-slide"><img src="/assets/images/H_06.jpg" alt="img" class="img-fluid w-100 img_radius_one" /></div>
                                        </div>
                                        <button class="horse_arrow right"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
                                        <button class="horse_arrow left"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="sold_abs_box">
                                        <h1 class="mb-3" data-text="SOLD">SOLD</h1>
                                    </div>
                                    <div class="bottom_text">
                                        <h2>Congratulations to the seller & buyer!</h2>
                                    </div>
                                </div>
                                <div class="horser_information_box mb-0 mt-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="info_list_one">
                                                <li>BREED: <span>Gypsy Cross</span></li>
                                                <li>AGE: <span>2 Years 3 Months</span></li>
                                                <li>HEIGHT: <span>10.2 HH</span></li>
                                                <li>SEX: <span>Mare</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="info_list_one">
                                                <li>COLOR: <span>Silver Dapple</span></li>
                                                <li>REGISTERED: <span>Yes</span></li>
                                                <li>GAITED: <span>No</span></li>
                                                <li>LOCATION: <span>Lafayette, NJ</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="horser_information_box type_one">
                                    <h3 class="heading30px price_Text">SOLD FOR : $10,500.00</h3>

                                    <div class="h_tages">
                                        <p>Payment Options Available</p>
                                        <span>|</span>
                                        <p>Negotiable</p>
                                    </div>

                                    <div class="horser_information_btn_flex">
                                        <a href="#!" class="horser_action_info_btn action_btn">SELLER’S PROFILE</a>
                                        <a href="#!" class="horser_action_info_btn action_btn">CHAT WITH SELLER</a>
                                        <a href="#!" class="horser_action_info_btn action_btn">SHARE</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">

                            <div class="content_scroll detail_right ">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-detail_1_ex_27" role="tabpanel" aria-labelledby="v-pills-detail_1_ex_27-tab">
                                        <div class="image-grid">
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_03.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_03.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_04.jpg" data-fancybox="grofup_img" data-caption="Horse">
                                                <img src="/assets/images/H_04.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_05.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_05.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_06.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_06.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_03.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_03.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_04.jpg" data-fancybox="grofup_img" data-caption="Horse">
                                                <img src="/assets/images/H_04.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_05.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_05.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_06.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_06.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_03.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_03.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_04.jpg" data-fancybox="grofup_img" data-caption="Horse">
                                                <img src="/assets/images/H_04.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_05.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_05.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_06.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_06.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_01.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_01.jpg" alt="img" class="" />
                                            </a>
                                            <a href="/assets/images/H_02.jpg" data-fancybox="group_img" data-caption="Horse">
                                                <img src="/assets/images/H_02.jpg" alt="img" class="" />
                                            </a>
                                        </div>
                                        <p class="heading18px text-center mt-4"><strong>CLICK PICTURE TO ENLARGE</strong></p>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_2_sold_28" role="tabpanel" aria-labelledby="v-pills-detail_2_sold_28-tab">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div data-src="https://www.youtube.com/watch?v=mFTF9BRIoZQ&pp=ygUXaG9yc2UgZXhhbXBsZSB2aWRlbyB1c2E%3D" data-fancybox="group" data-caption="Horse 6"
                                                    class="videoplay_box">
                                                    <img src="/assets/images/H_05.jpg" alt="img" class="w-100" />
                                                    <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mFTF9BRIoZQ&pp=ygUXaG9yc2UgZXhhbXBsZSB2aWRlbyB1c2E%3D"
                                                        data-toggle="modal" data-target="#savoybeachhotel">
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div data-src="https://www.youtube.com/watch?v=mFTF9BRIoZQ&pp=ygUXaG9yc2UgZXhhbXBsZSB2aWRlbyB1c2E%3D" data-fancybox="group" data-caption="Horse 6"
                                                    class="videoplay_box">
                                                    <img src="/assets/images/H_01.jpg" alt="img" class="w-100" />
                                                    <a id="play-video" class="video-play-button" href="https://www.youtube.com/embed/hXAdt5w3sPQ" data-toggle="modal"
                                                        data-target="#savoybeachhotel">
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_3_sold_29" role="tabpanel" aria-labelledby="v-pills-detail_3_sold_29-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>SKILLS | DISCIPLINE</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Trail riding
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Dressage
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Lesson Horse
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Trick Horse
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon.png" alt="img" class="img-fluid" /></span>Jumping
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>RIDER LEVEL</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" /></span>Beginner
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" /></span>Intermediate
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_1.png" alt="img" class="img-fluid" /></span>Advanced
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_4_sold_30" role="tabpanel" aria-labelledby="v-pills-detail_4_sold_30-tab">
                                        <div class="mb-4">
                                            <h3 class="heading44px fw_700 about_horse_heading">About Taxi:</h3>
                                            <p>
                                                Max is a majestic Belgian Draft horse who works as a taxi horse in the historic district of Charleston, South Carolina. Standing over 17 hands tall with a
                                                broad chestnut coat and a flowing white mane,
                                                Max turns heads wherever he goes. With a calm and steady demeanor, Max has been a favorite among tourists for years, known for his friendly nature and
                                                impressive strength. Every morning, Max is
                                                groomed and harnessed with care by his handler, Jake, who has worked with horses his entire life.
                                            </p>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>ADDITIONAL INFORMATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one p-1">
                                                <ul class="gen_list_flex gen_list_flex_one">
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p> Trail Period:</p>
                                                        <p>Yes
                                                        <p>
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p>May Trade:</p>
                                                        <p>No
                                                        <p>
                                                    </li>
                                                    <li>
                                                        <span class="me-3"><img src="/assets/images/h_icon_2.png" alt="img" class="img-fluid" /></span>
                                                        <p>Payment Options Available:</p>
                                                        <p>Yes
                                                        <p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_5_sold_31" role="tabpanel" aria-labelledby="v-pills-detail_5_sold_31-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>PRE-PURCHASE EXAM</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one ppe_border_box">
                                                <a href="/assets/images/ppe.png" class="horse_info_btn mb-3 w-100 common_btn" data-fancybox="ppe">CLICK TO VIEW PPE</a>
                                                <div class="ppe_xray_box">
                                                    <img src="/assets/images/ppe.png" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>X-RAYS</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one ppe_border_box">
                                                <a href="/assets/images/xray.webp" class="horse_info_btn mb-3 w-100 common_btn" data-fancybox="ppe">CLICK TO VIEW X-RAYS</a>
                                                <div class="ppe_xray_box">
                                                    <img src="/assets/images/xray.webp" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_6_sold_32" role="tabpanel" aria-labelledby="v-pills-detail_6_sold_32-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>PEDIGREE</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="pedigree_box">
                                                <div class="pedigree_box_1 colord_box xy_center">
                                                    <p>PEDIGREE</p>
                                                </div>
                                                <div class="pedigree_box_1">
                                                    <div class="pedigree_box_2 border_btm colord_box xy_center">
                                                        <p>PEDIGREE</p>
                                                    </div>
                                                    <div class="pedigree_box_2 xy_center">
                                                        <p>PEDIGREE</p>
                                                    </div>
                                                </div>
                                                <div class="pedigree_box_1">
                                                    <div class="pedigree_box_2 border_btm">
                                                        <div class="pedigree_box_3 border_btm colord_box xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                        <div class="pedigree_box_3 xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                    </div>
                                                    <div class="pedigree_box_2">
                                                        <div class="pedigree_box_3 border_btm colord_box xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                        <div class="pedigree_box_3 xy_center">
                                                            <p>PEDIGREE</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pedigree_box_1">
                                                    <div class="pedigree_box_2 border_btm">
                                                        <div class="pedigree_box_3 border_btm">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                        <div class="pedigree_box_3">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pedigree_box_2">
                                                        <div class="pedigree_box_3 border_btm">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                        <div class="pedigree_box_3">
                                                            <div class="pedigree_box_4 border_btm colord_box xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                            <div class="pedigree_box_4 xy_center">
                                                                <p>PEDIGREE</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>REGISTRY INFORMATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one">
                                                <h1 class="heading30px my-2 text-center reg">Friesian Heritage and Sporthorse International REGISTRATION #: MU-9497947472973</h1>
                                                <!-- <p class="heading18px text-center">REGISTRATION #: MU-9497947472973</p>

                                                <div class="row mb-4 justify-content-center">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <a href="/assets/images/certificate_1.png" data-fancybox="certificate">
                                                            <img src="/assets/images/certificate_1.png" alt="img" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <a href="/assets/images/certificate_1.png" data-fancybox="certificate">
                                                            <img src="/assets/images/certificate_1.png" alt="img" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <p class="heading18px text-center m-0"><strong>CLICK TO ENLARGE</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detail_7_sold_33" role="tabpanel" aria-labelledby="v-pills-detail_7_sold_33-tab">
                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4">
                                                <h1>HORSES LOCATION</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
                                            </div>

                                            <div class="border_box_one">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.953385382017!2d-74.04668928459306!3d40.68924997933561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c2927b2e6fe40f4!2sStatue%20of%20Liberty!5e0!3m2!1sen!2sus!4v1716905061377!5m2!1sen!2sus"
                                                    style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="heading65px monte_carlo fw_400 mb-4 odd_heading">
                                                <h1>SERVICE PROVIDERS AROUND THIS AREA</h1>
                                                <img src="/assets/images/heading_logo.png" alt="img" class="img-fluid" />
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
                                                        <p>(973) 555-555</p>
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
                                                        <p>(973) 555-555</p>
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
                                                        <p>(973) 555-555</p>
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
                                    <div class="tab-pane fade seller_tab" id="v-pills-detail_8_sold_34" role="tabpanel" aria-labelledby="v-pills-detail_8_sold_34-tab">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h3 class="heading44px fw_700 m-0">ABOUT THE SELLER:</h3>
                                            <!-- <a href="#!" class="horse_info_btn">CHAT WIH SELLER</a> 
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <div class="seller_img">
                                                    <img src="/assets/images/seller.webp" alt="img" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                <p class="seller_desc">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                    when an unknown printer took a galley of
                                                    type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                                                    essentially unchanged. It was popularised in
                                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                                                    including versions of Lorem Ipsum.
                                                </p>
                                                <h1 class="heading18px mb-2">Social Links</h1>

                                                <div class="social_icons">
                                                    <a href="#!" title="Website Link" class="web_btn">Website</a>
                                                    <a href="#!" title="Facebook"><img src="/assets/images/facebook.png" alt="img" class="img-fluid" /></a>
                                                    <a href="#!" title="Youtube"><img src="/assets/images/youtube.png" alt="img" class="img-fluid" /></a>
                                                    <a href="#!" title="TikTok"><img src="/assets/images/tik-tok.png" alt="img" class="img-fluid" /></a>
                                                    <a href="#!" title="Instagram"><img src="/assets/images/instagram.png" alt="img" class="img-fluid" /></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="seller_action_btn_flex d-flex gap-2 mb-4">
                                            <a href="#!" class="horse_info_btn"><span>HORSES FOR SALE (5)</span></a>
                                            <a href="#!" class="horse_info_btn common_btn">HORSES SOLD (25)</a>
                                        </div>

                                        <div class="row gy-4">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                            <li><strong>Sex:</strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                            <li><strong>Sex:</strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> Friesian Sport Horse</li>
                                                                            <li><strong>Age:</strong> 1.5 Years Old</li>
                                                                            <li><strong>Sex:</strong> Gelding</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="horse_list_card">
                                                    <div class="blue_stripe">
                                                        <h2>ZION</h2>
                                                    </div>
                                                    <div class="img_box">
                                                        <div class="swiper horse_list_card_slider h-100 w-100">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/courses/sm1.jpg" alt="" />
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="arrow_flex">
                                                            <button class="horse_arrow_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                                            <button class="horse_arrow_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="blue_stripe">
                                                        <h3>Price: $10,000.00</h3>
                                                    </div>
                                                    <div class="text_box">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Breed:</strong> {{ $data->pro_breed }}</li>
                                                                            <li><strong>Age:</strong> {{ $data->pro_age_year }} Years {{ $data->pro_age_month }} Old</li>
                                                                            <li><strong>Sex:</strong> {{ $data->pro_gender }}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="info_list">
                                                                            <li><strong>Height:</strong> 15 HH</li>
                                                                            <li><strong>Ad Type:</strong> Auction</li>
                                                                            <li><strong>Location:</strong> New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="blue_stripe">
                                                            <ul class="top_list">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="google_ad_box mt-3">
                                <img src="/assets/images/horser_ad.png" alt="img" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

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

@endsection
