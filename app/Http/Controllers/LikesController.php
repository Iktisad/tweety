<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Comment;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //

    public function store(Tweet $tweet)
    {   
        $tweet->like();
        return back();
        // return response();
    }

    public function update(Tweet $tweet)
    {
        $tweet->dislike();
        return back();
    }

    public function commentStore(Comment $comment)
    {
        
        $comment->like();
        return back();
    }

    public function commentUpdate(Comment $comment)
    {
        $comment->dislike();
        return back();
    }
}
