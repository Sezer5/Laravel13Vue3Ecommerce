@extends('admin.layouts.adminlayout')
@section('title')
    Products
@endsection
@section('container')
    <main class="p-4">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Products</h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 text-success fs-1">
                                <a href="{{route('admin.product.create')}}" class="btn btn-success"><i class="bi bi-plus"></i> Add</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <div class="col-md-12">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-bordered"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Colors</th>
                                    <th scope="col">Sizes</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><img src="{{asset($product->thumbnail)}}" width="30"></td>
                                        <td>
                                            @foreach ($product->colors as $color)
                                                <div style="width: 10px; height: 10px; background-color: {{ $color->name }}; display: inline-block;"></div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($product->sizes as $size)
                                                <span class="bg-light border p-1">{{$size->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger" onclick="deleteItem({{$product->id}})"><i class="bi bi-trash"></i></a>
                                            <form action="{{route('admin.product.destroy',$product->id)}}" id="{{$product->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>
@endsection
