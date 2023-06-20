<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $cpf
 * @property string|null $phone
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at

 * @mixin \Eloquent
 */
class Customer extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'address',
    ];

    protected $visible = [
        'name',
        'cpf',
        'phone',
        'address',
    ];
}
