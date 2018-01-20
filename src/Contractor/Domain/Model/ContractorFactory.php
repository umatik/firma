<?php
declare(strict_types = 1);

namespace App\Contractor\Domain\Model;

final class ContractorFactory
{
    const DRIVER_DOCTRINE = 'doctrine';

    private $doctrine;

    public function __construct(ContractorInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $driver = self::DRIVER_DOCTRINE): ContractorInterface
    {
        if (!isset($this->$driver)) {
            throw new \Exception(sprintf('Driver: %s does not exist', $driver));
        }

        return $this->$driver;
    }
}
