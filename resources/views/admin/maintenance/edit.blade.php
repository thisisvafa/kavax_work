@extends('layouts.admin.dashboard.master')

@section('page-title', 'Website Maintenance')

@section('title-page')
    <span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0"/><path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0"/></svg></span>
    <span class="text">Website Maintenance</span>
@endsection

@section('content')
    <section class="form-section">
        <form action="{{ route('web-maintenance.update') }}" method="POST">
            <input type="hidden" name="id" value="{{$data->id}}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="widget-block widget-item widget-style">
                                <div class="widget-content widget-content-padding">
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('title'))
                                            <span class="col-12 message-show">{{ $errors->first('title') }}</span>
                                        @endif
                                        {!! Form::text('title',$data->title,[ 'id'=>'title' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Page header']) !!}
                                        <div class="col-12">{!! Form::label('name',"Page header") !!}
                                            <span class="required">(Required)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Post Content --}}
                        <div class="col-12">
                            <div class="widget-block widget-item widget-style">
                                <div class="heading-widget">
                                    <span class="widget-title">Content <small>(Required)</small></span>
                                </div>

                                <div class="widget-content widget-content-padding">
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('content'))
                                            <span class="col-12 message-show">{{ $errors->first('content') }}</span>
                                        @endif
                                        <textarea class="field-style input-text" id="editor" name="content" placeholder="Content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submit-form-btn create-btn">Update</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </form>
    </section>

@endsection


@section('footer')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="{{ asset('editor/summernote.min.css') }}" rel="stylesheet">
<script src="{{ asset('editor/summernote.min.js') }}"></script>
<script>
    $('#editor').summernote({
        tabsize: 2,
        height: 300
    });

    jQuery(document).ready(function () {

        $.ajax({url: "{{ route('web.content', $data->id) }}", 
            type:'GET',
            dataType : 'json',
            success: function(result, status){
                console.log(result) 
                $('#editor').summernote('code', result.content);
            },
            error:function(error){
                console.log(error);
            }});

    });

</script>
@endsection
