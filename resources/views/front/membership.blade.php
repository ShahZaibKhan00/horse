@extends('layouts.app')
@section('content')
<style>
   .membershipBanner {
   padding: 0px 20px;
   }
   .membershipBanner .heading_main {
   font-family: "AvenirNextLTPro-Bold";
   font-size: 80px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent; 
   font-weight: 300;
   }
   .membership_sec_one {
   padding-top: 40px;
   }
   .membership_sec_one .container {
   max-width: 95%;
   }
   .custom-tab-wrapper {
   display: flex;
   flex-direction: column;
   align-items: center;
   padding: 40px 20px;
   }
   .custom-tabs {
   display: flex;
   gap: 20px;
   justify-content: center;
   flex-wrap: wrap;
   }
   .custom-tabs .nav-link {
   font-family: "AvenirLTStd-Medium";
   background-color: white;
   border: 3px solid rgba(0, 0, 0, 0.1);
   border-radius: 0;
   color: #1c1c3c;
   font-weight: 500;
   padding: 22px 20px;
   width: 300px;
   text-align: center;
   line-height: 1.4;
   box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
   transition: all 0.3s ease;
   position: relative;
   min-width: 200px;
   font-size: 18px;
   white-space: nowrap;
   }
   /* Curved shadow bottom */
   .custom-tabs .nav-link::after {
   content: '';
   position: absolute;
   left: 50%;
   transform: translateX(-50%);
   bottom: -12px;
   width: 80%;
   height: 12px;
   border-radius: 50%;
   background: rgba(0, 0, 0, 0.15);
   filter: blur(4px);
   z-index: -1;
   }
   /* Active tab */
   .custom-tabs .nav-link.active {
   background-color: #1d2139!important;
   color: #b09240!important;
   border-color: #b09240;
   }
   .custom-tabs .nav-link.active span {
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent; 
   }
   /* Optional: Remove default Bootstrap focus */
   .custom-tabs .nav-link:focus {
   box-shadow: none;
   outline: none;
   }
   .mem_blue_stripe {
   background: #1d2139;
   padding: 40px 24px;
   text-align: center;
   border-bottom: 5px solid #b09240;
   border-top: 5px solid  #b09240;
   }
   .mem_blue_stripe h2 {
   font-family: "AvenirNextLTPro-Bold";
   font-size: 40px;
   margin: 0;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   font-weight: 300;
   margin-bottom: 10px;
   }
   .mem_blue_stripe h4 {
   font-family: "AvenirNextLTPro-Bold";
   font-size: 20px;
   margin: 0;
   color: #fff;
   font-weight: 300;
   }
.pricing-card {
    width: 100%;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
    text-align: center;
    background-color: white;
    position: relative;
    height: 255px;
}
.pricing-card.servc_ard {
       height: 185px;
} 
   .pricing-card .card-header {
   background-color: #1d2139;
   color: #fff;
   padding: 12px;
   font-family: "AvenirNextLTPro-Bold";
   border-radius: 0;
   }
   .pricing-card .card-header h3 {
   margin: 0;
   font-size: 30px;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   }
   .pricing-card .card-header p {
   margin: 5px 0 0;
   font-family: "AvenirLTStd-Medium";
   font-size: 18px;
   color: #fff;
   }
   .pricing-card .card-body {
   padding: 15px 10px 25px 10px;
   font-family: "AvenirNextLTPro-Regular";
   }
