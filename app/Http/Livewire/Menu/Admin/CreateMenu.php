<?php

namespace App\Http\Livewire\Menu\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class CreateMenu extends Component
{
    public $name,
        $description,
        $price,
        $category_id;

    protected $rules = [
        'name' => 'required|string|max:50',
        'description' => 'required|string|max:191',
        'price' => 'required|numeric|min:1',
        'category_id' => 'required',
    ];

    public function store()
    {
        $validated = $this->validate();

        Product::create($validated);

        return redirect()->route('menu.admin.index')->with('message', 'Nuevo elemento agregado al menú');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.menu.admin.create-menu', compact('categories'));
    }
}
