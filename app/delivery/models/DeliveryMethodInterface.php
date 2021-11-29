<?php

interface DeliveryMethodInterface
{
    public function getName(): ?string;

    public function setName(string $name): void;

    public function getSettings(): array;

    public function setSettings(array $settings): void;

    public function setRule(DeliveryMethodRuleInterface $rule): void;
}
