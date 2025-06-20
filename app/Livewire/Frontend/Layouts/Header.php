<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{

    public $menuCategories;
    
    public function mount()
    {
        $this->menuCategories = Category::where('is_menu', true)
            ->whereNull('parent_id')
            ->with(['children' => function ($q) {
                $q->where('is_menu', true);
            }])
            ->orderBy('order')
            ->get();
    
    }

    
    public function render()
    {
        return view('livewire.frontend.layouts.header');
    }
}