<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //

    public function store(Tweet $tweet)
    {
        $tweet->like();
        return back();
    }

    public function update(Tweet $tweet)
    {
        $tweet->dislike();
        return back();
    }
}
