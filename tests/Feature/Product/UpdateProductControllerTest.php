<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Database\Factories\RestaurantFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_update_an_existing_restaurant()
    {
        $restaurant = Restaurant::factory()->create();

        $data = [
            'name' => 'test name',
            'description' => 'test description',
        ];

        $response = $this->put(route('restaurant.update', ['id' => $restaurant->id]), $data);

        $response->assertJson(['data' => $data]);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(200);
    }

    public function test_throws_an_error_if_name_is_not_present()
    {
        $restaurant = Restaurant::factory()->create();

        $data = [
            'description' => 'test description',
        ];

        $response = $this->put(route('restaurant.update', ['id' => $restaurant->id]), $data);

        $response->assertSessionHasErrors(['name']);

        $response->assertStatus(302);
    }

    public function test_throws_an_error_if_description_is_not_present()
    {
        $restaurant = Restaurant::factory()->create();

        $data = [
            'name' => 'test name',
        ];

        $response = $this->put(route('restaurant.update', ['id' => $restaurant->id]), $data);

        $response->assertSessionHasErrors(['description']);

        $response->assertStatus(302);
    }
}
