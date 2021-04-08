@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                     <a href="/services" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                   </div>
                   <div class="card-body">
                        <form action="/services/{{ $service->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Service Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $service->name }}">
                            </div>

                            <div class="form-group">
                                <label for="starting_price">Starting Price <span class="text-danger">*</span></label>
                                <input id="starting_price" class="form-control" type="text" name="starting_price" value="{{ $service->starting_price }}">
                            </div>
                            @error('starting_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="description">Description (Optional)</label>
                                <textarea id="description" class="form-control" name="description" rows="3">{{ $service->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image (optional)</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-sync"></i> Update Record</button>
                        </form>

                        <div class="my-2">
                            <img src="{{ asset($service->image) }}" width="120" alt="">
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection