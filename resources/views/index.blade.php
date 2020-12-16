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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="/?post_id={{ $post->id }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
