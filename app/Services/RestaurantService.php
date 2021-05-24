<?php

namespace App\Services;

use App\Repositories\RestaurantRepository;
use App\Services\Crud\CrudServiceBase;

class RestaurantService extends CrudServiceBase {

    public function repository(){
        return RestaurantRepository::class;
    }
}
