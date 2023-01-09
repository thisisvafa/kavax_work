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

    .pound3 {
        position: relative;
        bottom: -2px;
        right: -200px;
        color: #e29826;
        font-family: 'Lato';
        font-style: normal;
        font-weight: 500;
        font-size: 48px;
        line-height: 40px;
    }

    .money3 {
        font-size: 50px;
        color: #e29826;
        position: relative;
        right: -30px;
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
        margin-top: 100px;
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
                    <div class="titledata1">Video Marketing</div>
                    <div style="font-family: 'Lato';
                                                                                font-style: normal;
                                                                                font-weight: 500;
                                                                                font-size: 28px;
                                                                                line-height: 40px;
                                                                                color: #9CA09E;">It's Time To Stand Out.

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
                <div class="textdata">We are confident that most of your video needs will fit into the below
                    packages. If not, we'll customize one to fit your projects needs. It's that simple.
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
                                    1950
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
                                    <li>&emsp;Up to 5 hrs filming</li>
                                    <li>&emsp;1 Shooting Location</li>
                                    <li>&emsp;Written Video Script</li>
                                    <li>&emsp;​10 Still Frames</li>
                                    <li>&emsp;3-5 BTS Photos</li>
                                    <li>&emsp;1 Version</li>

                                </ul>

                                <div class="text-center" style="position: absolute;
                                                                                bottom: 20px;
                                                                                width: 100%;
                                                                                padding-right: 30px;">
                                    <div class="btn">
                                        <a href="{{ url('services-request/7/Bronze') }}">Choose plan</a>
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
                                <div class="col-lg-4 pound2">
                                    &#163;
                                </div>
                                <div class="col-lg-8 money2">
                                    3600
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                                                                font-style: normal;
                                                                                                                font-weight: 300;
                                                                                                                font-size: 18px;
                                                                                                                line-height: 36px;
                                                                                                                color: #D1D1D1;">
                                <li>&emsp;Up to 10 hrs filming</li>
                                <li>&emsp;2 Shooting Locations</li>
                                <li>&emsp;​Written Video Script​</li>
                                <li>&emsp;15 Still Frames</li>
                                <li>&emsp;5-8 BTS Photos</li>
                                <li>&emsp;+ Shorter 30 Sec. Version</li>

                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/7/Silver') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-lg-6">
                    <div class="card" style="border: #171717;height:100%">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Gold
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    5600
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                                                                font-style: normal;
                                                                                                                font-weight: 300;
                                                                                                                font-size: 18px;
                                                                                                                line-height: 36px;
                                                                                                                color: #D1D1D1;">
                                <li>&emsp;Up to 16 hrs filming</li>
                                <li>&emsp;Up to 4 Shooting Locations</li>
                                <li>&emsp;​Written Video Script​</li>
                                <li>&emsp;20 Still Frames</li>
                                <li>&emsp;10-15 BTS Photos</li>
                                <li>&emsp;+ 30 & 60 Sec. Version​</li>

                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/7/Gold') }}">Choose plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card" style="border: #171717;height:100%">
                        <div class="card-body" style="background: #171717;">
                            <div class="text-center card-header">
                                Platinum
                            </div>
                            <div class="row">
                                <div class="col-3 offset-2  pound1">
                                    &#163;
                                </div>
                                <div class="col-7 money">
                                    10,000
                                </div>
                            </div>
                            <ul class="ulpackage" style="font-family: 'Lato';
                                                                                                                font-style: normal;
                                                                                                                font-weight: 300;
                                                                                                                font-size: 18px;
                                                                                                                line-height: 36px;
                                                                                                                color: #D1D1D1;">
                                <li>&emsp;Up to 40 hrs filming</li>
                                <li>&emsp;Up to 8 Shooting Locations</li>
                                <li>&emsp;​Written Video Script​</li>
                                <li>&emsp;30 Still Frames</li>
                                <li>&emsp;20 BTS Photos</li>
                                <li>&emsp;+ 30 & 60 Sec. & 2 Min. Version</li>
                            </ul>
                            <div class="text-center">
                                <div class="btn">
                                    <a href="{{ url('services-request/7/Platinum') }}">Choose plan</a>
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
                <p>With people's attention spans are shortening due to the modern lifestyles, we focus on generating
                    short, intriguing films that will attract and hold their interest. They serve as a movie teaser for
                    what your company or brand accomplishes and represents. Our videos allow you to be heard by giving
                    you a voice and allowing you to develop a community online. They boost sales and increase team
                    morale in your company.
                </p>

                <p>The best part is that you receive more than just a promotional film. We buy original music that will
                    only be used in your project. We extract video stills (images) from your video so you may create
                    fascinating posts after you've shared it. We also provide you with BTS (behind the scenes)
                    photographs of us working on your video so you can show off to your friends and family that you have
                    a film team on your side. How many people can make such a claim?! If you like, you may share the
                    lengthier video on YouTube and Facebook and the shorter one on Instagram and Twitter. These
                    solutions are popular with our clients because they allow them to stand out on any platform.</p>

                <p>All of the packages offer everything you'll need to accomplish your project from beginning to end.
                    We manage the full filmmaking process, from planning to screenplay writing to storyboarding to
                    filming to editing.</p>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="item-inner">
                <span class="thumbnail">
                    <img class="responsive-img" style="width:100%; margin-bottom:200px;" src="{{ asset('assets/site/images/base/subscription') }}/Rectangle 219 (4).png" alt="bg-image">
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