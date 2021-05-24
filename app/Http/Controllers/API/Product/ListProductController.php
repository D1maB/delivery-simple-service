<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ListProductController extends Controller
{
    public function __invoke(ProductService $productService)
    {
        $response = $productService->get();

        return ProductResource::collection($response);
    }
}
