@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{-- <a class="btn btn-success" href="{{ route('admin.posts.index') }}">View Posts</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
            <div class="col">
                <h1>
                    Welcome {{ Auth::user()->name }} 
                </h1>
            </div>
        </div>
</div>
@endsection
