@extends('layouts.user_app')
@section('content')
<style>
.dashboard_container_wrapper {
    padding-top: 100px;
}
   .buy-wrapper {
   position: relative;
   width: 100%;
   margin-top: 15px;
   }
   .buy-main-btn {
   width: 100%;
   padding: 14px 18px;
   font-size: 16px;
   font-weight: 600;
   background: linear-gradient(135deg, #0d6efd, #0b5ed7);
   color: #fff;
   border: none;
   border-radius: 10px;
   cursor: pointer;
   display: flex;
   justify-content: space-between;
   align-items: center;
   }
   .buy-main-btn .arrow {
   font-size: 12px;
   }
   .buy-options {
   position: absolute;
   top: 110%;
   left: 0;
   width: 100%;
   background: #fff;
   border-radius: 12px;
   box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
   overflow: hidden;
   opacity: 0;
   transform: translateY(-15px);
   visibility: hidden;
   transition: all 0.3s ease;
   z-index: 10;
   }
   .buy-options a {
   display: block;
   padding: 14px 16px;
   font-size: 15px;
   color: #333;
   text-decoration: none;
   border-bottom: 1px solid #f1f1f1;
   }
   .buy-options a:last-child {
   border-bottom: none;
   }
   .buy-options a:hover {
   background: #f8f9fa;
   }
   /* Active state */
   .buy-wrapper.active .buy-options {
   opacity: 1;
   transform: translateY(0);
   visibility: visible;
   }
</style>
<style>
   .membershipBanner {
   padding: 0px 20px;
   }
   .membershipBanner .heading_main {
   font-size: 80px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   }
   .membership_new_sec {
   padding: 100px 0px;
   }
   .colored_text_box {
   padding: 20px 40px;
   background: #1D2139;
   border: 3px solid #B09240;
   text-align: center;
   max-width: 620px;
   margin: 0 auto;
   margin-bottom: 35px;
   border-radius: 60px;
   position: relative;
   }
   .colored_text_box::before {
   content: '';
   position: absolute;
   top: 50%;
   left: -310px;
   width: 300px;
   height: 2px;
   background: #1d2139;
   }
   .colored_text_box::after {
   content: '';
   position: absolute;
   top: 50%;
   right: -310px;
   width: 300px;
   height: 2px;
   background: #1d2139;
   }
   .colored_text_box h2 {
   font-size: 30px;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   margin-bottom: 10px;
   text-transform: uppercase;
   line-height: 1;
   margin: 0;
   }
   .colored_text_box p {
   font-size: 18px;
   font-weight: bold;
   color: #fff;
   text-transform: uppercase;
   margin: 0 auto;
   }
   .mem_card_new {
   width: 100%;
   text-align: center;
   border: 1px solid #1b1f35;
   padding: 20px;
   border-radius: 10px;
   position: relative;
   overflow: hidden;
   padding-top: 50px;
   }
   .mem_card_top {
   padding: 10px 10px;
   text-align: center;
   }
   .mem_card_new h2 {
   font-size: 24px;
   font-weight: 700;
   color: #1D2139;
   margin: 0;
   }
   .mem_card_main {
   padding: 0px;
   }
   .mem_card_main p {
   font-size: 16px;
   color: #1C2039;
   font-weight: 500;
   margin-bottom: 20px;
   }
   .mem_card_main h3 {
   font-size: 35px;
   color: #1C2039;
   font-weight: 800;
   color: #1C2039;
   margin-bottom: 20px;
   }
   .mem_card_main h3 span {
   font-size: 22px;
   font-weight: 400;
   text-transform: lowercase;
   }
   .choose-btn, .choose-btn:hover {
   font-size: 18px;
   padding: 10px 55px;
   font-weight: 700;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   width: fit-content;
   text-transform: uppercase;
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   border-radius: 0;
   z-index: 999;
   border: none;
   color: #1d2139;
   letter-spacing: 0.5px;
   cursor: pointer;
   border: 1px solid #1D2139;
   text-transform: capitalize;
   transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease, color 0.3s ease;
   display: block;
   margin: 34px auto 0 auto;
   }
   
   .inner-container-one {
   max-width: 1240px;
   margin: 0 auto;
   }
   .mem_blue_stripe {
   background: #1d2139;
   padding: 40px 24px;
   text-align: center;
   border-bottom: 5px solid #b09240;
   border-top: 5px solid #b09240;
   margin-top: 40px;
   }
   .mem_blue_stripe h2 {
   font-size: 40px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   margin-bottom: 0px;
   text-transform: uppercase;
   }
   .point_card {
   padding: 45px 20px;
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   text-align: center;
   gap: 20px;
   border: 2px solid #1C2039;
   height: 255px;
   }
   .point_card p {
   font-size: 18px;
   color: #1C2039;
   font-weight: 500;
   margin: 0;
   }
   .top_text_box {
   max-width: 800px;
   margin: 0 auto;
   margin-bottom: 30px;
   }
   .top_text_box h2 {
   font-size: 40px;
   color: #1D2139; 
   text-transform: uppercase; 
   }
   .top_text_box h3 {
   font-size: 25px;
   font-weight: 600;
   margin-bottom: 10px;
   text-transform: uppercase;
   color: #b09240;
   }
   .show_point_icon_box {
   width: 100%;
   display: flex;
   justify-content: center;
   align-items: center;
   background: #ffffff;
   height: 250px;
   /* border: 1px solid red; */
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   border-radius: 10px;
   }
   .show_point_card {
   text-align: center;
   position: relative;
   }
   .show_point_card h2 {
   font-size: 24px;
   color: #1D2139;
   text-transform: capitalize;
   margin-bottom: 5px;
   }
   .step_inner_box {
   text-align: center;
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: flex-end;
   }
   .step_inner_box img {
   max-width: 60px;
   }
   .step_inner_box h6 {
   font-size: 13px;
   font-weight: 600;
   color: #1D2139;
   margin-bottom: 6px;
   white-space: nowrap;
   margin-top: 8px;
   }
   .border_box_one {
   border: 2px solid #1d2139;
   padding: 20px;
   border-radius: 20px;
   }
   .blu {
   background: #1d2139;
   padding: 5px 10px;
   color: #fff!important;
   white-space: normal;
   font-size: 18px!important;
   border-radius: 8px;
   margin-bottom: 5px
   }
   .step_inner_box .hrse_img {
   max-width: 80px;
   }
   .step_inner_box p {
   font-size: 14px;
   }
   p {
   margin-bottom: 0px
   }
   .border_box_one.type_1 {
   }
   .bx_heading {
   background: #1d2139;
   margin: 0;
   padding: 10px;
   margin-bottom: 30px;
   text-align: center;
   border: 2px solid #B09240;
   color: #fff;
   }
   h4.bx_heading.type_1 {
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   border-color: #1d2139;
   color: #1d2139;
   }
   .border_box_one.v-1 {
   min-height: 350px;
   }
   .flexable_heading {
   font-size: 30px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #B09240 41.48%, #FAF8F4 183.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   margin-bottom: 10px;
   text-transform: uppercase;
   }
   .flexable_txt_box {
   padding: 15px;
   }
   .flexable_txt_box.v-1 {
   border-left: 2px solid #b49749;
   height: 150px;
   display: flex;
   }
   .accordion-body {
        color: #000;
        font-size: 14px;
    }
    .accordion-body li {
        list-style: disc;
    }
       .nav-tabs .nav-link {
   padding: 10px 20px;
   font-size: 18px;
   font-weight: 700;
   color: #1d2139;
   border-radius: 60px;
   border: 1px solid #1d2139;
   margin: 0px 10px;
   }
   .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
   color: #fff;
   background-color: #1d2139;
   border-color: #dee2e6 #dee2e6 #fff;
   }
   .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
   border-color: #1d2139;
   /* isolation: isolate; */
   }
   ul#listingTabs {
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   padding: 9px 0;
   width: fit-content;
   margin: 0 auto;
   border-radius: 60px;
   }
   span.number_badge {
   width: 40px;
   height: 40px;
   display: flex;
   align-items: center;
   justify-content: center;
   background: #b09240;
   border-radius: 60px;
   font-size: 20px;
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px inset;
   position: absolute;
   top: -20px;
   left: 50%;
   color:#fff;
   transform: translateX(-50%);
   }
   .popular_tag {
   padding: 10px 20px;
   background: #1d2139;
   width: fit-content;
   position: absolute;
   top: 0;
   right: 0;
   border-radius: 0 0 0 10px;
   color: #fff;
   }
   @media only screen and (max-width: 1799px) {
        .choose-btn, .choose-btn:hover {
            font-size: 14px;
            padding: 10px 49px;
          }
          .mem_card_new h2 {
            font-size: 20px;
        }
        .mem_card_main p {
            font-size: 14px;
        }
        .mem_icon_box {
            max-width: 100px;
            margin: 0 auto;
        }
        .inner-container-one {
            max-width: 980px;
        }
        .show_point_icon_box img {
            max-width: 120px;
        }
        .step_inner_box h6 {
            font-size: 11px;
        }
        img.img-fluids.sm_img {
            max-width: 41px;
        }
        .show_point_card h2 {
            font-size: 18px;
        }
        .show_point_icon_box {
            height: 210px;
        }
        .step_inner_box p {
            font-size: 12px;
        }
        .flexable_txt_box.v-1 p {
            font-size: 14px;
        }
        .flexable_heading {
            font-size: 24px;
        }
        .top_text_box h2 {
            font-size: 30px;
        }
        .nav-tabs .nav-link {
            font-size: 14px;
        }
   }
