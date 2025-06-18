<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class PostList extends Component
{
    use WithPagination;

    public $search = '';
    public $featuredPosts;
    public $categories;
    public $popularTags;

    public function mount()
    {
        $this->featuredPosts = Post::where('status', 'published')
            ->where('is_featured', true)
            ->latest()
            ->take(5)
            ->get();

        $this->categories = \App\Models\Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(10)
            ->get();

        $this->popularTags = \App\Models\Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(10)
            ->get();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.frontend')]
    public function render()
    {
        $posts = Post::where('status', 'published')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(12);

        return view('livewire.frontend.post-list', [
            'posts' => $posts
        ]);
    }
} 