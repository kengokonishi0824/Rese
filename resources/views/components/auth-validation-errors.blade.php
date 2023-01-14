<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="auth-validation-notification">
            {{ __('--ご確認ください!!--') }}
        </div>

        <ul class="auth-validation-content">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
