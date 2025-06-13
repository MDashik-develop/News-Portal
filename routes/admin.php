<?php

use App\Livewire\Category\Create as cartegoryCreate;
use App\Livewire\Category\Edit as categoryEdit;
use App\Livewire\Category\Index as cartegoryIndex;
use App\Livewire\Post\Create as postCreate;
use App\Livewire\Post\Edit as postEdit;
use App\Livewire\Post\Index as postIndex;
use App\Livewire\Website\Index as websiteIndex;
use App\Livewire\Website\Logos as websiteLogos;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/categories/', cartegoryIndex::class)->name('categories.index');
    Route::get('/admin/categories/create', cartegoryCreate::class)->name('categories.create');
    Route::get('/admin/categories/{id}/edit', categoryEdit::class)->name('categories.edit');

    Route::get('admin/posts/', postIndex::class)->name('posts.index');
    Route::get('admin/posts/create', postCreate::class)->name('posts.create');
    Route::get('admin/posts/{id}/edit', postEdit::class)->name('posts.edit');

    Route::get('/admin/website', websiteIndex::class)->name('website.index');
    Route::get('/admin/website/logo', websiteLogos::class)->name('website.logo');

});