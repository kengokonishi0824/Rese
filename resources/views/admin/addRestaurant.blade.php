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

    <form method="POST" action="/add">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Area</label>
              <select name="prefecture_id" class="select-prefecture">
              @foreach ($prefectures as $prefecture)
              <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
              @endforeach
              </select>
    </select>
        </div>
        <div>
            <label for="password">Genre</label>
              <select name="category_id" class="select-category">
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->category}}</option>
              @endforeach
              </select>
        </div>
        <div>
            <label >Overview</label>
            <input type="text" name="overview">
        </div>
        <div>
            <label for="VPN">Picture</label>
            <input type="text" name="picture">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>