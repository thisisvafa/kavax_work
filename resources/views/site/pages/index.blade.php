@extends('layouts.site.master')@section('page-title', 'A Full-Service Digital Marketing Agency | London')
@section('page-style-temp', 'index/index.min.css')

@section('seo-meta')
<meta name="description" content="A creative web design and branding agency based in London">
<meta name="keywords" content="Kavax, kavax, home">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax - Home | A creative web design and branding agency based in London" />
<meta property="og:description" content="A creative web design and branding agency based in London" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax - Home | A creative web design and branding agency based in London" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/share.jpg') }}" />
@endsection
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
<style>
    .service-name:hover {
        opacity: 1;
    }

    .services-section .service-list .item-inner:hover .service-name {
        opacity: 1;
    }

    .text-warning {
        color: #e29826 !important;
    }

    .about-section .about-us-text {
        line-height: 40px !important;
    }

    .services-section .service-list .item-website-development:active .service-image .static-img {
        animation: spriteWebsiteDevelopment 2.2s steps(5) infinite;
    }

    .services-section .service-list .item-inner {
        margin-bottom: 0px;
        ;
    }

    .services-section .service-list .item-app-development .service-image .static-img {
        width: 230px !important;
    }

    .intro-section .video-play-button {
        position: absolute;
        top: 42%;
        left: 46%;
        width: 8%;
        z-index: 9;
        padding-top: 5%;
    }

    @media (max-width: 500px) {
        .intro-section .video-play-button {
            position: absolute;
            top: 36%;
            left: 45.3%;
            width: 10%;
        }
    }

    .services-section .service-list .item-inner {
        display: block;

    }

    .intro-text {
        position: absolute;
        top: 32%;
        left: 37%;
        font-size: 2.8vw;
        font-weight: 800;
        /* line-height: ; */
        text-align: center;
        z-index: 9;
        font-family: 'Playfair Display', serif;
    }

    @media (max-width: 540px) {
        .intro-section {
            margin-bottom: 80px !important;
        }
    }

    .section-heading {
        margin-bottom: 0px !important;
    }

    @media (max-width: 500px) {
        .intro-text {
            top: 30%;
            left: 37%;
            font-size: 2.8vw;
            font-weight: 800;
            /* line-height: ; */
            text-align: center;
            font-family: 'Playfair Display', serif;
        }
    }

    /* $base: ; */

    .down-arrow {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
    }

    .chevron {
        position: absolute;
        width: 2.1rem;
        height: 0.48rem;
        opacity: 0;
        transform: scale(0.3);
        animation: move-chevron 3s ease-out infinite;
    }

    .chevron:first-child {
        animation: move-chevron 3s ease-out 1s infinite;
    }

    .chevron:nth-child(2) {
        animation: move-chevron 3s ease-out 2s infinite;
    }

    .chevron:before,
    .chevron:after {
        content: '';
        position: absolute;
        top: 0;
        height: 100%;
        width: 50%;
        background: #2c3e50;
    }

    .chevron:before {
        left: 0;
        transform: skewY(30deg);
    }

    .chevron:after {
        right: 0;
        width: 50%;
        transform: skewY(-30deg);
    }

    @keyframes move-chevron {
        25% {
            opacity: 1;
        }

        33.3% {
            opacity: 1;
            transform: translateY(2.28);
        }

        66.6% {
            opacity: 1;
            transform: translateY(0.6 * 5.2);
        }

        100% {
            opacity: 0;
            transform: translateY(0.6 * 8) scale(0.5);
        }
    }
