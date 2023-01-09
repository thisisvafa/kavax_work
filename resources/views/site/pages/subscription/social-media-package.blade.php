@extends('layouts.site.master')@section('page-title', 'Seo Packages')@section('page-style-temp',
'services/services.min.css')

@section('seo-meta')
<meta name="description" content="Kavax | Seo Subscription">
<meta name="keywords" content="Kavax, kavax, Seo Subscription">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax | Seo Subscription" />
<meta property="og:description" content="Kavax | Seo Subscription" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="Kavax | Seo Subscription" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/share.jpg') }}" />
@endsection

@section('content')
<style>
    ul.ulpackage {
        list-style: none;
    }

    .ulpackage li::before {
        content: "\2022";
        padding: 10px;
        color: #e29826;
        font-weight: bold;
        display: inline-block;
        width: 1em;
    }


    .services-section .services-include .services-list .item-inner .icon img {
        filter: none;
    }

    .textdiv {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 4.22px;
        margin-bottom: 55px;
    }

    .titledata1 {
        font-family: 'Lato';
        font-style: normal;
        font-weight: 700;
        font-size: 40px;
        line-height: 48px;
        color: #FFFFFF;
    }

    .textdata {
        color: white;
        font-weight: 500;
        position: relative;
        z-index: 1;
        margin-bottom: 65px;
        font-family: 'Lato';
        font-style: normal;
        font-size: 30px;
        line-height: 40px;
        font-family: 'Lato';
    }

    .textdata3 {
        color: #9CA09E;
        font-weight: 500;
        position: relative;
        z-index: 1;
        margin-bottom: 65px;
        font-family: 'Lato';
        font-style: normal;
        font-size: 30px;
        line-height: 40px;
        font-family: 'Lato';
    }

    .textdata2 {
        color: #D1D1D1;
        position: relative;
        z-index: 1;
        margin-bottom: 65px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 300;
        font-size: 25px;
        line-height: 36px;

    }

    .card-header {
        font-family: 'Lato';
        font-style: normal;
        font-weight: 700;
        font-size: 36px;
        line-height: 40px;
    }

    .card-header1 {
        font-family: 'Lato';
        font-style: normal;
        font-weight: 700;
        font-size: 28px;
        line-height: 40px;
        color: #D1D1D1;
        margin-bottom: 20px;
    }

    .pound {
        position: relative;
        bottom: -2px;
        right: -65px;
        color: #e29826;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 48px;
        line-height: 40px;
    }

    .pound1 {
        position: relative;
        bottom: -2px;
        text-align: right;
        padding-right: -20px;
        /* right: -50px; */
        color: #e29826;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 3vw;
        line-height: 40px;
    }


    @media (max-width: 576px) {
        .pound1 {
            right: -45px;
        }
    }

    .money {
        font-size: 3vw;
        color: #e29826;
    }

    .staticpound {
        position: relative;
        bottom: -2px;
        right: -520px;
        color: #e29826;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 48px;
        line-height: 40px;
    }

    .staticmoney {
        font-size: 50px;
        color: #e29826;
        position: relative;
        right: 65px;


    }

    .money1 {
        padding-left: 50px;
        font-size: 50px;
        color: #e29826;
    }

    .time {
        position: relative;
        bottom: -20px;
        left: -45px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 40px;
        color: #e29826;
    }

    .time1 {
        position: relative;
        bottom: -20px;
        left: -35px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 40px;
        color: #e29826;
    }

    .btn {
        border-color: e29826;
        color: #e29826;
        width: 80%;
        display: inline-block;
        border: 1px solid #636363;
        background-color: rgba(255, 255, 255, .02);
        padding: 7px 30px;
        transition: .3s;
        margin-bottom: 20px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 700;
        font-size: 22px;
        line-height: 26px;
        text-align: center;
    }

    .btn1 {
        border-color: e29826;
        color: #e29826;
        width: 25%;
        display: inline-block;
        border: 1px solid #636363;
        background-color: rgba(255, 255, 255, .02);
        padding: 7px 30px;
        transition: .3s;
        margin-bottom: 20px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 700;
        font-size: 22px;
        line-height: 26px;
        text-align: center;
    }

    .morebtn {
        border-color: white;
        color: white;
        width: 100%;
        display: block;
        padding: 7px 30px;
        transition: .3s;
        margin-bottom: 40px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 300;
        font-size: 20px;
        line-height: 36px;
        text-align: center;
        color: #D1D1D1;
    }

    .morebtn1 {
        border-color: white;
        color: white;
        width: 100%;
        display: block;
        padding: 7px 30px;
        transition: .3s;
        margin-bottom: 100px;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 300;
        font-size: 20px;
        line-height: 36px;
        text-align: center;
        color: #D1D1D1;
    }
