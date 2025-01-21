<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index(){
        return Category::all();
    }

    public function show($id){
        return Category::find($id)->load('recipes');
    }
}
