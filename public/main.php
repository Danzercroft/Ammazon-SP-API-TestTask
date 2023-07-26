<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\BuyerService;
use App\Services\OrderService;
use App\Services\ShippingService;



$shippingService = new ShippingService();

$buyerService = new BuyerService(29664);
$orderService = new OrderService(16400);

echo $shippingService->ship($orderService, $buyerService->getBuyerDTO());
