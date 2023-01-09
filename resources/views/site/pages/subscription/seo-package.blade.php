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
        right: -100px;
        color: #e29826;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 4vw;
        line-height: 40px;
    }


    @media (max-width: 576px) {
        .pound1 {
            right: -45px;
        }
    }

    .money {
        font-size: 4vw;
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
                    <div class="titledata1">Seo Packages</div>
                    <div style="font-family: 'Lato';
                                font-style: normal;
                                font-weight: 500;
                                font-size: 28px;
                                line-height: 40px;
                                color: #9CA09E;">Want to outshine your competition? Search engine optimization (SEO)
                        packages are the answer.
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
                <div class="textdata">Our SEO packages contain a range of features designed to bolster the
                    performance of your website on major search engines.
                </div>

            </div>
            <div class="row" style="margin-bottom: 100px;">

                <div class="col-lg-4">
                    <div class="card" style="border: #171717;">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Bronze
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-4 money">
                                    1200
                                </div>
                                <div class="col-3 time">
                                    (monthly)
                                </div>
                            </div>

                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                            font-style: normal;
                                                                            font-weight: 300;
                                                                            font-size: 18px;
                                                                            line-height: 36px;
                                                                            color: #D1D1D1;">
                                <li>&emsp;Website traffic boost</li>
                                <li>&emsp;Website load speed</li>
                                <li>&emsp;Inner website error correction</li>
                                <li>&emsp;Website plugins</li>
                                <li>&emsp;Sitemap</li>
                                <li>&emsp;Website redirect and errors correction</li>
                                <li>&emsp;Google console config</li>
                                <li>&emsp;Title, description optimization</li>
                                <li>&emsp;Page optimization </li>
                                <li>&emsp;Image alt optimization</li>
                            </ul>
                            <a id="more-bronze" href="#" class="morebtn">More
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.10174 11.9836C7.90455 12.2867 7.46067 12.2867 7.26348 11.9836L0.560936 1.67934C0.344581 1.34672 0.583275 0.906704 0.980068 0.906705L14.3852 0.906706C14.7819 0.906706 15.0206 1.34672 14.8043 1.67934L8.10174 11.9836Z" fill="#C4C4C4" />
                                </svg>
                            </a>

                            <ul id="more-bronze-on" class="ulpackage" style="font-family: 'Lato';
                                                                                                    font-style: normal;
                                                                                                    font-weight: 300;
                                                                                                    font-size: 18px;
                                                                                                    line-height: 36px;
                                                                                                    color: #D1D1D1;
                                                                                                    display: none;">
                                <li>&emsp;Content optimization and keyword density</li>
                                <li>&emsp;H1-H6 optimization</li>
                                <li>&emsp;Anchor text optimization</li>
                                <li>&emsp;Writing 5 blogs</li>
                            </ul>

                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/9/Bronze') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card" style="border: #171717;">
                        <div class="card-body" style="background: #171717;">
                            <div class=" text-center card-header">
                                Silver
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    1500
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                font-style: normal;
                                                                font-weight: 300;
                                                                font-size: 18px;
                                                                line-height: 36px;
                                                                color: #D1D1D1;">
                                <li>&emsp;Alexa rank</li>
                                <li>&emsp;SERP rank</li>
                                <li>&emsp;Website traffic boost</li>
                                <li>&emsp;Backlink building</li>
                                <li>&emsp;Website redirect and errors correction</li>
                                <li>&emsp;Title, description optimization</li>
                                <li>&emsp;Page optimization</li>
                                <li>&emsp;Anchor text optimization</li>
                                <li>&emsp;Writing 5 reportages</li>
                                <li>&emsp;Keyword search</li>
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
                                <li>&emsp;Keyword optimization(3)</li>
                                <li>&emsp;Image alt optimization</li>

                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/9/Silver') }}">Choose plan</a>
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
                                    2400
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                font-style: normal;
                                                                font-weight: 300;
                                                                font-size: 18px;
                                                                line-height: 36px;
                                                                color: #D1D1D1;">
                                <li>&emsp;Alexa rank</li>
                                <li>&emsp;SERP rank</li>
                                <li>&emsp;Website traffic boost</li>
                                <li>&emsp;Website load speed</li>
                                <li>&emsp;Backlink building</li>
                                <li>&emsp;Inner website error correction</li>
                                <li>&emsp;Website plugins</li>
                                <li>&emsp;Sitemap</li>
                                <li>&emsp;Website redirect and errors correction</li>
                                <li>&emsp;Google console config</li>
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
                                <li>&emsp;Title, description optimization</li>
                                <li>&emsp;Content optimization and keyword density</li>
                                <li>&emsp;Image alt optimisation</li>
                                <li>&emsp;H1-H6 optimization</li>
                                <li>&emsp;Anchor text optimisation</li>
                                <li>&emsp;Writing 5 blogs</li>
                                <li>&emsp;Writing 5 reportages</li>
                                <li>&emsp;Keyword search</li>
                                <li>&emsp;Keyword optimisation</li>
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
                            <script>
                                var ul2 = document.getElementById("more-bronze-on");
                                var btn2 = document.getElementById("more-bronze");
                                btn2.onclick = function() {
                                    ul2.style.display = "block";
                                    btn2.style.display = "none";
                                }
                            </script>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/9/Gold') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            @include('layouts.site.schedule.packageSchedule')



            <div class="col-lg-12">
                <div class="textdata2">
                    <p>As we all may know, Google owns a significantly larger portion of the
                        search
                        market. Therefore It’s important to impress Google, appealing to the algorithms of this search
                        engine monolith. Understanding SEO is critical to this aim – and investing in an SEO package can
                        make all the difference to a business. What SEO packages will do is bolster your chances of
                        success.</p>

                    <p>Being highly visible as a trusted resource by Google and other search engines will always work
                        in a
                        brand’s favor. Quality SEO and a high-quality website take brands there.</p>

                    <p>SEO is made up of multiple elements, and knowing what they are and how they work is key to
                        understanding why SEO is so important. In short, SEO is crucial because it makes your website
                        more
                        visible, and that means more traffic and more opportunities to convert prospects into customers.
                        It
                        is the most viable and cost-effective way to both understand and reach customers in key moments
                        that
                        matter.</p>

                    <p>Despite the acronym, SEO is as much about people as it is about search engines themselves. It’s
                        about understanding what people are searching for online, the answers they are seeking, the
                        words
                        they’re using, and the type of content they wish to consume. Knowing the answers to these
                        questions
                        will allow you to connect to the people who are searching online for the solutions you offer.
                    </p>



                </div>
            </div>


            <div class="col-lg-12">
                <div class="item-inner">
                    <span class="thumbnail">
                        <img class="responsive-img" style="width:100%; margin-bottom:200px;" src="{{ asset('assets/site/images/base/subscription') }}/Rectangle 219.png" alt="bg-image">
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
                            color: #E29826;">Let's get talking!</div>
                    <div style="font-family: 'Lato';
                            font-style: normal;
                            font-weight: 300;
                            font-size: 25px;
                            line-height: 30px;
                            margin-bottom:65px;
                            color: #FFFFFF;">Our team would love the opportunity to discuss your challenge over a
                        quick email or call!
                    </div>

                    <div style="font-family: 'Lato';
                        font-style: normal;
                        font-weight: 400;
                        font-size: 25px;
                        line-height: 30px;
                        margin-bottom: 45px;
                        color: #FFFFFF;">Enter your details and we'll be in touch!
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