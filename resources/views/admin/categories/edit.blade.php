@extends('layouts.admin')
@section('content')
    <main>
        <div class="container mb-3 mt-3">
            <div class="row">
                <form action="{{ route('admin.categories.update', $category) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $category->name) }}">

                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="submit" class="btn btn-success"><a class='text-decoration-none text-dark'href="{{ route('admin.categories.index') }}">Back</a></button>
                </form>
            </div>
        </div>
    </main>
@endsection