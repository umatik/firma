<?php
declare(strict_types = 1);

namespace App\Product\Domain\Model;

final class ProductFactory
{
    const DRIVER_DOCTRINE = 'doctrine';

    private $doctrine;

    public function __construct(ProductInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $driver = self::DRIVER_DOCTRINE): ProductInterface
    {
        if (!isset($this->$driver)) {
            throw new \Exception(sprintf('Driver: %s does not exist', $driver));
        }

        return $this->$driver;
    }
}
