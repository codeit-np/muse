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
                                    <th>Services</th>
                                    <th>Customer</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->name }}</td>
                                        <td>{{ $appointment->service->name }}</td>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->user->mobile }}</td>
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