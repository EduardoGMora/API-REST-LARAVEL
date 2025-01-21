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
        return TagResource::collection(Tag::with('recipes')->get());
    }

    public function show($id){
        $tag = Tag::find($id)->load('recipes');
        return new TagResource($tag);
    }
}
