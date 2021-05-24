<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_an_existing_product()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', ['id' => $product->id]));

        $response->assertJson(['data' => [
            "name" => $product->name,
            "description" => $product->description,
            "price" => $product->price
        ] ]);

        $response->assertStatus(200);
    }
}
