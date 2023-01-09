@extends('layouts.site.master')@section('page-title', 'portfolios')@section('page-style-temp', 'other-page/other-page.min.css')

@section('seo-meta')
<meta name="description" content="Kavax | Portfolios">
<meta name="keywords" content="Kavax, kavax, Portfolios, Portfolio">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax | Portfolios" />
<meta property="og:description" content="Kavax | Portfolios" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax | Portfolios" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/share.jpg') }}" />
@endsection

@section('content')

<style>
    .responsive-img {
        width: 100%;
        height: auto;
    }

    .gallery-filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        list-style: none;
        padding: 1rem 0;
        margin-bottom: 50px;
    }

    .gallery-filter a {
        display: inline-block;
        padding: .5rem 1rem;
        text-decoration: none;
        color: #d1d1d1;
        font-size: 18px;
        font-weight: 500;
        transition: .3s;
        border-bottom: 1px solid transparent;
    }

    .gallery-filter .active a {
        color: #e29826;
        border-bottom-color: #e29826;
    }

    .gallery-item {
        position: relative !important;
        top: 0px !important;
        left: 12px !important;
    }
</style>
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="portfolios">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/Rocket-4.jpg" alt="portfolios">
    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-8 col-12">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li>Portfolios</li>
                        </ul>
                    </div>
                    <div class="title-heading">Let the results do the talking</div>
                    <div class="section-text">
                        We’re only as good as the work we produce and the results
                        we achieve for our clients. So here’s a taster of what we’ve
                        been up to recently.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@php

$tab = array();

foreach ($portfolio as $item) {
if (!in_array($item->service->title, $tab))
array_push($tab, $item->service->title);
}
@endphp

<!-- Archive portfolio -->
<section class="portfolio-section gradient-page">
    <div class="container">
        <div class="row ">
            @if(count($portfolio))
            <!-- <div class="gallery"> -->
            <ul class="gallery-filter js-filter">
                <li class="active"><a href="#" data-filter=".all">All</a></li>
                @foreach($tab as $item)
                <li class="text-capitalize">
                    <a href="#" data-filter=".{{ preg_replace("/\s+/", "", $item) }}">{{ $item }}</a>
                </li>
                @endforeach
            </ul>
            <div class="js-gallery row">

                @foreach($portfolio as $item) <div class="  col-md-4 col-sm-12  gallery-item all {{ preg_replace("/\s+/", "", $item->service->title) }}">
                    <div class="item-inner" onclick="window.location.href='{{ url('portfolio/') .'/'. $item->slug }}'">
                        <a href="{{ url('portfolio/') .'/'. $item->slug }}">
                            <span class="thumbnail">
                                <img class="responsive-img" src="@if($item->thumbnail && isset(\App\Model\Attachments::find($item->thumbnail)->path)) {{asset('storage/portfolio/thumbnail').'/'.\App\Model\Attachments::find($item->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="portfolio">
                            </span>
                        </a>
                    </div>
                </div>

                @endforeach
            </div>
            <!-- </div> -->
            @else
            <div class="center">No item found!</div>
            @endif


        </div>

        <div class="section-pagination center num-fa">
            {{$portfolio->appends(request()->input())->links('vendor.pagination.default')}}
        </div>
    </div>
</section>

<script src="{{ asset('assets/site/js') }}/isotope.pkgd.min.js"></script>

<script>
    setTimeout(function() {
        (function($) {
            var $gallery = $('.js-gallery');
            var $filter = $('.js-filter');
            var $isotope = $gallery.isotope();

            var filter = '.all';
            var items = [];
            var options = {
                getThumbBoundsFn: function(index) {
                    var _img = $gallery.find(filter).eq(index).find('img')[0];
                    var _rect = _img.getBoundingClientRect();
                    var _scroll = window.pageYOffset || document.documentElement.scrollTop;
                    return {
                        x: _rect.left,
                        y: _rect.top + _scroll,
                        w: _rect.width
                    };
                },
            };

            // Generate PID (Use for history)
            $gallery.find('.gallery-item').each(function(i, el) {
                var index = i + 1; // Do this fo
                var $link = $(el).find('a');
                $link.attr('data-pid', index);
            });

            // Update Items on loaded
            updateItems(filter);

            // Bind click event to a tag for get index then open Gallery
            $gallery.on('click', 'a', function(event) {
                event.preventDefault();

                options.index = $(this).parent('.gallery-item').index(filter);
                openGallery(items, options);
            });

            // Bind click event to a tag for filter gallery by isotope then update items object
            $filter.on('click', 'a', function(event) {
                event.preventDefault();

                filter = this.dataset.filter;
                $isotope.isotope({
                    filter: filter
                });
                updateItems(filter);

                $(this).parent('li').addClass('active').siblings().removeClass('active');
            });

            // Open image from hash
            if (window.location.hash) {
                var hash = window.location.hash;
                var params = hash.split('&');
                var pid;
                params.forEach(function(el, i) {
                    var param = el.split('=');
                    if (param[0] === 'pid') {
                        pid = param[1];
                    }
                });
                options.index = Number(pid - 1);
                openGallery(items, options);
            }

            // Open gallery with items object and options
            function openGallery(items, options) {
                var markup = $('.pswp').get(0);
                var gallery = new PhotoSwipe(markup, PhotoSwipeUI_Default, items, options);
                gallery.init();
            }

            // Update items object with filter select by class
            function updateItems(selector) {
                items = [];
                $gallery.find(selector).each(function(idx, el) {
                    var _link = $(el).find('a').get(0);
                    var source = _link.href;
                    var width = _link.dataset.originalWidth;
                    var height = _link.dataset.originalHeight;
                    var caption = _link.dataset.caption;
                    var pid = _link.dataset.pid;
                    var item = {
                        src: source,
                        w: width,
                        h: height,
                        title: caption,
                        msrc: source,
                        pid: pid,
                    }
                    items.push(item);
                });
            }
        })(jQuery);
    }, 500)
</script>

@include('layouts.site.sections.recent-posts')
@include('site.pages.lets-talk')
@endsection