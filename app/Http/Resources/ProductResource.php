<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'overview' => $this->overview,
            'sale_price' => $this->price,
            'show_on_shop' => $this->show_on_shop,
            'categories' => CategoryResource::collection($this->categories)
        ];
    }
}
