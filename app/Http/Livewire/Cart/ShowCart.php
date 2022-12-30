<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;

class ShowCart extends Component
{
    public $cart_items = [],
        $total = 0.0,
        $loading = true;

    protected $listeners = [
        'syncCartItems'
    ];

    public function syncCartItems($items)
    {
        foreach ($items as $index => $item) {
            $product = Product::find($item['product_id']);
            if($product) {
                $this->cart_items[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'notes' => $item['notes'],
                ];
                $this->total += $product->price * $item['quantity'];
            } else {
                $this->cart_items[] = [
                    'product' => null,
                ];
            }
        }
        $this->loading = false;
    }

    public function deleteCartItem($index)
    {
        $this->emit('deleteCartItem', $index);
    }

    public function render()
    {
        return view('livewire.cart.show-cart')->layout('layouts.guest');
    }
}
