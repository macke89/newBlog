<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $path = url('/storage/' . $request->file('photo')->store('photos', 'public'));
//        $image = $request->file('photo')->getClientOriginalName();
//        $request->file('photo')->storeAs('posts', $image);

        $post = Post::create([
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => Auth::user()->id,
            'photo' => $path
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $tags = $post->tags;

        $comments = Comment::with('post')->get();
        $replies = Comment::with('replies')->where('parent_id','!=',0)->get(['id','parent_id','text', 'user_id', 'created_at']);

        return view('posts.show', compact('post', 'comments', 'replies', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id != auth()->id()) {
            abort(403);
        }

        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
//        $post->update($request->validated());
//        dd($request->tags);
        $post->tags()->sync($request->tags);
        $path = url('/storage/' . $request->file('photo')->store('photos', 'public'));
        $post->update([
            'title' => $request->title,
            'text' => $request->text,
            'photo' => $path
        ]);

        return redirect()->route('posts.index')->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Successfully deleted');
    }
}
