<?php

namespace App\Actions\Sale;
use App\Models\Sale;

class DeleteSaleAction
{
    public static function execute(int $id): void
    {
        $sale = Sale::find($id);

        if ($sale->product()->exists()) {
            $sale->product()->update([
                'stock_quantity' => $sale->product->stock_quantity + $sale->quantity
            ]);
        }

        $sale->delete();
    }
}
