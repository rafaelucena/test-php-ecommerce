<?php

namespace Recruitment\Entity;

use Recruitment\Entity\Exception\InvalidUnitPriceException;

class Product
{
    /** @var integer */
    private $id;

    /** @var integer */
    private $unitPrice;

    /** @var integer */
    private $minimumQuantity;

    public function __construct()
    {
        $this->id = 0;
        $this->unitPrice = 0;
        $this->minimumQuantity = 0;
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
     * @throws InvalidUnitPriceException
     */
    public function setUnitPrice(int $price): self
    {
        if ($price === 0) {
            throw new InvalidUnitPriceException();
        }

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

    /**
     * @param integer $minimumQuantity
     * @return self
     * @throws \InvalidArgumentException
     */
    public function setMinimumQuantity(int $minimumQuantity): self
    {
        if ($minimumQuantity === 0) {
            throw new \InvalidArgumentException();
        }
        $this->minimumQuantity = $minimumQuantity;
        return $this;
    }

    /**
     * @return integer
     */
    public function getMinimumQuantity(): int
    {
        return $this->minimumQuantity;
    }
}