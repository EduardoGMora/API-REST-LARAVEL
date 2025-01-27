<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// add resources
use App\Http\Resources\TagResource;

class TagController extends Controller
{
    //
    public function index(){
        $tags = Tag::with('recipes.category','recipes.tags', 'recipes.user')->paginate(5);
        return TagResource::collection($tags);
    }

    public function show(Tag $tag){
        return new TagResource($tag->load('recipes.category','recipes.tags', 'recipes.user'));
    }
}
