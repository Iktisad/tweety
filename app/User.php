<?php

namespace App;


use App\Traits\Likeable;
use App\Traits\Followable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable , Followable , Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'avatar','email', 'password',
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

     public function getAvatar()
    {
        if($this->avatar){
            return asset('storage/'.$this->avatar);
        }
        return asset('https://api.adorable.io/avatars/285/@adorable'.$this->username.'png');
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
        
        return Tweet::whereIn('user_id',$friends)
        ->orWhere('user_id',$this->id)
        ->latest()
        ->withLikes()
        ->paginate(20);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
   
    
    
}
