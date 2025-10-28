@extends('layouts.app') @section('content')
<section class="inner_page_banner membershipBanner">
    <div class="container text-center">
        <h1 class="heading80px monte_carlo fw_400">Membership</h1>
         <p class="banner_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
    </div>
</section>
<section class="service_section_one">
    <div class="container">
       <div class="membership_form_wrapper">
            <form class="membership_form">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="row gy-3">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="text" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="email" placeholder="Your Email">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="password" placeholder="Confirm Password">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="text" placeholder="Country">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="text" placeholder="City">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="text" placeholder="Zip/Postal">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <input type="text" placeholder="License">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form_bottom_box">
                                    <p class="heading22px fw_700 text-end">$20.00</p>
                                    <div class="card_number_group">
                                        <label class="heading18px mb-2">Card Number</label>
                                        
                                        <div class="input_group">
                                            <input type="number" placeholder="Cart Number">
                                            <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                                        </div>

                                        <div class="input_group pt-2">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="" id="form_check_one">
                                                <label class="form-check-label" for="form_check_one">
                                                    Yes, i agree to the <a href="#!">Term & Condition</a> and <a href="#!">Privacy Policy</a>   
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="" id="form_check_two">
                                                <label class="form-check-label" for="form_check_two">
                                                    Yes, i agree to the non-refundable policy</a>   
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <button class="border_btn" id="submit_btn" disabled>Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                         <div class="row gy-2">
                            <div class="col-12">
                                <div class="upload_group">
                                    <label for="upload_one" class="heading22px fw_700">
                                        <p>Upload License Image</p>
                                        <input type="file" id="upload_one" class="d-none">
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="upload_group">
                                    <label for="upload_two" class="heading22px fw_700">
                                        <p>Upload Riding License Image</p>
                                        <input type="file" id="upload_two" class="d-none">
                                    </label>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </form>
       </div>
    </div>
</section>
@endsection
