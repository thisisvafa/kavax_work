@extends('layouts.admin.dashboard.master')

@section('page-title', 'All Users')

@section('title-page')
    <span class="icon"><img src="{{ asset('assets/admin/img/base/icons') }}/user.svg"></span>
    <span class="text">All Users</span>
@endsection

@section('content')
    <section class="report-table">
        <div class="row">
            <div class="col-12">
                <div class="widget-block widget-item widget-style">
                    <div class="heading-widget">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="widget-title">All Users
                                    <a href="{{ url('admin/users/create') }}" class="mr-4 btn-success">Create New User</a>
                                </span>
                            </div>
                            <div class="col-4 left">
                                <form action="{{ url('admin/users') }}" method="get">
                                    <div class="input-group rounded">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Search user" value="{{ request('search') }}" name="search">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content">
                        <form action="{{ url('admin/users/destroy') }}" method="post" onsubmit="return confirm('<?php echo "Are you sure you want to delete the selected items?";?>');">
                            @csrf
                            <table class="table align-items-center">
                                <thead>
                                <tr>
                                    @can('isAdmin')
                                        <th class="delete-col">
                                            <input class="select-all" type="checkbox">
                                        </th>
                                    @endcan
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Register Date</th>
                                    @can('isAdmin')
                                        <th width="160px" class="center">Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($userData as $user)

                                    <tr>
                                        @can('isAdmin')
                                            <td class="delete-col">
                                                <input class="delete-checkbox" type="checkbox" name="delete_item[{{ $user->id }}]" value="1">
                                            </td>
                                        @endcan
                                        <td class="num-fa">{{ $user->id }}</td>
                                        <td>{{ $user->fullName }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="num-fa">{{ $user->created_at }}</td>
                                        @can('isAdmin')
                                            <td class="center">
                                                <a title="Tickets" href="{{ url('admin/tickets/'.$user->id) }}" class="table-btn table-btn-icon table-btn-icon-edit"><i class="zmdi zmdi-ticket-star"></i></a>
                                                <a title="projects" href="{{ url('admin/projects?user='.$user->id) }}" class="table-btn table-btn-icon table-btn-icon-edit"><i class="zmdi zmdi-apps"></i></a>
                                                <a title="edit" href="{{ route('users.edit', $user->id) }}" class="table-btn table-btn-icon table-btn-icon-edit"><i class="zmdi zmdi-edit"></i></a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot class="num-fa">
                                <tr class="titles">
                                    @can('isAdmin')
                                        <th class="delete-col">
                                            <button class="table-btn table-btn-icon table-btn-icon-delete">
                                                <span><img src="{{ asset('assets/admin/img/base/icons') }}/trash.svg" alt="ID" title="Delete"></span>
                                            </button>
                                        </th>
                                    @endcan
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Register Date</th>
                                    @can('isAdmin')
                                        <th width="80px" class="center">Actions</th>
                                    @endcan
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;" colspan="8">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                Show items {{ $userData->firstItem() }} to {{ $userData->lastItem() }} from {{ $userData->total() }} item (pages {{ $userData->currentPage() }} from {{ $userData->lastPage() }})
                                            </div>
                                            <div class="col-8 left">
                                                <div class="pagination-table">
                                                    {{$userData->links('vendor.pagination.default')}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
