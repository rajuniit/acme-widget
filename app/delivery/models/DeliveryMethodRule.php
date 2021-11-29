<?php

require_once 'DeliveryMethodRuleInterface.php';
require_once 'DeliveryMethodInterface.php';

class DeliveryMethodRule implements DeliveryMethodRuleInterface
{
    protected $type;
    protected $settings = [];
    protected $deliveryMethod;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setSettings(array $settings): void
    {
        $this->settings = $settings;
    }

    public function getDeliveryMethod(): ?DeliveryMethodInterface
    {
        return $this->deliveryMethod;
    }

    public function setDeliveryMethod(?DeliveryMethodInterface $deliveryMethod): void
    {
        $this->deliveryMethod = $deliveryMethod;
    }
}
