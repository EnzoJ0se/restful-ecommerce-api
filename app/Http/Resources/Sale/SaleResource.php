<?php

namespace App\Http\Resources\Sale;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'product_id' => $this->product_id,
            'code' => $this->code,
            'customer_cpf' => $this->customer_cpf,
            'product_code' => $this->product_code,
            'quantity' => $this->quantity,
            'price' => $this->price,

            'customer' => $this->customer,
            'product' => $this->product,
        ];
    }
}
