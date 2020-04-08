<?php

namespace Recruitment\Entity;

use Recruitment\Entity\Exception\InvalidVoucherCodeException;

class Voucher
{
    private const alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVXYZ';

    /** @var array */
    private $alphanumbers = [];

    /** @var string */
    private $code;

    /** @var int */
    private $discount;

    public function __construct()
    {
        for ($x = 1; $x < strlen(self::alphanumeric); $x++) {
            $character = self::alphanumeric[$x];
            $this->alphanumbers[$character] = $x;
        }
    }

    /**
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        if ($code === '' || strlen($code) !== 4) {
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

    /**
     * @param string $character
     * @param array $divisors
     * @return boolean
     */
    private function canDivideBy(string $character, array $divisors): bool
    {
        $number = $this->alphanumbers[$character];
        foreach ($divisors as $divisor) {
            if ($number % $divisor === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return void
     */
    private function setDiscount(): void
    {
        if ($this->canDivideBy($this->code[3], [6])) {
            $this->discount = 20;
        } elseif ($this->canDivideBy($this->code[3], [4])) {
            $this->discount = 15;
        } else {
            $this->discount = 10;
        }
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return integer
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }
}