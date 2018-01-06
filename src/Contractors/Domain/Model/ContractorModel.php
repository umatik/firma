<?php
declare(strict_types = 1);

namespace App\Contractors\Domain\Model;

use App\Contractors\Domain\Entity\Contractor;
use App\Contractors\Domain\Repository\ContractorRepository;
use Doctrine\ORM\EntityManagerInterface;

final class ContractorModel
{
    const ENTITY_CLASS = Contractor::class;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listContractors(): array
    {
        return $this->getRepository()->findAll();
    }

    public function saveContractor(Contractor $contractor): void
    {
        $this->entityManager->persist($contractor);
        $this->entityManager->flush();
    }

    public function getContractor(int $contractorId): ?Contractor
    {
        return $this->getRepository()->find($contractorId);
    }

    private function getRepository(): ContractorRepository
    {
        return $this->entityManager->getRepository(self::ENTITY_CLASS);
    }
}
