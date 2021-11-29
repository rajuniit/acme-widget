<?php

interface OfferRuleInterface
{
    public function isEligible(OrderInterface $order, array $configuration): bool;
}
