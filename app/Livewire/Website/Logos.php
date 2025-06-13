<?php

namespace App\Livewire\Website;

use App\Models\website;
use App\Traits\HasNotifications;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Logos extends Component
{
    use HasNotifications, WithFileUploads;

    public $favicon;
    public $logo;
    public $temp_favicon;
    public $temp_logo;
    public $website;

    public function mount()
    {
        $this->website = website::first();

        if ($this->website) {
            $this->temp_favicon = $this->website->favicon;
            $this->temp_logo = $this->website->logo;

        }
    }

    public function saveSettings()
    {
        $validated = $this->validate([
            'favicon' => 'nullable|image|max:1024',
            'logo' => 'nullable|image|max:1024',
        ]);

        try {
            // Handle favicon upload
            if ($this->favicon) {
                if ($this->temp_favicon) {
                    Storage::disk('public')->delete($this->temp_favicon);
                }
                $faviconName = "favicon-" . time() . '.' . $this->favicon->getClientOriginalExtension();
                $validated['favicon'] = $this->favicon->storeAs('website', $faviconName, 'public');
            }

            // Handle logo upload
            if ($this->logo) {
                if ($this->temp_logo) {
                    Storage::disk('public')->delete($this->temp_logo);
                }
                $logoName = "logo-" . time() . '.' . $this->logo->getClientOriginalExtension();
                $validated['logo'] = $this->logo->storeAs('website', $logoName, 'public');
            }

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