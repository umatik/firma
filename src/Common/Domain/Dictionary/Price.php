<?php
declare(strict_types = 1);

namespace App\Common\Domain\Dictionary;

final class Price
{
    const ID_PRICE_TYPE_NETTO = 1;
    const ID_PRICE_TYPE_BRUTTO = 2;
    const PRICE_TYPE = [
        self::ID_PRICE_TYPE_NETTO => 'netto',
        self::ID_PRICE_TYPE_BRUTTO => 'brutto'
    ];
}
