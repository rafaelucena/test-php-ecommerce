<?php

namespace Recruitment\Entity;

class Voucher
{
    private const alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVXYZ';

    private $alphanumbers = [];

    private $code;

    private $discount;

    public function __construct()
    {
        for ($x = 1; $x < strlen(self::alphanumeric); $x++) {
            $character = self::alphanumeric[$x];
            $this->alphanumbers[$character] = $x;
        }
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDiscount()
    {
        return $this->discount;
    }
}