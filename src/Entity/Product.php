<?php

namespace Recruitment\Entity;

class Product
{
    /** @var integer */
    private $id;

    /** @var integer */
    private $unitPrice;

    /**
     * @param integer $price
     * @return self
     */
    public function setUnitPrice(int $price): self
    {
        $this->unitPrice = $price;
        return $this;
    }

    /**
     * @return integer
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }
}