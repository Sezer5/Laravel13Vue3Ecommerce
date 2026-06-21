@extends('admin.layouts.adminlayout')
@section('title')
    Product
@endsection
@section('container')
    <main class="p-4">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Product Update</h2>
            <div class="card p-4">
                <div class="col-md-6">
                    <form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{old('name',$product->name)}}"
                            />
                            @error('name')
                                <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select
                                class="form-select form-select-sm"
                                name="category_id"
                            >
                                <option selected disabled>Select one</option>
                                @foreach ($categories as $category)
                                    <option value="{{old('category_id',$category->id)}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Colors</label>
                            <select
                                multiple
                                class="form-select form-select-sm"
                                name="color_id[]"
                            >
                                <option selected disabled>Select colors</option>
                                @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sizes</label>
                            <select
                                multiple
                                class="form-select form-select-sm"
                                name="size_id[]"
                            >
                                <option selected disabled>Select sizes</option>
                                @foreach ($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input
                                type="file"
                                class="form-control"
                                name="thumbnail"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">First Image</label>
                            <input
                                type="file"
                                class="form-control"
                                name="first_image"
                            />
                        </div>
                        
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
@endsection
