<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function store(User $user)
    {
        if (Auth::id() !== $user->id && !Auth::user()->followings->contains($user->id)) {
            Auth::user()->followings()->attach($user->id);
        }
        return redirect('/search');
    }

    public function destroy(User $user)
    {
        Auth::user()->followings()->detach($user->id);
        return redirect('/search');
    }
}
