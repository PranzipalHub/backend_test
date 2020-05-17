<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\{
    Collection,
    Model
};

interface IModelRepository extends IModelCreator
{
    public function find(int $modelId): Model;

    public function update(int $modelId, array $data): Model;

    public function delete(int $modelId): void;

    public function index(): Collection;
}
