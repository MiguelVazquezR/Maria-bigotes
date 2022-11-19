<?php

namespace App\Http\Livewire\Menu\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMenu extends Component
{
    use WithFileUploads;

    public $name,
        $description,
        $price,
        $category_id = 1,
        $image,
        $image_id;

    protected $rules = [
        'name' => 'required|string|max:50',
        'description' => 'required|string|max:191',
        'price' => 'required|numeric|min:1',
        'category_id' => 'required',
        'image' => 'required|image|max:4000',
    ];

    public function mount()
    {
        $this->image_id = rand();
    }

    public function store()
    {
        $validated = $this->validate();

        $product = Product::create($validated);

        $product->addMedia($this->image->getRealPath())->toMediaCollection();

        return redirect()->route('menu.admin.index')->with('message', 'Nuevo elemento agregado al menú');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.menu.admin.create-menu', compact('categories'));
    }
}
