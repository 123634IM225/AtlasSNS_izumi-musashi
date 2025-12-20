<x-logout-layout class="space_small">
{!! Form::open(['route' => 'register.store']) !!}
    <div class="common_box">

        <p class="register_box_title">新規ユーザー登録</p>

        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('メールアドレス') }}
        {{ Form::email('email',null,['class' => 'input']) }}

        {{ Form::label('password','パスワード') }}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::label('password_confirmation','パスワード確認') }}
        {{ Form::password('password_confirmation',['class' => 'input']) }}

        <div class="button_wrapper">
            {{ Form::submit('新規登録',['class' => 'register_btn']) }}
        </div>

        <p class="login_link">
            <a href="login">ログイン画面へ戻る</a>
        </p>
    </div>

{!! Form::close() !!}

@if($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

</x-logout-layout>
