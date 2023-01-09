<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NGRRKS5');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    @hasSection('page-title')
    <title>Kavax | @yield('page-title')</title>
    @else
    <title>Kavax | A Full-Service Digital Media Agency Based in London</title>

    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="A young diverse team of digital experts With our space shuttle launch platform in the heart of London and Toronto’s creative community, we've got our finger on the launch button for your projects.">

    @yield('seo-meta')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/base/') }}/favicon.png">


    <link rel="stylesheet" href="{{ asset('assets/site/styles/bootstrap.min.css') }}" />

    <script id="mcjs">
        ! function(c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
        }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/711d754475f51073e371d6e9a/44884fe697deefff2d758557e.js");
    </script>
    {{-- Page Style --}}
    <link rel="stylesheet" href="{{ asset('assets/site/styles/pages-temp/base/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/styles/pages/base/style.min.css') }}">
    <link href="{{ asset('assets/site/styles/pages-temp') }}/@yield('page-style-temp')" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/site/styles/pages') }}/@yield('page-style')" type="text/css" rel="stylesheet">

    {{-- Page Responsive Style --}}
    <link rel="stylesheet" href="{{ asset('assets/site/styles/responsive-temp/base.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/styles/responsive/base.min.css') }}">
    {{-- <link href="{{ asset('assets/site/styles/pages') }}/@yield('page-style-responsive')" type="text/css" rel="stylesheet"> --}}

    {{-- Library --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/site/js-temp/theme-libs.js') }}"></script>
    {{-- <script src="{{ asset('assets/site/js/theme-libs.js') }}"></script> --}}

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
        .nav-link {
            padding: 0rem 0rem !important;
        }

        .dropdown-menu {
            color: #fff !important;
            background-color: #191719 !important;
            top: 20% !important;
            transform: translate(0px, 50px) !important;
        }

        .list-group-item {
            background-color: #191719 !important;
            padding: 0.5rem 0rem !important;
        }

        .services-resp {
            position: fixed !important;
            right: 100px !important;
            top: 0 !important;
        }

        .main-admin .content-page .content-page {

            height: auto !important;
        }

        .btn-outline-warning {
            border-color: #e29826;
            color: #e29826;
            border-radius: 0px !important;
        }

        .btn-outline-warning:hover {
            background-color: transparent !important;
            border-color: #e29826;
            color: #e29826;
            font-weight: bold;
            border-radius: 0px !important;
        }

        a:hover {
            color: #e29826 !important;
        }

        .text-section p,
        .text-section span {
            font-family: 'Lato', sans-serif !important;
            font-weight: 300 !important;
            font-size: 24px !important;
            line-height: 34px !important;
        }

        .text-warning {
            color: #e29826 !important;
        }

        .page-header .heading-btn:first-child a:hover {
            border-color: #fff;
            color: #fff !important;
        }
    </style>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y91QL2VT41"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y91QL2VT41');
    </script>

    @yield('heading-lib')

</head>

<body class="@yield('body-class')">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGRRKS5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg col-auto">
                    <div class="branding">
                        <a href="{{ url('/') }}">
                            <img width="107" src="{{ asset('/assets/site/images/base/kavax.png') }}" alt="Kavax">
                        </a>
                    </div>
                    <nav class="main-navigation">
                        <ul>
                            <li class="@if (Request::is('/')) {{ 'active-menu' }}@endif"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="@if (Request::is('about-us')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('about-us') }}">About Us</a>
                            </li>

                            <li class="nav-item dropdown dropdown-mega position-static @if (Request::is('services*')) {{ 'active-menu' }}@endif">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Our Services</a>
                                <div class="dropdown-menu shadow" style="width: 100%;">
                                    <div class="mega-content px-5">
                                        <div class="container-fluid">
                                            <div class="row offset-md-1">
                                                @php
                                                $services = \App\Model\Services::where('status', 'published')->where('service_level', 'parent')->get();
                                                @endphp
                                                @foreach ($services as $service)
                                                <div class="col-md-2 col-sm-10  py-4">
                                                    <a href="{{ route('service.show', $service->slug) }}">
                                                        <h5>{{ $service->title }}</h5>
                                                    </a>
                                                    <div class="list-group">
                                                        @foreach ($service->child as $child)
                                                        <a class="list-group-item" href="{{ route('service.show', $child->slug) }}">{{ $child->title }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="@if (Request::is('portfolio*')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('portfolio') }}">Portfolio</a>
                            </li>
                            <li class="@if (Request::is('blog*')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('blog') }}">Blog</a>
                            </li>
                            <li class="@if (Request::is('contact-us')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('contact-us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-auto col right">
                    <div class="heading-btn"><a href="{{ url('services-request') }}">Start Your Project</a></div>

                    <div class="heading-btn"><a href="/app/dashboard/">Dashboard</a></div>



                    <div class="heading-btn responsive-menu" onclick="show_modal('modal-menu')">
                        <span class="icon icon-menu"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Page -->
    <main class="main-page">
        @yield('content')

        @yield('footer-section')
    </main>

    <footer class="footer-page">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm col-12">
                    <div class="copyright-text">© 2021 KavaX . All Rights Reserved</div>
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="{{ url('web-maintenance') }}">Website Maintenance</a></li>
                            <li><a href="{{ url('subscription/website/package/nothing') }}">Packages</a></li>
                            <li><a href="{{ url('career') }}">Careers</a></li>
                            <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{ url('Terms-&-Conditions.pdf') }}">Terms and Conditions</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-auto col-12 right">
                    <div class="social-media">
                        <a href="https://wa.me/message/XRNEK33Y5JJPE1"><span class="icon icon-whatsapp"></span></a>
                        <a href="https://www.facebook.com/kavax.co.uk"><span class="icon icon-facebook"></span></a>
                        <a href="https://www.youtube.com/channel/UCkxSvLGp73pyP7ZSJ6_l5BA"><span class="icon icon-youtube"></span></a>
                        <a href="https://twitter.com/KavaxMedia"><span class="icon icon-twitter"></span></a>
                        <a href="https://www.linkedin.com/company/78357937"><span class="icon icon-linkedin"></span></a>
                        <a href="https://www.instagram.com/kavax.co.uk/"><span class="icon icon-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--<div class="search-btn" onclick="show_modal('modal-search')">-->
    <!--	<span class="icon-search search-fn"></span>-->
    <!--</div>-->

    <!-- Search Modal -->
    <div class="website-modal modal-search">
        <div class="modal-block-box search-modal-body">
            <div class="close-btn icon-close"></div>
            <div class="search-form">
                <form action="{{ url('/blog') }}">
                    <input class="search-field" type="text" placeholder="برای جستجو، کلمه کلیدی مورد نظر خود را وارد نمایید..." name="s">
                    <div class="submit-form">
                        <input type="submit" value="" class="search-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Menu Modal -->
    <div class="website-modal modal-menu">
        <div class="modal-block-box">
            <div class="close-btn icon-close"></div>
            <div class="responsive-navigation">
                <div class="block-inner">
                    <div class="branding-block center">
                        <a href="{{ url('/') }}">
                            <img width="150" src="{{ asset('/assets/site/images/base/kavax.png') }}" alt="Kavax">
                        </a>
                        <div class="desc">A Full-Service Digital Marketing Agency Based in London and Toronto</div>
                    </div>

                    <nav class="main-navigation">
                        <ul>
                            <li class="@if (Request::is('/')) {{ 'active-menu' }}@endif"><a href="{{ url('/') }}">Home</a></li>
                            <li class="@if (Request::is('about-us')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('about-us') }}">About Us</a>
                            </li>
                            <li class=" dropdown dropdown-mega position-static @if (Request::is('services*')) {{ 'active-menu' }}@endif">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="{{ url('services/website-design-and-developing') }}">Our Services</a>
                                <div class="dropdown-menu shadow services-resp">
                                    <div class="mega-content " style="overflow: auto;height:calc(100vh);">
                                        <div class="container-fluid">
                                            <div class="row services" style="padding-left: 20px;">
                                                @foreach ($services as $service)
                                                <div class="col-md-2 py-4" style="margin-right: 20px;">
                                                    <a href="{{ route('service.show', $service->slug) }}">
                                                        <h5>{{ $service->title }}</h5>
                                                    </a>
                                                    <div class="list-group">
                                                        @foreach ($service->child as $child)
                                                        <a class="list-group-item" href="{{ route('service.show', $child->slug) }}">{{ $child->title }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="@if (Request::is('portfolio*')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('portfolio') }}">Portfolio</a>
                            </li>
                            <li class="@if (Request::is('blog*')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('blog') }}">Blog</a>
                            </li>
                            <li class="@if (Request::is('contact-us')) {{ 'active-menu' }}@endif">
                                <a href="{{ url('contact-us') }}">Contact Us</a>
                            </li>

                            <li class="@if (Request::is('contact-us')) {{ 'active-menu' }}@endif"><a href="/app/">Dashboard</a></li>

                            <li class="@if (Request::is('services-request')) {{ 'active-menu' }}@endif"><a class="btn btn-outline-warning" href="{{ url('services-request') }}">Start Your Project</a></li>
                        </ul>
                    </nav>

                    <div class="social-media center">
                        <div class="row">
                            <div class="col"><a href="#" target="_blank">
                                    <span class="icon icon-whatsapp"></span>
                                </a>
                            </div>
                            <div class="col"><a href="#" target="_blank">
                                    <span class="icon icon-facebook"></span>
                                </a>
                            </div>
                            <div class="col"><a href="#" target="_blank">
                                    <span class="icon icon-youtube"></span>
                                </a>
                            </div>
                            <div class="col"><a href="#" target="_blank">
                                    <span class="icon icon-twitter"></span>
                                </a>
                            </div>
                            <div class="col"><a href="#" target="_blank">
                                    <span class="icon icon-linkedin"></span>
                                </a>
                            </div>
                            <div class="col"><a href="#" target="_blank">
                                    <span class="icon icon-instagram"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .list-group-item {
            display: inline-block;
            border: none;
            width: auto !important;
            /* margin: 5px 10px 5px 0px; */
            text-align: left;
        }

        .services .list-group-item {
            padding: 5px 0px !important;
        }
    </style>

    @yield('footer-lib')

    <script src="{{ asset('assets/site/js/footer.js') }}"></script>
</body>

</html>
