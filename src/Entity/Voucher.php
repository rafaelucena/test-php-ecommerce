<?php

namespace Recruitment\Entity;

class Voucher
{
    private const alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVXYZ';

    private $alphanumbers = [];

    private $code;

    private $discount;
}