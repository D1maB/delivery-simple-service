<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class CreateProductController extends Controller
{
    public function __invoke(CreateProductRequest $request, ProductService $productService)
    {
        $requestData = $request->validated();
        $response = $productService->create($requestData);

        return new ProductResource($response);
    }
}
