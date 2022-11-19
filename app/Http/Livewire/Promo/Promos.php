<?php

namespace App\Http\Livewire\Promo;

use App\Models\Promo;
use Livewire\Component;

class Promos extends Component
{
    public function render()
    {
        $promos = Promo::latest()->paginate(10);

        return view('livewire.promo.promos', compact('promos'))->layout('layouts.guest');
    }
}
