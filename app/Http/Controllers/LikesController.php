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
        if (request()->ajax()) {
            
            $likeAndDislikeCount = $tweet->getLikesAndDislikes();
            return response()->json([
                'success'=> $liked, 
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
            
        }
        return back();
    }

    public function update(Tweet $tweet)
    {
        $disliked = $tweet->dislike();
        if(request()->ajax()){
            
            $likeAndDislikeCount = $tweet->getLikesAndDislikes();
            return response()->json([
                    'success' => $disliked,
                    'likeCount' => $likeAndDislikeCount['likeCount'],
                    'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
                ]);
        }
        return back();
    }

    public function commentStore(Comment $comment)
    {
        
        $liked = $comment->like();
        $likeAndDislikeCount = $comment->getLikesAndDislikes();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => $liked,
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
        }
        return back();
    }

    public function commentUpdate(Comment $comment)
    {
        $disliked = $comment->dislike();
        if (request()->ajax()) {
            $likeAndDislikeCount = $comment->getLikesAndDislikes();
            
            return response()->json([
                'success' => $disliked,
                'likeCount' => $likeAndDislikeCount['likeCount'],
                'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
            ]);
        }
        return back();
    }

    public function retweetStore(Retweet $retweet)
    {
        $liked = $retweet->like();
        if (request()->ajax()) {
            # code...
            $likeAndDislikeCount = $retweet->getLikesAndDislikes();
            return response()->json([
                    'success' => $liked,
                    'likeCount' => $likeAndDislikeCount['likeCount'],
                    'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
                ]);
        }
        return back();
    }

    public function retweetUpdate(Retweet $retweet)
    {
        $disliked = $retweet->dislike();

        if(request()->ajax()){

            $likeAndDislikeCount = $retweet->getLikesAndDislikes();
            return response()->json([
                    'success' => $disliked,
                    'likeCount' => $likeAndDislikeCount['likeCount'],
                    'dislikeCount'=> $likeAndDislikeCount['dislikeCount'],
                ]);
        }
        return back();
    }

}
