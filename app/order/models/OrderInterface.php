<?php

interface OrderInterface
{
    public function getNumber(): ?string;

    public function setNumber(?string $number): void;

    public function getItems(): array;

    public function addItem(OrderItemInterface $item): void;

    public function getTotal(): float;

    public function getTotalQuantity(): int;
}
