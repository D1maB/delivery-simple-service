<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\Crud\CrudServiceBase;

class ProductService extends CrudServiceBase {

    public function repository(){
        return ProductRepository::class;
    }
}
