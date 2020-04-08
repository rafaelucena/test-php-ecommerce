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
        /** @var Item $item */
        foreach ($items as $item) {
            $this->items[] = [
                'id' => $item->getProduct()->getId(),
                'quantity' => $item->getQuantity(),
                'total_price' => $item->getTotalPrice(),
            ];
            $this->totalPrice += $item->getTotalPrice();
        }
    }

    public function getDataForView()
    {
        return [
            'id' => $this->id,
            'items' => $this->items,
            'total_price' => $this->totalPrice,
        ];
    }
}