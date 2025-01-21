<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //
    public function index(){
        return Tag::all();
    }

    public function show($id){
        return Tag::find($id);
    }
}
