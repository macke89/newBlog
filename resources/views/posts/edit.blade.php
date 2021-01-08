@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="my-4">Post Edit</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @method('PUT')
                @csrf

                {{--TITLE--}}
                <label for="title" class="mt-3">{{ __('Title') }}</label>

                <input id="title" type="text" class="form-control" value="{{ $post->title }}" name="title">

                {{--CONTENT--}}
                <label for="text" class="mt-3">{{ __('Content') }}</label>
                <textarea name="text" id="text" rows="20" class="form-control">{{ $post->text }}</textarea>

                {{--TAGS--}}
                <label for="tags">{{ __('Tags') }}</label>
                <select name="tags[]" id="tags" multiple class="form-control select2">
{{--                    @foreach($tags as $tag)--}}
{{--                        <option @if ($post->tags->contains($tag)) selected @endif>--}}
{{--                            {{ $tag->name }}--}}
{{--                        </option>--}}
{{--                        <br/>--}}
{{--                    @endforeach--}}

                    @foreach($tags as $tag)
                        <option
                            value="{{ $tag->id }}"
                            @if ($post->tags->contains($tag)) selected @endif>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>

                {{--PHOTO--}}
                <label for="photo">{{ __('Photo') }}</label>
                <input id="photo" type="file" class="form-control" name="photo" autocomplete="photo">

                {{--BUTTON--}}
                <input type="submit" class="btn btn-primary mt-3" value="Update" name="submit">
            </form>
        </div>
    </div>
@endsection
