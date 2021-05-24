<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_an_order()
    {
        $products = Product::factory()->count(2)->create();

        //dd($products->toArray());

        $ids = $products->pluck('id');

        $response = $this->post(route('order.create'), [
            'user_name' => 'test name',
            'user_phone' => 'test phone',
            'products_ids' => [$ids]
        ]);

        //echo $response->getContent();

        //$response->assertJson(['data' => $data]);
        //$response->assertSessionHasNoErrors();
        //$response->assertCreated();

        //dd(OrderDetail::all()->toArray());
    }
}
