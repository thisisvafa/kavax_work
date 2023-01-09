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

        .booking-box {
            margin: 10px;
            padding: 10px;
            border: none;
        }

        .booking-box .booking-slider {
            margin: auto;
            margin-top: 30px;
            width: 86%;
            padding: 30px 0px 40px 0px;
        }

        .list-group-item {
            margin: 5px 0px 5px 0px;
        }

        .list-group-item label {
            padding: 0px 25px 0px 25px;
        }

        .list-group {
            flex-direction: row;
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
            padding: 10px;
            border: none;
        }

        .booking-box .booking-slider {
            margin: auto;
            margin-top: 30px;
            width: 86%;
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

<section class="text-center my-5  py-5">
    <div class="booking-box">

        <div class="col-lg-6 col-md-6 col-sm-12 offset-lg-3 offset-md-3">

            <h3 class="text-warning" style="font-size: 30px;">Book a Free Consultation Call</h3>
            <p class="text-muted" style="font-size: 18px !important;">We offer free 30 minute consultations to help you with your project.</p>
            <h4 style="font-size: 25px;">Select a date to view availability</h4>
            <div class="slider-small center col-md-6 col-lg-4 col-sm-12 booking-slider">
                <!-- Here is the for loop of DATES  starts-->
                <!-- @foreach ($data as $key => $item) -->

                <div class="item">
                    <div class="date item list-group-item">
                        <input type="radio" value="{{$item['details']['date']}}" id="{{$item['details']['date']}}_" name="dates" @if ($key==0) checked @endif @if ($item['details']['name_day']=="Sat" || $item['details']['name_day']=="Sun" ) disabled @endif onchange="changeDate('{{$item['details']['date']}}')" />

                        <label for="{{ $item['details']['date'] }}_" class="{{ ($item['details']['name_day'] == "Sat" || $item['details']['name_day'] == "Sun") ? ' disable-date':' ' }} text-center">
                            <div style="font-size: 18px; font-weight:300;">
                                {{ $item['details']['name_day'] }} <!-- Friday -->
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <strong>{{ $item['details']['day'] }}</strong> <!-- 27 -->
                                </h4>
                            </div>
                            <div style="font-size: 18px; font-weight:300;">
                                {{ $item['details']['month'] }}<!-- May -->
                            </div>
                        </label>
                    </div>
                </div>

                <!-- @endforeach -->
                <!-- for loop ends -->
            </div>

        </div>
    </div>

</section>


<script type="text/javascript">
    $(document).ready(function() {
        $('#sch-btn-open').on('click', function(e) {
            // alert('hdl')
            $('#newBooking').on('shown.bs.modal', function(e) {

                $('.slider').slick({
                    infinite: false,
                    slidesToShow: detectDevice() == "mobile" ? 3 : 5,
                    slidesToScroll: detectDevice() == "mobile" ? 1 : 2,
                });
                $('.slider').removeClass('fade')

            })
            $('#newBooking').modal('toggle')

        })

        $('.slider-small').slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
        });


        $('.date label').addClass(detectDevice() == 'mobile' ? 'py-4' : 'py-5')

    });

    @foreach($data as $key => $item)
    @if($key != 0)
    $('#schadule-{{ $item["details"]["date"] }}').hide();
    @endif
    @endforeach


    function detectDevice() {

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            return 'mobile';
        } else {
            return 'desktop';
        }
    }

    function changeDate(date) {
        $('.schadules').each(function(index) {
            $(this).hide();
        });
        $('#schadule-' + date).show();
    }
</script>