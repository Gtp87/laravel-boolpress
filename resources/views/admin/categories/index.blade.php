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
                    Categories
                </h1>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th  class="text-center" colspan="3" >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td class="text-capitalize">{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td colspan="3">
                                <a class="btn btn-success" href="{{ route('admin.categories.show', $category->slug) }}">View</a>
                            </td>
                            <td>
                                @if ($category->name != 'general')
                                <a class="btn btn-success" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                @endif
                            </td>
                            <td>
                                @if ($category->name != 'general')
                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">{{ $categories->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection