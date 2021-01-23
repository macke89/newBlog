<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Comment extends Model
    {
        use HasFactory;

        protected $fillable = ['text', 'user_id', 'post_id', 'parent_id', 'votes'];

//    COMMENT HAS MANY REPLIES
        public function replies()
        {
            return $this->hasMany('App\Models\Comment', 'parent_id');
        }

//    COMMENT BELONGS TO POST
        public function post()
        {
            return $this->belongsTo(Post::class);
        }

//    COMMENT BELONGS TO USER
        public function user()
        {
            return $this->belongsTo(User::class);
        }

//    COMMENT HAS VOTES
        public function commentVotes()
        {
            return $this->hasMany(CommentVote::class);
        }
    }
