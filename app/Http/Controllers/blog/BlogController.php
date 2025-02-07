<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10); // Paginar los resultados
        return view('blog.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        

        return view('blog.detail', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}