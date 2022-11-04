<?php

namespace App\Http\Livewire\Menu\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class EditMenu extends Component
{
    public Product $product;

    protected $rules = [
        'product.name' => 'required|string|max:50',
        'product.description' => 'required|string|max:191',
        'product.price' => 'required|numeric|min:1',
        'product.category_id' => 'required',
    ];

    public function update()
    {
        $this->validate();

        $this->product->save();
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.menu.admin.edit-menu', compact('categories'));
    }
}
