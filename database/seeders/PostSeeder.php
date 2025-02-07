<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category
;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::statement('PRAGMA foreign_keys = OFF'); 
        Post::truncate(); //para eliminar la data anterior
      DB::statement('PRAGMA foreign_keys = ON'); 

        for ($i = 1; $i <= 20; $i++) {
            
                $title =Str()->random(20);

                 $c = Category::InRandomOrder()->First();
                 
            Post::create([
                'title' => $title,
                'slug' => str::slug($title),
             'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
             'posted' => 'yes',
             'category_id' => $c->id
        ]);
    }

        }
        
    }
