@extends('layouts.site.master')@section('page-title', 'A Full-Service Digital Marketing Agency | London')
@section('page-style-temp', 'index/index.min.css')

@section('seo-meta')
<meta name="description" content="A creative web design and branding agency based in London">
<meta name="keywords" content="Kavax, kavax, home">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax - Home | A creative web design and branding agency based in London" />
<meta property="og:description" content="A creative web design and branding agency based in London" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax - Home | A creative web design and branding agency based in London" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/share.jpg') }}" />
@endsection
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@800&display=swap" rel="stylesheet">
<style>
    .service-name:hover {
        opacity: 1;
    }

    .services-section .service-list .item-inner:hover .service-name {
        opacity: 1;
    }

    .text-warning {
        color: #e29826 !important;
    }

    .about-section .about-us-text {
        line-height: 40px !important;
    }

    .services-section .service-list .item-website-development:active .service-image .static-img {
        animation: spriteWebsiteDevelopment 2.2s steps(5) infinite;
    }

    .services-section .service-list .item-inner {
        margin-bottom: 0px;
        ;
    }

    .services-section .service-list .item-app-development .service-image .static-img {
        width: 230px !important;
    }

    .intro-section .video-play-button {
        position: absolute;
        top: 53.5%;
        left: 46.4%;
        width: 7%;
        z-index: 9;
    }

    @media (max-width: 500px) {
        .intro-section .video-play-button {
            position: absolute;
            top: 46%;
            left: 46.4%;
            width: 7%;
        }
    }

    .services-section .service-list .item-inner {
        display: block;

    }

    .intro-text {
        position: absolute;
        top: 32%;
        left: 37%;
        font-size: 2.8vw;
        font-weight: 800;
        /* line-height: ; */
        text-align: center;
        z-index: 9;
        font-family: 'Playfair Display', serif;
    }

    @media (max-width: 540px) {
        .intro-section {
            margin-bottom: 80px !important;
        }
    }

    .section-heading {
        margin-bottom: 0px !important;
    }

    @media (max-width: 500px) {
        .intro-text {
            top: 30%;
            left: 37%;
            font-size: 2.8vw;
            font-weight: 800;
            /* line-height: ; */
            text-align: center;
            font-family: 'Playfair Display', serif;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<!-- <script src="{{ asset('assets/admin') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
    .available {
        background: white;
        width: 15px;
        height: 15px;
        margin-top: 5px;
        float: right;
    }

    .unavailable {
        background: black;
        width: 15px;
        height: 15px;
        margin-top: 5px;
        float: right;
    }

    .selected {
        background: #e29826;
        width: 15px;
        height: 15px;
        float: right;
        margin-top: 5px;
        margin-left: 10px;
    }

    .list-group-item {
        display: inline-block;
        border: none;
        width: auto !important;
        margin: 0px 0px 0px 0px !important;
        text-align: center;
    }

    .list-group-item {
        padding: 0px 0px 0px 0px !important;
    }

    .list-group-item label {
        padding: 0px 40px 0px 40px;
    }



    .remark ul li {
        width: auto;
        padding: 5px;
    }

    .dark-theme .btn-outline-light {
        color: #fff;
    }

    .dark-theme .btn-outline-light:hover {
        color: #e29826;
        border-color: #e29826;
        background: none;
    }

    .remark ul {
        list-style-type: none;
    }

    .remark ul li {
        text-align: center;
        width: 180px;
    }

    input[type="radio"] {
        display: none;
    }

    .booking-box {
        position: relative;
        width: auto;
    }

    .date label {
        display: block;
        position: relative;
        cursor: pointer;
        margin-bottom: 0px;
        color: black !important;
        background: #fff;
    }

    .time:hover {
        background-color: #3f3a3a;
    }

    .time label {
        margin: -10px;
        padding: 10px;
    }

    .date label:before {
        background-color: white;
        color: black !important;
        content: " ";
        display: block;
        /* border: 1px solid grey; */
    }

    label img {
        height: 24px;
        width: 24px;
        margin-bottom: 20px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    .date :checked+label {
        border: 1px solid #e29826;
        color: #000;
        background-color: #e29826;
    }

    .time :checked+label {
        color: #e29826;
    }

    .text-booked {
        color: #fff;
    }

    .card {
        background-color: transparent;
        border: none;
        padding: 1rem;
        box-shadow: none;
    }

    .date .disable-date {
        background: #202020 !important;
        color: #636768 !important;
        border: 1px solid #636768;
    }

    .card .card-header {
        border-bottom: none;
        padding-top: 10px;
    }

    .table {
        border-color: #636768 !important
    }

    .table td {
        padding: 10px;
        border-width: 0px !important;
    }

    .border-bottom {
        border-bottom: 1px solid #383535 !important;
    }

    .modal-content {
        background-color: #2a2727;
    }

    .remark .list-group {
        /* flex-direction: row; */
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 900px;
            margin: 1.75rem auto;
        }
    }

    .modal-header {
        border-bottom: 1px solid #3f3a3a !important;
    }

    .btn-outline-light:hover {
        color: #e29826;
        background-color: transparent;
        border-color: #e29826;
    }

    strong {
        font-weight: 800;
        font-size: 22px;
    }

    .booking-box {
        margin: 40px;
        padding: 40px;
        border: 1px solid #717171;
    }

    .booking-box .booking-slider {
        margin: auto;
        margin-top: 30px;
        width: 70%;
        padding: 30px 0px 40px 0px;
    }

    .modal .booking-slider {
        margin: auto;
        width: 85%;
    }

    .remark ul {
        margin-left: -2vw;
    }

    @media (max-width: 576px) {
        .remark ul {
            margin-left: 0vw;
        }

        .modal-body {
            padding: 0rem !important;
        }

        .booking-box {
            margin: 10px;
            padding: 10px;
            border: none;
        }

        .booking-box .booking-slider {
            margin: auto;
            margin-top: 30px;
            width: 95%;
            padding: 30px 0px 40px 0px;
        }

        .list-group-item {
            margin: 5px 0px 5px 0px;
        }

        .list-group-item label {
            padding: 0px 25px 0px 25px;
        }

        .list-group {
            /* flex-direction: row; */
        }

        .remark ul li {
            width: auto;
        }
    }


    @media (max-width: 850px) {
        .remark ul {
            margin-left: 0vw;
        }

        .booking-box {
            margin: 10px;
            padding: 0px;
            border: none;
        }

        .booking-box .booking-slider {
            margin: auto;
            margin-top: 30px;
            width: 95%;
            padding: 30px 0px 40px 0px;
        }

        .list-group-item {
            margin: 5px 0px 5px 0px;
        }

        .list-group-item label {
            padding: 0px 25px 0px 25px;
        }

        .remark .list-group {
            flex-direction: row;
        }

        .remark ul li {
            width: auto;
        }
    }
</style>

@php
$days = getDays();
$data = [];
foreach ($days as $key => $day) {
\App\Model\Time::$date = $day;
$times['parts'] = \App\Model\PartOfDay::with('times')->get()->toArray();
$times['details'] = getDateDetails($day);
$data[] = $times;
}

function getDateDetails($date)
{
$convert_date = strtotime($date);
$month = date('M', $convert_date);
$name_day = date('D', $convert_date);
$day = date('j', $convert_date);

return ['month' => $month, 'day' => $day, 'name_day' => $name_day, 'date' => $date];
}

function getDays()
{
$date = date('Y-m-d'); //today date
$weekOfdays = array();
for ($i = 1; $i <= 7; $i++) { $date=date('Y-m-d', strtotime('+1 day', strtotime($date))); $weekOfdays[]=date('Y-m-d', strtotime($date)); } return $weekOfdays; } @endphp <!-- Intro Section -->
    <section class="intro-section mt-5">


    </section>

    <!-- Services Section -->
    <section class="services-section center pt-5">
        <div class="container pt-5">
            <div class="section-heading"></div>
            <h3 class="text-warning" style="font-size: 30px;">Book a Free Consultation Call</h3>
            <p class="text-muted" style="font-size: 18px !important;">We offer free 30 minute consultations to help you with your project.</p>
            <h4 style="font-size: 25px;">Select a date to view availability</h4>
            <div class="" id="newBooking">
                <div class="booking-box ">
                    <div class="">
                        <div class="modal-body">

                            <form action="https://kavax.co.uk/app/auth/" method="get">
{{--                            <form action="http://127.0.0.1:8080/app/auth/" method="get">--}}
{{--                                <form action="{{route('book.a.call')}}" method="post" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
                                <div class="slider center  booking-slider">
                                    @foreach ($data as $key => $item)
                                    <div class="item">
                                        <div class="date item list-group-item">
{{--                                            <input type="radio" value="{{$item['details']['date']}}" id="{{$item['details']['date']}}" name="date" @if ($key==0) checked @endif @if ($item['details']['name_day']=="Sat" || $item['details']['name_day']=="Sun" ) disabled @endif onchange="changeDate('{{$item['details']['date']}}')" />--}}
                                            <input type="radio" value="{{$item['details']['date']}}" id="{{$item['details']['date']}}" name="date" @if ($dates == $item['details']['date']) checked @endif @if ($item['details']['name_day']=="Sat" || $item['details']['name_day']=="Sun" ) disabled @endif onchange="changeDate('{{$item['details']['date']}}')" />

                                            <label for="{{ $item['details']['date'] }}" class="{{ ($item['details']['name_day'] == "Sat" || $item['details']['name_day'] == "Sun") ? ' disable-date ':' ' }}   text-center">
                                                <div>
                                                    {{ $item['details']['name_day'] }}
                                                </div>
                                                <div>
                                                    <h4 class="mb-0">
                                                        <strong>{{ $item['details']['day'] }}</strong>
                                                    </h4>
                                                </div>
                                                <div>
                                                    {{ $item['details']['month'] }}
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="d-flex justify-content-center  remark mt-3">
                                    <ul class="list-group list-group-horizontal-lg list-inline">
                                        <li>
                                            <ul class="list-group list-group-horizontal-lg list-inline">
                                                <li>
                                                    <div class="unavailable"></div>
                                                </li>
                                                <li>
                                                    Unavailable
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul class="list-group list-group-horizontal-lg list-inline">
                                                <li>
                                                    <div class="selected"></div>
                                                </li>
                                                <li>
                                                    Selected
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul class="list-group list-group-horizontal-lg list-inline">
                                                <li>
                                                    <div class="available"></div>
                                                </li>
                                                <li>
                                                    Available
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class=" mx-3 mt-1">
                                    <h4 class="mt-3 text-left pl-5">Select a time slot</h4>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <div class="card col-12">
                                        <div class="card-body p-0">
                                            @foreach ($data as $key => $item)
                                            <div class="schadules" id="schadule-{{ $item['details']['date'] }}">
                                                @foreach ($item['parts'] as $time)
                                                <div class="row p-1 pt-2 pb-2 border-bottom">
                                                    <div class="col-md-4 h4">
                                                        <table class="table">
                                                            <tr>
                                                                <td class="text-right">
                                                                    <img class="mr-2 pb-1" src="{{ asset('svgs') }}/{{$time['name']}}.svg" />
                                                                </td>
                                                                <td class="text-left pl-0 text-white">
                                                                    {{$time['name']}}
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <table class="table col-12">
                                                            <tr>
                                                                @foreach ($time['times'] as $key => $t)
                                                                @if($loop->index <=3) <td class="time col-sm-3 {{$t['isAvailable'] == true ? 'text-booked' : 'text-muted'}}">
                                                                    <input type="radio" value="{{$t['id']}}" id="{{ $item['details']['date'] }}-{{$t['time']}}" name="time" {{$t['isAvailable'] == true ? '' : 'disabled'}} />
                                                                    <label for="{{ $item['details']['date'] }}-{{$t['time']}}">
                                                                        {{$t['time']}}
                                                                    </label>
                                                                    </td>
                                                                    @endif
                                                                    @endforeach
                                                            </tr>
                                                            <tr>
                                                                @foreach ($time['times'] as $key => $t)
                                                                @if($loop->index >= 4)
                                                                <td class="time col-sm-3 {{$t['isAvailable'] == true ? 'text-booked' : ''}}">
                                                                    <input type="radio" value="{{$t['id']}}" id="{{ $item['details']['date'] }}-{{$t['time']}}" name="time" {{$t['isAvailable'] == true ? '' : 'disabled'}} />
                                                                    <label for="{{ $item['details']['date'] }}-{{$t['time']}}">
                                                                        {{$t['time']}}
                                                                    </label>
                                                                </td>
                                                                @endif
                                                                @endforeach
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endforeach

                                            <div class="form-block mt-5">
                                                <div class="field-block label-without-field text-field">
                                                    <div class="row g-0 left">
                                                        {!! Form::text('full_name', null, ['required', 'id' => 'full_name', 'class' => 'col-12 order-1']) !!}
                                                        {!! Form::label('full_name', 'Your Name*', ['class' => 'col-12 order-0']) !!}
                                                    </div>
                                                </div>
                                                <div class="field-block label-without-field text-field">
                                                    <div class="row g-0 left">
                                                        {!! Form::text('phone', null, ['required', 'id' => 'phone', 'class' => 'col-12 order-1']) !!}
                                                        {!! Form::label('phone', 'Your Phone Number*', ['class' => 'col-12 order-0']) !!}
                                                    </div>
                                                </div>
                                                <div class="field-block label-without-field text-field">
                                                    <div class="row g-0 left">
{{--                                                        {!! Form::email('email', null, ['required', 'id' => 'email', 'class' => 'col-12 order-1',--}}
{{--                                                       'onfocusout' => 'checkEmailExists()' ]) !!}--}}
                                                        {!! Form::email('email', null, ['required', 'id' => 'email', 'class' => 'col-12 order-1']) !!}
                                                        {!! Form::label('email', 'Your Email Address*', ['class' => 'col-12 order-0']) !!}
                                                        <small class="text-danger fade" id="email-error">This email address has already taken.</small>
                                                    </div>
                                                </div>

                                                <div class="field-block label-without-field text-field">
                                                    <div class="row g-0 left">
                                                        <input required="" id="password" class="col-12 order-1" name="password" type="password">
                                                        <label for="password" class="col-12 order-0">Enter Password</label>


                                                    </div>
                                                </div>


                                            </div>
                                            <div class="text-center mt-5">
                                                <button type="submit" class="btn btn-outline-light px-5 py-2 mt-2" id="submit">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    @endsection
    @section('footer-section')

    @endsection


    @section('footer-lib')

    <!-- Video Controller -->
    <script>
        document.addEventListener("touchstart", function() {}, true);
        var interval;
        let counter = 1;

        $('.off').hide();
        $('.intro-text').hide();
        $(document).ready(() => {
            doAuto();

        })

        window.addEventListener("load", event => {
            var image = document.querySelector('.cover img');
            var isLoaded = image.complete && image.naturalHeight !== 0;
            if (isLoaded) {
                imageLoaded()
            }
        });

        function imageLoaded() {

            $('.video-play-button').addClass('video-play-button-visible');
            $('.intro-text').show();
        }

        function toggle() {
            // alert(val)
            if ($('.on').is(":visible")) {
                lightOn()
            } else {
                lightOff()
            }
            clearInterval(interval)
            interval = setInterval(toggle, 12000)

        }

        function lightOn() {

            $('.on').hide();
            $('.off').show()

            $('.intro-section .cover').removeClass('show-video');
            $('.intro-section .video-play').addClass('show-video');
        }

        function lightOff() {

            $('.off').hide();
            $('.on').show()

            $('.intro-section .cover').addClass('show-video');
            $('.intro-section .video-play').removeClass('show-video');
        }

        function doAuto() {
            interval = setInterval(toggle, 12000)



        }


        function detectDevice() {

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return 'mobile';
            } else {
                return 'desktop';
            }
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {



            $('.slider').slick({
                infinite: false,
                slidesToShow: detectDevice() == "mobile" ? 3 : 5,
                slidesToScroll: detectDevice() == "mobile" ? 1 : 2,
            });

            $('.date label').addClass(detectDevice() == 'mobile' ? 'py-4' : 'py-5')

        });

        @foreach($data as $key => $item)
        @if($key != 0)
        $('#schadule-{{ $item["details"]["date"] }}').hide();
        @endif
        @endforeach




        function changeDate(date) {

            $('.schadules').each(function(index) {
                $(this).hide();
            });
            $('#schadule-' + date).show();
        }

        function checkEmailExists() {
            var email = document.getElementById('email').value
            $.ajax({
                url: "/api/check-email/" + email,
                success: function(result) {
                    if (result.success) {
                        $('#email-error').removeClass('fade')
                        $("#submit").prop("disabled", true);
                    } else {

                        $('#email-error').addClass('fade')
                        $("#submit").prop("disabled", false);
                    }
                }
            });
        }
    </script>

    <script>

    </script>
    @endsection
