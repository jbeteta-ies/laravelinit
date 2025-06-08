<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Cart;

class ProductsComponent extends Component
{
    
    protected $listeners = ['filtro' => 'filtrarProductos'];
    
    public $productos;

    public function mount()
    {
        // Obtener los productos desde la base de datos
        $this->productos = Product::all();
    }

    public function filtrarProductos($busqueda)
    {
        // Filtrar los productos según la búsqueda
        if ($busqueda) {
            $this->productos = Product::where('titulo', 'like', '%' . $busqueda . '%')
                ->orWhere('descripcion', 'like', '%' . $busqueda . '%')->get();   
        } else {
            $this->productos = Product::all();
        }
    }

    public function agregarAlCarrito($productoId)
    {
        // Obtener el carrito (asumiendo que solo hay uno)
        $carrito = Cart::first(); // Esto devuelve el primer carrito disponible

        if (!$carrito) {
            // Si no existe un carrito, se crea uno nuevo
            $carrito = new Cart();
            $carrito->save();
        }

        // Buscar si el producto ya está en el carrito
        $cartItem = CartItem::where('cart_id', $carrito->id)
                            ->where('product_id', $productoId)
                            ->first();

        // Buscar el producto
        $producto = Product::find($productoId);

        if (!$cartItem) {
            // Si el producto no está en el carrito, crear un nuevo CartItem
            $cartItem = new CartItem();
            $cartItem->cart_id = $carrito->id;
            $cartItem->product_id = $productoId;
            $cartItem->quantity = 1; // Asignar una cantidad inicial de 1
            $cartItem->price = $producto->precio; // Guardar el precio actual del producto
            $cartItem->save();
        } else {
            // Si ya existe, incrementar la cantidad
            $cartItem->quantity++;
            $cartItem->save();
        }

        // Disparar el evento de carrito actualizado
        $this->dispatch('cartUpdated', [
            'cartItem' => $cartItem,
        ]);
    }

    public function render()
    {
        return view('livewire.products-component', [
            'productos' => $this->productos,
        ]);
    }
}
