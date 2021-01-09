@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="my-4">Post Edit</h1>
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{--TITLE--}}
                <label for="title" class="mt-3">{{ __('Title') }}</label>

                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" name="title">

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--CONTENT--}}
                <label for="text" class="mt-3">{{ __('Content') }}</label>
                <textarea name="text" id="text" rows="20" class="form-control @error('text') is-invalid @enderror">{{ $post->text }}</textarea>

                @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--TAGS--}}
                <label for="tags">{{ __('Tags') }}</label>
                <select name="tags[]" id="tags" multiple class="form-control select2 @error('tags') is-invalid @enderror">
                    @foreach($tags as $tag)
                        <option
                            value="{{ $tag->id }}"
                            @if ($post->tags->contains($tag)) selected @endif>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>

                @error('tags')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--PHOTO--}}
                <label for="photo">{{ __('Photo') }}</label>
                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo">

                @error('photos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{--BUTTON--}}
                <input type="submit" class="btn btn-primary mt-3" value="Update" name="submit">
            </form>
        </div>
    </div>
@endsection
