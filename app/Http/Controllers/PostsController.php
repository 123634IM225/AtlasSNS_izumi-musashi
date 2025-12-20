<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    // public function index(){
    //     return view('posts.index');
    // }


    public function postCreate(Request $request)
    {
        $request->validate([
            'content' => 'required|between:1,150',
        ]);

        $post = $request->input('content');
        Post::create(['post' => $post,'user_id' => auth()->id(),]);
        return back();
    }

    public function show()
    {
        $following_id = Auth::user()->followings()->pluck('users.id');

        $following_id->push(Auth::id());

        $posts = Post::with('user')->whereIn('user_id',$following_id)->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function update(Request $request)
    {
    $post = Post::findOrFail($request->post_id);
    if ($post->user_id !== Auth::id()) {
        abort(403, '不正な操作です。');
    }

    $request->validate([
        'post' => 'required|string|max:150',
    ]);

    $post->post = $request->post;
    $post->save();

    return redirect()->back();
    }

    public function delete($post)
    {
        Post::where('id', $post)->delete();
        return redirect('/top');
    }
}
