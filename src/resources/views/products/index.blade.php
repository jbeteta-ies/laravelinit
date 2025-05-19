<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de Productos</h1>
            <a href="#" class="btn btn-success">Crear Producto</a>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="row g-3 mb-3">
            <div class="col-auto">
                <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Buscar por nombre" />
            </div>
            <div class="col-auto">
                <input type="number" name="price_min" value="{{ request('price_min') }}" class="form-control" placeholder="Precio mínimo" />
            </div>
            <div class="col-auto">
                <input type="number" name="price_max" value="{{ request('price_max') }}" class="form-control" placeholder="Precio máximo" />
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <div class="mb-3">
            <strong>Ordenar por:</strong>
            <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'name', 'direction' => 'asc'])) }}" rel="nofollow" class="btn btn-outline-secondary btn-sm">Nombre ↑</a>
            <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'name', 'direction' => 'desc'])) }}" rel="nofollow" class="btn btn-outline-secondary btn-sm">Nombre ↓</a>
            <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price', 'direction' => 'asc'])) }}" rel="nofollow" class="btn btn-outline-secondary btn-sm">Precio ↑</a>
            <a href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price', 'direction' => 'desc'])) }}" rel="nofollow" class="btn btn-outline-secondary btn-sm">Precio ↓</a>
        </div>

        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th style="width: 200px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 2, ',', '.') }} €</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary me-1">Editar</a>
                            <button type="button" class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
