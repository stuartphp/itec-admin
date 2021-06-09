<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    public function index($id)
    {
        $data = Product::with(['category', 'units'])->where('company_id', session()->get('company_id'))->where('id', $id)->first();
        return view('admin.products.details', compact('data'));
    }
}
