<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        return view('livewire.contact.contact-us')->layout('layouts.guest');
    }
}
