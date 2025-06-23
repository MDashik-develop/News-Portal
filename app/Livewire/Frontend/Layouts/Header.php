<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\website;
use Livewire\Component;

class Header extends Component
{


    public $logo;
    
    public function mount()
    {
        $this->logo = website::first()->logo;
    }

    
    public function render()
    {
        return view('livewire.frontend.layouts.header');
    }
}