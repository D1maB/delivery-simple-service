<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class CreateOrderController extends Controller
{
    public function __invoke(CreateOrderRequest $request, OrderService $orderService)
    {
        $requestData = $request->validated();
        $response = $orderService->create($requestData);

        return new OrderResource($response);
    }
}
