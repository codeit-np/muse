@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                     <a href="/categories" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                   </div>
                   <div class="card-body">
                        <form action="/categories/{{ $category->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Category Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $category->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-save"></i> Save Record</button>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection