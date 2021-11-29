<?php

require_once 'DeliveryRuleInterface.php';
require_once '/var/www/app/order/models/OrderInterface.php';

final class OrderLessThanTotalRule implements DeliveryRuleInterface
{
    public const TYPE = 'order_less_than_total';

    public function isEligible(OrderInterface $order, array $configuration): bool
    {
        if(($order->getTotal() - $order->getPromotionalAmount()) < $configuration['amount']) {
            return true;
        }

        return false;
    }
}
