@extends('layouts.site.master')@section('page-title', 'Website Maintenance')
@section('page-style', 'other-page/other-page.min.css')


@section('seo-meta')
<meta name="description" content="Website Maintenance">
<meta name="keywords" content="Kavax, kavax, Website Maintenance">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax - Website Maintenance | A creative web design and branding agency based in London" />
<meta property="og:description" content="Website Maintenance | A creative web design and branding agency based in London" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax - Website Maintenance | A creative web design and branding agency based in London" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/darkN.jpg') }}" />
@endsection

@section('content')

<style>
    .maintenance-section ul {
        list-style: none;
        margin-left: 0;
        padding-left: 1em;
        text-indent: -1em;
    }

    .maintenance-section ul li:before {
        content: "+";
        position: absolute;
        left: 30;
        color: #e29826;
        right: 20;
    }

    .maintenance-section ul li {
        color: #fff;
        padding: 15px 10px 15px 20px;
        font-size: 24px;
        line-height: 34px;
        font-weight: 300;
    }

    .maintenance-section div {
        margin-top: 20px;
    }

    .maintenance-section a:hover {
        border: 1px solid #e29826;
        background-color: transparent;
        color: #e29826;
    }

    .maintenance-section a {
        margin-top: 25px;
        border: 1px solid #fff;
        padding: 10px 20px 10px 20px;
        background-color: transparent;
        color: #fff;
    }
</style>
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="A young diverse team of digital experts">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/website-maintenance.png" alt="A young diverse team of digital experts">
    </div>
    @php
    $data = \App\Model\WebMaintenance::first();
    @endphp
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-8 col-12">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Website Maintenance</li>
                        </ul>
                    </div>
                    <div class="title-heading">Website Maintenance</div>
                    <div class="section-text">{{ $data->title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section class="maintenance-section gradient-page">
    <div class="container">
        {!! $data->content !!}
    </div>
</section>


@include('layouts.site.sections.review-client')

@endsection

@section('footer-section')
@endsection
