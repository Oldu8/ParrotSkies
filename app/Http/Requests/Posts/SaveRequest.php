<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

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
            'description' => 'required|min:5|max:1000',
            'active' => 'boolean'
        ];
    }
}
