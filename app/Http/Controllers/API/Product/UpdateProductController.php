<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class UpdateProductController extends Controller
{
    public function __invoke(UpdateProductRequest $request, ProductService $restaurantService, $id)
    {
        $requestData = $request->validated();
        $response = $restaurantService->update($id, $requestData);

        return new ProductResource($response);
    }
}
