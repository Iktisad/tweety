<?php

namespace App;

use App\Traits\Likeable;
use App\Traits\Retweetable;
use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    //
    use Likeable , Retweetable;


    protected $fillable =[
        'user_id','retweet_comment', 'retweetable_type', 'retweetable_id',
    ];

    public function retweetable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable')->whereNull('parent_id')->withLikes();
    }
}
