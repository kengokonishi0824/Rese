<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>change_reservation</title>
</head>

@if (Auth::check())
  <a class="btn-rese" href="/menu1">■</a><span class="word-rese">Rese</span>
@else
  <a class="btn-rese" href="/menu2">■</a><span class="word-rese">Rese</span>
@endif

<div class="detail-page">
  <div class="detail-left">
    <div class="detail-top">
      <p class="btn-back">
        <a class="detail-back" href=/home><</a>
        <span class="detail-restaurant">{{$reservations->restaurant->name}}</span>
      </p>
    </div>
    <img src="{{$reservations->restaurant->picture}}" class="detail-picture">
    <p class="">#{{$reservations->restaurant->prefecture->prefecture}} #{{$reservations->restaurant->category->category}}</p>
    <p class="">{{$reservations->restaurant->overview}}</p>
  </div>
  <div class="detail-right">
    @if (Auth::check())
    <div class="reservation-box">
      <p class="yoyaku">予約内容
      </p>
          <div class="confirm-box">
            <table>
              <tr>
                <td width="100" height="45" class="confirm-content" id="confirm-name">shop</td>
                <td class="confirm-content">{{$reservations->restaurant->name}}</td>
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content">Date</td>
                <td class="confirm-content" id="confirmdate">{{$reservations->reservation_date}}</td>
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content">Time</td>
                <td class="confirm-content" id="confirmtime">{{substr($reservations->reservation_time,0,5)}}</td>
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content" >Number</td>
                <td class="confirm-content"><span id="confirmnumber">{{$reservations->number_people}}</span>人</td>
              </tr>
            </table>
          </div>
          <div class=reservation-form>
        <form action="/review" method="POST">
          @csrf
          <input type="hidden" name="reservation_id" value="{{$reservations->id}}">
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <p>
            <select name="stars" class="reservation-form-box">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </p>
          <input type="text" name="comment" value="{{$reservations->reservation_id}}">
          </div>
          <div class="reservation">
            <input type="submit" value="レビューを投稿する" class="btn-reservation">
          </div>
      </div>
        </form>
    @else
    <div class="reservation-box">
      <p class="yoyaku">予約するにはログインが必要になります</p>
    @endif
  </div>
</div>

<script src="{{ asset('/js/script.js') }}"></script>