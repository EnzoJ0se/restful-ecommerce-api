<?php

namespace App\Http\Controllers;

use App\Actions\Product\CreateOrUpdateProductAction;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductResourceCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function index(): ProductResourceCollection
    {
        return new ProductResourceCollection(Product::get());
    }

    public function show(Request $request, $id): ProductResource
    {
        return new ProductResource(Product::findOrFail($id));
    }

    public function store(Request $request): ProductResource
    {
        $product = CreateOrUpdateProductAction::execute(Collection::make($request->all()));

        return new ProductResource($product);
    }

    public function update(Request $request, Product $product): ProductResource
    {
        $product = CreateOrUpdateProductAction::execute(Collection::make($request->all()));

        return new ProductResource($product);
    }

    public function destroy(Request $request, $id): void
    {
        Product::destroy($id);
    }
}
