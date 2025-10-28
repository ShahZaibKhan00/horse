@extends('layouts.app') @section('content')
<section class="inner_page_banner serviceBanner">
    <div class="container text-center">
        <h1 class="heading80px monte_carlo fw_400">Service Providers</h1>
        <p class="banner_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
    </div>
</section>
<section class="service_section_one">
    <div class="container-fluid">
        <div class="heading65px monte_carlo fw_400 mb-5">
            <h1>SERVICE PROVIDERS</h1>
            <img src="assets/images/heading_logo.png" alt="img" class="img-fluid" />
        </div> 

        <div class="services_main_wrapper">
            <div class="services_box">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="img_box">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/team/1.jpg"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="info_text_box_first pt-4">
                                    <h1 class="heading44px">John Doe</h1>
                                    <p class="heading22px">Horse Rider</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>   
                                    <ul class="social_btn_flex">
                                        <li>
                                            <a href="#!"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="middle_txt_box">
									<h2 class="heading44px">About me</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vero expedita fugiat illo quasi doloremque, in unde omnis sint assumenda! Quaerat in, reprehenderit corporis voluptatum natus sequi
										reiciendis ullam. Quam eaque dolorum voluptates cupiditate explicabo.
									</p>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="right_btn_box">
									<a href="{{ url('service_details') }}" class="service_btn">Quick Contact</a>
								</div></div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="services_box">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="img_box">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/team/2.jpg"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="info_text_box_first pt-4">
                                    <h1 class="heading44px">Sophia Ava</h1>
                                    <p class="heading22px">Horse Rider</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>   
                                    <ul class="social_btn_flex">
                                        <li>
                                            <a href="#!"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="middle_txt_box">
									<h2 class="heading44px">About me</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vero expedita fugiat illo quasi doloremque, in unde omnis sint assumenda! Quaerat in, reprehenderit corporis voluptatum natus sequi
										reiciendis ullam. Quam eaque dolorum voluptates cupiditate explicabo.
									</p>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="right_btn_box">
									<a href="{{ url('service_details') }}" class="service_btn">Quick Contact</a>
								</div></div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="services_box">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="img_box">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/team/3.jpg" class="w-100" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="info_text_box_first pt-4">
                                    <h1 class="heading44px">James Henry</h1>
                                    <p class="heading22px">Horse Rider</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>   
                                    <ul class="social_btn_flex">
                                        <li>
                                            <a href="#!"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="middle_txt_box">
									<h2 class="heading44px">About me</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vero expedita fugiat illo quasi doloremque, in unde omnis sint assumenda! Quaerat in, reprehenderit corporis voluptatum natus sequi
										reiciendis ullam. Quam eaque dolorum voluptates cupiditate explicabo.
									</p>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="right_btn_box">
									<a href="{{ url('service_details') }}" class="service_btn">Quick Contact</a>
								</div></div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="services_box">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="img_box">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/team/3.jpg" class="w-100" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="info_text_box_first pt-4">
                                    <h1 class="heading44px">James Henry</h1>
                                    <p class="heading22px">Horse Rider</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>   
                                    <ul class="social_btn_flex">
                                        <li>
                                            <a href="#!"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="middle_txt_box">
									<h2 class="heading44px">About me</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam vero expedita fugiat illo quasi doloremque, in unde omnis sint assumenda! Quaerat in, reprehenderit corporis voluptatum natus sequi
										reiciendis ullam. Quam eaque dolorum voluptates cupiditate explicabo.
									</p>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="right_btn_box">
									<a href="#!" class="service_btn">Quick Contact</a>
								</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
