<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // fillable
    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'order',
        'is_menu',
        'status',
        'slug',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Category.php model
    // app/Models/Category.php
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('is_menu', true);
    }
    

}