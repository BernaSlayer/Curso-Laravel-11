<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [ 
            'title'       => 'required|max:255',
            'slug'        => 'required|unique:posts,slug|max:255',
            'content'     => 'required|min:3',
            'category_id' => 'required|integer|exists:categories,id', // Asegura que category_id exista en la tabla categories
            'description' => 'required|min:7',
            'posted'      => 'required|in:yes,no',
            'image'       => 'nullable|mimes:jpeg,jpg,png|max:10240', // Opcional pero con validaciones
        ];
    }
}
