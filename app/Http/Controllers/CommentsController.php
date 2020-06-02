<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store(Tweet $tweet)
    {
        $attribute = $this->validate([
            'body' => 'required',
        ]);
        
        $tweet->comments()->create([
            'user_id'   => auth()->user()->id,
            'parent_id' => $tweet->id,
            'body'      => $attribute['body'],
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
