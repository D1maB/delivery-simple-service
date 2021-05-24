<?php

namespace App\Repositories;
use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository {

    protected $model = Product::class;
}
