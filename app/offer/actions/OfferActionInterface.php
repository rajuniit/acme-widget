<?php
require_once '/var/www/app/order/models/OrderInterface.php';

interface OfferActionInterface
{
    public function execute(OrderInterface $order, array $configuration): OrderInterface;
}