.pricing-card .card-description {
    font-family: "AvenirLTStd-Book";
    font-size: 15px;
    color: #000;
    text-transform: uppercase;
    margin-bottom: 15px;
    line-height: 1.4;
    max-width: 260px;
    margin: 0 auto;
}
   .pricing-card .card-description .bold {
   font-family: "AvenirNextLTPro-Bold";
   }
   .pricing-card .card-description .highlight {
   font-family: "AvenirLTStd-Medium";
   color: #c00;
   }
   .pricing-card .card-price {
   font-family: "AvenirNextLTPro-Bold";
   font-size: 25px;
   margin-bottom: 15px;
   }
   .pricing-card .card-price span {
   font-size: 24px;
   }
   .choose-btn {
   font-size: 18px;
   font-family: "AvenirNextLTPro-Bold";
   padding: 10px 35px;
   background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
   position: absolute;
   bottom: -20px;
   left: 50%;
   transform: translateX(-50%);
   width: fit-content;
   text-transform: uppercase;
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   border-radius: 0;
   z-index: 999;
   border: none;
   color: #1d2139;
   letter-spacing: 0.5px;
   cursor: pointer;
   border: 2px solid #1d2139;
   text-transform: capitalize;
   /* Full transition for smooth effect */
   transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease, color 0.3s ease;
   }
   .choose-btn:hover {
   background: linear-gradient(90deg, rgba(250, 233, 207, 1) 0%, rgba(191, 152, 85, 1) 100%);
   transform: translateX(-50%) translateY(-4px);
   box-shadow: 0 8px 16px rgba(0,0,0,0.35), 0 0 10px rgba(191, 152, 85, 0.4);
   color: #1d2139;
   }
   .feature-section {
   padding: 30px 0px 40px 0px;
   font-family: 'AvenirLTStd-Book', sans-serif;
   }
   .feature-list {
   display: flex;
   flex-direction: column;
   gap: 30px;
   }
   .feature-item {
   display: flex;
   align-items: flex-start; /* Keep it this way */
   gap: 15px;
   margin-bottom: 30px;
   }
   .icon {
   font-size: 24px;
   line-height: 1;
   margin-top: 2px; /* ← Reduce this from 5px */
   flex-shrink: 0;
   }
   .feature-text h4 {
   font-family: 'AvenirNextLTPro-Bold', sans-serif;
   margin: 0 0 6px;
   font-size: 20px;
   color: #000;
   }
   .feature-text p {
   margin: 0;
   font-size: 16px;
   line-height: 1.6;
   }
   .boost-card {
   background-color: #1d2139;
   color: #000;
   border-radius: 5px;
   max-width: 100%;
   font-family: "AvenirNextLTPro-Regular", sans-serif;
   box-shadow: 0 2px 10px rgba(0,0,0,0.15);
   position: relative;
   }
   .boost-header {
   background-color: #1d2139;
   padding: 16px 20px;
   display: flex;
   align-items: center;
   gap: 8px;
   font-family: "AvenirNextLTPro-Bold", sans-serif;
   color: #fff;
   font-size: 22px;
   }
   .boost-title {
   display: inline-block;
   background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
   background-clip: text;
   -webkit-background-clip: text;
   -webkit-text-fill-color: transparent;
   }
   .boost-body {
   padding: 20px 20px 35px 20px;
   font-family: "AvenirLTStd-Book", sans-serif;
   color: #000;
   font-size: 16px;
   line-height: 1.6;
   background-color: #f9f9f9; /* soft background for contrast */
   }
   .boost-description {
   margin-bottom: 12px;
   }
   .boost-list {
   list-style: disc inside;
   padding-left: 0;
   margin-bottom: 16px;
   font-family: "AvenirLTStd-Medium", sans-serif;
   }
   .boost-list li {
   margin-bottom: 10px;
   }
   .boost-list strong {
   font-family: "AvenirNextLTPro-Bold", sans-serif;
   }
   .boost-footer {
   margin-bottom: 20px;
   font-family: "AvenirLTStd-Book", sans-serif;
   }
   .boost-button {
   font-family: "AvenirNextLTPro-Bold", sans-serif;
   background: linear-gradient(to right, #d1a766, #e5cfa2);
   padding: 12px 20px;
   border: none;
   border-radius: 3px;
   cursor: pointer;
   color: #000;
   font-size: 14px;
   box-shadow: 0 1px 4px rgba(0,0,0,0.1);
   }
   .membership-card {
   background-color: #fff;
   color: #000;
   font-family: "AvenirNextLTPro-Regular", sans-serif;
   padding: 24px;
   line-height: 1.6;
   border-radius: 8px;
   }
   .membership-title {
   font-family: "AvenirNextLTPro-Bold", sans-serif;
   font-size: 35px;
   margin-bottom: 30px;
   text-align: center;
   }
   .membership-columns {
   display: flex;
   flex-wrap: wrap;
   gap: 32px;
   }
   .membership-column {
   flex: 1 1 48%;
   min-width: 300px;
   }
.membership-section, .feature-item {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 20px 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    height: 250px;
}
   .membership-section:hover {
   border-color: #bbb;
   box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* slightly more pronounced on hover */
   }

   .serviceWrapper .membership-section, 
   .serviceWrapper .feature-item {
      height: 240px;
   }
   .membership-heading {
   font-family: 'AvenirNextLTPro-Bold', sans-serif;
   margin: 0 0 6px;
   font-size: 20px;
   color: #000;
   }
   .membership-list {
   list-style: disc;
   padding-left: 50px;
   font-family: "AvenirLTStd-Book", sans-serif;
   margin-top: 15px;
   }
   .membership-section p {
   padding-left: 37px;
   }
   .membership-list li {
   margin-bottom: 8px;
   font-size: 16px;
   line-height: 1.6;
   }
   .membership-subtext {
   font-style: italic;
   color: #444;
   list-style-type: none;
   margin-left: 0;
   }
   .tabs_wrapper {
   position: relative;
   padding-bottom: 300px;
   }
   .tabs_wrapper .mem_blue_stripe {
   position: absolute;
   bottom: 0;
   left: 50%;
   transform: translateX(-50%);
   width: 150%;
   }


.star_wrapper {
    width: 140px;
    height: 140px;
    position: absolute;
    bottom: 10px;
    right: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    z-index: 1;
    padding-top: 10px;
}
.star_wrapper p:first-of-type {
    font-size: 20px;
}
.star_wrapper p {
    font-size: 14px;
    margin: 0;
    font-weight: 800;
    color: #1d2139;
    line-height: 18px;
}
.pricing-card .star_wrapper .star_img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
    max-width: 170px;
}
   @media only screen and (max-width: 1799px) {
      .choose-btn {
         font-size: 15px;
         padding: 10px 15px;
      }
      .pricing-card .card-header h3 {
         font-size: 25px;
      }
.pricing-card .star_wrapper .star_img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
    max-width: 105px;
}
.pricing-card .card-price {
    font-family: "AvenirNextLTPro-Bold";
    font-size: 16px;
    margin-bottom: 15px;
}
.star_wrapper {
    width: 105px;
    height: 105px;
    bottom: 30px;
    right: 0;
}
     .star_wrapper p:first-of-type {
         font-size: 18px;
      }
     .star_wrapper p {
    font-size: 10px;
    margin: 0;
    font-weight: 800;
    color: #1d2139;
    line-height: 13px;
}
      .pricing-card .card-header p {
         font-size: 16px;
      }
   }
