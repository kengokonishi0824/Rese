<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin_page</title>
</head>

    <form action="/add" method="post">
    <div class="todo-add">
    
      @csrf
      @if ($errors->has('content'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('content')}}
          </td>
        </tr>
        @endif
    <input type="text" name="name" class="name-add-form">
    <select name="prefecture_id" class="select-prefecture">
      @foreach ($prefectures as $prefecture)
            <option value="{{$prefecture->id}}">{{$prefecture->prefecture}}</option>
      @endforeach
    </select>
    <select name="prefecture_id" class="select-category">
      @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
      @endforeach
    </select>
    <input type="text" name="overview" class="overview-add-form">
    <input type="text" name="picture" class="picture-add-form">
    <input class="button-add" type="submit" value="追加">
    </div>
    </form>


