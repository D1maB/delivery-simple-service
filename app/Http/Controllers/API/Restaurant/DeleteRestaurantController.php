<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Services\RestaurantService;
use Illuminate\Http\JsonResponse;

class DeleteRestaurantController extends Controller
{
    public function __invoke(RestaurantService $restaurantService, $id)
    {
        $response = $restaurantService->delete($id);

        return new JsonResponse(null, 204);
    }
}
