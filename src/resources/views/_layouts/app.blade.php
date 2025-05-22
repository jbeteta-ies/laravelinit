<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Default Title')
        - {{ config('app.name') }}
    </title>
</head>
<body>
    <nav>
        <a href="{{ route('landing', 'val') }}">{{ __('landing.link')}}</a>
        <a href="{{ route('lang.switch', 'en') }}">English</a> |
        <a href="{{ route('lang.switch', 'es') }}">Español</a> |
        <a href="{{ route('lang.switch', 'val') }}">Valencià</a>
    </nav>
    <h2>Idioma seleccionado: {{ Session::has('locale') ? Session::get('locale') : "Nothing"}}</h2>
    @yield('content')
</body>
</html>