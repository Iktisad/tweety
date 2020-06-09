<?php

namespace App\Http\Controllers;

use App\Tweet;
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
}
