<?php

namespace Recruitment\Entity;

class Product
{
    /** @var integer */
    private $id;

    /** @var integer */
    private $unitPrice;

    private $minimumQuantity;

    public function __construct()
    {
        $this->id = 0;
        $this->unitPrice = 0;
    }

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

    public function setMinimumQuantity($minimumQuantity)
    {
        $this->minimumQuantity = $minimumQuantity;
        return $this;
    }
}