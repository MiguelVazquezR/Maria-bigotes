<?php

namespace App\Http\Livewire\Payment;

use App\Models\Product;
use Livewire\Component;

class Pay extends Component
{
    public $cart_items = [],
        $total = 0.0,
        $loading = true;

    protected $listeners = [
        'syncCartItems'
    ];

    public function syncCartItems($items)
    {
        foreach ($items as $item) {
            $product = Product::find($item['product_id']);
            $this->cart_items[] = [
                'product' => $product,
                'quantity' => $item['quantity'],
                'notes' => $item['notes'],
            ];
            $this->total += $product->price * $item['quantity'];
        }

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.payment.pay')->layout('layouts.guest');
    }
}
