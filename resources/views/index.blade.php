<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>restarants_all</title>
</head>

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
  <input type="text" name="name" class="todo-add-form">
  <input type="submit" value="検索" class= "button-add">
    </form>
</div>

<div class="restaurant_all">
  @foreach ($restaurants as $restaurant)
  <div class="restaurant">
    <div class="">
      <img src="{{$restaurant->picture}}" class="picture">
    </div>
    <div class="contents">
      <p class="restaurant_name">{{$restaurant->name}}</p>
      <p>#{{$restaurant->prefecture->prefecture}} #{{$restaurant->category->category}}</p>
    </div>
  </div>
  @endforeach
</div>









