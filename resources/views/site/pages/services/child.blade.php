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
<style>
    p span,
    ul li span {
        color: white !important;
        background-color: transparent !important;
    }

    .services-section .services-include .services-list .item-inner .icon img {
        filter: none;
    }

    .intro-section .section-bg .bg-img {
        position: absolute;
        /* top: 400px !important;
        left: 830px !important; */
        width: 100%;
        /* scale: 1.9; */
    }
</style>

<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="{{ $Services->title }}">
        @if($Services->service_level == 'child')
        <!-- <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/services-bg-child.jpg" alt="{{ $Services->title }}"> -->
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/Rocket-4.jpg" alt="{{ $Services->title }}">

        @else
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/services-bg.png" alt="{{ $Services->title }}">
        @endif
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
<section class="services-section services-main gradient-page">
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

                <div class="services-include">
                    @if($Services->technology_list)
                    <div class="heading base-color text-color text-uppercase">Our Development Technologies:</div>
                    @endif
                    <div class="services-list center">
                        <div class="row align-items-end">
                            @if($Services->technology_list)
                            @forelse(json_decode($Services->technology_list, true) as $item)
                            <div class="col-sm-4 col-6">
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
            <div class="col-lg-6 col-12">
                <div class="service-content">
                    <div class="heading">{{ $Services->title }}</div>
                    <div class="content-text">
                        {!! $Services->content_text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->

@include('layouts.site.sections.portfolio')
@endsection


@section('footer-lib')
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
@endsection