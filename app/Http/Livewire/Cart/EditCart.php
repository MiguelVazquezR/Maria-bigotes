<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;

class EditCart extends Component
{
    public $quantity,
        $product,
        $notes,
        $index,
        $total;

    protected $rules = [
        'quantity' => 'required|numeric|min:1',
        'notes' => 'required|string|max:191',
    ];

    protected $listeners = [
        'syncCartItems'
    ];

    public function mount($index)
    {
        $this->index = $index;
        $this->product = new Product;
        $this->quantity = 0;
        $this->notes = '';
    }

    public function updatedQuantity()
    {
        $this->total = intval($this->quantity) * $this->product->price;
    }

    public function syncCartItems($items)
    {
        $this->product = Product::find($items[$this->index]['product_id']);
        $this->quantity = $items[$this->index]['quantity'];
        $this->notes = $items[$this->index]['notes'];
        $this->total += $this->product->price * $this->quantity;
    }

    public function update()
    {
        $this->validate();

        $this->emit('updateCartItem', $this->quantity, $this->notes, $this->index);

        return redirect()->route('cart.show');
    }

    public function render()
    {
        return view('livewire.cart.edit-cart')->layout('layouts.guest');
    }
}
