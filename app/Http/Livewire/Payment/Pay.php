<?php

namespace App\Http\Livewire\Payment;

use App\Models\Product;
use Livewire\Component;

class Pay extends Component
{
    public $product,
        $quantity,
        $notes;

    public function render()
    {
        return view('livewire.payment.pay')->layout('layouts.guest');
    }
}
