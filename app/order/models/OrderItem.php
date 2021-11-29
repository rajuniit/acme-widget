<?php
require_once 'OrderItemInterface.php';

class OrderItem implements OrderItemInterface
{
    protected $product;

    protected $quantity = 0;

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantify(int $qty)
    {
        $this->quantity = $qty;
    }

    public function getTotal(): float
    {
        return $this->getProduct()->getPrice() * $this->getQuantity();
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
    }
}
