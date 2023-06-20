<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Sale
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property string $code
 * @property string $customer_cpf
 * @property string $product_code
 * @property int $quantity
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\Product $product
 * @mixin \Eloquent
 */
class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'code',
        'customer_cpf',
        'product_code',
        'quantity',
        'price',
    ];

    protected $visible = [
        'customer_id',
        'product_id',
        'code',
        'customer_cpf',
        'product_code',
        'quantity',
        'price',

        'customer',
        'product',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
