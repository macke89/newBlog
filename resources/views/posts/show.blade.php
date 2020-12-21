@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            {{-- SHOW TITLE --}}
            <h1>{{ $post->title }}</h1>
            {{-- SHOW TEXT --}}
            <p>{{ $post->text }}</p>
            {{-- LEAVE COMMENT--}}
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <label for="comment-text" class="mt-3">Comment</label>
                <textarea name="text" id="comment-text" rows="5" class="form-control">{{ old('text') }}</textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="parent_id" value="">

                <input type="submit" class="btn btn-primary mt-3" value="Create" name="submit">
            </form>
            {{-- PRINT COMMENTS --}}
            @foreach($comments as $comment)
                @if($comment->post_id == $post->id && $comment->parent_id == NULL)
                    <div class="card-body">
                        <p class="card-text">{{ $comment->text }}</p>
                        <h6>by {{ $comment->user->name }}</h6>
                        <h6>at {{ $comment->created_at }}</h6>
                    </div>

                    <button class="btn btn-secondary mb-2" type="button" data-toggle="collapse" data-target="#collapseExample{{ $comment->id }}" aria-expanded="false" aria-controls="collapseExample">
                        answer
                    </button>

                    {{-- ANSWER TO COMMENTS--}}
                    <div class="collapse" id="collapseExample{{ $comment->id }}">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <label for="reply-text" class="mt-3">Answer Comment</label>
                            <textarea name="text" id="repply-text" rows="5" class="form-control">{{ old('text') }}</textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <input type="submit" class="btn btn-outline-secondary mt-3 mb-3" value="send" name="submit">
                        </form>
                    </div>
                    {{-- PRINT ANSWERS--}}
                    @foreach($replies as $reply)
                        @if($reply->parent_id == $comment->id)
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        {{ $reply->text }}
                                    </div>
                                    <div class="card-header">
                                        <h6>by {{ $reply->user->name }}</h6>
                                        <h6>at {{ $reply->created_at }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                @endif
            @endforeach
        </div>
    </div>

@endsection
