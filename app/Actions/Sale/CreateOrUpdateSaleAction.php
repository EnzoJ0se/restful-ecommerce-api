<?php

namespace App\Actions\Sale;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Collection;

class CreateOrUpdateSaleAction
{
    public static function execute(Collection $params): Sale
    {
        /** @var Sale $sale */
        $sale = Sale::findOrNew($params->get('id'));

        /** @var Product $product */
        $product = Product::where('code', $params->get('product_code'))->first();

        /** @var Customer $customer */
        $customer = Customer::where('cpf', $params->get('customer_cpf'))->first();

        if ($product?->id && $params->get('id')) {
            $quantity = (int)$params->get('quantity') ?: 0;
            $product->stock_quantity = $product->stock_quantity + $quantity;
            $product->save();
            $product->refresh();
        }

        $sale->customer_id = $customer?->id;
        $sale->product_id = $product?->id;
        $sale->code = $params->get('code');
        $sale->customer_cpf = $params->get('customer_cpf');
        $sale->product_code = $params->get('product_code');
        $sale->quantity = (int) $params->get('quantity');
        $sale->price = (float) $params->get('price');
        $sale->save();
        $sale->refresh();

        if ($sale->product()->exists()) {
            $sale->product()->update([
                'stock_quantity' => $sale->product->stock_quantity - $sale->quantity
            ]);
        }

        return $sale;
    }
}
