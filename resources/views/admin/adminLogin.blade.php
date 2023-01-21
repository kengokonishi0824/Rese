<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

<div>
  <p>
    ログイン中：{{ Auth::guard('admin')->user()->name ?? 'undefined' }}
  </p>
  <p>
    <a href="{{ route('admin.logout') }}">
      ログアウト
    </a>
  </P>
  <p>
    <a href="/admin">
      HOMEに戻る
    </a>
  </P>
</div>

<div class="page-breeze">
    <div class="header-breeze">
        Login for Admins
    </div>
        @if ($errors->any()) 
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        @isset($registered)
        <div>登録に成功しました。メールアドレス：{{ $registered_email }} にてログインください。</div>
        @endisset

    <form method="POST" action="/admin/login"> 
        @csrf
        <div class="breeze-form">
            <img src="{{asset('/picture/mail.png')}}" alt="" class="breeze-icon">
            <x-input  placeholder="Email" id="email" class="breeze-form-box" type="email" name="email" :value="old('email')" required autofocus />
        </div>
            
        <div class="breeze-form">
            <img src="{{asset('/picture/lock.png')}}" alt="" class="breeze-icon">
            <x-input  placeholder="Password" id="password" class="breeze-form-box" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="btn-breeze">
            <x-button class="ml-3">
                {{ __('ログイン') }}
            </x-button>
        </div>
        </form>
</div>