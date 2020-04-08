<?php

namespace Recruitment\Entity;

use Recruitment\Entity\Exception\InvalidVoucherCodeException;

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

    public function setCode($code)
    {
        if ($code === '') {
            $this->code = '';
            $this->discount = 0;
            return $this;
        }

        if ($this->canDivideBy($code[0], [5]) === false) {
            throw new InvalidVoucherCodeException();
        } elseif ($this->canDivideBy($code[1], [4]) === false) {
            throw new InvalidVoucherCodeException();
        } elseif ($this->canDivideBy($code[2], [3]) === false) {
            throw new InvalidVoucherCodeException();
        } elseif ($this->canDivideBy($code[3], [6, 4, 2]) === false) {
            throw new InvalidVoucherCodeException();
        }

        $this->code = $code;
        $this->setDiscount();
        return $this;
    }

    private function canDivideBy($character, $divisors)
    {
        $number = $this->alphanumbers[$character];
        foreach ($divisors as $divisor) {
            if ($number % $divisor === 0) {
                return true;
            }
        }

        return false;
    }

    private function setDiscount()
    {
        if ($this->canDivideBy($this->code[3], [6])) {
            $this->discount = 20;
        } elseif ($this->canDivideBy($this->code[3], [4])) {
            $this->discount = 15;
        } else {
            $this->discount = 10;
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