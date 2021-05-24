<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowRestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_an_existing_restaurant()
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurant.show', ['id' => $restaurant->id]));

        $response->assertJson(['data' => [
            "name" => $restaurant->name,
            "description" => $restaurant->description
        ] ]);

        $response->assertStatus(200);
    }
}
