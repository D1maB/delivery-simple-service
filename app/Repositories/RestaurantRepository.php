<?php

namespace App\Repositories;
use App\Models\Restaurant;
use App\Repositories\BaseRepository;

class RestaurantRepository extends BaseRepository {

    protected $model = Restaurant::class;
}
