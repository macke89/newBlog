@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="my-4">Post Edit</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label for="title" class="mt-3">Title</label>
                <input id="title" type="text" class="form-control" value="{{ $post->title }}" name="title">

                <label for="text" class="mt-3">Content</label>
                <textarea name="text" id="text" rows="20" class="form-control">{{ $post->text }}</textarea>

                <input type="submit" class="btn btn-primary mt-3" value="Update" name="submit">
            </form>
        </div>
    </div>
@endsection
