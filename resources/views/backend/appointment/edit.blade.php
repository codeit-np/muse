@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                     <a href="/appointments" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                   </div>
                   <div class="card-body">
                        <form action="/appointments/{{ $appointment->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="text" name="user_id" id="" value="{{ $appointment->user_id }}" hidden>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date">Appointment Date</label>
                                        <input id="date" class="form-control" type="date" name="date" value="{{ $appointment->date }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="date">Time <span class="text-danger">*</span></label>
                                        <input id="date" class="form-control" type="time" name="time" required>
                                    </div>
                                </div>
                            </div>
                             
                             <div class="form-group">
                                 <label for="name">Customer Name</label>
                                 <input id="name" class="form-control" type="text" name="" value="{{ $appointment->user->name }}" >
                             </div>
                             <div class="form-group">
                                <label for="service">Service</label>
                                <input id="service" class="form-control" type="text" name="service" value="{{ $appointment->service }}">
                            </div>

                            <div class="form-group">
                                <label for="employee">Assign Employee <span class="text-danger">*</span></label>
                                <input id="employee" class="form-control" type="text" name="employee" required>
                            </div>

                            <div class="form-group">
                                <label for="approved">Approve</label>
                                <select id="approved" class="form-control" name="approve">
                                    <option value="1">Approved</option>
                                    <option value="0">Not Approved</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-sync"></i> Update Record</button>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection