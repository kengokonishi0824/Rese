<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restarants_all</title>
</head>

@if (Auth::check())
  <a class="btn-rese" href="/menu1">■</a><span class="word-rese">Rese</span>
@else
  <a class="btn-rese" href="/menu2">■</a><span class="word-rese">Rese</span>
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
        @if (Auth::check())
        @if($likes->where('restaurant_id', $restaurant->id)->where('user_id', auth()->user()->id)->first() != null)
        <a href="{{route('unlike', $restaurant)}}">
          <img src="{{asset('/picture/heart_fill.png')}}" alt="" class=btn-like>
        </a>
        @else
        <a href="{{route('like', $restaurant)}}">
          <img src="{{asset('/picture/heart.png')}}" alt="" class=btn-like>
        </a>
        @endif
        @else
        @endif
      </div>
  </div>
  @endforeach
</div>









