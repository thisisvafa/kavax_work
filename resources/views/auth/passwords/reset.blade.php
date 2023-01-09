@extends('layouts.site.auth')

@section('page-title', 'Reset Password')

@section('page-style', 'auth/auth.min.css')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="">


                <div class="form-block">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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

                            <div class="col-12">
                                <div class="field-block label-without-field text-field">
                                    <div class="row g-0">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror col-12 order-1" name="password" required autocomplete="new-password">
                                        <label for="password" class="col-12 order-0">Password:</label>
                                    </div>

                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="field-block label-without-field text-field">
                                    <div class="row g-0">
                                        <input id="password-confirm" type="password" class="form-control col-12 order-1" name="password_confirmation" required autocomplete="new-password">
                                        <label for="password-confirm" class="col-12 order-0">Confirm password:</label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 center gy-5">
                                <div class="field-block submit-form">
                                    <input type="submit" value="Reset Password">
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