</style>

<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="title">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/services-bg.png" alt="title">
    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-8 col-12">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="#">Home</a></li>
                            {{-- @if (isset($Services->parent_id)) --}}
                            <li><a href="#">Our Services</a>
                            </li>
                            {{-- @endif --}}
                            <li>About KavaX</li>
                        </ul>
                    </div>
                    <div class="titledata1">Social Media Packages</div>
                    <div style="font-family: 'Lato';
                                                                                            font-style: normal;
                                                                                            font-weight: 500;
                                                                                            font-size: 28px;
                                                                                            line-height: 40px;
                                                                                            color: #9CA09E;">Your customers
                        are
                        using
                        Social
                        Media
                        EVERY
                        DAY

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="heading base-color text-color text-uppercase textdiv">Share on :
                </div>
            </div>

            <div class="col-lg-4 textdiv">
                <a target="_blank" href="https://www.instagram.com/sharer.php?u="><span class="px-2 icon-linkedin"></span></a>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url="><span class="px-2 icon-twitter"></span></a>
                <a target="_blank" href="https://twitter.com/intent/tweet?text="><span class="px-2 icon-facebook"></span></a>
                <a target="_blank" href="http://www.facebook.com/sharer.php?u="><span class="fa fa-envelope"></span></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="textdata">Connect with a more and more targeted audience to let them know about your
                    products and services.
                </div>

            </div>
            <div class="row" style="margin-bottom: 100px;">

                <div class="col-lg-4">
                    <div class="card" style="border: #171717; height:100%">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Bronze
                            </div>
                            <div class="row">
                                <div class="col-3 offset-1  pound1">
                                    &#163;
                                </div>
                                <div class="col-4 money">
                                    900
                                </div>
                                <div class="col-4 time1">
                                    (monthly)
                                </div>
                            </div>
                            <div class="d-flex flex-column justify-content-between">
                                <ul class="ulpackage d-block" style="font-family: 'Lato';
                                                                                                font-style: normal;
                                                                                                font-weight: 300;
                                                                                                font-size: 18px;
                                                                                                line-height: 36px;
                                                                                                /* margin-bottom:80px; */
                                                                                                color: #D1D1D1;">
                                    <li>&emsp;Page analysis</li>
                                    <li>&emsp;Specialized biography</li>
                                    <li>&emsp;Page theme design</li>
                                    <li>&emsp;Highlight cover edit</li>
                                    <li>&emsp;Highlights edit</li>
                                    <li>&emsp;10 Posts per month</li>
                                    <li>&emsp;10 Stories per month</li>
                                    <li>&emsp;Occasional post and story</li>
                                    <li>&emsp;Basic Tailored hashtagging</li>
                                    <li>&emsp;Engaging caption</li>

                                </ul>

                                <div class="text-center" style="position: absolute;
                                                                                            bottom: 20px;
                                                                                            width: 100%;
                                                                                            padding-right: 30px;">
                                    <div class="btn">
                                        <a href="{{ url('services-request/8/Bronze') }}">Choose plan</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class=" col-lg-4">
                    <div class="card" style="border: #171717; ">
                        <div class="card-body" style="background: #171717;">
                            <div class=" text-center card-header">
                                Silver
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    1600
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                                    font-style: normal;
                                                                                    font-weight: 300;
                                                                                    font-size: 18px;
                                                                                    line-height: 36px;
                                                                                    color: #D1D1D1;">
                                <li>&emsp;Logo design</li>
                                <li>&emsp;Logomotion design</li>
                                <li>&emsp;Business card design</li>
                                <li>&emsp;Letterhead design</li>
                                <li>&emsp;Company visual identity design</li>
                                <li>&emsp;Catalogue design</li>
                                <li>&emsp;Rebranding</li>
                                <li>&emsp;Organisational colour palette</li>
                                <li>&emsp;Engaging caption</li>
                                <li>&emsp;Introductory teaser</li>
                            </ul>
                            <a id="more-silver" href="#" class="morebtn">More
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.10174 11.9836C7.90455 12.2867 7.46067 12.2867 7.26348 11.9836L0.560936 1.67934C0.344581 1.34672 0.583275 0.906704 0.980068 0.906705L14.3852 0.906706C14.7819 0.906706 15.0206 1.34672 14.8043 1.67934L8.10174 11.9836Z" fill="#C4C4C4" />
                                </svg>
                            </a>

                            <ul id="more-silver-on" class="ulpackage" style="font-family: 'Lato';
                                                                                font-style: normal;
                                                                                font-weight: 300;
                                                                                font-size: 18px;
                                                                                line-height: 36px;
                                                                                color: #D1D1D1;
                                                                                display: none;">
                                <li>&emsp;Package design (for product-based companies)</li>
                                <li>&emsp;Dedicated admin (direct and comment response)</li>
                                <li>&emsp;2 video edits</li>
                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/8/Silver') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card" style="border: #171717;">
                        <div class="card-body" style="background: #171717;">
                            <div class=" text-center card-header">
                                Gold
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    2500
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                                font-style: normal;
                                                                                font-weight: 300;
                                                                                font-size: 18px;
                                                                                line-height: 36px;
                                                                                color: #D1D1D1;">
                                <li>&emsp;Page analysis</li>
                                <li>&emsp;Competitor analysis</li>
                                <li>&emsp;Research, strategy plan</li>
                                <li>&emsp;Specialized biography</li>
                                <li>&emsp;Page theme design</li>
                                <li>&emsp;Highlight cover design</li>
                                <li>&emsp;Highlights design</li>
                                <li>&emsp;15 Posts per month</li>
                                <li>&emsp;20 Stories per month</li>
                                <li>&emsp;Occasional post and story</li>
                            </ul>
                            <a id="more-gold" href="#" class="morebtn">More
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.10174 11.9836C7.90455 12.2867 7.46067 12.2867 7.26348 11.9836L0.560936 1.67934C0.344581 1.34672 0.583275 0.906704 0.980068 0.906705L14.3852 0.906706C14.7819 0.906706 15.0206 1.34672 14.8043 1.67934L8.10174 11.9836Z" fill="#C4C4C4" />
                                </svg>
                            </a>

                            <ul id="more-gold-on" class="ulpackage" style="font-family: 'Lato';
                                                                                                                                            font-style: normal;
                                                                                                                                            font-weight: 300;
                                                                                                                                            font-size: 18px;
                                                                                                                                            line-height: 36px;
                                                                                                                                            color: #D1D1D1;
                                                                                                                                            display: none;">
                                <li>&emsp;Industry-related hashtagging</li>
                                <li>&emsp;Dedicated admin (direct and comment response)</li>
                                <li>&emsp;2 video edits</li>
                                <li>&emsp;Teaser creation</li>
                                <li>&emsp;Design and implementation of a sales campaign</li>
                                <li>&emsp;Video Advertising Campaign Design</li>
                            </ul>



                            <script>
                                var ul = document.getElementById("more-gold-on");
                                var btn = document.getElementById("more-gold");
                                btn.onclick = function() {
                                    ul.style.display = "block";
                                    btn.style.display = "none";
                                }
                            </script>
                            <script>
                                var ul1 = document.getElementById("more-silver-on");
                                var btn1 = document.getElementById("more-silver");
                                btn1.onclick = function() {
                                    ul1.style.display = "block";
                                    btn1.style.display = "none";
                                }
                            </script>

                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/8/Gold') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-bottom: 60px; margin-top:100px;">
                    <div class="card" style="border: #171717; ">
                        <div class="card-body" style="background: #171717;">
                            <div class=" text-center card-header">
                                Platinum
                            </div>
                            <div class="row" style="margin-bottom: 50px;">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    3900
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4">
                                    <ul class="ulpackage" style="font-family: 'Lato';
                                                                    font-style: normal;
                                                                    font-weight: 300;
                                                                    font-size: 18px;
                                                                    line-height: 36px;
                                                                    color: #D1D1D1;">
                                        <div class="card-header1" style="">
                                            Instagram
                                        </div>
                                        <li>&emsp;Page analysis</li>
                                        <li>&emsp;Competitor analysis</li>
                                        <li>&emsp;Research, strategy plan</li>
                                        <li>&emsp;Specialized biography</li>
                                        <li>&emsp;Page theme design</li>
                                        <li>&emsp;Highlight cover design</li>
                                        <li>&emsp;Highlights design</li>
                                        <li>&emsp;Post/story content creation</li>
                                        <li>&emsp;15 posts graphic design per month</li>
                                        <li>&emsp;15 Story graphic design per month</li>
                                    </ul>
                                    <a id="more-platinum" href="#" class="morebtn">More
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.10174 11.9836C7.90455 12.2867 7.46067 12.2867 7.26348 11.9836L0.560936 1.67934C0.344581 1.34672 0.583275 0.906704 0.980068 0.906705L14.3852 0.906706C14.7819 0.906706 15.0206 1.34672 14.8043 1.67934L8.10174 11.9836Z" fill="#C4C4C4" />
                                        </svg>
                                    </a>

                                    <ul id="more-platinum-on" class="ulpackage" style="font-family: 'Lato';
                                                                font-style: normal;
                                                                font-weight: 300;
                                                                font-size: 18px;
                                                                line-height: 36px;
                                                                color: #D1D1D1;
                                                                display: none;">
                                        <li>&emsp;Occasional post and story</li>
                                        <li>&emsp;Industry-related hashtagging</li>
                                        <li>&emsp;Engaging caption</li>
                                        <li>&emsp;Dedicated admin (direct and comment response)</li>
                                        <li>&emsp;2 video edits</li>
                                        <li>&emsp;Logomotion design</li>
                                        <li>&emsp;Teaser creation</li>
                                        <li>&emsp;Design and implementation of the sales campaign
                                        </li>
                                        <li>&emsp;Video Advertising Campaign Design</li>
                                    </ul>
                                </div>

                                <script>
                                    var ul4 = document.getElementById("more-platinum-on");
                                    var btn4 = document.getElementById("more-platinum");
                                    btn4.onclick = function() {
                                        ul4.style.display = "block";
                                        btn4.style.display = "none";
                                    }
                                </script>

                                <div class="col-lg-4">
                                    <ul class="ulpackage" style="font-family: 'Lato';
                                                                    font-style: normal;
                                                                    font-weight: 300;
                                                                    font-size: 18px;
                                                                    line-height: 36px;
                                                                    color: #D1D1D1;">
                                        <div class="card-header1" style="">
                                            Facebook
                                        </div>
                                        <li>&emsp;Page analysis</li>
                                        <li>&emsp;Competitor analysis</li>
                                        <li>&emsp;Research, strategy plan</li>
                                        <li>&emsp;10 posts creation</li>
                                        <li>&emsp;Industry Related Hashtags use</li>
                                        <li>&emsp;1 Ad Setup & Monitoring + budget</li>
                                        <li>&emsp;Campaign management</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="ulpackage" style="font-family: 'Lato';
                                                                    font-style: normal;
                                                                    font-weight: 300;
                                                                    font-size: 18px;
                                                                    line-height: 36px;
                                                                    color: #D1D1D1;">
                                        <div class="card-header1" style="">
                                            Linkedin
                                        </div>
                                        <li>&emsp;Page analysis</li>
                                        <li>&emsp;Competitor analysis</li>
                                        <li>&emsp;Research, strategy plan</li>
                                        <li>&emsp;Specialized biography</li>
                                        <li>&emsp;10 posts creation</li>
                                        <li>&emsp;Engaging captions</li>
                                        <li>&emsp;Industry Related Hashtags use</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="btn1">
                                    <a href="{{ url('services-request/8/Platinum') }}">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.site.schedule.packageSchedule')

        <div class="col-lg-12">
            <div class="textdata2">
                <p>Your customers are using Social Media EVERY DAY, why aren’t you?</p>

                <p>Through social media platforms such as Facebook and Instagram, you can connect
                    with a more and
                    more targeted audience to let them know about your products and services.</p>

                <p>Regardless of your industry, your customers are using social media every single
                    day. That’s why
                    It should be one of the most crucial components of your digital marketing
                    strategy. Great
                    marketing on social media can bring remarkable success to your business by
                    driving a huge number
                    of leads and sales. Our team monitors your social assets daily. These assets
                    include posts and
                    ads developed as a part of your strategy.</p>

                <p>Search engines like Google and Bing are increasingly indexing and ranking
                    information from
                    social networks. The more presence you have on social media sites, the higher
                    your ratings
                    become in online search results. This makes it increasingly important that you
                    present yourself
                    in a positive light.
                </p>

                <p>
                    Instagram is the most popular social media network today. It is a particular hit
                    with Gen Z and
                    millennials, so this platform is ideal for you if they're in your target
                    demographic. Our
                    experts can craft a nuanced campaign that appeals to the IG audience and helps
                    you become
                    prominent on this platform.
                </p>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="item-inner">
                <span class="thumbnail">
                    <img class="responsive-img" style="width:100%; margin-bottom:200px;" src="{{ asset('assets/site/images/base/subscription') }}/Rectangle 219 (2).png" alt="bg-image">
                </span>

            </div>
        </div>

        <div class="col-lg-12">
            <div style="font-family: 'Lato';
                                    font-style: normal;
                                    font-weight: 900;
                                    font-size: 30px;
                                    line-height: 36px;
                                    margin-bottom:45px;
                                    text-align: center;
                                    color: #E29826;">Explore Other Packages</div>
        </div>

        @include('site.pages.subscription.slider')

        <div class="col-lg-7">
            <div class="contact-us-form">
                <div style="font-family: 'Lato';
                                                                                        font-style: normal;
                                                                                        font-weight: 900;
                                                                                        font-size: 30px;
                                                                                        line-height: 36px;
                                                                                        margin-bottom:45px;
                                                                                        color: #E29826;">Let's get talking!
                </div>
                <div style="font-family: 'Lato';
                                                                                        font-style: normal;
                                                                                        font-weight: 300;
                                                                                        font-size: 25px;
                                                                                        line-height: 30px;
                                                                                        margin-bottom:65px;
                                                                                        color: #FFFFFF;">Our team would
                    love
                    the
                    opportunity to
                    discuss
                    your
                    challenge
                    over
                    a
                    quick email or call!
                </div>

                <div style="font-family: 'Lato';
                                                                                    font-style: normal;
                                                                                    font-weight: 400;
                                                                                    font-size: 25px;
                                                                                    line-height: 30px;
                                                                                    margin-bottom: 45px;
                                                                                    color: #FFFFFF;">Enter your details and
                    we'll
                    be in
                    touch!
                </div>

                <form style="margin-bottom: 65px;" action="{{ route('lets-talk') }}" method="POST">
                    @csrf
                    <div class="form-block">
                        <div class="row gy-4">
                            <div class="col-6">
                                <div class="field-block on-line-input text-field">
                                    <div class="row g-0">
                                        {!! Form::text('name', null, ['required', 'id' => 'name', 'class' => 'col-12 order-1']) !!}
                                        {!! Form::label('name', 'Name:', ['class' => 'col-12 order-0']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="field-block on-line-input text-field">
                                    <div class="row g-0">
                                        {!! Form::text('email', null, ['required', 'id' => 'email', 'class' => 'col-12 order-1']) !!}
                                        {!! Form::label('email', 'Email:', ['class' => 'col-12 order-0']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="field-block on-line-input text-field">
                                    <div class="row g-0">
                                        {!! Form::text('phone', null, ['required', 'id' => 'phone', 'class' => 'col-12 order-1']) !!}
                                        {!! Form::label('phone', 'phone number:', ['class' => 'col-12 order-0']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="field-block on-line-input text-field">
                                    <div class="row g-0">
                                        {!! Form::text('business_name', null, ['id' => 'business_name', 'class' => 'col-12 order-1']) !!}
                                        {!! Form::label('business_name', 'business name:', ['class' => 'col-12 order-0']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="field-block on-line-input text-field">
                                    <div class="row g-0">
                                        {!! Form::textarea('message', null, ['required', 'id' => 'message', 'class' => 'col-12 order-1']) !!}
                                        {!! Form::label('message', 'your message:', ['class' => 'col-12 order-0']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="field-block submit-form">
                                    <input type="submit" value="SEND message">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>

@include('layouts.site.sections.review-client')

@endsection