<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // fillable properties
    protected $fillable = [
        'title', 'slug', 'sub_title', 'summary', 'content',
        'featured_image', 'image_caption', 'video_url', 'keywords',
        'category_id', 'status', 'is_featured', 'is_breaking',
        'is_slider', 'published_at', 'meta_title', 'meta_description',
        'user_id'
    ];
    
    protected $casts = [
        'published_at' => 'datetime',
    ];
    
}