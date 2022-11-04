<?php

namespace App\Http\Livewire\Menu;

use App\Models\Product;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        $products = Product::all();

        return view('livewire.menu.menu', compact('products'))->layout('layouts.guest');
    }
}
