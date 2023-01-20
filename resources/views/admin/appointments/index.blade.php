@extends('layouts.admin.dashboard.master')

@section('page-title', 'All Appointments')

@section('title-page')
<span class="icon"><svg height="512" viewBox="0 0 512.013 512.013" width="512" xmlns="http://www.w3.org/2000/svg">
        <path d="m451.013 293.793-4.394-4.394c-1.984-1.985-20.409-19.393-55.606-19.393s-53.622 17.408-55.606 19.393l-4.394 4.394v36.213h-60v182h241v-182h-61zm-90 13.722c5.305-3.174 15.248-7.508 30-7.508s24.695 4.334 30 7.508v22.492h-60zm-60 174.492v-62h75v31h30v-31h76v62zm181-92h-181v-30h181z" />
        <path d="M181.013 330.007v152h-30v30h90v-30h-30v-242h141.213l45-45-45-45H211.013v-120h30v-30h-90v30h30v30H68.8l-45 45 45 45h112.213v90H45l-45 45 45 45zm158.787-150 15 15-15 15H211.013v-30zm-258.573-60-15-15 15-15h99.787v30zm-23.8 150h123.586v30H57.427l-15-15z" />
    </svg></span>
<span class="text">All Appointments</span>
@endsection

@section('content')
<section class="report-table">
    @if(count($appointments))
    <div class="row">
        <div class="col-12">
            <div class="widget-block widget-item widget-style">
                <div class="heading-widget">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="widget-title">All Appointments</span>
                        </div>
                        <div class="col-4 left">
                            <select class="form-control" name="email" id="email">
                                <option value="">Select Email</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->email }}" {{ $mail ? $user->email == $mail->mail_to ? 'selected' : '' : '' }}>{{ $user->fullName ." - ". $user->email }}</option>
                                @endforeach
                            </select>
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
                                <th>Time</th>
                                <th>User</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $item)
                            @if(isset($item->user))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->time ? $item->time->time . " ". $item->time->part->name : 'Time not set!'}}</td>
                                <td>{{ $item->user->fullName }}</td>
                                <td>
                                    Name: {{ $item->name }} <br>
                                    Phone: {{ $item->phone }} <br>
                                    Email: {{ $item->email }}
                                </td>
                                <td>
                                    <button onclick="openModal({{ $item->id }})" class="btn btn-primary"><i class="zmdi zmdi-notifications-add"></i></button>
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
                                <th>Time</th>
                                <th>User</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" colspan="8">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            Show items {{ $appointments->firstItem() }} to {{ $appointments->lastItem() }} from {{ $appointments->total() }} item (pages {{ $appointments->currentPage() }} from {{ $appointments->lastPage() }})
                                        </div>
                                        <div class="col-8 left">
                                            <div class="pagination-table">
                                                {{ $appointments->links('vendor.pagination.default') }}
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
        <h2>No appointment found!</h2>
    </div>
    @endif



    <div class="modal fade" id="sendMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notify Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="notify" method="post">
                    <input type="hidden" name="appointment_id" id="appointment_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Email</label>
                            <select class="form-control" name="email" id="email2">
                                <option value="">Select Email</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->fullName ." - ". $user->email }}">{{ $user->fullName ." - ". $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="sentMail()" class="btn btn-primary">Notify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $('#email').on('change', function() {
            var email = $(this).val();
            if (email) {
                $.post("{{ route('appointment.mailsetting') }}", {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    function(data, status) {
                        alert("Mail Setting Updated Successfully");
                    });
            }
        });
    });

    function sentMail() {
        alert("Please wait...");
        var email = $('#email2').val();
        var appointment_id = $('#appointment_id').val();
        if (email) {
            $.post("{{ route('appointment.sendMail') }}", {
                    email: email,
                    appointment_id: appointment_id,
                    _token: "{{ csrf_token() }}"
                },
                function(data, status) {
                    alert("Mail Sent Successfully");
                });
        }
    }

    function openModal(id) {
        $('#sendMail').modal('show');
        $('#appointment_id').val(id);
    }
</script>
@endsection
