<?php
declare(strict_types = 1);

namespace App\Product\Domain\Model;

use App\Product\Domain\Entity\Product;

interface ProductInterface
{
    public function list(): array;

    public function save(Product $product): void;

    public function getById(int $productId): Product;

    public function delete(Product $product): void;
}
