@extends('layouts.site.auth')

@section('page-title', 'Forgot Password')

@section('page-style', 'auth/auth.min.css')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="">
                <!-- <div class="card-header">{{ __('Reset Password') }}</div> -->

                <div class="form-block">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row gy-5">
                            <div class="col-12">
                                <div class="field-block label-without-field text-field">
                                    <div class="row g-0">
                                        <input name="email" type="text" id="email" class="@error('email') is-invalid @enderror col-12 order-1" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label for="email" class="col-12 order-0">Email:</label>
                                    </div>

                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 center gy-5">
                                <div class="field-block submit-form">
                                    <input type="submit" value="Send reset link">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection