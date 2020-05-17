<?php

namespace App\Http\Controllers;

use App\{
    Http\Requests\ProductRequest,
    Http\Resources\ProductResource,
    Services\ProductRepository
};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function show(int $productId): ProductResource
    {
        return ProductResource::make(
            app()->make(ProductRepository::class)->find($productId)
        );
    }

    public function index(): JsonResource
    {
        return ProductResource::collection(
            app()->make(ProductRepository::class)->index()
        );
    }

    public function create(ProductRequest $request): ProductResource
    {
        return ProductResource::make(
            app()->make(ProductRepository::class)
                ->create($request->validated())
        );
    }

    public function update(ProductRequest $request, int $productId): ProductResource
    {
        return ProductResource::make(
            app()->make(ProductRepository::class)
                ->update($productId, $request->validated())
        );
    }

    public function delete(int $productId): JsonResponse
    {
        app()->make(ProductRepository::class)
            ->delete($productId);

        return response()->json([], 204);
    }
}
