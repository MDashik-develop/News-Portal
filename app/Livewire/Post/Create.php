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

    public function submit()
    {
        $validated = $this->validate([
            'title'          => 'required|string|max:255',
            'category_id'    => 'required|exists:categories,id',
            'content'        => 'required',
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
            $imagePath = $this->featured_image->storeAs('public/posts', $imageName);
        }
        $post = new Post();
        $post['user_id'] = Auth::id();
        $post['published_at'] = $this->published_at;
        $post['title'] = $this->title;
        $post['sub_title'] = $this->sub_title;
        $post['summary'] = $this->summary;
        $post['content'] = $this->content;
        $post['category_id'] = $this->category_id;
        $post['status'] = $this->status;
        $post['featured_image'] = $imagePath ?? null;
        $post['slug'] = Str::slug($this->title);
        $post['image_caption'] = $this->image_caption;
        $post['video_url'] = $this->video_url;
        $post['keywords'] = $this->keywords;
        $post['is_featured'] = $this->is_featured;
        $post['is_breaking'] = $this->is_breaking;
        $post['is_slider'] = $this->is_slider;
        $post['meta_title'] = $this->meta_title;
        $post['meta_description'] = $this->meta_description;
        $post['created_by'] = Auth::id();

        // dd($validated);

        try {
            // Post::create($post);
            $post->save();

            $this->succsessNotify("Post created successfully!");
            // $this->reset([
            //     'title', 'slug', 'sub_title', 'summary', 'content',
            //     'featured_image', 'image_caption', 'video_url', 'keywords',
            //     'category_id', 'status', 'is_featured', 'is_breaking',
            //     'is_slider', 'published_at', 'meta_title', 'meta_description'
            // ]);
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            $this->unsuccsessNotify("Post creation failed: " . $th->getMessage());
            // dd($th->getMessage());
            // Optionally, you can log the error or handle it as needed
            
        }
    }

    public function render()
    {
        return view('livewire.post.create', [
            'categories' => Category::all(),
        ]);
    }
}