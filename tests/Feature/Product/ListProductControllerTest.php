<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_products()
    {
        $products = Product::factory()->count(5)->create();

        $response = $this->get(route('product.list'));

        $expectedData = $products->map(function($item){
            return [
                "name" => $item->name,
                "description" => $item->description,
                "price" => $item->price,
            ];
        })->toArray();

        $response->assertJson(['data' => $expectedData]);
        $response->assertStatus(200);
    }
}
