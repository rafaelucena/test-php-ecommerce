<?php

namespace Recruitment\Entity;

class Product
{
    private $unitPrice;

    public function setUnitPrice(int $price): self
    {
        $this->unitPrice = $price;
        return $this;
    }

    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }
}