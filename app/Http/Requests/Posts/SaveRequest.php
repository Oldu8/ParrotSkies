<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:64',
            'content' => 'required|min:5|max:2048',
            'slug' => [
                'required',
                'string',
                Rule::unique('posts', 'slug')->ignore($this->id),
            ],
            'active' => 'boolean',
            'thumbnail' => 'string|max:2048',
            'category_id' => 'exists:categories,id',
            'published_at' => ['nullable', 'string'],
        ];
    }
}
