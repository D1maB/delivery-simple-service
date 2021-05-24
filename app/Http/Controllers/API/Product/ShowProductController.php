<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ShowProductController extends Controller
{
    public function __invoke(ProductService $productService, $id)
    {
        $response = $productService->find($id);

        return new ProductResource($response);
    }
}
