<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Mi Aplicación de Notas</h1>
        @include('_partials.messages')
        <nav>
            <a href="{{ route('note.index') }}">Inicio</a> |
            <a href="{{ route('note.create') }}">Crear Nota</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>