</style>
<!-- Intro Section -->
<section class="intro-section">

    <div class="intro-text">
        Let’s Fuel your ideas <br />
        and Skyrocket them
    </div>

    <div class="video-play-button" onclick="toggle()">
        <img width="100%" src="{{ asset('assets/site/images/base/intro/switchOn.svg') }}" class="off" />
        <img width="100%" src="{{ asset('assets/site/images/base/intro/switchOff.svg') }}" class="on" />

    </div>
    <div class="cover show-video" {{--             onclick="playVideo()"--}}>
        <img width="100%" src="{{ asset('assets/site/images/base/intro/darkN.jpg') }}" onload="imageLoaded()" />
        {{-- <video autoplay muted loop width="100%">--}}
        {{-- <source src="{{ asset('assets/site/video/cover.mov') }}" type="video/mp4">--}}
        {{-- </video>--}}

    </div>
    <div class="video-play">
        <img width="100%" src="{{ asset('assets/site/images/base/intro/lightN.jpg') }}" />

        {{-- <video muted width="100%" id="myVideo">--}}
        {{-- <source src="{{ asset('assets/site/video/play.mov') }}" type="video/mp4">--}}
        {{-- </video>--}}
    </div>
    <!-- <div class="down-arrow">
        <div class="chevron"></div>
        <div class="chevron"></div>
        <div class="chevron"></div>
    </div> -->
</section>

<!-- Services Section -->
<section class="services-section center">
    <div class="container">
        <div class="section-heading">KAVAX SERVICES</div>
        <div class="row align-items-end justify-content-center service-list">

            <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                <a href="/services/app-development" class="item-inner item-app-development">
                    <span class="service-image">
                        <span class="static-img" style="margin-left:60px;background-image: url('{{ asset('/assets/site/images/base/services/new/app-development1.png') }}');">
                        </span>
                    </span> <span class="service-name">App Development</span> </a>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                <a href="/services/website-design-and-developing" class="item-inner item-website-development">
                    <span class="service-image">
                        <span class="static-img" style="background-image: url('{{ asset('/assets/site/images/base/services/new/website-development1.png') }}');">
                        </span>

                    </span> <span class="service-name">Website Development</span> </a>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                <a href="/services/video-marketing" class="item-inner item-video-marketing">
                    <span class="service-image">
                        <span class="static-img" style="background-image: url('{{ asset('/assets/site/images/base/services/new/video-marketing1.png') }}');">
                        </span>

                    </span> <span class="service-name">Video Marketing</span> </a>
            </div>
            <div class="col-md-6 col-lg-4 offset-lg-1 col-sm-6 col-12">
                <a href="/services/content-and-seo" class="item-inner item-content">
                    <span class="service-image">
                        <span class="static-img" style="background-image: url('{{ asset('/assets/site/images/base/services/new/content1.png') }}');">
                        </span>

                    </span> <span class="service-name">Content</span> </a>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-6 col-12">
                <a href="services/digital-marketing" class="item-inner item-digital-marketing">
                    <span class="service-image">
                        <span class="static-img" style="background-image: url('{{ asset('/assets/site/images/base/services/new/digital-marketing1.png') }}');">
                        </span>
                    </span> <span class="service-name">Digital Marketing</span> </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-galaxy-bg about-section mt-5">
    <div class="section-heading center">ABOUT KAVAX</div>

    <div class="section-inner mt-5 pt-4">
        <div class="container">
            <div class="section-title center">A Full-Service Digital Media Agency Based in London and Toronto
            </div>


        </div>
    </div>
</section>
@include('layouts.site.sections.frame-slider')
@endsection
@section('footer-section')
@include('layouts.site.sections.portfolio')
@include('layouts.site.schedule.schedule')
@include('layouts.site.sections.recent-posts')
@include('layouts.site.sections.review-client')
@endsection


@section('footer-lib')

