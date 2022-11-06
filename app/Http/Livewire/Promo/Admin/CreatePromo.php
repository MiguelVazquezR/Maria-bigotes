<?php

namespace App\Http\Livewire\Promo\Admin;

use App\Models\Promo;
use Livewire\Component;

class CreatePromo extends Component
{
    public $title,
        $description;

    protected $rules = [
        'title' => 'required|string|max:50',
        'description' => 'required|string|max:191',
    ];

    public function store()
    {
        $validated = $this->validate();

        Promo::create($validated);

        return redirect()->route('promo.admin.index')->with('message', 'Nueva promoción agregada');
    }

    public function render()
    {
        return view('livewire.promo.admin.create-promo');
    }
}
