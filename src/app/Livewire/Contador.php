<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{
    public $contador = 0;

    public function incrementar()
    {
        $this->contador++;
    }

    public function decrementar()
    {
        if ($this->contador > 0) $this->contador--;
    }

    public function resetear()
    {
        $this->contador = 0;
    }

    public function render()
    {
        return view('livewire.contador');
    }
}
