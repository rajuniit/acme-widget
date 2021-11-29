<?php
require_once 'OfferRuleInterface.php';
require_once '/var/www/app/order/models/OrderInterface.php';

final class ContainsProductWithQtyOfferRule implements OfferRuleInterface
{
    public const TYPE = 'contains_product_with_qty';

    public function isEligible(OrderInterface $order, array $configuration): bool
    {
        $eligible = false;
        foreach ($order->getItems() as $item) {
            if ($configuration['product_code'] === $item->getProduct()->getCode()) {
                $eligible = true;
                break;
            }
        }
        if ($configuration['qty'] and $eligible) {
            return true;
        }

        return false;
    }
}
