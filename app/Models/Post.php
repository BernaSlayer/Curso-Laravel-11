<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content',
        'slug',
        'description',
        'posted',
        'catergory_id',
        'image',
    ];

    // Definir la relación con el modelo Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
