<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:64',
            'slug' => [
                'required',
                'string',
                Rule::unique('categories', 'slug')->ignore($this->id),
            ],

        ];
    }
}
