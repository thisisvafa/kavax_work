@extends('layouts.admin.dashboard.master')

@section('page-title', 'Project Edit')

@section('title-page')
<span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
        <path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0" />
        <path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0" />
    </svg></span>
<span class="text">Project Edit</span>
@endsection

@section('content')
<section class="form-section">
    <form action="{{ route('projects.update' , $project->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-5">
                <div class="row">
                    {{-- Project Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Project Content</span>
                            </div>

                            <div class="widget-content widget-content-padding">
                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.name'))
                                    <span class="col-12 message-show">{{ $errors->first('project.name') }}</span>
                                    @endif
                                    {!! Form::text('project[name]', $project->name,[ 'id'=>'name' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Project Name', 'required']) !!}
                                    <div class="col-12">{!! Form::label('name',"Project Name") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.description'))
                                    <span class="col-12 message-show">{{ $errors->first('project.description') }}</span>
                                    @endif
                                    {!! Form::textarea('project[description]',$project->description,[ 'id'=>'description' , 'class'=>'col-12 field-style input-text',
                                    'style' => 'min-height: 80px;', 'placeholder'=>'Enter Project Description', 'rows' => 2]) !!}
                                    <div class="col-12">
                                        {!! Form::label('description',"Project Description") !!}
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.objective'))
                                    <span class="col-12 message-show">{{ $errors->first('project.objective') }}</span>
                                    @endif
                                    {!! Form::textarea('project[objective]',$project->objective,[ 'id'=>'objective' , 'class'=>'col-12 field-style input-text', 'style' => 'min-height: 80px;', 'placeholder'=>'Enter Project Objective']) !!}
                                    <div class="col-12">
                                        {!! Form::label('objective',"Project Objective") !!}
                                    </div>
                                </div>


                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.budget'))
                                    <span class="col-12 message-show">{{ $errors->first('project.budget') }}</span>
                                    @endif
                                    {!! Form::text('project[budget]',$project->budget,[ 'id'=>'budget' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Project Budget']) !!}
                                    <div class="col-12">
                                        {!! Form::label('budget',"Project Budget") !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    {{-- Project Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Project Content</span>
                            </div>

                            <div class="widget-content widget-content-padding">

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.start_date'))
                                    <span class="col-12 message-show">{{ $errors->first('project.start_date') }}</span>
                                    @endif
                                    {!! Form::input('datetime-local','project[start_date]',date('Y-m-d\TH:i', strtotime($project->start_date)),[ 'id'=>'start_date' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Project Start Date']) !!}
                                    <div class="col-12">
                                        {!! Form::label('start_date',"Project Start Date") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.end_date'))
                                    <span class="col-12 message-show">{{ $errors->first('project.end_date') }}</span>
                                    @endif
                                    {!! Form::input('datetime-local','project[end_date]',date('Y-m-d\TH:i', strtotime($project->end_date)),[ 'id'=>'end_date' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Project End Date']) !!}
                                    <div class="col-12">
                                        {!! Form::label('end_date',"Project End Date") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.status'))
                                    <span class="message-show">{{ $errors->first('project.status') }}</span>
                                    @endif
                                    <div class="col-12 field-style">
                                        <select class="form-control" name="project[status]" id="status">
                                            <option value="1" {{$project->status == 1 ? 'selected' : '' }}>Running</option>
                                            <option value="2" {{$project->status == 2 ? 'selected' : '' }}>Pause</option>
                                            <option value="3" {{$project->status == 3 ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>

                                    {{-- Publish Status --}}
                                    {!! Form::label('status','Project Status',['class'=>'col-12']) !!}
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.progress'))
                                    <span class="col-12 message-show">{{ $errors->first('project.progress') }}</span>
                                    @endif
                                    {!! Form::number('project[progress]',$project->progress,[ 'id'=>'progress' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Project Progress']) !!}
                                    <div class="col-12">
                                        {!! Form::label('progress',"Project Progress(%)") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    @if($errors->has('project.employee_size'))
                                    <span class="col-12 message-show">{{ $errors->first('project.employee_size') }}</span>
                                    @endif
                                    {!! Form::number('project[employee_size]',$project->employee_size,[ 'id'=>'employee_size' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Employee size']) !!}
                                    <div class="col-12">
                                        {!! Form::label('employee_size',"Employee size") !!}
                                        <span class="required">(Required)</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="row">
                    {{-- Project Content --}}
                    <div class="col-12">
                        <div class="widget-block widget-item widget-style">
                            <div class="heading-widget">
                                <span class="widget-title">Project Content</span>
                            </div>

                            <div class="widget-content widget-content-padding">

                                <div class="form-group row no-gutters">
                                    @if($errors->has('categories'))
                                    <span class="message-show">{{ $errors->first('categories') }}</span>
                                    @endif
                                    <div class="col-12 field-style">
                                        <select class="form-control" name="categories[]" id="categories" multiple>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->ifExistsInProject($project->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Publish Status --}}
                                    {!! Form::label('categories','Project Category',['class'=>'col-12']) !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submit-form-btn create-btn">Update Project</button>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </form>
</section>

@endsection