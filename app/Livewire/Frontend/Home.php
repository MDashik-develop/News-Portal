<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use Livewire\Component;
use App\Traits\HasBengaliNumbers;

class Home extends Component

{
    use HasBengaliNumbers;
    public $featuredPosts;
    public $letetstPosts;
    public $todayBestPosts;
    public $weekBestPosts;
    public $section1;
    public $section2;
    public $section3;
    public $section4;
    public $section5;

    public function mount()
    {
        $this->featuredPosts = Post::where('is_featured', 1)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(1)
            ->get();
            
        $this->letetstPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        $this->todayBestPosts = Post::where('status', 'published')
            ->whereDate('published_at', now())
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        $this->weekBestPosts = Post::where('status', 'published')
            ->whereBetween('published_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
            
        $this->section1 = Post::where('section', 1)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        $this->section2 = Post::where('section', 2)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(12)
            ->get();
            
        $this->section3 = Post::where('section', 3)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(9)
            ->get();
            
        $this->section4 = 'Popular Categories';
        $this->section5 = 'Contact Us for More Information';
    }
    public function render()
    {
        return view('livewire.frontend.home');
    }
}