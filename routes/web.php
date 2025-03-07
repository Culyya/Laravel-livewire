<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('user');

// full component
Route::prefix('users2')->group(function () {
    Route::get('', App\Livewire\User\Index::class)->name('users2');
    Route::get('/create', App\Livewire\User\Create::class)->name('users2.create');
    Route::get('/edit/{id}', App\Livewire\User\Edit::class)->name('users2.edit');
});

// volt api function
Route::prefix('vaf')->name('vaf.')->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Volt::route('/', 'pages.vaf.users.index')->name('index');
        Volt::route('/create', 'pages.vaf.users.create')->name('create');
        Volt::route('/edit/{id}', 'pages.vaf.users.edit')->name('edit');
    });
});

// volt class component
Route::prefix('vcc')->name('vcc.')->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Volt::route('/', 'pages.vcc.users.index')->name('index');
        Volt::route('/create', 'pages.vcc.users.create')->name('create');
        Volt::route('/edit/{id}', 'pages.vcc.users.edit')->name('edit');
    });
});

Volt::route('/counter', 'counter');

Route::get('belajar-yuk', App\Livewire\Belajar\Index::class)->name('belajarlah');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
