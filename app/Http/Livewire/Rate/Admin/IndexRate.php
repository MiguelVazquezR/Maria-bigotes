<?php

namespace App\Http\Livewire\Rate\Admin;

use App\Models\Rate;
use Livewire\Component;

class IndexRate extends Component
{
    public function render()
    {
        $rates = Rate::latest()->paginate(10);

        return view('livewire.rate.admin.index-rate', compact('rates'));
    }
}
