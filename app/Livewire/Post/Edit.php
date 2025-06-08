<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $sub_title;
    public $summary;
    public $content;
    public $category_id;
    public $image;
    public $is_slider;
    public $published_at;
    public $meta_title;
    public $meta_description;
    public $categories;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->title = $this->post->title;
        $this->sub_title = $this->post->sub_title;
        $this->summary = $this->post->summary;
        $this->content = $this->post->content;
        $this->category_id = $this->post->category_id;
        $this->is_slider = $this->post->is_slider;
        $this->published_at = $this->post->published_at;
        $this->meta_title = $this->post->meta_title;
        $this->meta_description = $this->post->meta_description;
        $this->categories = Category::all();
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|min:3',
            'sub_title' => 'nullable',
            'summary' => 'nullable',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:1024',
            'is_slider' => 'boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if ($this->image) {
            if ($this->post->image) {
                Storage::delete($this->post->image);
            }
            $validated['image'] = $this->image->store('posts', 'public');
        }

        $this->post->update($validated);

        session()->flash('message', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}