<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Services\RestaurantService;

class ListRestaurantController extends Controller
{
    public function __invoke(RestaurantService $restaurantService)
    {
        $response = $restaurantService->get();

        return RestaurantResource::collection($response);
    }
}
