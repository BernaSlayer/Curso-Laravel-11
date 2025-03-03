<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function all()
    {
        return response()->json(Post::get());
    }
    
    public function index()
    {
        return response()->json(Post::paginate(10));
    }

    public function store(StoreRequest $request)
    {
       return response()->json(Post::create($request->validated()));
    }


    public function show(Post $post)
    {
        return response()->json($post);
    } 
    
    public function slug(string $slug)
    {
        return response()->json(Post::where('slug', $slug)->first());
    }
    
    
    public function update(PutRequest $request, Post $post)
    {
         $post->update($request->validated());
        return response()->json($post);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'ok']);
    }
}
