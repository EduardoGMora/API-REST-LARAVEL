<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// add resource
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;


class CategoryController extends Controller
{
    //
    public function index(){
        return new CategoryCollection(Category::all());
    }

    public function show($id){
        $category = Category::find($id)->load('recipes.category','recipes.tags', 'recipes.user');
        return new CategoryResource($category);
    }
}
