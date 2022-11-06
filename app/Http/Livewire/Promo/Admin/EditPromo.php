<?php

namespace App\Http\Livewire\Promo\Admin;

use App\Models\Promo;
use Livewire\Component;

class EditPromo extends Component
{
    public Promo $promo;

    protected $rules = [
        'promo.title' => 'required|string|max:50',
        'promo.description' => 'required|string|max:191',
    ];

    public function update()
    {
        $this->validate();

        $this->promo->save();

        return redirect()->route('promo.admin.index');
    }

    public function render()
    {
        return view('livewire.promo.admin.edit-promo');
    }
}
