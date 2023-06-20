<?php

namespace App\Http\Controllers;

use App\Http\Resources\Customer\CustomerResourceCollection;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): CustomerResourceCollection
    {
        return new CustomerResourceCollection(Customer::get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
