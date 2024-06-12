<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

//posts index
Route::get('/posts', App\Livewire\Posts\Index::class)->name('posts.index');
Route::get('/posts/create', App\Livewire\Posts\Create::class)->name('posts.create');

Volt::route('/', 'users.index');
