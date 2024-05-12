<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'user' => UserResource::make($this->user_id),
            'price' => $this->price,
            'purchase_date' => $this->purchase_date->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            // 'products' => ProductResource::make($this->products),
        ];
    }
}
