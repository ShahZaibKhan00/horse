@extends('layouts.app') @section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .top_head {
   text-align: center;
   }
   .top_head img {
   max-width: 70px;
   margin-bottom: 10px;
   }
   .membershipBanner {
   padding: 0px 20px;
   }
   .membershipBanner .heading_main {
   font-family: "AvenirNextLTPro-Bold";
   font-size: 80px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   }
   .filter_sec {
   padding: 20px 10px;
   }
   .filter_row {
   display: flex;
   }
   .filter_side_bar {
   width: 350px;
   background-color: #1d2139;
   }
   .filter_content_box {
   width: calc(100% - 350px);
   padding-left: 20px;
   }
   .filter_side_bar {
   padding: 20px;
   }
   .filter_side_bar .heading44px {
   font-family: "AvenirLTStd-Book";
   font-size: 30px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   }
   .search-form {
   background: white;
   border-radius: 8px;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
   width: 100%;
   }
   .form-section {
   border-bottom: 1px solid #e0e0e0;
   padding: 15px 20px;
   }
   .form-section:last-child {
   border-bottom: none;
   }
   .section-title {
   font-size: 15px;
   font-weight: 600;
   color: #1d2139;
   text-transform: uppercase;
   letter-spacing: 0.5px;
   margin-bottom: 10px;
   }
   .location-input {
   position: relative;
   }
   .location-input input {
      width: 100%;
      padding: 8px 30px 8px 10px;
      border: 1px solid #1d2139;
      border-radius: 0;
      font-size: 14px;
      outline: none;
      transition: border-color 0.3s;
   }
   .location-input input:focus {
   border-color: #1d2139;
   }
   .location-clear {
   position: absolute;
   right: 8px;
   top: 50%;
   transform: translateY(-50%);
   background: none;
   border: none;
   font-size: 16px;
   color: #999;
   cursor: pointer;
   width: 20px;
   height: 20px;
   display: flex;
   align-items: center;
   justify-content: center;
   }
   .distance-controls {
   display: flex;
   align-items: center;
   gap: 10px;
   margin-bottom: 8px;
   }
   .distance-input {
   padding: 6px 8px;
   border: 1px solid #1d2139;
   border-radius: 0;
   font-size: 14px;
   text-align: center;
   width: 100%;
   }
   .unit-label {
   font-size: 12px;
   color: #666;
   font-weight: 500;
   }
   .checkbox-grid {
   display: grid;
   grid-template-columns: auto auto auto auto;
   gap: 8px 15px;
   align-items: center;
   margin-top: 8px;
   }
   .checkbox-header {
   font-size: 11px;
   color: #666;
   font-weight: 600;
   text-align: center;
   }
   .checkbox-row {
   display: contents;
   }
   .checkbox-label {
   font-size: 12px;
   color: #333;
   }
   .checkbox-item {
   display: flex;
   justify-content: center;
   }
   .checkbox-item input[type="checkbox"] {
   width: 14px;
   height: 14px;
   accent-color: #007bff;
   }
   .form-select:focus,
   .form-control:focus {
   border-color: #86b7fe;
   outline: 0;
   box-shadow: 0 0 0 0.25rem rgb(250 233 207);
   }
   .select-field {
   width: 100%;
   padding: 8px 10px;
   border: 1px solid #1d2139;
   border-radius: 0;
   font-size: 14px;
   background: #fff;
   outline: none;
   transition: border-color 0.3s;
   box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 23px inset;
   }
   .select-field:focus {
   border-color: #007bff;
   }
   .skills-tags {
   display: flex;
   flex-wrap: wrap;
   gap: 5px;
   margin-bottom: 8px;
   }
   .skill-tag {
   background: #c0995754;
   color: #000000;
   padding: 4px 11px;
   border-radius: 12px;
   font-size: 12px;
   display: flex;
   align-items: center;
   gap: 4px;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   }
   .skill-tag .remove {
   background: none;
   border: none;
   color: #1d2139;
   cursor: pointer;
   font-size: 12px;
   padding: 0;
   width: 14px;
   height: 14px;
   display: flex;
   align-items: center;
   justify-content: center;
   border-radius: 50%;
   }
   .range-inputs {
   display: flex;
   align-items: center;
   gap: 8px;
   margin-top: 8px;
   }
   .range-input {
   padding: 6px 8px;
   border: 1px solid #ccc;
   border-radius: 4px;
   font-size: 14px;
   text-align: center;
   }
   .range-separator {
   font-size: 12px;
   color: #666;
   }
   .age-options {
   display: flex;
   align-items: center;
   gap: 15px;
   margin-top: 8px;
   }
   .age-option {
   display: flex;
   align-items: center;
   gap: 5px;
   }
   .age-option input[type="checkbox"] {
   width: 14px;
   height: 14px;
   accent-color: #007bff;
   }
   .age-option label {
   font-size: 12px;
   color: #333;
   }
   .price-inputs {
   display: flex;
   align-items: center;
   gap: 8px;
   margin-top: 8px;
   }
   .price-symbol {
   font-size: 16px;
   color: #333;
   font-weight: 500;
   }
   .action-buttons {
   padding: 20px;
   display: flex;
   flex-direction: column;
   gap: 10px;
   }
   .btn {
   padding: 10px 15px;
   border: none;
   border-radius: 4px;
   font-size: 14px;
   font-weight: 500;
   cursor: pointer;
   transition: all 0.3s;
   display: flex;
   align-items: center;
   justify-content: center;
   gap: 8px;
   }
   .btn-primary {
   background: #007bff;
   color: white;
   }
   .btn-primary:hover {
   background: #0056b3;
   }
   .btn-secondary {
   background: #f8f9fa;
   color: #6c757d;
   border: 1px solid #dee2e6;
   }
   .btn-secondary:hover {
   background: #e9ecef;
   }
   .btn-icon {
   font-size: 12px;
   }
   .form-check-input:checked {
   background-color: #b39648;
   border-color: #b39648;
   }
   .form-check-input[type="radio"] {
   border-radius: 5px;
   }
   .form-check-input {
   width: 15px;
   height: 15px;
   margin-top: 1px;
   }
   .shortcuts_tags_flex {
   display: flex;
   align-items: center;
   gap: 10px;
   flex-wrap: wrap;
   margin-bottom: 25px;
   }
   .shortcuts_tags_item {
   width: fit-content;
   height: 50px;
   display: flex;
   align-items: center;
   gap: 10px;
   padding: 10px;
   border: 2px solid #1c2038;
   cursor: pointer;
   }
   .shortcuts_tags_item p {
   margin: 0;
   }
   .shortcuts_tags_item i {
   font-size: 18px;
   }
   .choose-btn {
   font-size: 15px;
   font-family: "AvenirNextLTPro-Bold";
   padding: 10px 35px;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   width: 100%;
   text-transform: uppercase;
   border-radius: 0;
   z-index: 999;
   border: none;
   color: #1d2139;
   letter-spacing: 0.5px;
   cursor: pointer;
   border: 1px solid #1d2139;
   text-transform: capitalize;
   transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease, color 0.3s ease;
   display: flex;
   justify-content: center;
   align-items: center;
   gap: 5px;
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
   .horse_list_card .img_box {
   height: 220px;
   }
   .blue_stripe h2 {
   font-size: 25px;
   text-transform: uppercase;
   padding: 5px 0px;
   }
   .reset_btn {
   max-width: 200px;
   font-size: 11px;
   padding: 10px;
   }
   .filter_right_flex {
   display: flex;
   align-items: center;
   gap: 10px;
   }
   .filter_right_flex select {
   padding: 10px;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   outline: 0;
   font-size: 11px;
   font-family: "AvenirNextLTPro-Bold";
   }
   .filter_right_flex p {
   margin: 0;
   font-size: 11px;
   font-family: "AvenirNextLTPro-Bold";
   }
   .filter_min_bars {
   display: flex;
   align-items: center;
   justify-content: space-between;
   margin-bottom: 20px;
   }
   .select-wrapper {
   position: relative;
   display: inline-block;
   width: 100%;
   }
   .select-wrapper::after {
   content: "▼";
   /* you can replace with an icon/font if needed */
   position: absolute;
   right: 10px;
   top: 50%;
   transform: translateY(-50%);
   pointer-events: none;
   /* disables click so select remains clickable */
   font-size: 12px;
   color: #1d2139;
   }
   .real_icon_box img {
   max-width: 15px;
   margin-right: 10px;
   }
   .card_about_heading {
   font-size: 18px;
   margin-bottom: 00px;
   }
   .about_sm_desc {
   font-size: 12px;
   max-height: 130px;
   overflow-y: auto;
   }
   .icon_heart {
   position: absolute;
   font-size: 30px;
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
   .real_estate_card .blue_stripe.top_strip {
   background: #1d2139;
   border: 3px solid #ae8e3b;
   position: relative;
   }
   .select2-container--default .select2-results__option--selected {
   background-color: #f3f3f3 !important;
   color: #000 !important;
   }
   .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
   background-color: #1d2139;
   color: #ffffff;
   }
   .select2-results__option--selectable {
   cursor: pointer;
   background: #fff;
   color: #000;
   }
.gen_card_flex {
   display: flex;
   align-items: center;
   width: 100%;
   justify-content: flex-start;
   max-width: 100%;
   margin: 0 auto;
   flex-wrap: wrap;
   gap: 15px;
   }
   .gen_card_flex .horse_list_card {
   width: 24%;
   margin-bottom: 25px;
   }
   
   .horse_list_card_new .custome_listing_row {
   display: flex;
   width: 100%;
   gap: 0px;
   justify-content: space-between;
   }
   .horse_list_card_new .custome_listing_col {
      width: 49.2%;
   }
   horse_list_card_new .custome_listing_col .info_list li {
   margin-bottom: 5px;
   font-size: 16px;
   padding: 8px;
   line-height: 1;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
   .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
   width: 100%;
   font-size: 14px;
   height: 35px;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new.top_row,
   .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
   display: flex;
   gap: 5px;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new.top_row .fvrt_btn {
   width: 33.33%;
   }
   .horse_list_card_new .info_list {
   list-style: none;
   margin: 0px 0px;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row {
   margin-bottom: 5px;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new.top_row .horse_card_btn {
   width: 33.33%;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row .horse_card_btn,
   .horse_list_card_new .horse_list_card_btn_flex_new.bottom_row .fvrt_btn {
   width: 100%;
   }
   .horse_list_card_new .top_list {
   padding: 5px 0px;
   }
   .horse_list_card_new .top_list li {
   font-size: 14px;
   }
   .horse_list_card_new .blue_stripe.blue_stripe_new {
   padding: 2px 5px 6px 0px;
   }
   .horse_list_card_new .icon_heart {
   position: absolute;
   font-size: 24px;
   top: 50%;
   transform: translateY(-50%);
   right: 15px;
   }
   .fs_tag {
      font-size: 14px;
      padding: 3px 32px;
      top: -8px;
      font-weight: 600;
      left: -5px;
   }
   .horse_list_card_new .blue_stripe {
   padding: 0 5px 0px 5px;
   }
   .horse_list_card_new .blue_wrapper {
   padding: 5px;
   }
   .horse_list_card.horse_list_card_new .blue_stripe h3 {
   font-size: 32px;
   text-transform: uppercase;
   }
   .breed_text {
   background: #1d2139;
   position: absolute;
   bottom: 0;
   left: 0;
   width: 100%;
   height: 45px;
   z-index: 999;
   text-align: center;
   font-size: 25px;
   font-weight: 500;
   margin: 0;
   display: flex;
   align-items: center;
   justify-content: center;
   text-transform: uppercase;
   }
   .real_estate_card_new.horse_list_card_new .blue_stripe.blue_tripe_new {
   padding: 30px 5px 0px 5px;
   }
   .real_estate_card_new.horse_list_card_new .icon_heart {
   font-size: 24px;
   top: 10px;
   transform: none;
   right: 10px;
   }
   .real_estate_card_new.horse_list_card_new .custome_listing_col .info_list li {
      font-size: 16px;
      margin: 5px 0px;
      padding: 4px 8px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      border: 1px solid #1d2139;
      text-align: center;
   }
   .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
   .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
   text-transform: uppercase;
   }
   @media only screen and (max-width: 1799px) {
      .filter_sec {
      padding: 10px 0px;
      }
      .filter_side_bar {
      width: 300px;
      padding: 10px;
      }
      .filter_content_box {
      width: calc(100% - 300px);
      padding-left: 12px;
      }
      .shortcuts_tags_item {
      height: 35px;
      padding: 10px;
      font-size: 11px;
      }
      .filter_side_bar {
      padding: 10px;
      }
      .form-section {
      padding: 12px 10px;
      }
      .checkbox-label {
      font-size: 10px;
      }
      .choose-btn {
      font-size: 12px;
      padding: 10px 7px;
      }
      .blue_stripe h2 {
      font-size: 18px;
      }
      .icon_heart {
      font-size: 20px;
      right: 14px;
      }
      .horse_list_card_new .horse_list_card_btn_flex_new .horse_card_btn,
      .horse_list_card_new .horse_list_card_btn_flex_new .fvrt_btn {
      font-size: 10.8px;
      }
      .horse_list_card.horse_list_card_new .img_box {
      width: 100%;
      height: 200px;
   }
      .horse_list_card.horse_list_card_new .blue_stripe h3 {
      font-size: 20px;
   }
   .real_estate_card_new.horse_list_card_new .custome_listing_col .info_list li {
      font-size: 14px;
   }
   }
   @media only screen and (max-width: 1600px) {
    .gen_card_flex .horse_list_card {
        width: 250px;
    }
   }
    @media (max-width: 1400px) {
      .gen_card_flex .horse_list_card {
         width: 230px;
      }
      .filter_side_bar {
         width: 270px;
      }
      .filter_content_box {
         width: calc(100% - 270px);
         padding-left: 12px;
      }
      .real_estate_card_new.horse_list_card_new .custome_listing_col .info_list li {
         font-size: 11px;
      }
      .fs_tag {
            font-size: 12px;
            padding: 1px 6px;
         }
         .horse_list_card.horse_list_card_new .img_box {
         width: 100%;
         height: 170px;
      }
    }
</style>
<section class="inner_page_banner membershipBanner">
   <div class="container text-center">
      <h1 class="heading_main">REAL ESTATE LISTINGS</h1>
   </div>
</section>
<section class="filter_sec">
   <div class="tag-notification" id="tagNotification"></div>
   <div class="container-fluid">
      <div class="filter_row">
         <div class="filter_side_bar">
            <div class="top_head">
               <img src="assets/images/heading_logo.png" alt="img" class="img-fluid">
               <h3 class="heading44px mb-4 text-center">SEARCH & FILTER ADS</h3>
            </div>
            <form action="{{ route('realestate_listing_filter') }}" method="GET" class="search-form" id="mainForm">
               <!-- Location Section -->
               <div class="form-section">
                  <div class="section-title">Location</div>
                  <div class="location-input">
                     <select class="form-control mb-3" name="location">
                        <option value="">Select your State</option>
                        <option value="alabama (AL)" {{ request('location') == 'alabama (AL)' ? 'selected' : '' }}>Alabama</option>
                        <option value="alaska (AK)" {{ request('location') == 'alaska (AK)' ? 'selected' : '' }}>Alaska</option>
                        <option value="arizona (AZ)" {{ request('location') == 'arizona (AZ)' ? 'selected' : '' }}>Arizona</option>
                        <option value="arkansas (AR)" {{ request('location') == 'arkansas (AR)' ? 'selected' : '' }}>Arkansas</option>
                        <option value="california (CA)" {{ request('location') == 'california (CA)' ? 'selected' : '' }}>California</option>
                        <option value="colorado (CO)" {{ request('location') == 'colorado (CO)' ? 'selected' : '' }}>Colorado</option>
                        <option value="connecticut (CT)" {{ request('location') == 'connecticut (CT)' ? 'selected' : '' }}>Connecticut</option>
                        <option value="delaware (DE)" {{ request('location') == 'delaware (DE)' ? 'selected' : '' }}>Delaware</option>
                        <option value="florida (FL)" {{ request('location') == 'florida (FL)' ? 'selected' : '' }}>Florida</option>
                        <option value="georgia (GA)" {{ request('location') == 'georgia (GA)' ? 'selected' : '' }}>Georgia</option>
                        <option value="hawaii (HI)" {{ request('location') == 'hawaii (HI)' ? 'selected' : '' }}>Hawaii</option>
                        <option value="idaho (ID)" {{ request('location') == 'idaho (ID)' ? 'selected' : '' }}>Idaho</option>
                        <option value="illinois (IL)" {{ request('location') == 'illinois (IL)' ? 'selected' : '' }}>Illinois</option>
                        <option value="indiana (IN)" {{ request('location') == 'indiana (IN)' ? 'selected' : '' }}>Indiana</option>
                        <option value="iowa (IA)" {{ request('location') == 'iowa (IA)' ? 'selected' : '' }}>Iowa</option>
                        <option value="kansas (KS)" {{ request('location') == 'kansas (KS)' ? 'selected' : '' }}>Kansas</option>
                        <option value="kentucky (KY)" {{ request('location') == 'kentucky (KY)' ? 'selected' : '' }}>Kentucky</option>
                        <option value="louisiana (LA)" {{ request('location') == 'louisiana (LA)' ? 'selected' : '' }}>Louisiana</option>
                        <option value="maine (ME)" {{ request('location') == 'maine (ME)' ? 'selected' : '' }}>Maine</option>
                        <option value="maryland (MD)" {{ request('location') == 'maryland (MD)' ? 'selected' : '' }}>Maryland</option>
                        <option value="massachusetts (MA)" {{ request('location') == 'massachusetts (MA)' ? 'selected' : '' }}>Massachusetts</option>
                        <option value="michigan (MI)" {{ request('location') == 'michigan (MI)' ? 'selected' : '' }}>Michigan</option>
                        <option value="minnesota (MN)" {{ request('location') == 'minnesota (MN)' ? 'selected' : '' }}>Minnesota</option>
                        <option value="mississippi (MS)" {{ request('location') == 'mississippi (MS)' ? 'selected' : '' }}>Mississippi</option>
                        <option value="missouri (MO)" {{ request('location') == 'missouri (MO)' ? 'selected' : '' }}>Missouri</option>
                        <option value="montana (MT)" {{ request('location') == 'montana (MT)' ? 'selected' : '' }}>Montana</option>
                        <option value="nebraska (NE)" {{ request('location') == 'nebraska (NE)' ? 'selected' : '' }}>Nebraska</option>
                        <option value="nevada (NV)" {{ request('location') == 'nevada (NV)' ? 'selected' : '' }}>Nevada</option>
                        <option value="new_hampshire (NH)" {{ request('location') == 'new_hampshire (NH)' ? 'selected' : '' }}>New Hampshire</option>
                        <option value="new_jersey (NJ)" {{ request('location') == 'new_jersey (NJ)' ? 'selected' : '' }}>New Jersey</option>
                        <option value="new_mexico (NM)" {{ request('location') == 'new_mexico (NM)' ? 'selected' : '' }}>New Mexico</option>
                        <option value="new_york (NY)" {{ request('location') == 'new_york (NY)' ? 'selected' : '' }}>New York</option>
                        <option value="north_carolina (NC)" {{ request('location') == 'north_carolina (NC)' ? 'selected' : '' }}>North Carolina</option>
                        <option value="north_dakota (ND)" {{ request('location') == 'north_dakota (ND)' ? 'selected' : '' }}>North Dakota</option>
                        <option value="ohio (OH)" {{ request('location') == 'ohio (OH)' ? 'selected' : '' }}>Ohio</option>
                        <option value="oklahoma (OK)" {{ request('location') == 'oklahoma (OK)' ? 'selected' : '' }}>Oklahoma</option>
                        <option value="oregon (OR)" {{ request('location') == 'oregon (OR)' ? 'selected' : '' }}>Oregon</option>
                        <option value="pennsylvania (PA)" {{ request('location') == 'pennsylvania (PA)' ? 'selected' : '' }}>Pennsylvania</option>
                        <option value="rhode_island (RI)" {{ request('location') == 'rhode_island (RI)' ? 'selected' : '' }}>Rhode Island</option>
                        <option value="south_carolina (SC)" {{ request('location') == 'south_carolina (SC)' ? 'selected' : '' }}>South Carolina</option>
                        <option value="south_dakota (SD)" {{ request('location') == 'south_dakota (SD)' ? 'selected' : '' }}>South Dakota</option>
                        <option value="tennessee (TN)" {{ request('location') == 'tennessee (TN)' ? 'selected' : '' }}>Tennessee</option>
                        <option value="texas (TX)" {{ request('location') == 'texas (TX)' ? 'selected' : '' }}>Texas</option>
                        <option value="utah (UT)" {{ request('location') == 'utah (UT)' ? 'selected' : '' }}>Utah</option>
                        <option value="vermont (VT)" {{ request('location') == 'vermont (VT)' ? 'selected' : '' }}>Vermont</option>
                        <option value="virginia (VA)" {{ request('location') == 'virginia (VA)' ? 'selected' : '' }}>Virginia</option>
                        <option value="washington (WA)" {{ request('location') == 'washington (WA)' ? 'selected' : '' }}>Washington</option>
                        <option value="west_virginia (WV)" {{ request('location') == 'west_virginia (WV)' ? 'selected' : '' }}>West Virginia</option>
                        <option value="wisconsin (WI)" {{ request('location') == 'wisconsin (WI)' ? 'selected' : '' }}>Wisconsin</option>
                        <option value="wyoming (WY)" {{ request('location') == 'wyoming (WY)' ? 'selected' : '' }}>Wyoming</option>
                     </select>

                     {{-- <input type="text" class="form-control" name="location" value="{{ request('location', '') }}" placeholder="City, State, or Zip" />
                     <button class="location-clear" onclick="clearLocation()">×</button> --}}
                  </div>
               </div>
               <!-- Distance Range Section -->
               <div class="form-section">
                  <div class="section-title">Distance Range</div>
                  <div class="distance-controls">
                     <input type="number" class="distance-input form-control" name="distance_min" placeholder="MIN" />
                     <input type="number" class="distance-input form-control" name="distance_max" placeholder="MAX" />
                  </div>
                  <div class="unit-label mt-3">
                     <div class="checkbox-item justify-content-start gap-3">
                        <label><input type="radio" class="form-check-input" name="hr_miles" /> Hours</label>
                        <label><input type="radio" class="form-check-input" name="hr_miles" /> Miles</label>
                     </div>
                  </div>
               </div>
               <!-- Price Range Section -->
               <div class="form-section">
                  <div class="section-title">Price Range</div>
                  <div class="price-inputs">
                     <span class="price-symbol">$</span>
                     <input type="text" class="range-input form-control w-100 thousand-separator" name="price_min" value="{{ request('price_min', '') }}" placeholder="MIN" />
                     <span class="range-separator">TO</span>
                     <input type="text" class="range-input form-control w-100 thousand-separator" name="price_max" value="{{ request('price_max', '') }}" placeholder="MAX" />
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title">Acerage</div>
                  <div class="price-inputs">
                     <input type="number" class="range-input form-control w-100" name="acre_min" value="{{ request('acre_min', '') }}" placeholder="MIN" />
                     <span class="range-separator">TO</span>
                     <input type="number" class="range-input form-control w-100" name="acre_max" value="{{ request('acre_max', '') }}" placeholder="MAX" />
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title">Bedrooms</div>
                  <div class="price-inputs">
                     <input type="number" class="range-input form-control w-100" name="bedrooms_min" value="{{ request('bedrooms_min', '') }}" placeholder="MIN" />
                     <span class="range-separator">TO</span>
                     <input type="number" class="range-input form-control w-100" name="bedrooms_max" value="{{ request('bedrooms_max', '') }}" placeholder="MAX" />
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title">Bathrooms</div>
                  <div class="price-inputs">
                     <input type="number" class="range-input form-control w-100" name="bathrooms_min" value="{{ request('bathrooms_min', '') }}" placeholder="MIN" />
                     <span class="range-separator">TO</span>
                     <input type="number" class="range-input form-control w-100" name="bathrooms_max" value="{{ request('bathrooms_max', '') }}" placeholder="MAX" />
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title">Has Barns</div>
                  <div class="unit-label mt-3">
                     <div class="checkbox-item justify-content-start gap-3">
                        <label><input type="radio" class="form-check-input" @checked(request('heated_barn') == 'yes') value="yes" name="heated_barn" /> Yes</label>
                        <label><input type="radio" class="form-check-input" @checked(request('heated_barn') == 'no') value="no" name="heated_barn" /> No</label>
                     </div>
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title"># of Stalls</div>
                  <div class="price-inputs">
                     <input type="number" class="range-input form-control w-100" name="stall_min" value="{{ request('stall_min', '') }}" placeholder="MIN" />
                     <span class="range-separator">TO</span>
                     <input type="number" class="range-input form-control w-100" name="stall_max" value="{{ request('stall_max', '') }}" placeholder="MAX" />
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title">Has Indoor Ring</div>
                  <div class="unit-label mt-3">
                     <div class="checkbox-item justify-content-start gap-3">
                        <label><input type="radio" class="form-check-input" @checked(request('has_indoor_ring') == 'yes') value="yes" name="has_indoor_ring" /> Yes</label>
                        <label><input type="radio" class="form-check-input" @checked(request('has_indoor_ring') == 'no') value="no" name="has_indoor_ring" /> No</label>
                     </div>
                  </div>
               </div>
               <div class="form-section">
                  <div class="section-title">Has Outdoor Ring</div>
                  <div class="unit-label mt-3">
                     <div class="checkbox-item justify-content-start gap-3">
                        <label><input type="radio" class="form-check-input" value="yes" @checked(request('has_outdoor_ring') == 'yes') name="has_outdoor_ring" /> Yes</label>
                        <label><input type="radio" class="form-check-input" value="no" @checked(request('has_outdoor_ring') == 'no') name="has_outdoor_ring" /> No</label>
                     </div>
                  </div>
               </div>
               <div class="form-section">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="section-title">Fencing</div>
                        <div class="unit-label mt-3">
                           <div class="checkbox-item justify-content-start gap-3">
                              <label><input type="radio" class="form-check-input" value="yes" @checked(request('fenced_grass') == 'yes') name="fenced_grass" /> Yes</label>
                              <label><input type="radio" class="form-check-input" value="no" @checked(request('fenced_grass') == 'no') name="fenced_grass" /> No</label>
                           </div>
                        </div>
                        <div class="unit-label mt-3 unit-label-one">
                           <div class="checkbox-item justify-content-start gap-3">
                              <label>
                              <input type="checkbox" class="form-check-input" value="vinyl" name="fencing[]" @checked(is_array(request('fencing')) && in_array('vinyl', request('fencing'))) />
                              Vinyl
                              </label>
                              <label>
                              <input type="checkbox" class="form-check-input" value="wood" name="fencing[]" @checked(is_array(request('fencing')) && in_array('wood', request('fencing'))) />
                              Wood
                              </label>
                              <label>
                              <input type="checkbox" class="form-check-input" value="electric" name="fencing[]" @checked(is_array(request('fencing')) && in_array('electric', request('fencing'))) />
                              Electric
                              </label>
                              <label>
                              <input type="checkbox" class="form-check-input" value="metal" name="fencing[]" @checked(is_array(request('fencing')) && in_array('metal', request('fencing'))) />
                              Metal
                              </label>
                              <label>
                              <input type="checkbox" class="form-check-input" value="other" name="fencing[]" @checked(is_array(request('fencing')) && in_array('other', request('fencing'))) />
                              Other
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Amenities Section -->
               <div class="form-section">
                  <div class="section-title">Amenities</div>
                  <div class="skills-tags" id="amenities-tags">
                     <div class="skill-tag" id="skill-tag">
                     </div>
                  </div>
                  <div class="select-wrapper">
                     <select class="select-field form-select amenities_select" name="amenitie[]" multiple="multiple" id="amenities">
                        <option>Select Amenities</option>
                        @forelse ($amenities as $amenitie)
                        <option value="{{ $amenitie->amenities }}">{{ Str::title($amenitie->amenities) }}</option>
                        @empty
                        @endforelse
                     </select>
                  </div>
               </div>
               <div class="action-buttons border_btm">
                  <button class="choose-btn" type="submit">
                  <span class="btn-icon">🔍</span>
                  SEARCH
                  </button>
               </div>
               <!-- Action Buttons -->
               <div class="action-buttons">
                  <button class="choose-btn" type="submit">
                  <span class="btn-icon">💾</span>
                  SAVE THIS SEARCH
                  </button>
                  <a href="{{ route('realestate_listing_filter') }}" class="choose-btn">
                  <span class="btn-icon">🔄</span>
                  RESET
                  </a>
               </div>
            </form>
         </div>
         <div class="filter_content_box">
            <div class="shortcuts_tags_flex" id="shortcutsContainer">
            </div>
            <div class="filter_min_bars">
               <a href="{{ route('realestate_listing_filter') }}" class="reset_btn choose-btn"><i class="fa fa-refresh" aria-hidden="true"></i> RESET SEARCH CRITERIA</a>
               <div class="filter_right_flex">
                  <p>1-24 of 494 Listing</p>
                  <select>
                     <option value="">1-34</option>
                     <option value="">1-44</option>
                     <option value="">1-54</option>
                  </select>
                  <select id="sort" name="sort" onchange="sortState(this.value)">
                    <option value="" {{ $sort == '' ? 'selected' : '' }}>Default (Newest)</option>
                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                </select>
               </div>
            </div>
            <div class="scroller">
               <!-- Static Realestate Card -->
               
               <div class="gen_card_flex">
                @forelse ($states as $state)
                  <div class="horse_list_card horse_list_card_new real_estate_card_new">
                     <p class="fs_tag">{{ $state['ad_type'] }}</p>
                     <div class="blue_stripe blue_tripe_new">
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

                        <h2>{{ $state['real_title'] }}, {{$displayLocation}}</h2>
                        <label class="heart_checkbox_wrapper d-block">
                        <input type="checkbox" class="heartCheckbox" hidden />
                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                        </label>
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
                     </div>
                     <div class="text_box">
                        <div class="custome_listing_row">
                           <div class="custome_listing_col">
                              <ul class="info_list">
                                 <li class="mb-1">
                                    <span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid" /></span>
                                    {{ $state['real_acres'] }} Acres
                                 </li>
                                 <li class="mb-1">
                                    <span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid" /></span>
                                    {{ $state['real_bedroom'] }}
                                    Bedrooms
                                 </li>
                              </ul>
                           </div>
                           <div class="custome_listing_col">
                              <ul class="info_list">
                                 <li class="mb-1">
                                    <span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid" /></span>
                                    {{ $state['real_bathroom'] }}
                                    Bathrooms
                                 </li>
                                 <li class="mb-1">
                                    <span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid" /></span>
                                    {{ implode(' | ', array_slice(explode(',', $state['garage_type']), 0, 2)) }}
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="blue_wrapper">
                           <div class="blue_stripe mb-2">
                              <h3>Price: {{ $state['real_price'] }}</h3>
                           </div>
                           <div class="horse_list_card_btn_flex_new bottom_row">
                              <a href="#!" class="horse_card_btn w-100">View All Details</a>
                           </div>
                           <div class="horse_list_card_btn_flex_new bottom_row">
                              <a href="javascript:;" class="horse_card_btn">Seller Profile</a>
                              <a href="javascript:;" class="horse_card_btn">Chat with Seller</a>
                           </div>
                           <div class="horse_list_card_btn_flex_new bottom_row">
                              <a href="javascript:;" class="horse_card_btn">Share</a>
                              <form action="" class="horse_card_btn" method="POST">
                                 <button class="fvrt_btn" type="submit">
                                 Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                 </button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @empty
                 @endforelse
               </div>
               
               <!-- @forelse ($states as $state)
               <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                  <div class="horse_list_card real_estate_card">
                     <div class="blue_stripe top_strip">
                        <h2>{{ $state['real_title'] }}</h2>
                        <label class="heart_checkbox_wrapper d-block">
                        <input type="checkbox" class="heartCheckbox" hidden />
                        <i class="fa fa-heart-o icon_heart" aria-hidden="true"></i>
                        </label>
                        @php
                        $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                        @endphp
                     </div>
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
                        <p class="fs_tag">{{ $state['ad_type'] }}</p>
                     </div>
                     <div class="text_box">
                        <div class="row py-2">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="row">
                                 <div class="col-12">
                                    <ul class="info_list m-0">
                                       <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_1.png" alt="img" class="img-fluid"></span>
                                          {{ $state['real_acres'] }}
                                          Acres
                                       </li>
                                       <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_2.png" alt="img" class="img-fluid"></span>
                                          {{ $state['real_bedroom'] }}
                                          Bedrooms 
                                       </li>
                                       <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_3.png" alt="img" class="img-fluid"></span>
                                          {{ $state['real_bathroom'] }}
                                          Baths
                                       </li>
                                       <li class="mb-1"><span class="real_icon_box"><img src="/assets/images/realestate_icon_4.png" alt="img" class="img-fluid"></span>
                                          {{ str_replace(',', ' | ', $state['garage_type']) }}
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="row">
                                 <div class="col-12">
                                    <h5 class="heading44px card_about_heading">About</h5>
                                    <p class="about_sm_desc">{{ $state['property_overview'] }}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="blue_wrapper">
                           <div class="blue_stripe">
                              <h3>Price: {{ $state['real_price'] }}</h3>
                           </div>
                           <div class="horse_list_card_btn_flex">
                              <a href="#!" class="horse_card_btn">Pictures</a>
                              <a href="#!" class="horse_card_btn">Videos</a>
                              <a href="#!" class="horse_card_btn">View Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               @endforelse -->
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   function clearLocation() {
       document.querySelector(".location-input input").value = "";
   }
   
   function removeSkill(button) {
       button.parentElement.remove();
   }
   
   function saveSearch() {
       alert("Search criteria saved!");
   }
   
   function resetSearch() {
       // Reset all form fields
       document.querySelectorAll("input").forEach((input) => {
           if (input.type === "checkbox") {
               input.checked = false;
           } else {
               input.value = "";
           }
       });
   
       document.querySelectorAll("select").forEach((select) => {
           select.selectedIndex = 0;
       });
   
       alert("Search criteria reset!");
   }
   
   // Add some interactivity for the skills dropdown
   document.querySelector(".skill_select").addEventListener("change", function(e) {
       if (e.target.value && e.target.selectedIndex > 0) {
           const skillsContainer = document.querySelector(".skills-tags");
           const newSkill = document.createElement("div");
           newSkill.className = "skill-tag";
           newSkill.innerHTML = `
               ${e.target.value}
               <button class="remove" onclick="removeSkill(this)">×</button>
           `;
           skillsContainer.appendChild(newSkill);
           e.target.selectedIndex = 0;
       }
   });
</script>
<script>
   function removeTag(button) {
       button.parentElement.remove();
   }
   
   function saveSearch() {
       alert("Search criteria saved!");
   }
   
   function resetSearch() {
       // Reset amenities tags to initial state
       document.getElementById("amenities-tags").innerHTML = `
           <div class="skill-tag">
               Indoor Arena
               <button class="remove" onclick="removeTag(this)">×</button>
           </div>
           <div class="skill-tag">
               Outdoor Arena
               <button class="remove" onclick="removeTag(this)">×</button>
           </div>
           <div class="skill-tag">
               Trail Access
               <button class="remove" onclick="removeTag(this)">×</button>
           </div>
       `;
   
       // Reset select dropdown
       document.querySelector(".amenities_select").selectedIndex = 0;
   
       alert("Search criteria reset!");
   }
   
   // Amenities Select Functionality
   function addAmenitiesTag(selectElement) {
       if (selectElement.value && selectElement.selectedIndex > 0) {
           const container = document.getElementById("amenities-tags");
   
           // Check if tag already exists
           const existingTags = Array.from(container.children);
           const tagExists = existingTags.some(tag =>
               tag.textContent.trim().replace('×', '').trim() === selectElement.value
           );
   
           if (!tagExists) {
               const newTag = document.createElement("div");
               newTag.className = "skill-tag";
               newTag.innerHTML = `
                   ${selectElement.value}
                   <button class="remove" onclick="removeTag(this)">×</button>
               `;
               container.appendChild(newTag);
           }
   
           selectElement.selectedIndex = 0;
       }
   }
   
   // Event listener for amenities select
   document.querySelector(".amenities_select").addEventListener("change", function(e) {
       addAmenitiesTag(e.target);
   });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   // === Initialize Select2 ===
   $('#amenities').select2({
       placeholder: 'Select options',
       width: '100%',
       templateSelection: function(selectedItems) {
           if (!selectedItems || selectedItems.length === 0) return 'Select options';
           if (selectedItems.length === 1) return selectedItems[0].text;
           return selectedItems.length + ' selected';
       }
   });
   
   // === Function to update tag display dynamically ===
   function updateTags(selectId, tagsContainerId) {
       const selectedValues = $(selectId).val() || [];
       const tagsContainer = $(tagsContainerId);
       tagsContainer.empty(); // Clear existing tags
   
       selectedValues.forEach(value => {
           const tagHtml = `
         <div class="skill-tag" data-value="${value}">
             ${value}
             <button type="button" class="remove" data-value="${value}">×</button>
         </div>`;
           tagsContainer.append(tagHtml);
       });
   }
   
   // === Amenity Select handling ===
   $('#amenities').on('change', function() {
       updateTags('#amenities', '#amenities-tags');
   });
   
   // === Handle tag removal (for both) ===
   $(document).on('click', '.skill-tag .remove', function() {
       const valueToRemove = $(this).data('value');
       const parentContainer = $(this).closest('.skills-tags, .amenities-tags');
   
       if (parentContainer.attr('id') === 'skills-tags') {
           let selected = $('#riderSelect').val() || [];
           selected = selected.filter(v => v !== valueToRemove);
           $('#riderSelect').val(selected).trigger('change');
       } else if (parentContainer.attr('id') === 'amenities-tags') {
           let selected = $('#amenities').val() || [];
           selected = selected.filter(v => v !== valueToRemove);
           $('#amenities').val(selected).trigger('change');
       }
   });
   
   // === On page load: show preselected tags (after search) ===
   updateTags('#riderSelect', '#skills-tags');
   updateTags('#amenities', '#amenities-tags');
</script>
{{-- <script>
   const tagsContainer = document.querySelector(".shortcuts_tags_flex");
   const form = document.getElementById("mainForm");
   const notification = document.getElementById("tagNotification");
   
   // 🟢 Show notification
   function showNotification(message) {
     if (!notification) return;
     notification.textContent = message;
     notification.classList.add("active");
     setTimeout(() => notification.classList.remove("active"), 4000);
   }
   
   // 🟢 Create tag
   function createTag(label, value, key, showLabel = false) {
     if (!value || value.toString().trim() === "" || value === "-") return;
   
     // If tag already exists → update it
     if ([...tagsContainer.children].some(tag => tag.dataset.key === key)) {
       const existing = tagsContainer.querySelector(`[data-key='${key}']`);
       existing.querySelector("p").innerText = showLabel ? `${label}: ${value}` : value;
       showNotification(`Selection updated and moved to the top.`);
       return;
     }
   
     // Create new tag
     const tag = document.createElement("div");
     tag.classList.add("shortcuts_tags_item");
     tag.dataset.key = key;
     tag.innerHTML = `
       <p>${showLabel ? `<strong>${label}:</strong> ${value}` : value}</p>
       <a href="#!" class="remove-tag"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
     `;
     // Put new tags at the start (top)
     tagsContainer.insertBefore(tag, tagsContainer.firstChild);
     showNotification(`Selection has been added to the top.`);
   
     // Remove tag on click
     tag.querySelector(".remove-tag").addEventListener("click", () => {
       tag.remove();
       // If it's a fencing-type tag, uncheck the related checkbox
       if (key.startsWith("fencing_")) {
         const val = key.replace("fencing_", "");
         const cb = form.querySelector(`input[name="fencing[]"][value="${val}"]`);
         if (cb) cb.checked = false;
       }
       // If it's the main fencing tag, also hide options and uncheck fencing checkboxes
       if (key === "fencing") {
         const radios = form.querySelectorAll('input[name="fenced_grass"]');
         radios.forEach(r => r.checked = false);
         const fencingCheckboxes = form.querySelectorAll('input[name="fencing[]"]');
         fencingCheckboxes.forEach(cb => cb.checked = false);
         const fencingOptions = form.querySelector(".unit-label-one");
         if (fencingOptions) fencingOptions.style.display = "none";
       }
       showNotification(`Selection removed from the top.`);
     });
   }
   
   // 🟡 Helper: get range values
   function getRangeValue(inputs) {
     const min = inputs[0]?.value.trim() || "";
     const max = inputs[1]?.value.trim() || "";
     if (min && max) return `${min} - ${max}`;
     if (min) return `${min}+`;
     if (max) return `Up to ${max}`;
     return "";
   }
   
   // ------------- existing handlers (unchanged) -------------
   // 🟢 Handle Range Fields
   const rangeSections = [
     { selector: ".distance-controls .distance-input", label: "Distance Range", key: "distance" },
     { selector: ".price-inputs .range-input", label: "Price Range ($)", key: "price" },
     { selector: ".form-section:nth-of-type(4) .range-input", label: "Acreage", key: "acreage" },
     { selector: ".form-section:nth-of-type(5) .range-input", label: "Bedrooms", key: "bedrooms" },
     { selector: ".form-section:nth-of-type(6) .range-input", label: "Bathrooms", key: "bathrooms" },
     { selector: ".form-section:nth-of-type(8) .range-input", label: "# of Stalls", key: "stalls" },
   ];
   
   rangeSections.forEach(section => {
     const inputs = form.querySelectorAll(section.selector);
     inputs.forEach(input =>
       input.addEventListener("blur", () => {
         const val = getRangeValue(inputs);
         if (val) createTag(section.label, val, section.key, true);
       })
     );
   });
   
   // 🟢 Handle text input (like City, State, Zip)
   const locationInput = form.querySelector(".location-input input");
   if (locationInput) {
     locationInput.addEventListener("blur", () => {
       if (locationInput.value.trim()) createTag(locationInput.placeholder, locationInput.value, "location", false);
     });
   }
   
   // 🟢 Handle Amenities (multi-select)
   const amenitiesSelect = form.querySelector(".amenities_select");
   if (amenitiesSelect) {
     amenitiesSelect.addEventListener("change", () => {
       // support multi-select: add tags for selected options
       const selected = Array.from(amenitiesSelect.selectedOptions).map(o => o.value || o.text).filter(v => v && v !== "Select Amenities");
       selected.forEach(val => createTag(val, val, `amenity_${val}`, false));
       // reset visual selection (if you want)
       amenitiesSelect.selectedIndex = 0;
     });
   }
   
   // ------------- FENCING logic (fixed selectors) -------------
   const fencingRadios = form.querySelectorAll('input[name="fenced_grass"]');
   const fencingOptionsContainer = form.querySelector(".unit-label-one");
   const fencingCheckboxes = Array.from(form.querySelectorAll('input[name="fencing[]"]'));
   
   // Utility: show/hide fenced options and manage tags
   function handleFencingYes() {
     if (fencingOptionsContainer) fencingOptionsContainer.style.display = "block";
     createTag("Fencing", "Yes", "fencing", true);
   }
   
   function handleFencingNo() {
     if (fencingOptionsContainer) fencingOptionsContainer.style.display = "none";
     // remove main fencing tag
     const fencingTag = tagsContainer.querySelector(`[data-key='fencing']`);
     if (fencingTag) fencingTag.remove();
     // uncheck and remove all fencing-type tags
     fencingCheckboxes.forEach(cb => {
       if (cb.checked) cb.checked = false;
       const key = `fencing_${cb.value}`;
       const t = tagsContainer.querySelector(`[data-key='${key}']`);
       if (t) t.remove();
     });
   }
   
   fencingRadios.forEach(radio => {
     radio.addEventListener("change", () => {
       if (radio.value === "yes") {
         handleFencingYes();
       } else {
         handleFencingNo();
       }
     });
   });
   
   // handle individual fencing type checkboxes
   fencingCheckboxes.forEach(checkbox => {
     checkbox.addEventListener("change", () => {
       const labelText = checkbox.value; // uses value attribute (vinyl, wood, ...)
       const pretty = checkbox.closest("label")?.innerText.trim() || labelText;
       const key = `fencing_${labelText}`;
       if (checkbox.checked) {
         // ensure the main fencing tag exists (if user checked a type without clicking Yes)
         const main = tagsContainer.querySelector(`[data-key='fencing']`);
         if (!main) {
           // mark fencing as Yes visually (but do not toggle radio state)
           createTag("Fencing", "Yes", "fencing", true);
           if (fencingOptionsContainer) fencingOptionsContainer.style.display = "block";
         }
         createTag("Fencing Type", pretty, key, false);
       } else {
         const existing = tagsContainer.querySelector(`[data-key='${key}']`);
         if (existing) {
           existing.remove();
           showNotification(`Selection removed from the top.`);
         }
       }
     });
   });
   
   // ------------- Initialization on DOMContentLoaded -------------
   window.addEventListener("DOMContentLoaded", () => {
     // If server pre-checks fenced_grass=yes, show options and create tag
     const checkedFencingRadio = form.querySelector('input[name="fenced_grass"]:checked');
     if (checkedFencingRadio && checkedFencingRadio.value === "yes") {
       if (fencingOptionsContainer) fencingOptionsContainer.style.display = "block";
       createTag("Fencing", "Yes", "fencing", true);
     } else {
       if (fencingOptionsContainer) fencingOptionsContainer.style.display = "none";
     }
   
     // Pre-create fencing-type tags for any checkboxes already checked (from server)
     fencingCheckboxes.forEach(cb => {
       if (cb.checked) {
         const pretty = cb.closest("label")?.innerText.trim() || cb.value;
         createTag("Fencing Type", pretty, `fencing_${cb.value}`, false);
       }
     });
   
     // Also create tags for any other prefilled fields (ranges/text) if desired:
     // Distance
     const distInputs = form.querySelectorAll(".distance-controls .distance-input");
     if (distInputs.length >= 2) {
       const dv = getRangeValue(distInputs);
       if (dv) createTag("Distance Range", dv, "distance", true);
     }
     // Price
     const priceInputs = form.querySelectorAll(".price-inputs .range-input");
     if (priceInputs.length >= 2) {
       const pv = getRangeValue(priceInputs);
       if (pv) createTag("Price Range ($)", pv, "price", true);
     }
     // Acreage / Bedrooms / Bathrooms / Stalls - similar logic:
     const acreInputs = form.querySelectorAll(".form-section:nth-of-type(4) .range-input");
     if (acreInputs.length >= 2) { const av = getRangeValue(acreInputs); if (av) createTag("Acreage", av, "acreage", true); }
     const bedInputs = form.querySelectorAll(".form-section:nth-of-type(5) .range-input");
     if (bedInputs.length >= 2) { const bv = getRangeValue(bedInputs); if (bv) createTag("Bedrooms", bv, "bedrooms", true); }
     const bathInputs = form.querySelectorAll(".form-section:nth-of-type(6) .range-input");
     if (bathInputs.length >= 2) { const bav = getRangeValue(bathInputs); if (bav) createTag("Bathrooms", bav, "bathrooms", true); }
     const stallInputs = form.querySelectorAll(".form-section:nth-of-type(8) .range-input");
     if (stallInputs.length >= 2) { const sv = getRangeValue(stallInputs); if (sv) createTag("# of Stalls", sv, "stalls", true); }
   
     // Location prefill
     if (locationInput && locationInput.value && locationInput.value.trim()) {
       createTag(locationInput.placeholder, locationInput.value, "location", false);
     }
   
     // Amenities preselected (multiple)
     if (amenitiesSelect) {
       const selected = Array.from(amenitiesSelect.selectedOptions).map(o => o.value || o.text).filter(v => v && v !== "Select Amenities");
       selected.forEach(val => createTag(val, val, `amenity_${val}`, false));
       // optional: reset visual selection
       amenitiesSelect.selectedIndex = 0;
     }
   });
</script> --}}
<script>
   const tagsContainer = document.querySelector(".shortcuts_tags_flex");
   const form = document.getElementById("mainForm");
   const notification = document.getElementById("tagNotification");
   
   function showNotification(message) {
       if (!notification) return;
       notification.textContent = message;
       notification.classList.add("active");
       setTimeout(() => notification.classList.remove("active"), 4000);
   }
   
   function createTag(label, value, key, showLabel = false) {
       if (!value || value.toString().trim() === "" || value === "-") return;
   
       if ([...tagsContainer.children].some(tag => tag.dataset.key === key)) return;
   
       const tag = document.createElement("div");
       tag.classList.add("shortcuts_tags_item");
       tag.dataset.key = key;
       tag.innerHTML = `
   <p>${showLabel ? `<strong>${label}:</strong> ${value}` : value}</p>
   <a href="#!" class="remove-tag"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
   `;
       tagsContainer.insertBefore(tag, tagsContainer.firstChild);
       showNotification(`Added: ${showLabel ? `${label}: ${value}` : value}`);
   
       tag.querySelector(".remove-tag").addEventListener("click", () => {
           tag.remove();
   
           // Clear form fields (best effort)
           if (key === "location") {
               const inp = form?.querySelector('input[name="location"]');
               if (inp) inp.value = "";
           } else if (key === "distance") {
               form?.querySelectorAll('input[name="distance_min"], input[name="distance_max"]').forEach(i => i.value = "");
           } else if (key === "price") {
               form?.querySelectorAll('input[name="price_min"], input[name="price_max"]').forEach(i => i.value = "");
           } else if (key === "acreage") {
               form?.querySelectorAll('input[name="acre_min"], input[name="acre_max"]').forEach(i => i.value = "");
           } else if (key === "bedrooms") {
               form?.querySelectorAll('input[name="bedrooms_min"], input[name="bedrooms_max"]').forEach(i => i.value = "");
           } else if (key === "bathrooms") {
               form?.querySelectorAll('input[name="bathrooms_min"], input[name="bathrooms_max"]').forEach(i => i.value = "");
           } else if (key === "stalls") {
               form?.querySelectorAll('input[name="stall_min"], input[name="stall_max"]').forEach(i => i.value = "");
           } else if (key === "fencing") {
               form?.querySelectorAll('input[name="fenced_grass"]').forEach(r => r.checked = false);
               form?.querySelectorAll('input[name="fencing[]"]').forEach(c => c.checked = false);
               const cont = form?.querySelector(".unit-label-one");
               if (cont) cont.style.display = "none";
           } else if (key.startsWith("fencing_")) {
               const val = key.replace("fencing_", "");
               const cb = form?.querySelector(`input[name="fencing[]"][value="${val}"]`);
               if (cb) cb.checked = false;
           } else if (["heated_barn", "has_indoor_ring", "has_outdoor_ring"].includes(key)) {
               form?.querySelectorAll(`input[name="${key}"]`).forEach(r => r.checked = false);
           }
           // Note: Amenities reset not handled here (optional)
   
           showNotification(`${label} removed`);
       });
   }
   
   // 🟢 Get query params from URL (works with ?price_min=100000 etc.)
   function getQueryParam(name, isMulti = false) {
       const urlParams = new URLSearchParams(window.location.search);
       if (isMulti) {
           return urlParams.getAll(name); // returns array
       }
       return urlParams.get(name) || null;
   }
   
   // 🟢 Format range
   function formatRange(min, max) {
       if (min && max) return `${min} - ${max}`;
       if (min) return `${min}+`;
       if (max) return `Up to ${max}`;
       return "";
   }
   
   // 🟢 Restore ALL tags from URL on page load
   function restoreTagsFromURL() {
       // Location
       const location = getQueryParam('location');
       if (location) createTag("Location", location, "location", true);
   
       // Ranges
       const ranges = [{
               min: 'distance_min',
               max: 'distance_max',
               label: 'Distance Range',
               key: 'distance'
           },
           {
               min: 'price_min',
               max: 'price_max',
               label: 'Price Range ($)',
               key: 'price'
           },
           {
               min: 'acre_min',
               max: 'acre_max',
               label: 'Acreage',
               key: 'acreage'
           },
           {
               min: 'bedrooms_min',
               max: 'bedrooms_max',
               label: 'Bedrooms',
               key: 'bedrooms'
           },
           {
               min: 'bathrooms_min',
               max: 'bathrooms_max',
               label: 'Bathrooms',
               key: 'bathrooms'
           },
           {
               min: 'stall_min',
               max: 'stall_max',
               label: '# of Stalls',
               key: 'stalls'
           },
       ];
   
       ranges.forEach(({
           min,
           max,
           label,
           key
       }) => {
           const minVal = getQueryParam(min);
           const maxVal = getQueryParam(max);
           const val = formatRange(minVal, maxVal);
           if (val) createTag(label, val, key, true);
       });
   
       // Radio fields
       const radioFields = [{
               name: 'heated_barn',
               label: 'Has Barns'
           },
           {
               name: 'has_indoor_ring',
               label: 'Has Indoor Ring'
           },
           {
               name: 'has_outdoor_ring',
               label: 'Has Outdoor Ring'
           },
           {
               name: 'fenced_grass',
               label: 'Fencing'
           }
       ];
   
       radioFields.forEach(({
           name,
           label
       }) => {
           const val = getQueryParam(name);
           if (val) {
               createTag(label, val === 'yes' ? 'Yes' : 'No', name, true);
               // Show fencing options if needed
               if (name === 'fenced_grass' && val === 'yes') {
                   const cont = form?.querySelector(".unit-label-one");
                   if (cont) cont.style.display = "block";
               }
           }
       });
   
       // Fencing checkboxes
       const fencingVals = getQueryParam('fencing', true); // array
       fencingVals.forEach(val => {
           // Try to get label from checkbox text
           const cb = form?.querySelector(`input[name="fencing[]"][value="${val}"]`);
           const label = cb?.closest('label')?.innerText?.trim() || val;
           createTag("Fencing Type", label, `fencing_${val}`, false);
       });
   
       // Amenities
       const amenityVals = getQueryParam('amenitie', true); // array
       amenityVals.forEach(val => {
           createTag(val, val, `amenity_${val}`, false);
       });
   }
   
   // 🟢 Live handlers (for new selections)
   
   // Location
   const locInput = form?.querySelector('input[name="location"]');
   locInput?.addEventListener("blur", () => {
       if (locInput.value.trim()) createTag("Location", locInput.value, "location", true);
   });
   
   // Ranges
   const rangeConfigs = [{
           selector: 'input[name="distance_min"], input[name="distance_max"]',
           key: 'distance'
       },
       {
           selector: 'input[name="price_min"], input[name="price_max"]',
           key: 'price'
       },
       {
           selector: 'input[name="acre_min"], input[name="acre_max"]',
           key: 'acreage'
       },
       {
           selector: 'input[name="bedrooms_min"], input[name="bedrooms_max"]',
           key: 'bedrooms'
       },
       {
           selector: 'input[name="bathrooms_min"], input[name="bathrooms_max"]',
           key: 'bathrooms'
       },
       {
           selector: 'input[name="stall_min"], input[name="stall_max"]',
           key: 'stalls'
       },
   ];
   
   rangeConfigs.forEach(({
       selector,
       key
   }) => {
       const inputs = form?.querySelectorAll(selector) || [];
       inputs.forEach(input => {
           input.addEventListener("blur", () => {
               const minInput = form.querySelector(`input[name="${key}_min"]`);
               const maxInput = form.querySelector(`input[name="${key}_max"]`);
               const val = formatRange(minInput?.value, maxInput?.value);
               if (val) createTag(
                   key === 'distance' ? 'Distance Range' :
                   key === 'price' ? 'Price Range ($)' :
                   key === 'acreage' ? 'Acreage' :
                   key === 'bedrooms' ? 'Bedrooms' :
                   key === 'bathrooms' ? 'Bathrooms' : '# of Stalls',
                   val, key, true
               );
           });
       });
   });
   
   // Radio buttons
   const radioNames = ['heated_barn', 'has_indoor_ring', 'has_outdoor_ring', 'fenced_grass'];
   radioNames.forEach(name => {
       form?.querySelectorAll(`input[name="${name}"]`).forEach(radio => {
           radio.addEventListener("change", () => {
               if (radio.checked) {
                   const label = name === 'heated_barn' ? 'Has Barns' :
                       name === 'has_indoor_ring' ? 'Has Indoor Ring' :
                       name === 'has_outdoor_ring' ? 'Has Outdoor Ring' : 'Fencing';
                   createTag(label, radio.value === 'yes' ? 'Yes' : 'No', name, true);
                   if (name === 'fenced_grass' && radio.value === 'yes') {
                       const cont = form.querySelector(".unit-label-one");
                       if (cont) cont.style.display = "block";
                   } else if (name === 'fenced_grass' && radio.value === 'no') {
                       const cont = form.querySelector(".unit-label-one");
                       if (cont) cont.style.display = "none";
                   }
               }
           });
       });
   });
   
   // Fencing checkboxes
   const fencingCheckboxes = form?.querySelectorAll('input[name="fencing[]"]') || [];
   fencingCheckboxes.forEach(cb => {
       cb.addEventListener("change", () => {
           const label = cb.closest('label')?.innerText?.trim() || cb.value;
           const key = `fencing_${cb.value}`;
           if (cb.checked) {
               // Ensure main fencing tag exists
               if (!tagsContainer.querySelector('[data-key="fencing"]')) {
                   createTag("Fencing", "Yes", "fencing", true);
                   const cont = form.querySelector(".unit-label-one");
                   if (cont) cont.style.display = "block";
               }
               createTag("Fencing Type", label, key, false);
           } else {
               const tag = tagsContainer.querySelector(`[data-key="${key}"]`);
               if (tag) tag.remove();
               showNotification("Fencing type removed");
           }
       });
   });
   
   // Amenities
   const amenitiesSelect = form?.querySelector('select[name="amenitie[]"]');
   amenitiesSelect?.addEventListener("change", () => {
       const selected = Array.from(amenitiesSelect.selectedOptions)
           .map(opt => opt.textContent.trim())
           .filter(text => text && text !== "Select Amenities");
       selected.forEach(text => {
           createTag(text, text, `amenity_${text}`, false);
       });
   });
   
   // 🟢 Initialize on load
   document.addEventListener("DOMContentLoaded", restoreTagsFromURL);
</script>

<script>
    function sortState(value) {
        const url = new URL(window.location.href); // current page URL
        if (value) {
            url.searchParams.set('sort', value); // update ya add sort param
        } else {
            url.searchParams.delete('sort'); // agar default selected hai to remove
        }
        window.location.href = url.toString(); // reload with updated params
    }
</script>

<script>
        document.querySelectorAll('.thousand-separator').forEach(input => {
            input.addEventListener('input', function(e) {
                // cursor position store karna zaroori hai
                const cursorPosition = e.target.selectionStart;
                const rawValue = e.target.value.replace(/,/g, '').replace(/[^\d]/g, '');

                // agar empty hai to kuch na dikhaye
                if (!rawValue) {
                    e.target.value = '';
                    return;
                }

                // regex se thousand separator lagana
                const formattedValue = rawValue.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                e.target.value = formattedValue;

                // cursor ko end par le jao (simple fix)
                e.target.setSelectionRange(formattedValue.length, formattedValue.length);
            });
        });
    </script>
@endsection