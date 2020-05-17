<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IModelCreator
{
    public function create(array $data): Model;
}
