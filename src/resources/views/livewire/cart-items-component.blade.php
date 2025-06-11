<div class="container mt-5">
    <h2>Carrito: {{ $this->totalPrice }}$</h2>

    @forelse($items as $item)
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->titulo }} </h5>
                                <img src="{{ asset('storage/img/' . $item->imagen) }}" class="card-img-top"
                                    height="128" alt="{{ $item->titulo }}">
                                <p class="card-text">Precio: {{ $item->pivot->price }} €</p>
                                <p class="card-text">Cantidad: {{ $item->pivot->quantity }}</p>
                                <button wire:click="removeFromCart({{ $item->id }})"
                                    class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No hay productos en el carrito.</p>
    @endforelse
</div>
