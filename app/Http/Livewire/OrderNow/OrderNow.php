<?php

namespace App\Http\Livewire\OrderNow;

use App\Models\Category;
use Livewire\Component;

class OrderNow extends Component
{
    public function render()
    {
        $categories = Category::latest()->get();

        return view('livewire.order-now.order-now', compact('categories'))->layout('layouts.guest');
    }
}
