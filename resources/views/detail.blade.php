<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restarants_detail</title>
  @livewireStyles
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
        <a class="detail-back" href="/"><</a>
        <span class="detail-restaurant">{{$restaurants->name}}</span>
      </p>
    </div>
    <img src="{{$restaurants->picture}}" class="detail-picture">
    <p class="">#{{$restaurants->prefecture->prefecture}} #{{$restaurants->category->category}}</p>
    <p class="">#予約可能時間　{{$restaurants->start_reservation}}:00~{{$restaurants->last_reservation}}:00</p>
    <p class="">{{$restaurants->overview}}</p>
  </div>
  <div class="detail-right">
    @if (Auth::check())
    <div class="reservation-box">
      <p class="yoyaku">予約</p>
      <div class=reservation-form>
        <form action="/done" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="hidden" name="restaurant_id" value="{{$restaurants->id}}">
          <p>
            <input type="date" name="reservation_date" class="reservation-form-box" id="reservation-form-date" value="{{old('reservation_date')}}">
          </p>
          <p>
            <select name = "reservation_hour" class="reservation-form-box">
            @foreach ($times as $time)
            @if($restaurants->start_reservation <= $time->time_hour & $time->time_hour <= $restaurants->last_reservation)
            <option value="{{$time->time_hour}}">{{$time->time_hour}}</option>
            @endif
            @endforeach
            </select>
            <input type="time" name="reservation_time" class="reservation-form-box" id="reservation-form-time" value="{{old('reservation_time')}}">
          </p>
          <p>
            <select name="number_people" class="reservation-form-box" id="reservation-form-number">
              <option value="" selected>{{old('number_people')}}人</option>
              <option value="1">1人</option>
              <option value="2">2人</option>
              <option value="3">3人</option>
              <option value="4">4人</option>
              <option value="5">5人</option>
            </select>
          </p>
          </div>
          <div class="confirm-box">
            <table>
              <tr>
                <td width="100" height="45" class="confirm-content" id="confirm-name">shop</td>
                <td class="confirm-content">{{$restaurants->name}}</td>
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content">Date</td>
                <td class="confirm-content" id="confirmdate">{{old('reservation_date')}}</td>
              </tr>
              <tr>
                @error('reservation_date')
                <td width="100" height="20" class="confirm-content"></td>
                <td class="confirm-content">※{{$message}}</td>
                @enderror
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content">Time</td>
                <td class="confirm-content" id="confirmtime">{{old('reservation_time')}}</td>
              </tr>
              <tr>
                @error('reservation_time')
                <td width="100" height="20" class="confirm-content"></td>
                <td class="confirm-content">※{{$message}}</td>
                @enderror
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content" >Number</td>
                <td class="confirm-content"><span id="confirmnumber">{{old('number_people')}}</span>人</td>
              </tr>
              <tr>
                @error('number_people')
                <td width="100" height="20" class="confirm-content"></td>
                <td class="confirm-content">※{{$message}}</td>
                @enderror
              </tr>
            </table>
          </div>
          <div class="reservation">
            <input type="submit" value="予約する" class="btn-reservation">
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