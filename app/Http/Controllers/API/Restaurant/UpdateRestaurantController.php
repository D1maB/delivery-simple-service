<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Services\RestaurantService;

class UpdateRestaurantController extends Controller
{
    public function __invoke(UpdateRestaurantRequest $request, RestaurantService $restaurantService, $id)
    {
        $requestData = $request->validated();
        $response = $restaurantService->update($id, $requestData);

        return new RestaurantResource($response);
    }
}
