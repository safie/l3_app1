<?php

use Livewire\Volt\Volt;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
Route::get('/home', [HomeController::class, 'index']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

//posts index
Route::get('/posts', App\Livewire\Posts\Index::class)->name('posts.index');
Route::get('/posts/create', App\Livewire\Posts\Create::class)->name('posts.create');
Route::get('/posts/edit/{id}', App\Livewire\Posts\Edit::class)->name('posts.edit');


Volt::route('/isu', 'isu.index')->name('isu.index');
Volt::route('/isu/create', 'isu.create')->name('isu.create');
Volt::route('/isu/{id}/edit', 'isu.edit')->name('isu.edit');

Volt::route('/', 'users.index');
