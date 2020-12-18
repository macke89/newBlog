@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <h1>{{ $post->title }}</h1>

            <p>{{ $post->text }}</p>
        </div>
    </div>

@endsection
