<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;


class Index extends Component
{
    public $tab='product';
    public $product=[];
    public $size=[];

    public function mount($id)
    {
        if($id>0)
        {
            $this->product = Product::where('company_id', session()->get('company_id'))->find($id)->toArray();
        }
    }

    public function render()
    {
        return view('livewire.admin.products.index', [
            'product'=>$this->product,
            ]);
    }



}
