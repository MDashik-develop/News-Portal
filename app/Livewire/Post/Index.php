<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Traits\HasNotifications;
use App\Traits\HasBengaliNumbers;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
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

    public function delete($id)
    {
        $post = Post::find($id);
        // if (!empty($post->featured_image) && Storage::exists('public/' . $post->featured_image)) {
        // Delete the featured image from storage
        Storage::disk('public')->delete($post->featured_image);
        // Storage::delete('public/' . $this->post->featured_image);
        // }
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
            ->when(
                $this->search,
                fn($query) =>
                $query->where('title', 'like', '%' . $this->search . '%')
            )
            ->paginate(10);

        return view('livewire.post.index', [
            'posts' => $posts
        ]);
    }
}
