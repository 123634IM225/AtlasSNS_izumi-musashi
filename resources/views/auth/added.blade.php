<x-logout-layout class="space-large">
  <div class="common-box">
    <div class="added-box-1">
      <p class="added-p-1">{{ session('username') }}さん</p>
      <p class="added-p-1">ようこそ! AtlasSNSへ</p>
    </div>

    <div class="added-box-2">
      <p class="added-p-2">ユーザー登録が完了いたしました。</p>
      <p class="added-p-3">早速ログインをしてみましょう！</p>
    </div>

    <div class="return-btn">
      <a href="login">ログイン画面へ</a>
    </div>
  </div>
</x-logout-layout>
