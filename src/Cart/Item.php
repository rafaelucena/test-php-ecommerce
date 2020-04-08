<?php

namespace Recruitment\Cart;

class Item
{
    private $product;

    private $quantity;

    public function __construct($product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
}