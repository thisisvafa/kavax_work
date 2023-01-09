@extends('layouts.admin.dashboard.master')

@section('lib')
<script src="{{ url('') }}/app/lib/ckeditor/ckeditor.js"></script>
<script src="{{ url('') }}/app/lib/ckeditor/config.js"></script>
@endsection

@section('page-title', 'Article Edit')

@section('title-page')
<span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
        <path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0" />
        <path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0" />
    </svg></span>
<span class="text">Article Edit</span>
@endsection

@section('content')
<section class="form-section">
    <form action="{{ route('blog.update' , $Blog->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="row">
                    {{-- Post Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Post Content</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group row no-gutters">
                                    @if($errors->has('title'))
                                    <span class="col-12 message-show">{{ $errors->first('title') }}</span>
                                    @endif
                                    {!! Form::text('title',$Blog->title,[ 'id'=>'title' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Post Title']) !!}
                                    <div class="col-12">{!! Form::label('title',"Post Title") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>
                                <div class="form-group row no-gutters">
                                    @if($errors->has('author'))
                                    <span class="col-12 message-show">{{ $errors->first('title') }}</span>
                                    @endif
                                    {!! Form::text('author',$Blog->author,[ 'id'=>'author' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Author Name']) !!}
                                    <div class="col-12">{!! Form::label('author',"Author") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="margin-bottom: 10px;">{!! Form::label('content_text','Post Content') !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                    <textarea class="field-style input-text" id="content_text" name="content_text" placeholder="Enter Post Content"></textarea>
                                    @if($errors->has('content_text'))
                                    <span class="col-12 message-show">{{ $errors->first('content_text') }}</span>
                                    @endif
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('publish_date'))
                                    <span class="col-12 message-show">{{ $errors->first('publish_date') }}</span>
                                    @endif
                                    {!! Form::input('datetime-local','publish_date', $Blog->publish_date,[ 'id'=>'publish_date' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Publish Date', 'required']) !!}
                                    <div class="col-12">
                                        {!! Form::label('publish_date',"Publish Date") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                {{-- Post Options --}}
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <div class="row align-items-center">
                            <div class="col-10"><span class="widget-title">Post Options</span></div>
                            <div class="col-2 left">
                                <a target="_blank" href="{{ Url("blog/$Blog->slug") }}"><span class="icon"><img width="100%" src="{{ asset('assets/admin/img/base/icons/show.svg') }}"></span></a>
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
                                    <option @if(old('status')=='published' ) selected @else @if($Blog->status == 'published') selected @endif @endif value="published">Publish</option>
                                    <option @if(old('status')=='draft' ) selected @else @if($Blog->status == 'draft') selected @endif @endif value="draft">Draft</option>
                                </select>
                            </div>

                            {{-- Publish Status --}}
                            {!! Form::label('status','Publish Status',['class'=>'col-12']) !!}
                        </div>

                        <div class="form-group row no-gutters select_service">
                            @if($errors->has('cat'))
                            <span class="message-show">{{ $errors->first('cat') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <select class="form-control" name="cat" id="cat">
                                    <option value="">Choose an Option</option>
                                    <option value="">Choose an Option</option>
                                    @forelse($cats as $item)
                                    <option value="{{ $item->id }}" {{ $Blog->cat == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            {!! Form::label('cat','Select Category',['class'=>'col-12']) !!}
                        </div>

                        <button type="submit" class="submit-form-btn">Update Post</button>
                    </div>
                </div>

                {{-- Post Thumbnail --}}
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <span class="widget-title">Post Thumbnail</span>
                    </div>

                    <div class="widget-content widget-content-padding widget-content-padding-side">
                        <div class="form-group row no-gutters">
                            @if($errors->has('thumbnail'))
                            <span class="message-show">{{ $errors->first('thumbnail') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <div class="thumbnail-image-upload">
                                    <div>
                                        <label for="thumbnail-image" id="thumbnail-label" class="thumbnail-label"><img id="thumbnail-preview" src="@if($Blog->thumbnail && isset(\App\Model\Attachments::find($Blog->thumbnail)->path)) {{asset('storage/blog/thumbnail/636').'/'.\App\Model\Attachments::find($Blog->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                        <input onchange="readURL(this)" name="thumbnail" type="file" class="thumbnail-image" id="thumbnail-image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Post Banner --}}
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <span class="widget-title">Post Banner</span>
                    </div>

                    <div class="widget-content widget-content-padding widget-content-padding-side">
                        <div class="form-group row no-gutters">
                            @if($errors->has('banner'))
                            <span class="message-show">{{ $errors->first('banner') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <div class="thumbnail-image-upload">
                                    <div>
                                        <label for="banner-image" id="banner-label" class="thumbnail-label"><img id="banner-preview" src="@if($Blog->banner && isset(\App\Model\Attachments::find($Blog->banner)->path)) {{asset('storage/blog/thumbnail/636').'/'.\App\Model\Attachments::find($Blog->banner)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                        <input onchange="readURL(this)" name="banner" type="file" class="thumbnail-image" id="banner-image" accept="image/*">
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
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="{{ asset('editor/summernote.min.css') }}" rel="stylesheet">
<script src="{{ asset('editor/summernote.min.js') }}"></script>
<script>
    $('#content_text').summernote({
        tabsize: 2,
        height: 300
    });

    jQuery(document).ready(function() {

        $.ajax({
            url: "{{ route('blog.content', $Blog->id) }}",
            type: 'GET',
            dataType: 'json',
            success: function(result, status) {
                console.log(result)
                $('#content_text').summernote('code', result.content);
            },
            error: function(error) {
                console.log(error);
            }
        });

    });
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