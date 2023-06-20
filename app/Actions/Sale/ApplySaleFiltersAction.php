<?php

namespace App\Actions\Sale;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ApplySaleFiltersAction
{
    public static function execute(Collection $filters): Builder
    {
        $query = Sale::query();

        if ($customerId = (string) $filters->get('customer_id')) {
            $query = $query->where('customer_id', $customerId);
        }

        if ($productId = (string) $filters->get('product_id')) {
            $query = $query->where('product_id', $productId);
        }

        if ($code = (string) $filters->get('code')) {
            $query = $query->where('code', 'like', "%$code%");
        }

        if ($quantity = (int) $filters->get('quantity')) {
            $query = $query->where('quantity', $quantity);
        }

        if ($price = (float) $filters->get('price')) {
            $query = $query->where('price', $price);
        }

        return $query;
    }
}
