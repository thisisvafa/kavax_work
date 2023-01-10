@extends('layouts.site.master')

@section('content')
    <section class="intro-section">
        <div class="section-bg">
            <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="A young diverse team of digital experts">
            <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/services-bg.png" alt="A young diverse team of digital experts">
        </div>

        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-8 col-12">
                        <div class="breadcrumb-block">
                            <ul>
                                <li><a href="{{ url('/') }}">Go Home Page</a></li>
                            </ul>
                        </div>
                        <div class="title-heading">
                            <h1>404</h1>
                        </div>
                        <div class="section-text">PAGE NOT FOUND!</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
