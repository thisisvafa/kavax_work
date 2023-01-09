@extends('layouts.admin.dashboard.master')

@section('lib')
<script src="{{ url('') }}/app/lib/ckeditor/ckeditor.js"></script>
<script src="{{ url('') }}/app/lib/ckeditor/config.js"></script>
@endsection

@section('page-title', 'News Edit')

@section('title-page')
<span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
        <path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0" />
        <path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0" /></svg></span>
<span class="text">News Edit</span>
@endsection

@section('content')
<section class="form-section">
    <form action="{{ route('news.update' , $news->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="row">
                    {{-- News Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">News Content</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group row no-gutters">
                                    @if($errors->has('title'))
                                    <span class="col-12 message-show">{{ $errors->first('title') }}</span>
                                    @endif
                                    {!! Form::text('title',$news->title,[ 'id'=>'title' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter News Title']) !!}
                                    <div class="col-12">{!! Form::label('title',"News Title") !!}
                                        <span class="required">(Required)</span></div>
                                </div>

                                <div class="form-group">
                                    <div style="margin-bottom: 10px;">{!! Form::label('content_text','News Content') !!}
                                        <span class="required">(Required)</span></div>
                                    <textarea class="field-style input-text" id="content_text" name="content_text" placeholder="Enter News Content">{{ $news->content_text }}</textarea>
                                    @if($errors->has('content_text'))
                                    <span class="col-12 message-show">{{ $errors->first('content_text') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                {{-- News Options --}}
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <div class="row align-items-center">
                            <div class="col-10"><span class="widget-title">News Options</span></div>
                            <div class="col-2 left">
                                <a target="_blank" href="{{ Url("blog/$news->slug") }}"><span class="icon"><img width="100%" src="{{ asset('assets/admin/img/base/icons/show.svg') }}"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-padding widget-content-padding-side">
                        {{-- Publish Status --}}
                        <div class="form-group row no-gutters">
                            @if($errors->has('status'))
                            <span class="message-show">{{ $errors->first('status') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Choose an Option</option>
                                    <option @if(old('status')=='published' ) selected @else @if($news->status == 'published') selected @endif @endif value="published">Publish</option>
                                    <option @if(old('status')=='draft' ) selected @else @if($news->status == 'draft') selected @endif @endif value="draft">Draft</option>
                                </select>
                            </div>

                            {{-- Publish Status --}}
                            {!! Form::label('status','Publish Status',['class'=>'col-12']) !!}
                        </div>
                        <button type="submit" class="submit-form-btn">Update News</button>
                    </div>
                </div>

                {{-- News Thumbnail --}}
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <span class="widget-title">Thumbnail</span>
                    </div>

                    <div class="widget-content widget-content-padding widget-content-padding-side">
                        <div class="form-group row no-gutters">
                            @if($errors->has('thumbnail'))
                            <span class="message-show">{{ $errors->first('thumbnail') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <div class="thumbnail-image-upload">
                                    <div>
                                        <label for="thumbnail-image" id="thumbnail-label" class="thumbnail-label"><img id="thumbnail-preview" src="@if($news->thumbnail && isset(\App\Model\Attachments::find($news->thumbnail)->path)) {{asset('storage/blog/thumbnail/636').'/'.\App\Model\Attachments::find($news->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                        <input onchange="readURL(this)" name="thumbnail" type="file" class="thumbnail-image" id="thumbnail-image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </form>
</section>

@endsection

@section('footer')
{{-- CKEditor Config --}}
<script type="text/javascript">
    CKEDITOR.replace('content_text', {
        language: 'enn'
        , filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['path' => 'product','_token' => csrf_token()])}}"
        , filebrowserUploadMethod: 'form'
        , width: '100%'
        , height: '282'
        , uiColor: '#fdfdfd'
    , });

</script>

{{-- Thumbnail Preview --}}
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