</style>
<section class="inner_page_banner membershipBanner">
   <div class="container text-center">
      <h1 class="heading_main">ADVERTISING PLANS</h1>
   </div>
</section>
<section class="service_section_one membership_sec_one">
   <!-- Tab Navigation -->
   <div class="container">
      <div class="custom-tab-wrapper">
         <div class="nav nav-pills custom-tabs" id="v-pills-tab" role="tablist">
            <button class="nav-link active" id="v-pills-horses-tab" data-bs-toggle="pill" data-bs-target="#v-pills-horses" type="button" role="tab"
               aria-controls="v-pills-horses" aria-selected="true">
            <span>Horse<br>Listings</span>
            </button>
            <button class="nav-link" id="v-pills-services-tab" data-bs-toggle="pill" data-bs-target="#v-pills-services" type="button" role="tab"
               aria-controls="v-pills-services" aria-selected="false">
            <span>Service Provider<br>Listings</span>
            </button>
            <button class="nav-link" id="v-pills-realestate-tab" data-bs-toggle="pill" data-bs-target="#v-pills-realestate" type="button" role="tab"
               aria-controls="v-pills-realestate" aria-selected="false">
            <span>Real Estate<br>Listings</span>
            </button>
         </div>
      </div>
   </div>
   <div class="container">
      <!-- Tab Content OUTSIDE of .container -->
      <div class="tab-content" id="v-pills-tabContent">
         <div class="tab-pane fade show active" id="v-pills-horses" role="tabpanel" aria-labelledby="v-pills-horses-tab">
            <div class="tabs_wrapper">
               <div class="row gy-5">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Basic Seller Plan</h3>
                           <p>1 Horse Listing</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              Best for Individual sellers<br>
                              with 1 horse for sale.
                           </p>
                           <p class="card-price"><span>$15.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Essential Barn Plan </h3>
                           <p>Up to 2 Horse Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              SMALL - SCALE SELLERS OR<br>
                              HOBBY FARMS
                           </p>
                           <p class="card-price"><span>$25.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>$5<p>
                           <p>SAVINGS<p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Pro Barn Plan </h3>
                           <p>Up to 5 Horse Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              SELLERS MANAGING A FEW<br>
                              HORSES A MONTH
                           </p>
                           <p class="card-price"><span>$45.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>$30<p>
                           <p>SAVINGS<p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Elite Seller Plan</h3>
                           <p>Up to 10 Horse Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              SELLERS WITH REVOLVING HORSES<br>
                              FOR SALE
                           </p>
                           <p class="card-price"><span>$75.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>$75<p>
                           <p>SAVING<p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Enterprise Plan</h3>
                           <p>Unlimited Horse Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              HIGH-VOLUME<br>
                              SELLERS & BREEDERS
                           </p>
                           <p class="card-price"><span>$100.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>Unlimited<p>
                           <p>SAVING<p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Auction | Event Plan</h3>
                           <p>Unlimited Horse Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              AUCTION WEBSITES OR SALES<br>
                              EVENTS
                           </p>
                           <p class="card-price"><span>$100.00</span>/ Per Auction</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>Unlimited<p>
                           <p>SAVING<p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mem_blue_stripe mb-4 mt-5">
                  <h2>EVERY HORSE LISTING INCLUDES:</h2>
                  <h4>NO UPSALES…NO SURPRISES</h4>
               </div>
            </div>
            <div class="feature-section">
               <div class="row">
                  <!-- Left Column -->
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="feature-item">
                        <span class="icon">📷</span>
                        <div class="feature-text">
                           <h4>Up to 20 Photos</h4>
                           <p>Give buyers a complete visual of your horse from all angles. Upload clear, high-resolution images to showcase conformation, personality, and performance. The more visual detail you provide, the more confident buyers will be.</p>
                        </div>
                     </div>
                     <div class="feature-item">
                        <span class="icon">🎥</span>
                        <div class="feature-text">
                           <h4>Up to 3 Videos</h4>
                           <p>Let your horse shine in motion. Share videos of groundwork, riding, handling, and temperament to help buyers make informed decisions before reaching out.</p>
                        </div>
                     </div>
                     <div class="feature-item">
                        <span class="icon">📄</span>
                        <div class="feature-text">
                           <h4>Detailed Description</h4>
                           <p>Your horse’s story matters. Buyers are looking for more than just the basics like age, height, and color — they want to truly understand the horse. A thoughtful, detailed description paints a picture of your horse. The more complete the story, the more your listing will stand out, attract serious buyers, and build confidence that your horse is the right match for them.</p>
                        </div>
                     </div>
                     <div class="feature-item">
                        <span class="icon">🧬</span>
                        <div class="feature-text">
                           <h4>Optional Pedigree Input</h4>
                           <p>Provide as much of your horse’s pedigree as you know (sire, dam, grandsire, etc.). Including pedigree information helps potential
