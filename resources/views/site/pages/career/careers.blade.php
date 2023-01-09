@extends('layouts.site.master')@section('page-title', 'Careers')@section('page-style-temp', 'other-page/other-page.min.css')

@section('seo-meta')
<meta name="description" content="Kavax | Careers">
<meta name="keywords" content="Kavax, kavax, Careers">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax | Careers" />
<meta property="og:description" content="Kavax | Careers" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax | Careers" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/darkN.jpg') }}" />
@endsection


@section('content')
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="Careers">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/career-list.png" alt="Careers">
    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li>Careers</li>
                        </ul>
                    </div>
                    <div class="title-heading">Careers</div>
                    <div class="section-text">We’re always on the lookout for bright digital minds, creative superstars, coding gurus and razorsharp client partners to add their own brand of digital brilliance to our heady mix.</div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Archive Career -->
<section class="archive-Careers-section gradient-page">
    <div class="container">
        <div class="row">
            @if(count($Career))
            @foreach($Career as $item)
            <div class="col-6">
                <div class="item-inner">
                    <a href="{{ url('career/') .'/'. $item->slug }}">
                        <span class="thumbnail">
                            <img src="@if($item->thumbnail && isset(\App\Model\Attachments::find($item->thumbnail)->path)) {{asset('storage/career/thumbnail/636').'/'.\App\Model\Attachments::find($item->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="{{ $item->title }}">
                        </span> <span class="post-meta">
                            {{-- <span class="cat-name">{{ $item->title }}</span>--}}
                        <div class="date">{{ date('F / d M, Y', strtotime($item->created_at)) }}</div>
                        </span> <span class="title">{{ $item->title }}</span>

                        <span class="read-more">Read article</span>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <div class="center">No item found!</div>
            @endif
        </div>

        <div class="section-pagination center num-fa">
            {{$Career->appends(request()->input())->links('vendor.pagination.default')}}
        </div>
    </div>
</section>
@endsection