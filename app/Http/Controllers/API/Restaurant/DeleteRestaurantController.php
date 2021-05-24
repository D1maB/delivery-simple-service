<?php

namespace App\Http\Controllers\API\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Services\RestaurantService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class DeleteRestaurantController extends Controller
{
    public function __invoke(RestaurantService $restaurantService, $id)
    {
        $response = $restaurantService->delete($id);

        return new JsonResponse(null, 204);
    }
}
