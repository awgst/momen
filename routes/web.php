<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/topic', [TopicController::class, 'index']);
Route::get('/{post:slug}', [PostController::class, 'show']);
Route::get('/topic/{topic:slug}', [TopicController::class, 'show']);
Route::get('/user/{user:username}', [UserController::class, 'showPosts']);

// Auth Routes
Route::post('/auth/store', [RegisterController::class, 'store']);
Route::post('/auth/validate', [RegisterController::class, 'customvalidate']);
