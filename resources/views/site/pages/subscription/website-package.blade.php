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

    ul.subul {
        list-style: none;
    }

    .subul li.subli::before {
        content: "\00BA";
        padding: 10px;
        color: #e29826;
        font-weight: bold;
        display: inline-block;
        width: 2em;
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

    .pound2 {
        position: relative;
        bottom: -2px;
        right: -220px;
        color: #e29826;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 48px;
        line-height: 40px;
    }

    .money2 {
        font-size: 50px;
        color: #e29826;
        position: relative;
        right: -50px;
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
                    <div class="titledata1">Website Packages</div>
                    <div style="font-family: 'Lato';
                                                                                font-style: normal;
                                                                                font-weight: 500;
                                                                                font-size: 28px;
                                                                                line-height: 40px;
                                                                                color: #9CA09E;">How much does it cost to
                        build
                        a website? It's a common question asked by clients.
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
                <div class="textdata">Every business website and budget is different, if you feel your business
                    doesn't fit into any of the packages below then contact us to discuss it in more detail and we can
                    create a bespoke package for you.


                </div>

            </div>
            <div class="row" style="margin-bottom: 100px;">

                <div class="col-lg-6">
                    <div class="card" style="border: #171717; height:100%">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Bronze
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    890
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
                                    <li>&emsp;Website Development (front and back)</li>
                                    <li>&emsp;Website UI & UX Design</li>
                                    <li>&emsp;Services list page</li>
                                    <ul class="subul">
                                        <li class="subli">Showing Services by category, services, subcategory
                                        </li>
                                    </ul>
                                    <li>&emsp;Admin Dashboard</li>
                                    <ul class="subul">
                                        <li class="subli">Access to change and edit text and photos

                                        </li>
                                        <li class="subli">Users and Admin list management
                                        </li>
                                    </ul>
                                </ul>

                                <div class="text-center" style="position: absolute;
                                                                                bottom: 20px;
                                                                                width: 100%;
                                                                                padding-right: 30px;">
                                    <div class="btn">
                                        <a href="{{ url('services-request/3/Bronze') }}">Choose plan</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="border: #171717;height:100%">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Silver
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    1150
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                                                                font-style: normal;
                                                                                                                font-weight: 300;
                                                                                                                font-size: 18px;
                                                                                                                line-height: 36px;
                                                                                                                color: #D1D1D1;">
                                <li>&emsp;Website Development (front and back)</li>
                                <li>&emsp;Website UI & UX Design</li>
                                <li>&emsp;Service list page</li>
                                <ul class="subul">
                                    <li class="subli">Showing Services by category, Services, subcategory</li>
                                </ul>
                                <li>&emsp;Services single page</li>
                                <li>&emsp;Admin Dashboard</li>
                                <ul class="subul">
                                    <li class="subli">Access to change and edit text and photos</li>
                                    <li class="subli">Users and Admin list management</li>
                                </ul>
                                <li>&emsp;Basic Content Writing</li>

                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/3/Silver') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-lg-6">
                    <div class="card" style="border: #171717;">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Gold
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    1450
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
                                    <li>&emsp;Website Development (front and back)</li>
                                    <li>&emsp;Website UI & UX Design</li>
                                    <li>&emsp;Service Archive:</li>
                                    <ul class="subul">
                                        <li class="subli">Showing Services by category, Services, subcategory
                                        </li>
                                        <li class="subli">Service sidebar: Including (search engine, Service
                                            categorisation,
                                            ustom filters based on price and other features of each Service)</li>
                                    </ul>
                                    <li>&emsp;Service List Page</li>
                                    <ul class="subul">
                                        <li class="subli">Showing Services by category, Services, subcategory
                                        </li>
                                    </ul>
                                    <li>&emsp;Basic Content Writing</li>
                                    <ul class="subul">
                                        <li class="subli">Website redirect and errors correction</li>
                                    </ul>
                                    <li>&emsp;Services single page :</li>
                                </ul>
                                <a id="more-gold" class="morebtn">More
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
                                    <li>&emsp;Gallery</li>
                                    <li>&emsp;A tab including further details ( text, image, video) - service
                                        features - showing service </li>
                                    <li>&emsp;Showing related Services</li>
                                    <li>&emsp;Ratings</li>
                                    <li>&emsp;SEO elements (tag list, category list)</li>
                                    <li>&emsp;Admin Dashboard</li>
                                    <ul class="subul">
                                        <li class="subli">Access to change and edit text and photos
                                        </li>
                                        <li class="subli">Users and Admin list management</li>
                                        <li class="subli">List of the number of the orders in different periods
                                        </li>
                                        <li class="subli">The capability to send automated emails to customers
                                            and admins + single click emails
                                        </li>
                                        <li class="subli">Discount codes</li>
                                        <li class="subli">Costumers reviews management </li>
                                    </ul>
                                    <li>&emsp;Client Dashboard</li>
                                    <ul class="subul">
                                        <li class="subli">View orders
                                        </li>
                                        <li class="subli">Account details</li>
                                        <li class="subli">Order service time booking</li>
                                        <li class="subli">Chatbot
                                        </li>
                                        <li class="subli">Rental period options</li>
                                    </ul>
                                </ul>

                                <div class="text-center">
                                    <div class="btn">
                                        <a href="{{ url('services-request/3/Gold') }}">Choose plan</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="border: #171717;">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Platinum
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    1905
                                </div>
                            </div>
                            <ul class="ulpackage d-block" style="font-family: 'Lato';
                                                                                    font-style: normal;
                                                                                    font-weight: 300;
                                                                                    font-size: 18px;
                                                                                    line-height: 36px;
                                                                                    /* margin-bottom:80px; */
                                                                                    color: #D1D1D1;">
                                <li>&emsp;Website Development (front and back)</li>
                                <li>&emsp;Website UI & UX Design</li>
                                <li>&emsp;Service Archive:</li>
                                <ul class="subul">
                                    <li class="subli">Showing Services by category, Services, subcategory
                                    </li>
                                    <li class="subli">Service sidebar: Including (search engine, Service
                                        categorisation,
                                        custom filters based on price and other features of each Service)</li>
                                </ul>
                                <li>&emsp;Service List Page</li>
                                <ul class="subul">
                                    <li class="subli">Showing Services by category, Services, subcategory
                                    </li>
                                </ul>
                                <li>&emsp;Advanced Content Writing</li>
                                <li>&emsp;Services single page :</li>
                                <li>&emsp;Gallery</li>
                            </ul>
                            <a id="more-platinum" class="morebtn">More
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
                                <li>&emsp;A tab including further details ( text, image, video) - service
                                    features - showing service </li>
                                <li>&emsp;Showing related Services</li>
                                <li>&emsp;Ratings</li>
                                <li>&emsp;SEO elements (tag list, category list)</li>
                                <li>&emsp;Website plugins (automation: emails, calculation, pictures)</li>
                                <li>&emsp;Admin Dashboard</li>
                                <ul class="subul">
                                    <li class="subli">Access to change and edit text and photos
                                    </li>
                                    <li class="subli">Users and Admin list management</li>
                                    <li class="subli">List of the number of the orders in different periods
                                    </li>
                                    <li class="subli">The capability to send automated emails to customers
                                        and admins + single click emails
                                    </li>
                                    <li class="subli">Discount codes</li>
                                    <li class="subli">Costumers reviews management </li>
                                </ul>
                                <li>&emsp;Client Dashboard</li>
                                <ul class="subul">
                                    <li class="subli">View rental/buy orders
                                    </li>
                                    <li class="subli">Account details</li>
                                    <li class="subli">Order delivery options</li>
                                    <li class="subli">Chatbot
                                    </li>
                                    <li class="subli">Rental period options</li>
                                </ul>
                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/3/Platinum') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            var ul = document.getElementById("more-gold-on");
            var btn = document.getElementById("more-gold");
            btn.onclick = function() {
                ul.style.display = "block";
                btn.style.display = "none";
            }
        </script>
        <script>
            var ul1 = document.getElementById("more-platinum-on");
            var btn1 = document.getElementById("more-platinum");
            btn1.onclick = function() {
                ul1.style.display = "block";
                btn1.style.display = "none";
            }
        </script>

        @include('layouts.site.schedule.packageSchedule')



        <div class="col-lg-12">
            <div class="textdata2">
                <p>Our website design packages include anything you need from start to finish to get your business
                    website created online and found at the top of the search engines. When you commission us to create
                    a website we communicate closely at all times ensuring your part of the web design process, ensuring
                    the design is suitable and exactly as you want, through to assisting you with managing the website
                    and technical support for managing your website hosting and email accounts and website transfer –
                    you can rely on us with here every step of the way.</p>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="item-inner">
                <span class="thumbnail">
                    <img class="responsive-img" style="width:100%; margin-bottom:200px;" src="{{ asset('assets/site/images/base/subscription') }}/Rectangle 219 (3).png" alt="bg-image">
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
                                                                            color: #FFFFFF;">Our team would love the
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
                                                                        color: #FFFFFF;">Enter your details and we'll be in
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