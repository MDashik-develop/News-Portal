<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\website;
use Livewire\Component;

class Header extends Component
{


    public $logo;
    public $facebook_url;
    public $twitter_url;
    public $instagram_url;
    public $youtube_url;
    public $google_news_url;
    public $linkedin_url;
    public $reddit_url;
    
    public function mount()
    {
        $this->logo = website::first()->logo;
        $this->facebook_url = website::first()->facebook_url;
        $this->twitter_url = website::first()->twitter_url;
        $this->instagram_url = website::first()->instagram_url;
        $this->youtube_url = website::first()->youtube_url;
        $this->google_news_url = website::first()->google_news_url;
        $this->linkedin_url = website::first()->linkedin_url;
    }

    
    public function render()
    {
        
        return view('livewire.frontend.layouts.header');
    }
}