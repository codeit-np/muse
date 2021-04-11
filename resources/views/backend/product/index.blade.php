@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products/create" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus-square"></i> Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Company</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <th>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">
                                                <img src="{{ asset($product->image) }}" width="24" alt="">
                                                <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <img src="{{ asset($product->image) }}" width="250" alt="">
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Modal -->
                                          
                                        </th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->company }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <a href="/products/{{ $product->id }}/edit">Edit</a>
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