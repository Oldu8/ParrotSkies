<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5',
            'slug' => [
                'required',
                'string',
                Rule::unique('posts', 'slug')->ignore($this->route('post')),
            ],
            'active' => 'boolean',
            'thumbnail' => 'string|max:2048',
            'category_id' => 'exists:categories,id',
            'published_at' => ['nullable', 'date_format:Y-m-d\TH:i'],
        ];
    }
}
