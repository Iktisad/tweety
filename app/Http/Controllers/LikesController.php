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
        $liked = $tweet->like();
        $likeAndDislikeCount = $tweet->getLikesAndDislikes();
        
        return response()->json([
            
                'success'=> $liked, 
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
        // return back();
    }

    public function update(Tweet $tweet)
    {
        $disliked = $tweet->dislike();
        $likeAndDislikeCount = $tweet->getLikesAndDislikes();
        
        return response()->json([
                'success' => $disliked,
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
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
