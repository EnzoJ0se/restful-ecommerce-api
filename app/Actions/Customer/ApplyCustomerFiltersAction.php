<?php

namespace App\Actions\Customer;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ApplyCustomerFiltersAction
{
    public static function execute(Collection $filters): Builder
    {
        $query = Customer::query();

        if ($filters->get('sale_id')) {
            $query = $query->whereHas(
                'sales',
                fn ($sale) => $sale->where('id', $filters->get('sale_id'))
            );
        }

        if ($name = (string) $filters->get('name')) {
            $query = $query->where('name', 'like', "%$name%");
        }

        if ($cpf = (string) $filters->get('cpf')) {
            $query = $query->where('cpf', 'like', "%$cpf%");
        }

        if ($address = (string) $filters->get('address')) {
            $query = $query->where('address', 'like', "%$address%");
        }

        return $query;
    }
}
