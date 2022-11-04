<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class Index extends Component
{
    public function goTo($route_name)
    {
        redirect()->route($route_name);
    }

    public function equis()
    {
        
    }

    public function render()
    {
        return view('livewire.main.index');
    }
}