buyers, breeders, and enthusiasts understand your horse’s lineage and bloodlines, but it is not required to create a listing. You can
enter full or partial details, or leave this section blank if unavailable.</p>
                        </div>
                     </div>

                     <div class="feature-item">
                        <span class="icon">🖼️</span>
                        <div class="feature-text">
                           <h4>Optional Registration Picture Upload</h4>
                           <p>If you have a photo of your horse’s registration papers, you can upload it. This helps verify pedigree and registration details for
interested buyers or breeders. Uploading is optional—you can still create your listing without it.</p>
                        </div>
                     </div>

                     <div class="feature-item">
                        <span class="icon">📁</span>
                        <div class="feature-text">
                           <h4>Optional PPE & X-Ray Document Uploads</h4>
                           <p>Upload pre‑purchase exam (PPE) reports or X‑ray images if you’d like to share veterinary findings with potential buyers. These
documents can build buyer confidence and save time during inquiries. Uploading is completely optional—you may provide them now
or share privately upon request. </p>
                        </div>
                     </div>


                     
                     
                  </div>
                  <!-- Right Column -->
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="feature-item">
                        <span class="icon">📣</span>
                        <div class="feature-text">
                           <h4>Social Media Advertising</h4>
                           <p>We help get eyes on your listing. Each ad can be featured on active social media platforms (Facebook, Instagram, etc.), boosting visibility.</p>
                        </div>
                     </div>


                      <div class="feature-item">
                        <span class="icon">📈</span>
                        <div class="feature-text">
                           <h4>Performance Insights</h4>
                           <p>Track how your listing is performing—see how many people viewed or saved it.</p>
                        </div>
                     </div>

                      <div class="feature-item">
                        <span class="icon">📄</span>
                        <div class="feature-text">
                           <h4>Member Dashboard</h4>
                           <p>Think of the Member Dashboard as your all-in-one barn office online — everything you need to manage your listings and connect with buyers, all in one secure place.</p>
                           <p><strong>Direct Communication:</strong> Message buyers instantly through our safe, built-in messaging system.</p>
                           <p><strong>Easy Listing Management:</strong> Update photos/Videos/ Documents, edit descriptions, adjust pricing, or highlight new achievements with just a few clicks.</p>
                           <p><strong>Sales Tracking:</strong> When your horse sells, simply mark the listing as sold to keep your account organized and accurate.</p>
                           
                        </div>
                     </div>

                     <div class="feature-item">
                        <span class="icon">📅</span>
                        <div class="feature-text">
                           <h4>Automatic Renewal Until Sold</h4>
                           <p>Your listing will automatically renew each billing cycle, keeping it active and visible until you mark the horse sold. This ensures
