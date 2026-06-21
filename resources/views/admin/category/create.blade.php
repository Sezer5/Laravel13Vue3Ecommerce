@extends('admin.layouts.adminlayout')
@section('title')
    Categories
@endsection
@section('container')
    <main class="p-4">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Category Add</h2>
            <div class="card p-4">
                <div class="col-md-6">
                    <form action="{{route('admin.category.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{old('name')}}"
                            />
                            @error('name')
                                <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                            @enderror
                            
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
