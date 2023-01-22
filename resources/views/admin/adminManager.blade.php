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
  <a href="{{ route('admin.logout') }}">
    ログアウト
  </a>
</div>


<div class="menu-box">
  <p>
    <a class="menu-link" href="/admin/reservation/{{$user->VPN}}">予約確認</a>
  </p>
  <p>
    <a class="menu-link" href="/admin/review/{{$user->VPN}}">レビュー確認</a>
  </p>
  <p>
    <a class="menu-link" href="/admin/detail/{{$user->VPN}}">店舗ページ</a>
  </p>
  <p>
    <a  class="menu-link" href="/admin/change/{{$user->VPN}}">店舗情報更新</a>
  </p>
</div>