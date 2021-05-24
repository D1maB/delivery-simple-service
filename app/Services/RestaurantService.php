<?php

namespace App\Services;

use App\Repositories\RestaurantRepository;
use App\Services\Crud\CrudServiceBase;
use App\Models\Restaurant;

class RestaurantService extends CrudServiceBase {

    public function repository(){
        return RestaurantRepository::class;
    }
}
