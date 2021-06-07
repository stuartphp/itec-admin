<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // Standard
    public $page_size;
    public $action;
    public $search;
    public $page=1;
    protected $queryString = ['search'=>['except'=>''], 'page'=>['except'=>1]];

    public function mount()
    {
        $this->search='';
        $this->page_size=12;
    }

    public function render()
    {
        $data = DB::table('users')->orderBy('lastname', 'asc')->get();
        return view('livewire.admin.settings.users', compact('data'));
    }
}
