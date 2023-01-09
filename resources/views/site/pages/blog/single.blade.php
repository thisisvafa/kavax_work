@extends('layouts.site.master')
@section('page-title', $Blog->title)
@section('page-style-temp', 'other-page/other-page.min.css')

@section('seo-meta')
<meta name="description" content="{{$Blog->title}}">
<meta name="keywords" content="Kavax, kavax, {{$Blog->title}}">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax - Blog | {{$Blog->title}}" />
<meta property="og:description" content="Kavax - Blog | {{$Blog->title}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax - Blog | {{$Blog->title}}" />
<meta property="og:image" content="@if($Blog->thumbnail && isset(\App\Model\Attachments::find($Blog->thumbnail)->path)) {{asset('storage/blog/thumbnail/full').'/'.\App\Model\Attachments::find($Blog->thumbnail)->path}} @else{{ asset('assets/site/images/base') }}/header-image/single-blog.png @endif" />
@endsection

@section('content')
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="Blog Shape">
        <img class="bg-img" src="@if($Blog->banner && isset(\App\Model\Attachments::find($Blog->banner)->path)) {{asset('storage/blog/thumbnail/full').'/'.\App\Model\Attachments::find($Blog->banner)->path}} @else{{ asset('assets/site/images/base') }}/header-image/single-blog.png @endif" alt="{{ $Blog->title }}">
    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li><a href="{{ url('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                    <div class="date">{{ date('F / d M, Y', strtotime($Blog->created_at)) }}</div>
                    <div class="title-heading">{{ $Blog->title }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Single Section -->
<article class="single-content-section gradient-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="single-content">
                    {!! $Blog->content_text !!}
                </div>
            </div>
            <div class="col-lg-3">
                <aside class="side-widget">
                    <div class="author-image"><img src="../assets/images/example/author.png" alt=""></div>
                    <div class="item-info">
                        <div class="label">Written by:</div>
                        <div class="value">{{ $Blog->author }}</div>
                    </div>
                    <div class="item-info">
                        <div class="label">Published on:</div>
                        <div class="value">{{ date('F / d M, Y', strtotime($Blog->created_at)) }}</div>
                    </div>
                    {{-- <div class="item-info">--}}
                    {{-- <div class="label">Posted In:</div>--}}
                    {{-- <div class="value">--}}
                    {{-- <a href="#">Development</a>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    <div class="item-info">
                        <div class="label">Share on:</div>
                        <div class="social-share">
                            <a target="_blank" href="https://www.instagram.com/sharer.php?u={{url()->current()}}"><span class="icon-instagram"></span></a>
                            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}"><span class="icon-linkedin"></span></a>
                            <a target="_blank" href="https://twitter.com/intent/tweet?text={{ $Blog->title }}&url={{url()->current()}}"><span class="icon-twitter"></span></a>
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url()->current()}}"><span class="icon-facebook"></span></a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</article>


<!-- Start Your Project -->
<section class="section-galaxy-bg request-section m-0">
    <div class="section-inner">
        <div class="container">
            <div class="section-title center">Ready to Skyrocket Your Business?</div>
            <div class="row center">
                <div class="col-md-6">
                    <div class="request-col">
                        <div class="title-item">Start your project</div>
                        <div class="cta-link"><a href="{{ url('services-request') }}">Submit your brief</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-col">
                        <div class="title-item">We're hiring</div>
                        <div class="cta-link"><a href="{{ url('contact-us') }}">join the team</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection