<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductsController extends Controller
{
    const int PER_PAGE = 40;

    function index(): AnonymousResourceCollection
    {
        $properties = (array)request()->input('properties');
        $products = Product::query()
            ->filterByProperties($properties)
//            ->with('properties.values')
            ->paginate(self::PER_PAGE);

        return ProductResource::collection($products);
    }
}
