<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel File Upload</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <nav>
            <a href="{{ route('files.index') }}">Archivos</a>
            <a href="{{ route('files.create') }}">Subir Archivo</a>
        </nav>
        @yield('content')
    </div>
</body>
</html>