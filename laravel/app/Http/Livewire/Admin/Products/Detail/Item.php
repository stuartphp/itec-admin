<?php

namespace App\Http\Livewire\Admin\Products\Detail;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Item extends Component
{
    protected $listeners = ['getItemId'];
    public $result = 'details';

    public function mount()
    {
        $this->item_id=0;
    }

    public function getItemId($id)
    {
        session()->put('product', $id);
        $this->dispatchBrowserEvent('loadPage', ['link' => '/admin/products/items/'.$id]);
    }

    public function render()
    {
        return view('livewire.admin.products.detail.item');
    }
}
