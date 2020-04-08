<?php

namespace Recruitment\Entity;

use Recruitment\Cart\Item;

class Order
{
    /** @var int */
    private $id;

    /** @var array */
    private $items;

    /** @var float */
    private $totalPrice;

    /**
     * @param integer $id
     * @param array $items
     */
    public function __construct(int $id, array $items)
    {
        $this->id = $id;
        $this->setItemsAndTotalPriceData($items);
    }

    /**
     * @param array $items
     * @return void
     */
    private function setItemsAndTotalPriceData(array $items): void
    {
        $this->items = [];
        $this->totalPrice = 0;

        /** @var Item $item */
        foreach ($items as $item) {
            $this->items[] = $this->setItemData($item);
            $this->totalPrice += $item->getTotalPrice();
        }
    }

    /**
     * @param Item $item
     * @return array
     */
    private function setItemData(Item $item): array
    {
        return [
            'id' => $item->getProduct()->getId(),
            'quantity' => $item->getQuantity(),
            'total_price' => $item->getTotalPrice(),
        ];
    }

    /**
     * @return array
     */
    public function getDataForView(): array
    {
        return [
            'id' => $this->id,
            'items' => $this->items,
            'total_price' => $this->totalPrice,
        ];
    }
}