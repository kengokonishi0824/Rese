<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

<body class="antialiased">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    @isset($registered)
        <div>登録に成功しました。メールアドレス：{{ $registered_email }}</div>
    @endisset

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Mail</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">Password(confirmed)</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <div>
            <label for="VPN">VPN</label>
            <input type="text" id="VPN" name="VPN">
            <input type="hidden" id="admin_level" name="admin_level" value="1">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>