<?php

namespace Recruitment\Cart;

use Recruitment\Cart\Item;
use Recruitment\Entity\Order;
use Recruitment\Entity\Product;

class Cart
{
    /** @var array */
    private $items;

    /** @var float */
    private $totalPrice;

    /** @var float */
    private $totalPriceGross;

    /**
     * @param Product $product
     * @param integer $quantity
     * @return self
     */
    public function addProduct(Product $product, int $quantity = 1): self
    {
        if (isset($this->items[$product->getId()]) === false) {
            $this->setItem($product, $quantity);
            return $this;
        }

        $existingProduct = $this->items[$product->getId()];
        $this->setItem($product, $existingProduct->getQuantity() + $quantity);
        return $this;
    }

    /**
     * @param Product $product
     * @param integer $quantity
     * @return void
     */
    private function setItem(Product $product, int $quantity): void
    {
        $this->items[$product->getId()] = new Item($product, $quantity);
        $this->setTotalPrices();
    }

    /**
     * @param Product $product
     * @return self
     */
    public function removeProduct(Product $product): self
    {
        unset($this->items[$product->getId()]);
        $this->setTotalPrices();
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
        $this->setTotalPrices();
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
    private function setTotalPrices(): self
    {
        $this->totalPrice = 0;
        $this->totalPriceGross = 0;
        foreach ($this->items as $item) {
            $this->totalPrice += $item->getTotalPrice();
            $this->totalPriceGross += $item->getTotalPriceGross();
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
     * @return float
     */
    public function getTotalPriceGross(): float
    {
        return $this->totalPriceGross;
    }

    /**
     * @param integer $index
     * @return Item
     * @throws \OutOfBoundsException
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

    /**
     * @return void
     */
    private function resetCart(): void
    {
        $this->items = [];
        $this->totalPrice = 0;
    }

    /**
     * @param integer $id
     * @param string $code
     * @return Order
     */
    public function checkout(int $id, string $code = ''): Order
    {
        $order = new Order($id, $this->items, $code);
        $this->resetCart();
        return $order;
    }
}