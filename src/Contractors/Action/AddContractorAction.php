<?php
declare(strict_types = 1);

namespace App\Contractors\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractors\Responder\AddContractorResponder;

final class AddContractorAction extends BaseAction
{
    const PAGE_NAME = 'Dodaj kontrahenta';

    public function __invoke(AddContractorResponder $responder, MenuService $menuService)
    {
        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
        ]);
    }
}