@extends('admin.layouts.adminlayout')
@section('title')
    Colors
@endsection
@section('container')
    <main class="p-4">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Colors</h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 text-success fs-1">
                                <a href="{{route('admin.color.create')}}" class="btn btn-success"><i class="bi bi-plus"></i> Add</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <div class="col-md-6">
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
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                    <tr>
                                        <td>{{$color->id}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>
                                            <a href="{{route('admin.color.edit',$color->id)}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger" onclick="deleteItem({{$color->id}})"><i class="bi bi-trash"></i></a>
                                            <form action="{{route('admin.color.destroy',$color->id)}}" id="{{$color->id}}" method="POST">
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
