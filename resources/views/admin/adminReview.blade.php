<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_detail</title>
</head>

<div class="mypage-left">
    @foreach ($reservations as $reservation)
    <p class="mypage-subtitle">"{{$reservation->restaurant->name}}"レビュー確認</p>
    <?php $number=1;?>
    <div class="reservation-all">
      <div class="mypage-reservation-header">
        <div class="reservation-header">
          <p class="reservation-number">
            {{$number}} 
          </p>
        </div>
      </div>
      <table>
        <tr>
          <td width="100" height="45" class="confirm-content">Name</td>
          <td class="confirm-content">{{$reservation->user->name}}</td>
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
          <td width="100" height="45" class="confirm-content">Stars</td>
          <td class="confirm-content">{{$reservation->stars}}</td>
        </tr>
        <tr>
          <td width="100" height="45" class="confirm-content">comment</td>
          <td class="confirm-content">{{$reservation->comment}}</td>
        </tr>
      </table>
    </div>
    @endforeach
