<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property float $price
 * @property int $stock_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = [
        'code',
        'description',
        'price',
        'stock_quantity',
    ];

    protected $visible = [
        'code',
        'description',
        'price',
        'stock_quantity',
    ];
}
