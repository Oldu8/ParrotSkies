<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'active' => 'required',
        ];
    }
}
