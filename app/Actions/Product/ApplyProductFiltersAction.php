<?php

namespace App\Actions\Product;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ApplyProductFiltersAction
{
    public static function execute(Collection $filters): Builder
    {
        $query = Product::query();

        if ($code = (string) $filters->get('code')) {
            $query = $query->where('code', 'like', "%$code%");
        }

        if ($description = (string) $filters->get('description')) {
            $query = $query->where('description', 'like', "%$description%");
        }

        if ($stockQuantity = (string) $filters->get('stock_quantity')) {
            $query = $query->where('stock_quantity', 'like', "%$stockQuantity%");
        }

        if ($price = (string) $filters->get('price')) {
            $query = $query->where('price', 'like', "%$price%");
        }

        return $query;
    }
}
