<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios y teléfonos</title>
</head>
<body>
    <h1>Usuarios</h1>
    @if ($user)
        <div>
            <h2>{{ $user->name }}</h2>
            <p>Email: {{ $user->email }}</p>
            @forelse($user->phones as $phone)
                <h3>Teléfono: {{ $loop->index }}   </h3>
                <p>Teléfono: {{ $phone->number }}</p>
                <p>Prefijo: {{ $phone->prefix }}</p>
            @empty
                <p>No hay teléfonos disponibles.</p>
            @endforelse
        </div>
    @else
        <p>Telefono no encontrado.</p>
    @endif
</body>
</html>