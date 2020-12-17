@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="my-4">New Post</h1>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <label for="title" class="mt-3">Title</label>
                <input id="title" type="text" class="form-control" name="title">

                <label for="text" class="mt-3">Content</label>
                <textarea name="text" id="text" rows="20" class="form-control"></textarea>

                <input type="submit" class="btn btn-primary mt-3" value="create" name="submit">
            </form>
        </div>
    </div>
@endsection
