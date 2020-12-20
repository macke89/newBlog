<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'author', 'post_id', 'parent_id'];

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
}
