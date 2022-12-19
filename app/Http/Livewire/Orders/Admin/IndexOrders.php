<?php

namespace App\Http\Livewire\Orders\Admin;

use App\Models\Order;
use Livewire\Component;

class IndexOrders extends Component
{
    public function show(Order $order)
    {
        return redirect()->route('orders.show', $order);
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(15);
        return view('livewire.orders.admin.index-orders', compact('orders'));
    }
}
