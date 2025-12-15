<x-login-layout>
    <div class="user_detail_container">
        <div class="user_profile_block">
            <img src="{{ asset('storage/' . $user->icon_image) }}" alt="{{ $user->username }}" class="user_profile_icon">

            <div class="user_profile_text">
                <h2 class="user_name">{{ $user->username }}</h2>
                <p class="user_bio">{{ $user->bio }}</p>
            </div>
        </div>

        <div class="post_list">
            @foreach($posts as $post)
                <ul>
                    <li class="post_block">
                        <figure>
                            <img src="{{ asset('storage/' . $user->icon_image) }}" alt="{{ $user->username }}">
                        </figure>

                        <div class="post_content">
                            <div>
                                <div class="post_name">{{ $user->username }}</div>
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
