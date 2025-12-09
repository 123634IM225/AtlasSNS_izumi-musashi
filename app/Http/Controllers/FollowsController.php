<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        $user = Auth::user();

        $followings = $user->followings;

        $posts = Post::whereIn('user_id', $followings->pluck('id'))
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('follows.followList', compact('followings', 'posts'));
    }

    public function followerList()
    {
        $user = Auth::user();

        $followers = $user->followers;

        $posts = Post::whereIn('user_id', $followers->pluck('id'))
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('follows.followerList', compact('followers', 'posts'));
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
