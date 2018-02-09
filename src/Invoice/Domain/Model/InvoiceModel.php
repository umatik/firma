<?php
declare(strict_types = 1);

namespace App\Invoice\Domain\Model;

use App\Invoice\Domain\Entity\Invoice;
use App\Invoice\Domain\Repository\InvoiceRepository;
use Doctrine\ORM\EntityManagerInterface;

final class InvoiceModel
{
    const ENTITY_CLASS = Invoice::class;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listInvoices(): array
    {
        return $this->getRepository()->findAll();
    }

    public function saveInvoice(Invoice $contractor): void
    {
        $this->entityManager->persist($contractor);
        $this->entityManager->flush();
    }

    public function getInvoice(int $invoiceId): ?Invoice
    {
        return $this->getRepository()->find($invoiceId);
    }

    public function deleteInvoice(Invoice $contractor): void
    {
        $this->entityManager->remove($contractor);
        $this->entityManager->flush();
    }

    private function getRepository(): InvoiceRepository
    {
        return $this->entityManager->getRepository(self::ENTITY_CLASS);
    }
}
