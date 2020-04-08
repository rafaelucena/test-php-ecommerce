<?php

namespace Recruitment\Entity;

class Product
{
    /** @var integer */
    private $id;

    /** @var integer */
    private $unitPrice;

    public function setId($id)
    {
        $this->id = $id;
    }

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