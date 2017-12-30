<?php
declare(strict_types = 1);

namespace App\Dashboard\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Dashboard\Responder\DashboardResponder;
use Symfony\Component\HttpFoundation\Response;

final class DashboardAction extends BaseAction
{
    const PAGE_NAME = 'Dashboard';
    const PAGE_DESCRIPTION = 'Główny panel Twojej firmy';

    public function __invoke(DashboardResponder $responder, MenuService $menuService): Response
    {
        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'pageDescription' => self::PAGE_DESCRIPTION,
        ]);
    }
}
