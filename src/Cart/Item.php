<?php

namespace Recruitment\Cart;

use Recruitment\Entity\Product;

class Item
{
    /** @var Product */
    private $product;

    /** @var integer */
    private $quantity;

    /** @var float */
    private $totalPrice;

    public function __construct(Product $product, int $quantity)
    {
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setTotalPrice();
    }

    private function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    private function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setTotalPrice(): self
    {
        $this->totalPrice = $this->product->getUnitPrice() * $this->quantity;
        return $this;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
}