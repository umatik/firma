<?php
declare(strict_types = 1);

namespace App\Contractor\Domain\Model;

use App\Contractor\Domain\Entity\Contractor;

interface ContractorInterface
{
    public function list(): array;

    public function save(Contractor $contractor): void;

    public function getById(int $contractorId): Contractor;

    public function delete(Contractor $contractor): void;
}
