<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Product\Domain\Entity\Product;
use App\Product\Domain\Form\ProductType;
use App\Product\Domain\Model\ProductFactory;
use App\Product\Responder\AddProductResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AddProductAction extends BaseAction
{
    const PAGE_NAME = 'Produkty';

    public function __invoke(
        AddProductResponder $responder,
        MenuService $menuService,
        Request $request,
        ProductFactory $productFactory,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService
    ): Response {
        $productModel = $productFactory->create();

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $productModel->save($product);

            return $this->redirectToRoute('product_add', [
                'productId' => $product->getId()
            ]);
        }

        $route = $request->get('_route');
        $siteItem = $sitemapService->getSiteItem($route);

        return $responder([
            'menuService' => $menuService,
            'pageName' => $siteItem['name'],
            'form' => $form,
            'breadcrumb' => $breadcrumbService->render($route)
        ]);
    }
}
