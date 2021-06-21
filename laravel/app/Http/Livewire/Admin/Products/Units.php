<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\ProductUnit;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class Units extends AdminComponent
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

    public function doAction(ProductUnit $record, $val)
    {
        $this->currentRecord = $record;
        switch($val)
        {
            case 'edit':
                $this->reset();
                $this->showEditModal = true;
                $this->state = $record->toArray();
                $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
                break;
            case 'delete':
                $this->recordBeingRemoved = $record->id;
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
            'is_active'=>'required'
        ])->validate();
        $validate['company_id']=session()->get('company_id');
        ProductUnit::create($validate);
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type'=>'success', 'message'=>'Record added']);
    }

    public function updateRecord()
    {
        $validate = Validator::make($this->state, [
            'name'=>'required',
            'is_active'=>'required'
        ])->validate();
        $this->currentRecord->update($validate);
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
        $data = ProductUnit::where('company_id', session()->get('company_id'))
                ->when($this->searchTerm, function($query){
                    $query->where('name', 'like', '%'. $this->searchTerm.'%');
                })
                ->orderBy('name', 'asc')
                ->paginate($this->page_size);
        return view('livewire.admin.products.units', compact('data'));
    }

}
