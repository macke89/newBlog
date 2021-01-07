@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>

                    <div class="card-body">

                        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">New Post</a>

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
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
