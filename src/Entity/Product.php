<?php

namespace Recruitment\Entity;

class Product
{
    /** @var integer */
    private $id;

    /** @var integer */
    private $unitPrice;

    /**
     * @param integer $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
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