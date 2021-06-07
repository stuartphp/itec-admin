<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = DB::table('company_user')->where('user_id', auth()->user()->id)
                ->join('companies', 'companies.id', '=', 'company_id')
                ->pluck('trading_name', 'company_id');
        return view('home', compact('companies'));
    }

    public function selection($id)
    {
        /** Remember to add security for the user not to access comanies he does not have permission to see */


        $company = DB::table('companies')
            ->join('setup_accounting', 'company_id', '=', 'companies.id')
            ->where('company_id', $id)
            ->first();

        $attela = DB::connection('itecassist')->table('attela')
            ->where('reference', $company->attela_reference)
            ->first();
        if($attela && $attela->is_active==1)
        {
            // Get modules
            $modules = DB::connection('itecassist')->table('attela_modules')
                ->join('modules', 'modules.id', '=', 'attela_modules.module_id')
                ->where('attela_modules.attela_id', $attela->id)
                ->get();
        }

        // Company Access
        $site_access=[];
        foreach($modules as $k=>$mod)
        {
            if($mod->cancelled_on == null)
            {
                $site_access=array_merge($site_access,explode(',', $mod->description));
            }
        }

        session()->put('site_access', $site_access);
        session()->put('company_id', $id);
        session()->put('trading_name', $company->trading_name);
        session()->put('financial_year', $company->financial_year);
        session()->put('financial_period', $company->financial_period);

        // Get permissions
        $id =auth()->user()->id;

        $roles = DB::table('role_user')->where('user_id', $id)
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->first();
        $per = explode(',', $roles->permissions);
        session()->put('grant',$per);
        return redirect('/admin/dashboard');
    }
}
