@extends('layouts.admin.dashboard.master')

@section('lib')
    <link href="{{ asset('plugin/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('page-title', 'Portfolio Edit')

@section('title-page')
<span class="icon"><svg viewBox="0 -31 512 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M497.0938 60.004c-.0313 0-.0625-.004-.0938-.004H361V45c0-24.8125-20.1875-45-45-45H196c-24.8125 0-45 20.1875-45 45v15H15C6.6484 60 0 66.8438 0 75v330c0 24.8125 20.1875 45 45 45h422c24.8125 0 45-20.1875 45-45V75.2578c-.5742-9.8516-6.6328-15.1992-14.9063-15.2539zM181 45c0-8.2695 6.7305-15 15-15h120c8.2695 0 15 6.7305 15 15v15H181zm295.1875 45-46.582 139.7422A14.9747 14.9747 0 0 1 415.3789 240H331v-15c0-8.2852-6.7148-15-15-15H196c-8.2852 0-15 6.7148-15 15v15H96.621a14.9747 14.9747 0 0 1-14.2265-10.2578L35.8125 90zM301 240v30h-90v-30zm181 165c0 8.2695-6.7305 15-15 15H45c-8.2695 0-15-6.7305-15-15V167.4336l23.9336 71.7969C60.0664 257.6367 77.2226 270 96.621 270H181v15c0 8.2852 6.7148 15 15 15h120c8.2852 0 15-6.7148 15-15v-15h84.379c19.3983 0 36.5546-12.3633 42.6874-30.7695L482 167.4335zm0 0" />
    </svg></span>
<span class="text">Portfolio Edit</span>
@endsection

