<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
                sprintf('unique:%s,name,%d', app()->make(Category::class)->getTable(), $this->id),
                'max:255'
            ]
        ];
    }
}
