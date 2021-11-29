<?php


interface OfferActionModelInterface
{
    public function setType(?string $type): void;
    public function setOffer(?OfferModelInterface $offer): void;
    public function setSettings(array $settings): void;
}
