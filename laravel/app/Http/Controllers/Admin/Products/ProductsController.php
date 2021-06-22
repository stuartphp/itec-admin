<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $units = $this->getUnits();
        $categories = $this->getCategories();
        return view('admin.products.form', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['company_id'] = session()->get('company_id');
        $data['allow_tax'] = ($request->input('allow_tax')) ? 1:0;
        $data['is_active'] = ($request->input('is_active')) ? 1:0;
        $data['is_service'] = ($request->input('is_service')) ? 1:0;
        $data['is_feature'] = ($request->input('is_feature')) ? 1:0;
        $data['sales_commission_item'] = ($request->input('sales_commission_item')) ? 1:0;

        ($data['expiry_date']=='') ? NULL :$data['expiry_date'];
        $error = Validator::make(\request()->all(), $this->validateRules());
        if($error->fails())
        {
            session()->flash('error', __('global.error_add'));
            return redirect()->back()->withErrors($error)->withInput();
        }
        Product::create($data);
        session()->flash('success', __('global.record_added'));
        return redirect('/admin/products/items');
    }
    public function show($id)
    {
        $data = Product::with(['category', 'units'])->where('company_id',session()->get('company_id'))->where('id', $id)->first();
        return response()->json($data);
    }

    public function edit($id)
    {
        $data = Product::where('company_id',session()->get('company_id'))->where('id', $id)->first();
        return view('admin.products.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['is_active'] = ($request->input('is_active')) ? 1:0;
        $error = Validator::make(\request()->all(), $this->validateRules());
        if($error->fails())
        {
            session()->flash('error', __('global.error_update'));
            return redirect()->back()->withErrors($error)->withInput();
        }
        $rec = Product::findOrFail($id);
        $rec->update($data);
        session()->flash('success', __('global.record_updated'));
        return redirect('/admin/products/items');
    }

    public function validateRules()
    {
        $data =[
        'product_category_id' =>'required',
        'product_code' =>'required',
        'name' =>'required',
        'description' =>'required',
        //'keywords' =>'required',
        'barcode' =>'required',
        'isbn_number' =>'required',
        'unit' =>'required',
        'currency' =>'required',
        //'allow_tax' =>'required',
        'weight_gram' =>'required',
        'length_cm' =>'required',
        'width_cm' =>'required',
        'height_cm' =>'required',
        //'expiry_date' =>'required',
        //'main_image' =>'required',
        'purchase_tax_type' =>'required',
        'sales_tax_type' =>'required',
        //'sales_commission_item' =>'required',
        //'viewed' =>'required',
        //'is_service' =>'required',
        //'is_active' =>'required',
        //'is_feature' =>'required',
        ];
        return $data;
    }

    public function destroy($id)
    {
        Product::destroy($id);
        session()->flash('success', __('global.record_deleted'));
        return redirect()->back();
    }

    public function prices($id)
    {
        return view('admin.products.prices', compact('id'));
    }

    public function getCategories()
    {
        return ProductCategory::where('company_id', session()->get('company_id'))
                ->where('is_active', 1)
                ->orderBy('parent_id', 'desc')
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
