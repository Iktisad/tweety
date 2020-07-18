<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Retweet;
use Illuminate\Http\Request;

class RetweetsController extends Controller
{
    //
    public function store(Tweet $retweet)
    {
        
        $response = $retweet->retweet();
        if(request()->ajax()){

            return response()->json([
                'success' => $response,
            ]);
        }
        return back();
    }

    public function destroy(Tweet $tweet)
    {
        // return back();
    }

    public function retweetStore(Retweet $retweet)
    {

        /**
         * In order to retweet a retweet we need to check if the retweeted retweet exists ,
         * if it exists then we have to remove that and 
         * during removal we need to ensure to set the parent id of the dependent retweets to the current parent id of the retweet about to be removed
         */

        echo $retweet->retweetOfARetweet();
        // $tweet->retweets()->create();
        // return back();
    }

}
