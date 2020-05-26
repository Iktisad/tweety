<?php

namespace App\Http\Controllers;
use Auth;
use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    //
    public function index()
    {
        // getting tweets of people we follow and our own
        return view('tweets.index',[
            'tweets' => Auth::user()->timeline(),
        ]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            
            'body'=>['required','max:16000']
            
        ],[
            'body.required' => 'You forgot to write your thoughts!!' 
        ]);
        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $attributes['body'],
        ]);

        return redirect()->route('home');
    }
}
