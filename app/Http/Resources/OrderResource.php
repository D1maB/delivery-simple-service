<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_phone' => $this->user_phone,
            'total_price' => $this->total,
            'products' => OrderDetailResource::collection($this->details)
        ];
    }
}
