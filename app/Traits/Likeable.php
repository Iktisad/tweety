<?php

namespace App\Traits;

use App\User;
use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    
    public function scopeWithLikes(Builder $query)
    {
        return $query->withCount([
            
            'likes as likes'=>function($q){
                $q->where('like',1);
            },
            'likes as dislikes' => function($q){
                $q->where('like',0);
            },
            
        ]);
    }

    public function like(User $user = null, $liked = true)
    {

        $userId = $user ? $user->id : auth()->user()->id;
        // check if already liked then toggle like
        
        if($this->isAlreadyLiked($userId,$liked)){
            // remove like
           return $this->likes()->where('user_id', $userId)->delete();
        }

        
            // if it exists then remove dislike by updating the record

        return $this->likes()->updateOrCreate(
                        [
                            'user_id'=>$userId,
                            'like' => !$this->isAlreadyDisliked($userId,!$liked),
                        ],
                        [
                            'like'=>$liked,
                        ]
                    
                );
        
    }

    public function dislike(User $user = null, $liked = false)
    {
        $userId = $user ? $user->id : auth()->user()->id;
        // check if already liked then toggle like
        
        if($this->isAlreadyDisliked($userId,$liked)){
            // if it exists then remove dislike
            
            return $this->likes()->where('user_id', $userId)->delete();
         }
            // remove like
        return $this->likes()->updateOrCreate(
                        [
                            'user_id'=>$userId,
                            'like' => $this->isAlreadyLiked($userId, !$liked),
                        ],
                        [
                            'like'=> $liked,
                        ]
                    
                );
    }

    public function isAlreadyLiked($userId,$liked)
    {
        return $this->likes()->where('user_id',$userId)->where('like',$liked)->exists();
    }

    public function isAlreadyDisliked($userId,$liked)
    {
        return $this->likes()->where('user_id',$userId)->where('like',$liked)->exists();
    }
}
