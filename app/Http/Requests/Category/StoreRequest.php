<?php

namespace App\Http\Requests\Category;

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
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ];
    }
}
