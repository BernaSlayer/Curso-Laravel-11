<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('PRAGMA foreign_keys = OFF'); 
        Category::truncate(); //para eliminar la data anterior
        // DB::statement('PRAGMA foreign_keys = ON'); 

    for ($i = 1; $i <= 20; $i++) {
        Category::create([
            'title' => "Category $i",
            'slug' => "category-$i",
        ]);
    }

        }
        
    }

