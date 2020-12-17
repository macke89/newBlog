@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <h1 class="my-4">Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-info mb-3">New Post</a>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
            </tr>
            </thead>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
