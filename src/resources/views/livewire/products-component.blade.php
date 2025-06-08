<div class="container mt-5">
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->titulo }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">${{ $producto->precio }}</p>
                        <button wire:click="agregarAlCarrito({{ $producto->id }})" class="btn btn-primary">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
