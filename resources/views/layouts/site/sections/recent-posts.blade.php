@php
$posts = \App\Model\Blog::orderBy('id','desc')->limit(2)->get();
$career = \App\Model\Career::orderBy('id','desc')->first();

@endphp

<style>
    .title {
        font-size: 18px;
        font-weight: bold;
        margin: 20px auto 20px auto;
    }

    .desc {
        font-size: 14px;
        font-weight: normal;
        line-height: 28px;
        color: #C4C4C4;
    }

    .cta-link {
        font-size: 18px;
        font-weight: 700;
        line-height: 21px;
        margin-top: 20px;
    }

    .section-title.h3.text-warning {
        font-weight: 700;
        font-size: 30px;
        line-height: 40px;
        font-style: normal;
        letter-spacing: 5px;
    }
</style>

<section class="section-galaxy-bg about-section section-recent-post-bg blog-section">
    <!-- <section class="  pb-5 " style="background: url(assets/site/images/base/KavaX-abou-us-bg.jpg) no-repeat center 85%/cover;padding: 100px 0 130px; -->
    <!-- position: relative;
    margin-top: -100px;
    min-height: 619px;"> -->
    <div class="section-inner">
        <div class="container">
            <div class="section-title center h3 text-warning ">RECENT ARTICLES</div>
            <div class="row mw-1047px mt-5 pt-5">
                @foreach($posts as $post)
                <div class="col-md-4 col-sm-12">
                    <div class="post-col px-5 mb-5">
                        <div class="category-item">
                            <span><img height="auto" width="33px" src="{{ asset('svgs/megaphone.svg') }}" style="width: 33px;" /></span>
                            <span style="margin-left:10px;font-size: 20px !important;">News</span>
                        </div>
                        <div class="title">{{ $post->title }}</div>
                        <div class="desc">{!! \Illuminate\Support\Str::limit(strip_tags($post->content_text), 100,'....') !!}</div>
                        <div class="cta-link"><a href="{{ url('blog/details/') .'/'. $post->slug }}">Read more ></a></div>
                    </div>
                </div>
                @endforeach
                @if ($career)
                <div class="col-md-4 col-sm-12">
                    <div class="post-col px-5">
                        <div class="category-item">
                            <span><img height="auto" width="23px" src="{{ asset('svgs/heart.png') }}" style="width: 23px;" /></span>
                            <span style="margin-left:10px;font-size: 20px !important;">Careers</span>
                        </div>
                        <div class="title">{{ $career->title }}</div>
                        <div class="desc">{!! \Illuminate\Support\Str::limit(strip_tags($career->content_text), 100,'....') !!}</div>
                        <div class="cta-link"><a href="{{ url('career/') .'/'. $career->slug }}">Read more ></a></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Archive Blog -->
<!-- <section class="archive-blog-section gradient-page">
    <div class="container">
        <div class="section-title center">RECENT ARTICLES</div>
        <div class="row mt-5">
            @if(count($posts))
            @foreach($posts as $item)
            <div class="col-6">
                <div class="item-inner">
                    <a href="{{ url('blog/details/') .'/'. $item->slug }}">
                        <span class="thumbnail">
                            <img src="@if($item->thumbnail && isset(\App\Model\Attachments::find($item->thumbnail)->path)) {{asset('storage/blog/thumbnail/636').'/'.\App\Model\Attachments::find($item->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif" alt="{{ $item->title }}">
                        </span> <span class="post-meta">
                            {{-- <span class="cat-name">{{ $item->title }}</span>--}}
                        <div class="date">{{ date('F / d M, Y', strtotime($item->created_at)) }}</div>
                        </span> <span class="title">{{ $item->title }}</span>

                        <span class="read-more">Read article</span> </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section> -->
