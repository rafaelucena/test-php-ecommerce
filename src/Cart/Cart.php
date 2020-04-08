<?php

namespace Recruitment\Cart;

use Recruitment\Cart\Item;

class Cart
{
    private $items = [];

    private $totalPrice;

    public function addProduct($product, $quantity)
    {
        if (isset($this->items[$product->getId()]) === false) {
            $this->items[$product->getId()] = new Item($product, $quantity);
            $this->setTotalPrice();
            return $this;
        }

        $existingProduct = $this->items[$product->getId()];
        $this->items[$product->getId()] = new Item($product, $existingProduct->getQuantity() + $quantity);
        $this->setTotalPrice();
        return $this;
    }

    public function removeProduct($product)
    {
        unset($this->items[$product->getId()]);
        $this->setTotalPrice();
        return $this;
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

    public function getItem($index)
    {
        $count = 0;
        foreach ($this->items as $item) {
            if ($count === $index) {
                return $item;
            }
            $count++;
        }

        return null;
    }
}