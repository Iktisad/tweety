<?php 

namespace App\Traits;

use App\User;


trait Followable{

    // To Follow a user
     public function follow(User $user)
    {
        return $this->follows()->save($user);
    }
    // unfollow user and detach relationship at the pivot table
    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }
    // check if user is following
    public function isFollowing(User $user)
    {
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }
    // To toggle a following user to unfollow
    public function toggleFollow(User $user)
    {
        if($this->isFollowing($user)){
            return $this->unfollow($user);
        }
        
        return $this->follow($user);
        
    }
    
}