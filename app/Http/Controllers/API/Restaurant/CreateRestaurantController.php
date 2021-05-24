<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CreateRestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Services\RestaurantService;

class CreateRestaurantController extends Controller
{
    public function __invoke(CreateRestaurantRequest $request, RestaurantService $restaurantService)
    {
        $requestData = $request->validated();
        $response = $restaurantService->create($requestData);

        return new RestaurantResource($response);
    }
}
