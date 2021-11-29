<?php
require_once 'OrderInterface.php';

class Order implements OrderInterface
{

    protected $number;

    protected $items = [];

    protected $total = 0.0;

    protected $promotionalAmount = 0.0;

    protected $shippingCharge = 0.0;

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(OrderItemInterface $item): void
    {
        $this->items[] = $item;
    }

    public function getTotal(): float
    {
        $total = 0.0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    public function getTotalQuantity(): int
    {
        $quantity = 0;

        foreach ($this->items as $item) {
            $quantity += $item->getQuantity();
        }

        return $quantity;
    }

    public function getPromotionalAmount(): float
    {
        return $this->promotionalAmount;
    }

    public function setPromotionalAmount(float $promotionalAmount): void
    {
        $this->promotionalAmount = $promotionalAmount;
    }

    public function getShippingCharge(): float
    {
        return $this->shippingCharge;
    }

    public function setShippingCharge(float $shippingCharge): void
    {
        $this->shippingCharge = $shippingCharge;
    }
}
