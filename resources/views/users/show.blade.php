<x-login-layout>
    <div class="user_detail_container">
        <div class="user_profile_block">
            <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default_icon.png') }}" alt="{{ $user->username }}" class="user_icon_img">

            <div class="user_profile_right">
                <div class="user_profile_text">
                    <div class="user_profile_row">
                        <span class="profile_label">ユーザー名</span>
                        <span class="profile_value">{{ $user->username }}</span>
                    </div>

                    <div class="user_profile_row profile_row_with_action">
                        <span class="profile_label">自己紹介</span>
                        <span class="profile_value">{{ $user->bio }}</span>

                        <div class="user_profile_action inline_action">
                            @if(Auth::id() !== $user->id)
                                @if(Auth::user()->followings->contains($user->id))
                                    <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="unfollow_btn">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="follow_btn">フォローする</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="post_list">
            @foreach($posts as $post)
                <ul>
                    <li class="post_block">
                        <figure>
                            <img src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/default_icon.png') }}" alt="{{ $user->username }}">
                        </figure>

                        <div class="post_content">
                            <div>
                                <div class="post_name">{{ $user->username }}</div>
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
