<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivewireController extends Controller
{
    public function financial_years()
    {
        return view(('admin.accounting.financial_years'));
    }
    public function periods()
    {
        return view('admin.accounting.periods');
    }
}
