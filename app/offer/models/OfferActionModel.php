<?php
require_once 'OfferActionModelInterface.php';
require_once 'OfferModelInterface.php';

class OfferActionModel implements OfferActionModelInterface
{
    protected $id;

    protected $type;

    protected $offer;

    protected $settings;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }


    public function getOffer(): ?\OfferModelInterface
    {
        return $this->offer;
    }

    public function setOffer(?\OfferModelInterface $offer): void
    {
        $this->offer = $offer;
    }
    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setSettings(array $settings): void
    {
        $this->settings = $settings;
    }
}
