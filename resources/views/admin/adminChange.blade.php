<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_detail</title>
</head>

<div>
  <p>
    ログイン中：{{ Auth::guard('admin')->user()->name ?? 'undefined' }}
  </p>
  <a href="{{ route('admin.logout') }}">
    ログアウト
  </a>
</div>

<div class="detail-page">
  <div class="detail-left">
    <div class="detail-top">
      <p class="btn-back">
        <a class="detail-back"  href="javascript:history.back();"><</a>
        <span class="detail-restaurant">{{$restaurants->name}}</span>
      </p>
    </div>
    <img src="{{$restaurants->picture}}" class="detail-picture">
    <p class="">#{{$restaurants->prefecture->prefecture}} #{{$restaurants->category->category}}</p>
    <form action="/admin/change" method="POST">
      @csrf
      <textarea name="overview" class="overview-content" allign="top">{{$restaurants->overview}} </textarea>
      <input type="hidden" name="id" value="{{$restaurants->id}}">
      <input type="submit" value="内容変更">
    </form>
  </div>