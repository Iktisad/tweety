<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Retweet;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store(Tweet $tweet)
    {
        $comment = 'comment-'.$tweet->id;
        // echo 'inside Comments Controller';
        $attribute = request()->validate([
            $comment => 'required',
        ],
        // message
        [
            $comment.'.required' => 'Oops!! No Opinion Mattered!!',
        ]);
        
        $tweet->comments()->create([
            'user_id'   => auth()->user()->id,
            // 'parent_id' => $tweet->id,
            'body'      => $attribute[$comment],
        ]);

        return back();
    }

    
    public function storeReply()
    {
        # code...
    }


    public function update()
    {
        # code...
    }

    public function retweetCommentStore(Retweet $retweet)
    {
        $comment = 'comment-'.$retweet->id;

        $attribute = request()->validate([
            $comment => 'required',
        ],
        [
            $comment.'.required' => 'Oops!! No Opinion Mattered!!',
        ]);
        $retweet->comments()->create([
            'user_id' => auth()->user()->id ,
            'body'  =>   $attribute[$comment] ,
        ]);

        return back();
    }
}
