@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-6">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ $post->photo }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {{ Illuminate\Support\Str::limit($post->text, 120) }}
                            <br/>
                            <br/>
                            {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-4" style="width: 100%">
        {{ $posts->links() }}
    </div>
@endsection
