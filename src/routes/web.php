<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogoutController;

Route::get('/', [ItemController::class, 'index'])->name('items.index');

Route::get('/items/tab/{type}', [ItemController::class, 'fetchTabItems'])->name('items.tab');

Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');

Route::get('/item/{item}', [ItemController::class, 'show'])->name('items.show');

Route::get('/sell', [ItemController::class, 'create'])->middleware('auth')->name('items.create');

Route::post('/logout', LogoutController::class)->name('logout');
