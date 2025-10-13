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
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::where('id', '!=', Auth::id())->get();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$users, 'keyword'=>$keyword]);
    }
}
