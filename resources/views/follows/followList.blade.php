<x-login-layout>
    <div class="follow_list_container">
        <div class="user_icon_list">
            <p class="list_title">フォローリスト</p>
            <div class="follow_icon_wrapper">
                @foreach ($followings as $user)
                    <a href="{{ route('users.show', $user->id) }}">
                        <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default_icon.png') }}" alt="icon" class="user_icon_img">
                    </a>
                @endforeach
            </div>
        </div>

        <div class="post_list">
            @foreach($posts as $post)
                <ul>
                    <li class="post_block">

                        <figure>
                            <a href="{{ route('users.show', $user->id) }}">
                                <img src="{{ $post->user->icon_image ? asset('storage/' . $post->user->icon_image) : asset('images/default_icon.png') }}" alt="{{ $post->user->username }}">
                            </a>
                        </figure>

                        <div class="post_content">

                            <div>
                                <div class="post_name">{{ $post->user->username }}</div>
                                <div class="post_date">{{ $post->created_at->format('Y-m-d H:i') }}</div>
                            </div>

                            <div class="post_text">{{ $post->post }}</div>

                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
</x-login-layout>
