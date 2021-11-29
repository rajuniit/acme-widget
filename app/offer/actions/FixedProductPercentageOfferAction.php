<?php

require_once 'OfferActionInterface.php';
require_once '/var/www/app/order/models/OrderInterface.php';

final class FixedProductPercentageOfferAction implements OfferActionInterface
{
    public const TYPE = 'fixed_product_percentage';

    private function findOrderItem($productCode, $order) {
        foreach ($order->getItems() as $item) {
            if ($productCode === $item->getProduct()->getCode()) {
                return $item;
            }
        }
        return null;
    }
    public function execute(OrderInterface $order, array $configuration): OrderInterface
    {
        if (!array_key_exists('qty', $configuration)
            || !array_key_exists('percentage', $configuration)) {
            return $order;
        }
        $orderItem = $this->findOrderItem($configuration['product_code'], $order);

        if($orderItem !== null) {
            $orderItemQty = $orderItem->getQuantity();
            $percentageTimes = (int)($orderItemQty / $configuration['qty']);
            $percentage = ($configuration['percentage'] / 100) * $orderItem->getProduct()->getPrice();
            $order->setPromotionalAmount( $percentage * $percentageTimes);
        }

        return $order;
    }
}
