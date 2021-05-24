<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class DeleteProductController extends Controller
{
    public function __invoke(ProductService $restaurantService, $id)
    {
        $response = $restaurantService->delete($id);

        return new JsonResponse(null, 204);
    }
}
