<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductCategoryManager
{
    public function handle(int $productId, array $data): Product
    {
        return DB::transaction(function () use ($productId, $data): Product {
            $product = app()->make(ProductRepository::class)->find($productId);

            if ($ids = Arr::get($data, 'add')) {
                $this->attach($product, $ids);
            }

            if ($ids = Arr::get($data, 'delete')) {
                $this->detach($product, $ids);
            }

            return $product;
        });
    }

    protected function attach(Product $product, array $ids)
    {
        $product->categories()->attach(
            Category::find($ids)
        );
    }

    protected function detach(Product $product, array $ids)
    {
        $product->categories()->detach(
            Category::find($ids)
        );
    }
}
