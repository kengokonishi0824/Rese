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
    <div class="picture"></div>
    <div class="contents">
      <p class="restaurant_name">{{$restaurant->name}}</p>
      <p>#{{$restaurant->location}} #{{$restaurant->category}}</p>
  </div>
  </div>
  @endforeach
</div>



