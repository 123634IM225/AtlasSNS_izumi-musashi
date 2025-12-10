<x-login-layout>
    <div class="follow_list_container">
        <div class="user_icon_list">
            <p class="list_title">フォローリスト</p>
            <div class="follow_icon_wrapper">
                @foreach ($followings as $user)
                    <img src="{{ asset('storage/' . $user->icon_image) }}" alt="icon" class="user-icon-img">
                @endforeach
            </div>
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

                    </div>
                </li>
            </ul>
          @endforeach
        </div>
    </div>
</x-login-layout>
