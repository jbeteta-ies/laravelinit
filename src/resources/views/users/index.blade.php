<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios y teléfonos</title>
</head>
<body>
    <h1>Usuarios</h1>
    @forelse($users as $user)
        <div>
            <h2>{{ $user->name }}</h2>
            <p>Email: {{ $user->email }}</p>
            <p>Prefijo: {{ $user->phone->prefix ?? 'No disponible' }}</p>
            <p>Teléfono: {{ $user->phone->number ?? 'No disponible' }}</p>
            <p>Tarjeta SIM: {{ $user->simCard->serial_number  ?? 'No disponible' }}</p>
        </div>
    @empty
        <p>No hay usuarios disponibles.</p>
    @endforelse
</body>
</html>