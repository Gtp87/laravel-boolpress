@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="h1">Admin - All Posts</h1>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-2">Add new post</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
                <table class="table table-success">
                <thead>
                    <tr class="table-success">
                        <th>Title</th>
                        <th>Author</th>
                        <th class="w-50">Content</th>
                        <th>Slug</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="text-capitalize">{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->slug }}</td>
                        <td><a class="btn btn-success" href="{{ route('admin.posts.show', $post->slug) }}">View</a></td>
                        <td><a class="btn btn-success" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection