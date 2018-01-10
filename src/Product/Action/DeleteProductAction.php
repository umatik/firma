<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Product\Domain\Model\ProductModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DeleteProductAction extends BaseAction
{
    const SUCCESSFUL_REMOVED_PRODUCT = 'Pomyślnie usunięto produkt: %s.';

    public function __invoke(ProductModel $productModel, int $productId): Response
    {
        $product = $productModel->getProduct($productId);

        if (empty($product)) {
            throw new NotFoundHttpException();
        }

        $productModel->deleteProduct($product);

        $this->addFlash('info', sprintf(self::SUCCESSFUL_REMOVED_PRODUCT, $product->getName()));

        return $this->redirectToRoute('app_product_list');
    }
}
