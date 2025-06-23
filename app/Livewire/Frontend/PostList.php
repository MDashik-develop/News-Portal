<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.frontend')]
class PostList extends Component
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
        // $posts = Post::where('title', 'like', '%' . $this->searchQuery . '%')
        //     ->orWhere('content', 'like', '%' . $this->searchQuery . '%')
        //     ->orWhere('summary', 'like', '%' . $this->searchQuery . '%')
        //     ->orWhere('users>nam', 'like', '%' . $this->searchQuery . '%')
        //     ->paginate(10);

        $posts = Post::where(function ($query) {
            $query->where('title', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('content', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('summary', 'like', '%' . $this->searchQuery . '%')
                  ->orWhereHas('user', function ($q) {
                      $q->where('name', 'like', '%' . $this->searchQuery . '%');
                  });
            })
            ->where('status', 'published')
            ->whereDate('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);


        

        return view('livewire.frontend.post-list', [
            'posts' => $posts,
        ]);
    }
} 