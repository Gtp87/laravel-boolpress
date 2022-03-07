@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    {{ $post->title }}
                </h1>
                <h2>Category: {{ $post->category()->first()->name }} </h2>
                <h3>Author: {{ $post->user()->first()->name }} </h3>
                <h4>Tag:   
                    @foreach ($post->tags()->get() as $tag)
                        {{ $tag->name }}
                    @endforeach
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $post->content }}
            </div>
            <div class="col">
                <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
            </div>
        </div>
        <a  class="btn btn-success"  aria-current="page" href="{{ route('admin.posts.index') }}">Back</a>
        @if (Auth::user()->id === $post->user_id)
            <a class="btn btn-success"
                href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
        @endif
    </div>
@endsection