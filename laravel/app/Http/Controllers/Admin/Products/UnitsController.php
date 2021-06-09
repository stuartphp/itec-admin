<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductUnit;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.units.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.units.form');
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
        ProductUnit::create($data);
        session()->flash('success', __('global.record_added'));
        return redirect('/admin/products/units');
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
        //
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
        $rec = ProductUnit::findOrFail($id);
        $rec->update($data);
        session()->flash('success', __('global.record_updated'));
        return redirect('/admin/products/units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductUnit::destroy($id);
        session()->flash('success', __('global.record_deleted'));
        return redirect()->back();
    }

    public function validateRules()
    {
        $data =[
        'name' =>'required',
        ];
        return $data;
    }
}
