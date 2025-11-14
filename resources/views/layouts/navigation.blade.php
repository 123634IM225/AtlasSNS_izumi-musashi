        <div id="nav-head">
            <a href="{{ route('top') }}"><img src="images/atlas.png"></a>
            <div id="nav-body">
                <div id="auth-name">
                    <p>{{ Auth::user()->username }} さん</p>
                </div>
                <div id="menu-wrapper">
                    <span id="menu-trigger" class="menu-trigger"></span>
                    <nav id="g-navi">
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
