@extends('layouts.admin.dashboard.master')

@section('page-title', 'Task Edit')

@section('title-page')
    <span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0"/><path d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0"/></svg></span>
    <span class="text">Task Edit</span>
@endsection

@section('content')
    <section class="form-section">
        <form action="{{ route('tasks.update' , $task->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        {{-- Task Content --}}
                        <div class="col-12">
                            <div class="widget-block widget-item widget-style">
                                <div class="heading-widget">
                                    <span class="widget-title">Task Content</span>
                                </div>
    
                                <div class="widget-content widget-content-padding">
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('name'))
                                            <span class="col-12 message-show">{{ $errors->first('name') }}</span>
                                        @endif
                                        {!! Form::text('name',$task->name,[ 'id'=>'name' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Task Name', 'required']) !!}
                                        <div class="col-12">{!! Form::label('name',"Task Name") !!}
                                            <span class="required">(Required)</span></div>
                                    </div>
    
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('description'))
                                            <span class="col-12 message-show">{{ $errors->first('description') }}</span>
                                        @endif
                                        {!! Form::textarea('description',$task->description,[ 'id'=>'description' , 'class'=>'col-12 field-style input-text',
                                        'style' => 'min-height: 80px;', 'placeholder'=>'Enter Task Description',  'rows' => 2]) !!}
                                        <div class="col-12">
                                            {!! Form::label('description',"Task Description") !!}
                                        </div>
                                    </div>
    
    
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        {{-- Task Content --}}
                        <div class="col-12">
                            <div class="widget-block widget-item widget-style">
                                <div class="heading-widget">
                                    <span class="widget-title">Task Content</span>
                                </div>
    
                                <div class="widget-content widget-content-padding">
                                
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('start_date'))
                                            <span class="col-12 message-show">{{ $errors->first('start_date') }}</span>
                                        @endif
                                        {!! Form::input('datetime-local','start_date',date('Y-m-d\TH:i', strtotime($task->start_date)),[ 'id'=>'start_date' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Task Start Date']) !!}
                                        <div class="col-12">
                                            {!! Form::label('start_date',"Task Start Date") !!}
                                            <span class="required">(Required)</span>
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters">
                                        @if($errors->has('end_date'))
                                            <span class="col-12 message-show">{{ $errors->first('end_date') }}</span>
                                        @endif
                                        {!! Form::input('datetime-local','end_date',date('Y-m-d\TH:i', strtotime($task->end_date)),[ 'id'=>'end_date' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Task End Date']) !!}
                                        <div class="col-12">
                                            {!! Form::label('end_date',"Task End Date") !!}
                                            <span class="required">(Required)</span>
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters">
                                        @if($errors->has('priority'))
                                            <span class="message-show">{{ $errors->first('priority') }}</span>
                                        @endif
                                        <div class="col-12 field-style">
                                            <select class="form-control" name="priority" id="priority">
                                                <option value="0" {{ $task->priority == 0 ? 'selected' : '' }}>Low</option>
                                                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Medium</option>
                                                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>High</option>
                                            </select>
                                        </div>

                                        {!! Form::label('priority','Priority',['class'=>'col-12']) !!}
                                    </div>
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('status'))
                                            <span class="message-show">{{ $errors->first('status') }}</span>
                                        @endif
                                        <div class="col-12 field-style">
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" {{$task->status == 1 ? 'selected' : '' }}>Running</option>
                                                <option value="2" {{$task->status == 2 ? 'selected' : '' }}>Pause</option>
                                                <option value="3" {{$task->status == 3 ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </div>

                                        {!! Form::label('status','Status',['class'=>'col-12']) !!}
                            
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-4">
                    <div class="row">
                        {{-- Task Content --}}
                        <div class="col-12">
                            <div class="widget-block widget-item widget-style">
                                <div class="heading-widget">
                                    <span class="widget-title">Assign to</span>
                                </div>
    
                                <div class="widget-content widget-content-padding">
    
                                    <div class="form-group row no-gutters">
                                        @if($errors->has('assigned_to'))
                                            <span class="message-show">{{ $errors->first('assigned_to') }}</span>
                                        @endif
                                        <div class="col-12 field-style">
                                            <select class="form-control" name="assigned_to" id="assigned_to">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $user->ifExistsInTask($task->id) ? 'selected' : '' }}>{{ $user->fullName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters">
                                        @if($errors->has('progress'))
                                            <span class="message-show">{{ $errors->first('progress') }}</span>
                                        @endif

                                        {!! Form::number('progress',$task->progress,[ 'id'=>'progress' , 'class'=>'col-12 field-style input-text', 'placeholder'=>'Enter Task Progress']) !!}

                                        {!! Form::label('progress','Progress(%)',['class'=>'col-12']) !!}
                            
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="submit-form-btn create-btn">Update Task</button>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </form>
    </section>

@endsection