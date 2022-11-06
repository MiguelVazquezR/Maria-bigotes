<?php

namespace App\Http\Livewire\Menu\Admin;

use App\Models\Product;
use Livewire\Component;

class IndexMenu extends Component
{
    public $show_confirmation_modal = false,
        $product_to_delete;

    public function prepareItemToDelete(Product $product)
    {
        $this->product_to_delete = $product;
        $this->show_confirmation_modal = true;
    }
    
    public function deleteItem()
    {
        $this->product_to_delete->delete();
        $this->reset();
    }

    public function render()
    {
        $products = Product::latest()->paginate(10);

        return view('livewire.menu.admin.index-menu', compact('products'));
    }
}
