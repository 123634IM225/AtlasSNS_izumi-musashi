<x-logout-layout class="space_large">
  <div class="common_box">
    <div class="added_box_1">
      <p class="added_p_1">{{ session('username') }}さん</p>
      <p class="added_p_1">ようこそ! AtlasSNSへ</p>
    </div>

    <div class="added_box_2">
      <p class="added_p_2">ユーザー登録が完了いたしました。</p>
      <p class="added_p_3">早速ログインをしてみましょう！</p>
    </div>

    <div class="return_btn">
      <a href="login">ログイン画面へ</a>
    </div>
  </div>
</x-logout-layout>
