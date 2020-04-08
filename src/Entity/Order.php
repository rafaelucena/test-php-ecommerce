<?php

namespace Recruitment\Entity;

class Order
{
    private $id;

    private $items;

    private $totalPrice;

    public function __construct($id, $items)
    {
        $this->id = $id;
    }
}