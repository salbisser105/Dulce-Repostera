<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'rating' => $this->getRating(),
            'category' => $this->getCategory(),
            'ingredients' => $this->getIngredients(),
            'description' => $this-> getDescription(),
        ];
    }
}
