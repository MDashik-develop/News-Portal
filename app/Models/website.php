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
    'fb_app_id'
];
}