</style>
<section class="user_dashboard">
   <div class="user_main_content">
      <div class="inner_content_wrapper">
         <div class="dashboard_container_wrapper">
            <div class="horse_list_info_box mb-4">
               <h2 class="text-center mb-2">YOU DON’T HAVE ANY {{ Str::upper(Request::get('label')) }} LISTINGS YET.</h2>
               <h4 class="text-center mb-2">Start creating your ad today!</h4>
               <h2 class="text-center fst-italic mb-5">Once you add a listing, it will appear in this section.</h2>
               <h2 class="mb-2">YOU DON’T HAVE ANY {{ Str::upper(Request::get('label')) }} LISTINGS YET.</h2>
               <p>Show Points are your all-access pass to listing on Horse Action Network. Each Show Point gives you one active ad for 30 days—whether it's a horse, service, or property. Buy a
                  monthly package, and your Show Points are added to your wallet automatically. Use them as you need, and any unused points roll over for up to 6 months. When your package renews
                  each month, you get fresh Show Points to keep your ads running. It's simple, ßexible, and built to grow with you.
               </p>
            </div>
            <div class="ads_img pb-4">
               <img src="assets/images/ads-1.png" class="img-fluid"/>
            </div>
            
            <div class="row">
               @foreach ($plans as $item)
               <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                  <div class="mem_card_new active">
                     @if ($loop->iteration == 2)
                     <div class="popular_tag"><i class="fa fa-star-o me-2" aria-hidden="true"></i>Most Popular</div>
                     @endif
                     <div class="mem_icon_box">
                        <img src="{{asset('assets/images/mem_img_' . $loop->iteration . '.png')}}" class="img-fluid"/>
                     </div>
                     <div class="mem_card_top">
                        <h2>{{ $item->name }}</h2>
                     </div>
                     <div class="mem_card_main">
                        <p>{{ $item->quantity }} Show Point{{ $item->quantity > 1 ? 's' : '' }}</p>
                        <h3>${{ $item->price }} <span>/month</span></h3>
                        <p>{{ $item->description }}</p>
                        @guest
                        <a href="{{ route('login', ['from' => 'payment']) }}" class="choose-btn">
                        Get Started
                        </a>
                        @endguest
                        @auth
                        <a href="{{ route('payment.link', Crypt::encrypt($item->id)) }}" class="choose-btn">
                        Get Started
                        </a>
                        @endauth
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <div class="mem_blue_stripe mb-5">
         <h2>How Show Points Work</h2>
      </div>
      <div class="inner-container-one">
         <div class="border_box_one mb-4 pt-5">
            <div class="row">
               <div class="col-lg-3">
                  <div class="show_point_card">
                     <div class="show_point_icon_box mb-3">
                        <img src="assets/images/show_point_img_1.png" class="img-fluid"/>
                     </div>
                     <h2>Buy a plan</h2>
                     <p>Purchase a monthly show point package.</p>
                     <span class="number_badge">1</span>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="show_point_card">
                     <div class="show_point_icon_box mb-3">
                        <img src="assets/images/show_point_img_2.png" class="img-fluid"/>
                     </div>
                     <h2>GET POINTS</h2>
                     <p>Points are added to your wallet automatically.</p>
                     <span class="number_badge">2</span>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="show_point_card">
                     <div class="show_point_icon_box mb-3">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="step_inner_box">
                                 <img src="assets/images/step_inner_img_1.png" class="img-fluids sm_img"/>
                                 <h6>Horses</h6>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="step_inner_box">
                                 <img src="assets/images/step_inner_img_2.png" class="img-fluids sm_img"/>
                                 <h6>Services</h6>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="step_inner_box">
                                 <img src="assets/images/step_inner_img_3.png" class="img-fluids sm_img"/>
                                 <h6>Real Estate</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                     <h2>1 SHOW POINT = 1 AD</h2>
                     <p>Create either a Horse, Service, Real Estate Listing or mix and match listing types.</p>
                     <span class="number_badge">3</span>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="show_point_card">
                     <div class="show_point_icon_box mb-3">
                        <img src="assets/images/show_point_img_4.png" class="img-fluid"/>
                     </div>
                     <h2>AUTO - RENEWS </h2>
                     <p>Ads stay active for 30 days and auto-renew until marked Sold, Withdrawn or Deleted. Depending on the Ad type.</p>
                     <span class="number_badge">4</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
               <div class="border_box_one v-1">
                  <h4 class="bx_heading">HORSE & REAL ESTATE LISTINGS</h4>
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="step_inner_box">
                           <img src="assets/images/step_inner_img_1.png" class="img-fluid hrse_img"/>
                           <h6 class="blu">Active</h6>
                           <p>Your ad is now live!</p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="step_inner_box">
                           <img src="assets/images/step_inner_img_2.png" class="img-fluid hrse_img"/>
                           <h6 class="blu">Pending</h6>
                           <p>Signals a transaction in progress. Your ad stays live and auto-renews every 30 days.</p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="step_inner_box">
                           <img src="assets/images/step_inner_img_3.png" class="img-fluid hrse_img"/>
                           <h6 class="blu">Sold</h6>
                           <p>Once marked as sold or withdrawn, your listing will no longer renew.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
               <div class="border_box_one v-1">
                  <h4 class="bx_heading type_1">SERVICE LISTINGS</h4>
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="step_inner_box">
                           <img src="assets/images/service_list_img_1.png" class="img-fluid hrse_img"/>
                           <h6 class="blu">Active</h6>
                           <p>Your ad is now live!</p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="step_inner_box">
                           <img src="assets/images/service_list_img_2.png" class="img-fluid hrse_img"/>
                           <h6 class="blu">Renews</h6>
                           <p>Ad auto-renews every 30 days to keep you in front of potential customers.</p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="step_inner_box">
                           <img src="assets/images/service_list_img_3.png" class="img-fluid hrse_img"/>
                           <h6 class="blu">Deleted</h6>
                           <p>To stop auto-renewals, simply delete your listing.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="border_box_one mt-4">
            <div class="row">
               <div class="col-lg-3">
                  <div class="flexable_txt_box">
                     <h4 class="flexable_heading">FLEXABLE & BUILT TO GROW WITH YOU.</h4>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="flexable_txt_box v-1">
                     <p class=""><strong>New Show Points</strong> for your current package are added to your wallet <strong>every 30 days—</strong> so your ads keep running without interruption.</p>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="flexable_txt_box v-1">
                     <p class=""><strong>Didn’t use all your Show Points?</strong> No Problem. Show Points roll over and stay in your wallet for <strong>up to 6 months,</strong> ready whenever you need them.</p>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="flexable_txt_box v-1">
                     <p class=""><strong>Upgrade or downgrade</strong> your package anytime! Enjoy the flexibility to <strong>change</strong> your package to match your current needs.</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="point_card">
                    <img src="assets/images/show_points_icon_1.png" alt="img" class="img-fluid" />
                    <p>1 show Point = 1 Ad <br> for 30 Days</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="point_card">
                    <img src="assets/images/show_points_icon_2.png" alt="img" class="img-fluid" />
                    <p>Use for Horses, <br> Services, or Propoerties</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="point_card">
                    <img src="assets/images/show_points_icon_3.png" alt="img" class="img-fluid" />
                    <p>Points Roll Over for <br> 6 Months</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="point_card">
                    <img src="assets/images/show_points_icon_4.png" alt="img" class="img-fluid" />
                    <p>Auto-Renew Monthly</p>
                </div>
            </div>
            
            </div> -->
      </div>
      <div class="mem_blue_stripe mb-5 mt-5">
         <h2>ALL-INCLUSIVE. HASSLE-FREE. LISTINGS MADE SIMPLE.</h2>
      </div>
      <div class="inner-container-one pb-5">
         <div class="top_text_box text-center">
            <h2>EVERYTHING YOU NEED TO CREATE A PROFESSIONAL LISTING</h2>
            <p>Built for horse people. Designed to help you showcase your horses, services, and properties clearly, attract serious buyers and clients, and move forward with confidence.
            </p>
         </div>
         <div class="colored_text_box">
            <h2>CREATE A LISTING TODAY!</h2>
         </div>
         <ul class="nav nav-tabs mb-4 justify-content-center" id="listingTabs" role="tablist">
            <li class="nav-item" role="presentation">
               <button class="nav-link active" id="horse-tab" data-bs-toggle="tab" data-bs-target="#horse-content" type="button" role="tab">Horse Listings</button>
            </li>
            <li class="nav-item" role="presentation">
               <button class="nav-link" id="service-tab" data-bs-toggle="tab" data-bs-target="#service-content" type="button" role="tab">Service Listings</button>
            </li>
            <li class="nav-item" role="presentation">
               <button class="nav-link" id="estate-tab" data-bs-toggle="tab" data-bs-target="#estate-content" type="button" role="tab">Real Estate Listings</button>
            </li>
         </ul>
         <div class="tab-content" id="listingTabsContent">
            <div class="tab-pane fade show active" id="horse-content" role="tabpanel">
               <div class="row">
                  <div class="col-md-6">
                     <div class="accordion" id="accordionLeft">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    📸 Photos: Upload up to 21 photos!
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionLeft">
                                <div class="accordion-body">
                                    Your photos are your first impression—and your best chance to stop the scroll. <br>
                                    Use them to tell the full story of your horse. <br>
                                    Show your horse as it really is—buyers trust listings that feel complete and honest. <br><br>
                        
                                    <strong>Examples:</strong>
                                    <ul class="ps-4 mb-4">
                                        <li>Conformation shots (both sides, front, rear).</li>
                                        <li>Walk, trot, canter (both directions, under saddle if applicable).</li>
                                        <li>Real-life settings (trail riding, arena work, daily handling).</li>
                                        <li>Groundwork and handling.</li>
                                        <li>Close-ups (face, markings, legs).</li>
                                        <li>Personality moments.</li>
                                    </ul>
                        
                                    <div class="alert alert-light border-0 ps-0 pb-0">
                                        <strong>🚫 Avoid:</strong>
                                        <ul class="ps-4 mt-2">
                                            <li>Cropped, far-away, or blurry photos where the horse is hard to see.</li>
                                            <li>Only headshots (no full body).</li>
                                            <li>Filters or heavy editing.</li>
                                            <li>Old or outdated photos.</li>
                                            <li>Only one photo—you have the space, use it.</li>
                                        </ul>
                                    </div>
                        
                                    <p>
                                        A strong listing usually includes at least 8–12 quality photos covering movement, handling, and conformation. <br><br>
                                        Buyers aren’t just looking—they’re deciding. The more complete your photos, the more confident they’ll feel reaching out. <br><br>
                                        <i>✨ This is your horse’s chance to stand out—make it count. Get creative.</i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingDescription">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescription">
                                    📝 Detailed Description (No Text Limit)
                                </button>
                            </h2>
                            <div id="collapseDescription" class="accordion-collapse collapse" data-bs-parent="#accordionLeft">
                                <div class="accordion-body">
                                    <p>Your description is where buyers decide if they should reach out. Be clear, honest, and thorough—this is your chance to set the right expectations from the start.</p>
                        
                                    <strong>Include:</strong>
                                    <ul class="ps-4 mb-3">
                                        <li>Training level and experience.</li>
                                        <li>Temperament and personality.</li>
                                        <li>Ideal rider type.</li>
                                        <li>Strengths and limitations.</li>
                                    </ul>
                        
                                    <strong>Daily life:</strong>
                                    <ul class="ps-4 mb-3">
                                        <li>Routine, turnout, and work schedule.</li>
                                        <li>Maintenance or special care.</li>
                                    </ul>
                        
                                    <strong>Go deeper:</strong>
                                    <ul class="ps-4 mb-3">
                                        <li>How the horse behaves in new environments.</li>
                                        <li>Ground manners (tacking, mounting, farrier, vet).</li>
                                        <li>Any quirks or things that require maintenance.</li>
                                        <li>What the horse enjoys and excels at.</li>
                                    </ul>
                        
                                    <div class="alert alert-light border-0 ps-0 pb-0">
                                        <strong>🚫 Avoid:</strong>
                                        <ul class="ps-4 mt-2">
                                            <li>Vague descriptions (“great horse,” “sweet,” “no vices”) without explanation.</li>
                                            <li>Catch-all phrases (e.g., “bombproof,” “husband horse”)—back them up with real examples.</li>
                                            <li>Leaving out details buyers will discover later.</li>
                                            <li>Overselling or only highlighting the best moments.</li>
                                            <li>One-line descriptions—you have the space, use it.</li>
                                        </ul>
                                    </div>
                        
                                    <p class="mb-1"><i>✨ Honest, detailed descriptions lead to better inquiries—and better matches.</i></p>
                                    <p class="small text-muted">The more upfront you are, the smoother the process will be.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingDesc">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDesc">
                              👤 Seller Profile Included 
                              </button>
                           </h2>
                           <div id="collapseDesc" class="accordion-collapse collapse" data-bs-parent="#accordionLeft">
                              <div class="accordion-body">
                                 Buyers want to know who they’re working with—not just what you’re selling. <br>
                                 A complete profile builds trust and helps you stand out from the start. <br><br>
                                 <strong>We showcase who you are—professionally and clearly.</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Active listings on Horse Action Network.</li>
                                    <li>Past sales on Horse Action Network.</li>
                                    <li>Social media & website.</li>
                                    <li>Contact information.</li>
                                    <li>About you.</li>
                                 </ul>
                                 <p>
                                    A strong profile gives buyers confidence before they even reach out—and often leads to more serious inquiries. <br><br>
                                    <i>✨ People don’t just buy horses—they buy from people they trust.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                              📣 Social Media Advertising Included 
                              </button>
                           </h2>
                           <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionLeft">
                              <div class="accordion-body">
                                 Your listing doesn’t just sit—it gets seen. <br>
                                 We actively promote it to the equestrian community to help you reach more people, faster. <br><br>
                                 <strong>Your listing gets:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Social media promotion across Horse Action Network channels.</li>
                                    <li>Expanded reach beyond your own network.</li>
                                    <li>Exposure to an active, horse-focused audience.</li>
                                 </ul>
                                 <p>
                                    More visibility means more eyes on your listing—and more opportunities to connect. <br><br>
                                    <i>✨ More visibility. More conversations. More results.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingTwo_1">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo_1">
                              💬 In-Platform Messaging Included 
                              </button>
                           </h2>
                           <div id="collapseTwo_1" class="accordion-collapse collapse" data-bs-parent="#accordionLeft">
                              <div class="accordion-body">
                                 Keep every conversation in one place—no scattered texts, lost emails, or missed opportunities. <br><br>
                                 <strong>Stay organized with:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Secure in-platform messaging.</li>
                                    <li>Organized conversations with interested buyers.</li>
                                    <li>Real-time dashboard notifications.</li>
                                 </ul>
                                 <p>
                                    Everything stays connected to your listing, so you always know who you’re talking to and what they’re asking about. <br><br>
                                    <i>✨ No chasing messages. No crossed wires.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="accordion" id="accordionRight">
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                             🎥 Videos: Upload up to 5 YouTube links!
                             </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionRight">
                             <div class="accordion-body">
                                <p>Show your horse in motion—video builds confidence and answers questions before they’re even asked.</p>
                                <strong>Riding:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Walk, trot, canter (both directions).</li>
                                   <li>Transitions.</li>
                                   <li>Under saddle work.</li>
                                </ul>
                                <strong>Skills & Experience:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Lead changes, lateral work, jumping (if applicable).</li>
                                   <li>Trail riding.</li>
                                   <li>Alone and in groups.</li>
                                   <li>Exposure/desensitization.</li>
                                </ul>
                                <strong>Handling & Groundwork:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Lunging.</li>
                                   <li>Obstacles.</li>
                                   <li>Grooming, bathing, farrier/vet handling.</li>
                                </ul>
                                <strong>Additional:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Loading & unloading.</li>
                                   <li>Off-property or show footage.</li>
                                </ul>
                                <strong>Don’t skip this:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Show full, continuous clips—not quick cuts.</li>
                                   <li>Include both sides and full gaits.</li>
                                   <li>Don’t just show perfect moments—show how the horse actually goes.</li>
                                </ul>
                                <p>
                                   Buyers aren’t just watching—they’re evaluating. The more real and complete your video is, the more confident they’ll feel reaching out. <br><br>
                                   <i>✨ Show the whole horse—not just the highlight reel.</i>
                                </p>
                             </div>
                          </div>
                       </div>
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingSeller">
                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeller">
                             🧬 Pedigree, PPE & Registration (Optional) 
                             </button>
                          </h2>
                          <div id="collapseSeller" class="accordion-collapse collapse" data-bs-parent="#accordionRight">
                             <div class="accordion-body">
                                Add depth and credibility to your listing—these details help buyers feel confident before they ever reach out. <br><br>
                                <strong>Pedigree:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Showcase bloodlines and breeding.</li>
                                </ul>
                                <strong>PPE & X-rays:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Share if available to save time and build trust.</li>
                                   <li>Helps serious buyers make informed decisions faster.</li>
                                </ul>
                                <strong>Registration:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Verify age, identity, and lineage.</li>
                                </ul>
                                <p>
                                   Providing this information upfront can reduce back-and-forth and attract more serious inquiries. <br><br>
                                   <i>✨ Less guesswork. More confidence.</i>
                                </p>
                             </div>
                          </div>
                       </div>
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingSocial">
                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSocial">
                             🧭 Member Dashboard Access
                             </button>
                          </h2>
                          <div id="collapseSocial" class="accordion-collapse collapse" data-bs-parent="#accordionRight">
                             <div class="accordion-body">
                                Everything you need, all in one place—so you can stay organized and in control from start to finish. <br><br>
                                <strong>From your dashboard, you can:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Add and manage listings.</li>
                                   <li>Track conversations.</li>
                                   <li>Save favorites.</li>
                                   <li>Manage billing.</li>
                                   <li>Edit your profile.</li>
                                </ul>
                                <p>
                                   No jumping between tabs. No losing track of conversations. Everything stays right where you need it. <br><br>
                                   <i>✨ Simple. Clean. Easy to use.</i>
                                </p>
                             </div>
                          </div>
                       </div>
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingMessaging">
                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMessaging">
                             🔄 Auto-Renew Until Sold (30 Days) 
                             </button>
                          </h2>
                          <div id="collapseMessaging" class="accordion-collapse collapse" data-bs-parent="#accordionRight">
                             <div class="accordion-body">
                                Stay visible without the extra work—your listing keeps working for you. <br><br>
                                <strong>How it works:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Listings automatically renew every 30 days.</li>
                                   <li>Stay active until marked sold.</li>
                                </ul>
                                <strong>When sold:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Mark as sold.</li>
                                   <li>Enter final price.</li>
                                   <li>Final sale prices help build a more transparent market for everyone.</li>
                                </ul>
                                <p>
                                   Your listing stays in front of people the entire time—no reposting, no starting over. <br><br>
                                   <i>✨ No reposting. No lost visibility.</i>
                                </p>
                             </div>
                          </div>
                       </div>
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingFour">
                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                             🤝 Customer Support
                             </button>
                          </h2>
                          <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionRight">
                             <div class="accordion-body">
                                We’re here to help—real people who understand horses and the industry behind them. <br><br>
                                <strong>Support includes:</strong>
                                <ul class="ps-4 mb-4">
                                   <li>Listing assistance.</li>
                                   <li>Platform support.</li>
                                   <li>Guidance from people who know horses.</li>
                                </ul>
                                <p>
                                   Whether you’re listing for the first time or managing multiple horses, we’re here when you need us. <br><br>
                                   <i>✨ No guesswork. No runaround. Just real help.</i>
                                </p>
                             </div>
                          </div>
                       </div>
                    </div>
                  </div>
               </div>
            </div>
            
            
            <div class="tab-pane fade" id="service-content" role="tabpanel">
               <div class="row">
                  <div class="col-md-6">
                     <div class="accordion" id="serviceAccordionLeft">
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s1">📄 Business Profile & Experience</button></h2>
                           <div id="s1" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionLeft">
                              <div class="accordion-body">
                                 Show clients who you are and why they should trust you—this is often what sets you apart before they ever reach out. <br><br>
                                 <strong>Include:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>About your business.</li>
                                    <li>Years of experience.</li>
                                    <li>Certifications or accreditations.</li>
                                    <li>Languages spoken.</li>
                                 </ul>
                                 <p>
                                    A complete profile helps clients understand your background, your expertise, and what it’s like to work with you. <br><br>
                                    <i>✨ Strong profiles build trust—and trusted businesses get chosen.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s2">🧰 Services & Pricing Details</button></h2>
                           <div id="s2" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionLeft">
                              <div class="accordion-body">
                                 Be clear about what you offer—this is how clients quickly decide if you’re the right fit. <br><br>
                                 <strong>Include:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Services provided.</li>
                                    <li>Service details and specialties.</li>
                                    <li>Transparent pricing (if applicable).</li>
                                 </ul>
                                 <p>
                                    Clear, detailed services help clients understand exactly what to expect—and reduce unnecessary back-and-forth. <br><br>
                                    <i>✨ Clarity builds confidence—and confident clients reach out.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s3">📍 Location & Service Areas</button></h2>
                           <div id="s3" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionLeft">
                              <div class="accordion-body">
                                 Let clients know where you’re based and where you travel—so they can quickly see if you’re a good fit. <br><br>
                                 <strong>Include:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Primary location.</li>
                                    <li>Areas you service.</li>
                                    <li>Travel availability (if applicable).</li>
                                 </ul>
                                 <p>
                                    Clear service areas make it easy for clients to find and choose you. <br><br>
                                    Your business appears directly on horse and property listings within your service area—putting you in front of clients who are already looking. <br><br>
                                    <i>✨ Be easy to find. Easy to choose.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s10">🧭 Member Dashboard Access</button></h2>
                           <div id="s10" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionLeft">
                              <div class="accordion-body">
                                 Everything you need to manage your business—organized and all in one place. <br><br>
                                 <strong>From your dashboard, you can:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Add and manage service listings.</li>
                                    <li>Track client inquiries and conversations.</li>
                                    <li>Update your business profile and details.</li>
                                    <li>Manage billing and subscriptions.</li>
                                 </ul>
                                 <p>
                                    Stay on top of your leads, your listings, and your business without jumping between platforms. <br><br>
                                    <i>✨ Run your services without the chaos.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="accordion" id="serviceAccordionRight">
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s7">📸 Photos & Videos Included</button></h2>
                           <div id="s7" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionRight">
                              <div class="accordion-body">
                                 Show your work—strong visuals build confidence before a client ever reaches out. <br><br>
                                 <strong>Include:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Up to 20 photos of your services or results.</li>
                                    <li>Up to 5 YouTube videos of your work (if applicable).</li>
                                 </ul>
                                 <p>
                                    Show real examples of your work, your process, and your results—this is what helps clients understand what it’s like to work with you. <br><br>
                                    <i>✨ Strong visuals help clients choose with confidence.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s9_1">💬 Client Messaging Included</button></h2>
                           <div id="s9_1" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionRight">
                              <div class="accordion-body">
                                 Keep communication simple, organized, and all in one place—so you never miss an opportunity. <br><br>
                                 <strong>Stay connected with:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Direct messaging with clients.</li>
                                    <li>Notifications for new inquiries.</li>
                                    <li>Easy conversation tracking.</li>
                                 </ul>
                                 <p>
                                    Everything stays organized and tied to your listing, so you always know who you’re talking to and what they need. <br><br>
                                    <i>✨ Respond quickly. Stay organized. Never miss an opportunity.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#s9_2">🌐 Online Presence & Client Connections</button></h2>
                           <div id="s9_2" class="accordion-collapse collapse" data-bs-parent="#serviceAccordionRight">
                              <div class="accordion-body">
                                 Make it easy for clients to find you and learn about your work. <br><br>
                                 <strong>Show your presence:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Social media profiles.</li>
                                    <li>Website.</li>
                                    <li>Contact information.</li>
                                 </ul>
                                 <p>
                                    This gives clients a clear way to explore your work and reach out when they’re ready. <br><br>
                                    <i>✨ Be easy to find. Easy to connect with.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            
            <div class="tab-pane fade" id="estate-content" role="tabpanel">
               <div class="row">
                  <div class="col-md-6">
                     <div class="accordion" id="estateAccordionLeft">
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e1">
                              📸 20 Photos Included
                              </button>
                           </h2>
                           <div id="e1" class="accordion-collapse collapse" data-bs-parent="#estateAccordionLeft">
                              <div class="accordion-body">
                                 Show the full property—not just the highlights.
                                 <ul class="ps-4 mb-4">
                                    <li>Home interior and exterior</li>
                                    <li>Barns, arenas, and structures</li>
                                    <li>Land, layout, and turnout areas</li>
                                    <li>Aerial or wide-angle views</li>
                                 </ul>
                                 <p><i>✨ Complete photo sets attract more serious buyers and increase engagement.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e2">
                              🎥 5 Videos Included
                              </button>
                           </h2>
                           <div id="e2" class="accordion-collapse collapse" data-bs-parent="#estateAccordionLeft">
                              <div class="accordion-body">
                                 Bring the property to life.
                                 <ul class="ps-4 mb-4">
                                    <li>Full property walkthrough</li>
                                    <li>Aerial or drone footage</li>
                                    <li>Barn and facility flow</li>
                                    <li>Riding or lifestyle footage</li>
                                 </ul>
                                 <p><i>✨ Video helps buyers connect with the property before they ever step on site.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e3">
                              📝 Property Descriptions
                              </button>
                           </h2>
                           <div id="e3" class="accordion-collapse collapse" data-bs-parent="#estateAccordionLeft">
                              <div class="accordion-body">
                                 Highlight what makes the property unique.
                                 <ul class="ps-4 mb-4">
                                    <li>Acreage and layout</li>
                                    <li>Home features</li>
                                    <li>Barn and facility details</li>
                                    <li>Use potential (private, boarding, training, etc.)</li>
                                 </ul>
                                 <p><i>✨ A strong description helps buyers quickly understand value and potential.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e4">
                              🐎 Facility Details
                              </button>
                           </h2>
                           <div id="e4" class="accordion-collapse collapse" data-bs-parent="#estateAccordionLeft">
                              <div class="accordion-body">
                                 Clearly outline all equestrian features.
                                 <ul class="ps-4 mb-4">
                                    <li>Number and size of stalls</li>
                                    <li>Indoor/outdoor arenas</li>
                                    <li>Tack rooms, wash stalls</li>
                                    <li>Turnout types and setup</li>
                                 </ul>
                                 <p><i>✨ Buyers can quickly determine if the property fits their NEEDS.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e_dashboard">
                              🧭 Member Dashboard Access
                              </button>
                           </h2>
                           <div id="e_dashboard" class="accordion-collapse collapse" data-bs-parent="#estateAccordionLeft">
                              <div class="accordion-body">
                                 Everything you need to manage your listings from start to finish—all in one place. <br><br>
                                 <strong>From your dashboard, you can:</strong>
                                 <ul class="ps-4 mb-4">
                                    <li>Add and manage property listings.</li>
                                    <li>Track buyer inquiries and conversations.</li>
                                    <li>Update listing details and media.</li>
                                    <li>Manage billing and subscriptions.</li>
                                 </ul>
                                 <p>
                                    Keep everything connected to your listings so you always know what’s active, what’s getting attention, and who’s reaching out. <br><br>
                                    <i>✨ Stay organized. Stay visible. Stay in control.</i>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="accordion" id="estateAccordionRight">
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e7">
                              🌿 Property Features
                              </button>
                           </h2>
                           <div id="e7" class="accordion-collapse collapse" data-bs-parent="#estateAccordionRight">
                              <div class="accordion-body">
                                 Everything beyond the barn.
                                 <ul class="ps-4 mb-4">
                                    <li>Additional buildings or structures</li>
                                    <li>Garages, workshops, storage</li>
                                    <li>Landscaping or unique features</li>
                                 </ul>
                                 <p><i>✨ Highlight the features that make your property stand out.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e8">
                              📂 Document Uploads
                              </button>
                           </h2>
                           <div id="e8" class="accordion-collapse collapse" data-bs-parent="#estateAccordionRight">
                              <div class="accordion-body">
                                 Provide important information upfront.
                                 <ul class="ps-4 mb-4">
                                    <li>Surveys</li>
                                    <li>Floor plans</li>
                                    <li>Property disclosures</li>
                                    <li>Additional documents</li>
                                 </ul>
                                 <p><i>✨ Transparency builds confidence and helps move deals forward faster.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e9">
                              📍 Location Information
                              </button>
                           </h2>
                           <div id="e9" class="accordion-collapse collapse" data-bs-parent="#estateAccordionRight">
                              <div class="accordion-body">
                                 <ul class="ps-4 mb-4">
                                    <li>General location</li>
                                    <li>Nearby trails or equestrian facilities</li>
                                    <li>Accessibility and surroundings</li>
                                    <li>Local Service Providers will show up on your ad!</li>
                                 </ul>
                                 <p><i>✨ The right location can be just as important as the property itself.</i></p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e10">
                              👤 Agent / Seller Profile
                              </button>
                           </h2>
                           <div id="e10" class="accordion-collapse collapse" data-bs-parent="#estateAccordionRight">
                              <div class="accordion-body">
                                 Show who’s representing the property.
                                 <ul class="ps-4 mb-4">
                                    <li>Current listings</li>
                                    <li>Past sold properties</li>
                                    <li>Contact information</li>
                                    <li>Branding and profile details</li>
                                 </ul>
                                 <p><i>✨ Experience and credibility matter when making a buying decision.</i></p>
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
@endsection