<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>

<body>
    <h1>Listado de Usuarios</h1>

    @if ($usuarios->isEmpty())
        <p>No hay usuarios disponibles.</p>
    @else
        <ul>
            @foreach ($usuarios as $usuario)
                <li>{{ $loop->iteration }}. {{ $usuario->name }} ({{ $usuario->age }} años)</li>
            @endforeach
        </ul>
    @endif
</body>

</html>
