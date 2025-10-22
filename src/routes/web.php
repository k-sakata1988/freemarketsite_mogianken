<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ItemController::class, 'index'])->name('top');

Route::middleware('auth')->group(function () {
    Route::get('/?tab=mylist', [AuthController::class, 'index'])->name('mylist');
    Route::post('/logout', LogoutController::class)->name('logout');
});
Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');