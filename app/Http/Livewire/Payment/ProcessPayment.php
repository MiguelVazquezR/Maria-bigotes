<?php

namespace App\Http\Livewire\Payment;

use App\Models\User;
use Livewire\Component;

class ProcessPayment extends Component
{
    public $total,
        $email,
        $name,
        $payment_method;

    protected $listeners = ['paymentMethodCreated'];

    // public function paymentMethodCreated($payment_method)
    // {
    //     $user = User::firstOrCreate(
    //         ['email' =>  $this->email,],
    //         [
    //             'name' => $this->name,
    //             'email' => $this->email,
    //             'password' => bcrypt('123123123'),
    //         ]
    //     );

    //     if(!$user->hasStripeId())
    //         $user->createAsStripeCustomer();
        
    //     $user->charge($this->total * 100, $payment_method);
    // }

    public function render()
    {
        return view('livewire.payment.process-payment')->layout('layouts.guest');
    }
}
