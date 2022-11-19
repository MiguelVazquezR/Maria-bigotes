<?php

namespace App\Http\Livewire\Promo\Admin;

use App\Models\Promo;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePromo extends Component
{
    use WithFileUploads;
    
    public $title,
        $description,
        $image,
        $image_id;

    protected $rules = [
        'title' => 'required|string|max:50',
        'description' => 'required|string|max:191',
        'image' => 'required|image|max:4000',
    ];

    public function store()
    {
        $validated = $this->validate();

        $promo = Promo::create($validated);

        $promo->addMedia($this->image->getRealPath())->toMediaCollection();

        return redirect()->route('promo.admin.index')->with('message', 'Nueva promoción agregada');
    }

    public function render()
    {
        return view('livewire.promo.admin.create-promo');
    }
}
