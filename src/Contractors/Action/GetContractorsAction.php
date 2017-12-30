<?php
declare(strict_types = 1);

namespace App\Contractors\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractors\Responder\GetContractorsResponder;

final class GetContractorsAction extends BaseAction
{
    const PAGE_NAME = 'Kontrahenci';

    public function __invoke(GetContractorsResponder $responder, MenuService $menuService)
    {
        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME
        ]);
    }
}
