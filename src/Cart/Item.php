<?php

namespace Recruitment\Cart;

class Item
{
    private $product;

    private $quantity;

    public function __construct($product, $quantity)
    {
        $this->setProduct($product);
        $this->setQuantity($quantity);
    }

    private function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    private function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}