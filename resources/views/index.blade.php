<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restarants_all</title>
</head>

<div class="restaurant_all">
  @foreach ($restaurants as $restaurant)
  <div class="restaurant">
    <div class="">
      <img src="{{$restaurant->picture}}" class="picture">
    </div>
    <div class="contents">
      <p class="restaurant_name">{{$restaurant->name}}</p>
      <p>#{{$restaurant->prefecture_id}} #{{$restaurant->category_id}}</p>
    </div>
  </div>
  @endforeach
</div>


@foreach ($restaurants as $restaurant)

<div class="">
      <p class="">{{$restaurant->name}}</p>
      <p>#{{$restaurant->prefecture_id}} #{{$restaurant->category_id}}</p>
</div>

  @endforeach








