@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <h1>{{ $post->title }}</h1>

            <p>{{ $post->text }}</p>
            @foreach($comments as $comment)
                <div class="card-body">
                    <p class="card-text">{{ $comment->text }}</p>
                    <a href="#" class="btn btn-primary">Answer</a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
