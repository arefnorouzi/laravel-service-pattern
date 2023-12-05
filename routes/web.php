<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\PostController;

Route::post('/post', [PostController::class, 'store']);
Route::patch('/post/{post}', [PostController::class, 'update']);
