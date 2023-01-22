<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>


<div>
  <p>
    ログイン中：{{ Auth::guard('admin')->user()->name ?? 'undefined' }}
  </p>
  <p>
    <a href="{{ route('admin.logout') }}">
      ログアウト
    </a>
  </P>
  <p>
    <a href="/admin">
      HOMEに戻る
    </a>
  </P>
</div>

<div>
  <form action="/admin/all" method="GET" class="search-box">
    <p class="p-select-tag"><select name="prefecture_id" class="select-tag">
            <option value="0">All area</option>
      @foreach ($areas as $area)
            <option value="{{$area->prefecture->id}}">{{$area->prefecture->prefecture}}</option>
      @endforeach
    </select>
    </p>
    <p class="p-select-tag">
    <select name="category_id" class="select-tag">
            <option value="0">All genre</option>
      @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
      @endforeach
    </select>
    </p>
    <p class="p-select-tag">
    <input type="image" src="{{asset('/picture/search.png')}}" alt="" class="btn-search" >
    </p>
    <p class="p-search-form">
    <input type="text" name="name" placeholder="Search..." class="search-form">
    </p>
  </form>
</div>

<div class="restaurant_all">
  @foreach ($restaurants as $restaurant)
  <a href="/admin/detail/{{$restaurant->id}}" class="restaurant">
      <img src="{{$restaurant->picture}}" class="picture">
      <p class="restaurant_name">{{$restaurant->name}}</p>
      <p class="restaurant_tag">#{{$restaurant->prefecture->prefecture}} #{{$restaurant->category->category}}</p>
  </a>
  @endforeach
</div>