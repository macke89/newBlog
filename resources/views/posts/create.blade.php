@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="my-4">New Post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title" class="mt-3">Title</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" />

                <label for="text" class="mt-3">Content</label>
                <textarea name="text" id="text" rows="20" class="form-control">{{ old('text') }}</textarea>

                <input id="photo" type="file" name="photo" class="form-control" />

                <input type="submit" class="btn btn-primary mt-3" value="create" name="submit" />
            </form>
        </div>
    </div>
@endsection
