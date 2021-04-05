@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                     <a href="/products" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                   </div>
                   <div class="card-body">
                        <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Product Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" value={{ $product->name }}>
                            </div>

                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input id="price" class="form-control" type="text" name="price" value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label for="company">Company <span class="text-danger">*</span></label>
                                <input id="company" class="form-control" type="text" name="company" value="{{ $product->company }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description (Optional)</label>
                                <textarea id="description" class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image (optional)</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-sync"></i> Update Record</button>
                        </form>

                        <div class="my-2">
                            <img src="{{ asset($product->image) }}" width="120" alt="">
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection