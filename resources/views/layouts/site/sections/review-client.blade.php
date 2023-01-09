<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
@php
$reviews = \App\Model\Review::orderBy('id', 'desc')->get();
@endphp

<section class="google-review mt-5 mb-5 pb-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-11">
            <div class="section-inner">
                <div class="swiper google-review-swiper center">

                    <div class="swiper-wrapper">
                        @foreach ($reviews as $review)
                        <div class="swiper-slide">
                            <div class="item-inner">
                                <div class="image">
                                    <img height="100" width="200" src="@if($review->image && isset(\App\Model\Attachments::find($review->image)->path)) {{asset('storage/review/thumbnail').'/'.\App\Model\Attachments::find($review->image)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="{{ $review->name }}">
                                </div>
                                <div class="comment-message">{{ $review->description }}</div>

                                <div class="client-info">
                                    <div class="jobs">{{ $review->company }} </div>
                                    <div class="name">{{ $review->name }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script>
    new Swiper(".google-review-swiper", {
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
    });
</script>