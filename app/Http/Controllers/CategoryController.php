<?php

namespace App\Http\Controllers;

use App\{
    Http\Requests\UpdateCategoryRequest,
    Http\Resources\CategoryResource,
    Services\CategoryRepository,
    Http\Requests\CreateCategoryRequest
};
use Illuminate\{
    Http\JsonResponse,
    Http\Resources\Json\JsonResource
};

class CategoryController extends Controller
{
    public function show(int $categoryId): CategoryResource
    {
        return CategoryResource::make(
            app()->make(CategoryRepository::class)->find($categoryId)
        );
    }

    public function index(): JsonResource
    {
        return CategoryResource::collection(
            app()->make(CategoryRepository::class)->index()
        );
    }

    public function create(CreateCategoryRequest $request): CategoryResource
    {
        return CategoryResource::make(
            app()->make(CategoryRepository::class)
                ->create($request->validated())
        );
    }

    public function update(UpdateCategoryRequest $request, int $categoryId): CategoryResource
    {
        return CategoryResource::make(
            app()->make(CategoryRepository::class)
                ->update($categoryId, $request->validated())
        );
    }

    public function delete(int $categoryId): JsonResponse
    {
        app()->make(CategoryRepository::class)
            ->delete($categoryId);

        return response()->json([], 204);
    }
}
