@extends('layouts.site.master')@section('page-title', 'Seo')
@section('page-style', 'case-study/case-study.min.css')

@section('content')
    <!-- Intro Section -->
    <section class="intro-section">
        <div class="section-bg">
            <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png"
                 alt="A young diverse team of digital experts">
            <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/seo.jpg"
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
                                <li>Seo</li>
                            </ul>
                        </div>
                        <div class="title-heading">SEO Packages</div>
                        <div class="section-text">
                            Want to outshine your competition? Search engine optimization (SEO) packages are the answer.

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

            <p class="describePackage">Our SEO packages contain a range of features designed to bolster the performance
                of your website on major search engines.</p>

            <div class="packages">
                <div class="case-study-package-item">
                    <p class="package-name">Bronze</p>
                    <p class="package-price">
                        <span>??</span>
                        1200
                    </p>
                    <ul class="features" id="features-1">
                        <li>Website traffic boost</li>
                        <li>Website load speed</li>
                        <li>Inner website error correction</li>
                        <li>Website plugins</li>
                        <li>Sitemap</li>
                        <li>Website redirect and errors correction</li>
                        <li>Google console config</li>
                        <li>Title, description optimization</li>
                        <li>Page optimization</li>
                        <li>Content optimization and keyword density</li>
                        <li>Image alt optimization</li>
                        <li>H1-H6 optimization</li>
                        <li>Anchor text optimization</li>
                        <li>Writing 5 blogs</li>
                    </ul>
                    <div class="overlay" id="overlay-1">
                        more
                    </div>
                    <a href="#" class="choose-btn">Choose plan</a>
                </div>

                <div class="case-study-package-item">
                    <p class="package-name">Silver</p>
                    <p class="package-price">
                        <span>??</span>
                        1500
                    </p>
                    <ul class="features" id="features-2">
                        <li>Alexa rank</li>
                        <li>SERP rank</li>
                        <li>Website traffic boost</li>
                        <li>Backlink building</li>
                        <li>Website redirect and errors correction</li>
                        <li>Title, description optimization</li>
                        <li>Page optimization</li>
                        <li>Anchor text optimization</li>
                        <li>Writing 5 reportages</li>
                        <li>Keyword search</li>
                        <li>Keyword optimization(3)</li>
                        <li>Image alt optimization</li>
                    </ul>
                    <div class="overlay" id="overlay-2">
                        more
                    </div>
                    <a href="#" class="choose-btn">Choose plan</a>
                </div>

                <div class="case-study-package-item">
                    <p class="package-name">Gold</p>
                    <p class="package-price">
                        <span>??</span>
                        2400
                    </p>
                    <ul class="features" id="features-3">
                        <li>Alexa rank</li>
                        <li>SERP rank</li>
                        <li>Website traffic boost</li>
                        <li>Website load speed</li>
                        <li>Backlink building</li>
                        <li>Inner website error correction</li>
                        <li>Website plugins</li>
                        <li>Sitemap</li>
                        <li>Website redirect and errors correction</li>
                        <li>Google console config</li>
                        <li>Title, description optimization</li>
                        <li>Page optimization</li>
                        <li>Content optimization and keyword density</li>
                        <li>Image alt optimization</li>
                        <li>H1-H6 optimization</li>
                        <li>Anchor text optimization</li>
                        <li>Writing 5 blogs</li>
                        <li>Writing 5 reportages</li>
                        <li>Keyword search</li>
                        <li>Keyword optimization(3)</li>
                    </ul>
                    <div class="overlay" id="overlay-3">
                        more
                    </div>
                    <a href="#" class="choose-btn">Choose plan</a>
                </div>
            </div>
            <div class="text-section">
                <p>
                    As we all may know, Google owns a significantly larger portion of the search market. Therefore It???s
                    important to impress Google, appealing to the algorithms of this search engine monolith.
                    Understanding
                    SEO is critical to this aim ??? and investing in an SEO package can make all the difference to a
                    business.
                    What SEO packages will do is bolster your chances of success.
                </p>
                <p>
                    Being highly visible as a trusted resource by Google and other search engines will always work in a
                    brand???s favor. Quality SEO and a high-quality website take brands there.
                </p>
                <p>
                    SEO is made up of multiple elements, and knowing what they are and how they work is key to
                    understanding
                    why SEO is so important. In short, SEO is crucial because it makes your website more visible, and
                    that
                    means more traffic and more opportunities to convert prospects into customers. It is the most viable
                    and
                    cost-effective way to both understand and reach customers in key moments that matter.
                </p>
                <p>
                    Despite the acronym, SEO is as much about people as it is about search engines themselves. It???s
                    about
                    understanding what people are searching for online, the answers they are seeking, the words they???re
                    using, and the type of content they wish to consume. Knowing the answers to these questions will
                    allow
                    you to connect to the people who are searching online for the solutions you offer.
                </p>
            </div>
            <img src="{{ asset('assets/site/images/base') }}/case-study-seo.jpg" style="width:100%"/>
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
    </script>
@endsection