@section('content')
<section class="form-section">
    <form action="{{ route('portfolio.update' , $Portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="row">
                    {{-- Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Portfolio Title</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group">
                                    @if($errors->has('title'))
                                    <span class="message-show">{{ $errors->first('title') }}</span>
                                    @endif
                                    {!! Form::text('title',$Portfolio->title,[ 'id'=>'title' , 'class'=>'field-style input-text', 'placeholder'=>'Title', 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Website URL</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group">
                                    @if($errors->has('website_url'))
                                    <span class="message-show">{{ $errors->first('website_url') }}</span>
                                    @endif
                                    {!! Form::text('website_url',$Portfolio->website_url,[ 'id'=>'website_url' , 'class'=>'field-style input-text', 'placeholder'=>'Website URL']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Portfolio Content (All image dimension should be same)</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group">
                                    @if($errors->has('content'))
                                    <span class="message-show">{{ $errors->first('content') }}</span>
                                    @endif
                                    <textarea id="editor" name="content"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Portfolio --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Portfolio Image List</span>
                            </div>

                            <div class="widget-content widget-content-padding widget-content-padding-side">
                                <div class="form-group">
                                    <div class="portfolio-items text-field-repeater">
                                        <div class="field-list row small-image" id="portfolio_items_list">
                                            @if($Portfolio->grid)
                                            @php $Portfolio_count = 0; @endphp
                                            @foreach(json_decode($Portfolio->grid, true) as $item)
                                            <div class='text-field col-12' id='field-portfolio-item-{{ $Portfolio_count += 1 }}'>
                                                <div class='row align-items-center'>
                                                    <div class='col-2'>
                                                        <div class="thumbnail-image-upload">
                                                            <div>
                                                                <label for='thumbnail-image-{{ $Portfolio_count }}' id='thumbnail-label-{{ $Portfolio_count }}' class="thumbnail-label no-text"><img id='thumbnail-preview-{{ $Portfolio_count }}' src="@if($item['image'] && isset(\App\Model\Attachments::find($item['image'])->path)) {{asset('storage/portfolio/thumbnail').'/'.\App\Model\Attachments::find($item['image'])->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                                                <input value="{{ $item['image'] }}" onchange="readURL(this)" name="portfolio[][image]" type="file" class="thumbnail-image" id='thumbnail-image-{{ $Portfolio_count }}' accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-10'>
                                                        <input value="{{ $item['name'] }}" placeholder='Portfolio Tag...' class='input-field' type="text" name="portfolio[][name]" id="portfolio_item">
                                                        <span class='delete-row icon-close' onclick='delete_portfolio_item({{ $Portfolio_count }})'><img src='{{ asset('assets/admin/img/base/icons') }}/close.svg'></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="add-field center" id="addPortfolio">
                                            <span class="icon-plus"></span>Add Image
                                        </div>
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
                        <span class="widget-title">Post Options</span>
                    </div>

                    <div class="widget-content widget-content-padding widget-content-padding-side">

                        <div class="form-group row no-gutters">
                            @if($errors->has('service_id'))
                            <span class="message-show">{{ $errors->first('service_id') }}</span>
                            @endif
                            <div class="col-12 field-style custom-select-field">
                                <select class="form-control select2" name="service_id[]" id="service_id" multiple>
{{--                                    <option value="">Choose an Option</option>--}}
{{--                                    <option value="">Choose an Option</option>--}}
                                    @forelse($services as $item)
{{--                                        <option @if(old('service_id')==$item->id) selected @else @if($Portfolio->service_id == $item->id) selected @endif @endif value="{{ $item->id }}" {{ old('service_id') === $item->id ? "selected" : "" }}>{{ $item->title }}</option>--}}
                                        <option value="{{ $item->id }}" {{ in_array($item->id, $portfolioCategories) ? "selected" : "" }} {{ old('service_id') === $item->id ? "selected" : "" }}>{{ $item->title }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            {!! Form::label('service_id','Select Service',['class'=>'col-12']) !!}
                        </div>

                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Portfolio Header Banner</span>
                            </div>

                            <div class="widget-content widget-content-padding widget-content-padding-side">
                                <div class="form-group row no-gutters">
                                    @if($errors->has('thumbnail'))
                                    <span class="message-show">{{ $errors->first('thumbnail') }}</span>
                                    @endif
                                    <div class="col-12 field-style custom-select-field">
                                        <div class="thumbnail-image-upload">
                                            <div>
                                                <label for="thumbnail-image" id="thumbnail-label" class="thumbnail-label"><img id="thumbnail-preview" src="@if($Portfolio->thumbnail && isset(\App\Model\Attachments::find($Portfolio->thumbnail)->path)) {{asset('storage/portfolio/thumbnail').'/'.\App\Model\Attachments::find($Portfolio->thumbnail)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                                <input onchange="readURL(this)" name="thumbnail" type="file" class="thumbnail-image" id="thumbnail-image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Logo</span>
                            </div>

                            <div class="widget-content widget-content-padding widget-content-padding-side">
                                <div class="form-group row no-gutters">
                                    @if($errors->has('logo'))
                                    <span class="message-show">{{ $errors->first('logo') }}</span>
                                    @endif
                                    <div class="col-12 field-style custom-select-field">
                                        <div class="thumbnail-image-upload">
                                            <div>
                                                <label for="logo-image" id="logo-label" class="thumbnail-label"><img id="logo-preview" src="@if($Portfolio->logo && isset(\App\Model\Attachments::find($Portfolio->logo)->path)) {{asset('storage/portfolio/logo').'/'.\App\Model\Attachments::find($Portfolio->logo)->path}} @else{{ asset('assets/admin/img/base/icons/image.svg') }}@endif"></label>
                                                <input onchange="readURL(this)" name="logo" type="file" class="logo-image" id="logo-image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submit-form-btn">Update Portfolio</button>
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
<script src="{{asset('plugin/select2/select2.min.js')}}"></script>
<link href="{{ asset('editor/summernote.min.css') }}" rel="stylesheet">
<script src="{{ asset('editor/summernote.min.js') }}"></script>
<script>
    $('#editor').summernote({
        tabsize: 2,
        height: 300
    });
</script>
{{-- Add Service Portfolio --}}
<script>
    jQuery(document).ready(function() {
        var j = @php echo $Portfolio_count;
        @endphp;
        jQuery("#addPortfolio").click(function() {
            j += 1;
            jQuery("#portfolio_items_list").append("<div class='text-field col-12' id='field-portfolio-item-" + j + "'><div class='row align-items-center'><div class='col-2'><div class=\"thumbnail-image-upload\"><div><label for='thumbnail-image-portfolio-" + j + "' id='thumbnail-label-" + j + "' class=\"thumbnail-label no-text\"><img id='thumbnail-preview-text-" + j + "' src=\"{{ asset('assets/admin/img/base/icons/image.svg') }}\"></label><input required onchange=\"readURL(this)\" name=\"portfolio[][image]\" type=\"file\" class=\"thumbnail-image\" id='thumbnail-image-portfolio-" + j + "' accept=\"image/*\"></div></div></div><div class='col-10'><input placeholder='Portfolio Tag...' class='input-field' type=\"text\" name=\"portfolio[][name]\" id=\"portfolio_item\"> <span class='delete-row icon-close' onclick='delete_portfolio_item(" + j + ")'><img src='{{ asset('assets/admin/img/base/icons') }}/close.svg'></span></div></div>");
            return false;
        });
        $.ajax({
            url: "{{ route('portfolio.content', $Portfolio->id) }}",
            type: 'GET',
            dataType: 'json',
            success: function(result, status) {
                console.log(result)
                $('#editor').summernote('code', result.content);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    function delete_portfolio_item($id) {
        $('#field-portfolio-item-' + $id).remove();
    }
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
<script>
    $('.select2').select2({
        placeholder: 'Choose an Option'
    });
</script>
@endsection
