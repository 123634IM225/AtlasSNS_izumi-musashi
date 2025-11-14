<x-logout-layout class="space-large">
  <div class="form-wrapper">
    {!! Form::open(['route' => 'login.store']) !!}
      <div class="common-box">
        <p class="box-title">AtlasSNSへようこそ</p>

        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::text('email', null, ['class' => 'input']) }}

        {{ Form::label('password', 'パスワード') }}
        {{ Form::password('password', ['class' => 'input']) }}

        <div class="button-wrapper">
          {{ Form::submit('ログイン', ['class' => 'login-btn']) }}
        </div>

        <p class="register-link">
          <a href="{{ route('register.create') }}">新規ユーザーの方はこちら</a>
        </p>
      </div>
    {!! Form::close() !!}
  </div>
</x-logout-layout>
