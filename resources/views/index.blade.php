@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-4 mt-3">
                    <div class="card" style="width: 18rem;">
                        {{--                        <img class="card-img-top" src="https://unsplash.com/photos/LhUdP1CQ6vE" alt="Card image cap">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Illuminate\Support\Str::limit($post->text, 120) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
