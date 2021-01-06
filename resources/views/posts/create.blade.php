@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Post') }}</div>

                    <div class="card-body">
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}

{{--                            @if ($errors->any())--}}
{{--                                <div class="alert alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        @foreach ($errors->all() as $error)--}}
{{--                                            <li>{{ $error }}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <label for="title" class="mt-3">Title</label>--}}
{{--                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" />--}}

{{--                                <label for="text" class="mt-3">Content</label>--}}
{{--                                <textarea name="text" id="text" rows="20" class="form-control">{{ old('text') }}</textarea>--}}

{{--                                <input id="photo" type="file" name="photo" class="form-control" />--}}

{{--                                <input type="submit" class="btn btn-primary mt-3" value="create" name="submit" />--}}
{{--                            </form>--}}
{{--                            -----------------------------------------------}}
                            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="text" type="text" rows="20" class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text">{{ old('text') }}</textarea>

                                        @error('text')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                    <div class="col-md-6">
                                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="photo">

                                        @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="submit" value="create">
                                            {{ __('Create Post') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
{{--                        ------------------------------------------------}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
