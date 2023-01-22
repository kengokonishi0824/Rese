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
        <a class="detail-back" href=/mypage><</a>
        <span class="detail-restaurant">{{$reservations->restaurant->name}}</span>
      </p>
    </div>
    <img src="{{$reservations->restaurant->picture}}" class="detail-picture">
    <p class="">#{{$reservations->restaurant->prefecture->prefecture}} #{{$reservations->restaurant->category->category}}</p>
    <p class="">#予約可能時間　{{substr($reservations->restaurant->start_reservation,0,5)}}~{{substr($reservations->restaurant->last_reservation,0,5)}}</p>
    <p class="">{{$reservations->restaurant->overview}}</p>
  </div>
  <div class="detail-right">
    @if (Auth::check())
    <div class="reservation-box">
      <p class="yoyaku">予約内容変更
      </p>
      <div class=reservation-form>
        <form action="/change_reservation" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$reservations->id}}">
          <p>
            @if(old('reservation_date') == null)
            <input type="date" name="reservation_date" class="reservation-form-box" id="reservation-form-date" value="{{$reservations->reservation_date}}">
            @else
            <input type="date" name="reservation_date" class="reservation-form-box" id="reservation-form-date" value="{{old('reservation_date')}}">
            @endif
          </p>
          <p>
            @if(old('reservation_time') == null)
            <select name = "reservation_time" class="reservation-form-box" id="reservation-form-time">
            <option value="{{substr($reservations->reservation_time,0,5)}}" selected>{{substr($reservations->reservation_time,0,5)}}</option>
            @foreach ($times as $time)
            @if($reservations->restaurant->start_reservation <= $time->time & $time->time <= $reservations->restaurant->last_reservation)
            <option value="{{substr($time->time,0,5)}}">{{substr($time->time,0,5)}}</option>
            @endif
            @endforeach
            </select>
            @else
            <select name = "reservation_time" class="reservation-form-box" id="reservation-form-time">
            <option value="{{substr(old('reservation_time'),0,5)}}" selected>{{substr(old('reservation_time'),0,5)}}</option>
            @foreach ($times as $time)
            @if($reservations->restaurant->start_reservation <= $time->time & $time->time <= $reservations->restaurant->last_reservation)
            <option value="{{substr($time->time,0,5)}}">{{substr($time->time,0,5)}}</option>
            @endif
            @endforeach
            </select>
            @endif
          </p>
          <p>
            <select name="number_people" class="reservation-form-box" id="reservation-form-number" >
              @if(old('number_people') == null)
              <option value="{{ $reservations->number_people}}" selected>{{$reservations->number_people}}人</option>
              <option value="1">1人</option>
              <option value="2">2人</option>
              <option value="3">3人</option>
              <option value="4">4人</option>
              <option value="5">5人</option>
              @else
              <option value="{{ $reservations->number_people}}" selected>{{old('number_people')}}人</option>
              <option value="1">1人</option>
              <option value="2">2人</option>
              <option value="3">3人</option>
              <option value="4">4人</option>
              <option value="5">5人</option>
              @endif
            </select>
          </p>
          </div>
          <div class="confirm-box">
            <table>
              <tr>
                <td width="100" height="45" class="confirm-content" id="confirm-name">shop</td>
                <td class="confirm-content">{{$reservations->restaurant->name}}</td>
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content">Date</td>
                @if(old('reservation_date') == null)
                <td class="confirm-content" id="confirmdate">{{$reservations->reservation_date}}</td>
                @else
                <td class="confirm-content" id="confirmdate">{{old('reservation_date')}}</td>
                @endif
              </tr>
              <tr>
                @error('reservation_date')
                <td width="100" height="20" class="confirm-content"></td>
                <td class="confirm-content">※{{$message}}</td>
                @enderror
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content">Time</td>
                @if(old('reservation_time') == null)
                <td class="confirm-content" id="confirmtime">{{substr($reservations->reservation_time,0,5)}}</td>
                @else
                <td class="confirm-content" id="confirmtime">{{substr(old('reservation_time'),0,5)}}</td>
                @endif
              </tr>
              <tr>
                @error('reservation_time')
                <td width="100" height="20" class="confirm-content"></td>
                <td class="confirm-content">※{{$message}}</td>
                @enderror
              </tr>
              <tr>
                <td width="100" height="45" class="confirm-content" >Number</td>
                @if(old('number_people') == null)
                <td class="confirm-content"><span id="confirmnumber">{{$reservations->number_people}}</span>人</td>
                @else
                <td class="confirm-content"><span id="confirmnumber">{{old('number_people')}}</span>人</td>
                @endif
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
            <input type="submit" value="予約内容を変更する" class="btn-reservation">
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