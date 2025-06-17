<?php

use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\PostView;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

// Route::get('/', Home::class)->name('home');
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('post/{id}', PostView::class)->name('post.view');

// RouteGroup
