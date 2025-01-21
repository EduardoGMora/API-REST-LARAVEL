<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// add resources
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeCollection;

class RecipeController extends Controller
{
    // show all recipes
    public function index(){
        return new RecipeCollection(Recipe::all());
    }

    // store new recipe
    public function strore(Request $request){
    }

    // show 1 recipe
    public function show($id){
        $recipe = Recipe::find($id)->load('category','tags', 'user');
        return new RecipeResource($recipe);
    }

    // update recipe
    public function update(Request $request, $id){
    }

    // delete recipe
    public function destroy($id){
    }
}
