@extends('layouts.app')

@section('documentTitle')
    Edit
@endsection

@section('content')
<div class="container">
<div class="row">
    <form action="{{ route('admin.posts.update', $post) }}" method="post">
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
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="{{$post->author}}">
        @error('author')
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
    <div class="mb-3">
        <label for="slug" class="form-label">slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
        @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</div>
@endsection