<?php

namespace Recruitment\Cart;

use Recruitment\Cart\Item;

class Cart
{
    private $items = [];

    private $totalPrice;

    public function addProduct($product, $quantity)
    {
        $this->items[$product->getId()] = new Item($product, $quantity);
    }

    public function getItems()
    {
        return $this->items;
    }
}