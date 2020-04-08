<?php

namespace Recruitment\Cart;

use Recruitment\Cart\Item;
use Recruitment\Entity\Product;

class Cart
{
    /** @var array */
    private $items;

    /** @var float */
    private $totalPrice;

    /**
     * @param Product $product
     * @param integer $quantity
     * @return self
     */
    public function addProduct(Product $product, int $quantity = 1): self
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

    /**
     * @param Product $product
     * @return self
     */
    public function removeProduct(Product $product): self
    {
        unset($this->items[$product->getId()]);
        $this->setTotalPrice();
        return $this;
    }

    /**
     * @param Product $product
     * @param integer $quantity
     * @return self
     */
    public function setQuantity(Product $product, int $quantity): self
    {
        $this->items[$product->getId()] = new Item($product, $quantity);
        $this->setTotalPrice();
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return self
     */
    private function setTotalPrice(): self
    {
        $this->totalPrice = 0;
        foreach ($this->items as $item) {
            $this->totalPrice += $item->getTotalPrice();
        }
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * @param integer $index
     * @return Item
     */
    public function getItem(int $index): Item
    {
        $count = 0;
        foreach ($this->items as $item) {
            if ($count === $index) {
                return $item;
            }
            $count++;
        }

        throw new \OutOfBoundsException();
    }
}