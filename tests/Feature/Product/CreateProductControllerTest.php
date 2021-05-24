<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $restaurant = Restaurant::factory()->create();

        $data = [
            'name' => 'test name',
            'description' => 'test description',
            'price' => 1000,
            'restaurant_id' => $restaurant->id
        ];

        $expectedData = $data;
        unset($expectedData['restaurant_id']);

        $response = $this->post(route('product.create'), $data);

        $response->assertJson(['data' => $expectedData]);
        $response->assertSessionHasNoErrors();
        $response->assertCreated();
    }

    public function test_throws_an_error_if_name_is_not_present()
    {
        $data = [
            'description' => 'test description',
            'price' => 1000,
        ];

        $response = $this->post(route('product.create'), $data);

        $response->assertSessionHasErrors(['name']);

        $response->assertStatus(302);
    }

    public function test_throws_an_error_if_description_is_not_present()
    {
        $data = [
            'name' => 'test name',
            'price' => 1000,
        ];

        $response = $this->post(route('product.create'), $data);

        $response->assertSessionHasErrors(['description']);

        $response->assertStatus(302);
    }

    public function test_throws_an_error_if_price_is_not_present()
    {
        $data = [
            'name' => 'test name',
            'description' => 'test description',
        ];

        $response = $this->post(route('product.create'), $data);

        $response->assertSessionHasErrors(['price']);

        $response->assertStatus(302);
    }

    public function test_throws_an_error_if_related_restaurant_is_not_present()
    {
        $data = [
            'name' => 'test name',
            'description' => 'test description',
            'price' => 1000,
        ];

        $response = $this->post(route('product.create'), $data);

        $response->assertSessionHasErrors(['restaurant_id']);

        $response->assertStatus(302);
    }

    public function test_throws_an_error_if_related_restaurant_is_not_exists()
    {
        $data = [
            'name' => 'test name',
            'description' => 'test description',
            'price' => 1000,
            'restaurant_is' => 9999
        ];

        $response = $this->post(route('product.create'), $data);

        $response->assertSessionHasErrors(['restaurant_id']);

        $response->assertStatus(302);
    }
}
