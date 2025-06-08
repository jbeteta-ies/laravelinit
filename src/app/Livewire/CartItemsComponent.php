<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use App\Models\Cart;

class CartItemsComponent extends Component
{

    public $items = []; // Array para almacenar los elementos del carrito
    public $cartId; // ID del carrito, si es necesario
    public $totalPrice = 0; // Variable para almacenar el precio total del carrito

    protected $listeners = ['cartUpdated' => 'cartUpdated'];

    public function mount()
    {
       // Inicializar los elementos del carrito (suponemos que hay un solo carrito)
        $carrito = Cart::first(); // Obtenemos el primer carrito disponible
        $this->cartId = $carrito ? $carrito->id : null; // Asignamos el ID del carrito si existe
        if ($carrito) {
            $this->items = $carrito->items; // Obtenemos los elementos del carrito
            $this->totalCartPrice(); // Llamamos al método para calcular el precio total del carrito
        } else {
            $this->items = []; // Si no hay carrito, asignamos un array vacío
        }
    }

    public function cartUpdated()
    {
        // Actualizar los elementos del carrito cuando se agregue un nuevo producto
        $cart = Cart::Find($this->cartId); // Buscar el carrito por ID
        if ($cart) {
            $this->items = $cart->items; // Actualizamos los elementos del carrito
            $this->totalCartPrice();
        }
    }

    public function removeFromCart($itemId)
    {
        // Find the item by ID and delete it
        $item = CartItem::where('product_id', $itemId)->where('cart_id', $this->cartId)->first();
        if ($item) {
            $item->delete();
            $this->cartUpdated();
        }
    }

    public function totalCartPrice()
    {
        $this->totalPrice = 0; // Reiniciar el precio total antes de calcularlo
        foreach ($this->items as $item) {
            // Asegurarse de que cada item tenga un producto relacionado con un precio
            if (isset($item->pivot->quantity) && isset($item->pivot->price)) {
                $this->totalPrice += $item->pivot->price * $item->pivot->quantity; // Calcular el precio total
            }
        }
         return $this->totalPrice; // Retornar el precio total calculado
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */

    public function render()
    {
        return view('livewire.cart-items-component', [
            'items' => $this->items, // Pasar los elementos del carrito a la vista
        ]);
    }
}
