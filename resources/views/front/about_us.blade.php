@extends('layouts.app')
@section('content')
<section class="inner_page_banner aboutbanner">
	<div class="container text-center">
		<h1 class="heading80px monte_carlo fw_400">About Us</h1>
        <p class="banner_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
	</div>
</section>
<div class="about_long_bg">
	@include("inc.about")
    
    <section class="faqs_section mt-5">
		<div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h3 class="heading44px fw_700">
                        Why Choose Us? 
                    </h3>
                    <div class="accordion dark mt-4" id="accordionExample">
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Why this Company is Best?</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We offer a range of services, including social media strategy development, content creation, campaign management, audience analysis, paid advertising, influencer collaborations, and performance tracking across platforms.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why this Company is Best?</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We start by understanding your business goals, target audience, industry trends, and competitors. Based on this, we create a customized strategy to align your brand's voice, content, and campaigns with your objectives.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Why this Company is Best?</button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Our agency works with a diverse range of industries, including e-commerce, healthcare, hospitality, technology, and more. We tailor our approach to suit the unique needs of each client, regardless of their niche.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Why this Company is Best?</button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>No. We only charge you for our service fee of the tenure you’d like to work with us. However, managing and optimizing the ads is included in all packages.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="700">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> Why this Company is Best?</button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We prioritize a personalized approach, data-driven decisions, and transparent communication. Our team stays updated on industry trends and focuses on creating innovative content that resonates with your audience, delivering measurable ROI.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3 class="heading44px fw_700">
                        See Our Gallery
                    </h3>
                    <div class="imglist mt-4">
                        <ul>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm5.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm5.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm6.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm6.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm7.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm7.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm8.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm8.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm9.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm9.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm10.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm10.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm11.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm11.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm12.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm12.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm4.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm3.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm2.jpg" />
                                </a>
                            </li>
                            <li>
                                <a href="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" data-fancybox="group" data-caption="This image has a caption 1">
                                    <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/gallery/gallery-sm1.jpg" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="milestome mt-5">
        <div class="container text-center" id="counter">
            <div class="row">
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="counter_clm">
                        <div class="counterWrap d-flex gap-1 justify-content-center light">
                            <i class="fa-solid fa-box"></i>
                            <h2 class="heading50px fw_700 m-0 counter-value" data-count="300">0</h2>
                            <h2 class="heading50px fw_700 m-0 span-clr"></h2>
                            <h2 class="heading50px fw_700 m-0 span-clr">%</h2>
                        </div>
                        <p class="mb-0 mt-2 gradient_txt fw_700">Increase in Visibility</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="counter_clm">
                        <div class="counterWrap d-flex gap-1 justify-content-center light">
                            <h2 class="heading50px fw_700 m-0 counter-value" data-count="50">0</h2>
                            <h2 class="heading50px fw_700 m-0 span-clr"></h2>
                            <h2 class="heading50px fw_700 m-0 span-clr">+</h2>
                        </div>
                        <p class="mb-0 mt-2 gradient_txt fw_700">Best-Seller Campaigns</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="counter_clm">
                        <div class="counterWrap d-flex gap-1 justify-content-center light">
                            <h2 class="heading50px fw_700 m-0 counter-value" data-count="100">0</h2>
                            <h2 class="heading50px fw_700 m-0 span-clr"></h2>
                            <h2 class="heading50px fw_700 m-0 span-clr">%</h2>
                        </div>
                        <p class="mb-0 mt-2 gradient_txt fw_700">Global Audience Reach</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="counter_clm">
                        <div class="counterWrap d-flex gap-1 justify-content-center light">
                            <h2 class="heading50px fw_700 m-0 counter-value" data-count="100">0</h2>
                            <h2 class="heading50px fw_700 m-0 span-clr"></h2>
                            <h2 class="heading50px fw_700 m-0 span-clr">%</h2>
                        </div>
                        <p class="mb-0 mt-2 gradient_txt fw_700">Global Audience Reach</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="events">
	<div class="container">
		<h2 class=" heading65px monte_carlo fw_400">Events And News</h2>
		<div class="row mt-4 mt-lg-5">
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="position-relative img_wrap">
					<img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/1.jpg" class="event_img w-100" width="" height="" alt=""/>
					<span class="eve_date">10 March 2024</span>
				</div>
                <div class="entry-meta mt-2">
                        <ul class="list-inline font-11 mb-10">
                          <li><em><i class="fa fa-user text-gray mr-5"></i>By: Author / </em></li>
                          <li><em><i class="fa fa-calendar mr-5"></i> June 26, 2016 / </em></li>
                          <li><em><i class="fa fa-comment-o mr-5"></i>Comments: 45 </em></li>
                        </ul>
                      </div>
				<h1 class="heading30px my-2 text-center">Lorem Ipsum</h1>
				<p class="heading18px text-center">Lorem Ipsum is text of the printing</p>
				<a href="#" class="border_btn mt-2">Learn More</a>
			</div>
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="position-relative img_wrap">
					<img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" class="event_img w-100" width="" height="" alt=""/>
					<span class="eve_date">10 March 2024</span>
				</div>
                <div class="entry-meta mt-2">
                        <ul class="list-inline font-11 mb-10">
                          <li><em><i class="fa fa-user text-gray mr-5"></i>By: Author / </em></li>
                          <li><em><i class="fa fa-calendar mr-5"></i> June 26, 2016 / </em></li>
                          <li><em><i class="fa fa-comment-o mr-5"></i>Comments: 45 </em></li>
                        </ul>
                      </div>
                      <h1 class="heading30px my-2 text-center">Lorem Ipsum</h1>
				<p class="heading18px text-center">Lorem Ipsum is text of the printing</p> 
				<a href="#" class="border_btn mt-2">Learn More</a>
			</div>
			<div class="col-lg-4">
				<div class="position-relative img_wrap">
					<img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/3.jpg" class="event_img w-100" width="" height="" alt=""/>
					<span class="eve_date">10 March 2024</span>
				</div>
                <div class="entry-meta mt-2">
                        <ul class="list-inline font-11 mb-10">
                          <li><em><i class="fa fa-user text-gray mr-5"></i>By: Author / </em></li>
                          <li><em><i class="fa fa-calendar mr-5"></i> June 26, 2016 / </em></li>
                          <li><em><i class="fa fa-comment-o mr-5"></i>Comments: 45 </em></li>
                        </ul>
                      </div>
				<h1 class="heading30px my-2 text-center">Lorem Ipsum</h1>
				<p class="heading18px text-center">Lorem Ipsum is text of the printing</p>
				<a href="#" class="border_btn mt-2">Learn More</a>
			</div>
		</div>
	</div>
</section>
@endsection