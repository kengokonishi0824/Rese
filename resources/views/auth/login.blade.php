<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

    @if (Auth::check())
    <a class="btn-rese" href="/menu1">■</a><span class="word-rese">Rese</span>
    @else
    <a class="btn-rese" href="/menu2">■</a><span class="word-rese">Rese</span>
    @endif

    <div class="page-breeze">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="header-breeze">
                    login
            </div>
            <!-- Email Address -->
            <div class="breeze-form">
                <img src="{{asset('/picture/mail.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Email" id="email" class="breeze-form-box" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="breeze-form">
                <img src="{{asset('/picture/lock.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Password" id="password" class="breeze-form-box"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <div class="btn-breeze">
                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
            </div>
        </form>
    </div>    
    
