<?php

namespace App;

use App\Traits\Likeable;
use App\Traits\Retweetable;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Likeable , Retweetable;

    
    protected $dates = [
        'created_at'
    ];
    protected $fillable =[
        'user_id', 'body',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateTimeOfTweet()
    {
        return $this->created_at->format('d-m-Y , H:i a');
    }

    public function likes() // This Like is a polymorphic relationship with tweets and likes it is related to 
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable')->whereNull('parent_id')->withLikes();
    }

    public function retweets()
    {
        return $this->morphMany(Retweet::class , 'retweetable');
    }

}
