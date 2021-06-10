<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUnit;

class DetailController extends Controller
{
    public function index($id)
    {
        $units = $this->getUnits();
        $categories = $this->getCategories();

        $data = Product::with(['category', 'units'])->where('company_id', session()->get('company_id'))->where('id', $id)->first();
        return view('admin.products.details', compact('data', 'categories', 'units'));
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
