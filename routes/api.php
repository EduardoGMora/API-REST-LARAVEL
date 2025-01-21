<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\CategoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('categories',        [CategoryController::class,'index']);
Route::get('categories/{id}',   [CategoryController::class,'show']);

Route::apiResource('recipes',   RecipeController::class);

Route::get('tags',              [TagController::class,'index']);
Route::get('tags/{id}',         [TagController::class,'show']);

