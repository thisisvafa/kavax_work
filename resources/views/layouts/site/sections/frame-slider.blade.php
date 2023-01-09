<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->
<!-- Add the slick-theme.css if you want default styling -->
<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" /> -->
<style>
    html,
    body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
    }

    .frame-slider {
        width: 120%;
        margin: 70px -10%;
    }

    .slick-slide {
        margin: 2px 0px;
    }

    .slick-slide img {
        width: 100%;
        /* height: 73%; */
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }

    .frame-slider .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .8;
    }

    .frame-slider .slick-active {

        -webkit-transform: scale(0.80);
        -moz-transform: scale(0.80);
        -o-transform: scale(0.80);
        transform: scale(0.80);
    }

    .frame-slider .slick-current {
        opacity: 1;

        -webkit-transform: scale(1.02);
        -moz-transform: scale(1.02);
        -o-transform: scale(1.02);
        transform: scale(1.02);
        /* background-image: url('https://webon.qodeinteractive.com/wp-content/plugins/webon-core/inc/shortcodes/frame-slider/assets/img/frame-slider.png'); */
    }

    .frame {
        position: absolute;
        top: -5.6%;
        left: 53.67%;
        width: 44.3%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        pointer-events: none;
        z-index: 9;

    }

    .frame img {
        position: absolute;
        top: 0px;
        left: 41.8%;
        width: 100%;
        /* height: 72.4%; */
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        pointer-events: none;
        z-index: 9;

    }

    .frame-slider img {
        width: 100% !important;
        height: 72.4%;
        border-radius: 7%;
        ;
    }


    @media (max-width: 500px) {
        .frame-slider .slick-active {

            -webkit-transform: scale(0.70);
            -moz-transform: scale(0.70);
            -o-transform: scale(0.70);
            transform: scale(0.70);
        }
    }

    @media (max-width: 500px) {
        .frame-slider .slick-current {

            -webkit-transform: scale(1.22);
            -moz-transform: scale(1.22);
            -o-transform: scale(1.22);
            transform: scale(1.22);
        }
    }

    @media (max-width: 500px) {

        .frame {
            position: absolute;
            top: -1.3%;
            left: 55%;
            width: 64.3%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            pointer-events: none;
            z-index: 9;

        }
    }

    @media (max-width: 500px) {

        .frame img {
            position: absolute;
            top: 0px;
            left: 41.8%;
            width: 100%;
            /* height: 72.4%; */
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            pointer-events: none;
            z-index: 9;

        }

    }

    @media (max-width: 500px) {
        .frame-slider {
            width: 150%;
            margin: 70px -25%;
        }

        .slick-track {
            padding: 20px 20px !important;
        }
    }
</style>

<section style="position: relative;margin-bottom:50px;margin-top:-230px;">
    <div class="frame">
        <img src="https://webon.qodeinteractive.com/wp-content/plugins/webon-core/inc/shortcodes/frame-slider/assets/img/frame-slider.png">

    </div>

    <div class="frame-slider">
        <div><img src="{{ asset('assets/site/images/example') }}/ipad-1.JPG"></div>
        <div><img src="{{ asset('assets/site/images/example') }}/ipad-2.JPG"></div>
        <div><img src="{{ asset('assets/site/images/example') }}/ipad-3.jpg"></div>
        <div><img src="{{ asset('assets/site/images/example') }}/ipad-4.jpg"></div>
        <div><img src="{{ asset('assets/site/images/example') }}/ipad-5.jpg"></div>
        <div><img src="{{ asset('assets/site/images/example') }}/ipad-6.jpg"></div>
    </div>
</section>
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.frame-slider').slick({
            centerMode: true,
            centerPadding: '20px',
            slidesToShow: 3,
            autoplay: true,
            infinity: true,

        });
    });
</script>