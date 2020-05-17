<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Services\ProductCategoryManager;

class ProductCategoryController extends Controller
{
    public function update(ProductCategoryRequest $request, int $productId)
    {
        return app()->make(ProductCategoryManager::class)
            ->handle($productId, $request->validated());
    }
}
