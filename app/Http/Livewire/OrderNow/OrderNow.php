<?php

namespace App\Http\Livewire\OrderNow;

use Livewire\Component;

class OrderNow extends Component
{
    public function render()
    {
        return view('livewire.order-now.order-now')->layout('layouts.guest');
    }
}
