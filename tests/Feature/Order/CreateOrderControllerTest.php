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

        $ids = $products->pluck('id');

        $tmp_ids = [];
        foreach ($ids as $id){
            $tmp_ids[] = $id;
        }

        $response = $this->post(route('order.create'), [
            'user_name' => 'test name',
            'user_phone' => 'test phone',
            'products_ids' => $tmp_ids
        ]);

        $response->assertJsonStructure([
            'data' => [
                'user_name',
                'user_phone',
                'total_price',
                'products' => [
                    '*' => [
                        'price',
                        'name',
                        'description',
                    ]
                ]
            ]
        ]);
        
        $response->assertStatus(200);

    }

    public function test_throws_an_error_if_user_name_is_not_present()
    {
        $products = Product::factory()->count(2)->create();

        $ids = $products->pluck('id');

        $tmp_ids = [];
        foreach ($ids as $id){
            $tmp_ids[] = $id;
        }

        $response = $this->post(route('order.create'), [
            'user_phone' => 'test phone',
            'products_ids' => $tmp_ids
        ]);

        $response->assertSessionHasErrors(['user_name']);
    }

    public function test_throws_an_error_if_user_phone_is_not_present()
    {
        $products = Product::factory()->count(2)->create();

        $ids = $products->pluck('id');

        $tmp_ids = [];
        foreach ($ids as $id){
            $tmp_ids[] = $id;
        }

        $response = $this->post(route('order.create'), [
            'user_name' => 'test name',
            'products_ids' => $tmp_ids
        ]);

        $response->assertSessionHasErrors(['user_phone']);
    }

    public function test_throws_an_error_if_product_ids_is_not_present()
    {

        $response = $this->post(route('order.create'), [
            'user_name' => 'test name',
            'user_phone' => 'test phone',
        ]);

        $response->assertSessionHasErrors(['products_ids']);
    }

    public function test_throws_an_error_if_product_ids_is_not_exists()
    {

        $response = $this->post(route('order.create'), [
            'user_name' => 'test name',
            'user_phone' => 'test phone',
            'products_ids' => [10,11,12]
        ]);

        $response->assertSessionHasErrors(['products_ids.*']);
    }
}
