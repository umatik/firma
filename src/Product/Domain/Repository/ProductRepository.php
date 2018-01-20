<?php
declare(strict_types = 1);

namespace App\Product\Domain\Repository;

use App\Common\Domain\Exception\NotFoundException;
use App\Product\Domain\Entity\Product;
use App\Product\Domain\Model\ProductInterface;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository implements ProductInterface
{
    public function list(): array
    {
        return $this->findAll();
    }

    public function save(Product $product): void
    {
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }

    public function getById(int $productId): Product
    {
        $product = $this->findOneBy([
            'id' => $productId
        ]);

        if (empty($product)) {
            throw new NotFoundException();
        }

        return $product;
    }

    public function delete(Product $product): void
    {
        $this->getEntityManager()->remove($product);
        $this->getEntityManager()->flush();
    }
}
