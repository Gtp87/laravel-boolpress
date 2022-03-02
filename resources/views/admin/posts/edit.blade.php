@extends('layouts.admin')

@section('documentTitle')
    Edit {{$post->title}}
@endsection

@section('content')
<div class="container">
<div class="row">
    <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">content</label>
        <textarea class="form-control" id="content" name="content" >{{$post->content}}</textarea>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a  class="btn btn-success"  aria-current="page" href="{{ route('admin.posts.index') }}">Back</a>
    </form>
</div>
</div>
@endsection