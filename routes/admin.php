<?php

use App\Livewire\Category\Create as cartegoryCreate;
use App\Livewire\Category\Edit as categoryEdit;
use App\Livewire\Category\Index as cartegoryIndex;
use App\Livewire\Post\Create as postCreate;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/categories/', cartegoryIndex::class)->name('categories.index');
    Route::get('/admin/categories/create', cartegoryCreate::class)->name('categories.create');
    Route::get('/admin/categories/{id}/edit', categoryEdit::class)->name('categories.edit');

    Route::get('admin/posts/', cartegoryIndex::class)->name('posts.index');
    Route::get('admin/posts/create', postCreate::class)->name('posts.create');
});