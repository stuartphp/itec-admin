<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;

class Index extends Component
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
        $data = Product::where('company_id', session()->get('company_id'))->paginate($this->page_size);
        $categories = $this->getCategories();
        return view('livewire.admin.products.index', compact('data', 'categories'));
    }

    public function getCategories()
    {
        return ProductCategory::where('company_id', session()->get('company_id'))
                ->where('is_active', 1)
                ->orderBy('parent_id', 'desc')
                ->orderBy('name', 'asc')
                ->get();
    }
}
