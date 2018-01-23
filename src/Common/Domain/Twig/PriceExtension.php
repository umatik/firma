<?php
declare(strict_types = 1);

namespace App\Common\Domain\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class PriceExtension extends AbstractExtension
{
    const CURRENCY = 'zł';
    const DECIMALS = 2;
    const DECIMAL_POINT = ',';
    const THOUSANDS_SEPARATOR = '.';

    public function getFilters(): array
    {
        return [
            new TwigFilter('price_format', [$this, 'priceFormatFilter']),
        ];
    }

    public function priceFormatFilter(
        $price,
        $decimals = self::DECIMALS,
        $decimalPoint = self::DECIMAL_POINT,
        $thousandsSeparator = self::THOUSANDS_SEPARATOR
    ): string {
        return number_format((float) $price, $decimals, $decimalPoint, $thousandsSeparator) . ' ' . self::CURRENCY;
    }
}
