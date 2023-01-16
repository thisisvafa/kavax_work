@extends('layouts.site.master')

@section('content')
    <style>
        .section-bg-err img {
            width: 100%;
        }
        @media (max-width:768px) {
            .section-bg-err img {
                height: 100vh;
                object-fit: cover;
            }
        }
    </style>
    <section class="">
        <div class="section-bg-err">
            <img class="shape" src="{{ asset('assets/site/images/base/404-1.jpg') }}" alt="404">
        </div>
    </section>
@endsection
