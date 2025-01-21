<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    // show all recipes
    public function index(){
        return Recipe::with('category','tags', 'user')->get();
    }

    // store new recipe
    public function strore(Request $request){
    }

    // show 1 recipe
    public function show($id){
        return Recipe::find($id)->load('category','tags', 'user');
    }

    // update recipe
    public function update(Request $request, $id){
    }

    // delete recipe
    public function destroy($id){
    }
}
