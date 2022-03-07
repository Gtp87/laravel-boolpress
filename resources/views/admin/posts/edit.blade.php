@extends('layouts.admin')

@section('documentTitle')
    Edit {{$post->title}}
@endsection

@section('content')
<div class="container">
<div class="row">
    <form action="{{ route('admin.posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <select class="form-select" name="category_id">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                    {{ $category->name }} - {{ $category->id }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="alert alert-danger mt-3">
                {{ $message }}
            </div>
        @enderror
    </div>
        @error('tags.*')
        <div class="alert alert-danger mt-3">
            {{ $message }}
        </div>
    @enderror
    <fieldset class="mb-3">
        <legend>Tags</legend>
        {{-- se abbiamo gia compilato il form e siamo tornati indietro per validazione errata allora facciamo un foreach e controlliamo old('tags') --}}
        @if ($errors->any())
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        @else
            {{-- Altrimenti prendiamo i dati dal db e checchiamo i nostri checkbox corrispondenti --}}
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                        {{ $post->tags()->get()->contains($tag->id)? 'checked': '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        @endif
    </fieldset>
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
    @if (!empty($post->image))
        <div class="mb-3">
            <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
        </div>
    @endif
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a  class="btn btn-success"  aria-current="page" href="{{ route('admin.posts.index') }}">Back</a>
    </form>
</div>
</div>
@endsection