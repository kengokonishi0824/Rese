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
    <p class="">#予約可能時間　{{substr($restaurants->start_reservation,0,5)}}~{{substr($restaurants->last_reservation,0,5)}}</p>
    <p class="">#予約可能人数　{{$restaurants->number_people}}人まで</p>
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
            <select name = "reservation_time" class="reservation-form-box" id="reservation-form-time">
            <option value="{{old('reservation_time')}}" selected>{{substr(old('reservation_time'),0,5)}}</option>
            @foreach ($times as $time)
            @if($restaurants->start_reservation <= $time->time & $time->time <= $restaurants->last_reservation)
            <option value="{{substr($time->time,0,5)}}">{{substr($time->time,0,5)}}</option>
            @endif
            @endforeach
            </select>
          </p>
          <p>
            <select name="number_people" class="reservation-form-box" id="reservation-form-number">
              <option value="{{old('number_people')}}" selected>{{old('number_people')}}人</option>
              @foreach ($people as $person)
              @if($person->number_people <= $restaurants->number_people)
              <option value="{{$person->number_people}}">{{$person->number_people}}人</option>
              @endif
              @endforeach
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
                <td class="confirm-content" id="confirmtime">{{substr(old('reservation_time'),0,5)}}</td>
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