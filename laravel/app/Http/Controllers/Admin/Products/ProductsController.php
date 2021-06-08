<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
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
        $categories = $this->getCategories();
        return view('admin.products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['company_id'] = session()->get('company_id');
        $data['is_active'] = ($request->input('is_active')) ? 1:0;
        $error = Validator::make(\request()->all(), $this->validateRules());
        if($error->fails())
        {
            session()->flash('error', __('global.error_add'));
            return redirect()->back()->withErrors($error)->withInput();
        }
        Product::create($data);
        session()->flash('success', __('global.record_added'));
        return redirect('/admin/folder/file');
    }
    public function edit($id)
    {
        $data = Product::where(session()->get('company_id'), 'company_id')->where('id', $id)->first();
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
        return redirect('/admin/folder/file');
    }

    public function validateRules()
    {
        $data =[
        'product_category_id' =>'required',
        'product_code' =>'required',
        'name' =>'required',
        'description' =>'required',
        'keywords' =>'required',
        'barcode' =>'required',
        'isbn_number' =>'required',
        'unit' =>'required',
        'currency' =>'required',
        'allow_tax' =>'required',
        'weight_gram' =>'required',
        'length_cm' =>'required',
        'width_cm' =>'required',
        'height_cm' =>'required',
        'expiry_date' =>'required',
        'main_image' =>'required',
        'purchase_tax_type' =>'required',
        'sales_tax_type' =>'required',
        'sales_commission_item' =>'required',
        'viewed' =>'required',
        'is_service' =>'required',
        'is_active' =>'required',
        'is_feature' =>'required',
        ];
        return $data;
    }

    public function destroy($id)
    {
        Product::destroy($id);
        session()->flash('success', __('global.record_deleted'));
        return redirect()->back();
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
