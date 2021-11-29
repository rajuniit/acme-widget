<?php

require_once 'OfferModelInterface.php';

interface OfferRuleModelInterface
{
    public function setType(?string $type): void;
    public function setOffer(?OfferModelInterface $offer): void;
    public function setSettings(array $settings): void;
}
