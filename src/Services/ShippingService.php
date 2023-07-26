<?php

namespace App\Services;

use AmazonPHP\SellingPartner\Exception\ApiException;
use AmazonPHP\SellingPartner\Marketplace;
use AmazonPHP\SellingPartner\Model\FulfillmentOutbound\Address;
use AmazonPHP\SellingPartner\Model\FulfillmentOutbound\CreateFulfillmentOrderRequest;
use AmazonPHP\SellingPartner\Model\FulfillmentOutbound\ShippingSpeedCategory;
use AmazonPHP\SellingPartner\Regions;
use App\Data\AbstractOrder;
use App\Data\BuyerInterface;
use App\DTO\BuyerDTO;
use App\DTO\OrderDTO;
use DateTime;

Class ShippingService implements ShippingServiceInterface
{



    public function ship(AbstractOrder $order, BuyerInterface $buyer): string
    {
        $orderDTO = $order->getOrderDTO();

        $sdkService = new SDKService();
        try {
            $orderResponse = $sdkService->sdk->fulfillmentOutbound()->createFulfillmentOrder(
                $sdkService->accessToken,
                Regions::NORTH_AMERICA,
                $this->buildOrderRequest($buyer, $orderDTO)
            );
            $shipmentResponse = $sdkService->sdk->fulfillmentOutbound()->getFulfillmentOrder(
                $sdkService->accessToken,
                Regions::NORTH_AMERICA,
                $orderDTO->order_unique,
            );
            $trackingNumber = [];
            foreach ($shipmentResponse['payload']['fulfillment_shipments'] as $shipment) {
                foreach ($shipment['fulfillment_shipment_package'] as $package) {
                    $trackingNumber[] = $package['tracking_number'];
                }
            }


        } catch (ApiException $exception) {
            var_dump($exception->getMessage());
        }
        return implode(",", $trackingNumber);
    }

    private function buildOrderRequest(BuyerDTO $bayerData, OrderDTO $orderData): CreateFulfillmentOrderRequest
    {
        $requestArray = [
            'marketplace_id' => Marketplace::US()->id(),
            'seller_fulfillment_order_id' => $orderData->order_unique,
            'displayable_order_id' => $orderData->order_id,
            'displayable_order_date' => new DateTime($orderData->order_date),
            'displayable_order_comment' => $orderData->comments,
            'shipping_speed_category' => new ShippingSpeedCategory(ShippingSpeedCategory::STANDARD),
            'destination_address' => new Address(
                [
                    'name' => $orderData->buyer_name,
                    'address_line1' => $orderData->shipping_adress,
                    'city' => $orderData->shipping_city,
                    'state_or_region' => $orderData->shipping_state,
                    'postal_code' => $orderData->shipping_zip,
                    'country_code' => $orderData->shipping_country,
                    'phone' => $bayerData->getPhone(),
                ]),
            'notification_emails' => [$bayerData->getEmail()],
        ];
        foreach ($orderData->products as $product) {
            $requestArray['items'][] =
                [
                    'seller_sku' => $product->sku,
                    'seller_fulfillment_order_item_id' => $product->order_product_id,
                    'quantity' => $product->ammount,
                    'displayable_comment' => $product->comment,
                ];
        }
        return new CreateFulfillmentOrderRequest($requestArray);
    }
}