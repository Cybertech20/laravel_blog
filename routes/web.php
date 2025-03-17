<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', [PostController::class,'fetch']);

Route::post('/register', [UserController::class,'register']);

Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);
Route::post('/create-post',[PostController::class,'createPost']);

Route::get('/edit-post/{id}',[PostController::class,'showEditPost']);
Route::put('/edit-post/{id}',[PostController::class,'updatePost']);
Route::delete('/delete-post/{id}',[PostController::class,'deletePost']);
