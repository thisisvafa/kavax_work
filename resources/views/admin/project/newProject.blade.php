@extends('layouts.admin.dashboard.master')

@section('page-title', 'Create Project')

@section('title-page')
    <span class="icon"><svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M422 0H0v452c0 33.086 26.914 60 60 60h392.0078C485.086 512 512 485.086 512 452V241h-90zM60 482c-16.543 0-30-13.457-30-30V30h362v422c0 10.9258 2.9492 21.168 8.0703 30zm422-211v181c0 16.543-13.4531 30-30 30-16.543 0-30-13.457-30-30V271zm0 0" />
            <path
                d="M60 181h302V60H60zm30-91h242v61H90zM60 211h151v30H60zM241 211h121v30H241zM60 271h151v30H60zM241 271h121v30H241zM60 331h151v30H60zM60 391h151v30H60zM241 421h121v-90H241zm30-60h61v30h-61zm0 0" />
        </svg></span>
    <span class="text">Create Project</span>
@endsection

@section('content')
    <section class="form-section">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('createproject') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name of Project</label>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                            placeholder="Enter project name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">What is the primary objective for the project</label>
                        <input type="text" name="objective" class="form-control" id="exampleFormControlInput1"
                            placeholder="Goal of the project">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Budget</label>
                        <input type="number" min="0" name="budget" class="form-control" id="exampleFormControlInput1"
                            placeholder="&#163;">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">What is the name of your business</label>
                        <input type="text" name="business_name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Business name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">How many employees work for your business</label>
                        <input type="number" min="0" name="employee_size" class="form-control" id="exampleFormControlInput1"
                            placeholder="Employee size">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Created By</label>
                        <select class="form-control" name="created_by" id="exampleFormControlSelect1">
                            @foreach ($user_data as $user)
                                @if ($user->role == 'customer')
                                    <option value="{{ $user->id }}">{{ $user->fullName }} &emsp; {{ $user->email }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">Categories</div>
                    @foreach ($category_data as $data)
                        <div class="form-check">
                            <input class="form-check-input" name="project_category[]" type="checkbox" value="{{ $data->id }}">
                            <label class="form-check-label">
                                {{ $data->name }}
                            </label>
                        </div>
                    @endforeach
                    <br>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-block">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
