@extends('layouts.admin.dashboard.master')

@section('title-page')
<span class="icon"><img src="{{ asset('assets/admin/img/base/icons') }}/user.svg"></span>
<span class="text">Update User Profile</span>
@endsection

@section('content')
<section class="form-section">
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-9">
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <div class="row">
                            <div class="col-9">
                                <span class="widget-title">User Profile Data</span>
                            </div>
                            <div class="col-3 left"></div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-padding">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="role" value="{{$user->role }}">
                        <div class="form-group row no-gutters">
                            @if($errors->has('name'))
                            <span class="col-12 message-show">{{ $errors->first('name') }}</span>
                            @endif
                            {!! Form::text('fullName',$user->fullName,[ 'id'=>'name' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter your Name']) !!}
                            {!! Form::label('name','Name:',['class'=>'col-12']) !!}
                        </div>
                        <div class="form-group row no-gutters">
                            @if($errors->has('email'))
                            <span class="col-12 message-show">{{ $errors->first('email') }}</span>
                            @endif
                            {!! Form::email('email',$user->email,[ 'id'=>'email' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter your Email']) !!}
                            {!! Form::label('email','Email:',['class'=>'col-12']) !!}
                        </div>
                        {{-- <div class="form-group row no-gutters">--}}
                        {{-- @if($errors->has('phone'))--}}
                        {{-- <span class="col-12 message-show">{{ $errors->first('phone') }}</span>--}}
                        {{-- @endif--}}
                        {{-- {!! Form::text('phone',$user->phone,[ 'id'=>'phone' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter your Phone']) !!}--}}
                        {{-- {!! Form::label('phone','Phone:',['class'=>'col-12']) !!}--}}
                        {{-- </div>--}}
                        <div class="form-group row no-gutters">
                            @if($errors->has('password'))
                            <span class="col-12 message-show">{{ $errors->first('password') }}</span>
                            @endif
                            <input type="password" name="password_change" class="col-12 field-style input-text" id="password" placeholder="Enter your Password">
                            <label class="col-12" for="password">Password:</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <span class="widget-title">Submit Information</span>
                    </div>

                    <div class="widget-content widget-content-padding widget-content-padding-side">
                        @if($user->role != 'super_admin')
                        <div class="form-group row no-gutters">
                            @if($errors->has('role'))
                            <span class="message-show">{{ $errors->first('role') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <select class="form-control" name="role" id="role">
                                    <option value="">Select a item</option>
                                    <option value="super_admin" {{ isset($user) && $user->role == 'super_admin' ? 'selected': '' }}>Super Admin</option>
                                    <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected': '' }}>Admin</option>
                                    <option value="customer" {{ isset($user) && $user->role == 'customer' ? 'selected': '' }}>Customer</option>
                                </select>
                            </div>
                            {!! Form::label('role','Role:',['class'=>'col-12']) !!}
                        </div>
                        @endif
                        <button type="submit" class="submit-form-btn">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection