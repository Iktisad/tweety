<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function store(User $user)
    {
        // follow the given user
        // have the auth'user follow the given user
        // logic is inside Followable.php Trait;
        auth()->user()->toggleFollow($user);
        
        return back();
    }
}
