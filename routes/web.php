<?php

use App\Livewire\Settings\Posts;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');


Route::middleware(['auth', 'redirect.if.no.permission:admin.panel'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Volt::route('settings/posts', Posts::class)->name('settings.posts');

});

Route::get('test', function () {
    return phpinfo();
})->name('test');



require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/admin.php';