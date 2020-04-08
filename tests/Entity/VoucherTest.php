<?php

declare(strict_types=1);

namespace Recruitment\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Recruitment\Entity\Voucher;

class VoucherTest extends TestCase
{
    /**
     * @test
     */
    public function isDiscountValid()
    {
        $voucher = new Voucher();

        $voucher->setCode('A8C6');
        $this->assertEquals(20, $voucher->getDiscount());

        $voucher->setCode('A8C4');
        $this->assertEquals(15, $voucher->getDiscount());

        $voucher->setCode('A8C2');
        $this->assertEquals(10, $voucher->getDiscount());
    }

    /**
     * @test
     * @expectedException \Recruitment\Entity\Exception\InvalidVoucherCodeException
     */
    public function itThrowsExceptionInvalidVoucherCode()
    {
        $voucher = new Voucher();
        $voucher->setCode('A8C5');
    }
}
