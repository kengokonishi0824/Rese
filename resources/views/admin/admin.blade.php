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
    <a class="menu-link" href="/admin/all">店舗一覧</a>
  </p>
  <p>
    <a  class="menu-link" href="admin/register">管理者アカウント新規登録</a>
  </p>
  <p>
    <a  class="menu-link" href="/manager/register">店舗マネジャーアカウント新規登録</a>
  </p>
  <p>
    <a  class="menu-link" href="/admin/addRestaurant">店舗新規登録</a>
  </p>
</div>



