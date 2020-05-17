<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Contracts\IModelRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements IModelRepository
{
    public function index(): Collection
    {
        return Product::orderBy('id', 'DESC')->with('categories')->get();
    }

    public function create(array $data): Product
    {
        return $this->save(new Product(), $data);
    }

    public function update(int $id, array $data): Product
    {
        return $this->save($this->find($id), $data);
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    protected function save(Product $product, array $data): Product
    {
        $product->fill($data);
        $product->save();

        return $product;
    }

    public function find(int $id): Product
    {
        return Product::findOrFail($id);
    }
}
