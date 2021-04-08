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
                        <form action="/services" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Service Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name">
                            </div>

                            <div class="form-group">
                                <label for="starting_price">Starting Price <span class="text-danger">*</span></label>
                                <input id="starting_price" class="form-control" type="text" name="starting_price">
                            </div>
                            @error('starting_price')
                            <div class="text-danger">  {{ $message }}</div>
                          @enderror

                            <div class="form-group">
                                <label for="description">Description (Optional)</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image (optional)</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-save"></i> Save Record</button>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection