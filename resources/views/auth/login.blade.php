<x-logout-layout class="space_large">
  <div class="form_wrapper">
    {!! Form::open(['route' => 'login.store']) !!}
      <div class="common_box">
        <p class="box_title">AtlasSNSへようこそ</p>

        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::text('email', null, ['class' => 'input']) }}

        {{ Form::label('password', 'パスワード') }}
        {{ Form::password('password', ['class' => 'input']) }}

        <div class="button_wrapper">
          {{ Form::submit('ログイン', ['class' => 'login_btn']) }}
        </div>

        <p class="register_link">
          <a href="{{ route('register.create') }}">新規ユーザーの方はこちら</a>
        </p>
      </div>
    {!! Form::close() !!}
  </div>
</x-logout-layout>
