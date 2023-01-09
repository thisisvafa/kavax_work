@extends('layouts.site.master')@section('page-title', $Services->title)@section('page-style-temp', 'services/services.min.css')

@section('seo-meta')
<meta name="description" content="Kavax | {{$Services->title}}">
<meta name="keywords" content="Kavax, kavax, {{$Services->title}}">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax | {{$Services->title}}" />
<meta property="og:description" content="Kavax | {{$Services->title}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax | {{$Services->title}}" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/share.jpg') }}" />
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<!-- <script src="{{ asset('assets/admin') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
    .services-section .services-include .services-list .item-inner .icon img {
        filter: none !important;
    }

    .slick-slider {
        margin-left: 0px;
        margin-right: 0px;
    }

    .slick-track {
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="{{ $Services->title }}">
        <!-- @if($Services->thumbnail)


        <img class="bg-img" src="{{asset('storage/services/thumbnail/full/').'/'.\App\Model\Attachments::find($Services->thumbnail)->path}}" alt="{{ $Services->title }}">
        @endif -->

        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/services-bg.png" alt="{{ $Services->title }}">
        <!-- <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/Rocket-3.jpg" alt="{{ $Services->title }}"> -->

    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-8 col-12">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('') }}">Home</a></li>
                            @if(isset($Services->parent_id))
                            <li><a href="{{ $ParentService->slug }}">{{ $ParentService->title }}</a>
                            </li>
                            @endif
                            <li>{{ $Services->title }}</li>
                        </ul>
                    </div>
                    <div class="title-heading">{{ json_decode($Services->service_meta, true)['heading_text'] }}</div>
                    <div class="section-text">{{ $Services->excerpt }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section services-main ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="services-include">
                    <div class="heading base-color text-color text-uppercase">Services Include:</div>
                    <div class="services-list center">
                        <div class="row align-items-end">
                            @if($Services->service_includes)
                            @forelse(json_decode($Services->service_includes, true) as $item)
                            <div class="col-sm-4 col-6">
                                <div class="item-inner">
                                    <div class="icon">
                                        <img src="@if($item['icon'] && isset(\App\Model\Attachments::find($item['icon'])->path)) {{asset('storage/services/service-include').'/'.\App\Model\Attachments::find($item['icon'])->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="service-name">{{ $item['name'] }}</div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="service-content">
                    <div class="heading">{{ $Services->title }}</div>
                    <div class="content-text">
                        {!! $Services->content_text !!}
                    </div>
                </div>
            </div>

            <div class="col-12 technology">

                <div class="services-include center">

                    @if($Services->technology_list)
                    <div class="heading base-color text-color text-uppercase">Our Development Technologies:</div>
                    @endif
                    <div class="services-list">
                        <div class="row">
                            @if($Services->technology_list)
                            @forelse(json_decode($Services->technology_list, true) as $item)
                            <div class="col-md-2 col-sm-4 col-6">
                                <div class="item-inner">
                                    <div class="icon">
                                        <img src="@if($item['icon'] && isset(\App\Model\Attachments::find($item['icon'])->path)) {{asset('storage/services/technology').'/'.\App\Model\Attachments::find($item['icon'])->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="service-name">{{ $item['name'] }}</div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subset Services -->
<section class="subset-services" style="background-image: url('{{ asset('assets/site/images/base') }}/subset-section-bg.jpg')">
    <div style="position: absolute; top:0px; left:0px; background-image: linear-gradient(to bottom, #202020 ,#20202085, #202020);width:100%;height:100%;">

    </div>
    <div class="container">
        <div class="subset-items center">
            <div class="row slider-small">
                @forelse($ChildServices as $item)
                <div class="col-md-4 col-sm-6 item">
                    <div class="item">
                        <a href="{{ $item->slug }}" class="item-inner">
                            @if ($item->service_meta)
                            <span class="icon"><img src="@if(isset(json_decode($item->service_meta, true)['icon_service'])){{asset('storage/services/service-icon').'/'.\App\Model\Attachments::find(json_decode($item->service_meta, true)['icon_service'])->path}}  @else{{ asset('assets/admin/img/base/icons/image.svg') }} @endif" alt="{{ $item->title }}"></span>
                            @endif
                            <span class="name">{{ $item->title }}</span> </a>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function() {



        $('.slider-small').slick({
            infinite: false,
            slidesToShow: detectDevice() == 'mobile' ? 1 : 3,
            slidesToScroll: detectDevice() == 'mobile' ? 1 : 3,
        });


    });



    function detectDevice() {
        console.log(navigator.userAgent)
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            return 'mobile';
        } else {
            return 'desktop';
        }
    }
</script>

@include('layouts.site.sections.portfolio')
@endsection