<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

class ProcessPayment extends Component
{
    public $total,
        $products;
        // $email,
        // $name,
        // $last_names,
        // $phone,
        // $street,
        // $number,
        // $city,
        // $payment_method;

    protected $listeners = ['paymentMethodCreated'];

    public function render()
    {
        return view('livewire.payment.process-payment')->layout('layouts.guest');
    }
}
