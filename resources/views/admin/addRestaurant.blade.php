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

<div class="detail-page">
  <div class="detail-left">
    <div class="detail-top">
      <form method="POST" action="/add">
        <span class="detail-restaurant">
          Name
          <input type="text" id="name" name="name">
        </span>
    </div>
    <img src="" class="detail-picture">
    Picture
    <input type="text" name="picture">
    <p class="">
      # Area
      <select name="prefecture_id" class="select-prefecture">
      @foreach ($prefectures as $prefecture)
      <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
      @endforeach
      </select>
    </p>
    <p class="">
      # Genre
      <select name="category_id" class="select-category">
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->category}}</option>
      @endforeach
      </select>
    </p>
    <form action="/admin/change" method="POST">
      @csrf
      <textarea name="overview" class="overview-content" allign="top"></textarea>
      <input type="submit" value="この内容で店舗を登録">
    </form>
  </div>
