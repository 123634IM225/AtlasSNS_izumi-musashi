<div id="nav_head">
    <a href="{{ route('top') }}"><img src="{{ asset('images/atlas.png') }}"></a>
    <div id="nav_body">
        <div id="auth_name">
            <p>{{ Auth::user()->username }} さん</p>
        </div>
        <div id="menu_wrapper">
            <span id="menu_trigger" class="menu_trigger"></span>
            <nav id="g_navi">
                <ul>
                    <li><a href="{{ route('top') }}">HOME</a></li>
                    <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <li><a href="{{ route('logout') }}">ログアウト</a></li>
                </ul>
            </nav>
        </div>
        <img src="{{ asset('storage/' . Auth::user()->icon_image) }}" >
    </div>
</div>
