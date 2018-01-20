<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Product\Domain\Model\ProductFactory;
use App\Product\Domain\Model\ProductModel;
use App\Product\Responder\ListProductsResponder;
use Symfony\Component\HttpFoundation\Response;

final class ListProductsAction extends BaseAction
{
    const PAGE_NAME = 'Produkty';

    public function __invoke(
        ListProductsResponder $responder,
        MenuService $menuService,
        ProductFactory $productFactory
    ): Response {
        $products = $productFactory->create()->list();

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'products' => $products
        ]);
    }
}
