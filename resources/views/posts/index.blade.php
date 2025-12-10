<x-login-layout>
<div class="container">
        <div class="auth_post_block">
            <div class="auth_icon"><img src="{{ asset('storage/' . Auth::user()->icon_image) }}" ></div>
            {{ Form::open(['url' => '/top', 'class' => 'post_form']) }}
            <!-- <div class="form-group"> -->
                {{ Form::input('text', 'content', null, ['required', 'class' => 'post_form_control', 'placeholder' => '投稿内容を入力してください。']) }}
            <!-- </div> -->
                <div class="post_button_wrapper">
                    <button type="submit" class="post_button"><img src="images/post.png"></button>
                </div>
            {{ Form::close() }}
        </div>
        <div class="post_list">
            @foreach($posts as $post)
                <ul>
                    <li class="post_block">
                        <figure>
                            <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="{{ $post->user->username }}">
                        </figure>
                        <div class="post_content">
                            <div>
                                <div class="post_name">{{ $post->user->username }}</div>
                                <div class="post_date">{{ $post->created_at }}</div>
                            </div>
                                <div class="post_text">{{ $post->post }}</div>

                            @if(Auth::id() === $post->user_id)
                                <div class="post_actions">
                                    <a href="#" class="js_modal_open" post="{{ $post->post }}" post_id="{{ $post->id }}">
                                        <img src="{{ asset('images/edit.png') }}" alt="編集">
                                    </a>
                                    <form action="/post/{{ $post->id }}/delete" method="POST" class="delete_form" onsubmit="return confirm('こちらの投稿を削除します。よろしいでしょうか？')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete_btn">
                                            <img src="{{ asset('images/trash.png') }}" alt="削除">
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
</div>
<div class="modal js_modal">
    <div class="modal__bg js_modal_close"></div>
    <div class="modal__content">
        <form action="{{ route('post.update') }}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="post" class="modal_post"></textarea>
            <input type="hidden" name="post_id" class="modal_id" value="">
            <input type="image" src="{{ asset('images/edit.png') }}" alt="編集" class="modal_edit_btn">
        </form>
    </div>
</div>
</x-login-layout>
