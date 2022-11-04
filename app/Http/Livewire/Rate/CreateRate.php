<?php

namespace App\Http\Livewire\Rate;

use App\Models\Rate;
use Livewire\Component;

class CreateRate extends Component
{
    public $name,
        $last_names,
        $email,
        $comments;

    protected $rules = [
        'name' => 'required|string|max:50',
        'last_names' => 'required|string|max:50',
        'comments' => 'required|string|max:191',
    ];

    public function send()
    {
        $validated = $this->validate();

        Rate::create($validated);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.rate.create-rate');
    }
}
