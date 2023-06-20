<?php

namespace App\Actions\Customer;

use App\Models\Customer;
use Illuminate\Support\Collection;

class CreateOrUpdateCustomerAction
{
    public static function execute(Collection $params): Customer
    {
        /** @var Customer $customer */
        $customer = Customer::updateOrCreate(
            ['id' => $params->get('id')],
            [
                'name' => $params->get('name'),
                'cpf' => $params->get('cpf'),
                'phone' => $params->get('phone'),
                'address' => $params->get('address'),
            ]
        );

        return $customer;
    }
}
