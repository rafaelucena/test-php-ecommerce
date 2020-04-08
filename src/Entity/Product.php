<?php

namespace Recruitment\Entity;

class Product
{
    private $unitPrice;

    public function setUnitPrice($price)
    {
        $this->unitPrice = $price;
        return $this;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }
}