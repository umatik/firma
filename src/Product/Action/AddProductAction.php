<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Product\Domain\Entity\Product;
use App\Product\Domain\Form\ProductType;
use App\Product\Responder\AddProductResponder;

final class AddProductAction extends BaseAction
{
    const PAGE_NAME = 'Dodaj nowy produkt';

    public function __invoke(AddProductResponder $responder, MenuService $menuService)
    {
        $form = $this->createForm(ProductType::class, new Product());

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form
        ]);
    }
}
