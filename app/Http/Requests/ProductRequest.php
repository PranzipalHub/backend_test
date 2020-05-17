<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'overview' => [
                'nullable',
                'string'
            ],
            'price' => [
                'required',
                'numeric',
                'regex:/^\d*(\.\d{1,2})?$/'
            ],
            'sale_price' => [
                'nullable',
                'numeric',
                'regex:/^\d*(\.\d{1,2})?$/'
            ],
            'show_on_shop' => [
                'nullable',
                'boolean'
            ]
        ];
    }
}
