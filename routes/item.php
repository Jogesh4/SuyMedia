<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/item/{item}', [ItemController::class, 'show'])->name('item.show');
Route::get('/add_favorite', [ItemController::class, 'add_favorite'])->name('add_favorite');