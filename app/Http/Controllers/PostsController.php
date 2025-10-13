<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }


    public function postCreate(Request $request)
    {
        $request->validate([
            'content' => 'required|between:1,150',
        ]);

        $post = $request->input('content');
        Post::create(['post' => $post,'user_id' => auth()->id(),]);
        return back();
    }

    public function show(){
  // Postモデル経由でpostsテーブルのレコードを取得
        // $posts = Post::get();
  // フォローしているユーザーのidを取得
    $following_id = Auth::user()->followings()->pluck('users.id');
    // 自分のidも取得
    $following_id->push(Auth::id());
  // フォローしているユーザーのidを元に投稿内容を取得
  //Post::with('user')は、Postモデルに定義されたuserリレーションを使用して、関連するUserモデルのデータも一緒に取得します。
  //whereInメソッドを使用すると、指定したカラムの値が配列内のいずれかの値と一致するレコードを抽出できます。
  //カラムから値の条件に一致したもののを抽出
  //whereIn('カラム名', [値1, 値2, ...])
  //今回の場合、user_idカラムから、$following_id配列に含まれるIDを持つレコードを抽出しています。
    $posts = Post::with('user')->whereIn('user_id',$following_id)->orderBy('created_at', 'desc')->get();
    return view('posts.index', compact('posts'));
}

    public function delete($post)
    {
        Post::where('id', $post)->delete();
        return redirect('/top');
    }
}