continuous exposure without the need to relist or manually extend your ad.</p>
                        </div>
                     </div>

                     <div class="feature-item">
                        <span class="icon">💰</span>
                        <div class="feature-text">
                           <h4>Sold Price Entry Required</h4>
                           <p>When you mark a horse as sold, you’ll be asked to enter the final sale price. This information helps create accurate market insights and
trends, benefiting future buyers and sellers across the community.</p>
                        </div>
                     </div>

                     <div class="feature-item">
                        <span class="icon">🌟</span>
                        <div class="feature-text">
                           <h4>Excellent Customer Service When You Need It</h4>
                           <p>We’re here for you. Whether it’s a photo upload issue or a question about wording your ad, our friendly and knowledgeable support team is just a message away.</p>
                        </div>
                     </div>
                     
                     
                    
                    

                     
                  </div>
               </div>
            </div>
            <div class="boost-card">
               <div class="boost-header">
                  <span class="boost-emoji">💥</span>
                  <span class="boost-title">7-Day Ad Boost — $30 - per horse</span>
               </div>
               <div class="boost-body">
                  <p class="boost-description">
                     We help get eyes on your listing with a powerful multi-channel promotion designed to maximize visibility and attract serious buyers fast:
                  </p>
                  <ul class="boost-list">
                     <li><strong>Featured placement</strong> on our website’s prime listing pages</li>
                     <li><strong>Social media posts</strong> on our active platforms including Facebook and Instagram, reaching thousands of horse buyers and enthusiasts</li>
                     <li><strong>Blast text messages</strong> sent directly to buyers who have set up search alerts matching your horse’s criteria</li>
                     <li><strong>Email newsletter inclusion</strong> featuring your horse in front of a targeted audience of engaged buyers</li>
                  </ul>
                  <p class="boost-footer">
                     This 7-day boost goes beyond just your regular listing, putting your horse front and center across multiple channels to speed up your sale!
                  </p>
                  <button class="choose-btn">Choose Ad Boost at Check out</button>
               </div>
            </div>
         </div>

         <div class="tab-pane fade" id="v-pills-services" role="tabpanel" aria-labelledby="v-pills-services-tab">
            <div class="tabs_wrapper">
               <div class="row gy-5 justify-content-center">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card servc_ard">
                        <div class="card-header">
                           <h3>All Services</h3>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              GET YOUR SERVICE NOTICED
                           </p>
                           <p class="card-price"><span>$10.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mem_blue_stripe mb-4 mt-5">
                  <h2>Every Service Listing Includes All Features:</h2>
               </div>
            </div>
            
            <div class="membership-card mt-5 serviceWrapper">
               <h2 class="membership-title">🐴 ALL Service Provider Advertising Membership Includes:</h2>
               <div class="membership-columns">
                  <!-- Column 1 -->
                  <div class="membership-column">
                     <div class="membership-section">
                        <h3 class="membership-heading">✅ Business Listing on Our Platform</h3>
                        <ul class="membership-list">
                           <li>A professionally designed profile showcasing your business name, services, logo, location, and contact info.</li>
                           <li>Links to your website, social media, and booking/contact forms.</li>
                           <li>Auto renews monthly until you cancel</li>
                        </ul>
                     </div>
                     <div class="membership-section">
                        <h3 class="membership-heading">🌟 Featured on Relevant Horse Listings</h3>
                        <ul class="membership-list">
                           <li><strong>Your business automatically appears on horse ads</strong> located in your service area.</li>
                           <li class="membership-subtext">Example: If you’re an equine transport company in Kentucky, your service will be visible on all horse listings in Kentucky.</li>
                           <li>Farriers, vets, trainers, haulers, saddle fitters, etc. — all shown where it counts.</li>
                        </ul>
                     </div>
                     <div class="membership-section">
                        <h3 class="membership-heading">🔍 Easy Search and Filter Functionality</h3>
                        <p>Clients can easily find your business by:</p>
                        <ul class="membership-list">
                           <li>Location</li>
                           <li>Service category (e.g., Vet, Farrier, Trainer)</li>
                           <li>Keywords</li>
                           <li>Horse breed specialties or disciplines (e.g., Reining, Dressage)</li>
                        </ul>
                     </div>
                     <div class="membership-section">
                        <h3 class="membership-heading">📍 Map-Based Service Locator</h3>
                        <ul class="membership-list">
                           <li>Interactive map allows users to see nearby providers and click to view your full profile.</li>
                        </ul>
                     </div>
                     <div class="membership-section">
                        <h3 class="membership-heading">📸 Media-Rich Business Profile</h3>
                        <p>Showcase your business with photos, videos, testimonials, and examples of your work. Include pricing, service menus, a detailed
