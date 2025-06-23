<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.frontend')]
class PostCategory extends Component
{
    use WithPagination;

    public string $searchQuery;

    public function mount(string $searchQuery)
    {
        $this->searchQuery = $searchQuery;
    }

    public function updatingSearchQuery()
    {
        $this->resetPage();
    }
    public function render()
    {
        $category = Category::where('slug', $this->searchQuery)->first();

        // If no matching category found, return empty posts
        if (! $category) {
            return view('livewire.frontend.post-category', [
                'posts' => collect(),
            ]);
        }

        $posts = Post::where('category_id', $category->id)
            ->where('status', 'published')
            ->whereDate('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('livewire.frontend.post-category', [
            'posts' => $posts,
        ]);
    }

}