@extends('layouts.site.master')
@section('page-title', $portfolio->title)
@section('page-style', 'other-page/other-page.min.css')
@section('page-style-temp', 'other-page/other-page.min.css')

@section('seo-meta')
<meta name="description" content="Kavax | {{$portfolio->title}}">
<meta name="keywords" content="Kavax, kavax, {{$portfolio->title}}">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax | {{$portfolio->title}}" />
<meta property="og:description" content="Kavax | {{$portfolio->title}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax | {{$portfolio->title}}" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/share.jpg') }}" />

@endsection

@section('content')
<style>
    .intro-section .content-section {
        position: absolute;
        width: 100%;
        top: 110px;
        left: 0;
    }

    .website-url {
        /* display: inline-block; */
        vertical-align: middle;
        /* margin-left: 17px; */
        margin-top: 5px;
        border-color: #fff;
        color: #e29826;
    }

    .website-url:hover,
    .website-url:hover>a {
        /* display: inline-block; */
        /* vertical-align: middle; */
        /* margin-left: 17px; */
        /* margin-top: 5px; */
        border-color: #e29826;
        color: #e29826;
    }

    p,
    span {
        font-family: 'Lato', sans-serif !important;
        font-weight: 300 !important;
        font-size: 24px !important;
        line-height: 34px !important;
    }

    h2 {
        font-family: 'Lato', sans-serif !important;
        font-weight: 500 !important;
        font-size: 30px !important;
        line-height: 40px !important;
    }
</style>
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="portfolios">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/Rocket-4.jpg" alt="portfolios">
    </div>

    <div class="content-section single-portfolio-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-8 col-12">
                    <div class="breadcrumb-block" style="margin-bottom: 30px">
                        <ul>
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li><a href="{{ url('portfolio') }}">Portfolio</a></li>
                        </ul>
                    </div>
                    <div class="title-heading">{{ $portfolio->title }}</div>
                    <div class="date">{{ $portfolio->service->title }}</div>
                    <div class="sharePortfolio">SHARE ON:
                        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}">
                            <svg width="15" height="15" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.38755 32H0.545698V10.6354H7.38755V32ZM3.9625 7.72114C1.77499 7.72114 0 5.96343 0 3.84229C0 2.82325 0.417476 1.84595 1.16059 1.12538C1.9037 0.404811 2.91158 0 3.9625 0C5.01342 0 6.0213 0.404811 6.76441 1.12538C7.50752 1.84595 7.925 2.82325 7.925 3.84229C7.925 5.96343 6.15001 7.72114 3.9625 7.72114ZM32.9941 32H26.1676V21.6C26.1676 19.1211 26.1157 15.9429 22.6105 15.9429C19.0535 15.9429 18.5078 18.6354 18.5078 21.4217V32H11.673V10.6354H18.2343V13.5497H18.3298C19.2432 11.8709 21.4743 10.0994 24.8027 10.0994C31.7271 10.0994 33 14.5211 33 20.264V32H32.9941Z" fill="#0A66C2" />
                            </svg>

                        </a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?text={{ $portfolio->title }}&url={{url()->current()}}">
                            <svg width="15" height="15" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.9371 3.21548C31.702 3.76206 30.3938 4.12303 29.0544 4.28683C30.4663 3.4338 31.5232 2.09466 32.0296 0.517393C30.6942 1.29703 29.2408 1.85079 27.7272 2.15659C26.7094 1.06185 25.3612 0.33585 23.8916 0.0912404C22.4221 -0.153369 20.9134 0.0970845 19.5997 0.803744C18.286 1.5104 17.2407 2.63376 16.626 3.99953C16.0113 5.36529 15.8615 6.89711 16.1999 8.35732C10.5765 8.0926 5.59144 5.37271 2.25741 1.26381C1.65049 2.30285 1.33307 3.48739 1.33856 4.69274C1.33774 5.81325 1.61179 6.91663 2.13638 7.9049C2.66097 8.89317 3.41987 9.73574 4.34569 10.3578C3.2728 10.3251 2.22328 10.0343 1.28494 9.50964V9.59166C1.28461 11.1644 1.8245 12.689 2.8131 13.9068C3.8017 15.1247 5.1782 15.9611 6.70931 16.2741C6.12933 16.4301 5.53176 16.51 4.93144 16.5118C4.49728 16.5118 4.08272 16.4692 3.66919 16.3924C4.10492 17.7458 4.94898 18.9289 6.08387 19.7768C7.21876 20.6247 8.58802 21.0953 10.0011 21.1232C7.60692 23.0106 4.65278 24.0345 1.61184 24.031C1.07323 24.0331 0.534973 24.0026 0 23.9396C3.10209 25.9405 6.70969 27.0028 10.394 27C22.8381 27 29.6381 16.6239 29.6381 7.6379C29.6381 7.35138 29.6381 7.05967 29.6165 6.76691C30.9467 5.80721 32.093 4.61275 33 3.24144L32.9371 3.21548Z" fill="#55ACEE" />
                            </svg>


                        </a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url()->current()}}">
                            <svg width="15" height="15" viewBox="0 0 17 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.886 17.999L16.7679 12.208H11.2556V8.45C11.2556 6.866 12.0254 5.321 14.4943 5.321H17V0.391C17 0.391 14.7265 0 12.5521 0C8.01295 0 5.04604 2.774 5.04604 7.795V12.209H0V18H5.04604V32H11.2556V18L15.886 17.999Z" fill="#3B5998" />
                            </svg>
                        </a>
                    </div>

                    <div class="portfolioLogo">
                        <img src="{{$portfolio->logo ?? asset('assets/site/images/example/portfolio/logo4.png') }}" alt="">
                    </div>
                    @if ($portfolio->website_url)
                    <div class="website-url btn">
                        <a href="{{ $portfolio->website_url }}" target="_blank">Launch Website</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Single Section -->
<article class="single-portfolio-section gradient-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-content">
                    <p>{!! $portfolio->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</article>

{{-- <div class="portfolio-gallery-section container">
        <div class="row">
            @if($portfolio->grid)
                @php $portfolio_count = 0; @endphp
                @foreach(json_decode($portfolio->grid, true) as  $item)
                    <div class="col-md-3 mb-4">
                        <img height="200" width="200" id='thumbnail-preview-{{ $portfolio_count }}' src="@if($item['image'] && isset(\App\Model\Attachments::find($item['image'])->path)) {{asset('storage/portfolio/thumbnail').'/'.\App\Model\Attachments::find($item['image'])->path}} @else{{ asset('public/assets/admin/img/base/icons/image.svg') }}@endif">
</div>
@endforeach
@endif
</div>
</div> --}}

@endsection