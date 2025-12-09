<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>{{ Auth::user()->username }}さんの</p>
        <div id="follow_info">
          <p>フォロー数</p>
          <p id="follow_total">{{Auth::user()->followings()->count()}}人</p>
        </div>
        <div id="follow_link">
          <a class="btn btn-primary follow_link_btn" href="{{ route('follow_list') }}" role="button">フォローリスト</a>
        </div>
        <div id="follower_info">
          <p>フォロワー数</p>
          <p id="follower_total">{{Auth::user()->followers()->count()}}人</p>
        </div>
        <div id="follower_link">
          <a class="btn btn-primary follower_link_btn" href="{{ url('/') }}" role="button">フォロワーリスト</a>
        </div>
      </div>
      <div id="search_link">
        <a class="btn btn-primary search_link_btn" href="{{ route('search') }}" role="button">ユーザー検索</a>
      </div>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
