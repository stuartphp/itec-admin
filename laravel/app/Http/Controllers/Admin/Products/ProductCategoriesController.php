<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Validator;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('admin.products.categories.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        ProductCategory::create($data);
        session()->flash('success', __('global.record_added'));
        return redirect('/admin/products/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProductCategory::where('company_id', session()->get('company_id'))->where('id', $id)->first();
        $categories = $this->getCategories();
        return view('admin.products.categories.form', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $rec = ProductCategory::findOrFail($id);
        $rec->update($data);
        session()->flash('success', __('global.record_updated'));
        return redirect('/admin/products/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::destroy($id);
        session()->flash('success', __('global.record_deleted'));
        return redirect()->back();
    }

    public function validateRules()
    {
        $data =[
            'name' =>'required',
            'parent_id' =>'required',
            //'is_active' =>'required',
        ];
        return $data;
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
