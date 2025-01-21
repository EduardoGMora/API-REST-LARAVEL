<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    //
    public function index(){
        return Recipe::all();
    }

    public function show($id){
        return Recipe::find($id);
    }
}
