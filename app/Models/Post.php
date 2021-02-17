<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'user_id', 'text', 'photo', 'tags', 'votes'];



//    POST BELONGS TO USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    POST HAS MANY TAGS
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

//    POST HAS MANY COMMENTS
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

//    POST HAS MANY VOTES
    public function votes()
    {
        return $this->hasMany(PostVote::class);
    }
}
