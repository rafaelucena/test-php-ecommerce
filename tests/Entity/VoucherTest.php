<?php

declare(strict_types=1);

namespace Recruitment\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Recruitment\Entity\Voucher;

class VoucherTest extends TestCase
{
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
