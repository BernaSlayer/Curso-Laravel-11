<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [ 
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }










}
