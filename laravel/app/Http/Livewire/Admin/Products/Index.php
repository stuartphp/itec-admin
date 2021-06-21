<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUnit;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product=[];

    public function mount($id)
    {
        $this->product = Product::where('company_id', session()->get('company_id'))->find($id)->toArray();
        
    }

    public function render()
    {
        return view('livewire.admin.products.index', [
            'product'=>$this->product,
            'categories'=>$this->getCategories(),
            'units' =>$this->getUnits()]);
    }


    public function getCategories()
    {
        return ProductCategory::where('company_id', session()->get('company_id'))
                ->where('is_active', 1)
                ->orderBy('parent_id', 'desc')
                ->orderBy('name', 'asc')
                ->get();
    }
    public function getUnits()
    {
        return ProductUnit::where('company_id', session()->get('company_id'))
                ->where('is_active', 1)
                ->orderBy('name', 'asc')
                ->pluck('name', 'id')
                ->toArray();
    }
}
