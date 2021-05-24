<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;

class OrderService {

    private $orderRepository;
    private $productRepository;

    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    public function create(array $data){

        $product_ids = $data['products_ids'];
        $products = $this->productRepository->findMany($product_ids);

        $total = $this->calcTotalPrice($products);

        unset($data['products_ids']);

        $data += [
            'total' => $total
        ];

        /* TODO mb wrap in try/catch and transaction */

        $order = $this->orderRepository->create($data);
        $orderDetails = $this->getOrderDetail($products);

        $order->details()->createMany($orderDetails);

        return $this->orderRepository->findFull($order->id);
    }

    /* @todo fix - provide only needed data in $products*/
    private function calcTotalPrice($products){

        $total = 0;

        foreach($products as $product){
            $total += $product->price;
        }

        return $total;
    }

    /* @todo fix - provide only needed data in $products*/

    private function getOrderDetail($products){

        $tmp = [];

        foreach ($products as $item){
            $tmp[] = [
                'price' => $item->price,
                'product_id' => $item->id,
            ];
        }

        return $tmp;
    }
}
