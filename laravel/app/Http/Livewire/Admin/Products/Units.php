<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\ProductUnit;

class Units extends AdminComponent
{
    // Standard
    public $stage =[];
    public $page_size;
    public $search;
    public $action;
    // Modal
    public $modal_btn='primary';
    public $modal_title;
    public $modal_btn_title;

    protected $queryString = ['search'=>['except'=>''], 'page'=>['except'=>1]];

    public function mount()
    {
        $this->search='';
        $this->page_size=12;
        $this->modal_title=__('global.add_new_record');
        $this->modal_btn_title=__('global.save');
    }

    public function doAction($id, $action)
    {
        $this->reset();
        switch($action)
        {
            case 'add':
                $this->modal_title=__('global.add_new_record');
                $this->modal_btn_title=__('global.save');
                $this->modal_btn='primary';
                break;
            case 'edit':
                $this->modal_title=__('global.update');
                $this->modal_btn_title=__('global.update');
                $this->modal_btn='warning';
                $unit = ProductUnit::findOrFail($id);
                $this->stage = $unit->toArray();
                //dd($this->stage);
                break;
            case 'add':
                $this->modal_title=__('global.add_new_record');
                $this->modal_btn_title=__('global.save');
                $this->modal_btn='primary';
                break;
        }
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
    }



    public function render()
    {
        $data = ProductUnit::where('company_id', session()->get('company_id'))
                ->orderBy('name', 'asc')
                ->paginate($this->page_size);
        return view('livewire.admin.products.units', compact('data'));
    }

}
