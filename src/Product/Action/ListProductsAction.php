<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Product\Domain\Model\ProductFactory;
use App\Product\Responder\ListProductsResponder;
use Symfony\Component\HttpFoundation\Response;

final class ListProductsAction extends BaseAction
{
    const PAGE_NAME = 'Produkty';

    public function __invoke(
        ListProductsResponder $responder,
        MenuService $menuService,
        ProductFactory $productFactory,
        SitemapService $sitemapService
    ): Response {
        $products = $productFactory->create()->list();
        $siteMap = $sitemapService->getPagemap(2);

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'products' => $products,
            'siteMap' => $siteMap
        ]);
    }
}
