<?php

namespace App\Livewire\Website;

use App\Models\website;
use App\Traits\HasNotifications;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use HasNotifications, WithFileUploads;

    public $title;
    public $tags = [];
    public $tagsString = '';
    public $meta_description;
    public $meta_tags;
    public $favicon;
    public $logo;
    public $temp_favicon;
    public $temp_logo;
    public $website;
    public $fb_app_id;

    public function mount()
    {
        $this->website = website::first();

        if ($this->website) {
            $this->title = $this->website->title;
            $this->meta_description = $this->website->meta_description;
            $this->meta_tags = $this->website->meta_tags;
            $this->temp_favicon = $this->website->favicon;
            $this->temp_logo = $this->website->logo;
            $this->fb_app_id = $this->website->fb_app_id;

            // Convert meta_tags to tags array
            $this->tags = array_filter(array_map('trim', explode(',', $this->website->meta_tags)));
            $this->tagsString = implode(',', $this->tags);
        }
    }

    public function saveSettings()
    {
        $validated = $this->validate([
            'title' => 'required|min:3|max:255',
            'meta_description' => 'nullable',
            'meta_tags' => 'nullable|max:255',
            'favicon' => 'nullable|image|max:1024',
            'logo' => 'nullable|image|max:1024',
            'fb_app_id' => 'nullable|string|max:255',
        ]);

        // Set meta_tags from tagsString
        $validated['meta_tags'] = $this->tagsString;

        try {

            if ($this->website) {
                $this->website->update($validated);
            } else {
                website::create($validated);
            }

            $this->succsessNotify("Website settings saved successfully!");
            // return redirect()->route('website.index');
        } catch (\Throwable $th) {
            $this->unsuccsessNotify("Failed to save website settings: " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.website.index');
    }
}