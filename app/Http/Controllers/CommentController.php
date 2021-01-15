<?php

    namespace App\Http\Controllers;

    use App\Models\Comment;
    use App\Models\CommentVote;
    use App\Models\Post;
    use App\Models\PostVote;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class CommentController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            Comment::create([
                'text' => $request->text,
                'post_id' => $request->post_id,
                'parent_id' => $request->parent_id,
                'user_id' => Auth::user()->id,
                'vote' => 0
            ]);

            return redirect()->route('posts.show', $request->post_id);
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }

//        public function vote($comment_id, $vote)
//        {
//            $comment = Comment::with('post')->findOrFail($comment_id);
//
//            if (!CommentVote::where('comment_id', $comment_id)->where('user_id', auth()->id())->count()
//            && in_array($vote, [-1, 1]) && $comment->user_id != auth()->id()) {
//
//                CommentVote::create([
//                    'comment_id' => $comment_id,
//                    'user_id' => auth()->id(),
//                    'vote' => $vote
//                ]);
//
//                $comment->increment('votes', $vote);
//            }
//
//            return redirect()->route('posts.show', $comment->post->id);
//        }
    }
