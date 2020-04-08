<?php

namespace Recruitment\Entity;

use Recruitment\Entity\Exception\InvalidUnitPriceException;

class Product
{
    /** @var integer */
    private $id;

    /** @var string */
    private $name;

    /** @var integer */
    private $unitPrice;

    /** @var integer */
    private $minimumQuantity;

    public function __construct()
    {
        $this->id = 0;
        $this->unitPrice = 0;
        $this->minimumQuantity = 1;
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
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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

        $this->unitPrice = round($price, 2);
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