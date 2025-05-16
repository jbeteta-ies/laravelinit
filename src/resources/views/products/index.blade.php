<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Lista de Productos</h1>
    <form method="GET" action="{{ route('products.index', request()->all()) }}">
        <input type="text" name="name" value="{{ request('name') }}" placeholder="Buscar por nombre">
        <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Precio mínimo">
        <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Precio máximo">
        <button type="submit">Filtrar</button>
    </form>
    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'name', 'direction' => 'asc'])) }}">Nombre
        ↑</a>
    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'name', 'direction' => 'desc'])) }}">Nombre
        ↓</a>
    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price', 'direction' => 'asc'])) }}">Precio
        ↑</a>
    <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price', 'direction' => 'desc'])) }}">Precio
        ↓</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $products->links('pagination::simple-bootstrap-5') }}
</body>

</html>
