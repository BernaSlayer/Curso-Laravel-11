<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2); // O usa paginate() si deseas paginación
        
        return view('blog.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.detail', ['post' => $post]);
    }

}
