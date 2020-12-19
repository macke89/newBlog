@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            {{-- SHOW TITLE --}}
            <h1>{{ $post->title }}</h1>
            {{-- SHOW TEXT --}}
            <p>{{ $post->text }}</p>
            {{-- LEAVE COMMENT--}}
{{--            <form action="{{ route('posts.store') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <label for="text" class="mt-3">Comment</label>--}}
{{--                <textarea name="text" id="text" rows="5" class="form-control">{{ old('text') }}</textarea>--}}

{{--                <input type="submit" class="btn btn-primary mt-3" value="create" name="submit">--}}
{{--            </form>--}}
            {{-- PRINT COMMENTS --}}
            @foreach($comments as $comment)
                @if($comment->post_id == $post->id)
                    <div class="card-body">
                        <p class="card-text">{{ $comment->text }}</p>
                        <h6>by {{ $comment->author }}</h6>
                        <h6>at {{ $comment->created_at }}</h6>
                        <a href="#" class="btn btn-primary">Answer</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
