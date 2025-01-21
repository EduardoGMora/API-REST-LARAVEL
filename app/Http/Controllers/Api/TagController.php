<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// add resources
use App\Http\Resources\TagResource;
use App\Http\Resources\TagCollection;

class TagController extends Controller
{
    //
    public function index(){
        return new TagCollection(Tag::all());
    }

    public function show($id){
        $tag = Tag::find($id)->load('recipes');
        return new TagResource($tag);
    }
}
