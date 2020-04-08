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

    private $tax;

    public function __construct()
    {
        $nameRange = ['Quesadilla', 'Cachaca', 'Bier', 'Churrasco', 'Abacate', 'Goiaba', 'Watermelon', 'Kapusta'];

        $this->id = 0;
        $this->unitPrice = 0;
        $this->minimumQuantity = 1;
        $this->name = $nameRange[random_int(0, count($nameRange) - 1)];
        $this->tax = 0;
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