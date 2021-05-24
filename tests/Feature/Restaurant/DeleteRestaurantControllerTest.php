<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteRestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_delete_an_existing_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->delete(route('restaurant.delete', ['id' => $restaurant->id]));

        $response->assertStatus(204);
        $this->assertDatabaseCount('restaurants', 0);
    }
}
