<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\Post;
use App\Traits\HasBengaliNumbers;
use Livewire\Component;

class Aside extends Component
{
    use HasBengaliNumbers;
    public $letetstPosts;
    public $todayBestPosts;
    public $weekBestPosts;
    
    
    public function mount()
    {
        
        
            
        $this->letetstPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->where('status', 'published')
            ->whereDate('published_at', '<=', now())
            ->take(6)
            ->get();

        $this->todayBestPosts = Post::where('status', 'published')
            ->whereDate('published_at', now())
            ->orderBy('published_at', 'desc')
            ->whereDate('published_at', '<=', now())
            ->orderByDesc('view_count')
            ->take(6)
            ->get();

        $this->weekBestPosts = Post::where('status', 'published')
            ->whereBetween('published_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->orderBy('published_at', 'desc')
            ->whereDate('published_at', '<=', now())
            ->orderByDesc('view_count')
            ->take(6)
            ->get();
    }
    public function render()
    {
        return view('livewire.frontend.layouts.aside');
    }
}