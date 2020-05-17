<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'add' => [
                'nullable',
                'array'
            ],
            'add.*' => [
                'required',
                'integer'
            ],
            'delete' => [
                'nullable',
                'array'
            ],
            'delete.*' => [
                'required',
                'integer'
            ]
        ];
    }
}
