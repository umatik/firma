<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Product\Domain\Form\ProductType;
use App\Product\Domain\Model\ProductModel;
use App\Product\Responder\GetProductResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetProductAction extends BaseAction
{
    const PAGE_NAME = 'Produkt';

    public function __invoke(
        GetProductResponder $responder,
        int $productId,
        MenuService $menuService,
        Request $request,
        ProductModel $productModel
    ): Response {
        $product = $productModel->getProduct($productId);

        if (empty($product)) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid()) {
            $productModel->saveProduct($product);
        }

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form
        ]);
    }
}
