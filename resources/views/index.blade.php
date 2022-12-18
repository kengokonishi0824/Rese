<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restarants_all</title>
</head>

@if (Auth::check())
  <p>ログイン中ユーザー: {{$user->id}}</p>
@else
  <p>ログインなし。（<a href="/login">ログイン</a>｜
  <a href="/register">登録</a>）</p>
@endif

<div class="search-box">
  <form action="/home" method="GET">
  <select name="prefecture_id" class="select-tag">
            <option value="0">All area</option>
      @foreach ($prefectures as $prefecture)
            <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
      @endforeach
    </select>
  <select name="category_id" class="select-tag">
            <option value="0">All genre</option>
      @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
      @endforeach
    </select>
  <input type="text" name="name" placeholder="Search..." class="search-form">
    </form>
</div>

<div class="restaurant_all">
  @foreach ($restaurants as $restaurant)
  <div class="restaurant">
      <img src="{{$restaurant->picture}}" class="picture">
      <p class="restaurant_name">{{$restaurant->name}}</p>
      <p class="restaurant_tag">#{{$restaurant->prefecture->prefecture}} #{{$restaurant->category->category}}</p>
      <div class="links">
        <a class="btn_detail" href="/detail/{{$restaurant->id}}">
          詳しく見る
        </a>
        @if($restaurant->like->first() != null)
        <a href="{{route('unlike', $restaurant)}}" class=btn-like>
          あかん
        </a>
        @else
        <a href="{{route('like', $restaurant)}}" class=btn-like>
          いいね
        </a>
        @endif
      </div>
  </div>
  @endforeach
</div>

<p>{{$likes->user_id=$user->id}}</p>









