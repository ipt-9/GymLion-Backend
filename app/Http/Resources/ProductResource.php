<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => CategoryResource::make($this->category_id),
            'brand' => CategoryResource::make($this->brand_id),
            'price' => $this->price,
            'discounted_price' => $this->discounted_price,
            'is_discounted' => $this->is_discounted,
            'is_sold_out' => $this->is_sold_out,
            'images_url' => $this->images_url,
        ];
    }
}
