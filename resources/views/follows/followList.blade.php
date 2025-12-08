<x-login-layout>
    <div class="followlist-container">
        <div class="user-icon-list">
            @foreach ($followings as $user)
                <a href="/users/{{ $user->id }}" class="user-icon-item">
                    <img src="{{ asset('storage/' . $user->icon_image) }}" alt="icon" class="user-icon-img">
                    <p class="user-name">{{ $user->username }}</p>
                </a>
            @endforeach
        </div>

        <div class="post-list">
          @foreach($followerPosts as $post)
            <ul>
                <li class="post-block">

                    <figure>
                        <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="{{ $post->user->username }}">
                    </figure>

                    <div class="post-content">

                        <div>
                            <div class="post-name">{{ $post->user->username }}</div>
                            <div class="post-date">{{ $post->created_at }}</div>
                        </div>

                        <div class="post-text">{{ $post->post }}</div>

                    </div>
                </li>
            </ul>
          @endforeach
        </div>
    </div>
</x-login-layout>