<!-- Video Controller -->
<script>
    document.addEventListener("touchstart", function() {}, true);
    var interval;
    let counter = 1;

    $('.off').hide();
    $('.intro-text').hide();
    $(document).ready(() => {
        doAuto();

    })

    window.addEventListener("load", event => {
        var image = document.querySelector('.cover img');
        var isLoaded = image.complete && image.naturalHeight !== 0;
        if (isLoaded) {
            imageLoaded()
        }
    });

    function imageLoaded() {

        $('.video-play-button').addClass('video-play-button-visible');
        $('.intro-text').show();
    }

    function toggle() {
        // alert(val)
        if ($('.on').is(":visible")) {
            lightOn()
        } else {
            lightOff()
        }
        clearInterval(interval)
        interval = setInterval(toggle, 4000)

    }

    function lightOn() {

        $('.on').hide();
        $('.off').show()

        $('.intro-section .cover').removeClass('show-video');
        $('.intro-section .video-play').addClass('show-video');
    }

    function lightOff() {

        $('.off').hide();
        $('.on').show()

        $('.intro-section .cover').addClass('show-video');
        $('.intro-section .video-play').removeClass('show-video');
    }

    function doAuto() {
        interval = setInterval(toggle, 4000)



    }

    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)

        );
    }


    if (detectDevice() == 'mobile') {
        document.addEventListener('scroll', function() {

            if (isInViewport(document.querySelector('.item-website-development .static-img'))) {
                $(".item-website-development .service-image .static-img").css("animation", "spriteWebsiteDevelopment 2.2s steps(5) infinite");
                $(".item-website-development .service-name ").css("opacity", 1);
                $(".item-website-development .service-name ").css("color", "#e29826");
            } else {
                $(".item-website-development .service-image .static-img").css("animation", "none");
                $(".item-website-development .service-name ").css("opacity", 0.1);
                $(".item-website-development .service-name ").css("color", "#fff");

            }
            if (isInViewport(document.querySelector('.item-app-development .static-img'))) {
                console.log('appdf sodfpso')
                $(".item-app-development .service-image .static-img").css("animation", "spriteAppDevelopment 2s steps(4) infinite");
                $(".item-app-development .service-name ").css("opacity", 1);
                $(".item-app-development .service-name ").css("color", "#e29826");
            } else {
                $(".item-app-development .service-image .static-img").css("animation", "none");
                $(".item-app-development .service-name ").css("opacity", 0.1);
                $(".item-app-development .service-name ").css("color", "#fff");

            }
            if (isInViewport(document.querySelector('.item-video-marketing .static-img'))) {
                $(".item-video-marketing .service-image .static-img").css("animation", " spriteVideoMarketing 2s steps(4) infinite");
                $(".item-video-marketing .service-name ").css("opacity", 1);
                $(".item-video-marketing .service-name ").css("color", "#e29826");
            } else {
                $(".item-video-marketing .service-image .static-img").css("animation", "none");
                $(".item-video-marketing .service-name ").css("opacity", 0.1);
                $(".item-video-marketing .service-name ").css("color", "#fff");

            }
            if (isInViewport(document.querySelector('.item-digital-marketing .static-img'))) {
                $(".item-digital-marketing .service-image .static-img").css("animation", "spriteDigitalMarketing 3s steps(9) infinite");
                $(".item-digital-marketing .service-name ").css("opacity", 1);
                $(".item-digital-marketing .service-name ").css("color", "#e29826");
            } else {
                $(".item-digital-marketing .service-image .static-img").css("animation", "none");
                $(".item-digital-marketing .service-name ").css("opacity", 0.1);
                $(".item-digital-marketing .service-name ").css("color", "#fff");

            }
            if (isInViewport(document.querySelector('.item-content .static-img'))) {

                $(".item-content .service-image .static-img").css("animation", " spriteContent 3s steps(6) infinite");
                $(".item-content .service-name ").css("opacity", 1);
                $(".item-content .service-name ").css("color", "#e29826");
            } else {
                $(".item-content .service-image .static-img").css("animation", "none");
                $(".item-content .service-name ").css("opacity", 0.1);
                $(".item-content .service-name ").css("color", "#fff");

            }
        }, {
            passive: true
        });
    }

    function detectDevice() {

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            return 'mobile';
        } else {
            return 'desktop';
        }
    }
</script>
@endsection