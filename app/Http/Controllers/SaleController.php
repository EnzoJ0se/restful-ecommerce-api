<?php

namespace App\Http\Controllers;

use App\Actions\Sale\ApplySaleFiltersAction;
use App\Actions\Sale\CreateOrUpdateSaleAction;
use App\Actions\Sale\DeleteSaleAction;
use App\Http\Resources\Sale\SaleResource;
use App\Http\Resources\Sale\SaleResourceCollection;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SaleController extends Controller
{
    public function index(): SaleResourceCollection
    {
        $query = ApplySaleFiltersAction::execute(
            Collection::make(request()->query->all())
        );

        return new SaleResourceCollection($query->get());
    }

    public function show(Request $request, $id): SaleResource
    {
        return new SaleResource(Sale::findOrFail($id));
    }

    public function store(Request $request): SaleResource
    {
        $sale = CreateOrUpdateSaleAction::execute(Collection::make($request->all()));

        return new SaleResource($sale);
    }

    public function update(Request $request, $id): SaleResource
    {
        $sale = CreateOrUpdateSaleAction::execute(Collection::make($request->all()));

        return new SaleResource($sale);
    }

    public function destroy(Request $request, $id): void
    {
        DeleteSaleAction::execute((int) $id);
    }
}
