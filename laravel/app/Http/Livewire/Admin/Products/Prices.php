<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\ProductPrice;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Prices extends Component
{
    public $prices;
    public $stores;
    public $action;
    public $modal_title;
    public $modal_btn_title;
    public $modal_btn;
    public $row_id;
    public $state=[];

    public function mount($id)
    {
        $this->modal_title=__('global.add_new_record');
        $this->modal_btn_title=__('global.save');
        $this->modal_btn='primary';
        $this->stores = DB::table('stores')->where('company_id', session()->get('company_id'))->pluck('name', 'id')->toArray();
        $this->prices = ProductPrice::with(['store'])->where('product_id', $id)->get();
    }

    public function loadModal($action, $price)
    {
        switch($action)
        {
            case 'edit':
                $this->action='update';
                $this->row_id = $price['id'];
                $this->state = $price;
                break;
        }
        $this->dispatchBrowserEvent('modal', ['modal'=>'priceModal', 'action'=>'show']);
    }

    public function recordAction()
    {
        dd($this->state);
        switch($this->action)
        {
            case 'update':
                Validator::make($this->state,
                [
                    'product_id' =>'required',
                    'store_id' =>'required',
                    'retail' =>'required',
                ]
            );
                $price = $this->state;
                break;
        }
    }

    public function render()
    {
        return view('livewire.admin.products.prices', ['prices'=>$this->prices, 'stores'=>$this->stores]);
    }
}
