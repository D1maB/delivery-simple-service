<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository {

    protected $model = Order::class;

    public function findFull($id)
    {
        /* @TODO */

        return $this->model::with(['details', 'details.product'])->find($id);
    }
}
