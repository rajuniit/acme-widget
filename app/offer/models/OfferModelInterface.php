<?php
require_once 'OfferRuleModelInterface.php';
require_once 'OfferActionModelInterface.php';

interface OfferModelInterface
{
    public function getName(): ?string;
    public function setName(?string $name): void;

    public function getRule(): OfferRuleModelInterface;
    public function setRule(OfferRuleModelInterface $rule): void;
    public function getAction(): OfferActionModelInterface;
    public function setAction(OfferActionModelInterface $action): void;
}
