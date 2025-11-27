<x-login-layout>
    <div class="search-block">
        <form action="/search" method="post">
            @csrf
            <input type="text" name="keyword" class="search_form" placeholder="ユーザー名">
            <button type="submit" class="search_btn"><img src="images/search.png"></button>
        </form>
    </div>

    @if (!empty($keyword))
        <p>検索ワード：{{ $keyword }}</p>
    @endif
    <div class="search_result">
        @foreach ($users as $user)
        <div class="search_list">
            <img src="{{ asset('storage/' . $user->icon_image) }}">
            <p>{{ $user->username }}</p>

            @if (Auth::id() !== $user->id)
                <div class="follow_block">
                    @if (Auth::user()->followings()->where('followed_id', $user->id)->exists())
                        <form action="{{ route('unfollow', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="keyword" >
                            <button type="submit" class="unfollow_btn">フォロー解除</button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="keyword" >
                            <button type="submit" class="follow_btn">フォローする</button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
        @endforeach
    </div>
</x-login-layout>
