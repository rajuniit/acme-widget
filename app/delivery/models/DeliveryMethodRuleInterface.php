<?php
require_once 'DeliveryMethodInterface.php';

interface DeliveryMethodRuleInterface
{
    public function setType(?string $type): void;
    public function setDeliveryMethod(?DeliveryMethodInterface $deliveryMethod): void;
    public function setSettings(array $settings): void;
}
