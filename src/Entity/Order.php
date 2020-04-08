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
        $this->setItemsAndTotalPriceData($items);
    }

    private function setItemsAndTotalPriceData($items)
    {
        $this->items = [];
        $this->totalPrice = 0;

        /** @var Item $item */
        foreach ($items as $item) {
            $this->items[] = $this->setItemData($item);
            $this->totalPrice += $item->getTotalPrice();
        }
    }

    private function setItemData($item)
    {
        return [
            'id' => $item->getProduct()->getId(),
            'quantity' => $item->getQuantity(),
            'total_price' => $item->getTotalPrice(),
        ];
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