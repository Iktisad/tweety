<?php

namespace App;



use App\Traits\Followable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable , Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'avatar','cover','email','bio', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatar()
    {
        if($this->avatar){
            return asset('storage/'.$this->avatar);
        }
        return asset('https://api.adorable.io/avatars/285/@adorable'.$this->username.'png');
    }

    public function getCoverPhoto()
    {
        if($this->cover){
            return asset('storage/' . $this->cover);
        }
        return asset('https://placeimg.com/720/240/nature');
    }

    public function getBio()
    {
        // return $this->bio;
        return $this->bio;
    }
    

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }


    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id')->withTimestamps();
    }
    public function timeline()
    {   
        // include all user's tweets
        // also include tweets of people user follows
        // in decending order
        $friends = $this->follows()->pluck('id');
        $retweets = $this->getRetweets($friends);
        $tweets= $this->getTweets($friends);
        $tweets->push($retweets);
        $tweets = $tweets->flatten()->sortByDesc('created_at')->flatten();
        
        return $tweets;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
   
    public function retweet()
    {
        return $this->hasMany(Retweet::class);
    }

    public function getRetweets($friends)
    {
        $retweets = Retweet::whereIn('user_id',$friends)->orWhere('user_id',auth()->user()->id)->with('retweetable','retweetable.user:id,username,avatar')->latest()->withLikes()->take(5)->get();
               
        foreach ($retweets as $retweet) {
            $retweet->isRetweet = true;
        }
        return $retweets;
    }

    public function getTweets($friends)
    {
        return Tweet::whereIn('user_id',$friends)
                ->orWhere('user_id',$this->id)
                ->latest()
                ->withLikes() // this method is in likable
                ->take(5)->get();
    }
    
}
