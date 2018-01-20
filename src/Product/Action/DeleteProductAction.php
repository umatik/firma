<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Exception\NotFoundException;
use App\Product\Domain\Model\ProductFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DeleteProductAction extends BaseAction
{
    const SUCCESSFUL_REMOVED_PRODUCT = 'Pomyślnie usunięto produkt: %s.';

    public function __invoke(ProductFactory $productFactory, int $productId): Response
    {
        $productModel = $productFactory->create();

        try {
            $product = $productModel->getById($productId);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException();
        }

        $productModel->delete($product);

        $this->addFlash('info', sprintf(self::SUCCESSFUL_REMOVED_PRODUCT, $product->getName()));

        return $this->redirectToRoute('app_product_list');
    }
}
