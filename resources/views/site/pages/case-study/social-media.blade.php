@extends('layouts.site.master')@section('page-title', 'Social media  Packages')
@section('page-style', 'case-study/case-study.min.css')

@section('content')
    <!-- Intro Section -->
    <section class="intro-section">
        <div class="section-bg">
            <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png"
                 alt="A young diverse team of digital experts">
            <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/social-media.png"
                 alt="A young diverse team of digital experts">
        </div>

        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-8 col-12">
                        <div class="breadcrumb-block">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Our Services</li>
                                <li>Social media Packages</li>
                            </ul>
                        </div>
                        <div class="title-heading">Social media Packages</div>
                        <div class="section-text">
                            Your customers are using Social Media EVERY DAY
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="single-case-study gradient-page">
        <div class="container">
            <div class="share-section">SHARE ON:
                <a target="_blank" href="#">
                    <svg width="15" height="15" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.38755 32H0.545698V10.6354H7.38755V32ZM3.9625 7.72114C1.77499 7.72114 0 5.96343 0 3.84229C0 2.82325 0.417476 1.84595 1.16059 1.12538C1.9037 0.404811 2.91158 0 3.9625 0C5.01342 0 6.0213 0.404811 6.76441 1.12538C7.50752 1.84595 7.925 2.82325 7.925 3.84229C7.925 5.96343 6.15001 7.72114 3.9625 7.72114ZM32.9941 32H26.1676V21.6C26.1676 19.1211 26.1157 15.9429 22.6105 15.9429C19.0535 15.9429 18.5078 18.6354 18.5078 21.4217V32H11.673V10.6354H18.2343V13.5497H18.3298C19.2432 11.8709 21.4743 10.0994 24.8027 10.0994C31.7271 10.0994 33 14.5211 33 20.264V32H32.9941Z"
                            fill="#0A66C2"/>
                    </svg>

                </a>
                <a target="_blank" href="#">
                    <svg width="15" height="15" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M32.9371 3.21548C31.702 3.76206 30.3938 4.12303 29.0544 4.28683C30.4663 3.4338 31.5232 2.09466 32.0296 0.517393C30.6942 1.29703 29.2408 1.85079 27.7272 2.15659C26.7094 1.06185 25.3612 0.33585 23.8916 0.0912404C22.4221 -0.153369 20.9134 0.0970845 19.5997 0.803744C18.286 1.5104 17.2407 2.63376 16.626 3.99953C16.0113 5.36529 15.8615 6.89711 16.1999 8.35732C10.5765 8.0926 5.59144 5.37271 2.25741 1.26381C1.65049 2.30285 1.33307 3.48739 1.33856 4.69274C1.33774 5.81325 1.61179 6.91663 2.13638 7.9049C2.66097 8.89317 3.41987 9.73574 4.34569 10.3578C3.2728 10.3251 2.22328 10.0343 1.28494 9.50964V9.59166C1.28461 11.1644 1.8245 12.689 2.8131 13.9068C3.8017 15.1247 5.1782 15.9611 6.70931 16.2741C6.12933 16.4301 5.53176 16.51 4.93144 16.5118C4.49728 16.5118 4.08272 16.4692 3.66919 16.3924C4.10492 17.7458 4.94898 18.9289 6.08387 19.7768C7.21876 20.6247 8.58802 21.0953 10.0011 21.1232C7.60692 23.0106 4.65278 24.0345 1.61184 24.031C1.07323 24.0331 0.534973 24.0026 0 23.9396C3.10209 25.9405 6.70969 27.0028 10.394 27C22.8381 27 29.6381 16.6239 29.6381 7.6379C29.6381 7.35138 29.6381 7.05967 29.6165 6.76691C30.9467 5.80721 32.093 4.61275 33 3.24144L32.9371 3.21548Z"
                            fill="#55ACEE"/>
                    </svg>


                </a>
                <a target="_blank" href="#">
                    <svg width="15" height="15" viewBox="0 0 17 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.886 17.999L16.7679 12.208H11.2556V8.45C11.2556 6.866 12.0254 5.321 14.4943 5.321H17V0.391C17 0.391 14.7265 0 12.5521 0C8.01295 0 5.04604 2.774 5.04604 7.795V12.209H0V18H5.04604V32H11.2556V18L15.886 17.999Z"
                            fill="#3B5998"/>
                    </svg>
                </a>
            </div>

            <p class="describePackage">Connect with a more and more targeted audience to let them know about your
                products and services.</p>

            <div class="packages">
                <div class="case-study-package-item">
                    <p class="package-name">Bronze</p>
                    <p class="package-price">
                        <span>£</span>
                        900
                    </p>
                    <ul class="features" id="features-1">
                        <li>Page analysis</li>
                        <li>Specialized biography</li>
                        <li>Page theme design</li>
                        <li>Highlight cover edit</li>
                        <li>Highlights edit</li>
                        <li>10 Posts per month</li>
                        <li>10 Stories per month</li>
                        <li>Occasional post and story</li>
                        <li>Basic Tailored hashtagging</li>
                        <li>Engaging caption</li>
                    </ul>
                    {{--                    <div class="overlay" id="overlay-1">--}}
                    {{--                        more--}}
                    {{--                    </div>--}}
                    <a href="#" class="choose-btn">Choose plan</a>
                </div>

                <div class="case-study-package-item">
                    <p class="package-name">Silver</p>
                    <p class="package-price">
                        <span>£</span>
                        1600
                    </p>
                    <ul class="features" id="features-2">
                        <li>Page analysis</li>
                        <li>Competitor analysis</li>
                        <li>Specialized biography</li>
                        <li>Page theme design</li>
                        <li>Highlight cover design</li>
                        <li>Highlights design</li>
                        <li>Post/story content creation</li>
                        <li>12 Posts per month</li>
                        <li>12 Stories per month</li>
                        <li>Occasional post and story</li>
                        <li>Basic Tailored hashtagging</li>
                        <li>Engaging caption</li>
                        <li>Dedicated admin (direct and comment response)</li>
                        <li>2 video edits</li>
                    </ul>
                    <div class="overlay" id="overlay-2">
                        more
                    </div>
                    <a href="#" class="choose-btn">Choose plan</a>
                </div>

                <div class="case-study-package-item">
                    <p class="package-name">Gold</p>
                    <p class="package-price">
                        <span>£</span>
                        2500
                    </p>
                    <ul class="features" id="features-3">
                        <li>Page analysis</li>
                        <li>Competitor analysis</li>
                        <li>Research, strategy plan</li>
                        <li>Specialized biography</li>
                        <li>Page theme design</li>
                        <li>Highlight cover design</li>
                        <li>Highlights design</li>
                        <li>Post/story content creation</li>
                        <li>15 Posts per month</li>
                        <li>20 Stories per month</li>
                        <li>Occasional post and story</li>
                        <li>Industry-related hashtagging</li>
                        <li>Dedicated admin (direct and comment response)</li>
                        <li>2 video edits</li>
                        <li>Logomotion design</li>
                        <li>Teaser creation</li>
                        <li>Design and implementation of a sales campaign</li>
                        <li>Video Advertising Campaign Design</li>
                    </ul>
                    <div class="overlay" id="overlay-3">
                        more
                    </div>
                    <a href="#" class="choose-btn">Choose plan</a>
                </div>
            </div>
            <div class="packages packages-w-100">

                <div class="case-study-package-item">
                    <p class="package-name">Platinum</p>
                    <p class="package-price">
                        <span>£</span>
                        2500
                    </p>
                    <div class="feature-grand-container">
                        <div class="feature-container">
                            <p>Instagram</p>
                            <ul class="features" id="features-4">
                                <li>Page analysis</li>
                                <li>Competitor analysis</li>
                                <li>Research, strategy plan</li>
                                <li>Specialized biography</li>
                                <li>Page theme design</li>
                                <li>Highlight cover design</li>
                                <li>Highlights design</li>
                                <li>Post/story content creation</li>
                                <li>15 posts graphic design per month</li>
                                <li>15 Story graphic design per month</li>
                                <li>Occasional post and story</li>
                                <li>Industry-related hashtagging</li>
                                <li>Engaging caption</li>
                                <li>Dedicated admin (direct and comment response)</li>
                                <li>2 video edits</li>
                                <li>Logomotion design</li>
                                <li>Teaser creation</li>
                                <li>Design and implementation of the sales campaign</li>
                                <li>Video Advertising Campaign Design</li>
                            </ul>
                            <div class="overlay" id="overlay-4">
                                more
                            </div>
                        </div>
                        <div class="feature-container">
                            <p>Facebook</p>
                            <ul class="features" id="features-5">
                                <li>Page analysis</li>
                                <li>Competitor analysis</li>
                                <li>Research, strategy plan</li>
                                <li>10 posts creation</li>
                                <li>Industry Related Hashtags use</li>
                                <li>1 Ad Setup & Monitoring + budget</li>
                                <li>Campaign management</li>
                            </ul>
                            {{--                            <div class="overlay" id="overlay-5">--}}
                            {{--                                more--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="feature-container">
                            <p>Linkedin</p>
                            <ul class="features" id="features-6">
                                <li>Page analysis</li>
                                <li>Competitor analysis</li>
                                <li>Research, strategy plan</li>
                                <li>Specialized biography</li>
                                <li>10 posts creation</li>
                                <li>Engaging captions</li>
                                <li>Industry Related Hashtags use</li>
                            </ul>
                            {{--                            <div class="overlay" id="overlay-6">--}}
                            {{--                                more--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <a href="#" class="choose-btn">Choose plan</a>
                </div>
            </div>

            <div class="text-section">
                <p>

                    Your customers are using Social Media EVERY DAY, why aren’t you?
                </p>
                <p>
                    Through social media platforms such as Facebook and Instagram, you can connect with a more and more
                    targeted audience to let them know about your products and services.
                </p>
                <p>
                    Regardless of your industry, your customers are using social media every single day. That’s why It
                    should be one of the most crucial components of your digital marketing strategy. Great marketing on
                    social media can bring remarkable success to your business by driving a huge number of leads and
                    sales. Our team monitors your social assets daily. These assets include posts and ads developed as a
                    part of your strategy.
                </p>
                <p>
                    Search engines like Google and Bing are increasingly indexing and ranking information from social
                    networks. The more presence you have on social media sites, the higher your ratings become in online
                    search results. This makes it increasingly important that you present yourself in a positive light.
                </p>
                <p>
                    Instagram is the most popular social media network today. It is a particular hit with Gen Z and
                    millennials, so this platform is ideal for you if they're in your target demographic. Our experts
                    can craft a nuanced campaign that appeals to the IG audience and helps you become prominent on this
                    platform.
                </p>
            </div>
            <img src="{{ asset('assets/site/images/base') }}/case-study-3.jpg" style="width:100%"/>
            @include('layouts.site.sections.case-study-contact')
            @include('layouts.site.sections.review-client')


        </div>
    </section>


@endsection

@section('footer-section')
    <script>
        $('#overlay-1').on('click', function () {
            $('#features-1').toggleClass('fullHeight')
        })
        $('#overlay-2').on('click', function () {
            $('#features-2').toggleClass('fullHeight')
        })
        $('#overlay-3').on('click', function () {
            $('#features-3').toggleClass('fullHeight')
        })
        $('#overlay-4').on('click', function () {
            $('#features-4').toggleClass('fullHeight')
        })
        $('#overlay-5').on('click', function () {
            $('#features-5').toggleClass('fullHeight')
        })
        $('#overlay-6').on('click', function () {
            $('#features-6').toggleClass('fullHeight')
        })
    </script>
@endsection
