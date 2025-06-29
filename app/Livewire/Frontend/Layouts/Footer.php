<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\Post;
use Livewire\Component;

class Footer extends Component
{
    public $letestPosts;
    public function mount()
    {
       $this->letestPosts = Post::where('status', 'published')
           ->orderBy('published_at', 'desc')
           ->whereDate('published_at', '<=', now())
           ->whereNotNull('featured_image')
           ->take(3)
           ->get();
    }
    public function render()
    {
        return view('livewire.frontend.layouts.footer');
    }
}