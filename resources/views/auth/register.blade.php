<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

    @if (Auth::check())
    <a class="btn-rese" href="/menu1">■</a><span class="word-rese">Rese</span>
    @else
    <a class="btn-rese" href="/menu2">■</a><span class="word-rese">Rese</span>
    @endif


    <div class="page-breeze">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="header-breeze">
                    Registration
            </div>

            <!-- Name -->
            <div class="breeze-form">
                <img src="{{asset('/picture/person_alt.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Username" id="name" class="breeze-form-box" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="breeze-form">
                <img src="{{asset('/picture/mail.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Email" id="email" class="breeze-form-box" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="breeze-form">
                <img src="{{asset('/picture/lock.png')}}" alt="" class="breeze-icon">
                <x-input  placeholder="Password" id="password" class="breeze-form-box"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            <div class="btn-breeze">
                <x-button class="ml-3">
                    {{ __('登録') }}
                </x-button>
            </div>
            </div>
        </form>
    </div>
