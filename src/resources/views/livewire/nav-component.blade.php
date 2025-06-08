<div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <input type="text" wire:model="busqueda" class="form-control" placeholder="Buscar productos...">
        <button wire:click="filtrarProductos" class="btn btn-primary" title="Filtrar"> Filtrar</button>
        @if($filtroActivo)
            <button wire:click="cancelarFiltro" class="btn btn-danger" title="Eliminar Filtro">X</button>
        @endif
    </div>
</div>
