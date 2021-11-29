<?php
require_once '/var/www/app/order/models/OrderInterface.php';

interface DeliveryActionInterface
{
    public function calculate(OrderInterface $order, array $settings): OrderInterface;
}
