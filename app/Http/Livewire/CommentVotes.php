<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentVote;
use Livewire\Component;

class CommentVotes extends Component
{
    public $comment;

    public function mount($comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comment-votes');
    }

    public function vote($vote)
    {
        if (!CommentVote::where('comment_id', $this->comment->id)->where('user_id', auth()->id())->count()
            && in_array($vote, [-1, 1]) && $this->comment->user_id != auth()->id()) {

            CommentVote::create([
                'comment_id' => $this->comment->id,
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);

            $this->comment->increment('votes', $vote);
            $this->comment = Comment::find($this->comment->id);
        }
    }
}
