<?php

namespace App\Http\Livewire\Orders\Admin;

use App\Models\Order;
use Livewire\Component;

class ShowOrders extends Component
{
    public Order $order;
    
    public function render()
    {
        return view('livewire.orders.admin.show-orders');
    }
}
