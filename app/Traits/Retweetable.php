<?php
namespace App\Traits;

trait Retweetable
{
    public function retweet($user=null,$comment = null)
    {
        $id = $user ? $user->id: auth()->user()->id;
        
        if($this->retweets()->where(['user_id'=>$id])->exists()){
            
            $this->retweets()->where(['user_id'=>$id])->delete();
            return 'retweetRemoved';
        }
        $this->retweets()->create([
            'user_id' => $id,
            'retweet_comment' => $comment,
        ]);
        return 'retweeted';
    }

    public function retweetOfARetweet()
    {
       
    }
}
