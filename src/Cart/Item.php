<?php

namespace Recruitment\Cart;

use Recruitment\Cart\Exception\QuantityTooLowException;
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
        if ($this->isValidProductAndQuantity($product, $quantity) === false) {
            throw new \InvalidArgumentException();
        }
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setTotalPrice();
    }

    private function isValidProductAndQuantity($product, $quantity)
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
    public function setQuantity(int $quantity): self
    {
        if ($this->isValidProductAndQuantity($this->product, $quantity) === false) {
            throw new QuantityTooLowException();
        }
        $this->quantity = $quantity;
        $this->setTotalPrice();
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