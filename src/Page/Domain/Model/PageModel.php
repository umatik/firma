<?php
declare(strict_types = 1);

namespace App\Page\Domain\Model;

use App\Page\Domain\Entity\Page;
use App\Page\Domain\Repository\PageRepository;
use Doctrine\ORM\EntityManagerInterface;

final class PageModel
{
    const ENTITY_CLASS = Page::class;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPage(string $slug): ?Page
    {
        return $this->getRepository()->findOneBySlug($slug);
    }

    public function savePage(Page $page): void
    {
        $this->entityManager->persist($page);
        $this->entityManager->flush();
    }

    private function getRepository(): PageRepository
    {
        return $this->entityManager->getRepository(self::ENTITY_CLASS);
    }
}
