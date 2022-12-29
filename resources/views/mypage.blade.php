<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>my_page</title>
</head>

<div class="mypage">
  <div class="mypage-left">
    <p class="mypage-name">Rese</p>
    <p class="mypage-subtitle">予約状況</p>
    <?php $number=1;?>
    @foreach ($reservations as $reservation)
    <div class="reservation-all">
      <p class="confirm-content">予約{{$number}}　　　
        <img src="{{asset('/picture/Multiply Circle.png')}}" alt="" class=btn-delete>
      </p>
      <table>
        <tr>
          <td width="100" class="confirm-content">shop</td>
          <td class="confirm-content">{{$reservation->restaurant->name}}</td>
        </tr>
        <tr>
          <td width="100" class="confirm-content">Date</td>
          <td class="confirm-content">{{$reservation->reservation_date}}</td>
        </tr>
        <tr>
          <td width="100" class="confirm-content">Time</td>
          <td class="confirm-content">{{substr($reservation->reservation_time,0,5)}}</td>
        </tr>
        <tr>
          <td width="100" class="confirm-content">Number</td>
          <td class="confirm-content">{{$reservation->number_people}}人</td>
        </tr>
      </table>
    </div>
    <?php $number++;?>
    @endforeach
  </div>

  <div class="mypage-right">
    @if (Auth::check())
    <p class="mypage-name">{{$user->name}}　さん</p>
    @else
    <p>ログインなし。（<a href="/login">ログイン</a>｜
    <a href="/register">登録</a>）</p>
    @endif
    <p class="mypage-subtitle">お気に入り店舗</p>
    <div class="mypage-like-all">
      @foreach ($likes as $like)
      <div class="mypage-likes">
        <img src="{{$like->restaurant->picture}}" class="picture">
        <p class="restaurant_name">{{$like->restaurant->name}}</p>
        <p class="restaurant_tag">#{{$like->restaurant->prefecture->prefecture}} #{{$like->restaurant->category->category}}</p>
        <div class="links">
          <a class="btn_detail" href="/detail/{{$like->restaurant->id}}">
          詳しく見る
          </a>
          @if($like->where('restaurant_id', $like->restaurant->id)->where('user_id', auth()->user()->id)->first() != null)
          <a href="{{route('unlike', $like->restaurant_id)}}">
            <img src="{{asset('/picture/heart_fill.png')}}" alt="" class=btn-like>
          </a>
          @else
          <a href="{{route('like', $like->restaurant_id)}}">
            <img src="{{asset('/picture/heart.png')}}" alt="" class=btn-like>
          </a>
          @endif
      </div>
    </div>
    @endforeach
  </div>
</div>




