<x-login-layout>
<div class="container">
        <h2 class="page-header"><img src="{{ asset('storage/' . Auth::user()->icon_image) }}" ></h2>
        {{ Form::open(['url' => '/top']) }}
        <div class="form-group">
            {{ Form::input('text', 'content', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}
        </div>
        <button type="submit" class="post_button"><img src="images/post.png"></button>
        {{ Form::close() }}
        @foreach($posts as $post)
            <img src="{{ asset('storage/' . $post->user->icon_image) }}" >
            <p>名前：{{ $post->user->username }}</p>
            <p>投稿内容：{{ $post->post }}</p>
            <p>投稿日：{{ $post->created_at }}</p>
            @if(Auth::id() === $post->id)
                <form action="/post/{{ $post->id }}/delete" method="POST" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><img src="{{ asset('images/trash.png') }}"></button>
                </form>
            @endif
        @endforeach
</div>

    <h2>機能を実装していきましょう。</h2>

</x-login-layout>
