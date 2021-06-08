<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductUnit;

class Units extends Component
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
        $data = ProductUnit::where('company_id', session()->get('company_id'))->paginate($this->page_size);
        return view('livewire.admin.products.units', compact('data'));
    }
    
}
