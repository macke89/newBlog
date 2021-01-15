@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('My Posts') }}</div>

        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
                <br/>
            @endif

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
                            <a href="{{ route('posts.show', $post) }}"
                               class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                  style="display: inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit"
                                       class="btn btn-sm btn-danger"
                                       value="Delete"
                                       onclick="return confirm('Are you sure?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
