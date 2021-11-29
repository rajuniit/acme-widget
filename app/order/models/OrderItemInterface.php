<?php
require_once '/var/www/app/product/models/ProductInterface.php';

interface OrderItemInterface
{
    public function getProduct(): ?ProductInterface;

    public function getQuantity(): int;

    public function getTotal(): float;
}
