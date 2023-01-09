<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<!-- <script src="{{ asset('assets/admin') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
    .slick-track {
        padding: 30px 0px 30px 0px;
    }
</style>


<section class="subset-services" style="background-image: url('{{ asset('assets/site/images/base') }}/subset-section-bg.jpg')">
    <div style="position: absolute; top:0px; left:0px; background-image: linear-gradient(to right, #202020 ,#20202085, #202020);width:100%;height:100%;">

    </div>
    <div style="position: absolute; top:0px; left:0px; background-image: linear-gradient(to bottom, #202020 ,#20202000, #202020);width:100%;height:100%;">

    </div>
    <div class="container">
        <div class="subset-items center">
            <div class="row slider-small-package">
                <div class="col-md-4 col-sm-6 item">
                    <div class="item">
                        <a href="{{ url('subscription/website/package/3') }}" class="item-inner">
                            <span class="icon"><img src="{{ asset('assets/admin/img/base/icons/web-browser 1.svg') }}" alt="web-icon"></span>
                            <span class="name">Website Packages</span> </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="item">
                        <a href="{{ url('subscription/video/package/7') }}" class="item-inner">
                            <span class="icon"><img src="{{ asset('assets/admin/img/base/icons/videography 1.svg') }}" alt="video-icon"></span>
                            <span class="name">Video Marketing</span> </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="item">
                        <a href="{{ url('subscription/social-media/package/8') }}" class="item-inner">
                            <span class="icon"><img src="{{ asset('assets/admin/img/base/icons/bullhorn 3.svg') }}" alt="social-media-icon"></span>
                            <span class="name">Social Media Packages</span> </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="item">

                        <a href="{{ url('subscription/seo/package/9') }}" class="item-inner">
                            <span class="icon"><img src="{{ asset('assets/admin/img/base/icons/seo (1).svg') }}" alt="seo-icon"></span>
                            <span class="name">SEO Packages</span> </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="item">

                        <a href="{{ url('subscription/branding/package/8') }}" class="item-inner">
                            <span class="icon"><img src="{{ asset('assets/admin/img/base/icons/branding 3.svg') }}" alt="branding-icon"></span>
                            <span class="name">Branding Packages</span> </a>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.slider-small-package').slick({
                    infinite: false,
                    slidesToShow: detectDevice() == 'mobile' ? 1 : 3,
                    slidesToScroll: detectDevice() == 'mobile' ? 1 : 2,
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
</section>