description of your company and how many years you've been in business to help potential clients understand what you offer and
why they should choose you.</p>
                     </div>
                  </div>
                  <!-- Column 2 -->
                  <div class="membership-column">
                     <div class="membership-section">
                        <h3 class="membership-heading">📢 Promotional Features</h3>
                        <ul class="membership-list">
                           <li>Homepage & Directory Highlights – Your listing will appear in our featured carousel and service directory for maximum visibility. </li>
                           <li>Monthly Spotlights - Gain extra exposure through newsletter features and social media shoutouts.</li>
                        </ul>
                     </div>
                    <!-- <div class="membership-section">
                        <h3 class="membership-heading">📅 How do we do this or give them an option to do this? Event And Availability Promotion</h3>
                        <ul class="membership-list">
                           <li>Promote your clinics, availability, open barn dates, or route schedules for mobile services.</li>
                           <li>Calendar integration visible to horse owners.</li>
                        </ul>
                     </div> -->
                     <div class="membership-section">
                        <h3 class="membership-heading">📬 Client & Performance Insights</h3>
                        <ul class="membership-list">
                           <li>Gain a clear view of how your business or listings are performing. Track profile views, and saves.</li>
                           <li>Use the platform messaging center to respond to inquiries and turn interested parties into clients!</li>
                        </ul>
                     </div>
                     <div class="membership-section">
                        <h3 class="membership-heading">🛠️ Support and Updates</h3>
                        <ul class="membership-list">
                           <li>Easy-to-use dashboard to manage your listing.</li>
                           <li>Access to our team for help optimizing your ad.</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>


         <div class="tab-pane fade" id="v-pills-realestate" role="tabpanel" aria-labelledby="v-pills-realestate-tab">
            <div class="tabs_wrapper tabs_wrapper_one">
               <div class="row gy-5">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Core Package</h3>
                           <p>1 Listing</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              PERFECT FOR INDIVIDUAL PROPERTY PROMOTION
                           </p>
                           <p class="card-price"><span>$30.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Plus Package</h3>
                           <p>Up to 2 Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              GREAT FOR AGENTS WITH MULTIPLE PROPERTIES IN ROTATION<br>
                           </p>
                           <p class="card-price"><span>$50.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>$10<p>
                           <p>SAVINGS<p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="pricing-card">
                        <div class="card-header">
                           <h3>Platinum Package</h3>
                           <p>Up to 5 Listings</p>
                        </div>
                        <div class="card-body">
                           <p class="card-description">
                              DESIGNED FOR HIGH-VOLUME AGENTS AND BROKERAGES
                           </p>
                           <p class="card-price"><span>$100.00</span>/ Month</p>
                           <a href="#!" class="choose-btn">Choose this Plan</a>
                        </div>
                        <div class="star_wrapper">
                           <img src="assets/images/star-1.png" class="star_img"/>
                           <p>$50<p>
                           <p>SAVINGS<p>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="mem_blue_stripe mb-4 mt-5">
                  <h2>EVERY REAL ESTATE LISTING INCLUDES ALL FEATURES:</h2>
                  <h4>NO UPSALES…NO SURPRISES</h4>
               </div>
            </div>

            <div class="feature-section">
               <div class="row">
                  <!-- Left Column -->
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="feature-item">
                     <span class="icon">📷</span>
                     <div class="feature-text">
                        <h4>Up to 20 Photos</h4>
                        <p>Give buyers a complete visual tour of your property. Upload clear, high-resolution images that highlight key features like the home’s exterior, interior rooms, barns, pastures, fencing, and land layout. The more visual detail you provide, the more confident and serious buyers will be.</p>
                     </div>
                     </div>

                     <div class="feature-item">
                     <span class="icon">🎥</span>
                     <div class="feature-text">
                        <h4>Up to 3 Videos</h4>
                        <p>Bring your property to life. Share walk-throughs, drone footage, or highlights of the land, facilities, and surroundings. Videos increase engagement and help buyers get a true sense of the property's layout and atmosphere before scheduling a visit.</p>
                     </div>
                     </div>

                     <div class="feature-item">
                     <span class="icon">📄</span>
                     <div class="feature-text">
                        <h4>Detailed Description</h4>
                        <p>Give a complete description of your property. Include details like acreage, home specs, recent upgrades, outbuildings, fencing types, water sources, zoning, utilities, neighborhood insights, and equestrian amenities.</p>
                        <p><strong>More info = </strong>better qualified buyers.</p>
                     </div>
                     </div>

                     <div class="feature-item">
                     <span class="icon">📂</span>
                     <div class="feature-text">
                        <h4>Optional Document Uploads</h4>
                        <p>Build trust with transparency. Upload helpful documents such as surveys, seller disclosures, floor plans, or zoning info directly to your listing.</p>
                     </div>
                     </div>

                     <div class="feature-item">
                     <span class="icon">📣</span>
                     <div class="feature-text">
                        <h4>Social Media Advertising</h4>
                        <p>We help get eyes on your property. Every listing is eligible to be promoted on our active social media channels (Facebook, Instagram, etc.), expanding visibility far beyond the website itself.</p>
                     </div>
                     </div>

                    

                     



                     
                     
                  </div>
                  <!-- Right Column -->
                  <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="feature-item">
                        <span class="icon">💬</span>
                        <div class="feature-text">
                           <h4>In-Platform Messaging System</h4>
                           <p>Communicate directly with buyers through our secure messaging system.</p>
                        </div>
                     </div>
                     <div class="feature-item">
                     <span class="icon">📊</span>
                     <div class="feature-text">
                        <h4>Member Dashboard to Manage Listings</h4>
                        <p>This is your control center. Easily edit your listing, update info, mark your property sold, or view analytics on how your ad is performing. </p>
                     </div>
                     </div>

                     <div class="feature-item">
                     <span class="icon">🔁</span>
                     <div class="feature-text">
                        <h4>Automatic Renewal Until Sold</h4>
                        <p>Listings stay live and renew automatically each month so you never have to worry about re-posting. Once your property is sold, simply mark it as sold by entering the sold price on your Seller dashboard.</p>
                     </div>
                     </div>

                     <div class="feature-item">
                     <span class="icon">🌟</span>
                     <div class="feature-text">
                        <h4>Excellent Customer Service When You Need It</h4>
                        <p>We’re here for you. Whether it’s a photo upload issue or a question about wording your ad, our friendly and knowledgeable support team is just a message away.</p>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--
   <section class="service_section_one">
       <div class="container">
   	    <h2 class="heading65px monte_carlo fw_400">Most Popular</h2>
           <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                   <div class="category_box">
                       <div class="side_box">
                           Horses
                       </div>
                       <div class="side_box">
                           Service Providers
                       </div>
                       <div class="side_box">
                           Farms
                       </div>
                   </div>
               </div>
               <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                   <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="package_card">
                               <h1 class="heading18px">Community Member</h1>  
                               <h2 class="heading22px">Free</h2>
                               <p>Lorem ipsum dolor sit amet consectetur.</p>
                               <div class="icon_box">
                                   <img src="assets/images/check.png" alt="img" class="img-fluid">   
                               </div>
                               <div class="icon_box"></div> 
                               <div class="icon_box b_btm"></div>
                               <a href="{{ url('membership_form') }}" class="border_btn">Buy Now</a>  
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="package_card">
                               <h1 class="heading18px">Professional Member</h1>  
                               <h2 class="heading22px">$60</h2>
                               <p>Lorem ipsum dolor sit amet consectetur.</p>
                               <div class="icon_box">
                                   <img src="assets/images/check.png" alt="img" class="img-fluid">   
                               </div> 
                               <div class="icon_box">
                                   <img src="assets/images/check.png" alt="img" class="img-fluid">   
                               </div>   
                               <div class="icon_box b_btm"></div>
                               <a href="{{ url('membership_form') }}" class="border_btn">Buy Now</a>     
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="package_card">
                               <h1 class="heading18px">Premium Member</h1>  
                               <h2 class="heading22px">$80</h2>
                               <p>Lorem ipsum dolor sit amet consectetur.</p>  
                               <div class="icon_box">
                                   <img src="assets/images/check.png" alt="img" class="img-fluid">   
                               </div>  
                                <div class="icon_box">
                                   <img src="assets/images/check.png" alt="img" class="img-fluid">   
                               </div> 
                               <div class="icon_box b_btm">
                                   <img src="assets/images/check.png" alt="img" class="img-fluid">   
                               </div>   
                               <a href="{{ url('membership_form') }}" class="border_btn">Buy Now</a>     
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section> -->
@endsection