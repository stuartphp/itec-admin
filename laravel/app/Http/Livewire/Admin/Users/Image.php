<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class Image extends Component
{
    public $image;

    public function mount()
    {
        $this->image=auth()->user()->image;
    }
    public function render()
    {
        return view('livewire.admin.users.image');
    }
}
