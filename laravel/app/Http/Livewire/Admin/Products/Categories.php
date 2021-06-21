<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class Categories extends AdminComponent
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // Standard
    public $state=[];
    public $page_size;
    public $searchTerm = null;
    public $showEditModal = false;
    public $recordBeingRemoved=null;
    public $currentRecord;

    public function mount()
    {
        $this->page_size=(session()->get('page_size')) ?? 12;
    }

    public function doAction($id, $val)
    {
        $this->currentRecord = ProductCategory::findOrFail($id);
        $r= $this->currentRecord->toArray();

        switch($val)
        {
            case 'edit':
                $this->reset();
                $this->showEditModal = true;
                $this->state = $r;
                $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
                break;
            case 'delete':
                $this->recordBeingRemoved = $id;
                $this->dispatchBrowserEvent('modal', ['modal'=>'deleteModal', 'action'=>'show']);
                break;
        }
    }

    public function addRecord()
    {
        $this->reset();
        $this->showEditModal=false;
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
    }

    public function createRecord()
    {
        $validate = Validator::make($this->state, [
            'name'=>'required',
            'parent_id'=>'required',
            'is_active'=>'required'
        ])->validate();
        $validate['company_id']=session()->get('company_id');
        ProductCategory::create($validate);
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type'=>'success', 'message'=>'Record added']);
    }

    public function updateRecord()
    {
        $validate = Validator::make($this->state, [
            'name'=>'required',
            'parent_id'=>'required',
            'is_active'=>'required'
        ])->validate();

        ProductCategory::where('id', $this->state['id'])->update($validate);
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type'=>'success', 'message'=>'Record Updated']);
    }

    public function deleteRecord()
    {
        $this->currentRecord->delete();
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type'=>'success', 'message'=>'Record Updated']);
    }


    public function render()
    {
        $data = ProductCategory::where('product_categories.company_id', session()->get('company_id'))
                ->when($this->searchTerm, function($q){
                    $q->where('cat.name', 'like', '%'.$this->search.'%')
                        ->orWhere('product_categories.name', 'like', '%'.$this->search.'%');
                })
                ->paginate($this->page_size);
        $categories = ProductCategory::where('company_id', session()->get('company_id'))
                ->where('is_active', 1)
                ->orderBy('parent_id', 'desc')
                ->orderBy('name', 'asc')
                ->get();
        return view('livewire.admin.products.categories', compact('data', 'categories'));
    }

}
