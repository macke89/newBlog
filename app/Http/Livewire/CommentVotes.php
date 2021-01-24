<?php

    namespace App\Http\Livewire;

    use App\Models\Comment;
    use App\Models\CommentVote;
    use App\Models\PostVote;
    use Livewire\Component;
    use Illuminate\Support\Facades\Redirect;

    class CommentVotes extends Component
    {
        public $comment;
        public $commentSumVotes;

        public function mount($comment)
        {
            $this->comment = $comment;
            $this->commentSumVotes = $comment->votes;
        }

        public function render()
        {
            return view('livewire.comment-votes');
        }

        public function vote($vote)
        {
            // CHECK IF THE ROW EXISTS
            $voteExists = CommentVote::where('comment_id', $this->comment->id)->where('user_id', auth()->id())->count();
            // GET THE WHOLE VOTE ROW
            $voteRow = CommentVote::where('comment_id', $this->comment->id)->where('user_id', auth()->id());
            // GET VOTE VALUE IF THE ROW EXISTS
            if ($voteExists) {
                $voteField = CommentVote::where('comment_id', $this->comment->id)->where('user_id', auth()->id())->value('vote');
            }

            if (!$voteExists
                && in_array($vote, [-1, 1])
                && $this->comment->user_id != auth()->id()) {

                // CREATE ROW
                CommentVote::create([
                    'comment_id' => $this->comment->id,
                    'user_id' => auth()->id(),
                    'vote' => $vote
                ]);

                // ADD TO SUM OF VOTES
                $this->commentSumVotes += $vote;

            } elseif ($voteExists) {
                $voteRow->delete();
                $this->commentSumVotes -= $voteField;
            }
        }
    }
