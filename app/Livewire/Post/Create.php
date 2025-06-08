<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\Category;
use App\Traits\HasNotifications;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use HasNotifications;
    use WithFileUploads;

    public $title, $slug, $sub_title, $summary, $content;
    public $featured_image, $image_caption, $video_url, $keywords;
    public $category_id, $status = 'draft', $is_featured = false;
    public $is_breaking = false, $is_slider = false, $published_at;
    public $meta_title, $meta_description;

    public function mount()
    {
        $this->published_at = now()->format('Y-m-d\TH:i');
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updatedContent($value)
    {
        $this->content = $value;
    }

    public function submit()
    {
        // dd($this->content);
        $validated = $this->validate([
            'title'          => 'required',
            'category_id'    => 'required|exists:categories,id',
            'content'        => 'required|string',
            'featured_image' => 'nullable|image|max:1024',
            'status'         => 'required|in:draft,pending,published,archived',
            'sub_title'      => 'nullable|string',
            'summary'        => 'nullable|string',
            'image_caption'  => 'nullable|string|max:255',
            'video_url'      => 'nullable|url',
            'keywords'       => 'nullable|string|max:255',
            'is_featured'    => 'boolean',
            'is_breaking'    => 'boolean',
            'is_slider'      => 'boolean',
            'meta_title'     => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        if ($this->featured_image) {
            $imageName = "post-" . time() . '.' . $this->featured_image->getClientOriginalExtension();
            // $this->featured_image->storeAs('public/posts', $imageName);
            $imagePath = $this->featured_image->storeAs('public/posts', $imageName);
        }

        try {
            $this->featured_image->storeAs('public/posts', $imageName);
            $post = Post::create([
                'user_id' => Auth::id(),
                'published_at' => $this->published_at,
                'title' => $this->title,
                'sub_title' => $this->sub_title,
                'summary' => $this->summary,
                'content' => $this->content,
                'category_id' => $this->category_id,
                'status' => $this->status,
                'featured_image' => $imagePath ?? null,
                'slug' => Str::slug($this->title),
                'image_caption' => $this->image_caption,
                'video_url' => $this->video_url,
                'keywords' => $this->keywords,
                'is_featured' => $this->is_featured,
                'is_breaking' => $this->is_breaking,
                'is_slider' => $this->is_slider,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
                'created_by' => Auth::id(),
            ]);

            $this->succsessNotify("Post created successfully!");
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            $this->unsuccsessNotify("Post creation failed: " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.post.create', [
            'categories' => Category::all(),
        ]);
    }
}