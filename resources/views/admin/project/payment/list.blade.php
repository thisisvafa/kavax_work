@extends('layouts.admin.dashboard.master')

@section('page-title', 'All Payment Histories')

@section('title-page')
<link rel="stylesheet" href="{{ asset('font-awesome-4.7.0') }}/css/font-awesome.min.css">
<span class="icon"><svg height="512" viewBox="0 0 512.013 512.013" width="512" xmlns="http://www.w3.org/2000/svg">
        <path d="m451.013 293.793-4.394-4.394c-1.984-1.985-20.409-19.393-55.606-19.393s-53.622 17.408-55.606 19.393l-4.394 4.394v36.213h-60v182h241v-182h-61zm-90 13.722c5.305-3.174 15.248-7.508 30-7.508s24.695 4.334 30 7.508v22.492h-60zm-60 174.492v-62h75v31h30v-31h76v62zm181-92h-181v-30h181z" />
        <path d="M181.013 330.007v152h-30v30h90v-30h-30v-242h141.213l45-45-45-45H211.013v-120h30v-30h-90v30h30v30H68.8l-45 45 45 45h112.213v90H45l-45 45 45 45zm158.787-150 15 15-15 15H211.013v-30zm-258.573-60-15-15 15-15h99.787v30zm-23.8 150h123.586v30H57.427l-15-15z" />
    </svg></span>
<span class="text">All Payment Histories</span>
@endsection

@section('content')
<section class="report-table">
    @if(count($payments))
    <div class="row">
        <div class="col-12">
            <div class="widget-block widget-item widget-style">
                <div class="heading-widget">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="widget-title">All Payment Histories</span>
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    @csrf
                    {{ method_field('DELETE') }}
                    <table class="table align-items-center">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>Date</th>
                                <th>Code</th>
                                <th>User</th>
                                <th>Project</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $item)
                            @if (isset($item->project->user))

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->invoice_number }}</td>
                                <td>{{ $item->project->user->fullName }}</td>
                                <td>{{ $item->project->name }}</td>
                                <td>{{ $item->totalAmount() }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if($item->file)
                                    <a target="_blank" href="{{ route('projects.invoice', $item->id) }}" style="color: #fff" class="btn btn-dark">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a target="_blank" href="https://kavax.co.uk/client/image/{{$item->file_name}}" style="color: #fff" class="btn btn-dark">
                                        <i class="fa fa-file"></i>
                                    </a>
                                    @else
                                    <a target="_blank" href="{{ route('projects.invoice', $item->id) }}" style="color: #fff" class="btn btn-dark">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endif

                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr class="titles">
                                <th>
                                    #
                                </th>
                                <th>Date</th>
                                <th>Code</th>
                                <th>User</th>
                                <th>Project</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" colspan="8">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            Show items {{ $payments->firstItem() }} to {{ $payments->lastItem() }} from {{ $payments->total() }} item (pages {{ $payments->currentPage() }} from {{ $payments->lastPage() }})
                                        </div>
                                        <div class="col-8 left">
                                            <div class="pagination-table">
                                                {{ $payments->links('vendor.pagination.default') }}
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
    @else
    <div class="widget-block widget-item widget-style center no-item">
        <div class="icon"><img src="{{ asset('assets/admin/img/base/icons') }}/no-item.svg"></div>
        <h2>No payment found!</h2>
    </div>
    @endif
</section>
@endsection