<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\ProductPrice;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Prices extends Component
{
    public $prices;
    public $stores;
    public $action;
    public $modal_title;
    public $modal_btn_title;
    public $modal_btn;

    /** Model */
    public $row_id;
    public $product_id;
    public $store_id;
    public $cost_price;
    public $retail;
    public $dealer;
    public $whole_sale;
    public $price_list1;
    public $price_list2;
    public $price_list3;
    public $price_list4;
    public $price_list5;
    public $special;
    public $special_from;
    public $special_to;

    protected $rules = [
        'product_id' =>'required',
        'store_id' =>'required',
        'retail' =>'required',
    ];

    public function mount($id)
    {
        $this->search='';
        $this->modal_title = __('global.add_new_record');
        $this->modal_btn_title = __('global.save');
        $this->modal_btn = 'primary';
        $this->action='add';
        $this->product_id=$id;
        $this->stores = DB::table('stores')->where('company_id', session()->get('company_id'))->pluck('name', 'id')->toArray();
        $this->prices = ProductPrice::with(['store'])->where('product_id', $id)->get();
    }

    public function loadModal($val, $id)
    {
        $this->resetValidation();
        $this->loadForm($id);
        switch($val)
        {
            case 'edit':
                $this->action='edit';
                // Modal
                $this->modal_btn_title = 'Update';
                $this->modal_title = 'Update Record';
                $this->modal_btn = 'success';
                break;
            case 'delete':
                $this->action='delete';
                // Modal
                $this->modal_btn_title = 'Delete';
                $this->modal_title = 'Delete Record';
                $this->modal_btn = 'danger';
                break;
            default:
                $this->modal_btn_title = 'Add new record';
                $this->modal_title = 'Create Record';
                $this->action='add';
                $this->modal_btn = 'primary';
                $this->row_id=null;
                break;
        }
        $this->dispatchBrowserEvent('modal', ['modal'=>'priceModal', 'action'=>'show']);
    }

    public function loadForm($id)
    {
        $res = ProductPrice::find($id);
        $this->row_id= isset($res->id) ? $res->id : '';
        //$this->product_id= isset($res->product_id) ? $res->product_id : '';
        $this->store_id= isset($res->store_id) ? $res->store_id : '';
        $this->cost_price= isset($res->cost_price) ? $res->cost_price : null;
        $this->retail= isset($res->retail) ? $res->retail : null;
        $this->dealer= isset($res->dealer) ? $res->dealer : null;
        $this->whole_sale= isset($res->whole_sale) ? $res->whole_sale : null;
        $this->price_list1= isset($res->price_list1) ? $res->price_list1 : null;
        $this->price_list2= isset($res->price_list2) ? $res->price_list2 : null;
        $this->price_list3= isset($res->price_list3) ? $res->price_list3 : null;
        $this->price_list4= isset($res->price_list4) ? $res->price_list4 : null;
        $this->price_list5= isset($res->price_list5) ? $res->price_list5: null;
        $this->special= isset($res->special) ? $res->special : null;
        $this->special_from= isset($res->special_from) ? $res->special_from : null;
        $this->special_to= isset($res->special_to) ? $res->special_to : null;
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            ProductPrice::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => __('global.record_deleted')]);
        }else{
            $this->validate();
            $record = ProductPrice::where('id', $this->row_id)->first();
            $fields = [
                'product_id' => $this->product_id,
                'store_id' => $this->store_id,
                'cost_price' => $this->cost_price,
                'retail' => $this->retail,
                'dealer' => $this->dealer,
                'whole_sale' => $this->whole_sale,
                'price_list1' => $this->price_list1,
                'price_list2' => $this->price_list2,
                'price_list3' => $this->price_list3,
                'price_list4' => $this->price_list4,
                'price_list5' => $this->price_list5,
                'special' => $this->special,
                'special_from' => $this->special_from,
                'special_to' => $this->special_to,
            ];
            if($record !== null){
                // Update
                $record->update($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => __('global.record_updated')]);
            }else{
                // Insert
                ProductPrice::create($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => __('global.record_added')]);
            }
            $this->prices = ProductPrice::with(['store'])->where('product_id', $this->product_id)->get();
        }

        $this->dispatchBrowserEvent('modal', ['modal'=>'priceModal', 'action'=>'hide']);
    }

    public function render()
    {
        return view('livewire.admin.products.prices', ['prices'=>$this->prices, 'stores'=>$this->stores]);
    }
}
