<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\CategoryController;

Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('categories',        [CategoryController::class,'index']);
    Route::get('categories/{id}',   [CategoryController::class,'show']);
    
    Route::apiResource('recipes',   RecipeController::class);
    
    Route::get('tags',              [TagController::class,'index']);
    Route::get('tags/{id}',         [TagController::class,'show']);
});


