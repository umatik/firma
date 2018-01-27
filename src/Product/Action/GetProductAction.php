<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Exception\NotFoundException;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Product\Domain\Form\ProductType;
use App\Product\Domain\Model\ProductFactory;
use App\Product\Responder\GetProductResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetProductAction extends BaseAction
{
    const PAGE_NAME = 'Produkty';

    public function __invoke(
        GetProductResponder $responder,
        int $productId,
        MenuService $menuService,
        Request $request,
        ProductFactory $productFactory,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService
    ): Response {
        $productModel = $productFactory->create();

        try {
            $product = $productModel->getById($productId);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productModel->save($product);
        }

        $breadcumb = $breadcrumbService->render('app_product_get');

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form,
            'breadcrumb' => $breadcumb
        ]);
    }
}
