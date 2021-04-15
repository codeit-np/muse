@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Appointments
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Appoint With</th>
                                    <th>Services</th>
                                    <th>Customer</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->employee }}</td>
                                        <td>{{ $appointment->service }}</td>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->user->mobile }}</td>
                                        <td>{{ $appointment->approved == 0 ? 'Pending' : 'Approved' }}</td>
                                        <td>
                                            <a href="/appointments/{{ $appointment->id }}/edit">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection