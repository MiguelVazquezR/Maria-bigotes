<?php

namespace App\Http\Livewire\Orders\Admin;

use App\Models\Order;
use Livewire\Component;

class ShowOrders extends Component
{
    public Order $order;
    public $total = 0;

    public function markAsShipped()
    {
        $this->order->update(['shipped_at' => now()]);
    }

    public function markAsNoShipped()
    {
        $this->order->update(['shipped_at' => null]);
    }
    
    public function render()
    {
        return view('livewire.orders.admin.show-orders');
    }
}
