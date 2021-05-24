<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListRestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_show_all_restaurants()
    {
        $restaurants = Restaurant::factory()->count(5)->create();

        $response = $this->get(route('restaurant.list'));

        $expectedData = $restaurants->map(function($item){
            return [
                "name" => $item->name,
                "description" => $item->description
            ];
        })->toArray();

        $response->assertJson(['data' => $expectedData]);
        $response->assertStatus(200);
    }
}
