<?php
require_once 'DeliveryMethodInterface.php';
require_once 'DeliveryMethodRuleInterface.php';


class DeliveryMethod implements DeliveryMethodInterface
{
    protected $code;
    protected $settings = [];
    protected $name;

    /**
     * @var DeliveryMethodRuleInterface
     */
    protected $rule;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getName(): ?string
    {
        return $this->getName();
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setSettings(array $settings): void
    {
        $this->settings = $settings;
    }

    public function getRule(): DeliveryMethodRuleInterface
    {
        return $this->rule;
    }

    public function setRule(DeliveryMethodRuleInterface $rule): void
    {
        $this->rule = $rule;
    }
}
