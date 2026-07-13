<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRecource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product_id" => (int) $this->id,
            "product_name" => $this->name,
            "active" => $this->active,
            "created_by" => $this->createdBy->name,
            "image" => $this->when($this->image == "","4545454"),
        ];
    }
}
