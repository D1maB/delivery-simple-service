<?php

namespace App\Repositories;
use App\Models\Restaurant;
use App\Repositories\BaseRepository;

class RestaurantRepository extends BaseRepository {

    protected $model = Restaurant::class;

    public function findFull($id)
    {
        /* @TODO */

        return $this->model::with(['products'])->find($id);
    }
}
