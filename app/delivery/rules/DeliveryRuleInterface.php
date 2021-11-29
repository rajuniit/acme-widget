<?php
require_once '/var/www/app/order/models/OrderInterface.php';

interface DeliveryRuleInterface
{
    public function isEligible(OrderInterface $order, array $configuration): bool;
}
