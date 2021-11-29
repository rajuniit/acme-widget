<?php

require_once 'DeliveryRuleInterface.php';
require_once '/var/www/app/order/models/OrderInterface.php';

final class OrderGreaterthanEqualTotalRule implements DeliveryRuleInterface
{
    public const TYPE = 'order_greater_than_equal_total';

    public function isEligible(OrderInterface $order, array $configuration): bool
    {
        if($order->getTotal() >= $configuration['amount']) {
            return true;
        }
        return false;
    }
}
