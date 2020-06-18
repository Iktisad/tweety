<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Comment;
use App\Retweet;
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

    public function retweetStore(Retweet $retweet)
    {
        $liked = $retweet->like();
        $likeAndDislikeCount = $retweet->getLikesAndDislikes();
        return response()->json([
                'success' => $liked,
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
    }

    public function retweetUpdate(Retweet $retweet)
    {
        $disliked = $retweet->dislike();
        $likeAndDislikeCount = $retweet->getLikesAndDislikes();
        return response()->json([
                'success' => $disliked,
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
    }

}
