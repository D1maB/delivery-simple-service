<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Services\RestaurantService;

class ShowRestaurantController extends Controller
{
    public function __invoke(RestaurantService $restaurantService, $id)
    {
        $response = $restaurantService->find($id);

        return new RestaurantResource($response);
    }
}
