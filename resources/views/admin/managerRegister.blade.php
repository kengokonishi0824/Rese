<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>manager_register</title>
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

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf
        <div class="header-breeze">
            Registration for Managers
        </div>
        <div class="breeze-form">
                <img src="{{asset('/picture/person_alt.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Username" id="name" class="breeze-form-box" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <div class="breeze-form">
                <img src="{{asset('/picture/mail.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Email" id="email" class="breeze-form-box" type="email" name="email" :value="old('email')" required />
            </div>
            
        <div class="breeze-form">
            <img src="{{asset('/picture/lock.png')}}" alt="" class="breeze-icon">
            <x-input  placeholder="Password" id="password" class="breeze-form-box" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="breeze-form">
            <img src="{{asset('/picture/lock.png')}}" alt="" class="breeze-icon">
            <x-input  placeholder="Password(確認用)" id="password_confirmation" class="breeze-form-box" type="password" name="password_confirmation" required autocomplete="current-password" />
        </div>

        <div class="breeze-form">
            <img src="{{asset('/picture/house_fill.png')}}" alt="" class="breeze-icon">
            <x-input  placeholder="VPN" id="VPN" class="breeze-form-box" type="VPN" name="VPN" required autocomplete="current-password" />
        </div>
        <input type="hidden" id="admin_level" name="admin_level" value="2">

        <div class="btn-breeze">
            <x-button class="ml-3">
                {{ __('登録') }}
            </x-button>
        </div>
    </form>
</div>