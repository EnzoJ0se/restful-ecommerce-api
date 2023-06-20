<?php

namespace App\Http\Controllers;

use App\Actions\Customer\ApplyCustomerFiltersAction;
use App\Actions\Customer\CreateOrUpdateCustomerAction;
use App\Http\Resources\Customer\CustomerResource;
use App\Http\Resources\Customer\CustomerResourceCollection;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CustomerController extends Controller
{
    public function index(): CustomerResourceCollection
    {
        $query = ApplyCustomerFiltersAction::execute(
            Collection::make(request()->query->all())
        );

        return new CustomerResourceCollection($query->get());
    }

    public function show(Request $request, $id): CustomerResource
    {
        return new CustomerResource(Customer::findOrFail($id));
    }

    public function store(Request $request): CustomerResource
    {
        $customer = CreateOrUpdateCustomerAction::execute(Collection::make($request->all()));

        return new CustomerResource($customer);
    }

    public function update(Request $request, $id): CustomerResource
    {
        $customer = CreateOrUpdateCustomerAction::execute(Collection::make($request->all()));

        return new CustomerResource($customer);
    }


    public function destroy(Request $request, $id): void
    {
        Customer::destroy($id);
    }
}
