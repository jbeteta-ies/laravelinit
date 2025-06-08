<?php

namespace App\Livewire;

use Livewire\Component;

class NavComponent extends Component
{
    public $busqueda = '';
    public $filtroActivo = false;

    public function filtrarProductos()
    {
        // Emitir el evento de filtrado a los otros componentes
        if ($this->busqueda === '') {
            $this->filtroActivo = false;
        } else {
            $this->filtroActivo = true;
        }
        $this->dispatch ('filtro', $this->busqueda);
    }

    public function cancelarFiltro()
    {
        $this->busqueda = '';
        $this->filtroActivo = false;
        $this->dispatch('filtro', '');
    }

    public function render()
    {
        return view('livewire.nav-component', [
            'busqueda' => $this->busqueda,
        ]);
    }
}
