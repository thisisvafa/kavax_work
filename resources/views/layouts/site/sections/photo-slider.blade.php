<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<!-- <script src="{{ asset('assets/admin') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
    .slider-photo .item{
        
    }
</style>

<div class="slider-photo center " style="margin: auto;margin-top: 30px; width: 90%;padding: 30px 0px 40px 0px;">

    <div class="item m-4">
        <div class="date item list-group-item">

            <div class="py-5">
                <img src="{{ asset('assets/site/images/base/about-us-image-section.png') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.">

            </div>
        </div>
    </div>
    <div class="item m-4">
        <div class="date item list-group-item">

            <div class="py-5">
                <img src="{{ asset('assets/site/images/base/about-us-image-section.png') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.">

            </div>
        </div>
    </div>
    <div class="item m-4">
        <div class="date item list-group-item">

            <div class="py-5">
                <img src="{{ asset('assets/site/images/base/about-us-image-section.png') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.">

            </div>
        </div>
    </div>
    <div class="item m-4">
        <div class="date item list-group-item">

            <div class="py-5">
                <img src="{{ asset('assets/site/images/base/about-us-image-section.png') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.">

            </div>
        </div>
    </div>
    <div class="item m-4">
        <div class="date item list-group-item">

            <div class="py-5">
                <img src="{{ asset('assets/site/images/base/about-us-image-section.png') }}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.">

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('.slider-photo').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
        });


    });
</script>