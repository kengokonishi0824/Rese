<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

<p>admin店追加</p>

<form action="/add" method="post">
<input type="text" name="name" class="name-add-form">
<select name="prefecture_id" class="select-prefecture">
      @foreach ($prefectures as $prefecture)
            <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
      @endforeach
    </select>
    <select name="category_id" class="select-category">
      @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
      @endforeach
    </select>
    <input type="text" name="overview" class="overview-add-form">
    <input type="text" name="picture" class="picture-add-form">
    <input class="button-add" type="submit" value="追加">
    </div>
    </form>


<p>admin店一覧</p>

<table class="todo-list-table">
  <tr>
    <th>id</th>
    <th>店名</th>
    <th>都道府県</th>
    <th>ジャンル</th>
    <th>概要</th>
    <th>画像URL</th>
  </tr>

  @foreach ($restaurants as $restaurant)
  <tr align="center">
    <td>
      {{$restaurant->id}}
    </td>
    <td><form action="/edit" method="POST">
    <input type="text" name="name" value="{{$restaurant->name}}" class="text-update">
    </td>
      @csrf
    <td>
      <select name="category_id" class="select-tag">
      @foreach ($prefectures as $prefecture)
              @if($prefecture->id==$restaurant->prefecture_id)
                  <option value="{{$prefecture->id}}" selected>{{$prefecture->prefecture}}</option>
              @else
                  <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
              @endif
      @endforeach
      </select>
    </td>
    <td>
      <select name="prefecture_id" class="select-category">
      @foreach ($categories as $category)
              @if($category->id==$restaurant->category_id)
                  <option value="{{$category->id}}" selected>{{$category->category}}</option>
              @else
                  <option value="{{$category->id}}">{{$category->category}}</option>
              @endif
      @endforeach
      </select>
    </td>
    <td>
      <input type="text" name="overview" value="{{$restaurant->overview}}" class="overview-add-form">
    </td>
    <td>
      <input type="text" name="picture" value="{{$restaurant->picture}}" class="overview-add-form">
    </td>
    <td>
        <input type ="hidden" name="id" value="{{$restaurant->id}}">
        <input type="submit" value="更新" class="button-update">
    </td>
    <td><form action="/delete" method="POST">
      @csrf
      <input type ="hidden" name="id" value="{{$restaurant->id}}">
      <input type="submit" value="削除" class="button-delete">
      </form>
    </td>
  </tr>
  @endforeach
</table>

<div>
  <p>
    ログイン中：{{ Auth::guard('admin')->user()->name ?? 'undefined' }}
  </p>
  <a href="{{ route('admin.logout') }}">
    ログアウト
  </a>
</div>

<div class="menu-box">
  <p>
    <a class="menu-link" href="/admin/all">店舗一覧</a>
  </p>
  <p>
    <a  class="menu-link" href="{{route('admin.register')}}">新規アカウント登録</a>
  </p>
  <p>
    <a  class="menu-link" href="/manager/register">新規店舗登録</a>
  </p>
</div>