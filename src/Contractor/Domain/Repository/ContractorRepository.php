<?php
declare(strict_types = 1);

namespace App\Contractor\Domain\Repository;

use App\Common\Domain\Exception\NotFoundException;
use App\Contractor\Domain\Entity\Contractor;
use App\Contractor\Domain\Model\ContractorInterface;
use Doctrine\ORM\EntityRepository;

class ContractorRepository extends EntityRepository implements ContractorInterface
{
    public function list(): array
    {
        return $this->findAll();
    }

    public function save(Contractor $contractor): void
    {
        $this->getEntityManager()->persist($contractor);
        $this->getEntityManager()->flush();
    }

    public function getById(int $contractorId): Contractor
    {
        $contractor = $this->findOneBy([
            'id' => $contractorId
        ]);

        if (empty($contractor)) {
            throw new NotFoundException();
        }

        return $contractor;
    }

    public function delete(Contractor $contractor): void
    {
        $this->getEntityManager()->remove($contractor);
        $this->getEntityManager()->flush();
    }
}
