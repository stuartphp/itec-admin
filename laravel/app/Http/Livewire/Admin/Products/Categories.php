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
            $data = ProductCategory::with('parent')->where('company_id', session()->get('company_id'))->where('name', 'like', '%'.$this->search.'%')->paginate($this->page_size);
        }else{
            $data = ProductCategory::with('parent')->where('company_id', session()->get('company_id'))->orderBy('name', 'asc')->paginate($this->page_size);
        }
// dd($data);
        return view('livewire.admin.products.categories', compact('data'));
    }
}
