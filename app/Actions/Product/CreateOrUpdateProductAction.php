<?php

namespace App\Actions\Product;
use App\Models\Product;
use Illuminate\Support\Collection;

class CreateOrUpdateProductAction
{
    public static function execute(Collection $params): Product
    {
        /** @var Product $product */
        $product = Product::updateOrCreate(
            ['id' => $params->get('id')],
            [
                'code' => $params->get('code'),
                'description' => $params->get('description'),
                'price' => (float) $params->get('price'),
                'stock_quantity' => (int) $params->get('stock_quantity'),
            ]
        );

        return $product;
    }
}
