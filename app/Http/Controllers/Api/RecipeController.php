<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    // show all recipes
    public function index(){
        $recipes = Recipe::with('category','tags', 'user')->paginate(10);
        return RecipeResource::collection($recipes);
    }

    // store new recipe
    public function store(StoreRecipeRequest $request){
        $recipe = Recipe::create($request->all());

        $recipe->tags()->attach(json_decode($request->tags));
        $recipe->load('category', 'tags', 'user');
        return response()->json(new RecipeResource($recipe), Response::HTTP_CREATED); // HTTP_CREATED = 201
    }

    // show 1 recipe
    public function show(Recipe $recipe){
        $recipe = $recipe->load('category','tags', 'user');
        return new RecipeResource($recipe);
    }

    // update recipe
    public function update(UpdateRecipeRequest $request, Recipe $recipe){
        $recipe->update($request->all());

        if ($tags = json_decode($request->tags)) {
            $recipe->tags()->sync($tags);
        }
        $recipe->load('category', 'tags', 'user');
        return response()->json( new RecipeResource($recipe), Response::HTTP_ACCEPTED ); // HTTP_ACCEPTED = 202
    }

    // delete recipe
    public function destroy(Recipe $recipe){
        $recipe->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT); // HTTP_NO_CONTENT = 204
    }
}
