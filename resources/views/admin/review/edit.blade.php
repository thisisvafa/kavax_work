@extends('layouts.admin.dashboard.master')

@section('page-title', 'Review Edit')

@section('title-page')
<span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
        <path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0" />
        <path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0" /></svg></span>
<span class="text">Review Edit</span>
@endsection

@section('content')
<section class="form-section">
    <form action="{{ route('reviews.update' , $review->id) }}" enctype='multipart/form-data' method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="row">
                    {{-- Review Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Review Content</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group row no-gutters">
                                    @if($errors->has('name'))
                                    <span class="col-12 message-show">{{ $errors->first('name') }}</span>
                                    @endif
                                    {!! Form::text('name',$review->name,[ 'id'=>'name' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Client Name', 'required']) !!}
                                    <div class="col-12">{!! Form::label('name',"Client Name") !!}
                                        <span class="required">(Required)</span></div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('company'))
                                    <span class="col-12 message-show">{{ $errors->first('company') }}</span>
                                    @endif
                                    {!! Form::text('company',$review->company,[ 'id'=>'company' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Client company', 'required']) !!}
                                    <div class="col-12">{!! Form::label('company',"Client company") !!}
                                        <span class="required">(Required)</span></div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('description'))
                                    <span class="col-12 message-show">{{ $errors->first('description') }}</span>
                                    @endif
                                    {!! Form::text('description',$review->description,[ 'id'=>'company' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Description'], 'required') !!}
                                    <div class="col-12">{!! Form::label('company',"Description") !!}
                                        <span class="required">(Required)</span></div>
                                </div>

                                <div class="widget-block widget-item widget-style">
                                    <div class="heading-widget">
                                        <span class="widget-title">Image</span>
                                    </div>

                                    <div class="widget-content widget-content-padding widget-content-padding-side">
                                        <div class="form-group row no-gutters">

                                            @if($errors->has('image'))
                                            <span class="message-show">{{ $errors->first('image') }}</span>
                                            @endif
                                            <div class="col-3 field-style custom-select-field">
                                                <div class="thumbnail-image-upload">
                                                    <div>
                                                        <label for="thumbnail-image" id="thumbnail-label" class="thumbnail-label"><img id="thumbnail-preview" src="@if($review->image && isset(\App\Model\Attachments::find($review->image)->path)) {{asset('storage/review/thumbnail').'/'.\App\Model\Attachments::find($review->image)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                                        <input onchange="readURL(this)" name="image" type="file" class="thumbnail-image" id="thumbnail-image" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="submit-form-btn create-btn">Create Review</button>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </form>
</section>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(input).prev().find('img').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

</script>
@endsection
