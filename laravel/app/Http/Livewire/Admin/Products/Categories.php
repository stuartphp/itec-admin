<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // Standard
    public $page_size;
    public $action;
    public $search;
    protected $queryString = ['search'=>['except'=>''], 'page'=>['except'=>1]];

    public function mount()
    {
        $this->search='';
        $this->page_size=12;
    }

    public function render()
    {
        if($this->search>'')
        {
            $data = ProductCategory::where('product_categories.company_id', session()->get('company_id'))
                ->join('product_categories as cat', 'cat.id', 'product_categories.parent_id')
                ->where(function($q){
                    $q->where('cat.name', 'like', '%'.$this->search.'%')
                        ->orWhere('product_categories.name', 'like', '%'.$this->search.'%');
                })
                ->select('product_categories.name as name', 'cat.name as parent')
                ->paginate($this->page_size);
        }else{
            $data = ProductCategory::where('product_categories.company_id', session()->get('company_id'))
                ->join('product_categories as cat', 'cat.id', 'product_categories.parent_id')
                ->select('product_categories.name as name', 'cat.name as parent')
                ->orderBy('name', 'asc')->paginate($this->page_size);
        }
        return view('livewire.admin.products.categories', compact('data'));
    }
}
