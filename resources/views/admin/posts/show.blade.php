@extends('layouts.app')

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
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $post->content }}
            </div>
        </div>
        <a  class="btn btn-success"  aria-current="page" href="{{ route('admin.posts.index') }}">Back</a>
    </div>
@endsection