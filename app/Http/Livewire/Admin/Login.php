<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Login extends Component
{
    public $password;

    public function auth()
    {
        
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
