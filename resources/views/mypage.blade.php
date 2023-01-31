<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>my_page</title>
</head>

@if (Auth::check())
  <a class="btn-rese" href="/menu1">■</a><span class="word-rese">Rese</span>
  @else
  <a class="btn-rese" href="/menu2">■</a><span class="word-rese">Rese</span>
  @endif
<div class="mypage">
  <div class="mypage-left">
    <p class="mypage-subtitle">予約状況</p>
    <?php $number=1;?>
    @foreach ($reservations as $reservation)
    @if($week < $reservation->reservation_date & $reservation->reservation_date < $now & $reservation->stars == null)
    <div class="reservation-all">
      <div class="mypage-reservation-header">
        <div class="reservation-header">
          <img src="{{asset('/picture/star.png')}}" class="timer">
          <p class="reservation-number">
            来店済み{{$number}} 
          </p>
        </div>
      </div>
      <table>
        <tr>
          <td width="100" height="45" class="confirm-content">shop</td>
          <td class="confirm-content">{{$reservation->restaurant->name}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Date</td>
          <td class="confirm-content">{{$reservation->reservation_date}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Time</td>
          <td class="confirm-content">{{substr($reservation->reservation_time,0,5)}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Number</td>
          <td class="confirm-content">{{$reservation->number_people}}人</td>
        </tr>
      </table>
      <div class="mypage-change">
        <a class="btn-change" href="/mypage/review/{{$reservation->id}}">
          レビューをつける
        </a>
      </div>
    </div>
    <?php $number++;?>
    @endif
    @endforeach

    @foreach($reservations as $reservation)
    @if($week < $reservation->reservation_date &$reservation->reservation_date < $now & $reservation->stars !== null)
    <div class="reservation-all">
      <div class="mypage-reservation-header">
        <div class="reservation-header">
          <img src="{{asset('/picture/star.png')}}" class="timer">
          <p class="reservation-number">
            来店済み{{$number}} 
          </p>
        </div>
      </div>
      <table>
        <tr>
          <td width="100" height="45" class="confirm-content">shop</td>
          <td class="confirm-content">{{$reservation->restaurant->name}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Date</td>
          <td class="confirm-content">{{$reservation->reservation_date}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Time</td>
          <td class="confirm-content">{{substr($reservation->reservation_time,0,5)}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Number</td>
          <td class="confirm-content">{{$reservation->number_people}}人</td>
        </tr>
      </table>
      <div class="mypage-change">
        <a class="btn-change" href="/mypage/review/{{$reservation->id}}">
          レビューを編集
        </a>
      </div>
    </div>
    <?php $number++;?>
    @endif
    @endforeach

    <?php $number=1;?>
    @foreach($reservations as $reservation)
    @if($now == $reservation->reservation_date)
    <div class="reservation-all">
      <div class="mypage-reservation-header">
        <div class="reservation-header">
          <img src="{{asset('/picture/access_time.png')}}" class="timer">
          <p class="reservation-number">
            予約{{$number}} 
          </p>
        </div>
      </div>
      <table>
        <tr>
          <td width="100" height="45" class="confirm-content">shop</td>
          <td class="confirm-content">{{$reservation->restaurant->name}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Date</td>
          <td class="confirm-content">{{$reservation->reservation_date}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Time</td>
          <td class="confirm-content">{{substr($reservation->reservation_time,0,5)}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Number</td>
          <td class="confirm-content">{{$reservation->number_people}}人</td>
        </tr>
        <tr>
          <td class="confirm-content" colspan="2">※当日の変更・キャンセルの場合は直接ご連絡ください。</td>
        </tr>
      </table>
    @endif
    @endforeach
    </div>

    @foreach ($reservations as $reservation)
    @if($now < $reservation->reservation_date)
    <div class="reservation-all">
      <div class="mypage-reservation-header">
        <div class="reservation-header">
          <img src="{{asset('/picture/access_time.png')}}" class="timer">
          <p class="reservation-number">
            予約{{$number}} 
          </p>
        </div>
        <form action="/remove" method="POST" class="reservation-number">
          @csrf
          <input type="hidden" name="id" value="{{$reservation->id}}">
          <input type="image" src="{{asset('/picture/xmark_circle.png')}}" alt="削除" class="btn-delete" >
        </form>
      </div>
      <table>
        <tr>
          <td width="100" height="45" class="confirm-content">shop</td>
          <td class="confirm-content">{{$reservation->restaurant->name}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Date</td>
          <td class="confirm-content">{{$reservation->reservation_date}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Time</td>
          <td class="confirm-content">{{substr($reservation->reservation_time,0,5)}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">Number</td>
          <td class="confirm-content">{{$reservation->number_people}}人</td>
        </tr>
      </table>
      <div class="mypage-change">
        <a class="btn-change" href="/mypage/change/{{$reservation->id}}">
          予約内容を変更する
        </a>
      </div>
    </div>
    <?php $number++;?>
    @endif
    @endforeach


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
          @if($like->where('restaurant_id', $like->restaurant->id) != null)
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
