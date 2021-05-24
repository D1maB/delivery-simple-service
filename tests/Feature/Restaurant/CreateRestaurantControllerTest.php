<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateRestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_restaurant()
    {
        $data = [
            'name' => 'test name',
            'description' => 'test description',
        ];

        $response = $this->post(route('restaurant.create'), $data);

        $response->assertJson(['data' => $data]);
        $response->assertSessionHasNoErrors();
        $response->assertCreated();
    }

    public function test_throws_an_error_if_name_is_not_present()
    {
        $data = [
            'description' => 'test description',
        ];

        $response = $this->post(route('restaurant.create'), $data);

        $response->assertSessionHasErrors(['name']);

        $response->assertStatus(302);
    }

    public function test_throws_an_error_if_description_is_not_present()
    {
        $data = [
            'name' => 'test name',
        ];

        $response = $this->post(route('restaurant.create'), $data);

        $response->assertSessionHasErrors(['description']);

        $response->assertStatus(302);
    }
}
