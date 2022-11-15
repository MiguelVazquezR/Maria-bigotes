<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Cart extends Component
{
    public $items_number = 0;

    protected $listeners = [
        'syncCartItemsNumber',
    ];

    public function syncCartItemsNumber($items_number)
    {
        $this->items_number = $items_number;
    }

    public function render()
    {   
        return view('livewire.cart.cart');
    }
}
