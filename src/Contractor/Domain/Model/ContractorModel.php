<?php
declare(strict_types = 1);

namespace App\Contractor\Domain\Model;

use App\Contractor\Domain\Entity\Contractor;
use App\Contractor\Domain\Repository\ContractorRepository;
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

    public function deleteContractor(Contractor $contractor): void
    {
        $this->entityManager->remove($contractor);
        $this->entityManager->flush();
    }

    private function getRepository(): ContractorRepository
    {
        return $this->entityManager->getRepository(self::ENTITY_CLASS);
    }
}
