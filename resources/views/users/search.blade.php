<x-login-layout>
  <form action="/search" method="post">
      @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー名">
        <button type="submit" class="btn btn-success"><img src="images/search.png"></button>
  </form>

    @if (!empty($keyword))
        <p>検索ワード：{{ $keyword }}</p>
    @endif

    @foreach ($users as $user)
      <img src="{{ asset('storage/' . $user->icon_image) }}">
      <p>{{ $user->username }}</p>

      @if (Auth::id() !== $user->id)
            @if (Auth::user()->followings()->where('followed_id', $user->id)->exists())
                  <form action="{{ route('unfollow', $user->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="keyword" >
                      <button type="submit" class="btn btn-secondary">フォロー解除</button>
                  </form>
              @else
                  <form action="{{ route('follow', $user->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="keyword" >
                      <button type="submit" class="btn btn-primary">フォロー</button>
                  </form>
              @endif
      @endif

    @endforeach
</x-login-layout>
