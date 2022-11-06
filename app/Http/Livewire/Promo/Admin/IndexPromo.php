<?php

namespace App\Http\Livewire\Promo\Admin;

use App\Models\Promo;
use Livewire\Component;

class IndexPromo extends Component
{
    public $show_confirmation_modal = false,
        $item_to_delete;

    public function prepareItemToDelete(Promo $promo)
    {
        $this->item_to_delete = $promo;
        $this->show_confirmation_modal = true;
    }
    
    public function deleteItem()
    {
        $this->item_to_delete->delete();
        $this->reset();
    }

    public function render()
    {
        $promos = Promo::latest()->paginate(10);

        return view('livewire.promo.admin.index-promo', compact('promos'));
    }
}
