@extends('layouts.site.master')@section('page-title', 'Blog')@section('page-style-temp', 'other-page/other-page.min.css')

@section('seo-meta')
<meta name="description" content="Kavax | Blog">
<meta name="keywords" content="Kavax, kavax, Blog">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax | Blog" />
<meta property="og:description" content="Kavax | Blog" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax | Blog" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/darkN.jpg') }}" />
@endsection

@section('content')

<style>
    .intro-section .content-section .archive-cat-list ul li {
        margin-top: 20px;
    }

    .intro-section .content-section .archive-cat-list {
        margin-bottom: -170px !important;
    }

    @media (max-width: 850px) {
        .gradient-page {
            margin-top: 250px;
        }

        .intro-section .content-section .archive-cat-list {
            margin-bottom: 0px !important;
        }
    }
</style>
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="A young diverse team of digital experts">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/archive.png" alt="A young diverse team of digital experts">
    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                    <div class="title-heading">Adapt or die</div>
                    <div class="section-text">Actionable advice, tips and guides on how to grow your organisation online.</div>
                    <div class="archive-cat-list">
                        <ul>
                            <li class="{{ $id == 0 ? 'active' : '' }}"><a href="{{ url('blog') }}">All</a></li>
                            @foreach ($cats as $cat)
                            <li class="{{ $id == $cat->id ? 'active' : '' }}"><a href="{{ url('blog/'.$cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Archive Blog -->
<section class="archive-blog-section gradient-page">
    <div class="container">
        <div class="row">
            @if(count($Blog))
            @foreach($Blog as $item)
            <div class="col-md-6 col-sm-12">
                <div class="item-inner">
                    <a href="{{ url('blog/details/') .'/'. $item->slug }}">
                        <span class="thumbnail">
                            <img src="@if($item->thumbnail && isset(\App\Model\Attachments::find($item->thumbnail)->path)) {{asset('storage/blog/thumbnail/636').'/'.\App\Model\Attachments::find($item->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="{{ $item->title }}">
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
            {{$Blog->appends(request()->input())->links('vendor.pagination.default')}}
        </div>
    </div>
</section>
@endsection