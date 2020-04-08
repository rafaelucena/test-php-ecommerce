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
        if ($this->isValidConstruct($product, $quantity) === false) {
            throw new \InvalidArgumentException();
        }
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setTotalPrice();
    }

    private function isValidConstruct($product, $quantity)
    {
        if ($product->getMinimumQuantity() > $quantity) {
            return false;
        }

        return true;
    }

    /**
     * @param Product $product
     * @return self
     */
    private function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param integer $quantity
     * @return self
     */
    private function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return integer
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return self
     */
    public function setTotalPrice(): self
    {
        $this->totalPrice = $this->product->getUnitPrice() * $this->quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
}