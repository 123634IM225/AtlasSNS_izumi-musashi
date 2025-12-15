<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function search(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('users.search', compact('users'));
    }


    public function searchForm(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->where('id', '!=', Auth::id())->get();
        }else{
            $users = User::where('id', '!=', Auth::id())->get();
        }

        return view('users.search',['users'=>$users, 'keyword'=>$keyword]);
    }

    public function show(User $user)
    {
        $posts = $user->posts()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.show', compact('user', 'posts'));
    }
}
