<?php

namespace App\Livewire\Settings;

use App\Models\Post;
use App\Traits\HasNotifications;
use App\Traits\HasBengaliNumbers;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use HasNotifications;
    use WithPagination;
    use HasBengaliNumbers;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()
            ->when(
                $this->search,
                fn($query) =>
                $query->where(function($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('id', 'like', '%' . $this->search . '%');
                })
            )
            ->paginate(10);
        return view('livewire.settings.posts', [
            'posts' => $posts
        ]);
    }
}