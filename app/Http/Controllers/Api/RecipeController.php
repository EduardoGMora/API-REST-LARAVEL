<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

// add resources
use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    // show all recipes
    public function index(){
        $recipes = Recipe::with('category','tags', 'user')->get();
        return RecipeResource::collection($recipes);
    }

    // store new recipe
    public function store(Request $request){

        $recipe = Recipe::create($request->all());

        if ($tags = json_decode($request->tags)) {
            $recipe->tags()->attach($tags);
        }

        return response()->json(new RecipeResource($recipe), Response::HTTP_CREATED); // HTTP_CREATED = 201
    }

    // show 1 recipe
    public function show($id){
        $recipe = Recipe::find($id)->load('category','tags', 'user');
        return new RecipeResource($recipe);
    }

    // update recipe
    public function update(Request $request, $id){
        $recipe = Recipe::find($id);
        $recipe->update($request->all());

        if ($tags = json_decode($request->tags)) {
            $recipe->tags()->sync($tags);
        }

        return response()->json( new RecipeResource($recipe), Response::HTTP_ACCEPTED ); // HTTP_ACCEPTED = 202
    }

    // delete recipe
    public function destroy($id){
        $recipe = Recipe::find($id);
        $recipe->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT); // HTTP_NO_CONTENT = 204
    }
}
