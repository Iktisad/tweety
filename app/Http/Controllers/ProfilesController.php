<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ProfilesController extends Controller
{
    //
    public function show(User $user)
    {
        return view('profiles.show',[
            'user' => $user,
            'tweets'=>$user->tweets()->withLikes()->paginate('4'),
        ]);

        echo $user->tweets()->withLikes()->get();
    }

    public function edit(User $user)
    {
        // if(auth()->user()->isNot($user)){
        //     abort(404);
        // }
        // abort_if(auth()->user()->isNot($user),404);
        // $this->authorize('edit', $user); implemented on routes

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        // echo $user;
        $attributes = request()->validate([
            'username' => ['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
            'name'=>['string','required','max:255',],
            'avatar'=>['sometimes','file','image','max:5000'],
            'cover'=>['sometimes','file','image','max:5000'],
            'email'=>['string','required','email','max:255',Rule::unique('users')->ignore($user)],
            'password'=>['string','required','min:8','max:255','confirmed'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);
        
        if(request('avatar')){
            if(File:: exists('storage/' . $user->avatar)){
                File::delete('storage/' . $user->avatar);
            }
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        
        if(request('cover')){
            
            if(File:: exists('storage/' . $user->cover)){
                File::delete('storage/' . $user->cover);
            }

            $attributes['cover'] = request('cover')->store('cover-images');
        }
        
        $user->update($attributes);
        
        return redirect()->route('profile',$user);

    
    }
}
