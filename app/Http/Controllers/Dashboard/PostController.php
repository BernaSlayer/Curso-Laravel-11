<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\return_;

class PostController extends Controller
{
    



    public function index()
    
    {
    
       
    $category = Post::with('category')->find(1); // Si no se encuentra el post con ID 1, lanzará una excepción 
    $post = Post::with('category')->find(1); // Si no se encuentra el post con ID 1, lanzará una excepción
    dd($category->category); 

        // $post->update(
        //     [
        //         'title' => 'test title new',
        //         'content' => 'test content',
        //         'slug' => 'test slug',
        //         'description' => 'test description',
        //         'posted' => 'not',
        //         'category_id' => 1,
        //         'image' => "test image",
        //     ]
        //     );
        
        // // dd($post->title);
        // return('1');
    
    }
    // public function index()
    // {
    //  Post::create(
    //         [
    //             'title' => 'test title',
    //             'content' => 'test content',
    //             'slug' => 'test slug',
    //             'description' => 'test description',
    //             'posted' => 'test posted',
    //             'category_id' => 1,
    //             'image' => "test image",
    //         ]
    //         );
        
        
    //     Return('1');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
