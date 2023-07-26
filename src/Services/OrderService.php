<?php

namespace App\Services;

use App\Data\AbstractOrder;
use App\DTO\OrderDTO;

class OrderService extends AbstractOrder
{
    public function getOrderDTO(): OrderDTO
    {
        $this->load();
        return new OrderDTO($this->data);
    }

    protected function loadOrderData(int $id): array
    {
        $order = file_get_contents(__DIR__ . "/../../mock/order.{$id}.json");
        return json_decode($order, true);
    }
}