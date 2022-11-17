<?php

namespace App\Http\Livewire\OrderNow;

use App\Models\Product;
use Livewire\Component;

class SelectedProduct extends Component
{
    public Product $product;
    public $quantity = 0,
        $total = 0,
        $notes;

    public function updatedQuantity()
    {
        $this->total = intval($this->quantity) * $this->product->price;
    }

    public function increment()
    {
        $this->quantity++;
        $this->total = intval($this->quantity) * $this->product->price;
    }
    
    public function decrement()
    {
        if($this->quantity > 0 ) {
            $this->quantity--;
            $this->total = intval($this->quantity) * $this->product->price;
        }
    }

    public function addToCart($product_id, $quantity, $notes)
    {
        $this->emit('addToCart', $product_id, $quantity, $notes);
        return redirect()->route('menu');
    }

    public function render()
    {
        return view('livewire.order-now.selected-product')->layout('layouts.guest');
    }
}
