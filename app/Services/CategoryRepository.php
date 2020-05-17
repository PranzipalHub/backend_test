<?php

namespace App\Services;

use App\Models\Category;
use App\Services\Contracts\IModelRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements IModelRepository
{
    public function index(): Collection
    {
        return Category::orderBy('id', 'DESC')->get();
    }

    public function create(array $data): Category
    {
        return $this->save(new Category(), $data);
    }

    public function update(int $id, array $data): Category
    {
        return $this->save($this->find($id), $data);
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    protected function save(Category $category, array $data): Category
    {
        $category->fill($data);
        $category->save();

        return $category;
    }

    public function find(int $id): Category
    {
        return Category::findOrFail($id);
    }
}
