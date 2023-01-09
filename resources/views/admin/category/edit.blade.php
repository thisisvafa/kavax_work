@extends('layouts.admin.dashboard.master')

@section('page-title', 'Category Edit')

@section('title-page')
    <span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0"/><path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0"/></svg></span>
    <span class="text">Category Edit</span>
@endsection

@section('content')
    <section class="form-section">
        <form action="{{ route('categories.update' , $category->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        {{-- Post Content --}}
                        <div class="col-12">
                            <div class="widget-block widget-item widget-style">
                                <div class="heading-widget">
                                    <span class="widget-title">Category Content</span>
                                </div>

                                <div class="widget-content widget-content-padding">
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('name'))
                                            <span class="col-12 message-show">{{ $errors->first('name') }}</span>
                                        @endif
                                        {!! Form::text('name',$category->name,[ 'id'=>'name' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Category Name']) !!}
                                        <div class="col-12">{!! Form::label('name',"Category Name") !!}
                                            <span class="required">(Required)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submit-form-btn create-btn">Update Category</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </form>
    </section>

@endsection