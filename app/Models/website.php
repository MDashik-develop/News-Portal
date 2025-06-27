<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class website extends Model
{
    //
protected $fillable = [
    'title',
    'favicon',
    'logo',
    'meta_tags',
    'meta_description',
    'fb_app_id',
    'adsense_publisher_id',
    'youtube_url',
    'facebook_url',
    'twitter_url',
    'instagram_url',
    'reddit_url',
    'google_news_url',
    'linkedin_url',
];
}