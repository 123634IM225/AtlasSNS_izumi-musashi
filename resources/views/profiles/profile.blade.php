<x-login-layout>
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="profile_form">
        @csrf
        <h2 class="header-icon"><img src="{{ asset('storage/' . Auth::user()->icon_image) }}" ></h2>

        <div class="profile_block">
            <div class="profile_item">
                <label for="name">ユーザー名</label>
                <input type="text" name="name" class="form_control" value="{{$user->username}}">
            </div>

            <div class="profile_item">
                <label for="email">メールアドレス</label>
                <input type="text" name="email" class="form_control" value="{{$user->email}}">
            </div>

            <div class="profile_item">
                <label for="password">パスワード</label>
                <input type="password" name="password" class="form_control" >
            </div>

            <div class="profile_item">
                <label for="password_confirmation">パスワード確認</label>
                <input type="password" name="password_confirmation" class="form_control" >
            </div>

            <div class="profile_item">
                <label for="bio">自己紹介</label>
                <input type="text" name="bio" class="form_control" value="{{$user->bio}}">
            </div>

            <div class="profile_item">
                <label for="icon_image">アイコン画像</label>

                <div class="custom-file-box">
                    <span class="custom-file-text">ファイルを選択</span>
                    <input type="file" name="icon_image" id="icon_image" class="hidden-file-input">
                </div>
            </div>

            <div class="profile_item_btn">
                <button type="submit" class="profile_update_btn">更新</button>
            </div>
        </div>
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
