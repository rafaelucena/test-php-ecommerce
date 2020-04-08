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
        $this->setTotalPrice();
    }

    public function getItems()
    {
        return $this->items;
    }

    private function setTotalPrice()
    {
        $this->totalPrice = 0;
        foreach ($this->items as $item) {
            $this->totalPrice += $item->getTotalPrice();
        }
        return $this;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
}