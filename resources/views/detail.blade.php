<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restarants_detail</title>
</head>

@if (Auth::check())
  <p>ログイン中ユーザー: {{$user->id}}</p>
@else
  <p>ログインなし。（<a href="/login">ログイン</a>｜
  <a href="/register">登録</a>）</p>
@endif
<div class="detail-page">
  <div class="detail-left">
    <p>detail画面</p>
    <div class="detail-top">
      <p class="btn-back">
        <a class="detail-back" href=/home><</a>
        <span class="detail-restaurant">{{$restaurants->name}}</span>
      </p>
    </div>
    <img src="{{$restaurants->picture}}" class="detail-picture">
    <p class="">#{{$restaurants->prefecture->prefecture}} #{{$restaurants->category->category}}</p>
    <p class="">{{$restaurants->overview}}</p>
  </div>
  <div class="detail-right">
    <div class="reservation-box">
      <p class="yoyaku">予約</p>
    </div>
  </div>
    
</div>


