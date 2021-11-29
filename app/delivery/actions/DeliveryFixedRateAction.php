<?php

require_once 'DeliveryActionInterface.php';
require_once '/var/www/app/order/models/OrderInterface.php';

final class DeliveryFixedRateAction implements DeliveryActionInterface
{
    public const TYPE = 'delivery_flat_rate';

    public function calculate(OrderInterface $order, array $settings): OrderInterface
    {
        $order->setShippingCharge($settings['amount']);
        return $order;
    }
}
