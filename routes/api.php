<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/get-category', [\App\Http\Controllers\Category\CategoryController::class, 'index']);
Route::post('/post-category', [\App\Http\Controllers\Category\CategoryController::class, 'store']);
