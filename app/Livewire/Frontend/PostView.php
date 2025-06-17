<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PostView extends Component
{
    public function render()
    {
        return view('livewire.frontend.post-view')->layout('components.layouts.frontend');
    }
}
