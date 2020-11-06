<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostApiV2 extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function show($id)
    {
        return new PostResource(Post::findOrFail($id));
    }
}
