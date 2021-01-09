@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="my-4">Create New Post</h1>
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf

                {{--TITLE--}}
                <label for="title">
                    {{ __('Title') }}
                </label>

                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       value="{{ old('title') }}" required autocomplete="title" autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--CONTENT--}}
                <label for="text">
                    {{ __('Content') }}
                </label>

                <textarea id="text" type="text" rows="20" class="form-control @error('text') is-invalid @enderror"
                          name="text" required autocomplete="text">{{ old('text') }}</textarea>

                @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--TAGS--}}
                <label for="tags">
                    {{ __('Tags') }}
                </label>

                <select name="tags[]" id="tags" multiple class="form-control select2 @error('tags') is-invalid @enderror">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                @error('tags')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--PHOTO--}}
                <label for="photo">
                    {{ __('Photo') }}
                </label>

                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                       required autocomplete="photo">

                @error('photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br/>

                {{--SUBMIT--}}
                <button type="submit" class="btn btn-primary" name="submit" value="create">
                    {{ __('Create Post') }}
                </button>

            </form>
        </div>
    </div>
@endsection

