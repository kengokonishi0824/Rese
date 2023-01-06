<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>menu1</title>
</head>

<a class="btn-close" href=/ >×</a>

<div class="menu-box">
  <p>
    <a class="menu-link" href=/home>Home</a>
  </p>
  <p>
    <form method="post" action="/logout">
    @csrf
    <input class="menu-link" type="submit" value="Logout">
    </form>
  </p>
  <p>
    <a class="menu-link" href=/mypage>Mypage</a>
  </p>
</div>