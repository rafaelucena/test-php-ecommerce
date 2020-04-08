<?php

namespace Recruitment\Cart;

class Item
{
    private $product;

    private $quantity;

    private $totalPrice;

    public function __construct($product, $quantity)
    {
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setTotalPrice();
    }

    private function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    private function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setTotalPrice()
    {
        $this->totalPrice = $this->product->getUnitPrice() * $this->quantity;
    }
}