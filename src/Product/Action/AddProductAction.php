<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
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
        SitemapService $sitemapService
    ): Response {
        $productModel = $productFactory->create();
        $siteMap = $sitemapService->getPagemap(self::PAGE_NAME);

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productModel->save($product);

            return $this->redirectToRoute('app_product_get', [
                'productId' => $product->getId()
            ]);
        }

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form,
            'siteMap' => $siteMap
        ]);
    }
}
