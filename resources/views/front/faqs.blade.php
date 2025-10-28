@extends('layouts.app') @section('content')
<section class="inner_page_banner aboutbanner">
    <div class="container text-center">
        <h1 class="heading80px monte_carlo fw_400">FAQs</h1>
    </div>
</section>
<section class="faqs_section service_section_one">
		<div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="heading44px fw_700">
                    Frequently Asked Questions 
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
        </div>
    </div>
    </section>
@endsection