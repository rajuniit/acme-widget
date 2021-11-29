<?php
require_once 'OfferModelInterface.php';
require_once 'OfferRuleModelInterface.php';

class OfferModel implements OfferModelInterface
{
    protected $code;

    protected $name;

    protected $rule;

    protected $action;

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
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getRule(): OfferRuleModelInterface
    {
        return $this->rule;
    }

    public function setRule(OfferRuleModelInterface $rule): void
    {
        $this->rule = $rule;
    }

    public function getAction(): OfferActionModelInterface
    {
        return $this->action;
    }

    public function setAction(OfferActionModelInterface $action): void
    {
        $this->action = $action;
    }
}
