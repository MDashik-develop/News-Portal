<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Traits\HasNotifications;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use HasNotifications;
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $post = Post::find($id);
        try {
            $post->delete();
            $this->succsessNotify("Post deleted successfully!");
        } catch (\Throwable $th) {
            $this->unsuccsessNotify("Failed to delete post: " . $th->getMessage());
        }
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->search, fn($query) =>
                $query->where('titile', 'like', '%' . $this->search . '%')
            )
            ->paginate(10);

        return view('livewire.post.index', [
            'posts' => $posts
        ]);
    }

}