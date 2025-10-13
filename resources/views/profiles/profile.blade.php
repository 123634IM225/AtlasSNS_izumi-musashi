<x-login-layout>
    <form action="/profile" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="header-icon"><img src="{{ asset('storage/' . Auth::user()->icon_image) }}" ></h2>

        <label for="name">ユーザー名</label>
        <input type="text" name="name" class="form-control" value="{{$user->username}}">

        <label for="email">メールアドレス</label>
        <input type="text" name="email" class="form-control" value="{{$user->email}}">

        <label for="password">パスワード</label>
        <input type="password" name="password" class="form-control" >

        <label for="password_confirmation">パスワード確認</label>
        <input type="password" name="password_confirmation" class="form-control" >

        <label for="bio">自己紹介</label>
        <input type="text" name="bio" class="form-control" value="{{$user->bio}}">

        <label for="icon_image">アイコン画像</label>
        <input type="file" name="icon_image" class="form-control-file" >
        <button type="submit" class="btn btn-success">更新</button>
    </form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</x-login-layout>
