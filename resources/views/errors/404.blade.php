@extends('layouts.site.master')

@section('content')
    <style>
        .section-bg-err img {
            width: 100%;
        }
    </style>
    <section class="">
        <div class="section-bg-err">
            <img class="shape" src="{{ asset('assets/site/images/base/404.jpg') }}" alt="404">
        </div>
    </section>
@endsection
