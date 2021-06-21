<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\ProductUnit;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class Information extends Component
{
    public $information=[];
    public $state=[];

    public function mount($id)
    {
        if($id>0)
        {
            $this->information =  Product::with('category')->where('company_id', session()->get('company_id'))->find($id)->toArray();
            $this->state=Product::where('company_id', session()->get('company_id'))->find($id)->toArray();
        }
        //dd($this->getCategories());
        //dd($this->information);
    }

    public function updateChanges()
    {
        $valid = Validator::make($this->state, [
            "product_category_id" => 'required',
            "product_code" => "required",
            "name" => "required",
            "description" => "required",
            "keywords" => "string",
            "barcode" => "string",
            "isbn_number" => "string",
            "product_unit_id" => "required",
        ])->validate();
        dd('here');
    }

    public function render()
    {
        return view('livewire.admin.products.information', [
            //'information'=>$this->information,
            'categories'=>$this->getCategories(),
            'units' =>$this->getUnits()]);
    }
    public function getCategories()
    {
        return ProductCategory::where('company_id', session()->get('company_id'))
                ->where('is_active', 1)
                ->orderBy('parent_id', 'asc')
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
