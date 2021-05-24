<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_delete_an_existing_product()
    {
        $product = Product::factory()->create();
        $response = $this->delete(route('product.delete', ['id' => $product->id]));

        $response->assertStatus(204);
        $this->assertDatabaseCount('products', 0);
    }
}
