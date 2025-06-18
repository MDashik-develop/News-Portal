<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use Livewire\Component;
use App\Traits\HasBengaliNumbers;

class PostView extends Component
{
    use HasBengaliNumbers;
    public $post;
    public $letetstPosts;
    public $todayBestPosts;
    public $weekBestPosts;
    public $relatedPosts;
    public $comments;

    public function mount($id)
    {
        $this->post = Post::where('id', $id)
            ->where('status', 'published')
            ->firstOrFail();
            
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

            $this->relatedPosts = Post::where('category_id', $this->post->category_id)
                ->where('id', '!=', $id)
                ->where('status', 'published')
                ->latest()
                ->take(4)
                ->get();
    }

    public function render()
    {
        return view('livewire.frontend.post-view')->layout('components.layouts.frontend');
    }
}